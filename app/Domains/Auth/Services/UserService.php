<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Events\User\UserCreated;
use App\Domains\Auth\Events\User\UserDeleted;
use App\Domains\Auth\Events\User\UserDestroyed;
use App\Domains\Auth\Events\User\UserRestored;
use App\Domains\Auth\Events\User\UserStatusChanged;
use App\Domains\Auth\Events\User\UserUpdated;
use App\Domains\Auth\Models\User;
use App\Exceptions\GeneralException;
use App\Models\Voucher;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Propaganistas\LaravelPhone\PhoneNumber;

/**
 * Class UserService.
 */
class UserService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param $type
     * @param  bool|int  $perPage
     * @return mixed
     */
    public function getByType($type, $perPage = false)
    {
        if (is_numeric($perPage)) {
            return $this->model::byType($type)->paginate($perPage);
        }

        return $this->model::byType($type)->get();
    }

    /**
     * @param  array  $data
     * @return mixed
     *
     * @throws GeneralException
     */
    public function registerUser(array $data = [], $utm = false): User
    {
        DB::beginTransaction();

        try {
            $user = $this->createUser($data, $utm);

            $user->address_data()->create([
                'address' => $data['address'],
                'province' => $data['province'],
                'city' => $data['city'],
                'district' => $data['district'],
                'postal_code' => $data['postal_code'],
                'is_primary' => true
            ]);

            $brand_history = "";
            $category_history = "";
            $packsize_history = "";

            if (!empty($data['history_milk_category'])) {
                $category_history = implode("|",$data['history_milk_category']);
            }

            if (!empty($data['history_milk_product'])) {
                $brand_history = implode("|",$data['history_milk_product']);
            }

            if (!empty($data['history_milk_packsize'])) {
                $packsize_history = implode("|",$data['history_milk_packsize']);
            }

            $user->detail()->create([
                'date_of_birth' => $data['date_of_birth'],
                'child_name' => null, //$data['child_name'],
                'child_date_of_birth' => null, //$data['child_date_of_birth'],
                'history_milk_category' => $category_history,
                'history_milk_product' => $brand_history,
                'history_milk_packsize' => $packsize_history,
            ]);

            // $voucherInUser = Voucher::where('user_id', $user->id)->get();
            // if (!$voucherInUser->count()) {
            //     $voucher = Voucher::whereNull('given_at')->first();
            //     $voucher->update([
            //         'user_id' => $user->id,
            //         'given_at' => now()
            //     ]);
            // }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException($e->getMessage());
        }

        DB::commit();

        return $user;
    }

    /**
     * @param $info
     * @param $provider
     * @return mixed
     *
     * @throws GeneralException
     */
    public function registerProvider($info, $provider): User
    {
        $user = $this->model::where('provider_id', $info->id)->first();

        if (! $user) {
            DB::beginTransaction();

            try {
                $user = $this->createUser([
                    'name' => $info->name,
                    'email' => $info->email,
                    'provider' => $provider,
                    'provider_id' => $info->id,
                    'email_verified_at' => now(),
                ]);

            } catch (Exception $e) {
                DB::rollBack();
                throw new GeneralException(__('There was a problem connecting to :provider', ['provider' => $provider]));
            }

            DB::commit();
        }

        return $user;
    }

    /**
     * @param  array  $data
     * @return User
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): User
    {
        DB::beginTransaction();

        try {
            $user = $this->createUser([
                'type' => $data['type'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'email_verified_at' => isset($data['email_verified']) && $data['email_verified'] === '1' ? now() : null,
                'active' => isset($data['active']) && $data['active'] === '1',
            ]);

            $user->syncRoles($data['roles'] ?? []);

            if (! config('boilerplate.access.user.only_roles')) {
                $user->syncPermissions($data['permissions'] ?? []);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this user. Please try again.'));
        }

        event(new UserCreated($user));

        DB::commit();

        // They didn't want to auto verify the email, but do they want to send the confirmation email to do so?
        if (! isset($data['email_verified']) && isset($data['send_confirmation_email']) && $data['send_confirmation_email'] === '1') {
            $user->sendEmailVerificationNotification();
        }

        return $user;
    }

    /**
     * @param  User  $user
     * @param  array  $data
     * @return User
     *
     * @throws \Throwable
     */
    public function update(User $user, array $data = []): User
    {
        DB::beginTransaction();

        try {
            $user->update([
                'type' => $user->isMasterAdmin() ? $this->model::TYPE_ADMIN : $data['type'] ?? $user->type,
                'name' => $data['name'],
                'email' => $data['email'],
            ]);

            if (! $user->isMasterAdmin()) {
                // Replace selected roles/permissions
                $user->syncRoles($data['roles'] ?? []);

                if (! config('boilerplate.access.user.only_roles')) {
                    $user->syncPermissions($data['permissions'] ?? []);
                }
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this user. Please try again.'));
        }

        event(new UserUpdated($user));

        DB::commit();

        return $user;
    }

    /**
     * @param  User  $user
     * @param  array  $data
     * @return User
     */
    public function updateProfile(User $user, array $data = []): User
    {
        $phoneChanged = false;
        $phone = PhoneNumber::make($data['phone'], 'ID');
        $phoneChanged = $phone != $user->phone;

        $user->name = $data['name'] ?? null;
        $user->phone = $phone;

        if ($phoneChanged) {
            $user->whatsapp_validate_at = null;
        }

        $user->detail()->update([
            "child_name" => $data['child_name'] ?? null,
            "date_of_birth" => $data['date_of_birth'] ?? null,
            "child_date_of_birth" => $data['child_date_of_birth'] ?? null,
        ]);

        if ($user && !$user->isHasAddressData()) {
            $user->address_data()->create([
                "address" => $data["address"] ?? null,
                "province" => $data["province"] ?? null,
                "city" => $data["city"] ?? null,
                "district" => $data["district"] ?? null,
                "postal_code" => $data["postal_code"] ?? null,
                "is_primary" => 1
            ]);
            $user->completed_at = now();
        }else{
            $user->address_data()->update([
                "address" => $data["address"] ?? null,
                "province" => $data["province"] ?? null,
                "city" => $data["city"] ?? null,
                "district" => $data["district"] ?? null,
                "postal_code" => $data["postal_code"] ?? null
            ]);
            $user->completed_at = now();
        }

        if ($user->canChangeEmail() && $user->email !== $data['email']) {
            $user->email = $data['email'];
            // $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            session()->flash('resent', true);
        }

        return tap($user)->save();
    }

    /**
     * @param  User  $user
     * @param $data
     * @param  bool  $expired
     * @return User
     *
     * @throws \Throwable
     */
    public function updatePassword(User $user, $data, $expired = false): User
    {
        if (isset($data['current_password'])) {
            throw_if(
                ! Hash::check($data['current_password'], $user->password),
                new GeneralException(__('That is not your old password.'))
            );
        }

        // Reset the expiration clock
        if ($expired) {
            $user->password_changed_at = now();
        }

        $user->password = $data['password'];

        return tap($user)->update();
    }

    /**
     * @param  User  $user
     * @param $status
     * @return User
     *
     * @throws GeneralException
     */
    public function mark(User $user, $status): User
    {
        if ($status === 0 && auth()->id() === $user->id) {
            throw new GeneralException(__('You can not do that to yourself.'));
        }

        if ($status === 0 && $user->isMasterAdmin()) {
            throw new GeneralException(__('You can not deactivate the administrator account.'));
        }

        $user->active = $status;

        if ($user->save()) {
            event(new UserStatusChanged($user, $status));

            return $user;
        }

        throw new GeneralException(__('There was a problem updating this user. Please try again.'));
    }

    /**
     * @param  User  $user
     * @return User
     *
     * @throws GeneralException
     */
    public function delete(User $user): User
    {
        if ($user->id === auth()->id()) {
            throw new GeneralException(__('You can not delete yourself.'));
        }

        if ($this->deleteById($user->id)) {
            event(new UserDeleted($user));

            return $user;
        }

        throw new GeneralException('There was a problem deleting this user. Please try again.');
    }

    /**
     * @param  User  $user
     * @return User
     *
     * @throws GeneralException
     */
    public function restore(User $user): User
    {
        if ($user->restore()) {
            event(new UserRestored($user));

            return $user;
        }

        throw new GeneralException(__('There was a problem restoring this user. Please try again.'));
    }

    /**
     * @param  User  $user
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(User $user): bool
    {
        if ($user->forceDelete()) {
            event(new UserDestroyed($user));

            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
    }

    /**
     * @param  array  $data
     * @return User
     */
    protected function createUser(array $data = [], $utm = false): User
    {
        $phone = null;

        try {
            $phone = PhoneNumber::make($data['phone'], 'ID');
        } catch (\Throwable $th) {
            //throw $th;
        }


        return $this->model::create([
            'type' => $data['type'] ?? $this->model::TYPE_USER,
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'phone' => $phone,
            'password' => $data['password'] ?? null,
            'provider' => $data['provider'] ?? null,
            'provider_id' => $data['provider_id'] ?? null,
            'active' => $data['active'] ?? true,
            'completed_at' => $data['completed_at'] ?? null,
            'register_channel' => $utm ? 'web_qr' : 'web'
        ]);
    }
}

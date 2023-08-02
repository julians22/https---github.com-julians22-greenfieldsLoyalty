<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Models\Redeem;
use App\Models\Reward;
use Propaganistas\LaravelPhone\PhoneNumber;

/**
 * Class ProfileController.
 */
class ProfileController
{
    /**
     * @param  UpdateProfileRequest  $request
     * @param  UserService  $userService
     * @return mixed
     */
    public function update(UpdateProfileRequest $request, UserService $userService)
    {
        $user = $userService->updateProfile($request->user(), $request->validated());

        $user_detail = [
            "child_name" => $request->child_name ?? null,
            "date_of_birth" => $request->date_of_birth ?? null,
            "child_date_of_birth" => $request->child_date_of_birth ?? null
        ];

        if ($user && !$user->isHasDetail()) {
            $user->detail()->create($user_detail);
        }else{
            $user->detail()->update($user_detail);
        }

        if ($user->isWhatsappVerified()) {
            $from = null;
            $oldUrl = parse_url(url()->previous());
            if (array_key_exists('query', $oldUrl)) {
                parse_str($oldUrl['query'], $output);

                if (array_key_exists('from', $output)) {
                    $from = $output['from'];
                }
            }

            if ($user->isWebQrUser()) {
                if ($user->isHasAddressData()) {
                    $reward_offline_id = config('greenfields.offline_reward_id');
                    $rewardInUser = Redeem::where('user_id', $user->id)->where('offline_reward', 1)->get();
                    if (!$rewardInUser->count()) {
                        $reward = Reward::find($reward_offline_id);
                        Redeem::create([
                            'user_id' => $user->id,
                            'reward_id' => $reward->id,
                            'offline_reward' => 1,
                            'point' => 0,
                            'address_id' => $user->address_data->id,
                        ]);

                        $reward->current_stock -= 1;
                        $reward->save();
                    }
                }
            }

            if ($from && $from == 'redeem') {
                return redirect()->route('frontend.redeem.index')
                    ->withSwalSuccess('Berhasil ubah profil, ayo tukar hadiah kamu');
            }

            return redirect()->route('frontend.user.account')->withSwalSuccess(__('Profile successfully updated.'));
        }


        return redirect()->route('frontend.auth.verification.whatsapp.validate')
            ->withSwalWarning('Satu langkah lagi, silahkan verifikasi nomor whatsapp kamu terlebih dahulu ya!');

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityCollection;
use App\Http\Resources\ActivityResource;
use App\Http\Resources\Api\Users\UserResource;
use App\Models\Redeem;
use App\Models\TopUp;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Password;
use Propaganistas\LaravelPhone\PhoneNumber;

class UserController extends Controller
{
    /**
     * Check user method
     *
     * Check user is axists or not
     *
     * @param Request $request
     * @return User
     **/
    public function check_user(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        $phone = $request->get('phone');
        $phone = PhoneNumber::make($phone, 'ID');
        $user = User::where('phone', $phone)->first();

        if (!$user) {
            $result = [
                'pass' => false,
                'message' => 'User not found'
            ];

            return response()->json($result, 404);
        }

        $result = [
            'pass' => true,
            'detail' => new UserResource($user),
        ];
        return $result;
    }

    public function check_point(Request $request) {
        $request->validate([
            'phone' => 'required'
        ]);
        $phone = $request->get('phone');
        $phone = PhoneNumber::make($phone, 'ID');
        $user = User::where('phone', $phone)->first();

        $transactions = [];
        $topup = TopUp::where('user_id', $user->id)->take(10)->get();
        $redeem = Redeem::where('user_id', $user->id)->take(10)->get();
        $transactions = array_merge($this->extract_data($topup, 'topup'), $this->extract_data($redeem, 'redeem'));
        $transactions = collect($transactions)->sortByDesc('date')->toArray();

        return response()->json([
            'status' => true,
            'current_point' => $user->point,
            'activities' => ActivityResource::collection($transactions)
        ]);
    }

    /**
     * Register user method
     *
     * Fungsi untuk mendaftarkan pengguna melalui API
     *
     **/
    public function store(Request $request)
    {
        $phoneField = phone($request->phone, 'ID');

        $validatorPhone = Validator::make([
            'phone_field' => $phoneField->formatE164(),
        ], [
            'phone_field' => 'unique:users,phone'
        ], [
            'phone_field.unique' => 'No Whatsapp sudah di gunakan'
        ]);

        if ($validatorPhone->fails()) {
            return response()->json([
                'errors' => $validatorPhone->errors(),
                'status' => false
            ], 403);
        }

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => false
            ], 403);
        }


        // Make vars
        $brand_history = "";
        $category_history = "";
        $packsize_history = "";

        if (!empty($request->history_milk_category)) { $category_history = implode("|",$request->history_milk_category); }
        if (!empty($request->history_milk_product)) { $brand_history = implode("|",$request->history_milk_product); }
        if (!empty($request->history_milk_packsize)) { $packsize_history = implode("|",$request->history_milk_packsize); }

        // make phone vars
        $phone = PhoneNumber::make($request->phone, 'ID');

        DB::beginTransaction();

        try {
            $user = User::create([
                'type' => User::TYPE_USER,
                'name' => $request->name ?? null,
                'email' => $request->email ?? null,
                'phone' => $phone,
                'password' => $request->date_of_birth,
                'provider' => null,
                'provider_id' => null,
                'active' => true,
                'completed_at' => now(),
                'whatsapp_validate_at' => now(),
                'register_channel' => 'whatsapp'
            ]);

            $user->address_data()->create([
                "address" => $request->address ?? null,
                "province" => $request->province ?? null,
                "city" => $request->city ?? null,
                "district" => $request->district ?? null,
                "postal_code" => $data["postal_code"] ?? null,
                "is_primary" => 1
            ]);

            $user->detail()->create([
                'date_of_birth' => $request->date_of_birth,
                'child_name' => null, //$data['child_name'],
                'child_date_of_birth' => null, //$data['child_date_of_birth'],
                'history_milk_category' => $category_history,
                'history_milk_product' => $brand_history,
                'history_milk_packsize' => $packsize_history,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'throw' => $th->getMessage(),
                'message' => 'Gagal memasukkan data'
            ]);
        }
        DB::commit();

        $voucherInUser = Voucher::where('user_id', $user->id)->get();
        if (!$voucherInUser->count()) {
            $voucher = Voucher::whereNull('given_at')->first();
            if ($voucher) {
                $voucher->update([
                    'user_id' => $user->id,
                    'given_at' => now()
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'detail' => new UserResource($user),
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'province' => ['required'],
            'city' => ['sometimes'],
            'district' => ['sometimes'],
            'postal_code' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'history_milk_category' => ['required', 'array'],
            'history_milk_product' => ['required', 'array'],
            'history_milk_packsize' => ['required', 'array'],
            'child_name' => ['sometimes'],
            'child_date_of_birth' => ['sometimes', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
        ];

        $messages = [
            'email.unique' => ':attribute sudah digunakan'
        ];

        return Validator::make($data, $rules, $messages);
    }



    private function extract_data($data, $type = 'topup'): array
    {
        $array = [];

        switch ($type) {
            case 'redeem':
                foreach ($data as $key => $value) {
                    $array[] = $this->generate_column($type, $value);
                }
                return $array;
                break;
            case 'topup':
                foreach ($data as $key => $value) {
                    $array[] = $this->generate_column($type, $value);
                }
                return $array;
                break;
            default:
                return $array;
                break;
        }
        return [];
    }

    private function generate_column($type, $value)
    {
        $activityText = $this->activity_generator($type, $value);

        return [
            'kode' => $value->transaction_code,
            'date' => $value->created_at,
            'activity' => $activityText,
            'status' => $this->status_generator($value->status, $type),
            'type' => $type,
            'note' => $value->note,
            'failed_reason' => $value->failed_reason,
        ];
    }

    private function status_generator($status, $type){
        switch ($type) {
            case 'topup':
                if ($status == TopUp::STATUS_CREATED) {
                    return 'Menunggu Konfirmasi';
                }
                if ($status == TopUp::STATUS_FAILED) {
                    return 'Top Up Gagal';
                }
                if ($status == TopUP::STATUS_PROCESS) {
                    return 'Sedang Diproses';
                }
                if ($status == TopUp::STATUS_SUCCESS) {
                    return 'Top Up Berhasil';
                }
                return $status;
                break;
            case 'redeem':
                if ($status == TopUp::STATUS_CREATED) {
                    return 'Menunggu Konfirmasi';
                }
                if ($status == TopUp::STATUS_FAILED) {
                    return 'Pengiriman Tertunda';
                }
                if ($status == TopUP::STATUS_PROCESS) {
                    return 'Sedang Diproses';
                }
                if ($status == TopUp::STATUS_SUCCESS) {
                    return 'Hadiah Terkirim';
                }
                if ($status == TopUp::STATUS_SEND) {
                    return 'Dalam Pengiriman';
                }
                return $status;
                break;

            default:
                return $status;
                break;
        }
    }

    private function activity_generator($type, $value)
    {
        $status = $value->status;
        if ($type == 'topup') {
            switch ($status) {
                case TopUp::STATUS_CREATED:
                    return __('Upload Struk');
                    break;
                case TopUp::STATUS_PROCESS;
                    return __('Upload Struk');
                    break;
                case TopUp::STATUS_SUCCESS;
                    return $value->point ? number_format($value->point, 0, ',', '.') . " poin telah ditambahkan" : __('Kesalahan Kalkulasi');
                    break;
                case TopUp::STATUS_FAILED;
                    return __('Upload Struk');
                    break;
                default:
                    return __('Upload Struk');
                    break;
            }
        }elseif ($type == 'redeem') {

            $rewardName = $value->reward->name;
            $rewardPoint = $value->point;

            switch ($status) {
                case Redeem::STATUS_CREATED:
                    return __('Klaim Hadiah') ." ". $rewardName;
                    break;
                case Redeem::STATUS_PROCESS;
                    return __('Klaim Hadiah') ." ". $rewardName;
                    break;
                case Redeem::STATUS_SUCCESS;
                    return $rewardName . " berhasil terkirim";
                    break;
                case Redeem::STATUS_SEND;
                    return __('Klaim Hadiah') ." ". $rewardName;
                    break;
                case Redeem::STATUS_FAILED;
                    return __('Klaim Hadiah') ." ". $rewardName;
                    break;
                default:
                    return __('Kesalahan Kalkulasi');
                    break;
            }
        }
    }
}

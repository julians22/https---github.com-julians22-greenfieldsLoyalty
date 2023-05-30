<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Redeem;
use App\Models\TopUp;
use Illuminate\Support\Arr;
use Indonesia;

use function PHPUnit\Framework\returnSelf;

/**
 * Class AccountController.
 */
class AccountController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $tranasctions = [];

        // $topup = TopUp::where('user_id', auth()->user()->id)->get();

        // $redeem = Redeem::where('user_id', auth()->user()->id)->get();

        // Arr::

        // dd($this->extract_data($topup, 'topup'));

        return view('frontend.user.account');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        $provinces = Indonesia::allProvinces();

        $address = null;
        if (auth()->user()->isHasAddressData()) {
            $address = auth()->user()->address_data;
        }


        return view('frontend.user.edit-account', compact('provinces', 'address'));
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
        if ($type == 'topup') {
            $amountText = $this->amount_generator('topup', $value);
        }

        // $amountText = $value->reward->point;
        $activity_name = $type;

        return [
            'id' => $value->id,
            'date' => $value->created_at,
            'activity' => $activity_name . " " . $amountText,
            'status' => $value->status
        ];
    }

    private function amount_generator($type, $value)
    {
        $status = $value->status;
        if ($type == 'topup') {
            switch ($status) {
                case TopUp::STATUS_CREATED:
                    return __('Menunggu untuk di proses.');
                    break;
                case TopUp::STATUS_PROCESS;
                    return __('Sedang di proses.');
                    break;
                case TopUp::STATUS_SUCCESS;
                    return $value->point ? $value->point . " Pts" : __('Kesalahan Kalkulasi');
                    break;
                default:
                    return __('Kesalahan Kalkulasi');
                    break;
            }
        }
    }
}

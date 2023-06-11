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
        $transactions = [];

        $topup = TopUp::where('user_id', auth()->user()->id)->take(5)->get();

        $redeem = Redeem::where('user_id', auth()->user()->id)->take(5)->get();

        $transactions = array_merge($this->extract_data($topup, 'topup'), $this->extract_data($redeem, 'redeem'));

        $transactions = collect($transactions)->sortByDesc('date')->toArray();

        // dd($transactions);

        return view('frontend.user.account', compact('transactions'));
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

    public function show_completion()
    {
        $provinces = Indonesia::allProvinces();

        $survey_categories = config('survey.categories');
        $survey_brands = config('survey.brands');
        $survey_packsizes = config('survey.packsizes');

        return view('frontend.user.complete-account', compact(
            "survey_categories",
            "survey_brands",
            "survey_packsizes",
            "provinces"
            ));
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
        $amountText = $this->amount_generator($type, $value);

        switch ($type) {
            case 'topup':
                $activity_name = 'Upload Struk |';
                break;
            case 'redeem':
                $activity_name = 'Klaim Hadiah |';
                break;
            default:
                $activity_name = $type;
                break;
        }


        return [
            'id' => $value->id,
            'kode' => $value->transaction_code,
            'date' => $value->created_at,
            'activity' => $activity_name . " " . $amountText,
            'status' => $this->status_generator($value->status, $type),
            'type' => $type
        ];
    }

    private function status_generator($status, $type){
        switch ($type) {
            case 'topup':
                if ($status == TopUp::STATUS_CREATED) {
                    return 'Menunggu Konfirmasi';
                }
                if ($status == TopUp::STATUS_FAILED) {
                    return 'Gagal';
                }
                if ($status == TopUP::STATUS_PROCESS) {
                    return 'Sedang diproses';
                }
                if ($status == TopUp::STATUS_SUCCESS) {
                    return 'Sedang diproses';
                }
                return $status;
                break;
            case 'redeem':
                if ($status == TopUp::STATUS_CREATED) {
                    return 'Menunggu Konfirmasi';
                }
                if ($status == TopUp::STATUS_FAILED) {
                    return 'Gagal';
                }
                if ($status == TopUP::STATUS_PROCESS) {
                    return 'Sedang diproses';
                }
                if ($status == TopUp::STATUS_SUCCESS) {
                    return 'Sedang diproses';
                }
                if ($status == TopUp::STATUS_SEND) {
                    return 'Sedang dikirim';
                }
                return $status;
                break;

            default:
                return $status;
                break;
        }
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
                case TopUp::STATUS_FAILED;
                    return __('Gagal') . " ". $value->failed_reason;
                    break;
                default:
                    return __('Kesalahan Kalkulasi');
                    break;
            }
        }elseif ($type == 'redeem') {
            switch ($status) {
                case Redeem::STATUS_CREATED:
                    return __('Menunggu untuk di proses.');
                    break;
                case Redeem::STATUS_PROCESS;
                    return __('Sedang di proses.');
                    break;
                case Redeem::STATUS_SUCCESS;
                    return $value->reward->name . " (" .$value->reward->point . " Pts ) Sudah diterima";
                    break;
                case Redeem::STATUS_SEND;
                    return "<strong>".$value->reward->name . " (" .$value->reward->point . " Pts ) </strong> Sedang dikirim";
                    break;
                default:
                    return __('Kesalahan Kalkulasi');
                    break;
            }
        }
    }
}

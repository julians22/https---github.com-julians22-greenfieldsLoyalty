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
        $activityText = $this->activity_generator($type, $value);

        return [
            'id' => $value->id,
            'kode' => $value->transaction_code,
            'date' => $value->created_at,
            'activity' => $activityText,
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
                default:
                    return __('Kesalahan Kalkulasi');
                    break;
            }
        }
    }
}

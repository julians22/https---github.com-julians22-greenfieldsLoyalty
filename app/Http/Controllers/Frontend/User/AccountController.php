<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Redeem;
use App\Models\TopUp;
use Arr;
use Indonesia;

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
        return view('frontend.user.account');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        $provinces = Indonesia::allProvinces();

        $tranasctions = [];

        $topup = TopUp::where('user_id'. auth()->id)->get();

        $redeem = Redeem::where('user_id', auth()->id)->get();

        return view('frontend.user.edit-account', compact('provinces'));
    }


    private function extract_data($data, $type = 'topup'): array
    {
        $arrray = [];

        switch ($type) {
            case 'redeem':

                foreach ($data as $key => $value) {

                    $this->generate_column($tyoe, $value);


                }

                break;

            default:
                # code...
                break;
        }



        return [];
    }

    private function generate_column($tyoe, $value)
    {
        $amountText = $value->reward->point;
        $activity_name = $value->reward->name;

        return [
            'id' => $value->id,
            'date' => $value->created_at,
            'activity' => $activity_name . " " . $amountText,
            'status' => $value->status
        ];
    }

    // private fun
}

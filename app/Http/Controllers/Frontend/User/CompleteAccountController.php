<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use Propaganistas\LaravelPhone\PhoneNumber;

class CompleteAccountController extends Controller
{
    /**
     * @param  UpdateProfileRequest  $request
     * @param  UserService  $userService
     * @return mixed
     */
    public function submit_completion(Request $request, UserService $userService)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'province' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'postal_code' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'history_milk_category' => ['required'],
            'history_milk_product' => ['required'],
            'history_milk_packsize' => ['required'],
            'others_packsize' => ['sometimes'],
            'child_name' => ['required'],
            'child_date_of_birth' => ['required', 'date'],
            'terms' => ['required', 'in:1'],
        ]);

        $postPhone = PhoneNumber::make($request->phone, 'ID');

        $user = $userService->updateProfile($request->user(), $validator->validated());

        $brand_history = "";

        if (!empty($request->history_milk_product)) {
            $brand_history = implode("|",$request->history_milk_product);
        }

        $packsize = $request->history_milk_packsize;

        if ($packsize == 'Others' && !empty($request->others_packsize)) {
            $packsize = $request->others_packsize;
        }

        $user_detail = [
            "child_name" => $request->child_name ?? null,
            "date_of_birth" => $request->date_of_birth ?? null,
            "child_date_of_birth" => $request->child_date_of_birth ?? null,
            "phone" => $postPhone,
            'history_milk_category' => $request->history_milk_category,
            'history_milk_product' => $brand_history,
            'history_milk_packsize' => $packsize,
        ];

        if ($user && !$user->isHasDetail()) {
            $user->detail()->create($user_detail);
        }else{
            $user->detail()->update($user_detail);
        }

        return redirect()->route('frontend.auth.verification.whatsapp.validate')
            ->withSwalWarning('Satu langkah lagi, silahkan verifikasi nomor whatsapp kamu terlebih dahulu ya!');
    }
}

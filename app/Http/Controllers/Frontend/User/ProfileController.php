<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
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

        $postPhone = PhoneNumber::make($request->phone, 'ID');

        $user = $userService->updateProfile($request->user(), $request->validated());

        $user_detail = [
            "child_name" => $request->child_name ?? null,
            "date_of_birth" => $request->date_of_birth ?? null,
            "child_date_of_birth" => $request->child_date_of_birth ?? null,
            "phone" => $postPhone
        ];

        if ($user && !$user->isHasDetail()) {
            $user->detail()->create($user_detail);
        }else{
            $user->detail()->update($user_detail);
        }


        if ($user->isWhatsappVerified()) {
            return redirect()->route('frontend.user.account')->withSwalSuccess(__('Profile successfully updated.'));
        }

        return redirect()->route('frontend.auth.verification.whatsapp.validate')
            ->withSwalWarning('Satu langkah lagi, silahkan verifikasi nomor whatsapp kamu terlebih dahulu ya!');

    }
}

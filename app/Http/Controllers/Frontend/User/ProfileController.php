<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;

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
            "child_date_of_birth" => $request->child_date_of_birth ?? null,
            "phone" => $request->phone ?? null
        ];

        if ($user && !$user->isHasDetail()) {
            $user->detail()->create($user_detail);
        }

        $user->detail()->update($user_detail);

        $user_address = [
            "address" => $request->address ?? null,
            "province" => $request->province ?? null,
            "city" => $request->city ?? null,
            "district" => $request->district ?? null,
            "postal_code" => $request->postal_code ?? null
        ];

        if ($user && !$user->isHasAddressData()) {
            $user->address_data()->create($user_address);
        }

        $user->address_data()->update($user_address);


        // if (session()->has('resent')) {
        //     return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        // }

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('Profile successfully updated.'));
    }
}

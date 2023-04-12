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
        // dd($request->all());
        $user = $userService->updateProfile($request->user(), $request->validated());

        $user_detail = [
            "date_of_birth" => $request->dob,
            "phone" => $request->phone,
            "province" => $request->province,
            "city" => $request->city,
            "child_name" => $request->child_name,
            "child_date_of_birth" => $request->child_dob,
            "address" => $request->address,
            "postal_code" => $request->postal_code
        ];

        if ($user && !$user->isHasDetail()) {
            $user->detail()->create($user_detail);
        }

        $user->detail()->update($user_detail);


        if (session()->has('resent')) {
            return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        }

        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }
}

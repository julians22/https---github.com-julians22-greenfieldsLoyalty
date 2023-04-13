<?php

namespace App\Http\Controllers\Frontend\User;

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
        $provinces = Indonesia::all();
        return view('frontend.user.account');
    }
}

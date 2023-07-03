<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $totalCustomer = User::users()->count();

        return view('backend.dashboard', compact('totalCustomer'));
    }
}

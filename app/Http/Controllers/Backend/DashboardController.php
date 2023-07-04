<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;
use App\Models\TopUp;

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
        $todayUploadReceipt = TopUp::whereDate('created_at', now()->format('Y-m-d'))->count();
        $totalUploadReceipt = TopUp::count();
        $unprocessedReceipt = TopUp::where('status', TopUp::STATUS_CREATED)->count();

        return view('backend.dashboard', compact('totalCustomer', 'todayUploadReceipt', 'totalUploadReceipt', 'unprocessedReceipt'));
    }
}

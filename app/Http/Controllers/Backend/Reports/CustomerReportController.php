<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerReportController extends Controller
{
    public function index() {

        $customerData = User::
            users()
            ->get(['id', 'created_at']);

        return view('backend.reports.customers.index', compact('customerData'));
    }
}

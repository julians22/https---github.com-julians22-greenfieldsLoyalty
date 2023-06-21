<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\VouchersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VoucherController extends Controller
{
    public function index()
    {
        return view('backend.vouchers.index');
    }

    public function upload()
    {
        return view('backend.vouchers.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'file'
        ]);

        Excel::import(new VouchersImport, $request->file);
    }
}

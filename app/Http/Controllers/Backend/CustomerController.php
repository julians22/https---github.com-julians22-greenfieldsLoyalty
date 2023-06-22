<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        return view('backend.customers.index');
    }

    public function show(User $user) {
        return view('backend.customers.show', compact('user'));
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Users\UserResource;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class UserController extends Controller
{
    /**
     * Check user method
     *
     * Check user is axists or not
     *
     * @param Request $request
     * @return User
     **/
    public function check_user(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        $phone = $request->get('phone');

        $phone = PhoneNumber::make($phone, 'ID');

        $user = User::where('phone', $phone)->first();

        $result = [
            'pass' => true,
            'detail' => new UserResource($user)
        ];

        return $result;
    }

    /**
     * Register user method
     *
     * Fungsi untuk mendaftarkan pengguna melalui API
     *
     **/
    public function store(Request $request)
    {

    }
}

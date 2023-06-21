<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class PasswordValidation extends Controller
{
    public function validate_password(Request $request){
        $request->validate([
            'password' => ['max:100', Password::min(8)->numbers()->mixedCase(), 'confirmed'],
        ]);

        return response()->json([
            'valid' => true
        ]);
    }
}

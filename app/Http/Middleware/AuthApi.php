<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $username = env('AUTH_API_USERNAME',"greenfields_api_2023");
        $password = env('AUTH_API_PASSWORD',"ztIQgFtTOFOcn8Uq");

        // basic auth laravel
        if (!empty($request->header('Authorization'))) {
            [$type, $credentials] = explode(" ", trim($request->header('Authorization')));

            if (strtolower($type)!== 'basic')
                return response()->json([
                   'status' => false,
                   'message' => 'Unauthorized',
                ],401);

            $decoded = base64_decode($credentials);

            [$user,$pass] = explode(':', $decoded);

            if ($user!= $username || $pass != $password){
                return response()->json(
                    [
                        'status'=>false,
                        'message'=>'Unauthorized'
                    ]
                );
            }

            return $next($request);
        } else {
            return response()->json(['status'=>false, 'message'=>'Unauthorized'], 401);
        }
    }
}

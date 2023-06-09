<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserCompleteDetail
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
        if (! $request->user()->isCompleteRegister()) {
            return redirect()->route('frontend.user.completion-account')
                ->withSwalWarning(' Lengkapi profil ibu untuk mendapatkan hadiah dan aktivitas menarik dari greenfields');

        }
        return $next($request);
    }
}

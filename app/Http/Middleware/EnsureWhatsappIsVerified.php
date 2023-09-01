<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Redirect;
use URL;

class EnsureWhatsappIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() || is_null($request->user()->whatsapp_validate_at)) {
            session()->reflash();
            return $request->expectsJson()
                    ? abort(403, 'Nomor Whatsapp kamu belum terverifikasi.')
                    : Redirect::guest(URL::route($redirectToRoute ?: 'frontend.auth.verification.whatsapp.notice'));
        }

        return $next($request);
    }
}

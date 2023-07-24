<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

/**
 * Class Kernel.
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \App\Http\Middleware\LocaleMiddleware::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Domains\Auth\Http\Middleware\ToBeLoggedOut::class,
            \App\Http\Middleware\OfflineUserMiddleware::class
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'admin' => [
            /*
             * This is configurable, disable boilerplate.access.user.admin_requires_2fa instead of removing this
             */
            '2fa:enabled',
            'auth_admin',
            'password.expires',
            'is_admin',
        ],

        'completes_detail' => [
            'auth',
            'user_complete_detail'
        ]
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        '2fa' => \App\Domains\Auth\Http\Middleware\TwoFactorAuthenticationStatus::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth_api' => \App\Http\Middleware\AuthApi::class,
        'auth_admin' => \App\Http\Middleware\AuthenticateAdmin::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'is_admin' => \App\Domains\Auth\Http\Middleware\AdminCheck::class,
        'is_super_admin' => \App\Domains\Auth\Http\Middleware\SuperAdminCheck::class,
        'is_user' => \App\Domains\Auth\Http\Middleware\UserCheck::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'password.expires' => \App\Domains\Auth\Http\Middleware\PasswordExpires::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'type' => \App\Domains\Auth\Http\Middleware\UserTypeCheck::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'whatsapp_verified' => \App\Http\Middleware\EnsureWhatsappIsVerified::class,
        'user_complete_detail' => \App\Http\Middleware\UserCompleteDetail::class,
        'firewall' => \App\Http\Middleware\ShieldonFirewall::class,

        // addition role middleware
        'is_logistic_admin' => \App\Http\Middleware\AdminLogisticCheck::class,
        'is_validator_admin' => \App\Http\Middleware\AdminValidatorCheck::class
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}

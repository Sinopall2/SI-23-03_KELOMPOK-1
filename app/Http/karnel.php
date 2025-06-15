<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

protected $routeMiddleware = [
    // middleware bawaan Laravel
    'auth' => \App\Http\Middleware\Authenticate::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    // dan lainnya...

    // tambahkan middleware is_admin di sini
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];
}

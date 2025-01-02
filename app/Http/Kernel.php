<?php

namespace app\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        // ... middleware lainnya
       'checkRole' => \App\Http\Middleware\CheckRole::class,

    ];
}
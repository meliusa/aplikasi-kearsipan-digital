<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    protected $proxies;

    // Ganti ke HEADER_X_FORWARDED_FOR jika ALL tidak tersedia
    protected $headers = Request::HEADER_X_FORWARDED_FOR;
}

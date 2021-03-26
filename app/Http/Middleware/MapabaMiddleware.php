<?php

namespace App\Http\Middleware;

use Closure;

class MapabaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->status_kaderisasi == null){
            return redirect('/profile')->with('info', 'Anda harus Mapaba Terlebih Daluhu Sebelum Mengakses Halaman ini');
        }
        return $next($request);
    }
}

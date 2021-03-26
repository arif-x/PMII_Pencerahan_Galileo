<?php

namespace App\Http\Middleware;

use Closure;

class VerifyDataMiddleware
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
        if(auth()->user()->verifikasi == 'Belum Verifikasi'){
            return redirect('/verify')->with('info', 'Verifikasi Data untuk Mengakses Profil!');
            if (auth()->user()->verifikasi == 'Perlu Diverifikasi') {
            return redirect('/profile')->with('info', 'Data Anda Masih dalam Proses Verifikasi, Harap Bersabar!');
                if (auth()->user()->verifikasi == 'Suspend') {
                    return redirect('/profile')->with('info', 'Suspended!');
                    if (auth()->user()->verifikasi == 'Submit Ulang') {
                        return redirect('/verify')->with('info', 'Data Anda Tidak Valid, Harap Submit Ulang!');
                    }
                }
            }
        }
        return $next($request);        
    }
}

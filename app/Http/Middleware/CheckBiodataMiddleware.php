<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBiodataMiddleware
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
        if (
            auth()->user()->alamat_asli == null || 
            auth()->user()->jenis_kelamin == null || 
            auth()->user()->tanggal_lahir == null || 
            auth()->user()->jurusan == null || 
            auth()->user()->alamat_di_malang == null || 
            auth()->user()->alamat_asli == null || 
            auth()->user()->nama_ayah == null || 
            auth()->user()->nama_ibu == null || 
            auth()->user()->no_hp == null || 
            auth()->user()->minat == null || 
            auth()->user()->bakat == null || 
            auth()->user()->alasan == null || 
            auth()->user()->target_ke_depan == null
        ){
            return redirect('/isi-biodata')->with('error', 'Mohon Lengkapi Biodata Sebelum Verifikasi');                          
        }        
        return $next($request);
    }
}
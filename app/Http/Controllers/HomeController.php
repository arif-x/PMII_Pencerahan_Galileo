<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cms;
use App\Event;
use App\EventPengkaderan;
use App\Pengurus;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
    	$article = Cms::where('status', 'Terverifikasi')->limit(4)->get();
        $event = Event::orderBy('id', 'desc')->limit(4)->get();
        $pengkaderan = EventPengkaderan::orderBy('id', 'desc')->limit(4)->get();

        // Pengurus
        $ketua = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Ketua Rayon')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $wakil = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Wakil Ketua Rayon')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $sekretaris = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Sekretaris')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $bendahara = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Bendahara')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $kopri = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Ketua KOPRI')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $sekretarisKopri = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Sekretaris KOPRI')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $bendaharaKopri = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Bendahara KOPRI')
        ->select('pengurus.*', 'users.photo')
        ->get();
        return view('home', ['articles' => $article, 'events' => $event, 'pengkaderans' => $pengkaderan, 'ketuas' => $ketua, 'wakils' => $wakil, 'sekretariss' => $sekretaris, 'bendaharas' => $bendahara, 'kopris' => $kopri, 'sekretarisKopris' => $sekretarisKopri, 'bendaharaKopris' => $bendaharaKopri]);
    }
    
    public function home(){
    	$article = Cms::where('status', 'Terverifikasi')->limit(4)->get();
        $event = Event::orderBy('id', 'desc')->limit(4)->get();
        $pengkaderan = EventPengkaderan::orderBy('id', 'desc')->limit(4)->get();

        // Pengurus
        $ketua = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Ketua Rayon')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $wakil = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Wakil Ketua Rayon')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $sekretaris = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Sekretaris')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $bendahara = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Bendahara')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $kopri = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Ketua KOPRI')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $sekretarisKopri = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Sekretaris KOPRI')
        ->select('pengurus.*', 'users.photo')
        ->get();
        $bendaharaKopri = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Bendahara KOPRI')
        ->select('pengurus.*', 'users.photo')
        ->get();
        return view('home', ['articles' => $article, 'events' => $event, 'pengkaderans' => $pengkaderan, 'ketuas' => $ketua, 'wakils' => $wakil, 'sekretariss' => $sekretaris, 'bendaharas' => $bendahara, 'kopris' => $kopri, 'sekretarisKopris' => $sekretarisKopri, 'bendaharaKopris' => $bendaharaKopri]);
    }
}

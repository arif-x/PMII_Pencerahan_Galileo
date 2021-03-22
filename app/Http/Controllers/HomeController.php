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
        $ketua = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Jabatan 2')
        ->select('pengurus.*', 'users.photo')
        ->get();
        return view('home', ['articles' => $article, 'events' => $event, 'pengkaderans' => $pengkaderan, 'ketuas' => $ketua]);
    }
    
    public function home(){
    	$article = Cms::where('status', 'Terverifikasi')->limit(4)->get();
        $event = Event::orderBy('id', 'desc')->limit(4)->get();
        $pengkaderan = EventPengkaderan::orderBy('id', 'desc')->limit(4)->get();

        // Pengurus
        $ketua = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Jabatan 2')
        ->select('pengurus.*', 'users.photo')
        ->get();
        return view('home', ['articles' => $article, 'events' => $event, 'pengkaderans' => $pengkaderan, 'ketuas' => $ketua]);
    }
}

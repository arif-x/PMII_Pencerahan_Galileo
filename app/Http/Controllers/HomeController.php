<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cms;
use App\Event;
use App\EventPengkaderan;

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
        return view('home', ['articles' => $article, 'events' => $event, 'pengkaderans' => $pengkaderan]);
    }
    
    public function home(){
    	$article = Cms::where('status', 'Terverifikasi')->limit(4)->get();
        $event = Event::orderBy('id', 'desc')->limit(4)->get();
        $pengkaderan = EventPengkaderan::orderBy('id', 'desc')->limit(4)->get();
        return view('home', ['articles' => $article, 'events' => $event, 'pengkaderans' => $pengkaderan]);
    }
}

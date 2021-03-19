<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AbsensiEventKaderisasi;
use App\User;

class SetAllStatusKaderisasiController extends Controller
{
	public function setAll(){
		$events = AbsensiEventKaderisasi::where('id_event', 1)->where('kehadiran', 'Hadir')->pluck('id_user');

		$event = User::whereIn('id', $events)->update([
			'status_kaderisasi' => 'PKD',
		]);

		return back()->with('success', 'Status Kaderisasi Telah Diubah');
	}
}

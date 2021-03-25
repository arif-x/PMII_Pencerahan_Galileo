<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengurus;

class PengurusController extends Controller
{
	public function index(){
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

		$wakilSekretaris = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Wakil Sekretaris')
		->select('pengurus.*', 'users.photo')
		->get();

		$bendahara = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Bendahara')
		->select('pengurus.*', 'users.photo')
		->get();

		$wakilBendahara = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Wakil Bendahara')
		->select('pengurus.*', 'users.photo')
		->get();

		$coPengkaderan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Co. Biro Pengkaderan')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaPengkaderan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota Biro Pengkaderan')
		->select('pengurus.*', 'users.photo')
		->get();

		$coGerakan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Co. Biro Gerakan')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaGerakan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota Biro Gerakan')
		->select('pengurus.*', 'users.photo')
		->get();

		$coKeislaman = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Co. Biro Keislaman')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaKeislaman = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota Biro Keislaman')
		->select('pengurus.*', 'users.photo')
		->get();

		$coPengembanganWawasan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Co. Biro Pengembangan Wawasan')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaPengembanganWawasan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota Biro Pengembangan Wawasan')
		->select('pengurus.*', 'users.photo')
		->get();

		$coFKE = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Co. Biro FKE')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaFKE = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota Biro FKE')
		->select('pengurus.*', 'users.photo')
		->get();

		$fpjMatematika = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Forum Pengembangan Jurusan Matematika')
		->select('pengurus.*', 'users.photo')
		->get();

		$fpjBiologi = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Forum Pengembangan Jurusan Biologi')
		->select('pengurus.*', 'users.photo')
		->get();

		$fpjFisika = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Forum Pengembangan Jurusan Fisika')
		->select('pengurus.*', 'users.photo')
		->get();

		$fpjKimia = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Forum Pengembangan Jurusan Kimia')
		->select('pengurus.*', 'users.photo')
		->get();

		$fpjTeknikInformatika = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Forum Pengembangan Jurusan Teknik Informatika')
		->select('pengurus.*', 'users.photo')
		->get();

		$fpjTeknikArsitektur = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Forum Pengembangan Jurusan Teknik Arsitektur')
		->select('pengurus.*', 'users.photo')
		->get();

		$fpjPerpustakaan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Forum Pengembangan Jurusan Perpustakaan & Ilmu Informasi')
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

		$coInternal = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Co. Biro Internal')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaInternal = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota Biro Internal')
		->select('pengurus.*', 'users.photo')
		->get();

		$coEksternal = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Co. Biro Eksternal')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaEksternal = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota Biro Eksternal')
		->select('pengurus.*', 'users.photo')
		->get();

		$direkturJurnalistik = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Direktur LSO Jurnalistik')
		->select('pengurus.*', 'users.photo')
		->get();

		$sekretarisJurnalistik = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Sekretaris LSO Jurnalistik')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaJurnalistik = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota LSO Jurnalistik')
		->select('pengurus.*', 'users.photo')
		->get();

		$direkturGAPALA = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Direktur LSO GAPALA')
		->select('pengurus.*', 'users.photo')
		->get();

		$sekretarisGAPALA = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Sekretaris LSO GAPALA')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaGAPALA = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota LSO GAPALA')
		->select('pengurus.*', 'users.photo')
		->get();

		$direkturKewirausahaan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Direktur LSO Kewirausahaan')
		->select('pengurus.*', 'users.photo')
		->get();

		$sekretarisKewirausahaan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Sekretaris LSO Kewirausahaan')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaKewirausahaan = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota LSO Kewirausahaan')
		->select('pengurus.*', 'users.photo')
		->get();

		$direkturTEGAL = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Direktur LSO TEGAL')
		->select('pengurus.*', 'users.photo')
		->get();

		$sekretariesTEGAL = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Sekretaris LSO TEGAL')
		->select('pengurus.*', 'users.photo')
		->get();

		$anggotaTEGAL = Pengurus::join('users', 'users.nim', '=', 'pengurus.nim')->where('pengurus.jabatan', 'Anggota LSO TEGAL')
		->select('pengurus.*', 'users.photo')
		->get();

		return view('pengurus', [
			'ketuas' => $ketua, 
			'wakils' => $wakil, 

			'sekretariss' => $sekretaris, 
			'wakilSekretariss' => $wakilSekretaris, 

			'bendaharas' => $bendahara, 
			'wakilBendaharas' => $wakilBendahara, 

			'coPengkaderans' => $coPengkaderan,
			'anggotaPengkaderans' => $anggotaPengkaderan,

			'coGerakans' => $coGerakan,
			'anggotaGerakans' => $anggotaGerakan,

			'coKeislamans' => $coKeislaman,
			'anggotaKeislamans' => $anggotaKeislaman,

			'coPengembanganWawasans' => $coPengembanganWawasan,
			'anggotaPengembanganWawasans' => $anggotaPengembanganWawasan,

			'coFKEs' => $coFKE,
			'anggotaFKEs' => $anggotaFKE,

			'fpjMatematikas' => $fpjMatematika,
			'fpjBiologis' => $fpjBiologi,
			'fpjFisikas' => $fpjFisika,
			'fpjKimias' => $fpjKimia,
			'fpjTeknikInformatikas' => $fpjTeknikInformatika,
			'fpjTeknikArsitekturs' => $fpjTeknikArsitektur,
			'fpjPerpustakaans' => $fpjPerpustakaan,

			'kopris' => $kopri, 
			'sekretarisKopris' => $sekretarisKopri, 
			'bendaharaKopris' => $bendaharaKopri,

			'coInternals' => $coInternal,
			'anggotaInternals' => $anggotaInternal,

			'coEksternals' => $coEksternal,
			'anggotaEksternals' => $anggotaEksternal,

			'direkturJurnalistiks' => $direkturJurnalistik,
			'sekretarisJurnalistiks' => $sekretarisJurnalistik,
			'anggotaJurnalistiks' => $anggotaJurnalistik,

			'direkturGAPALAs' => $direkturGAPALA,
			'sekretarisGAPALAs' => $sekretarisGAPALA,
			'anggotaGAPALAs' => $anggotaGAPALA,

			'direkturKewirausahaans' => $direkturKewirausahaan,
			'sekretarisKewirausahaans' => $sekretarisKewirausahaan,
			'anggotaKewirausahaans' => $anggotaKewirausahaan,

			'direkturTEGALs' => $direkturTEGAL,
			'sekretarisTEGALs' => $sekretariesTEGAL,
			'anggotaTEGALs' => $anggotaTEGAL
		]);

	}
}

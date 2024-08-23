<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Home extends BaseController
{
	public function index()
	{
		return view('auth/index');
	}

	public function login()
	{
		return view('auth/login', [
			'config' => config('Auth'),
		]);
	}

	public function register()
	{
		$sekolahModel = new SekolahModel();
		$data['schools'] = $sekolahModel->findAll();

		return view('auth/register', $data);
	}


	public function resetPassword()
	{
		return view('auth/reset-password');
	}

	public function dashboard()
	{
		return view('dashboard/index');
	}

	//function siswa
	public function form_aduan()
	{
		return view('user/form_aduan');
	}

	public function info()
	{
		return view('user/info-jenis');
	}

	public function histori()
	{
		return view('user/histori');
	}

	public function deteksi()
	{
		return view('user/deteksi');
	}

	public function profil()
	{
		return view('user/profil');
	}

	
	public function data_pengaduan()
	{
		return view('admin/data_pengaduan');
	}

	public function guru_list()
	{
		$sekolahModel = new SekolahModel();
		$data['schools'] = $sekolahModel->findAll();
		return view('admin/guru_list');
	}

	public function laporan()
	{
		$sekolahModel = new SekolahModel();
			$data['schools'] = $sekolahModel->findAll();
			return view('admin/laporan', $data);
		
	}

	public function laporan_guru()
	{
		return view('guru/laporan_guru');
	}
}

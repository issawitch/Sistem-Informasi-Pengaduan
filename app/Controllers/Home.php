<?php

namespace App\Controllers;

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
		return view('auth/register');
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

	//admin
	public function data_pengaduan()
	{
		return view('admin/data_pengaduan');
	}
}

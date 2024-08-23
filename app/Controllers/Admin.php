<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\PengaduanModel;
use Myth\Auth\Models\UserModel;

class Admin extends BaseController
{
    public function add_sekolah()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $data = [
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'status' => 'aktif'
        ];

        $sekolahModel = new SekolahModel();

        $sekolahModel->saveSekolah($data);

        return redirect()->to('/sekolah_list')->with('success', 'Data sekolah berhasil disimpan');
    }

    public function update_sekolah()
    {
        // Ambil data dari form edit
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $status = $this->request->getPost('status');

        // Buat array data untuk update
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'status' => $status
        ];

        // Inisialisasi model SekolahModel
        $sekolahModel = new SekolahModel();

        // Panggil metode untuk update data sekolah
        $sekolahModel->updateSekolah($id, $data);

        // Redirect kembali ke halaman sekolah_list dengan pesan sukses
        return redirect()->to('/sekolah_list')->with('success', 'Data sekolah berhasil diperbarui');
    }


    public function sekolah_show()
    {
        $sekolahModel = new SekolahModel();
        $sekolah = $sekolahModel->findAll();

        $data = [
            'sekolah' => $sekolah
        ];

        return view('admin/sekolah_list', $data);
    }


    public function listGuru()
    {
        // Inisialisasi model Users
        $userModel = new UserModel();
        $guruList = $userModel->getGuruList();

        // Mendapatkan daftar sekolah
        $sekolahModel = new SekolahModel();
        $schools = $sekolahModel->findAll();


        // Tampilkan data guru ke view
        return view('admin/guru_list', ['guruList' => $guruList, 'schools' => $schools]);
    }

    public function listSiswa()
    {
        // Inisialisasi model Users
        $userModel = new UserModel();
        $siswaList = $userModel->getSiswaList();

        // Mendapatkan daftar sekolah
        $sekolahModel = new SekolahModel();
        $schools = $sekolahModel->findAll();

        // Tampilkan data guru ke view
        return view('admin/siswa_list', ['siswaList' => $siswaList, 'schools' => $schools]);
    }

    public function listAdmin()
    {
        // Inisialisasi model Users
        $userModel = new UserModel();
        $adminList = $userModel->getAdminList();

        // Mendapatkan daftar sekolah
        $sekolahModel = new SekolahModel();
        $schools = $sekolahModel->findAll();

        // Tampilkan data guru ke view
        return view('admin/admin_list', ['adminList' => $adminList, 'schools' => $schools]);
    }


    public function updateStatus()
    {
        // Pastikan request datang dari POST
        if ($this->request->getMethod() == 'post') {
            $id = $this->request->getPost('user_id');
            $status = $this->request->getPost('status');

            // Load model untuk mengelola data siswa
            $userModel = new UserModel();

            // Lakukan update status siswa
            $userModel->update($id, ['status' => $status]);

            // Redirect ke halaman siswa_list atau halaman lainnya
            return redirect()->back()->with('success', 'Status pengguna berhasil diperbarui');
        } else {
            // Jika bukan request POST, beri respons error atau redirect ke halaman lain
            return redirect()->to('/');
        }
    }


    public function getPengaduanByDate()
    {
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');

        $pengaduanModel = new PengaduanModel();

        $pengaduan = $pengaduanModel->where('tgl >=', $tgl_awal)
            ->where('tgl <=', $tgl_akhir)
            ->findAll();

        return $this->response->setJSON($pengaduan);
    }

    public function laporan()
    {
        // Ambil data sekolah
        $sekolahModel = new SekolahModel();
        $data['schools'] = $sekolahModel->findAll();

        // Ambil data yang dikirim melalui form
        $id_sekolah = $this->request->getPost('asal_sekolah');
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');

        // Inisialisasi model pengaduan
        $pengaduanModel = new PengaduanModel();

        // Bangun query berdasarkan kondisi yang sesuai
        $pengaduanQuery = $pengaduanModel->where('tgl_kejadian >=', $tgl_awal)
            ->where('tgl_kejadian <=', $tgl_akhir);

        if ($id_sekolah) {
            // Jika asal sekolah dipilih, tambahkan kondisi ke query
            $pengaduanQuery->where('id_sekolah', $id_sekolah);
        }

        // Ambil data pengaduan berdasarkan query yang telah dibangun
        $data['pengaduan'] = $pengaduanQuery->findAll();

        // Tampilkan view dengan data yang sudah difilter
        return view('admin/laporan', $data);
    }
}

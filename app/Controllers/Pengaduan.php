<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    public function show()
    {
        $pengaduanModel = new PengaduanModel();

        $userId = user()->nisn;
        $keyword = $this->request->getVar('keyword');
        $perPage = 5;
        $currentPage = $this->request->getVar('page_histori') ?? 1;

        if ($keyword) {
            $pengaduan = $pengaduanModel->where('nisn', $userId)
                ->like('isi_laporan', $keyword)
                ->paginate($perPage, 'histori', $currentPage);
        } else {
            $pengaduan = $pengaduanModel->where('nisn', $userId)
                ->paginate($perPage, 'histori', $currentPage);
        }

        $data = [
            'pengaduan' => $pengaduan,
            'pager' => $pengaduanModel->pager,
            'curpage' => $currentPage
        ];

        return view('user/histori', $data);
    }


    public function admin_show()
    {
        $keyword = $this->request->getVar('keyword');
        $pengaduanModel = new PengaduanModel();

        $perPage = 5;
        $currentPage = $this->request->getVar('data_pengaduan') ?? 1;

        // Jika terdapat keyword pencarian
        if ($keyword) {
            $pengaduanModel->like('tgl', $keyword)
                ->orLike('nisn', $keyword)
                ->orLike('fullname', $keyword)
                ->orLike('asal_sekolah', $keyword)
                ->orLike('isi_laporan', $keyword)
                ->orLike('foto', $keyword)
                ->orLike('status', $keyword);
        }

        $pengaduan = $pengaduanModel->paginate($perPage, 'data_pengaduan', $currentPage);

        $data = [
            'pengaduan' => $pengaduan,
            'pager' => $pengaduanModel->pager,
            'curpage' => $currentPage
        ];

        return view('admin/data_pengaduan', $data);
    }


    public function create()
    {
        $pengaduanModel = new PengaduanModel();

        $nisn = user()->nisn;
        $fullname =  user()->fullname;
        $asal_sekolah =  user()->asal_sekolah;

        if (!$nisn || !$fullname || !$asal_sekolah) {
            return redirect()->back()->withInput()->with('error', 'Sesi tidak lengkap. Silakan coba lagi.');
        }


        // $foto = $this->request->getFile('foto');
        // $newName = $foto->getRandomName();
        // if ($foto->isValid() && !$foto->hasMoved()) {
        //     $foto->move('./img/pengaduan', $newName);
        // }
        // else {
        //     echo $foto->getErrorString();
        // }

        $fotos = $this->request->getFiles('foto');
        $uploadedFiles = [];

        foreach ($fotos as $foto) {
            if ($foto->isValid() && !$foto->hasMoved()) {
                $newName = $foto->getRandomName();
                $foto->move('./img/pengaduan', $newName);
                $uploadedFiles[] = $newName;
            }
        }

        // Gabungkan semua nama file menjadi string dipisahkan koma
        $fotoString = implode(',', $uploadedFiles);

        $data = [
            'tgl' => date('Y-m-d'),
            'nisn' => $nisn,
            'fullname' => $fullname,
            'asal_sekolah' => $asal_sekolah,
            'isi_laporan' => $this->request->getPost('isi'),
            // 'foto' => $newName,
            'foto' => $fotoString,
            'status' => 'proses'
        ];

        if ($pengaduanModel->insert($data)) {
            return redirect()->to('/histori')->with('success', 'Data pengaduan berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data pengaduan. Silakan coba lagi.');
        }
    }

    public function dashboard()
    {
        // Instansiasi model
        $pengaduanModel = new PengaduanModel();

        // Mendapatkan nilai dari session
        $nisn = user()->nisn;

        // Memeriksa apakah session memiliki nilai yang diperlukan
        if (!$nisn) {
            return redirect()->back()->withInput()->with('error', 'Sesi tidak lengkap. Silakan coba lagi.');
        }

        $pengaduanBelumSelesai = $pengaduanModel->where('nisn', $nisn)->where('status', 'proses')->countAllResults();
        $pengaduanSelesai = $pengaduanModel->where('nisn', $nisn)->where('status', 'selesai')->countAllResults();
        $totalPengaduan = $pengaduanModel->where('nisn', $nisn)->countAllResults();

        $data = [
            'pengaduanBelumSelesai' => $pengaduanBelumSelesai,
            'pengaduanSelesai' => $pengaduanSelesai,
            'totalPengaduan' => $totalPengaduan
        ];


        return view('dashboard/index', $data);
    }

    public function detail($id)
    {
        $pengaduanModel = new PengaduanModel();
        $detailPengaduan = $pengaduanModel->find($id);

        if ($detailPengaduan) {
            $data['pengaduan'][] = $detailPengaduan;
        } else {
            // Handle jika data tidak ditemukan, bisa redirect atau tampilkan pesan kesalahan
            return redirect()->back(); // Ganti '/error-page' dengan halaman error yang sesuai
        }

        return view('user/detail-aduan', $data);
    }
}

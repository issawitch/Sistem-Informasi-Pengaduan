<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use DateTime;

class Pengaduan extends BaseController
{

    //menunjukkan data pengaduan di dashboard siswa
    public function show()
    {
        $pengaduanModel = new PengaduanModel();

        $userId = user()->nisn;
        $pengaduan = $pengaduanModel->where('nisn', $userId)->findAll();

        $data = [
            'pengaduan' => $pengaduan
        ];

        return view('user/histori', $data);
    }



    //menunjukkan data pengaduan di dashboard admin
    public function admin_show()
    {
        $pengaduanModel = new PengaduanModel();
        $pengaduan = $pengaduanModel->findAll();

        $data = [
            'pengaduan' => $pengaduan
        ];

        return view('admin/data_pengaduan', $data);
    }


    //menunjukkan data pengaduan di dashboard guru
    public function guru_show()
    {
        // Mendapatkan id_sekolah dari sesi pengguna yang login
        $id_sekolah = user()->id_sekolah;

        $pengaduanModel = new PengaduanModel();

        // Mengambil semua pengaduan berdasarkan id_sekolah
        $pengaduan = $pengaduanModel
            ->where('id_sekolah', $id_sekolah)
            ->findAll();

        $data = [
            'pengaduan' => $pengaduan
        ];

        return view('guru/data_aduan', $data);
    }



    public function create()
    {
        $pengaduanModel = new PengaduanModel();

        $nisn = user()->nisn;
        $fullname =  user()->fullname;
        $id_sekolah =  user()->id_sekolah;

        if (!$nisn || !$fullname || !$id_sekolah) {
            return redirect()->back()->withInput()->with('error', 'Sesi tidak lengkap. Silakan coba lagi.');
        }

        $fotos = $this->request->getFiles('foto');
        $uploadedFiles = [];

        foreach ($fotos as $foto) {
            foreach ($foto as $singleFoto) {
                if ($singleFoto->isValid() && !$singleFoto->hasMoved()) {
                    $newName = $singleFoto->getRandomName();
                    $singleFoto->move('./img/pengaduan', $newName);
                    $uploadedFiles[] = $newName;
                }
            }
        }
        
        $fotoString = implode(',', $uploadedFiles);
        $tgl_kejadian = $this->request->getPost('tgl_kejadian');
        $formattedTglKejadian = date('Y-m-d', strtotime($tgl_kejadian));
        $tgl = new DateTime();

        $data = [
            'tgl' => $tgl->format('Y-m-d'), // Format tanggal saat ini
            'nisn' => $nisn,
            'fullname' => $fullname,
            'id_sekolah' => $id_sekolah,
            'jenis' => $this->request->getPost('jenis'),
            'tgl_kejadian' => $formattedTglKejadian, // Format tanggal kejadian
            'lokasi' => $this->request->getPost('lokasi'),
            'isi_laporan' => $this->request->getPost('isi'),
            'foto' => $fotoString,
            'status' => 'Proses'
        ];

        if ($pengaduanModel->insert($data)) {
            return redirect()->to('/histori')->with('success', 'Data pengaduan berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data pengaduan. Silakan coba lagi.');
        }
    }


    public function detail($id)
    {
        $pengaduanModel = new PengaduanModel();
        $detailPengaduan = $pengaduanModel->find($id);

        if ($detailPengaduan) {
            $data['pengaduan'][] = $detailPengaduan;
        } else {
            return redirect()->back();
        }

        return view('user/detail-aduan', $data);
    }


    //TANGGAPAN & PENYELESAIAN

    public function updateTanggapan()
    {
        $pengaduanModel = new PengaduanModel();

        $id = $this->request->getPost('id');
        $tanggapan = $this->request->getPost('tanggapan');

        $pengaduanModel->update($id, [
            'tanggapan' => $tanggapan,
            'status' => 'Ditanggapi'
        ]);

        return redirect()->back();
    }

    public function updatePenyelesaian()
    {
        $pengaduanModel = new PengaduanModel();

        $id = $this->request->getPost('id');
        $penyelesaian = $this->request->getPost('penyelesaian');
        $img = $this->request->getFiles('img_selesai');
        $uploadedFiles = [];

        if ($img) {
            foreach ($img as $foto) {
                foreach ($foto as $singleFoto) {
                    if ($singleFoto->isValid() && !$singleFoto->hasMoved()) {
                        $newName = $singleFoto->getRandomName();
                        if ($singleFoto->move('./img/penyelesaian', $newName)) {
                            $uploadedFiles[] = $newName;
                        } else {
                            return redirect()->back()->with('error', 'Gagal upload gambar');
                        }
                    }
                }
            }
        }

        // Gabungkan semua nama file menjadi string dipisahkan koma
        $imgString = implode(',', $uploadedFiles);

        $pengaduanModel->update($id, [
            'penyelesaian' => $penyelesaian,
            'img_selesai' => $imgString,
            'status' => 'Selesai'
        ]);

        return redirect()->back()->with('success', 'Data penyelesaian berhasil disimpan');
    }

}

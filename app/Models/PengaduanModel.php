<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'tb_pengaduan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tgl', 'nisn', 'fullname', 'id_sekolah', 'jenis', 'tgl_kejadian', 
    'lokasi', 'isi_laporan', 'foto', 'status', 'tanggapan', 'penyelesaian', 'img_selesai'];

    public function updateTanggapan($id, $data)
    {
        // Tambahkan kondisi WHERE untuk menentukan data yang akan diperbarui
        $this->set($data)->where('id', $id)->update();
    }
}

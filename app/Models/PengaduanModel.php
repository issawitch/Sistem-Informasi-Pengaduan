<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'tb_pengaduan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tgl', 'nisn', 'fullname', 'asal_sekolah', 'isi_laporan', 'foto', 'status'];

}

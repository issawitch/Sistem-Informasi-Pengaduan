<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table      = 'tb_pengaduan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['tgl', 'nisn', 'fullname', 'isi_laporan', 'foto', 'status'];
    
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'tb_sekolah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'alamat', 'email', 'status'];

    public function saveSekolah($data)
    {
        $this->insert($data);
    }

    public function updateSekolah($id, $data)
    {
        // Tambahkan kondisi WHERE untuk menentukan data yang akan diperbarui
        $this->set($data)->where('id', $id)->update();
    }
    
}

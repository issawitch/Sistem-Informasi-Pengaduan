<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'username', 'fullname', 'nip', 'nisn', 'no_telp', 'id_sekolah', 'user_image', 'password'];

    public function updateProfil($id, $data)
    {
        // Tambahkan kondisi WHERE untuk menentukan data yang akan diperbarui
        $this->set($data)->where('id', $id)->update();
    }
    

}


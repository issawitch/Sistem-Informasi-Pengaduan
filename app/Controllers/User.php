<?php

namespace App\Controllers;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    public function editProfil($id)
    {
        // Validasi input POST, Anda bisa menggunakan validation library CI4 di sini

        // Ambil data dari POST request
        $fullname = $this->request->getPost('fullname');
        $no_telp = $this->request->getPost('no_telp');
        $user_image = $this->request->getFile('user_image'); // Ambil file gambar

        // Validasi dan update data di database
        $userModel = new UserModel();

        // Pastikan ID yang akan diupdate ada dan data user ditemukan
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Hanya update field yang diizinkan
        $data = [
            'fullname' => $fullname,
            'no_telp' => $no_telp,
        ];

        // Upload gambar profil jika ada
        if ($user_image->isValid() && !$user_image->hasMoved()) {
            $newName = $user->id . '-' . $user_image->getRandomName();
            $user_image->move('./img/profil', $newName);

            // Simpan nama file gambar ke database
            $data['user_image'] = $newName;
        }

        // Lakukan update data
        $userModel->update($id, $data);

        return redirect()->to('/profil')->with('success', 'Profil berhasil diupdate.');
    }
    
}

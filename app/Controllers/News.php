<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    public function add_news()
    {
        $post = $this->request->getPost();
        $title = $this->request->getPost('title');
        $body = $this->request->getPost('body');
        $author =  user()->fullname;
        $img = $this->request->getFiles('img');
        $uploadedFiles = [];

        foreach ($img as $foto) {
            foreach ($foto as $singleFoto) {
                if ($singleFoto->isValid() && !$singleFoto->hasMoved()) {
                    $newName = $singleFoto->getRandomName();
                    $singleFoto->move('./img/news', $newName);
                    $uploadedFiles[] = $newName;
                }
            }
        }

        // Gabungkan semua nama file menjadi string dipisahkan koma
        $imgString = implode(',', $uploadedFiles);

        $data = [
            'title' => $title,
            'slug' => url_title($post['title'], '-', true),
            'author' => $author,
            'body' => $body,
            'img' => $imgString,
        ];

        $newsModel = new NewsModel();

        $newsModel->saveNews($data);

        return redirect()->to('/news_list')->with('success', 'Data berhasil disimpan');
    }


    public function news_show()
    {
        $newsModel = new NewsModel();
        $news = $newsModel->findAll();

        $data = [
            'news' => $news
        ];

        return view('admin/news_list', $data);
    }


    public function update_news()
    {
        // Ambil data dari form edit
        $id = $this->request->getPost('id');
        $title = $this->request->getPost('title');
        $body = $this->request->getPost('body');
        $img = $this->request->getFiles('img');
        $uploadedFiles = [];

        foreach ($img as $foto) {
            foreach ($foto as $singleFoto) {
                if ($singleFoto->isValid() && !$singleFoto->hasMoved()) {
                    $newName = $singleFoto->getRandomName();
                    $singleFoto->move('./img/news', $newName);
                    $uploadedFiles[] = $newName;
                }
            }
        }

        // Gabungkan semua nama file menjadi string dipisahkan koma
        $imgString = implode(',', $uploadedFiles);


        // Buat array data untuk update
        $data = [
            'title' => $title,
            'body' => $body,
            'img' => $imgString,
        ];

        // Inisialisasi model SekolahModel
        $newsModel = new NewsModel();

        // Panggil metode untuk update data sekolah
        $newsModel->updateNews($id, $data);

        // Redirect kembali ke halaman sekolah_list dengan pesan sukses
        return redirect()->to('/news_list')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $newsModel = new NewsModel();
        
        // Menghapus data berdasarkan primary key (id)
        if ($newsModel->delete($id)) {
            return redirect()->to('/news_list')->with('success', 'Data berhasil dihapus');
        } else {
            // Jika gagal, mungkin ingin mengatur flashdata dan redirect
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $newsModel = new NewsModel();
        $detailNews = $newsModel->find($id);

        if ($detailNews) {
            $data['news'][] = $detailNews;
        } else {
            // Handle jika data tidak ditemukan, bisa redirect atau tampilkan pesan kesalahan
            return redirect()->back(); // Ganti '/error-page' dengan halaman error yang sesuai
        }

        return view('news/news_detail', $data);
    }
}

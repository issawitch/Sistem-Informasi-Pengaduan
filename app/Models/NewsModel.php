<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tgl', 'title', 'slug', 'body', 'img', 'author'];

    public function saveNews($data)
    {
        $this->insert($data);
    }
    
    public function getNews()
    {
        return $this->findAll();
    }

    public function updateNews($id, $data)
    {
        $this->set($data)->where('id', $id)->update();
    }
}

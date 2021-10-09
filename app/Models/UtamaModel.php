<?php

namespace App\Models;

use CodeIgniter\Model;

class UtamaModel extends Model
{
    protected $table = 'dompet';
    protected $allowedFields = ['namaDompet', 'slug', 'idUser'];

    public function getUtama($id)
    {
        return $this->where(['idUser' => $id])->findAll();
    }

    public function getSlug($slug = false)
    {
        return $this->where(['slug' => $slug])->findAll();
    }

    public function cari($keyword)
    {
        return $this->table('dompet')->like('namaDompet', $keyword)->findAll();
    }

    public function getIdDompet($idDompet)
    {
        return $this->where(['idDompet' => $idDompet])->delete();
    }

    public function getUser($id)
    {
        return $this->where(['idUser' => $id])->findAll();
    }
}

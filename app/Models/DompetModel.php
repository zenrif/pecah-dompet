<?php

namespace App\Models;

use CodeIgniter\Model;

class DompetModel extends Model
{
    protected $table = 'uang';
    protected $useTimestamps = true;
    protected $allowedFields = ['idUser', 'idDompet', 'namaDompet', 'slug', 'uangMasuk', 'uangKeluar', 'keterangan', 'saldo'];

    public function getDompet($slug, $idUser)
    {
        return $this->where(['slug' => $slug])->where(['idUser' => $idUser])->findAll();
    }

    public function getSaldo($slug, $idUser)
    {
        $this->where(['slug' => $slug])->where(['idUser' => $idUser]);
        $terakhir = $this->get();
        $tampil = $terakhir->getLastRow();
        return $tampil->saldo;
    }

    public function getPemasukan($slug, $idUser)
    {
        $this->where(['slug' => $slug])->where(['idUser' => $idUser]);
        return $this->builder->selectSum('uangMasuk', 'pemasukan')->get()->getRowArray();
    }

    public function getPengeluaran($slug, $idUser)
    {
        $this->where(['slug' => $slug])->where(['idUser' => $idUser]);
        return $this->builder->selectSum('uangKeluar', 'pengeluaran')->get()->getRowArray();
    }

    public function getID($id)
    {
        return $this->where(['id' => $id])->findAll();
    }

    public function cari($keyword, $slug, $idUser)
    {
        return $this->table('uang')->where(['idUser' => $idUser])->where(['slug' => $slug])->like('keterangan', $keyword)->findAll();
    }

    public function getIdDompet($idDompet, $idUser)
    {
        return $this->where(['idUser' => $idUser])->where(['idDompet' => $idDompet])->findColumn('id');
    }
}

<?php

namespace App\Controllers;

use App\Models\DompetModel;
use App\Models\UtamaModel;
use App\Models\UsersModel;

class Dompet extends BaseController
{
    protected $dompetModel;

    public function __construct()
    {
        $this->dompetModel = new DompetModel();
        $this->utamaModel = new UtamaModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $slug = $_POST['slug'];
        $idUser = $_POST['idUser'];
        $data = [
            'title' => 'Dompet',
            'dompet' => $this->dompetModel->getDompet($slug, $idUser),
            'utama' => $this->utamaModel->getUtama($idUser),
            'slug' => $this->utamaModel->getSlug($slug)
        ];

        if (empty($data['dompet'])) {
            if (empty($data['slug'])) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Dompet ' . $slug . ' tidak ditemukan.');
            }
            return view('dompet/baru', $data);
        }

        $data = [
            'title' => 'Dompet',
            'dompet' => $this->dompetModel->getDompet($slug, $idUser),
            'saldo' => $this->dompetModel->getSaldo($slug, $idUser),
            'pemasukan' => $this->dompetModel->getPemasukan($slug, $idUser),
            'pengeluaran' => $this->dompetModel->getPengeluaran($slug, $idUser),
            'idUser' => $idUser,
            'user' => $this->usersModel->getUser($idUser),
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/template', $data);
        echo view('layout/navbarDompet');
        echo view('dompet/index', $data);
    }

    public function baru()
    {
        $saldo = $_POST['uangMasuk'];

        $this->dompetModel->save([
            'idUser' => $_POST['idUser'],
            'idDompet' => $_POST['idDompet'],
            'namaDompet' => $_POST['namaDompet'],
            'slug' => $_POST['slug'],
            'uangMasuk' => $_POST['uangMasuk'],
            'keterangan' => $_POST['keterangan'],
            'saldo' => $saldo
        ]);
        $slug = $_POST['slug'];
        $idUser = $_POST['idUser'];
        $data = [
            'title' => 'Dompet',
            'dompet' => $this->dompetModel->getDompet($slug, $idUser),
            'saldo' => $this->dompetModel->getSaldo($slug, $idUser),
            'pemasukan' => $this->dompetModel->getPemasukan($slug, $idUser),
            'pengeluaran' => $this->dompetModel->getPengeluaran($slug, $idUser),
            'idUser' => $idUser,
            'user' => $this->usersModel->getUser($idUser),
            'validation' => \Config\Services::validation()
        ];

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        echo view('layout/template', $data);
        echo view('layout/navbarDompet');
        echo view('dompet/index', $data);
    }
    public function masuk()
    {
        if (is_numeric($_POST['uangMasuk'])) {
            $saldo = $_POST['saldo'] + $_POST['uangMasuk'];
            $this->dompetModel->save([
                'idUser' => $_POST['idUser'],
                'idDompet' => $_POST['idDompet'],
                'namaDompet' => $_POST['namaDompet'],
                'slug' => $_POST['slug'],
                'uangMasuk' => $_POST['uangMasuk'],
                'keterangan' => $_POST['keterangan'],
                'saldo' => $saldo
            ]);

            $idUser = $_POST['idUser'];
            $slug = $_POST['slug'];
            $data = [
                'title' => 'Dompet',
                'dompet' => $this->dompetModel->getDompet($slug, $idUser),
                'saldo' => $this->dompetModel->getSaldo($slug, $idUser),
                'pemasukan' => $this->dompetModel->getPemasukan($slug, $idUser),
                'pengeluaran' => $this->dompetModel->getPengeluaran($slug, $idUser),
                'idUser' => $idUser,
                'user' => $this->usersModel->getUser($idUser),
                'validation' => \Config\Services::validation()
            ];
            session()->setFlashdata('pesan', 'Data pemasukan berhasil ditambahkan.');
            echo view('layout/template', $data);
            echo view('layout/navbarDompet');
            echo view('dompet/index', $data);
        }
        $data = [
            'title' => 'Dompet',
            'dompet' => $this->dompetModel->getDompet($slug, $idUser),
            'saldo' => $this->dompetModel->getSaldo($slug, $idUser),
            'pemasukan' => $this->dompetModel->getPemasukan($slug, $idUser),
            'pengeluaran' => $this->dompetModel->getPengeluaran($slug, $idUser),
            'idUser' => $idUser,
            'user' => $this->usersModel->getUser($idUser),
            'validation' => \Config\Services::validation()
        ];
        session()->setFlashdata('gagal', 'Data pemasukan gagal ditambahkan karena bukan angka');
        echo view('layout/template', $data);
        echo view('layout/navbarDompet');
        echo view('dompet/index', $data);
    }

    public function keluar()
    {
        // d($_POST);
        if (is_numeric($_POST['uangKeluar'])) {
            $saldo = $_POST['saldo'] - $_POST['uangKeluar'];
            // d($saldo);
            $this->dompetModel->save([
                'idUser' => $_POST['idUser'],
                'idDompet' => $_POST['idDompet'],
                'namaDompet' => $_POST['namaDompet'],
                'slug' => $_POST['slug'],
                'uangKeluar' => $_POST['uangKeluar'],
                'keterangan' => $_POST['keterangan'],
                'saldo' => $saldo
            ]);

            $idUser = $_POST['idUser'];
            $slug = $_POST['slug'];
            $data = [
                'title' => 'Dompet',
                'dompet' => $this->dompetModel->getDompet($slug, $idUser),
                'saldo' => $this->dompetModel->getSaldo($slug, $idUser),
                'pemasukan' => $this->dompetModel->getPemasukan($slug, $idUser),
                'pengeluaran' => $this->dompetModel->getPengeluaran($slug, $idUser),
                'idUser' => $idUser,
                'user' => $this->usersModel->getUser($idUser),
                'validation' => \Config\Services::validation()
            ];
            session()->setFlashdata('pesan', 'Data pengeluaran berhasil ditambahkan');

            echo view('layout/template', $data);
            echo view('layout/navbarDompet');
            echo view('dompet/index', $data);
        }
        $idUser = $_POST['idUser'];
        $slug = $_POST['slug'];
        $data = [
            'title' => 'Dompet',
            'dompet' => $this->dompetModel->getDompet($slug, $idUser),
            'saldo' => $this->dompetModel->getSaldo($slug, $idUser),
            'pemasukan' => $this->dompetModel->getPemasukan($slug, $idUser),
            'pengeluaran' => $this->dompetModel->getPengeluaran($slug, $idUser),
            'idUser' => $idUser,
            'user' => $this->usersModel->getUser($idUser),
            'validation' => \Config\Services::validation()
        ];
        session()->setFlashdata('gagal', 'Data pengeluaran gagal ditambahkan karena bukan angka');

        echo view('layout/template', $data);
        echo view('layout/navbarDompet');
        echo view('dompet/index', $data);
    }

    public function editMasuk($id)
    {
        $data = [
            'title' => 'Edit Pemasukan',
            'dompetID' => $this->dompetModel->getID($id)
        ];

        echo view('layout/template', $data);
        echo view('dompet/editMasuk', $data);
    }

    public function editKeluar($id)
    {
        $data = [
            'title' => 'Edit Pengeluaran',
            'dompetID' => $this->dompetModel->getID($id)
        ];

        echo view('layout/template', $data);
        echo view('dompet/editKeluar', $data);
    }

    public function simpanEditMasuk()
    {
        $saldoLama = $_POST['saldo'] - $_POST['uangMasukLama'];

        $this->dompetModel->save([
            'id' => $_POST['id'],
            'uangMasuk' => $_POST['uangMasuk'],
            'keterangan' => $_POST['keterangan'],
            'saldo' =>  $saldoLama + $_POST['uangMasuk']
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->back();
    }

    public function simpanEditKeluar()
    {

        $saldoLama = ((int)$_POST['saldo'] + (int)$_POST['uangKeluarLama']);

        $this->dompetModel->save([
            'id' => $_POST['id'],
            'uangKeluar' => $_POST['uangKeluar'],
            'keterangan' => $_POST['keterangan'],
            'saldo' =>  $saldoLama - $_POST['uangKeluar']
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->back();
    }

    public function hapus($id)
    {
        $this->dompetModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function cari()
    {

        $keyword = $_POST['keyword'];
        $slug = $_POST['slug'];
        $idUser = $_POST['idUser'];
        $dompet = $this->dompetModel->cari($keyword, $slug, $idUser);

        $data = [
            'title' => 'Dompet',
            'dompet' => $dompet,
            'saldo' => $this->dompetModel->getSaldo($slug, $idUser),
            'pemasukan' => $this->dompetModel->getPemasukan($slug, $idUser),
            'pengeluaran' => $this->dompetModel->getPengeluaran($slug, $idUser),
            'idUser' => $idUser,
            'user' => $this->usersModel->getUser($idUser),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data)) {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Data keterangan ' . $keyword . ' tidak ditemukan.');
            session()->setFlashdata('gagal', 'Data keterangan ' . $keyword . ' tidak ditemukan.');
        }


        echo view('layout/template', $data);
        echo view('layout/navbarDompetCari');
        echo view('dompet/index', $data);
    }
}

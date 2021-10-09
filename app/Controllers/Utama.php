<?php

namespace App\Controllers;

// kelas UtamaModel
use App\Models\UtamaModel;
use App\Models\DompetModel;
use App\Models\UsersModel;

class Utama extends BaseController
{

    protected $utamaModel;

    public function __construct()
    {
        $this->utamaModel = new UtamaModel();
        $this->dompetModel = new DompetModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {

        if ($_POST) {
            $email = $_POST['email'];
            $data = $this->usersModel->where('email', $email)->first();

            if ($data) {
                $passwordDB = $data['password'];
                if (isset($_POST['pass'])) {
                    $password = $_POST['pass'];
                    if ($password == $passwordDB)
                        $verify_pass = TRUE;
                } else {
                    $password = $_POST['password'];
                    $verify_pass = password_verify($password, $passwordDB);
                }

                if ($verify_pass) {
                    $data = [
                        'title' => 'Home',
                        'utama' => $this->utamaModel->getUtama($data['id_user']),
                        'nama' => $data['nama'],
                        'idUser' => $data['id_user'],
                        'email' => $data['email'],
                        'password' => $data['password']

                    ];

                    echo view('layout/template', $data);
                    echo view('layout/navbarHome');
                    echo view('utama/index', $data);
                } else {
                    session()->setFlashdata('pesan', 'Password salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('pesan', 'Email tidak ditemukan');
                return redirect()->back();
            }
        }
    }

    public function tambah()
    {

        if (!$this->validate([
            'namaDompet' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama dompet harus diisi.',
                    'is_unique' => '{field} nama dompet sudah terdaftar.'
                ]
            ]
        ])) {
            // Seharusnya dibuat keterangan penyebab data gagal ditambahkan
            session()->setFlashdata('gagal', 'Data gagal ditambahkan.');
            return redirect()->back();
        }
        $slug = url_title($_POST['namaDompet'], '-', true);
        $this->utamaModel->save([
            'idUser' => $_POST['idUser'],
            'namaDompet' => $this->request->getPost('namaDompet'),
            'slug' => $slug
        ]);

        $data = [
            'title' => 'Home',
            'utama' => $this->utamaModel->getUtama($_POST['idUser']),
            'nama' => $_POST['nama'],
            'idUser' => $_POST['idUser'],
            'email' => $_POST['email'],
            'password' => $_POST['password']

        ];
        session()->setFlashdata('pesanU', 'Data berhasil ditambahkan.');

        echo view('layout/template', $data);
        echo view('layout/navbarHome');
        echo view('utama/index', $data);
    }

    public function cari()
    {
        $keyword = $_POST['keyword'];
        $dompet = $this->utamaModel->cari($keyword);

        $data = [
            'title' => 'Home',
            'utama' => $dompet
        ];

        if (empty($data['utama'])) {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Data dompet ' . $keyword . ' tidak ditemukan.');
            session()->setFlashdata('gagalU', 'Data dompet ' . $keyword . ' tidak ditemukan.');
        }

        echo view('layout/template', $data);
        echo view('layout/navbarHome');
        echo view('Utama/index', $data);
    }


    public function hapus($idDompet)
    {
        // dd($_POST);
        $hapusData = $this->utamaModel->getIdDompet($idDompet);
        $this->dompetModel->delete($idDompet, $_POST['idUser']);

        $data = [
            'title' => 'Home',
            'utama' => $this->utamaModel->getUtama($_POST['idUser']),
            'nama' => $_POST['nama'],
            'idUser' => $_POST['idUser'],
            'email' => $_POST['email'],
            'password' => $_POST['password']

        ];
        session()->setFlashdata('pesanU', 'Data berhasil dihapus');

        // return redirect()->back()->withInput();
        echo view('layout/template', $data);
        echo view('layout/navbarHome');
        echo view('utama/index', $data);
    }
}

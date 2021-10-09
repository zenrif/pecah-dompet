<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        helper(['form']);
        $data = [
            'title' => 'Login'
        ];
        echo view('layout/template', $data);
        echo view('users/masuk');
    }

    public function daftar()
    {
        helper(['form']);
        $data = [
            'title' => 'Daftar'
        ];
        echo view('layout/template', $data);
        echo view('users/daftar');
    }

    public function simpanDaftar()
    {
        // dd($_POST);
        helper(['form']);
        $rules = [
            'nama' => 'required',
            'email' => 'required|is_unique[users.email]',
            'password' => 'required',
            'password_confirmation' => 'matches[password]'
        ];
        if ($this->validate($rules)) {
            $this->usersModel->save([
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ]);
            session()->setFlashdata('berhasil', 'Berhasil membuat akun silahkan masuk');
            return redirect()->to('/masuk');
        } else {
            session()->setFlashdata('pesan', 'Harap cek kembali data yang anda masukan');
            return redirect()->to('/daftar');
        }
    }

    public function keluar()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/masuk');
    }
}

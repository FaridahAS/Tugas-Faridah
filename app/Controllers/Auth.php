<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function proseslogin()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->KaryawanModel->where('username', $username)->first();
        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'username' => $user['username']
                ];
                session()->set($data);
                if ($user['jabatan'] == 'admin') {

                    return redirect()->to('/home');
                } else {
                    return redirect()->to('Umum/index');
                }
            } else {
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function prosesregister()
    {
        //validasi input
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[profil.email]',
                'errors' => [
                    'required' => '{field} email harus diisi. '
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[profil.username]',
                'errors' => [
                    'required' => '{field} username harus diisi. '
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} password harus diisi. '
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama harus diisi. '
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('register')->withInput();
        }
        $KaryawanModel = new KaryawanModel();
        $this->KaryawanModel->insert([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'usename' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/');
    }
}

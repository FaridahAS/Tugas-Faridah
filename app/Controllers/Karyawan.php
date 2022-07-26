<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    protected $KaryawanModel;
    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
    }
    public function get_data()
    {
        return $this->db->get('profil')->result();
    }
    public function index()
    {
        $profil = $this->KaryawanModel->findAll();
        $data = [
            'title' => 'Daftar Karyawan',
            'karyawan' => $this->KaryawanModel->getProfil()
        ];

        // $KaryawanModel =new KaryawanModel();
        // $KaryawanModel = new KaryawanModel();

        return view('Karyawan/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Profil',
            'profil' => $this->ProfilModel->getProfil($slug)
        ];

        //     //jika komik tidak ada di tabel
        //     if (empty($data['komik'])) {
        //         throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik' . $slug . 'tidak ditemukan');
        //     }

        return view('karyawan/profil', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Karyawan',
            'validation' => \Config\Services::validation()
        ];

        return view('karyawan/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[profil.email]',
                'errors' => [
                    'required' => '{field} email harus diisi. '
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/karyawan/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('NIK'), '-', true);
        $this->KaryawanModel->insert([
            'NIK' => $this->request->getVar('NIK'),
            'nama' => $this->request->getVar('nama'),
            'nohp' => $this->request->getVar('nohp'),
            'email' => $this->request->getVar('email'),
            'usename' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'jabatan' => $this->request->getVar('jabatan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/karyawan');
    }

    public function delete($NIK)
    {
        $this->KaryawanModel->delete($NIK);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/karyawan');
    }

    public function edit($NIK)
    {
        session();
        $data = [
            'title' => 'Profilku',
            'validation' => \Config\Services::validation(),
            'karyawan' => $this->KaryawanModel->getProfil($NIK)

        ];

        return view('karyawan/edit', $data);
    }

    public function update($NIK)
    {
        if (!$this->validate([
            'email' => [
                'errors' => [
                    'required' => '{field} email harus diisi. '
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/karyawan/profil' . $this->request->getVar('NIK'))->withInput()->with('validation', $validation);
            return redirect()->to(base_url('/profil/edit/' . $NIK))->withInput();
        }

        $this->KaryawanModel->update($NIK, [
            'NIK' => $NIK,
            'nama' => $this->request->getVar('nama'),
            'nohp' => $this->request->getVar('nohp'),
            'email' => $this->request->getVar('email'),
            'usename' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'jabatan' => $this->request->getVar('jabatan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to(base_url('/profil/edit/' . $NIK));
    }
}

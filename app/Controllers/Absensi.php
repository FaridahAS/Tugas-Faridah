<?php

namespace App\Controllers;

use App\Models\AbsensiModel;

class Absensi extends BaseController
{
    protected $AbsensiModel;
    public function __construct()
    {
        $this->AbsensiModel = new AbsensiModel();
    }
    public function index()
    {
        $absensi = $this->AbsensiModel->findAll();
        $data = [
            'title' => 'Data Absensi',
            'absensi' => $this->AbsensiModel->getAbsensi()
        ];

        return view('absensi', $data);
    }

    public function absenku()
    {
        session();
        $data = [
            'title' => 'Form Absensi',
            // 'validation' => \Config\Services::validation()
        ];

        return view('absenku', $data);
    }

    public function send()
    {

        $slug = url_title($this->request->getVar('id'), '-', true);
        $this->AbsensiModel->insert([
            'id' => $this->request->getVar('id'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam_masuk' => $this->request->getVar('jam_masuk'),
            'jam_keluar' => $this->request->getVar('jam_keluar'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);

        // session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/absensi');
    }
}

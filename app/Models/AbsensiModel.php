<?php

namespace App\Models;


use CodeIgniter\Model;


class AbsensiModel extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'tanggal', 'jam_masuk', 'jam_keluar', 'keterangan'];

    public function getAbsensi($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $slug])->first();
    }
}

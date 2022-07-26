<?php

namespace App\Models;


use CodeIgniter\Model;


class ProfilModel extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'NIK';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['NIK', 'nama', 'nohp', 'email', 'foto', 'username', 'password', 'jabatan'];

    public function getProfil($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['NIK' => $slug])->first();
    }
}

<?php

namespace App\Controllers;

use App\Models;

class Umum extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'pengguna'
        ];
        return view('pengguna/index', $data);
    }
}

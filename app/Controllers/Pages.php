<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                'tipe' => 'Rumah',
                'alamat' => 'Kp.Sangegeng RT/03 Rw/06',
                'kec' => 'Mangunreja',
                'kota' => 'Tasikmalaya',
                'tlp' => '087820093368'
            ]
        ];

        return view('pages/contact', $data);
    }
}

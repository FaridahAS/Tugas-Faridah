<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => '1',
            'tanggal'    => '2020-08-06',
            'jam_masuk'    => '09:00',
            'jam_keluar'    => '17:00',
            'keterangan'    => 'Hadir',
        ];

        // Simple Queries
        $this->db->query('INSERT INTO absensi (id, tanggal, jam_masuk, jam_keluar, keterangan) VALUES(:id:, :tanggal:, :jam_masuk:, :jam_keluar:, :keterangan:)', $data);

        // Using Query Builder
        // $this->db->table('users')->insert($data);
    }
}

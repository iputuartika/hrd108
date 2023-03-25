<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Karyawan::create([
            'id_karyawan' => '1',
            'departemen_id' => '1',
            'ktp' => '5101022102890003',
            'npwp' => '5102021021389384',
            'nama' => 'I Putu Artika',
            'tempat_lahir' => 'Pergung',
            'tanggal_lahir' => '1989-02-21',
            'kontak' => '085156479821',
            'email' => 'iputuartika@gmail.com',
            'kecamatan_id' => '1',
            'desa' => 'Pergung',
            'alamat_lengkap' => 'Br. Petapan Kelod',
            'jenis_kelamin' => 'Pria',
            'status' => 'Lajang',
            'gol_darah' => 'B',
            'agama' => 'Hindu',
            ]);
    }
}

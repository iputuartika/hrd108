<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departemen;

class DepartemensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Departemen::create([
            'departemen_id' => 'Dep1',
            'nama' => 'HRD',
            'keterangan' => 'HRD',
        ]);
    }
}

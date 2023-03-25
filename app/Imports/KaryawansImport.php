<?php

namespace App\Imports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KaryawansImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Karyawan([
            //
                'karyawan_id' =>$row[1],
                'departemen_id' =>$row[5],
                'kecamatan_id' =>$row[50],
                'desa_id' =>$row[51],
                'jabatan_id' =>$row[52],
                'ktp' =>$row[4],
                'npwp' =>$row[3],
                'nama' =>$row[2],
                'tempat_lahir' =>$row[12],
                // dd($row[13]),
                $unixDate = ($row[13] - 25569) * 86400,
                // dd($unixDate),
                $unixtoDate = gmdate("d-m-Y", $unixDate),
                // dd($unixtoDate);
                $date = Carbon::createFromFormat('d-m-Y', $unixtoDate)->format('Y-m-d'),
                // dd($date);
                
                'tanggal_lahir' => $date,
                'kontak' =>$row[19],
                'email' =>$row[20],
                'desa' =>$row[12],
                'alamat_lengkap' =>$row[17],
                'jenis_kelamin' =>$row[14],
                'status' =>$row[8],
                'gol_darah' =>$row[16],
                'agama' =>$row[15],
        ]);
    }

    public function startRow(): int
    {
        return 4;
    }
}

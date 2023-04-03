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
            // PERSONAL
            'avatar' => $row[0],
            'karyawan_id' => $row[1],
            'ktp' => $row[2],
            'npwp' => $row[3],
            'bpjs' => $row[4],
            'nama' => $row[5],
            'departemen_id' => $row[6],
            'jabatan_id' => $row[7],
            'tempat_lahir' => $row[8],
            'tanggal_lahir' => $row[9],
            'email' => $row[10],
            'kontak' => $row[11],
            'kontak_darurat' => $row[12],
            'kecamatan_id' => $row[13],
            'desa_id' => $row[14],
            'alamat_lengkap' => $row[15],
            'jenis_kelamin' => $row[16],
            'pendidikan' => $row[17],
            'status' => $row[18],
            'gol_darah' => $row[19],
            'agama' => $row[20],

            // KELUARGA
            'nama_ibu' => $row[21],
            'jumlah_tanggungan' => $row[22],
            'nama_suami_istri' => $row[23],
            'pekerjaan' => $row[24],
            'tl_suami_istri' => $row[25],
            'tgl_suami_istri' => $row[26],
            'anak1' => $row[27],
            'tempat_lahir_anak1' => $row[28],
            'tanggal_lahir_anak1' => $row[29],
            'anak2' => $row[30],
            'tempat_lahir_anak2' => $row[31],
            'tanggal_lahir_anak2' => $row[32],
            'anak3' => $row[33],
            'tempat_lahir_anak3' => $row[34],
            'tanggal_lahir_anak3' => $row[35],

            // KARIR
            'status_karyawan' => $row[36],
            'tanggal_bergabung' => $row[37],
            'awal_kontrak' => $row[38],
            'akhir_kontrak' => $row[39],
            // 'masa_kontrak' =>$row[],
            // 'masa_kerja' =>$row[],
            'tanggal_keluar' => $row[40],
            'keterangan' => $row[41],
            'status_bpjs' => $row[42],

            // GAJI
            'no_rek' => $row[43],

            // ADMIN  
            'admin' => $row[44],
            'unit_usaha' => $row[45], 
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}

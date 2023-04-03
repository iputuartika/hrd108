<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // PERSONAL
        'avatar',
        'karyawan_id',
        'ktp',
        'npwp',
        'bpjs',
        'nama',
        'departemen_id',
        'jabatan_id',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'kontak',
        'kontak_darurat',
        'kecamatan_id',
        'desa_id',
        'alamat_lengkap',
        'jenis_kelamin',
        'pendidikan',
        'status',
        'gol_darah',
        'agama',

        // KELUARGA
        'nama_ibu',
        'jumlah_tanggungan',
        'nama_suami_istri',
        'pekerjaan',
        'tl_suami_istri',
        'tgl_suami_istri',
        'anak1',
        'tempat_lahir_anak1',
        'tanggal_lahir_anak1',
        'anak2',
        'tempat_lahir_anak2',
        'tanggal_lahir_anak2',
        'anak3',
        'tempat_lahir_anak3',
        'tanggal_lahir_anak3',

        // KARIR
        'status_karyawan',
        'tanggal_bergabung',
        'awal_kontrak',
        'akhir_kontrak',
        'masa_kontrak',
        'masa_kerja',
        'tanggal_keluar',
        'keterangan',
        'status_bpjs',

        // GAJI
        'no_rek',

        // ADMIN  
        'admin',
        'unit_usaha',
    ];

    protected $guarded = ['id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function notifikasis()
    {
        return $this->hasMany(Notifikasi::class);
    }
}

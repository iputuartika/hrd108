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
        'karyawan_id',
        'departemen_id',
        'kecamatan_id',
        'desa_id',
        'jabatan_id',
        'ktp',
        'npwp',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'kontak',
        'email',
        'alamat_lengkap',
        'jenis_kelamin',
        'status',
        'gol_darah',
        'agama',
    ];

    protected $guarded = ['id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function notifikasis()
    {
        return $this->hasMany(Notifikasi::class);
    }
}

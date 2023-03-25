<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'karyawan_id',
        'jenis',
        'keterangan',
        'status',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}

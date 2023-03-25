<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = [
        'departemen_id',
        'nama',
        'keterangan',
    ];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}

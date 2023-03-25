<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    //protected $guarded = ['id'];
    protected $fillable = [
        'kecamatan_id',
        'nama',
    ];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'nama',
    ];

    protected $guarded = ['id'];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}

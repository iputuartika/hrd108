<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Notifikasi;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $karyawans = Karyawan::all();
        $search = 1;
        $admins = Karyawan::all()->where('kecamatan_id', '=', $search);
        $notifikasi = Notifikasi::all();
        $qty = 1;

        

        return view('dashboard', ['karyawans' => $karyawans, 'admins' => $admins, 'notifikasi' => $notifikasi]);
    }
}

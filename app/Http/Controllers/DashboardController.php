<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Notifikasi;
use Carbon\Carbon;

class DashboardController extends Controller
{

    //
    public function index()
    {
        $karyawans = Karyawan::all();
        $search = 1;
        $admins = Karyawan::all()->where('kecamatan_id', '=', $search);
        // $notifikasis = Notifikasi::all();
        $qty = 1;
        
        // foreach ($notifikasis as $notif){
        //     $hari = Carbon::parse($notif['created_at'])->diff(Carbon::now())->format('%d');
        //     $jam = Carbon::parse($notif['created_at'])->diff(Carbon::now())->format('%h');

        //     if ($hari > 0) {
        //         $notifs [] = array(
        //             'id' => $notif['id'],
        //             'karyawan_id' => $notif['karyawan_id'],
        //             'nama' => $notif->karyawan->nama,
        //             'jenis' => $notif['jenis'],
        //             'keterangan' => $notif['keterangan'],
        //             'lama' => Carbon::parse($notif['created_at'])->diff(Carbon::now())->format('%d hari yang lalu'),
        //         );
               
        //     } elseif ($hari == 0 && $jam > 0) {
        //         $notifs [] = array(
        //             'id' => $notif['id'],
        //             'karyawan_id' => $notif['karyawan_id'],
        //             'nama' => $notif->karyawan->nama,
        //             'jenis' => $notif['jenis'],
        //             'keterangan' => $notif['keterangan'],
        //             'lama' => Carbon::parse($notif['created_at'])->diff(Carbon::now())->format('%h jam %i menit yang lalu'),
        //         );
                
        //     } elseif ($hari == 0 && $jam == 0) {
        //         $notifs [] = array(
        //             'id' => $notif['id'],
        //             'karyawan_id' => $notif['karyawan_id'],
        //             'nama' => $notif->karyawan->nama,
        //             'jenis' => $notif['jenis'],
        //             'keterangan' => $notif['keterangan'],
        //             'lama' => Carbon::parse($notif['created_at'])->diff(Carbon::now())->format('%i menit yang lalu'),
        //         );
        //     }
        // };
        // , 'notifs' => $notifs

        return view('dashboard', ['karyawans' => $karyawans, 'admins' => $admins]);
    }
}

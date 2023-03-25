<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KaryawansImport;
use Livewire\Component;

class KaryawanController extends Controller
{
    //
    public function fileImport(Request $request)
    {
        // validasi
        // $validator = Validator::make(
        //     [
        //         'file'          => 'required',
        //         'extension'      => 'required|in:xlsx,xls',
        //         'messages' => 'Gagal'
        //     ]
          
        //   );
    
        // menangkap file excel
        $file = $request->file('file');
    
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
    
        // upload ke folder file_siswa di dalam folder public
        $file->move('imports',$nama_file);
    
        // import data
        Excel::import(new KaryawansImport, public_path('/imports/'.$nama_file));
    
        // notifikasi dengan session
        session()->flash('message', 'Data Siswa Berhasil Diimport!');
    
        // alihkan halaman kembali
        return redirect('/data/karyawan');
    }
}

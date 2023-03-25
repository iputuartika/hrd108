<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kecamatan;
use App\Models\Karyawan;

class Kecamatans extends Component
{
    use WithPagination;

    public $limitPerPage = 5, $kecamatan_id, $nama;

    public function render()
    {
        $kecamatans = Kecamatan::all();
        return view('livewire.kecamatans', ['kecamatans' => $kecamatans]);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
        ]);
    
        Kecamatan::updateOrCreate(['kecamatan_id' => $this->kecamatan_id], [
            'kecamatan_id' => $this->kecamatan_id,
            'nama' => $this->nama,
        ]);

        session()->flash('message', $this->kecamatan_id ? 'Data departemen berhasil di tambahkan.' : 'Data departemen berhasil di update.');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jabatan;

class Jabatans extends Component
{

    public $jabatan_id, $nama, $keterangan;

    public function render()
    {
        $jabatans = Jabatan::all();
        return view('livewire.jabatans', ['jabatans' => $jabatans]);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
        ]);
    
        Jabatan::updateOrCreate(['id' => $this->jabatan_id], [
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('message', $this->jabatan_id ? 'Data jabatan berhasil di update.' : 'Data jabatan berhasil di tambahkan.');
    }
}

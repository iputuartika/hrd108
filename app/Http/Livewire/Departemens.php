<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Departemen;
use App\Models\Karyawan;

class Departemens extends Component
{
    use WithPagination;

    public $limitPerPage = 5, $departemen_id, $nama, $keterangan;

    public function render()
    {
        $departemens = Departemen::all();

        return view('livewire.departemens', ['departemens' => $departemens]);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
        ]);
    
        Departemen::updateOrCreate(['departemen_id' => $this->departemen_id], [
            'departemen_id' =>$this->departemen_id,
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('message', $this->departemen_id ? 'Data departemen berhasil di tambahkan.' : 'Data departemen berhasil di update.');
    }

}

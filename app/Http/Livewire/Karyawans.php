<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Karyawan;
use App\Models\Kecamatan;
use App\Models\Departemen;
use Illuminate\Http\Request;
use App\Imports\KaryawansImport;
use Carbon\Carbon;
use App\Models\Desa;
use App\Models\Jabatan;

class Karyawans extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $key, $karyawan_id, $kode, $ktp, $npwp, $nama, $tempat_lahir, $tanggal_lahir, $kontak, $email,
    $desa, $alamat_lengkap, $jenis_kelamin, $status, $gol_darah, $agama, $search, $limitPerPage = 5;
    public $isCreateModalOpen = 0, $isDeleteModalOpen = 0, $isImportModalOpen = 0, $title = '';
    protected $queryString = ['search' =>['except' => '']];
    public $selectAll = 0, $selectKaryawan = [], $all = [];
    public $departemen_id = '', $kecamatan_id ='', $desa_id = '', $jabatan_id = '';
    public $update = 0;
    public $usia;
    public $contentIsVisible = 0;

    public function resetSelected()
    {
        $this->selectedKaryawan = [];
        $this->selectAll = true;
    }

    public function render()
    {
        $karyawans = Karyawan::paginate($this->limitPerPage)->onEachSide(2);
        $departemens = Departemen::all();
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();
        $jabatans = Jabatan::all();
        $karyawan = Karyawan::first();

        if ($this->search !== null) {
            $karyawans = Karyawan::where('nama','like', '%' . $this->search . '%')
            ->latest()->paginate($this->limitPerPage)->onEachSide(2);
        }

        // Menghitung usia
        $this->usia = Carbon::parse($this->tanggal_lahir)->diff(Carbon::now())->format('%y tahun, %m bulan and %d hari');

        //$data = $this->selectKaryawan;

        //dd($karyawan);

        return view('livewire.karyawans', ['karyawans' => $karyawans, 'departemens' => $departemens, 'kecamatans' => $kecamatans,
        'desas' => $desas, 'jabatans' => $jabatans]);
    }

    public function toggleContent()
    {
        $this->contentIsVisible = true;
    }

    // CREATE DATA KARYAWAN
    public function create(){
        $this->resetCreateForm();
        $this->openCreateModal();
    }

    // OPEN CREATE MODAL
    public function openCreateModal()
    {
        $this->title = "Input";
        $this->isCreateModalOpen = true;
    }

    // CLOSE CREATE MODAL
    public function closeCreateModal()
    {
        $this->isCreateModalOpen = false;
        $this->resetCreateForm();
    }

    // OPEN EDIT MODAL
    public function openEditModal()
    {
        $this->title = "Edit";
        $this->isCreateModalOpen = true;
    }

    // CLOSE EDIT MODAL
    public function closeEditModal()
    {
        $this->isCreateModalOpen = false;
        $this->resetCreateForm();
    }

    // RESET FORM INPUT DATA KARYAWAN
    private function resetCreateForm(){
        $this->key = '';
        $this->karyawan_id = '';
        $this->departemen_id = '';
        $this->desa_id = '';
        $this->jabatan_id = '';
        $this->ktp = '';
        $this->npwp = '';
        $this->nama = '';
        $this->tempat_lahir = '';
        $this->tanggal_lahir = '';
        $this->kontak = '';
        $this->email = '';
        $this->kecamatan_id = '';
        $this->desa = '';
        $this->alamat_lengkap = '';
        $this->jenis_kelamin = '';
        $this->status = '';
        $this->gol_darah = '';
        $this->agama = '';
    }

    // SAVE DATA KARYAWAN
    public function store()
    {
        $this->validate([
            // 'id_departemen' => 'required',
            'nama' => 'required',
            'alamat_lengkap' => 'required',
        ]);
    
        Karyawan::updateOrCreate(['id' => $this->key], [
            'karyawan_id' => $this->karyawan_id,
            'departemen_id' => $this->departemen_id,
            'desa_id' => $this->desa_id,
            'jabatan_id' => $this->jabatan_id,
            'ktp' => $this->ktp,
            'npwp' => $this->npwp,
            'nama' => $this->nama,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'kontak' => $this->kontak,
            'email' => $this->email,
            'kecamatan_id' => $this->kecamatan_id,
            'desa' => $this->desa,
            'alamat_lengkap' => $this->alamat_lengkap,
            'jenis_kelamin' => $this->jenis_kelamin,
            'status' => $this->status,
            'gol_darah' => $this->gol_darah,
            'agama' => $this->agama,
        ]);

        session()->flash('message', $this->key ? 'Data karyawan berhasil di update.' : 'Data karyawan berhasil di tambahkan.');

        $this->closeCreateModal();
    }

    // EDIT DATA KARYAWAN
    public function editModal($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $this->key = $karyawan->id;
        $this->karyawan_id = $karyawan->karyawan_id;
        $this->departemen_id = $karyawan->departemen_id;
        $this->desa_id = $karyawan->desa_id;
        $this->jabatan_ii = $karyawan->jabatan_id;
        $this->ktp = $karyawan->ktp;
        $this->npwp = $karyawan->npwp;
        $this->nama = $karyawan->nama;
        $this->tempat_lahir = $karyawan->tempat_lahir;
        $this->tanggal_lahir = $karyawan->tanggal_lahir;
        $this->kontak = $karyawan->kontak;
        $this->email = $karyawan->email;
        $this->kecamatan_id = $karyawan->kecamatan_id;
        $this->desa = $karyawan->desa;
        $this->alamat_lengkap = $karyawan->alamat_lengkap;
        $this->jenis_kelamin = $karyawan->jenis_kelamin;
        $this->status = $karyawan->status;
        $this->gol_darah = $karyawan->gol_darah;
        $this->agama = $karyawan->agama;

        $this->openEditModal();
    }

    // OPEN DELETE MODAL
    public function openDeleteModal()
    {
        $this->isDeleteModalOpen = true;
    }

    //CLOSE DELETE MODAL
    public function closeDeleteModal()
    {
        $this->isDeleteModalOpen = false;
    }


    //SHOW DELETE CONFIRMATION MODAL
    public function deleteModal($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $this->karyawan_id = $id;
        $this->nama = $karyawan->nama;

        $this->openDeleteModal();
    }

    // DELETE DATA KARYAWAN
    public function delete($id)
    {

        Karyawan::find($id)->delete();
        session()->flash('message', 'Data berhasil di hapus.');
        $this->closeDeleteModal();
    }

    // BATCH DELETE DATA KARYAWAN
    public function deleteSelectKaryawan(){
        Karyawan::whereIn('id', $this->selectKaryawan)->delete();
        session()->flash('message', 'Data yang di pilih berhasil di hapus.');
        $this->selectKaryawan = [];
    }

    // OPEN IMPORT DATA KARYAWAN MODAL
    public function openImportModal()
    {
        $this->isImportModalOpen = true;
    }

    // CLOSE IMPORT DATA KARYAWAN MODAL
    public function closeImportModal()
    {
        $this->isImportModalOpen = false;
    }

    // // CHECKBOX SELECT ALL DATA
    // public function selectAllData()
    // {
    //     $this->all = Karyawan::all();
    //     foreach ($this->all as $y){
    //         dd($y->id);
    //     }
        
    //     if ($this->selectAll === true)
    //     { 
    //         $this->selectKaryawan = [];
    //         $this->selectKaryawan = $all;
    //     }else {
    //         $this->selectKaryawan = [];
    //     }
    // }
}

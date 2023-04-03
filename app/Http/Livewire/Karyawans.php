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
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\Auth;

class Karyawans extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $key, $search, $limitPerPage = 6;
    public $photo, $avatar,
    $karyawan_id,
    $ktp,
    $npwp,
    $bpjs,
    $nama,
    $departemen_id,
    $jabatan_id,
    $tempat_lahir,
    $tanggal_lahir,
    $email,
    $kontak,
    $kontak_darurat,
    $kecamatan_id,
    $desa_id,
    $alamat_lengkap,
    $jenis_kelamin,
    $pendidikan,
    $status,
    $gol_darah,
    $agama,

    $nama_ibu,
    $jumlah_tanggungan,
    $nama_suami_istri,
    $pekerjaan,
    $tl_suami_istri,
    $tgl_suami_istri,
    $anak1,
    $tempat_lahir_anak1,
    $tanggal_lahir_anak1,
    $anak2,
    $tempat_lahir_anak2,
    $tanggal_lahir_anak2,
    $anak3,
    $tempat_lahir_anak3,
    $tanggal_lahir_anak3,

    $status_karyawan,
    $tanggal_bergabung,
    $awal_kontrak,
    $akhir_kontrak,
    $masa_kontrak,
    $masa_kerja,
    $tanggal_keluar,
    $keterangan,
    $status_bpjs,

    $no_rek,

    $admin,
    $unit_usaha;

    public $isCreateModalOpen = 0, $isDeleteModalOpen = 0, $isImportModalOpen = 0, $title = '';
    public $selectAll = 0, $selectKaryawan = [], $all = [];
    public $update = 0;
    public $usia;
    public $contentIsVisible = 0;
    public $tab = 'personal';
    public $dept;

    public function resetSelected()
    {
        $this->selectedKaryawan = [];
        $this->selectAll = true;
    }

    public function render()
    {
        if ($this->dept){
            $karyawans = Karyawan::where([['unit_usaha', '=', $this->unit_usaha],['departemen_id', '=', $this->dept]])->paginate($this->limitPerPage)->onEachSide(2);
        } elseif ($this->unit_usaha) {
            $karyawans = Karyawan::where('unit_usaha', $this->unit_usaha)->paginate($this->limitPerPage)->onEachSide(2);
        } else {
            $karyawans = Karyawan::paginate($this->limitPerPage)->onEachSide(2);
        }
        
        $departemens = Departemen::all();
        $jabatans = Jabatan::all();
        $kecamatans = District::where('city_code', 5101)->get();
        $desas = Village::where('district_code', $this->kecamatan_id)->get();
        $this->admin = Auth::user()->name;
        //dd($this->unit);
        $this->masa_kerja = Carbon::parse($this->tanggal_bergabung)->diff(Carbon::now())->format('%y tahun, %m bulan, %d hari');
        $this->masa_kontrak = Carbon::parse(Carbon::now())->diff($this->akhir_kontrak)->format('%y tahun, %m bulan, %d hari');
        if ($this->search !== null) {
            $karyawans = Karyawan::where('nama','like', '%' . $this->search . '%')
            ->latest()->paginate($this->limitPerPage)->onEachSide(2);
        }

        // Menghitung usia
        $this->usia = Carbon::parse($this->tanggal_lahir)->diff(Carbon::now())->format('%y tahun, %m bulan, %d hari');
        //dd($karyawans);

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

    // REMOVE AVATAR
    public function rmv_avatar()
    {
        $this->avatar = '';
        $this->photo = '';
    }

    // RESET FORM INPUT DATA KARYAWAN
    private function resetCreateForm(){
        $this->key = '';
        $this->photo = '';
        $this->avatar = '';
        $this->karyawan_id = '';
        $this->ktp = '';
        $this->npwp = '';
        $this->bpjs = '';
        $this->nama = '';
        $this->departemen_id = '';
        $this->jabatan_id = '';
        $this->tempat_lahir = '';
        $this->tanggal_lahir = '';
        $this->email = '';
        $this->kontak = '';
        $this->kontak_darurat = '';
        $this->kecamatan_id = '';
        $this->desa_id = '';
        $this->alamat_lengkap = '';
        $this->jenis_kelamin = '';
        $this->pendidikan = '';
        $this->status = '';
        $this->gol_darah = '';
        $this->agama = '';

        $this->nama_ibu = '';
        $this->jumlah_tanggungan = '';
        $this->nama_suami_istri = '';
        $this->pekerjaan = '';
        $this->tl_suami_istri = '';
        $this->tgl_suami_istri = '';
        $this->anak1 = '';
        $this->tempat_lahir_anak1 = '';
        $this->tanggal_lahir_anak1 = '';
        $this->anak2 = '';
        $this->tempat_lahir_anak2 = '';
        $this->tanggal_lahir_anak2 = '';
        $this->anak3 = '';
        $this->tempat_lahir_anak3 = '';
        $this->tanggal_lahir_anak3 = '';

        $this->status_karyawan = '';
        $this->tanggal_bergabung = '';
        $this->awal_kontrak = '';
        $this->akhir_kontrak = '';
        $this->masa_kontrak = '';
        $this->masa_kerja = '';
        $this->tanggal_keluar = '';
        $this->keterangan = '';
        $this->status_bpjs = '';

        $this->no_rek = '';
        
        $this->unit_usaha = '';
    }

    // SAVE DATA KARYAWAN
    public function store()
    {
        $this->validate([
            // 'id_departemen' => 'required',
            'nama' => 'required',
            'alamat_lengkap' => 'required',
            'photo' => 'image|max:1024',
        ]);

        if($this->photo == null){
            $url = '';
        } else {
            $url = md5($this->photo . microtime()).'.'.$this->photo->extension();
            $this->photo->storeAs('public', $url);
        }
    
        Karyawan::updateOrCreate(['id' => $this->key], [
            'avatar' => $url,
            'karyawan_id' => $this->karyawan_id,
            'ktp' => $this->ktp,
            'npwp' => $this->npwp,
            'bpjs' => $this->bpjs,
            'nama' => $this->nama,
            'departemen_id' => $this->departemen_id,
            'jabatan_id' => $this->jabatan_id,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'email' => $this->email,
            'kontak' => $this->kontak,
            'kontak_darurat' => $this->kontak_darurat,
            'kecamatan_id' => $this->kecamatan_id,
            'desa_id' => $this->desa_id,
            'alamat_lengkap' => $this->alamat_lengkap,
            'jenis_kelamin' => $this->jenis_kelamin,
            'pendidikan' => $this->pendidikan,
            'status' => $this->status,
            'gol_darah' => $this->gol_darah,
            'agama' => $this->agama,

            'nama_ibu' => $this->nama_ibu,
            'jumlah_tanggungan' => $this->jumlah_tanggungan,
            'nama_suami_istri' => $this->nama_suami_istri,
            'pekerjaan' => $this->pekerjaan,
            'tl_suami_istri' => $this->tl_suami_istri,
            'tgl_suami_istri' => $this->tgl_suami_istri,
            'anak1' => $this->anak1,
            'tempat_lahir_anak1' => $this->tempat_lahir_anak1,
            'tanggal_lahir_anak1' => $this->tanggal_lahir_anak1,
            'anak2' => $this->anak2,
            'tempat_lahir_anak2' => $this->tempat_lahir_anak2,
            'tanggal_lahir_anak2' => $this->tanggal_lahir_anak2,
            'anak3' => $this->anak3,
            'tempat_lahir_anak3' => $this->tempat_lahir_anak3,
            'tanggal_lahir_anak3' => $this->tanggal_lahir_anak3,

            'status_karyawan' => $this->status_karyawan,
            'tanggal_bergabung' => $this->tanggal_bergabung,
            'awal_kontrak' => $this->awal_kontrak,
            'akhir_kontrak' => $this->akhir_kontrak,
            'tanggal_keluar' => $this->tanggal_keluar,
            'keterangan' => $this->keterangan,
            'status_bpjs' => $this->status_bpjs,

            'no_rek' => $this->no_rek,

            'admin' => $this->admin,
            'unit_usaha' => $this->unit_usaha,
        ]);

        session()->flash('message', $this->key ? 'Data karyawan berhasil di update.' : 'Data karyawan berhasil di tambahkan.');

        $this->closeCreateModal();
    }

    // EDIT DATA KARYAWAN
    public function editModal($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $this->avatar = $karyawan->avatar;
        $this->key = $karyawan->id;
        $this->karyawan_id = $karyawan->karyawan_id;
        $this->ktp = $karyawan->ktp;
        $this->npwp = $karyawan->npwp;
        $this->bpjs = $karyawan->bpjs;
        $this->nama = $karyawan->nama;
        $this->departemen_id = $karyawan->departemen_id;
        $this->jabatan_id = $karyawan->jabatan_id;  
        $this->tempat_lahir = $karyawan->tempat_lahir;
        $this->tanggal_lahir = $karyawan->tanggal_lahir;
        $this->email = $karyawan->email;
        $this->kontak = $karyawan->kontak;
        $this->kontak_darurat = $karyawan->kontak_darurat;
        $this->kecamatan_id = $karyawan->kecamatan_id;
        $this->desa_id = $karyawan->desa_id;
        $this->alamat_lengkap = $karyawan->alamat_lengkap;
        $this->jenis_kelamin = $karyawan->jenis_kelamin;
        $this->pendidikan = $karyawan->pendidikan;
        $this->status = $karyawan->status;
        $this->gol_darah = $karyawan->gol_darah;
        $this->agama = $karyawan->agama;

        $this->nama_ibu = $karyawan->nama_ibu;
        $this->jumlah_tanggungan = $karyawan->jumlah_tanggungan;
        $this->nama_suami_istri = $karyawan->nama_suami_istri;
        $this->pekerjaan = $karyawan->pekerjaan;
        $this->tl_suami_istri = $karyawan->tl_suami_istri;
        $this->tgl_suami_istri = $karyawan->tgl_suami_istri;
        $this->anak1 = $karyawan->anak1;
        $this->tempat_lahir_anak1 = $karyawan->tempat_lahir_anak1;
        $this->tanggal_lahir_anak1 = $karyawan->tanggal_lahir_anak1;
        $this->anak2 = $karyawan->anak2;
        $this->tempat_lahir_anak2 = $karyawan->tempat_lahir_anak2;
        $this->tanggal_lahir_anak2 = $karyawan->tanggal_lahir_anak2;
        $this->anak3 = $karyawan->anak3;
        $this->tempat_lahir_anak3 = $karyawan->tempat_lahir_anak3;
        $this->tanggal_lahir_anak3 = $karyawan->tanggal_lahir_anak3;

        $this->status_karyawan = $karyawan->status_karyawan;
        $this->status_bpjs = $karyawan->status_bpjs;
        $this->tanggal_bergabung = $karyawan->tanggal_bergabung;
        $this->tanggal_keluar = $karyawan->tanggal_keluar;
        $this->awal_kontrak = $karyawan->awal_kontrak;
        $this->masa_kerja = Carbon::parse($karyawan->tanggal_bergabung)->diff(Carbon::now())->format('%y tahun, %m bulan, %d hari');
        $this->akhir_kontrak = $karyawan->akhir_kontrak;
        $this->masa_kontrak = Carbon::parse(Carbon::now())->diff($karyawan->akhir_kontrak)->format('%y tahun, %m bulan, %d hari'); 
        $this->keterangan = $karyawan->keterangan;

        $this->no_rek = $karyawan->no_rek;

        $this->unit_usaha = $karyawan->unit_usaha;

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

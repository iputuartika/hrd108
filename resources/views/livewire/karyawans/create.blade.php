<!-- Main modal -->
<div class="fixed z-50 w-full p-4 overflow-x-auto overflow-y-auto inset-0 bg-gray-300 bg-opacity-50">
    <div class="center h-auto w-full max-w-4xl shadow-xl">
        <!-- Modal Content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Form {{ $title }} Data Karyawan
                </h3>
                <h3>{{ $kecamatan_id }}.{{ $desa_id }}</h3>
                <button wire:click="closeCreateModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only"></span> 
                </button>
            </div>
            <!-- End Modal Header -->
            <!-- Modal Body -->
            <div class="border-b dark:border-gray-700">
                <!-- Tab Links -->
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li>
                        <button class="{{ $tab == 'personal' ? 'inline-flex p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group' : 'inline-flex p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group' }}" wire:click="$set('tab', 'personal')">
                            <svg aria-hidden="true" class="{{ $tab == 'personal' ? 'w-5 h-5 mr-2 text-blue-600 dark:text-blue-500' : 'w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                            Personal
                        </button>
                    </li>
                    <li>
                        <button class="{{ $tab == 'keluarga' ? 'inline-flex p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group' : 'inline-flex p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group' }}" wire:click="$set('tab', 'keluarga')">
                            <svg aria-hidden="true" class="{{ $tab == 'keluarga' ? 'w-5 h-5 mr-2 text-blue-600 dark:text-blue-500' : 'w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Keluarga
                        </button>
                    </li>
                    <li>
                        <button class="{{ $tab == 'karir' ? 'inline-flex p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group' : 'inline-flex p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group' }}" wire:click="$set('tab', 'karir')">
                            <svg aria-hidden="true" class="{{ $tab == 'karir' ? 'w-5 h-5 mr-2 text-blue-600 dark:text-blue-500' : 'w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
                            Karir
                        </button>
                    </li>
                    <li>
                        <button class="{{ $tab == 'gaji' ? 'inline-flex p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group' : 'inline-flex p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group' }}" wire:click="$set('tab', 'gaji')">
                            <svg aria-hidden="true" class="{{ $tab == 'gaji' ? 'w-5 h-5 mr-2 text-blue-600 dark:text-blue-500' : 'w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                            Penggajian
                        </button>
                    </li>
                    <li>
                        <button class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">
                            Disabled
                        </button>
                    </li>
                </ul>
            </div>
            <div>
                <!-- End Tab Link -->
                <!-- Tab Content -->
                @if($tab == 'personal')
                <div class="max-h-96 overflow-y-auto">
                    <div class="grid gap-4 p-5 sm:grid-cols-5">
                        <div class="sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                            <div class="mt-2 flex items-center gap-x-3"> 
                                @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}" class="rounded-full w-20 h-20">
                                @elseif ($avatar == null)
                                <img src="{{ asset('avatar.png') }}" class="rounded-full w-20 h-20">
                                @else
                                <img src="{{ asset($avatar) }}" class="rounded-full w-20 h-20">
                                @endif
                                <input type="file" wire:model="photo" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                <button wire:click="rmv_avatar()">Remove</button>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="unit_usaha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit Usaha</label>
                            <select wire:model='unit_usaha' id="unit_usaha" class="bg-gray-50 border text-gray-500 border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>
                                <option value="sw108">CV. Saraswati 108</option>
                                <option value="bos">PT. Bali Oxygen Supply</option>
                                <option value="sag">UD. Sari Asih Grosir</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                            <input type="text" wire:model="karyawan_id" id="karyawan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('karyawan_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                            <input type="text" wire:model="ktp" id="ktp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('ktp') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPWP</label>
                            <input type="text" wire:model="npwp" id="npwp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('npwp') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BPJS</label>
                            <input type="text" wire:model="bpjs" id="bpjs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('bpjs') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" wire:model="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('nama') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="departemen_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departemen</label>
                            <select wire:model='departemen_id' id="departemen_id" class="bg-gray-50 border text-gray-900 border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>
                                @foreach ($departemens as $departemen)
                                <option value="{{ $departemen->id }}">{{ $departemen->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="jabatan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                            <select wire:model='jabatan_id' id="jabatan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>
                                @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">  
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                            <input type="text" wire:model="tempat_lahir" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('tempat_lahir') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" wire:model="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @error('tanggal_lahir') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="sm:col-span-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia</label>
                                <input type="text" wire:model="usia" id="usia" class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" readonly>
                            </div> 
                        </div>         
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" wire:model="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>      
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon / WhatsApp</label>
                            <input type="text" wire:model="kontak" id="kontak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('kontak') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon / WhatsApp Darurat</label>
                            <input type="text" wire:model="kontak_darurat" id="kontak_darurat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('kontak_darurat') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div>
                            <label for="kecamatan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan / Kelurahan</label>
                            <select wire:model='kecamatan_id' id="kecamatan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>
                                @foreach ($kecamatans as $kecamatan) 
                                <option value="{{ $kecamatan->code }}">{{ $kecamatan->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="desa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa</label>
                            <select wire:model='desa_id' id="desa_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>
                                @foreach ($desas as $desa) 
                                <option value="{{ $desa->code }}">{{ $desa->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="alamat_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Lengkap</label>
                            <textarea wire:model="alamat_lengkap" id="alamat_lengkap" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=""></textarea>                    
                            @error('alamat_lengkap') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-5">
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                            <div class="flex pt-3">
                                <div class="flex items-center mr-4">
                                    <input wire:model="jenis_kelamin" id="jenis_kelamin" type="radio" value="PRIA" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pria</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input wire:model="jenis_kelamin" id="jenis_kelamin" type="radio" value="WANITA" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
                                </div>
                            </div>
                        </div>
                        <div >
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pedidikan</label>
                            <select wire:model='pendidikan' id="pendidikan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>     
                                <option value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="SMA">SMK</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div >
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Sipil</label>
                            <select wire:model='status' id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>     
                                <option value="LAJANG">LAJANG</option>
                                <option value="MENIKAH">MENIKAH</option>
                                <option value="DUDA">DUDA</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan Darah</label>
                            <select wire:model='gol_darah' id="gol_darah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>     
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                            <select wire:model='agama' id="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>     
                                <option value="ISLAM">ISLAM</option>
                                <option value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
                                <option value="KRISTEN KATOLIK">KRISTEN KATOLIK</option>
                                <option value="HINDU">HINDU</option>
                                <option value="BUDDHA">BUDDHA</option>
                                <option value="KONGHUCU">KONGHUCU</option>
                                <option value="LAINNYA">LAINNYA</option>
                            </select>
                        </div>
                    </div>
                </div>
                @elseif($tab == 'keluarga')
                <div class="max-h-96 overflow-y-auto">
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Ibu Kandung</label>
                            <input type="text" wire:model="nama_ibu" id="nama_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('nama_ibu') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div>
                            <label for="jumlah_tanggungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Tanggungan</label>
                            <select wire:model='jumlah_tanggungan' id="jumlah_tanggungan" class="bg-gray-50 border text-gray-500 border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>
                                <option value="K">K</option>
                                <option value="K0">K0</option>
                                <option value="K1">K1</option>
                                <option value="K2">K2</option>
                                <option value="K3">K3</option>
                                <option value="T1">T1</option>
                                <option value="T2">T2</option>
                                <option value="TK">TK</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Suami / Istri</label>
                            <input type="text" wire:model="nama_suami_istri" id="nama_suami_istri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('nama_suami_istri') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                            <input type="text" wire:model="pekerjaan" id="pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                            <input type="text" wire:model="tl_suami_istri" id="tl_suami_istri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('tl_suami_istri') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" wire:model="tgl_suami_istri" id="tgl_suami_istri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @error('tgl_suami_istri') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>                                
                    </div>     
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anak I</label>
                            <input type="text" wire:model="anak1" id="anak1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('anak1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                            <input type="text" wire:model="tempat_lahir_anak1" id="tempat_lahir_anak1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('tempat_lahir_anak1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" wire:model="tanggal_lahir_anak1" id="tanggal_lahir_anak1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @error('tanggal_lahir_anak1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anak II</label>
                            <input type="text" wire:model="anak2" id="anak2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('anak2') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                            <input type="text" wire:model="tempat_lahir_anak2" id="tempat_lahir_anak2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('tempat_lahir_anak2') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" wire:model="tanggal_lahir_anak2" id="tanggal_lahir_anak2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @error('tanggal_lahir_anak2') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anak III</label>
                            <input type="text" wire:model="anak3" id="anak3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('anak3') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                            <input type="text" wire:model="tempat_lahir_anak3" id="tempat_lahir_anak3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('tempat_lahir_anak3') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" wire:model="tanggal_lahir_anak3" id="tanggal_lahir_anak3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @error('tanggal_lahir_anak3') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                @elseif($tab == 'karir')
                <div class="max-h-96 h-96 overflow-y-auto">
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div>
                            <label for="status_karyawan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Karyawan</label>
                            <select wire:model='status_karyawan' id="status_karyawan" class="bg-gray-50 border text-gray-500 border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option> 
                                <option value="EVENT">EVENT</option>
                                <option value="KONTRAK">KONTRAK</option>
                                <option value="MAGANG 3 BULAN">MAGANG 3 BULAN</option>
                                <option value="MAGANG 3 BULAN">RESIGN</option>  
                            </select>
                        </div>
                        <div>
                            <label for="status_bpjs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status BPJS</label>
                            <select wire:model='status_bpjs' id="status_bpjs" class="bg-gray-50 border text-gray-500 border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Pilih</option>
                                <option value="AKTIF">AKTIF</option>
                                <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Bergabung</label>
                                <input type="date" wire:model="tanggal_bergabung" id="tanggal_bergabung" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                @error('tanggal_bergabung') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div> 
                        </div>
                        <div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Keluar</label>
                                <input type="date" wire:model="tanggal_keluar" id="tanggal_keluar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                @error('tanggal_keluar') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div> 
                        </div>
                        <div class="sm:col-span-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masa Kerja</label>
                                <input type="text" wire:model="masa_kerja" id="masa_kerja" class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" readonly>
                                @error('masa_kerja') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div> 
                        </div>
                    </div>
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Awal Kontrak</label>
                                <input type="date" wire:model="awal_kontrak" id="awal_kontrak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                @error('awal_kontrak') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div> 
                        </div>
                        <div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Akhir Kontrak</label>
                                <input type="date" wire:model="akhir_kontrak" id="akhir_kontrak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                @error('akhir_kontrak') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div> 
                        </div>
                        <div class="sm:col-span-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sisa Kontrak</label>
                                <input type="text" wire:model="masa_kontrak" id="masa_kontrak" class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" readonly>
                                @error('masa_kontrak') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div> 
                        </div>
                        <div class="sm:col-span-3">
                            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea wire:model="keterangan" id="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=""></textarea>                    
                        </div>
                    </div>
                </div>
                @elseif($tab == 'gaji')
                <div class="max-h-96 overflow-y-auto">
                    <div class="grid gap-4 p-5 sm:grid-cols-4">
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Rekening</label>
                            <input type="text" wire:model="no_rek" id="no_rek" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                            @error('no_rek') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                @endif
                <!-- End Tab Content -->
            </div>
            <!-- End Modal Body -->
            <!-- Modal Footer -->
            <div class="flex items-center p-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button wire:click.prevent="store()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                <button wire:click="closeCreateModal()" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Modal Content -->
    </div>
</div>
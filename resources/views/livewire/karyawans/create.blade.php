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
                <!-- <h6>{{ $karyawan_id }}.{{ $ktp}}.{{ $npwp }}.{{ $nama }}.{{ $departemen_id }}.{{ $tempat_lahir }}.{{ $tanggal_lahir }}.{{ $kontak }}.{{ $email }}.{{ $kecamatan_id }}.{{ $desa }}.{{ $alamat_lengkap }}.{{ $jenis_kelamin }}.{{ $status }}.{{ $gol_darah }}.{{ $agama }}.{{ $usia }}</h6> -->
                <button wire:click="closeCreateModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only"></span> 
                </button>
            </div>
            <!-- End Modal Header -->
            <!-- Modal Body -->
            <div x-data="{ openTab: 1,
                activeClasses: 'inline-flex p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group',
                inactiveClasses: 'inline-flex p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group',
                activeSvgClasses: 'w-5 h-5 mr-2 text-blue-600 dark:text-blue-500',
                inactiveSvgClasses: 'w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'}"
                class=""
            >
                <!-- Tab Links -->
                <div wire:ignore class="border-b border-gray-200 dark:border-gray-600">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="mr-2">
                            <button :class="openTab === 1 ? activeClasses : inactiveClasses" class="">
                                <svg aria-hidden="true" :class="openTab === 1 ? activeSvgClasses : inactiveSvgClasses" class="" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                                Personal
                            </button>
                        </li>
                        <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-2">
                            <button :class="openTab === 2 ? activeClasses : inactiveClasses" class="">
                                <svg aria-hidden="true" :class="openTab === 2 ? activeSvgClasses : inactiveSvgClasses" class="" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                Keluarga
                            </button>
                        </li>
                        <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-2">
                            <button :class="openTab === 3 ? activeClasses : inactiveClasses" class="">
                                <svg aria-hidden="true" :class="openTab === 3 ? activeSvgClasses : inactiveSvgClasses" class="text-blue-" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
                                Penggajian
                            </a>
                        </li>
                        <!-- <li @click="openTab = 4" :class="{ '-mb-px': openTab === 4 }" class="mr-2">
                            <button :class="openTab === 4 ? activeClasses : inactiveClasses" class="">
                                <svg aria-hidden="true" :class="openTab === 4 ? activeSvgClasses : inactiveSvgClasses" class="" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>Contacts
                            </a>
                        </li> -->
                        <li>
                            <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
                        </li>
                    </ul>
                </div>
                <!-- End Tab Link -->
                <!-- Tab Content-->
                <div x-show="openTab === 1">
                    <div class="max-h-96 overflow-y-auto">
                        <div class="grid gap-4 p-5 pb-0 sm:grid-cols-2">
                            <div class="">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                                <input type="text" wire:model="karyawan_id" id="karyawan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('karyawan_id') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="grid gap-4 p-5 border-b sm:grid-cols-2">
                            <div class="">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                <input type="text" wire:model="ktp" id="ktp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('ktp') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPWP</label>
                                <input type="text" wire:model="npwp" id="npwp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('npwp') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="grid gap-4 p-5 pb-0 sm:grid-cols-4">
                            <div class="sm:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" wire:model="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('nama') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                <input type="text" wire:model="ktp" id="ktp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('ktp') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="grid gap-4 p-5 sm:grid-cols-4">
                            <div class="row-start-1 row-span-1 col-start-1 col-span-3">
                                <label for="departemen_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departemen</label>
                                <select wire:model='departemen_id' placeholder="nama" id="departemen_id" class="bg-gray-50 border text-gray-500 border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" disabled selected hidden></option>
                                    @foreach ($departemens as $departemen)
                                    <option value="{{ $departemen->id }}">{{ $departemen->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="departemen_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                <select wire:model='departemen_id' id="departemen_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" disabled selected hidden></option>
                                    @foreach ($departemens as $departemen)
                                    <option value="{{ $departemen->id }}">{{ $departemen->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                <input type="text" wire:model="tempat_lahir" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('tempat_lahir') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                <input type="date" value="00/00/0000" wire:model="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                @error('tanggal_lahir') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon / WhatsApp</label>
                                <input type="text" wire:model="kontak" id="kontak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('kontak') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-3">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" wire:model="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="grid gap-4 p-5 grid-cols-3">
                            <div>
                                <label for="kecamatan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan / Kelurahan</label>
                                <select wire:model='kecamatan_id' id="kecamatan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="desa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa</label>
                                <select wire:model='desa_id' id="desa_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="0">Pilih Desa</option>
                                    @foreach ($desas as $desa)
                                    <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="alamat_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Lengkap</label>
                                <textarea wire:model="alamat_lengkap" id="alamat_lengkap" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=""></textarea>                    
                            </div>
                            <div>
                                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                <div class="flex pt-3">
                                    <div class="flex items-center mr-4">
                                        <input wire:model="jenis_kelamin" id="jenis_kelamin" type="radio" value="Pria" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pria</label>
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input wire:model="jenis_kelamin" id="jenis_kelamin" type="radio" value="Wanita" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <input type="text" wire:model="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('status') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan Darah</label>
                                <input type="text" wire:model="gol_darah" id="gol_darah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="">
                                @error('gol_darah') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                <input type="text" wire:model="agama" id="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('agama') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div wire:ignore x-show="openTab === 2">
                    <div>
                        <div class="grid gap-4 p-4 pb-0 grid-cols-3">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" wire:model="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                @error('alamat') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div wire:ignore x-show="openTab === 3">
                    
                <div class="grid sm:grid-cols-4 lg:grid-cols-12 gap-2">
                </div>
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
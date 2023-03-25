<x-slot name="header">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Master Data -> Data Karyawan') }}
        </h2>
        <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
            class="justify-center max-w-xs gap-2">
            <x-icons.github class="w-6 h-6" aria-hidden="true" />
            <span>Star on Github</span>
        </x-button>
    </div>
</x-slot>

<div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 dark:bg-slate-800">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            
            <!-- Setting Tombol -->
            @php
            $tambah = "success";
            $import = "success";
            $size = "base";
            $deleteid = 0;
            @endphp
            <x-button wire:click="openCreateModal()"
                            :variant="$tambah"
                            size="{{ $size }}"
                            class="items-center gap-2"
                        >
                        <x-heroicon-o-add
                                aria-hidden="true"
                                class="{{ $size == 'sm' ? 'w-4 h-4' : ($size == 'base' ? 'w-6 h-6' : 'w-7 h-7' ) }}"
                        />   

                        <span>Baru</span>
            </x-button>
            </button>
            <x-button wire:click="openImportModal()"
                            :variant="$import"
                            size="{{ $size }}"
                            class="items-center gap-2"
                        >
                        <x-heroicon-o-import
                                aria-hidden="true"
                                class="{{ $size == 'sm' ? 'w-4 h-4' : ($size == 'base' ? 'w-6 h-6' : 'w-7 h-7' ) }}"
                        />   

                        <span>Import Excel</span>
            </x-button>
            @foreach ($selectKaryawan as $y)
            {{ $y }}
            @endforeach

            <!-- Table Option    -->
            <div class="flex items-center justify-between pt-3">
                <!-- Pilih data yang di tampilkan per halaman -->
                <div class="relative">
                <label for="halaman" class="flex text-sm">Data / Halaman</label>
                    <div class="relative">
                        <select wire:model="limitPerPage" class="form-control block text-sm pr-2 text-gray-900 border border-gray-300 rounded-lg w-16 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div> 
                <!-- Search -->
                <div class="relative">
                    <label for="cari" class="flex text-sm">Cari Data</label>
                        <div class="absolute inset-y-0 left-0 flex items-center pt-5 pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                    <input wire:model="search" type="text" class="form-control block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                </div>
                <div class="relative pt-5">
                    <button data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                    </button>
                </div>
                <!-- Action dropdown menu -->
                <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                        <li>
                            <button wire:click="deleteSelectKaryawan()" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Delete <span class="text-red-700">({{ count($selectKaryawan) }})</span>
                            </button>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated link</a>
                    </div>
                </div>
            </div>

            <!-- Menampikan Modal Create/Edit -->
            @if($isCreateModalOpen)
            @include('livewire.karyawans.create')
            @endif
            @if($isDeleteModalOpen)
            @include('livewire.karyawans.delete')
            @endif
            @if($isImportModalOpen)
            @include('livewire.karyawans.import')
            @endif
           
            <!-- Menampilkan Data Karyawan -->
            <div class="overflow-x-auto shadow-md sm:rounded-lg mt-3">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-sm text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <!-- Bisa di isi untuk checkbox all data kedepannya -->
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Departement
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 data">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($karyawans as $karyawan)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input wire:model="selectKaryawan" id="selectKaryawan" type="checkbox" value="{{ $karyawan->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="Jese image">
                                <div class="pl-3">
                                     <div class="text-sm font-semibold text-gray-600 dark:text-gray-300">{{ $karyawan->nama }}</div>
                                     <div class="font-normal text-gray-500">{{ $karyawan->departement->nama }}</div>
                                </div>  
                            </th>
                            <td class="py-3 px-6 text-left">
                                {{ $karyawan->alamat }}
                            </td>
                            <td class="py-3 px-6 text-center">
                                {{ $karyawan->departement->nama }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Aktif
                                </div>
                            </td>
                            <td class="flex text-center px-6 py-7 space-x-3">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110 item-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                    <div wire:click="editModal({{ $karyawan->id }})" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                    <div wire:click="deleteModal({{ $karyawan->id }})" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <!-- Pagination -->
            {{ $karyawans->links() }}
        </div>
    </div>

    <!-- Menambahkan border pada colom terakhir -->
    <style>
        html,
        body {
            height: 100%;
        }

        @media (min-width: 640px) {
            table {
            display: inline-table !important;
            }

            thead tr:not(:first-child) {
            display: none;
            }
        }

        td:not(:last-child) {
            border-bottom: 0;
        }

        th:last-child {
            border-bottom: 0px solid rgba(0, 0, 0, .1);
        }
    </style>
</div>
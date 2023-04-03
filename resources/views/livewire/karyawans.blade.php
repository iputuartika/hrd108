<x-slot name="header">
    <div class="flex flex-col gap-4 md:flex-row">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Master Data -> Data Karyawan') }}
        </h2>
    </div>
</x-slot>

<div>
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

    <div class="justify-between flex">
        <!-- BUTTON CREATE & IMPORT -->
        <div>
            <x-button wire:click="openCreateModal()" variant="success"
                class="justify-center max-w-xs gap-2">
                <x-heroicon-o-add class="w-6 h-6" aria-hidden="true" />
                <span class="hidden sm:block">Baru</span>
            </x-button>
        <!-- BUTTON IMPORT -->
            <x-button wire:click="openImportModal()" variant="success"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span class="hidden sm:block">Import</span>
            </x-button>
        </div>
        <!-- SEARCH -->
        <div class="relative w-64 flex flex-wrap items-stretch">
            <input wire:model="search" type="search" placeholder="Search" class="form-input px-3 py-2 placeholder-gray-400 text-gray-700 relative bg-white dark:bg-gray-700 rounded-lg text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
            <span class="h-full pt-4 leading-snug font-normal  text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
        </div>
    </div>

    <!-- TABLE OPTION    -->
    <div class="flex items-center justify-between pt-3 rounded-lg">
        <!-- OPTION PILIHAN JUMLAH DATA YANG DITAMPILKAN DALAM 1 HALAMAN PAGINATION -->
        <div class="relative">
            <label for="halaman" class="flex text-sm">Data / Halaman</label>
            <div class="relative">
                <select wire:model="limitPerPage" class="form-control block text-sm pr-2 text-gray-900 border border-gray-300 rounded-lg w-16 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="6">6</option>
                    <option value="12">12</option>
                    <option value="24">24</option>
                </select>
            </div>
        </div>
        <div class="relative">
            <label for="unit usaha" class="flex text-sm">Unit Usaha</label>
            <div class="relative">
                <select wire:model="unit_usaha" class="form-control w-64 block text-sm pr-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected hidden>Pilih</option>
                    <option value="sw108">Dupa Saraswati 108</option>
                    <option value="bos">Bali Oxygen Supply</option>
                    <option value="sag">Sari Asih Grosir</option>
                </select>
            </div>
        </div> 
        <div class="relative">
            <label for="departemen" class="flex text-sm">Departement</label>
            <div class="relative">
                <select wire:model="dept" class="form-control w-64 block text-sm pr-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Pilih</option>
                    @foreach ($departemens as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- ACTION -->
        <div class="relative pt-5">
            <button data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-transparet rounded-lg hover:bg-gray-100 focus:outline-none dark:text-white focus:ring-white dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
            </button>
        </div>
        <!-- ACTION DROPDOWN MENU -->
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

    <!-- MENAMPILKAN DATA KARYAWAN DALAM TABEL -->
    <div class="shadow my-5 overflow-hidden hidden lg:block border border-gray-200 rounded-lg dark:border-gray-700">
        <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <!-- BISA DI ISI CHECKBOX KEDEPANNYA -->
                        </div>
                    </th>
                    <th scope="col" class="">
                        <div class="text-white w-9">
                            
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Departemen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @foreach ($karyawans as $karyawan)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input variant="default" wire:model="selectKaryawan" id="selectKaryawan" type="checkbox" value="{{ $karyawan->id}}" class="rounded">
                            <label for="checkbox" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class="w-9 h-9">
                        @if ($karyawan->avatar == null)
                        <img class="w-9 h-9 rounded-full" src="{{ asset('avatar.png') }}" alt="Photo">
                        @else
                        <img class="w-9 h-9 rounded-full" src="{{ asset($karyawan->avatar) }}" alt="Photo">
                        @endif
                    </td>
                    <td class="text-gray-800 dark:text-white">
                        <div>
                            <ul>
                                <li>
                                    <div class="flex p-2 rounded">
                                        <div class="ml-2">
                                            <div class="text-sm font-semibold text-gray-600 dark:text-gray-300">
                                                {{ $karyawan->nama}}
                                            </div>
                                            <p class="text-xs text-gray-500">
                                                {{ $karyawan->jabatan->nama }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $karyawan->alamat_lengkap }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $karyawan->departemen->nama }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center">
                             <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> {{$karyawan->status_karyawan}}
                        </div>
                    </td>
                    <td class="px-6 py-6 text-gray-900 dark:text-white">
                        <div class="flex justify-center">
                            <div data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" class="w-4 mr-3 text-green-400 transform hover:text-green-500 hover:scale-110">
                                <x-heroicon-o-clipboard-list
                                    aria-hidden="true"
                                    class="w-5 h-5"
                                />
                            </div>
                            <div id="tooltip-bottom" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                View
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div data-tooltip-target="tooltip-edit" data-tooltip-placement="bottom" wire:click="editModal({{ $karyawan->id }})" class="w-4 mr-3 text-blue-400 transform hover:text-blue-500 hover:scale-110">
                                <x-heroicon-o-pencil-alt
                                    aria-hidden="true"
                                    class="w-5 h-5"
                                />
                            </div>
                            <div id="tooltip-edit" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Edit
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div data-tooltip-target="tooltip-delete" data-tooltip-placement="bottom" wire:click="deleteModal({{ $karyawan->id }})" class="w-4 text-red-500 transform hover:text-red-600 hover:scale-110">
                                <x-heroicon-o-trash
                                    aria-hidden="true"
                                    class="w-5 h-5"
                                />
                            </div>
                            <div id="tooltip-delete" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Delete
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- TABLE ON MOBILE -->
    <div class="grid grid-cols-12 gap-6 lg:hidden">
        @foreach ($karyawans as $karyawan)
        <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 md:col-span-4 intro-y bg-white dark:bg-gray-800"
            href="data/karyawan">
            <div class="p-5">
                <div class="flex justify-between">
                    <x-heroicon-o-user class="w-6 h-6 text-blue-400" aria-hidden="true" />
                    <div
                        class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                        <span class="flex items-center">30%</span>
                    </div>
                </div>
                <div class="ml-2 w-full flex-1">
                     <div>
                         <div class="mt-3 text-3xl font-bold leading-8">{{ $karyawan->nama }}</div>

                        <div class="mt-1 text-base text-gray-600">{{ $karyawan->status }}</div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- PAGINATION -->
    {{ $karyawans->links() }}

    <!-- MENAMPILKAN CREATE/UPDATE/DELETE/IMPORT MODAL -->
    <div>
        @if($isCreateModalOpen)
        @include('livewire.karyawans.create')
        @endif
        @if($isDeleteModalOpen)
        @include('livewire.karyawans.delete')
        @endif
        @if($isImportModalOpen)
        @include('livewire.karyawans.import')
        @endif
    </div>
</div>

<x-slot name="header">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Master Data -> Data Kecamatan') }}
        </h2>
        <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
            class="justify-center max-w-xs gap-2">
            <x-icons.github class="w-6 h-6" aria-hidden="true" />
            <span>Star on Github</span>
        </x-button>
    </div>
</x-slot>

<div>
    <div>
        <!-- Menampilkan pesan -->
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
    </div>

    <div>
        <!-- Form input departemen -->
        <div>
            <label for="">ID</label>
            <input wire:model="kecamatan_id" type="text" name="kecamatan_id" id="kecamatan_id">
            <label for="">Nama</label>
            <input wire:model="nama" type="text" name="nama" id="nama">
            <button wire:click="store()" >Add</button>
        <div>

        <!-- Menampilkan tabel departemens -->
        <table class="border-2">
            <thead>
                <tr>
                    <th>Nama Kecamatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatans as $kecamatan)
                <tr>
                    <td>{{ $kecamatan->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

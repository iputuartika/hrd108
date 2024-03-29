<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown
        title="Master Data"
        :active="Str::startsWith(request()->route()->uri(), 'data')"
    >
        <x-slot name="icon" href="">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Karyawan"
            href="{{ route('data.karyawan') }}"
            :active="request()->routeIs('data.karyawan')"
        />
        <x-sidebar.sublink
            title="Departemen"
            href="{{ route('data.departemen') }}"
            :active="request()->routeIs('data.departemen')"
        />
        <x-sidebar.sublink
            title="Kecamatan"
            href="{{ route('data.kecamatan') }}"
            :active="request()->routeIs('data.kecamatan')"
        />
        <x-sidebar.sublink
            title="Jabatan"
            href="{{ route('data.jabatan') }}"
            :active="request()->routeIs('data.jabatan')"
        />
    </x-sidebar.dropdown>
    
    <x-sidebar.dropdown
        title="Buttons"
        :active="Str::startsWith(request()->route()->uri(), 'buttons')"
    >
        <x-slot name="icon">
            <x-heroicon-o-cake class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Text button"
            href="{{ route('buttons.text') }}"
            :active="request()->routeIs('buttons.text')"
        />
        <x-sidebar.sublink
            title="Icon button"
            href="{{ route('buttons.icon') }}"
            :active="request()->routeIs('buttons.icon')"
        />
        <x-sidebar.sublink
            title="Text with icon"
            href="{{ route('buttons.text-icon') }}"
            :active="request()->routeIs('buttons.text-icon')"
        />
    </x-sidebar.dropdown>

    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="text-sm text-gray-500"
    >
        Dummy Links
    </div>

    <!-- @php
        $links = array_fill(0, 20, '');
    @endphp

    @foreach ($links as $index => $link)
        <x-sidebar.link title="Dummy link {{ $index + 1 }}" href="#" />
    @endforeach -->

</x-perfect-scrollbar>

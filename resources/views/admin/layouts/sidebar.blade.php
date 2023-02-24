<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen border border-r transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-4 py-8 overflow-y-hidden">
        <a href="#" class="flex items-center pl-2.5 mb-8">
            <img src="{{ asset('assets/images/logo.png') }}" class="h-8 mr-3 sm:h-8" alt="Dapur Mami logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Dapur Mami</span>
        </a>
        <ul class="space-y-3">
            <x-sidebar-menu name="Dashboard" icon="fas fa-home" route="{{ route('admin.dashboard') }}"
                active="{{ request()->routeIs('admin.dashboard') }}" />
            <x-sidebar-menu name="Makanan & Minuman" icon="fas fa-utensils" route="{{ route('admin.menu.index') }}" active="{{ request()->routeIs('admin.menu.*') }}" />
            {{-- tagihan --}}
            <x-sidebar-menu name="Tagihan" icon="fas fa-receipt" />
            {{-- pengaturan --}}
            <x-sidebar-menu name="Pengaturan" icon="fas fa-cog" />
            {{-- logout --}}
            <x-sidebar-menu name="Keluar" icon="fas fa-sign-out-alt" />
        </ul>

        <div id="dropdown-cta" class="p-4 mt-12 rounded-2xl border-b border-gray-200 sm:rounded-2xl shadow-xl"
            role="alert">
            <div class="flex items-center text-center justify-center flex-col">
                <div class="avatar">
                    <div class="w-12 rounded-full">
                        <img
                            src="https://images.soco.id/589-5-fakta-menarik-film-avatar-yang-kembali-tayang-5.jpg.jpg" />
                    </div>
                </div>
                <p class="font-bold mt-2">Ibnnu Sutio</p>
                <p class="text-xs text-gray-400">Admin • 4h 26m</p>

                {{-- open profile button light --}}
                <a href="#"
                    class="w-full px-4 py-2 mt-6 text-xs font-medium bg-gray-100 border border-transparent rounded-md shadow-sm">
                    <span>Buka Profil</span>
                </a>
            </div>
        </div>
    </div>
</aside>

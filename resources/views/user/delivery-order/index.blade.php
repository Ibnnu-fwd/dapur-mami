<x-guest-layout>
    <x-user-header />

    @if (auth()->check())
        <section class="w-full mt-10 flex items-center">
            <div class="max-w-screen-xl px-4 mx-auto w-full">
                <h3 class="text-2xl font-bold dark:text-white">
                    Daftar Transaksi
                </h3>

                <div class="xl:flex flex-col items-end py-4 space-y-3 space-x-4 md:flex-row md:space-y-0">
                    <div class="w-full md:w-1/3">
                        <x-input id="search" name="search" placeholder="Cari transaksimu disini" type="text"
                            class="py-3 mb-1.4" />
                    </div>
                    <x-select id="status">
                        <option value="all" selected>Semua</option>
                        <option value="0">Belum dibayar</option>
                        <option value="1">Sudah dibayar</option>
                        <option value="2">Sudah dikirim</option>
                        <option value="3">Selesai</option>
                        <option value="4">Dibatalkan</option>
                    </x-select>

                    <div date-rangepicker class="flex items-center py-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="far fa-calendar"></i>
                            </div>
                            <input name="start" type="text"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5  dark:bg-gray-700 py-3"
                                placeholder="Tanggal mulai">
                        </div>
                        <span class="mx-4 text-gray-500 text-sm">sampai</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="far fa-calendar"></i>
                            </div>
                            <input name="end" type="text"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5 py-3"
                                placeholder="Tanggal akhir">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        @push('js-internal')
            <script>
                @if (Session::has('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '{{ Session::get('success') }}',
                    });
                @endif

                @if (Session::has('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ Session::get('error') }}',
                    });
                @endif
            </script>
        @endpush
    @else
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
                    Nampaknya anda belum login
                </h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-lg sm:px-16 lg:px-48 dark:text-gray-400">
                    Silahkan login terlebih dahulu untuk melanjutkan pemesanan
                </p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-2">
                    <x-link-button route="{{ route('login') }}" class="bg-primary">
                        Masuk
                    </x-link-button>
                    <x-link-button route="{{ route('register') }}" color="gray">
                        Daftar
                    </x-link-button>
                </div>
            </div>
        </section>
    @endif
</x-guest-layout>

<x-app-layout>
    <x-breadcrumbs name="dashboard" />
    <h1 class="font-semibold text-2xl my-8">Halaman Utama</h1>

    <div class="lg:flex gap-x-3">
        <div class="lg:w-2/5">
            <x-card-container>
                <h3 class="font-semibold">Penjualan Harian</h3>
            </x-card-container>
            <x-card-container>
                <div class="flex justify-between items-center">
                    <h3 class="font-semibold">Menu Favorit</h3>
                    <select id="favoriteMenuSelect"
                        class="block max-w-auto p-2 text-sm text-gray-900 border border-gray-300 rounded-lg  focus:ring-primary focus:border-primary">
                        <option value="day">Harian</option>
                        <option value="week">Mingguan</option>
                        <option value="month">Bulanan</option>
                    </select>

                </div>
            </x-card-container>
        </div>
        <div class="lg:w-2/5">
            <x-card-container>
                <h3 class="font-semibold">Total Pendapatan</h3>
            </x-card-container>
        </div>
        <div class="lg:w-1/5">
            <x-card-container>
                <h3 class="font-semibold">Total Pemesanan</h3>
            </x-card-container>
            <x-card-container>
                <h3 class="font-semibold">Total Pelanggan</h3>
            </x-card-container>
        </div>
    </div>

    @push('js-internal')
        <script>
            $(function () {
                $('#favoriteMenuSelect').select2({
                    width: 'resolve'
                });
            });
        </script>
    @endpush
</x-app-layout>

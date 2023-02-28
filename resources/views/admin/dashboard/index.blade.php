<x-app-layout>
    <x-breadcrumbs name="dashboard" />
    <h1 class="font-semibold text-2xl my-8">Halaman Utama</h1>

    <div class="lg:flex gap-x-3">
        <div class="lg:w-2/5">
            <x-card-container>
                <h3 class="font-semibold">Penjualan Harian</h3>
                <div style="height: 317px">
                    <canvas id="dailySalesChart"></canvas>
                </div>
            </x-card-container>
        </div>
        <div class="lg:w-2/5">
            <x-card-container>
                <div class="flex justify-between items-center">
                    <h3 class="font-semibold">Total Pendapatan</h3>
                    <select id="favoriteMenuSelect"
                        class="block max-w-auto p-2 text-sm text-gray-900 border border-gray-300 rounded-lg  focus:ring-primary focus:border-primary">
                        <option value="day">Harian</option>
                        <option value="week">Mingguan</option>
                        <option value="month">Bulanan</option>
                    </select>
                </div>
                <div style="height: 300px" class="relative">
                    <canvas id="totalIncomeChart" class="absolute z-10"></canvas>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="flex flex-col items-center sm:mb-12 mb-14">
                            <span class="text-gray-500">Rupiah</span>
                            <span class="sm:text-xl text-lg font-semibold">1.000.000</span>
                        </div>
                    </div>
                </div>
            </x-card-container>
        </div>
        <div class="lg:w-1/5 flex justify-between flex-col lg:h-[350px]">
            <x-card-container>
                <div class="flex gap-x-2 items-center">
                    <!-- make rectangle with icon -->
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">
                            Total Pemesanan
                        </h3>
                        <span class="text-gray-500">
                            +34 %
                        </span>
                    </div>
                </div>
                <div class="text-center mt-7">
                    <h3 class="text-4xl font-semibold">1.000</h3>
                    <div class="w-full bg-gray-200 rounded-full h-1 dark:bg-gray-700 mt-5 mb-3">
                        <div class="bg-green-600 h-1 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
            </x-card-container>
            <x-card-container>
                <div class="flex gap-x-2 items-center">
                    <!-- make rectangle with icon -->
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">
                            Total Pelanggan
                        </h3>
                        <span class="text-gray-500">
                            +34 %
                        </span>
                    </div>
                </div>
                <div class="text-center mt-7">
                    <h3 class="text-4xl font-semibold">500</h3>
                    <div class="w-full bg-gray-200 rounded-full h-1 dark:bg-gray-700 mt-5 mb-3">
                        <div class="bg-green-600 h-1 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
            </x-card-container>
        </div>
    </div>

    <div class="lg:flex gap-x-3">
        <div class="lg:w-2/5">
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
                <div class="flex justify-between mt-4">
                    <span class="font-medium text-gray-600">Menu</span>
                    <span class="font-medium text-gray-600">Pesanan</span>
                </div>
                {{-- Data Menu --}}
                @for ($i = 1; $i <= 4; $i++)
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-x-3 my-2">
                            <div class="avatar">
                                <div class="w-12 rounded-xl rounded">
                                    <img src="https://cdn1-production-images-kly.akamaized.net/KxuztQKl3tnUN0Fw5iAwKsnX_u0=/0x148:1920x1230/640x360/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3093328/original/069244600_1585909700-fried-2509089_1920.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div>
                                <span class="badge badge-primary badge-sm">Makanan</span>
                                <h3 class="font-semibold mt-1 text-md">Nasi Goreng</h3>
                            </div>
                        </div>
                        <span class="font-semibold text-md">600</span>
                    </div>
                @endfor
            </x-card-container>
        </div>
        <div class="lg:w-3/5">
            <x-card-container>
                <h3 class="font-semibold mb-4">Transaksi Terbaru</h3>
                <table class="w-full" id="recentOrderTable">
                    <thead>
                        <tr>
                            <th>Pelanggan</th>
                            <th>Menu</th>
                            <th>Invoice</th>
                            <th>No. Pesanan</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 5; $i++)
                            <tr>
                                <td>Ibnnu</td>
                                <td>
                                    <ul class="list-none">
                                        <li>Nasi Goreng <span class="text-gray-500">x2</span></li>
                                        <li>Soto <span class="text-gray-500">x2</span></li>
                                    </ul>
                                </td>
                                <td><span class="text-gray-400">TR0011212</span></td>
                                <td><span class="text-gray-400">#00001</span></td>
                                <td><span class="text-gray-400">Rp. 50.000</span></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </x-card-container>
        </div>
    </div>

    @push('js-internal')
        <script>
            $(function() {
                $('#favoriteMenuSelect').select2({
                    width: 'resolve'
                });

                $('#recentOrderTable').DataTable({
                    responsive: true,
                    autoWidth: false,
                    paginate: false,
                    info: false,
                    searching: false,
                    dom: '<"top"i>rt<"bottom"flp><"clear">',
                });
            });
        </script>
        <script src="{{ asset('js/daily-sales.js') }}"></script>
        <script src="{{ asset('js/total-income.js') }}"></script>
    @endpush
</x-app-layout>

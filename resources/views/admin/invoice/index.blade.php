<x-app-layout>
    <x-breadcrumbs name="invoice" />
    <h1 class="font-semibold text-2xl my-8">Tagihan</h1>

    <div class="lg:flex gap-x-4">
        <div class="lg:w-3/5">
            <div class="flex justify-between items-center">
                <select id="invoiceSelect"
                    class="block max-w-auto p-2 text-sm text-gray-900 border border-gray-300 rounded-lg  focus:ring-primary focus:border-primary">
                    <option value="all">Semua Tagihan</option>
                    <option value="day">Harian</option>
                    <option value="week">Mingguan</option>
                    <option value="month">Bulanan</option>
                </select>
                <div class="flex gap-x-3">
                    <div class="relative">
                        <input type="text"
                            class="w-64 px-4 py-2 border text-sm border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent"
                            placeholder="Cari menu" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                            <button type="submit"
                                class="p-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <i class="fa-solid fa-search text-gray-500"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-3 gap-y-4 mt-5">
                @for ($i = 1; $i <= 10; $i++)
                    <div
                        class="w-full bg-white p-4 hover:border hover:border-white-300 rounded-2xl shadow-xl hover:shadow-2xl">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-semibold text-md">Pesanan Ke-12</span>
                            <span class="text-primary">Selesai</span>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-500">Customer Name</span>
                            <span class="font-semibold text-md">14.00</span>
                        </div>
                        <div class="border-t border-gray-200 my-4"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500">Total</span>
                            <span class="font-semibold text-md">Rp. 1.000.000</span>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="lg:w-2/5">
            <x-card-container>
                <p class="font-medium">
                    <i class="fas fa-clock mr-2"></i>
                    Detail Tagihan
                </p>
                <div class="flex justify-between items-center mt-4">
                    <span class="font-semibold text-lg">Pesanan Ke-12</span>
                    {{-- button done --}}
                    <button
                        class="bg-primary text-white px-4 py-2 rounded-md text-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Selesai
                    </button>
                </div>

                <p class="font-semibold my-4">Detail</p>

                <div class="flex justify-between mb-2">
                    <span class="text-gray-500">Customer</span>
                    <span class="text-gray-500">Total Menu</span>
                    <span class="text-gray-500">Pembayaran</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="font-medium">Ibnnu</span>
                    <span class="font-medium">3</span>
                    <span class="font-medium">Tunai</span>
                </div>
                <div class="border-t border-gray-200 my-4"></div>
                <p class="font-semibold my-4">Info Pesanan</p>

                <div class="flex justify-between mb-4">
                    <span class="text-gray-500">Menu</span>
                    <span class="text-gray-500">Total</span>
                </div>

                <div class="flex justify-between items-center my-4">
                    <div class="flex gap-x-3 items-center">
                        <div class="avatar">
                            <div class="w-12 rounded rounded-xl">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        <div>
                            <span class="font-medium">Nasi Goreng</span>
                            <span class="text-gray-400">x 2</span>
                            <p class="text-gray-500">Rp. 50.000</p>
                        </div>
                    </div>
                    <span class="font-medium">Rp. 100.000</span>
                </div>
                <div class="flex justify-between items-center my-4">
                    <div class="flex gap-x-3 items-center">
                        <div class="avatar">
                            <div class="w-12 rounded rounded-xl">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        <div>
                            <span class="font-medium">Nasi Goreng</span>
                            <span class="text-gray-400">x 2</span>
                            <p class="text-gray-500">Rp. 50.000</p>
                        </div>
                    </div>
                    <span class="font-medium">Rp. 100.000</span>
                </div>
                <div class="flex justify-between items-center my-4">
                    <div class="flex gap-x-3 items-center">
                        <div class="avatar">
                            <div class="w-12 rounded rounded-xl">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        <div>
                            <span class="font-medium">Nasi Goreng</span>
                            <span class="text-gray-400">x 2</span>
                            <p class="text-gray-500">Rp. 50.000</p>
                        </div>
                    </div>
                    <span class="font-medium">Rp. 100.000</span>
                </div>
                <div class="flex justify-between items-center my-4">
                    <div class="flex gap-x-3 items-center">
                        <div class="avatar">
                            <div class="w-12 rounded rounded-xl">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        <div>
                            <span class="font-medium">Nasi Goreng</span>
                            <span class="text-gray-400">x 2</span>
                            <p class="text-gray-500">Rp. 50.000</p>
                        </div>
                    </div>
                    <span class="font-medium">Rp. 100.000</span>
                </div>

                <div class="border border-t-1 my-2"></div>

                <div class="flex justify-between items-center">
                    <span class="font-semibold text-lg">Total</span>
                    <span class="font-semibold text-lg">Rp. 400.000</span>
                </div>
                <div class="sm:block xl:grid grid-cols-2 mt-4 gap-x-2">
                    <button
                        class="bg-gray-200 px-4 py-3 rounded-md text-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Batal
                    </button>
                    <button
                        class="bg-primary text-white px-4 py-3 rounded-md text-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Cetak Bukti Pembayaran
                    </button>
                </div>
            </x-card-container>
        </div>
    </div>

    @push('js-internal')
        <script>
            $(function() {
                $('#invoiceSelect').select2({
                    width: 'resolve',
                });
            });
        </script>
    @endpush
</x-app-layout>

<x-app-layout>
    <x-breadcrumbs name="booking" />
    <h1 class="font-semibold text-2xl my-8">Booking</h1>

    <div class="lg:flex gap-x-4">
        <div class="lg:w-3/5">
            <div class="lg:flex gap-x-3 items-end">
                <x-input-single-datepicker label="Tanggal booking" id="booking_date" name="booking_date" />
                <x-input id="search" label="Cari" placeholder="Masukan nama acara" name="search" type="text" />
                <x-link-button route="{{ route('admin.booking.create') }}" class="mb-4 ml-auto" color="gray">
                    Tambah Booking
                </x-link-button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-3 gap-y-4 mt-5">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="w-full bg-white p-4 hover:border rounded-2xl shadow-xl hover:shadow-2xl">
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-semibold text-md">Nama Acara</span>
                            <span class="text-primary">Selesai</span>
                        </div>
                        <div class="mb-4">

                            <ul class="mb-8 space-y-2 text-left text-gray-500 dark:text-gray-400">
                                {{-- Booking date --}}
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-calendar flex-shrink-0 w-4 h-4"></i>
                                    <span>25/04/2023</span>
                                </li>
                                {{-- Total person --}}
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-users flex-shrink-0 w-4 h-4"></i>
                                    <span>25 Orang</span>
                                </li>
                                {{-- Time --}}
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-clock flex-shrink-0 w-4 h-4"></i>
                                    <span>12:00</span>
                                </li>
                                {{-- Reservator --}}
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-user flex-shrink-0 w-4 h-4"></i>
                                    <span>Rivaldi Setiyawan</span>
                                </li>
                            </ul>

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
                    Detail Booking
                </p>
                <div class="flex justify-between items-center mt-4">
                    <span class="font-semibold text-lg">Nama Acara</span>
                    {{-- button done --}}
                    <button
                        class="bg-primary text-white px-4 py-2 rounded-md text-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Selesai
                    </button>
                </div>

                <p class="font-semibold my-4">Detail</p>

                <div class="grid grid-cols-2 mb-2 gap-x-4">
                    <div>
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-gray-500">Tanggal Booking</span>
                            <span>23/05/2023</span>
                        </div>
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-gray-500">Jumlah Orang</span>
                            <span>23 Orang</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-gray-500">Jam</span>
                            <span>14:00</span>
                        </div>
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-gray-500">Reservator</span>
                            <span>Rivaldi Satya</span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 my-4"></div>
                <p class="font-semibold my-4">Menu Pesanan</p>

                <div class="flex justify-between mb-4">
                    <span class="text-gray-500">Menu</span>
                    <span class="text-gray-500">Total</span>
                </div>

                @for ($i = 1; $i <= 3; $i++)
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
                @endfor

                <div class="border border-t-1 my-2"></div>

                <div class="flex justify-between items-center">
                    <span class="font-semibold text-lg">Total</span>
                    <span class="font-semibold text-lg">Rp. 400.000</span>
                </div>
                <div class="sm:block xl:grid grid-cols-2 mt-4 gap-x-2">
                    <button
                        class="bg-gray-200 px-4 py-3 rounded-md text-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Cetak Invoice
                    </button>
                    <button
                        class="bg-primary text-white px-4 py-3 rounded-md text-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Konfirmasi Pembayaran
                    </button>
                </div>
            </x-card-container>
        </div>
    </div>
</x-app-layout>

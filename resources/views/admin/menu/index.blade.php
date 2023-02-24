<x-app-layout>
    <x-breadcrumbs name="menu" />
    <h1 class="font-semibold text-2xl my-8">Makanan & Minuman</h1>

    <div class="lg:flex gap-x-3">
        <div class="lg:w-3/4">
            <div class="sm:block xl:flex justify-between items-center">
                <div class="flex gap-x-3">
                    <a href="#"
                        class="px-6 py-2 mt-6 bg-gray-100 border border-transparent rounded-md shadow-sm hover:bg-gray-200 hover:ring-offset-2 hover:ring-2 hover:ring-green-500 hover:text-primary">
                        <i class="fa-solid fa-burger text-gray-500 mr-2 max-xs-sm:hidden"></i>
                        <span>Makanan</span>
                    </a>
                    <a href="#"
                        class="px-6 py-2 mt-6 bg-gray-100 border border-transparent rounded-md shadow-sm hover:bg-gray-200 hover:ring-offset-2 hover:ring-2 hover:ring-green-500 hover:text-primary">
                        <i class="fa-solid fa-mug-hot text-gray-500 mr-2"></i>
                        <span>Minuman</span>
                    </a>
                    <a href="#"
                        class="px-6 py-2 mt-6 bg-gray-100 border border-transparent rounded-md shadow-sm hover:bg-gray-200 hover:ring-offset-2 hover:ring-2 hover:ring-green-500 hover:text-primary">
                        <i class="fa-solid fa-rotate text-gray-500 mr-2"></i>
                        <span>Lainnya</span>
                    </a>
                </div>
                {{-- search --}}
                <div class="flex gap-x-3">
                    <div class="relative mt-6">
                        <input type="text"
                            class="w-64 px-4 py-2 text-base border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent"
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

            {{-- menu item --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-x-3 gap-y-4 mt-5">
                <div
                    class="
                        w-full
                        bg-white hover:border h-fit hover:border-white-300 rounded-2xl shadow-xl hover:shadow-2xl
                        ">
                    <a href="#">
                        <img class="p-8 rounded-t-lg"
                            src="https://foto.sinergijogja.com/public/foto_news/image_news/selain-mengenyangkan-perut-nasi-goreng-kecombrang-juga-membuat-dapur-jadi-wangi-51.webp" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Nasi
                                Goreng Balado</h5>
                        </a>
                        <p class="mt-2 text-gray-600 dark:text-gray-400 my-4">Nasi goreng balado adalah makanan khas
                            Indonesia.</p>
                        <div class="flex items-center justify-between">
                            <span
                                class="flex md:text-lg lg:text-xl xl:text-lg font-bold text-gray-900 dark:text-white">120.000</span>
                            <a href="#"
                                class="px-6 py-2 bg-primary text-white border border-transparent rounded-md shadow-sm">
                                <span class="max-xs-sm:block">
                                    Pesan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="
                        w-full
                        bg-white hover:border h-fit hover:border-white-300 rounded-2xl shadow-xl hover:shadow-2xl
                        ">
                    <a href="#">
                        <img class="p-8 rounded-t-lg"
                            src="https://www.freepnglogos.com/uploads/food-png/fast-food-transparent-png-pictures-icons-and-png-18.png" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Burger Ayam</h5>
                        </a>
                        <p class="mt-2 text-gray-600 dark:text-gray-400 my-4">
                            Burger ayam adalah makanan khas Indonesia.</p>
                        <div class="flex items-center justify-between">
                            <span
                                class="flex md:text-lg lg:text-xl xl:text-lg font-bold text-gray-900 dark:text-white">45.000</span>
                            <a href="#"
                                class="px-6 py-2 bg-primary text-white border border-transparent rounded-md shadow-sm">
                                <span class="max-xs-sm:block">
                                    Pesan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="
                        w-full
                        bg-white hover:border h-fit hover:border-white-300 rounded-2xl shadow-xl hover:shadow-2xl
                        ">
                    <a href="#">
                        <img class="p-8 rounded-t-lg"
                            src="https://www.freepnglogos.com/uploads/food-png/download-food-png-file-png-image-pngimg-1.png" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Burger Ayam Extra</h5>
                        </a>
                        <p class="mt-2 text-gray-600 dark:text-gray-400 my-4">
                            Burger ayam extra adalah makanan khas Indonesia.</p>
                        <div class="flex items-center justify-between">
                            <span
                                class="flex md:text-lg lg:text-xl xl:text-lg font-bold text-gray-900 dark:text-white">70.000</span>
                            <a href="#"
                                class="px-6 py-2 bg-primary text-white border border-transparent rounded-md shadow-sm">
                                <span class="max-xs-sm:block">
                                    Pesan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="lg:w-1/4">
            <x-card-container>
                <div class="flex justify-between items-center">
                    <div class="flex gap-x-2 items-center">
                        <h3 class="font-semibold text-base">
                            Ibnnu
                        </h3>
                        <i class="fas fa-edit text-primary"></i>
                    </div>
                    <span class="text-gray-400">Jumat, 12 Maret 2021</span>
                </div>
                <div class="flex justify-between items-center mb-8">
                    <h3 class="font-semibold text-sm">Pesanan Ke-12</h3>
                    <span class="text-gray-400">12:00 WIB</span>
                </div>
                @for ($i = 1; $i <= 4; $i++)
                    <div class="p-2 flex justify-between my-3 border border-gray-200 items-center rounded rounded-xl">
                        <div class="flex gap-x-2 items-center">
                            <img class="w-10 h-10 rounded rounded-xl"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                alt="Default avatar">
                            <div>
                                <h3 class="font-semibold text-xs">Nasi Goreng Balado</h3>
                                <h3 class="text-xs">Rp. 120.000</h3>
                            </div>
                        </div>

                        <div class="inline-flex rounded-md shadow-sm" role="group">
                            <button type="button"
                                class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-md text-xs w-5 h-5 text-center">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <span class="px-2 text-sm font-medium text-gray-700">1</span>
                            <button type="button"
                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-xs w-5 h-5 text-center">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                @endfor

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between my-4">
                    <h3 class="font-semibold text-sm">Sub Total</h3>
                    <h3 class="font-semibold text-sm">Rp. 480.000</h3>
                </div>
                <div class="flex justify-between mt-4">
                    <h3 class="font-semibold text-sm">Diskon</h3>
                    <h3 class="font-semibold text-sm">-</h3>
                </div>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between">
                    <h3 class="font-semibold text-sm">Total</h3>
                    <h3 class="font-semibold text-sm">Rp. 480.000</h3>
                </div>

                <div class="flex gap-x-2">
                    <button
                        class="w-full mt-4 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <i class="fa-solid fa-trash mr-2"></i>
                        Batal
                    </button>
                    <button
                        class="w-full mt-4 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <i class="fa-solid fa-shopping-cart mr-2"></i>
                        Pesan
                    </button>
                </div>
            </x-card-container>
        </div>
    </div>
</x-app-layout>

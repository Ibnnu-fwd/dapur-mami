<x-guest-layout>
    <x-user-header />

    {{-- Search and Filter --}}
    <section class="w-full mt-10 flex items-center">
        <div class="max-w-screen-xl px-4 mx-auto w-full">
            <div class="flex flex-col items-end justify-between py-4 space-y-3 md:flex-row md:space-y-0">
                <div class="w-full md:w-1/2">
                    <x-input id="search" name="search" label="Pencarian" type="text" class="py-3 mb-1" />
                </div>
                <div
                    class="flex flex-col items-end justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-end md:space-x-3">
                    <div class="flex items-center w-full space-x-3 md:w-auto">
                        <x-select label="Harga" id="price">
                            <option value="all" selected>Semua Harga</option>
                            <option value="minmax">Murah - Mahal</option>
                            <option value="maxmin">Mahal - Murah</option>
                        </x-select>
                        <x-select label="Kategori" id="category">
                            <option value="all" selected>Semua Kategori</option>
                            <option value="1">Makanan</option>
                            <option value="2">Minuman</option>
                            <option value="3">Camilan</option>
                        </x-select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- List Menu --}}
    <section class="bg-white">
        <div class="px-4 mx-auto max-w-screen-xl sm:pb-16 sm:pt-4 lg:px-6">
            <div id="listMenu" class="space-y-8 mt-12 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
                @forelse ($products as $product)
                    <div id="menuItem" class="w-full bg-white h-fit rounded-2xl shadow-xl hover:shadow-2xl">
                        <a>
                            <img class="rounded-t-lg w-full h-48 object-cover object-center"
                                src="{{ $product->image ? asset($product->image) : asset('images/menu/default.jpg') }}" />
                        </a>
                        <div class="px-5 pb-5 mt-4">
                            <a>
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->name }}
                                </h5>
                            </a>
                            <p class="mt-1 text-gray-600 text-sm my-4">
                                {{-- truncate 2 lines --}}
                                {{ Str::limit($product->description, 50) }}
                            </p>
                            <div class="flex items-end justify-between">
                                <p id="priceMenu" class="text-green-800 font-medium"><span
                                        class="inline-block align-text-bottom text-sm">Rp</span>
                                    {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                                <p class="text-gray-400 text-sm">
                                    {{ $product->sold ?? '0' }} Terjual
                                </p>
                            </div>
                            <div class="mt-8">
                                <x-link-button id="addCart-{{ $product->id }}" onclick="addCart('{{ $product->id }}')"
                                    class="bg-primary w-full justify-center" data-drawer-target="drawer-example"
                                    data-drawer-show="drawer-example" aria-controls="drawer-example"
                                    data-drawer-body-scrolling="true">
                                    <span id="cartLabel-{{ $product->id }}">
                                        Tambah ke Pesanan
                                    </span>
                                </x-link-button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>
                        Tidak ada menu
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Drawer --}}
    <div id="drawer-example"
        class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-96 dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-label">
        <h5 id="drawer-label"
            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
            Detail Pesanan
        </h5>
        <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
            <span class="sr-only">Close menu</span>
        </button>
        <div id="cartList" class="mb-6"></div>
        <div class="border-t border-gray-200 dark:border-gray-700 mb-6"></div>
        <div class="flex justify-between mb-2">
            <p class="text-gray-500 text-sm">
                Sub Total
            </p>
            <p id="subTotal" class="text-gray-900 text-sm">
                Rp 0
            </p>
        </div>
        <div class="flex justify-between mb-4">
            <p class="text-gray-500 text-sm">
                Total Harga
            </p>
            <p id="totalPrice" class="text-gray-900 text-sm">
                Rp 0
            </p>
        </div>
        <x-link-button onclick="calculateOrder()" class="bg-primary w-full justify-center mb-4">
            Hitung Total
        </x-link-button>
        <div class="grid grid-cols-2 gap-4 hidden" id="btnConfirmation">
            <x-link-button data-drawer-hide="drawer-example" aria-controls="drawer-example" id="btnCancel"
                class="bg-red-700 justify-center">
                Batal
            </x-link-button>
            <x-link-button class="bg-primary justify-center" id="btnOrder">
                Pesan
            </x-link-button>
        </div>
    </div>

    @push('js-internal')
        <script>
            let subTotal = 0;
            let totalPrice = 0;
            let cart = [];

            function calculateOrder() {
                subTotal = 0;
                totalPrice = 0;
                cart = [];

                let cartList = $('#cartList').children();
                let cartListLength = cartList.length;
                if (cartListLength == 0) {
                    return false;
                }

                $('.cart-item').each(function() {
                    let id = $(this).data('id');
                    let name = $(this).data('name');
                    let quantity = $('#quantity-' + id).val();
                    let price = $(this).data('price');
                    total = price * quantity;

                    if (quantity == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Jumlah ' + name + ' tidak boleh 0',
                        });
                        $('#quantity-' + id).focus();
                        return false;
                    }

                    cart.push({
                        id: id,
                        name: name,
                        quantity: quantity,
                        price: price,
                        total: total
                    });

                    subTotal += total;
                    total = subTotal;

                });

                $('#subTotal').html('Rp ' + subTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                $('#totalPrice').html('Rp ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                $('#btnConfirmation').removeClass('hidden');

                console.log(cart, subTotal, total);
            }

            function addCart(id) {
                $('#btnConfirmation').addClass('hidden');
                $('#cartLabel-' + id).html('<i class="fas fa-check"></i> Ditambahkan');
                $('#addCart-' + id).addClass('bg-gray-400 cursor-not-allowed');

                let isExist = $('#cart-item-' + id).length;
                if (isExist) {
                    return false;
                }

                let url = "{{ route('user.menu.add-cart', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(data) {
                        $('#cartList').append(data);
                    }
                });
            }

            function removeCartItem(id) {
                $('#cart-item-' + id).remove();
                $('#btnConfirmation').addClass('hidden');
                $('#cartLabel-' + id).html('Tambah ke Pesanan');
                $('#addCart-' + id).removeClass('bg-gray-400 cursor-not-allowed');
            }

            function hideConfirmationButton() {
                $('#btnConfirmation').addClass('hidden');
                return false;
            }

            $(function() {
                $('input[name="search"]').on('keyup', function() {
                    let value = $(this).val();
                    $('#listMenu div').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

                $('select#price').on('change', function() {
                    let value = $(this).val();
                    $.ajax({
                        url: '{{ route('user.menu.sort-by-price') }}',
                        type: 'GET',
                        data: {
                            value: value
                        },
                        success: function(data) {
                            $('#listMenu').html(data);
                        }
                    })
                });

                $('#category').on('change', function() {
                    let value = $(this).val();
                    $.ajax({
                        url: '{{ route('user.menu.sort-by-category') }}',
                        type: 'GET',
                        data: {
                            value: value
                        },
                        success: function(data) {
                            $('#listMenu').html(data);
                        }
                    })
                });

                $('#btnCancel').on('click', function() {
                    location.reload();
                });

                $('#input[name="quantity"]').on('keyup', function() {
                    $(this).val($(this).val().replace(/[^0-9]/g, ''));
                });
            });
        </script>
    @endpush

    {{-- TODO: buat register untuk user dan buat sistem order khusus user --}}
    <!--
    @if (auth()->check())
{{-- Search and Filter --}}
        <section class="w-full mt-10 flex items-center">
            <div class="max-w-screen-xl px-4 mx-auto w-full">
                <div class="flex flex-col items-end justify-between py-4 space-y-3 md:flex-row md:space-y-0">
                    <div class="w-full md:w-1/2">
                        <x-input id="search" name="search" label="Pencarian" type="text" class="py-3 mb-1" />
                    </div>
                    <div
                        class="flex flex-col items-end justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-end md:space-x-3">
                        <div class="flex items-center w-full space-x-3 md:w-auto">
                            <x-select label="Harga" id="price">
                                <option value="all" selected>Semua Harga</option>
                                <option value="minmax">Murah - Mahal</option>
                                <option value="maxmin">Mahal - Murah</option>
                            </x-select>
                            <x-select label="Kategori" id="category">
                                <option value="all" selected>Semua Kategori</option>
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                                <option value="3">Camilan</option>
                            </x-select>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- List Menu --}}
        <section class="bg-white">
            <div class="px-4 mx-auto max-w-screen-xl sm:pb-16 sm:pt-4 lg:px-6">
                <div id="listMenu"
                    class="space-y-8 mt-12 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
                    @forelse ($products as $product)
<div id="menuItem" class="w-full bg-white h-fit rounded-2xl shadow-xl hover:shadow-2xl">
                            <a>
                                <img class="rounded-t-lg w-full h-48 object-cover object-center"
                                    src="{{ $product->image ? asset($product->image) : asset('images/menu/default.jpg') }}" />
                            </a>
                            <div class="px-5 pb-5 mt-4">
                                <a>
                                    <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $product->name }}
                                    </h5>
                                </a>
                                <p class="mt-1 text-gray-600 text-sm my-4">
                                    {{-- truncate 2 lines --}}
                                    {{ Str::limit($product->description, 50) }}
                                </p>
                                <div class="flex items-end justify-between">
                                    <p id="priceMenu" class="text-green-800 font-medium"><span
                                            class="inline-block align-text-bottom text-sm">Rp</span>
                                        {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                    <p class="text-gray-400 text-sm">
                                        {{ $product->sold ?? '0' }} Terjual
                                    </p>
                                </div>
                                <div class="mt-8">
                                    <x-link-button id="addCart-{{ $product->id }}"
                                        onclick="addCart('{{ $product->id }}')"
                                        class="bg-primary w-full justify-center" data-drawer-target="drawer-example"
                                        data-drawer-show="drawer-example" aria-controls="drawer-example"
                                        data-drawer-body-scrolling="true">
                                        <span id="cartLabel-{{ $product->id }}">
                                            Tambah ke Pesanan
                                        </span>
                                    </x-link-button>
                                </div>
                            </div>
                        </div>
        @empty
                        <p>
                            Tidak ada menu
                        </p>
@endforelse
                </div>
            </div>
        </section>

        {{-- Drawer --}}
        <div id="drawer-example"
            class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-96 dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-label">
            <h5 id="drawer-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                Detail Pesanan
            </h5>
            <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
                <span class="sr-only">Close menu</span>
            </button>
            <div id="cartList" class="mb-6"></div>
            <div class="border-t border-gray-200 dark:border-gray-700 mb-6"></div>
            <div class="flex justify-between mb-2">
                <p class="text-gray-500 text-sm">
                    Sub Total
                </p>
                <p id="subTotal" class="text-gray-900 text-sm">
                    Rp 0
                </p>
            </div>
            <div class="flex justify-between mb-4">
                <p class="text-gray-500 text-sm">
                    Total Harga
                </p>
                <p id="totalPrice" class="text-gray-900 text-sm">
                    Rp 0
                </p>
            </div>
            <x-link-button onclick="calculateOrder()" class="bg-primary w-full justify-center mb-4">
                Hitung Total
            </x-link-button>
            <div class="grid grid-cols-2 gap-4 hidden" id="btnConfirmation">
                <x-link-button data-drawer-hide="drawer-example" aria-controls="drawer-example" id="btnCancel"
                    class="bg-red-700 justify-center">
                    Batal
                </x-link-button>
                <x-link-button class="bg-primary justify-center" id="btnOrder">
                    Pesan
                </x-link-button>
            </div>
        </div>

        @push('js-internal')
    <script>
        let subTotal = 0;
        let totalPrice = 0;
        let cart = [];

        function calculateOrder() {
            subTotal = 0;
            totalPrice = 0;
            cart = [];

            let cartList = $('#cartList').children();
            let cartListLength = cartList.length;
            if (cartListLength == 0) {
                return false;
            }

            $('.cart-item').each(function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let quantity = $('#quantity-' + id).val();
                let price = $(this).data('price');
                total = price * quantity;

                if (quantity == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Jumlah ' + name + ' tidak boleh 0',
                    });
                    $('#quantity-' + id).focus();
                    return false;
                }

                cart.push({
                    id: id,
                    name: name,
                    quantity: quantity,
                    price: price,
                    total: total
                });

                subTotal += total;
                total = subTotal;

            });

            $('#subTotal').html('Rp ' + subTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $('#totalPrice').html('Rp ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

            $('#btnConfirmation').removeClass('hidden');

            console.log(cart, subTotal, total);
        }

        function addCart(id) {
            $('#cartLabel-' + id).html('<i class="fas fa-check"></i> Ditambahkan');
            $('#addCart-' + id).addClass('bg-gray-400 cursor-not-allowed');

            let isExist = $('#cart-item-' + id).length;
            if (isExist) {
                return false;
            }

            let url = "{{ route('user.menu.add-cart', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    $('#cartList').append(data);
                }
            });
        }

        function removeCartItem(id) {
            $('#cart-item-' + id).remove();
            $('#btnConfirmation').addClass('hidden');
            $('#cartLabel-' + id).html('Tambah ke Pesanan');
            $('#addCart-' + id).removeClass('bg-gray-400 cursor-not-allowed');
        }

        function hideConfirmationButton() {
            $('#btnConfirmation').addClass('hidden');
            return false;
        }

        $(function() {
            $('input[name="search"]').on('keyup', function() {
                let value = $(this).val();
                $('#listMenu div').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $('select#price').on('change', function() {
                let value = $(this).val();
                $.ajax({
                    url: '{{ route('user.menu.sort-by-price') }}',
                    type: 'GET',
                    data: {
                        value: value
                    },
                    success: function(data) {
                        $('#listMenu').html(data);
                    }
                })
            });

            $('#category').on('change', function() {
                let value = $(this).val();
                $.ajax({
                    url: '{{ route('user.menu.sort-by-category') }}',
                    type: 'GET',
                    data: {
                        value: value
                    },
                    success: function(data) {
                        $('#listMenu').html(data);
                    }
                })
            });

            $('#btnCancel').on('click', function() {
                location.reload();
            });
        });
    </script>
@endpush
@else
<section class="bg-white mt-24">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold leading-tight text-gray-900 dark:text-white">
                        Kamu Belum Masuk
                    </h2>
                    <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">
                        Silahkan masuk terlebih dahulu untuk melanjutkan
                    </p>
                    <x-link-button route="{{ route('login') }}" color="gray" class="px-8">
                        Masuk
                    </x-link-button>
                </div>
            </div>
        </section>
@endif
    -->
</x-guest-layout>

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
        </div>
    </div>
@empty
    <p>
        Tidak ada menu
    </p>
@endforelse

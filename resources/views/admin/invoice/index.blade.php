<x-app-layout>
    <x-breadcrumbs name="invoice" />
    <h1 class="font-semibold text-2xl my-8">Tagihan</h1>

    <div class="lg:flex gap-x-4">
        <div class="lg:w-full" id="invoiceContainer">
            <div class="flex justify-between items-center">
                <select id="invoiceSelect"
                    class="block max-w-auto p-2 text-sm text-gray-900 border border-gray-300 rounded-lg  focus:ring-primary focus:border-primary">
                    <option value="all">Semua Tagihan</option>
                    <option value="yesterday">Kemarin</option>
                    <option value="day">Harian</option>
                    <option value="week">Mingguan</option>
                    <option value="month">Bulanan</option>
                    <option value="year">Tahunan</option>
                </select>
                <div class="flex gap-x-3">
                    <div class="relative">
                        <input type="text" id="search"
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

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-x-3 gap-y-4 mt-5" id="invoiceList">
                @forelse ($invoices as $invoice)
                    <div id="invoice-{{ $invoice->id }}" onclick="detailInvoice({{ $invoice->id }})"
                        class="w-full bg-white p-4 hover:border hover:border-white-300 rounded-2xl shadow-xl hover:shadow-2xl">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-semibold text-md">
                                {{ $invoice->transaction_code }}
                            </span>
                            <span class="badge badge-sm badge-{{ $invoice->getStatusColor() }}">
                                {{ $invoice->getStatus() }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-1 mt-2">
                            <span class="text-gray-800">
                                {{ $invoice->customer_name }}
                            </span>
                            <span class="font-semibold text-md">
                                {{ date('H:i', strtotime($invoice->created_at)) }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-800">Tanggal</span>
                            <span class="font-semibold text-md">
                                {{ date('d-m-Y', strtotime($invoice->created_at)) }}
                            </span>
                        </div>
                        <div class="border-t border-gray-200 my-4"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500">Total</span>
                            <span class="font-semibold text-md">Rp.
                                {{ number_format($invoice->total_payment, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @empty
                    <div class="w-full bg-white p-4 rounded-2xl shadow-xl">
                        <p class="text-center">Tidak ada data</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="hidden" id="detailOrder"></div>
    </div>

    @push('js-internal')
        <script>
            function detailInvoice(id) {
                $('#invoiceContainer').removeClass('lg:w-full').addClass('lg:w-3/5');
                $('#invoiceList').removeClass('xl:grid-cols-4').addClass('xl:grid-cols-3');
                $('#detailOrder').removeClass('hidden');
                $('#detailOrder').addClass('lg:w-2/5');
                let url = '{{ route('admin.invoice.show', ':id') }}';
                $.ajax({
                    url: url.replace(':id', id),
                    type: 'GET',
                    success: function(data) {
                        $('#detailOrder').html(data);
                    }
                });
                return false;
            }

            $(function() {
                $('#invoiceSelect').select2();
                $('#invoiceSelect').on('change', function() {
                    let value = $(this).val();
                    console.log(value);
                    $.ajax({
                        url: '{{ route('admin.invoice.period') }}',
                        type: 'GET',
                        data: {
                            period: value
                        },
                        success: function(data) {
                            $('#invoiceList').html(data);
                        }
                    });
                });
                $('#search').on('keyup', function() {
                    let value = $(this).val();
                    $.ajax({
                        url: '{{ route('admin.invoice.search') }}',
                        type: 'GET',
                        data: {
                            search: value
                        },
                        success: function(data) {
                            $('#invoiceList').html(data);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>

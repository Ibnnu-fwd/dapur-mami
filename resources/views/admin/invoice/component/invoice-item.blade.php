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

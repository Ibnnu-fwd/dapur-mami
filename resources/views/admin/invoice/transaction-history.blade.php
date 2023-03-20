<x-app-layout>
    <x-breadcrumbs name="transaction-history" />
    <h1 class="font-semibold text-2xl my-8">Riwayat Transaksi</h1>

    <div class="flex justify-end gap-x-2 mb-4">
        <x-link-button route="{{route('admin.transaction-history.export')}}" color="gray">
            <i class="fas fa-file-excel mr-2"></i>
            <span>Export</span>
        </x-link-button>
        <x-link-button onclick="btnPrint()" color="gray">
            <i class="fas fa-print mr-2"></i>
            <span>Cetak</span>
        </x-link-button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full" id="transactionTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice</th>
                    <th>Pelanggan</th>
                    <th>Menu</th>
                    {{-- <th>Jumlah</th> --}}
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
        </table>
    </div>

    @push('js-internal')
        <script>
            function btnPrint() {
                window.print();
            }

            $(function() {

                $('#transactionTable').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ajax: "{{ route('admin.transaction-history') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'invoice',
                            name: 'invoice'
                        },
                        {
                            data: 'customer',
                            name: 'customer'
                        },
                        {
                            data: 'menu',
                            name: 'menu'
                        },
                        {
                            data: 'total',
                            name: 'total'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                    ]
                });
            });
        </script>
    @endpush
</x-app-layout>

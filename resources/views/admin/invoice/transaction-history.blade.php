<x-app-layout>
    <x-breadcrumbs name="transaction-history" />
    <h1 class="font-semibold text-2xl my-8">Riwayat Transaksi</h1>

    <div class="overflow-x-auto">
        <table class="w-full" id="transactionTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice</th>
                    <th>Pelanggan</th>
                    <th>Menu</th>
                    <th>Qty</th>
                    {{-- <th>Jumlah</th> --}}
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
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
                $('#transactionTable thead tr')
                    .clone(true)
                    .addClass('filters')
                    .appendTo('#example thead');

                $('#transactionTable').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    orderCellsTop: true,
                    fixedHeader: true,
                    initComplete: function() {
                        var api = this.api();

                        // For each column
                        api
                            .columns()
                            .eq(0)
                            .each(function(colIdx) {
                                // Set the header cell to contain the input element
                                var cell = $('.filters th').eq(
                                    $(api.column(colIdx).header()).index()
                                );
                                var title = $(cell).text();
                                $(cell).html('<input type="text" placeholder="' + title + '" />');

                                // On every keypress in this input
                                $(
                                        'input',
                                        $('.filters th').eq($(api.column(colIdx).header()).index())
                                    )
                                    .off('keyup change')
                                    .on('change', function(e) {
                                        // Get the search value
                                        $(this).attr('title', $(this).val());
                                        var regexr =
                                        '({search})'; //$(this).parents('th').find('select').val();

                                        var cursorPosition = this.selectionStart;
                                        // Search the column for that value
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != '' ?
                                                regexr.replace('{search}', '(((' + this.value +
                                                    ')))') :
                                                '',
                                                this.value != '',
                                                this.value == ''
                                            )
                                            .draw();
                                    })
                                    .on('keyup', function(e) {
                                        e.stopPropagation();

                                        $(this).trigger('change');
                                        $(this)
                                            .focus()[0]
                                            .setSelectionRange(cursorPosition, cursorPosition);
                                    });
                            });
                    },
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
                            data: 'quantity',
                            name: 'quantity'
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
                        {
                            data: 'user',
                            name: 'user'
                        }
                    ],
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        title: 'Data export'
                    }, {
                        extend: 'pdfHtml5',
                        title: 'Data export'
                    }, {
                        // filter status
                        extend: 'collection',
                        text: 'Filter Status',
                        buttons: [{
                                text: 'Semua',
                                action: function(e, dt, node, config) {
                                    dt.search('').draw();
                                }
                            },
                            {
                                text: 'Menunggu',
                                action: function(e, dt, node, config) {
                                    dt.search('Menunggu').draw();
                                }
                            },
                            {
                                text: 'Dibayar',
                                action: function(e, dt, node, config) {
                                    dt.search('Dibayar').draw();
                                }
                            },
                            {
                                text: 'Dibatalkan',
                                action: function(e, dt, node, config) {
                                    dt.search('Dibatalkan').draw();
                                }
                            }
                        ]
                    }]
                });
            });
        </script>
    @endpush
</x-app-layout>

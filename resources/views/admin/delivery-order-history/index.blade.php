<x-app-layout>
    <x-breadcrumbs name="delivery-order-history" />
    <h1 class="font-semibold text-2xl my-8">Riwayat Pengiriman</h1>

    <x-card-container>
        <table id="transactionTable" class="w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Invoice</th>
                    <th>Pelanggan</th>
                    <th>Alamat</th>
                    <th>Catatan</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </x-card-container>

    @push('js-internal')
        <script>
            function btnChangeStatus(id, status) {
                Swal.fire({
                    title: 'Konfirmasi Pembayaran',
                    text: "Apakah anda yakin ingin mengubah status pembayaran ini? Setelah diubah, status tidak dapat dikembalikan lagi",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#19743b',
                    cancelButtonColor: '#8b8b8b',
                    confirmButtonText: 'Konfirmasi',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.delivery-order-history.status.change') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                status: status
                            },
                            success: function(response) {
                                if (response.status == 'success') {
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: response.message,
                                        icon: 'success',
                                    }).then((result) => {
                                        $('#transactionTable').DataTable().ajax.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Gagal',
                                        text: response.message,
                                        icon: 'error',
                                    });
                                }
                            },
                        });
                    }
                });
            }

            $(function() {
                $('#transactionTable').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    responsive: true,
                    ajax: "{{ route('admin.delivery-order-history.index') }}",
                    columns: [{
                            className: 'dt-control',
                            orderable: false,
                            data: null,
                            defaultContent: ''
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
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
                            data: 'address',
                            name: 'address',
                            className: 'none'
                        },
                        {
                            data: 'note',
                            name: 'note',
                            className: 'none'
                        },
                        {
                            data: 'product',
                            name: 'product',
                            className: 'none'
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
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                });
            });
        </script>
    @endpush
</x-app-layout>

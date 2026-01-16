@extends('main')
@push('styles')
    <style>
        .dt-input {
            border: 1px solid #ced4da !important;
            padding: 6px 10px;
            border-radius: 6px;
        }
    </style>
@endpush
@section('title', 'Transaksi')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between my-3">
                <h4>Transaksi</h4>
                <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#tambahTransaksi"><i class="fa-solid fa-plus"></i></button></td>
            </div>
            <table class="table" id="tableTransaksi">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Layanan</th>
                        <th>Berat</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#editTransaksi"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button type="button" class="btn btn-outline-danger" onclick="KonfirmasiHapus()"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @include('transaksi.edit')
    @include('transaksi.tambah')
@endsection
@push('scripts')
    <script>
        $('document').ready(function() {
            $('#tableTransaksi').DataTable();
        });

        function KonfirmasiHapus() {
            Swal.fire({
                title: "Yakin menghapus data ini?",
                text: "Data tidak tkan bisa dipulihkan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya! Hapus Data"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Terhapus!",
                        text: "Data berhasil dihapus.",
                        icon: "success"
                    });
                }
            });
        }

        document.querySelectorAll('.HargaRupiah').forEach(input => {
            input.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                this.value = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(value);
            });
        });
    </script>
@endpush

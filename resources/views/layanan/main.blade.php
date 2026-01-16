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
@section('title', 'Layanan')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between my-3">
                <h4> Layanan</h4>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#tambahLayanan"><i
                        class="fa-solid fa-plus"></i></button>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableTransaksi">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Harga Per KG</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                        data-bs-target="#editLayanan"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button type="button" onclick="KonfirmasiHapus()" class="btn btn-outline-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layanan.tambah')
    @include('layanan.edit')
@endsection
@push('scripts')
    <script>
        $('document').ready(function() {
            $('#tableTransaksi').DataTable();
        })

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

        //function rupiah
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

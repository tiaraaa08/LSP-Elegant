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
                        @forelse ($layanan as $L)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $L->nama_layanan }}</td>
                                <td>Rp {{ number_format($L->harga_per_kg, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#editLayanan{{ $L->id }}"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <form action="{{ route('layanan.destroy', $L->id) }}" method="POST"
                                            class="KonfirmasiHapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @include('layanan.edit')
                        @empty
                            <tr>
                                <td colspan="4" class="text-danger">Data Layanan Tidak Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layanan.tambah')
@endsection
@push('scripts')
    <script>
        $('document').ready(function() {
            $('#tableTransaksi').DataTable();
        })

        document.addEventListener('DOMContentLoaded', function() {
            const hapus = document.querySelectorAll(".KonfirmasiHapus");

            hapus.forEach((form) => {
                form.addEventListener("submit", function(e) {
                    e.preventDefault();
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
                            form.submit();
                        }
                    });
                });
            });
        });

        //function rupiah
        document.addEventListener('shown.bs.modal', function(e) {
            const inputs = e.target.querySelectorAll('.HargaRupiah');

            inputs.forEach(input => {
                // format saat modal dibuka
                let mentah = input.value.replace(/\D/g, '');

                if (mentah !== '') {
                    input.value = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(Number(mentah));
                }

                // format ulang saat user ngetik
                input.addEventListener('input', function() {
                    let val = this.value.replace(/\D/g, '');
                    this.value = val ?
                        new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(Number(val)) :
                        '';
                });
            });
        });
        //function rupiah
        // document.querySelectorAll('.HargaRupiah').forEach(input => {
        //     input.addEventListener('input', function() {
        //         let value = this.value.replace(/\D/g, '');
        //         this.value = new Intl.NumberFormat('id-ID', {
        //             style: 'currency',
        //             currency: 'IDR',
        //             minimumFractionDigits: 0,
        //             maximumFractionDigits: 0
        //         }).format(value);
        //     });
        // });
    </script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                text: '{{ $errors->first() }}',
                confirmButtonText: 'OK'
            });
        </script>
    {{-- @elseif(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script> --}}
    @endif
@endpush

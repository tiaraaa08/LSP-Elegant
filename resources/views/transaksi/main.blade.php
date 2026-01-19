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
                    @foreach ($transaksi as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->waktu_transaksi }}</td>
                            <td>{{ $t->nama_pelanggan }}</td>
                            <td>{{ $t->layanan->nama_layanan }}</td>
                            <td>{{ $t->berat }} KG</td>
                            <td>Rp {{ number_format($t->layanan->harga_per_kg, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($t->layanan->harga_per_kg * $t->berat, 0, ',', '.') }}</td>
                            <td>{{ $t->keterangan }}</td>
                            <td>
                                @if ($t->pembayaran == 'Belum Bayar')
                                    <span class="text-danger">{{ $t->pembayaran }}</span>
                                    <form action="{{ route('transaksi.bayar', $t->id) }}" method="POST" class="modalBayar">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-outline-warning"><i
                                                class="fa-regular fa-credit-card"></i></button>
                                    </form>
                                @elseif ($t->pembayaran == 'Lunas')
                                    <span class="text-success">{{ $t->pembayaran }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                        data-bs-target="#editTransaksi{{ $t->id }}"><i
                                            class="fa-solid fa-pen-to-square"></i></button>
                                    <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST"
                                        class="KonfirmasiHapus">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    @if ($t->pembayaran == 'Lunas')
                                        <a href="{{ route('struk', $t->id) }}">
                                            <button type="button" class="btn btn-outline-success"><i
                                                    class="fa-solid fa-print"></i></button>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @include('transaksi.edit')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('transaksi.tambah')
@endsection
@push('scripts')
    <script>
        $('document').ready(function() {
            $('#tableTransaksi').DataTable({
                language: {
                    emptyTable : '<span class="text-danger"> Data transaksi tidak tersedia</span>'
                }
            });
        });

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

            // bayar
            const bayar = document.querySelectorAll('.modalBayar');

            bayar.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Ubah Status Menjadi Lunas?',
                        text: "Pastikan Pembayaran Sudah Diselesaikan",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, sudah!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

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

            //auto fill + total byg dibayar
            document.querySelectorAll('.modal').forEach(modal => {

                const layanan = modal.querySelector('.layanan');
                const berat = modal.querySelector('.berat');
                const total = modal.querySelector('.totalRupiah');
                const rupiah = modal.querySelector('.HargaRupiah');
                const kembalian = modal.querySelector('.kembalian');

                function formatRupiah(angka) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(angka);
                }

                function hitung() {
                    const b = parseFloat(berat.value) || 0;
                    const h = parseFloat(layanan.selectedOptions[0]?.dataset.harga) || 0;
                    const hasil = b * h;

                    total.value = hasil ? formatRupiah(hasil) : '';
                    hitungKembalian(); //
                }

                function hitungKembalian() {
                    const totBayar = parseInt(total.value.replace(/\D/g, '')) || 0;
                    const jumBayar = parseInt(rupiah.value.replace(/\D/g, '')) || 0;
                    const kembali = jumBayar - totBayar;

                    kembalian.innerText = formatRupiah(kembali > 0 ? kembali : 0);
                }

                berat.addEventListener('input', hitung);
                layanan.addEventListener('change', hitung);
                rupiah.addEventListener('input', hitungKembalian);

                //buat modal edit
                modal.addEventListener('shown.bs.modal', hitung);
            });
        });
    </script>
@endpush

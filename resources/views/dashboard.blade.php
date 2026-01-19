@extends('main') @section('title', 'Dahboard') @section('content')
@push('styles')
    <style>
        .dt-input {
            border: 1px solid #ced4da !important;
            padding: 6px 10px;
            border-radius: 6px;
        }
    </style>
@endpush
<div class="row row-cols-1 row-cols-md-3 gap-4 mb-4">
    <div class="col">
        <div class="card border-top-0 border-primary h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-medium text-primary mb-2">Jumlah Layanan</h6>
                        <h4 class="fs-7 text-primary">{{ $layanan->count() }}</h4>
                    </div>
                    <span class="text-primary display-6">
                        <i class="fa-regular fa-truck"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-top-0 border-success h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-medium text-success mb-2">Transaksi</h6>
                        <h4 class="fs-7 text-success">{{ $transaksi->count() }}</h4>
                    </div>
                    <span class="text-success display-6">
                        <i class="fa-solid fa-credit-card"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-top-0 border-warning h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-medium text-warning mb-2">Sedang Diproses</h6>
                        <h4 class="fs-7 text-warning">{{ $proses->count() }}</h4>
                    </div>
                    <span class="text-warning display-6">
                        <i class="fa-solid fa-truck-fast"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-top-0 border-danger h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-medium text-danger mb-2"> Belum Dibayar</h6>
                        <h4 class="fs-7 text-danger">{{ $belumBayar->count() }}</h4>
                    </div>
                    <span class="text-danger display-6">
                        <i class="fa-regular fa-credit-card"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Transaksi Terbaru</h4>
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Layanan</th>
                        <th>Berat</th>
                        <th>Tanggal Transaksi</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->nama_pelanggan }}</td>
                            <td>{{ $t->layanan->nama_layanan }}</td>
                            <td>{{ $t->berat }} KG</td>
                            <td>{{ $t->waktu_transaksi }}</td>
                            <td>
                                @if ($t->pembayaran == 'Belum Bayar')
                                    <span class="text-danger">{{ $t->pembayaran }}</span>
                                    @elseif ($t->pembayaran == 'Lunas')
                                    <span class="text-success">{{ $t->pembayaran }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                emptyTable: '<span class="text-danger">Data transaksi tidak tersedia</span>'
            }
        });
    });
</script>
@endpush

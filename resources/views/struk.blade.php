<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        @media print {
            .divider-print {
                height: 0;
                border-top: 3px solid black;
                margin: 10px 0;
            }

            body {
                width: 80mm;
            }
        }
    </style>
</head>

<body>
    <div class="px-2">
        <img src="{{ asset('logo.png') }}" width="50px" class="d-block mx-auto" alt="">
        <h2 class="text-center">Tiara Laundry</h2>
        <div class="divider-print"></div>
        <h4 class="text-center">Bukti Transaksi</h4>
        <div class="divider-print"></div>
        <table class="table table-borderless">
            <tr>
                <td class="w-50">Nama Pelanggan</td>
                <td class="w-5">:</td>
                <td class="w-45">{{$transaksi->nama_pelanggan }}</td>
            </tr>
            <tr>
                <td class="w-50">No HP</td>
                <td class="w-5">:</td>
                <td class="w-45">dummy</td>
            </tr>
            <tr>
                <td class="w-50">Waktu Transaksi</td>
                <td class="w-5">:</td>
                <td class="w-45">{{ $transaksi->waktu_transaksi }}</td>
            </tr>
        </table>
        <div class="divider-print"></div>
        <table class="table table-borderless">
            <tr>
                <td class="w-50">Berat</td>
                <td class="w-5">:</td>
                <td class="w-45">{{ $transaksi->berat }} KG</td>
            </tr>
            <tr>
                <td class="w-50">Harga Per KG</td>
                <td class="w-5">:</td>
                <td class="w-45">Rp {{ number_format($transaksi->layanan->harga_per_kg, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="w-50">Layanan</td>
                <td class="w-5">:</td>
                <td class="w-45">{{ $transaksi->layanan->nama_layanan }}</td>
            </tr>
        </table>
        <div class="divider-print"></div>
        <table class="table table-borderless">
            <tr>
                <td class="w-50">Total</td>
                <td class="w-5">:</td>
                <td class="w-45">Rp {{ number_format($transaksi->layanan->harga_per_kg * $transaksi->berat, 0, ',', '.') }}</td>
            </tr>
        </table>
        <div class="divider-print"> </div>
        <h6 class="text-center">LSP 2026 - Tiara</h6>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        window.onload = function() {
            window.print();
            window.onafterprint = () => {
                window.location.href = "{{ route('transaksi.index') }}";
            }
        }
    </script>
</body>

</html>

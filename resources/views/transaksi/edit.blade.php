<div class="modal fade" id="editTransaksi{{$t->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Transaksi '{{ $t->nama_pelanggan }}'</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form p-1" action="{{ route('transaksi.update', $t->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" name="waktu_transaksi" value="{{ $t->waktu_transaksi }}" class="form-control border" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="col-8">

                            <label for="exampleInputPassword1" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" value="{{ $t->nama_pelanggan }}" class="form-control border" placeholder="Masukkan Nama Pelanggan"
                                id="exampleInputPassword1">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label for="exampleInputEmail1" class="form-label">Layanan</label>
                            <select name="id_layanan" class="form-select layanan" aria-label="Default select example">
                                <option selected>Pilih Layanan yang Tersedia</option>
                                @foreach ($layanan as $l)
                                <option value="{{ $l->id }}" data-harga="{{ $l->harga_per_kg }}" {{ $t->id_layanan == $l->id ? 'selected' : '' }}>{{ $l->nama_layanan }} => [Rp {{ number_format($l->harga_per_kg, 0, ',', '.') }}]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Berat</label>
                            <div class="input-group">
                                <input type="text" name="berat" value="{{ $t->berat }}" class="form-control border berat" placeholder="Masukkan Berat(KG)"
                                    aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="exampleInputEmail1" class="form-label">Total</label>
                            <input type="text" readonly class="form-control border totalRupiah" placeholder="Total yang Harus Dibayarkan">
                        </div>
                        <div class="col-7">
                            <label for="exampleInputEmail1" class="form-label">Jumlah Bayar</label>
                            <input type="text" class="form-control border HargaRupiah"
                                placeholder="Masukkan Total Pembayaran" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Pembayaran</label>
                            <select name="pembayaran" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Menu Pembayaran</option>
                                <option {{ $t->pembayaran == 'Belum Bayar' ? 'selected' : '' }} value="Belum Bayar">Belum Bayar</option>
                                <option {{ $t->pembayaran == 'Lunas' ? 'selected' : '' }} value="Lunas">Lunas</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <select name="keterangan" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Keterangan</option>
                                <option {{ $t->keterangan == 'Proses' ? 'selected' : '' }} value="Proses">Proses</option>
                                <option {{ $t->keterangan == 'Selesai' ? 'selected' : '' }} value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="">Kembalian :  <span class="kembalian"></span></div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

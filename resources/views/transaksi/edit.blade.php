<div class="modal fade" id="editTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Transaksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="form p-1">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" class="form-control border" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="col-8">

                            <label for="exampleInputPassword1" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control border" placeholder="Masukkan Nama Pelanggan"
                                id="exampleInputPassword1">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label for="exampleInputEmail1" class="form-label">Layanan</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih Layanan yang Tersedia</option>
                                <option value="One">One</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Berat</label>
                            <div class="input-group">
                                <input type="text" class="form-control border" placeholder="Masukkan Berat(KG)"
                                    aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="exampleInputEmail1" class="form-label">Total</label>
                            <input type="text" class="form-control border" placeholder="Total yang Harus Dibayarkan">
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
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih Menu Pembayaran</option>
                                <option value="Belum Bayar">Belum Bayar</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih Keterangan</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

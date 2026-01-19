<div class="modal fade" id="editLayanan{{ $L->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Layanan '{{ $L->nama_layanan }}'</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form p-1" action="{{ route('layanan.update', $L->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                         <label for="exampleInputPassword1" class="form-label">Nama Layanan</label>
                            <input type="text" required class="form-control border" name="nama_layanan" value="{{ $L->nama_layanan }}" placeholder="Masukkan Nama Layanan" id="exampleInputPassword1">
                    </div>
                    <div class="mb-2">
                         <label for="exampleInputPassword1" class="form-label">Harga Per KG</label>
                            <input type="text" required class="form-control border HargaRupiah" name="harga_per_kg" value="{{ $L->harga_per_kg }}" placeholder="Masukkan Harga Per KG" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

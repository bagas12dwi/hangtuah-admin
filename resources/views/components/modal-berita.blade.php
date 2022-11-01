<div class="modal fade" id="tambahBerita" tabindex="-1" aria-labelledby="tambahBeritaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahBeritaLabel">Tambahkan {{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/post" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Judul {{ $title }}</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Detail Berita</label>
                        <input id="x" type="hidden" name="content">
                        <trix-editor input="x"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputGroupFile01">Upload Foto</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

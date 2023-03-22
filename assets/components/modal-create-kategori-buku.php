 <div class="modal fade" id="modal-create-kategori-buku"  data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Buku</h5>
            </div>
            <div class="modal-body">
                <form action="store.php" method="post">
                    <div class="mb-2">
                        <label for="kategori" class="form-label">Nama Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-2 " data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" >Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
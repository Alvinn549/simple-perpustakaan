 <div class="modal fade" id="modal-create-buku"  data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
            </div>
            <div class="modal-body">
                <form action="store.php" method="post">
                    <div class="mb-2">
                        <label for="id_kategori" class="form-label">Kategori Buku</label>
                        <select name="id_kategori" class="form-control form-select" id="id_kategori">
                            <?php 
                            $sql="SELECT * FROM kategori_buku";
                            $hasil=select($sql);

                            while($kategori = $hasil->fetch_assoc()) { ?>
                                <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori_buku']; ?>  </option>

                            <?php } ?> 
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="nama_buku" class="form-label">Judul</label>
                        <input type="text" name="nama_buku" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" name="isbn" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="lokasi_buku" class="form-label">Lokasi Buku</label>
                        <input type="text" name="lokasi_buku" class="form-control" required>
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
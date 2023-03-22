<?php
include('../app.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id_kategori = $_POST['id_kategori'];
    $id_buku = $_POST['id_buku'];
    $nama_buku = $_POST['nama_buku'];
    $isbn = $_POST['isbn'];
    $penerbit = $_POST['penerbit'];
    $penulis = $_POST['penulis'];
    $lokasi_buku = $_POST['lokasi_buku'];
    
    $kode_buku = $_POST['kode_buku'];

    $sql = "update buku set kode_buku='$kode_buku', nama_buku='$nama_buku', isbn='$isbn', penerbit='$penerbit',penulis='$penulis',lokasi_buku='$lokasi_buku', id_kategori='$id_kategori' where id_buku='$id_buku'";
    
    update($sql,"buku");
}
?>
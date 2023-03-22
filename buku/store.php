<?php
include('../app.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $id_kategori = $_POST["id_kategori"];
    $nama_buku = $_POST["nama_buku"];
    $isbn = $_POST["isbn"];
    $penerbit = $_POST["penerbit"];
    $penulis = $_POST["penulis"];
    $lokasi_buku = $_POST["lokasi_buku"];

    $kode_buku = generateKodeBuku($nama_buku,$id_kategori);
    
    $sql = "INSERT INTO buku(id_kategori,kode_buku,nama_buku,isbn,penerbit,penulis,lokasi_buku) 
    VALUES ('$id_kategori','$kode_buku','$nama_buku','$isbn','$penerbit','$penulis','$lokasi_buku')";
    
    create($sql,"buku");
}
?>
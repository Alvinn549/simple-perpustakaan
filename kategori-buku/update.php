<?php
include('../app.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id_kategori = $_POST['id_kategori'];
    $kategori_buku = $_POST['kategori_buku'];
    
    $sql_kategori = "select * from kategori_buku where id_kategori='$id_kategori'";
    $hasil_kategori = select($sql_kategori);
    $data = $hasil_kategori->fetch_assoc();

    $p = strtoupper(substr($data['kategori_buku'],0,1));
    
    if ($hurufdepanbesar = strtoupper(substr($kategori_buku,0,1)) != $p) {

        $kode_kategori = generateKodeKategori($kategori_buku);

    } else {

        $kode_kategori = $_POST['kode_kategori'];

    }

    $sql="update kategori_buku set kode_kategori='$kode_kategori', kategori_buku='$kategori_buku' where id_kategori='$id_kategori'";

    update($sql,"kategori-buku");
}
?>
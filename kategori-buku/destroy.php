<?php
include('../app.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id_kategori = $_POST['id_kategori'];
    $sql = "delete from kategori_buku where id_kategori='$id_kategori'";
    
    destroy($sql, "kategori-buku");
}
?>
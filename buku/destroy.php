<?php
include('../app.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id_buku  =$_POST['id_buku'];
    $sql = "delete from buku where id_buku='$id_buku'";

    destroy($sql, "buku");
}

?>
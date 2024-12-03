<?php 
include 'include/koneksi.php';

    $id = $_GET["id"];

    unset($_SESSION["troli"][$id]);

    header("location:keranjang.php");
?>
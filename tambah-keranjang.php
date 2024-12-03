<?php 

include 'include/koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tb_produk WHERE id_produk =".$id;
$query = mysqli_query($conn,$sql);
$hasil =  mysqli_fetch_object($query);

$_SESSION["troli"][$id] = [
    "foto" => $hasil->foto,
    "produk" => $hasil->produk,
    "harga" => $hasil->harga,
    "jumlah" => 1
];

header("Location: keranjang.php");
?>
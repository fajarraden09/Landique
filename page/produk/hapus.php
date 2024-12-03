<?php 

// menangkap nilai id dari url
$id = $_GET['id'];
// mengambil data dari tb_jenis berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = $id");
$row = mysqli_fetch_assoc($query);
$produk = $row['produk'];

// menghapus foto profile jika ada
if ($row['foto'] != NULL || $row['foto'] != "") {
  unlink('fotoproduks/'.$row['foto']);
}
// menghapus data jenis laundry
$result = mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk = $id");

if ($result) {
  echo "
  <script>
    alert('Data Produk $produk berhasil dihapus');
    window.location.href = '?page=produk';
  </script>
";
}
?>
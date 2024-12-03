<?php 

// menangkap nilai id dari url
$id = $_GET['id'];
// mengambil data dari tb_pelanggan berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM tb_admins WHERE adminsid = $id");
$row = mysqli_fetch_assoc($query);
$adminsname = $row['adminsname'];

// menghapus foto profile jika ada
if ($row['adminsfoto'] != NULL || $row['adminsfoto'] != "") {
  unlink('fotoadmins/'.$row['adminsfoto']);
}
// menghapus data admins
$result = mysqli_query($conn, "DELETE FROM tb_admins WHERE adminsid = $id");

if ($result) {
  echo "
  <script>
    alert('Data dengan adminsname $adminsname berhasil dihapus');
    window.location.href = '?page=admin';
  </script>
";
}

?>
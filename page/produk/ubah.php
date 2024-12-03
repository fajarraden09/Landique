<?php 

// mengambil nilai id dar url
$id = $_GET['id'];
// mengambil data dari tb_produk berdasarkan id
$result = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = $id");
$row = mysqli_fetch_assoc($result);

  $produk = $row['produk'];
  $produk = $row['produk'];
  $alamat = $row['alamat'];
  $adminstelp = $row['adminstelp'];

// jika tombol tambah ditekan
if (isset($_POST['ubah'])) {
  $produk = htmlentities(strip_tags(trim($_POST["produk"])));
  $kategori = htmlentities(strip_tags(trim($_POST["kategori"])));
  $harga = htmlentities(strip_tags(trim($_POST["harga"])));
  $harga_sewa = htmlentities(strip_tags(trim($_POST["harga_sewa"])));
  $deskripsi = htmlentities(strip_tags(trim($_POST["deskripsi"])));
  $stok = htmlentities(strip_tags(trim($_POST["stok"])));
  $pesan_error = "";
  $pesan_error_user = "";
  $pesan_error_pass = "";

  // jika produk produknya sama
  if ($row['produk'] !== $produk) {
    $query_produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk = '$produk'");
    $result_produk = mysqli_num_rows($query_produk);
    // cek apakah produk ada
    if ($result_produk > 0) {
      $pesan_error_produk= "produk <b>$produk</b> sudah digunakan <br>";
    }
  }

  // jika tidak ada pesan error
  if ($pesan_error_admins == "" && $pesan_error_pass == "") {
    // jika password diinput, maka password diupdate
    if ($adminspass !== "") {
      $password = password_hash($adminspass, PASSWORD_DEFAULT);
      $query = "UPDATE `tb_produk` SET
      `produk` = '$produk',
      `kategori` = '$kategori',
      `harga` = '$harga',
      `harga_sewa` = '$harga_sewa',
      `deskripsi` = '$deskripsi',
      `stok` = '$stok'
      WHERE `tb_produk`.`id_produk` = $id
      ";
      $result = mysqli_query($conn, $query);
    // jika tidak password tidak diupdate
    }else{
      $query = "UPDATE `tb_produk` SET
      `produk` = '$produk',
      `kategori` = '$kategori',
      `harga` = '$harga',
      `harga_sewa` = '$harga_sewa',
      `deskripsi` = '$deskripsi',
      `stok` = '$stok'
      WHERE `tb_produk`.`id_produk` = $id
      ";
      $result = mysqli_query($conn, $query);
    }

    // cek keberhasilan
    if ($result) {
      echo "
      <script>
        alert('Data dengan produk produk $produk berhasil diubah');
        window.location.href = '?page=produk';
      </script>
      ";
    }else{
      $pesan_error .= "Data gagal diubah !";
    }
  // jika ada pesan error
  }else{
    $pesan_error .= "Data gagal diubah !";
  }

}else{
  // value pass
  $adminspass = "";
  $adminspass2 = "";
  // pesan error
  $pesan_error = "";
  $pesan_error_admins = "";
  $pesan_error_pass = "";
}

?>

<div class="page-content-wrapper">
<div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="index.php">Landique</a></li>
                      <li class="breadcrumb-item active">Data Produk</li>
                      <li class="breadcrumb-item active">Edit Produk</li>
                  </ol>
              </div>
              <h4 class="page-title">Edit Produk</h4>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-12">

      <!-- jika pesan error tidak kosong -->
      <?php if ($pesan_error !== "") : ?>
        <div class="alert alert-danger" role="alert">
          <?= $pesan_error; ?>
        </div>
      <?php endif; ?>

          <form action="" method="post">
          <div class="card m-b-100">
            <div class="card-body">

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">produk Produk</label>
                <div class="col-sm-10">
                  <input class="form-control <?= ($pesan_error_user) ? 'is-invalid' : ''; ?>" type="text"id="example-text-input" name="produk" placeholder="Masukkan produk Produk" autofocus required value="<?= $produk; ?>" />
                  
                  <div class="invalid-feedback">
                    <?= $pesan_error_user; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <input class="form-control"type="text"id="example-text-input" name="kategori" placeholder="Masukkan Kategori" value="<?= $kategori; ?>" required/>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                  <input class="form-control" type="number"id="example-text-input" name="harga" placeholder="Masukkan Harga" value="<?= $harga; ?>" required/>
                </div>
              </div>       

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Harga Sewa</label>
                <div class="col-sm-10">
                  <input class="form-control" type="number"id="example-text-input" name="harga_sewa" placeholder="Masukkan Harga Sewa" value="<?= $harga_sewa; ?>" required/>
                </div>
              </div>  

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="example-text-input" name="deskripsi" cols="20" rows="5" placeholder="Masukkan Deskripsi Produk" required><?= $deskripsi; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                  <input class="form-control" type="number"id="example-text-input" name="stok" placeholder="Masukkan Jumlah Stok" value="<?= $stok; ?>" required/>
                </div>
              </div>

              <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
              <a href="?page=produk" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </form>
      <!-- end col -->
    </div>
    <!-- end row -->
  </div>
</div>
<br>

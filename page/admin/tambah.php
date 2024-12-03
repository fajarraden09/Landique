<?php 

// jika tombol tambah ditekan
if (isset($_POST['tambah'])) {
  $adminsname = htmlentities(strip_tags(trim($_POST["adminsname"])));
  $nama = htmlentities(strip_tags(trim($_POST["nama"])));
  $jk = htmlentities(strip_tags(trim($_POST["jk"])));
  $adminspass = htmlentities(strip_tags(trim($_POST["adminspass"])));
  $adminspass2 = htmlentities(strip_tags(trim($_POST["adminspass2"])));
  $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
  $adminstelp = htmlentities(strip_tags(trim($_POST["adminstelp"])));
  $level = htmlentities(strip_tags(trim($_POST["level"])));
  $pesan_error = "";
  $pesan_error_admins = "";
  $pesan_error_pass = "";

  $query_adminsname = mysqli_query($conn, "SELECT * FROM tb_admins WHERE adminsname = '$adminsname'");
  $result_adminsname = mysqli_num_rows($query_adminsname);
  // jika adminsname ada yg sama
  if ($result_admins > 0) {
    $pesan_error_admins = "Adminname <b>$adminsname</b> sudah digunakan <br>";
  }

  // jika pass tidak sama
  if ($adminspass !== $adminspass2) {
    $pesan_error_pass = "Retype password tidak sesuai <br>";
  }

  // jika tidak ada error
  if ($pesan_error_admins == "" && $pesan_error_pass == "") {
    // enkripsi password
    $password = password_hash($adminspass, PASSWORD_DEFAULT);
    $query = mysqli_query($conn, "INSERT INTO `tb_admins`(`adminsid`, `adminsname`, `adminspass`, `nama`, `jk`, `alamat`, `adminstelp`, `level`) VALUES ('adminsid', '$adminsname', '$password', '$nama', '$jk', '$alamat', '$adminstelp', '$level')");
    if ($query) {
      echo "
      <script>
        alert('Data Admin baru $adminsname berhasil ditambahkan');
        window.location.href = '?page=admin';
      </script>
      ";
    }else{
      $pesan_error .= "Data gagal disimpan !";
    }
  
  // jika error menampilkan pesan error
  }else{
    $pesan_error .= "Data gagal disimpan !";
  }

}else{
  $pesan_error = "";
  $adminsname = "";
  $nama = "";
  $adminspass = "";
  $adminspass2 = "";
  $alamat = "";
  $adminstelp = "";
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
                      <li class="breadcrumb-item active">Data Admin</li>
                      <li class="breadcrumb-item active">Tambah Admin/li>
                  </ol>
              </div>
              <h4 class="page-title">Tambah Admin</h4>
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
                <label for="example-text-input" class="col-sm-2 col-form-label">adminsname</label>
                <div class="col-sm-10">
                  <input class="form-control <?= ($pesan_error_admins) ? 'is-invalid' : ''; ?>" type="text"id="example-text-input" name="adminsname" placeholder="Masukkan adminsname" autofocus required value="<?= $adminsname; ?>" />
                  
                  <div class="invalid-feedback">
                    <?= $pesan_error_admins; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <div>
                      <input class="form-control" type="password"id="example-text-input" name="adminspass" placeholder="Masukkan password" required value="<?= $adminspass; ?>" />  
                    </div>
                    <div class="m-t-10">
                      <input class="form-control <?= ($pesan_error_pass) ? 'is-invalid' : ''; ?>" type="password"id="example-text-input" name="adminspass2" placeholder="Retype password" value="<?= $adminspass2; ?>" required/>
                      <div class="invalid-feedback">
                        <?= $pesan_error_pass; ?>
                      </div>
                    </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input class="form-control"type="text"id="example-text-input" name="nama" placeholder="Masukkan nama" value="<?= $nama; ?>" required/>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-md-9">
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="jk" class="custom-control-input" value="Laki - laki" checked>
                            <label class="custom-control-label" for="customRadio4">Laki - laki</label>
                        </div>
                    </div>
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio5" name="jk" class="custom-control-input" value="Perempuan">
                            <label class="custom-control-label" for="customRadio5">Perempuan</label>
                        </div>
                    </div>
                </div>
              </div> <!--end row-->         

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="example-text-input" name="alamat" cols="20" rows="5" placeholder="Masukkan alamat" required><?= $alamat; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                  <input class="form-control" type="number"id="example-text-input" name="adminstelp" placeholder="Masukkan No.Telp" value="<?= $adminstelp; ?>" required/>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <select name="level" class="form-control">
                    <option value='Admin' selected>Admin</option>
                  </select>
                </div>
              </div>

              <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
              <a href="?page=admin" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </form>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </div>
</div>
<br>

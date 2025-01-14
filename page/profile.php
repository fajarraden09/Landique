<?php 

$id = $_GET['id'];
// mengambil data dari database
$result = mysqli_query($conn, "SELECT * FROM tb_admins WHERE adminsid = $id");
$row = mysqli_fetch_assoc($result);

  $adminsname = $row['adminsname'];
  $nama = $row['nama'];
  $alamat = $row['alamat'];
  $admintelp = $row['admintelp'];

// jika tombol ubah ditekan
if (isset($_POST['ubah'])) {
  $adminsname = htmlentities(strip_tags(trim($_POST["adminsname"])));
  $nama = htmlentities(strip_tags(trim($_POST["nama"])));
  $jk = htmlentities(strip_tags(trim($_POST["jk"])));
  $adminspass = htmlentities(strip_tags(trim($_POST["adminspass"])));
  $adminspass2 = htmlentities(strip_tags(trim($_POST["adminspass2"])));
  $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
  $admintelp = htmlentities(strip_tags(trim($_POST["admintelp"])));
  $pesan_error = "";
  $pesan_error_user = "";
  $pesan_error_pass = "";

  // jika adminsname namanya sama
  if ($row['adminsname'] !== $adminsname) {
    $query_adminsname = mysqli_query($conn, "SELECT * FROM tb_admins WHERE adminsname = '$adminsname'");
    $result_adminsname = mysqli_num_rows($query_adminsname);
    // cek apakah adminsname ada
    if ($result_adminsname > 0) {
      $pesan_error_user = "adminsname <b>$adminsname</b> sudah digunakan <br>";
    }
  }

  // jika password diisi
  if ($adminspass !== "") {
    if ($adminspass !== $adminspass2) {
      $pesan_error_pass = "Retype password tidak sesuai <br>";
    }
  }

  // jika tidak ada pesan error
  if ($pesan_error_user == "" && $pesan_error_pass == "") {
    if ($adminspass !== "") {
      $password = password_hash($adminspass, PASSWORD_DEFAULT);
      $query = "UPDATE `tb_admins` SET
      `adminsname` = '$adminsname',
      `adminspass` = '$password',
      `nama` = '$nama',
      `jk` = '$jk',
      `alamat` = '$alamat',
      `admintelp` = '$admintelp'
      WHERE `tb_admins`.`adminsid` = $id
      ";
      $result = mysqli_query($conn, $query);
    }else{
      $query = "UPDATE `tb_admins` SET
      `adminsname` = '$adminsname',
      `nama` = '$nama',
      `jk` = '$jk',
      `alamat` = '$alamat',
      `admintelp` = '$admintelp'
      WHERE `tb_admins`.`adminsid` = $id
      ";
      $result = mysqli_query($conn, $query);
    }

    // cek keberhasilan
    if ($result) {
      echo "
      <script>
        alert('Profile berhasil diubah');
        window.location.href = 'adminz.php';
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
  $pesan_error_user = "";
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
                      <li class="breadcrumb-item active">Profile</li>
                  </ol>
              </div>
              <h4 class="page-title">Profile Users</h4>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-12">

      <?php if ($pesan_error !== "") : ?>
        <div class="alert alert-danger" role="alert">
          <?= $pesan_error; ?>
        </div>
      <?php endif; ?>

          <form action="" method="post">
          <div class="card m-b-100">
            <div class="card-body">

            <!-- upload image -->
            <p align="center" >
              <a href="fotoadmins/<?= $row['adminsfoto']; ?>" target="_blank"><img src="fotoadmins/<?= $row['adminsfoto']; ?>" style="display: block; margin:auto; height:200px;" class="img-thumbnail img-preview mb-1"></a>

              <a href="?page=admin&aksi=foto&id=<?= $row['adminsid']; ?>" class="btn btn-primary" style="margin-top:10px">Ubah Foto</a>
            </p>

              <div class="form-group row">

                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="hidden" name="adminsid" value="<?= $row['adminsid']; ?>">

                  <input class="form-control <?= ($pesan_error_user) ? 'is-invalid' : ''; ?>" type="text"id="example-text-input" name="adminsname" placeholder="Masukkan adminsname" autofocus required value="<?= $adminsname; ?>" />
                  
                  <div class="invalid-feedback">
                    <?= $pesan_error_user; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <div>
                      <input class="form-control" type="password"id="example-text-input" name="adminspass" placeholder="Masukkan password" value="<?= $adminspass; ?>" />  
                    </div>
                    <div class="m-t-10">
                      <input class="form-control <?= ($pesan_error_pass) ? 'is-invalid' : ''; ?>" type="password"id="example-text-input" name="adminspass2" placeholder="Retype password" value="<?= $adminspass2; ?>"/>
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
                  <?php if($row['jk'] == "Laki - laki") { ?>
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
                  <?php }else{ ?>
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="jk" class="custom-control-input" value="Laki - laki">
                            <label class="custom-control-label" for="customRadio4">Laki - laki</label>
                        </div>
                    </div>
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio5" name="jk" class="custom-control-input" value="Perempuan" checked>
                            <label class="custom-control-label" for="customRadio5">Perempuan</label>
                        </div>
                    </div>
                  <?php } ?>
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
                  <input class="form-control" type="number"id="example-text-input" name="admintelp" placeholder="Masukkan No.Telp" value="<?= $admintelp; ?>" required/>
                </div>
              </div>

              <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
              <a href="?page=users" class="btn btn-warning">Kembali</a>
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
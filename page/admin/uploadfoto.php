<?php 

// ambil data id dari url
$id = $_GET['id'];

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
  $pesan_error = "";

  // jika kedua inputan kosong
  if ($_POST['foto'] == "" && $_FILES['adminsfoto']['name'] == "") {
    $pesan_error = "Silahkan pilih salah satu <br>";

  // jika upload melalui oncam
  }elseif($_POST['foto'] !== ""){
    $img = $_POST['foto'];
    $folderPenyimpanan = "fotoadmins/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $namafoto = uniqid() . '.png'; // mengubah nama menjadi unik

    $file = $folderPenyimpanan . $namafoto;
    // pindah foto ke folder
    file_put_contents($file, $image_base64);
  
  // jika upload biasa
  }elseif($_FILES['adminsfoto']['name'] !== ""){
    $namaFile = $_FILES["adminsfoto"]["name"];
    $ukuran = $_FILES["adminsfoto"]["size"];
    $error = $_FILES["adminsfoto"]["error"];
    $tmp = $_FILES["adminsfoto"]["tmp_name"];

    if ($error === 4) {
      $pesan_error = "Silahkan pilih salah satu";
    }

    $gambarvalid = ["jpg","jpeg","png"];
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    // mengecek ekstensi valid
    if (!in_array($ekstensigambar, $gambarvalid)) {
      $pesan_error = "Yang anda upload bukan gambar";
    }

    // max 2mb
    if ($ukuran > 2000000) {
      $pesan_error = "Ukuran gambar terlalu besar";
    }

    // mengubah nama menjadi unik
    $namafoto = uniqid();
    $namafoto .= '.';
    $namafoto .= $ekstensigambar;
    
    // jika tidak ada error
    if ($pesan_error == "") {
      // pindah file ke folder
      move_uploaded_file($tmp, 'fotoadmins/' .$namafoto);
    }
  }

  if ($pesan_error == "") {
    // cek foto 
    // jika foto didalam database tidak kosong
    $query = mysqli_query($conn, "SELECT * FROM tb_admins WHERE adminsid = $id");
    $row = mysqli_fetch_assoc($query);
    if ($row['adminsfoto'] != NULL || $row['adminsfoto'] != "") {
      unlink('fotoadmins/'.$row['adminsfoto']);
    }

    // simpan foto di db
    $namaAdmin = $row['adminsname'];
    mysqli_query($conn, "UPDATE tb_admins SET adminsfoto = '$namafoto' WHERE adminsid = $id");
    echo "
    <script>
      alert('Foto Admin $namaAdmin berhasil diupload');
      window.location.href = '?page=admin';
    </script>
    ";
  }

}else{
  $pesan_error = "";
}

?>

<div class ="page-content-wrapper">
  <div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="#">Landique</a></li>
                      <li class="breadcrumb-item active">Upload Foto Admin</li>
                  </ol>
              </div>
              <h4 class="page-title">Upload Foto Admin</h4>
          </div>
          <!-- pesan error tidak kosong -->
      </div>
  </div>

    <div class="row">
      <div class="col-6">
        <div class="card m-b-30">
          <div class="card-body">
            <h4 class="page-title">Cari Foto di File directory anda</h4>
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="foto" class="image-tag">  

                <!-- upload gambar -->
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="foto" name="adminsfoto" onchange="previewFoto()" /> 
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-10">
                    <img src="fotoadmins/default.svg" class="img-thumbnail img-preview">
                  </div>
                </div>
            
                <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
              </form>
          </div>
        </div>
      </div>
    </div>
      <!-- end row -->
    
    </div> <!-- end container -->
    <!-- end page title end breadcrumb -->
</div>

<!-- script untuk menggunakan webcam -->
<script language="JavaScript">
    Webcam.set({
        width: 470,
        height: 370,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    function ambilgambar() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
<?php 

// memulai session
session_start();

// menghilangkan undifine error index
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// membuat keamanan, jika belum login maka kembali ke login.php
if (!isset($_SESSION['login'])) {
  header('location: login_user.php');
}

// menyertakan koneksi.php
include "include/koneksi.php";

// menampilkan data user yang sedang login
$id = $_SESSION['usersid'];
$admins = mysqli_query($conn, "SELECT * FROM tb_users WHERE usersid = '$id'");
$tampiladmins = mysqli_fetch_assoc($admins);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <title>Landique</title>
    <!-- <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" /> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- <link rel="icon" href="assets/images/rent1.jpeg" type="image/jpeg" > -->
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/jpeg"/>

    <link href="assets/plugins/morris/morris.css" rel="stylesheet" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="assets/sweeetalert2/dist/sweetalert2.min.css">
    <script src="assets/sweeetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- select -->
    <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
  </head>

  <body class="flex">
    <div class="container">

      <div class="row">
          <div class="col-sm-12">
              <div class="page-title-box">
                  <div class="btn-group float-right">
                      <ol class="breadcrumb hide-phone p-0 m-0">
                          <li class="breadcrumb-item"><a href="index.php">Landique</a></li>
                          <li class="breadcrumb-item active">Profile</li>
                      </ol>
                  </div>
              </div>
              <h4 class="page-title" align="center">Profile Anda</h4>
            <div class="card body" style="padding: 100px">
                <div class="row g-0">
                    <div class="col-md-10">
                    
                    <!-- jika user memiliki foto, maka foto ditampilkan -->
                    <?php if($tampiladmins['userfoto'] !== "") { ?>
                        <img src="fotouser/<?= $tampiladmins['userfoto']; ?>" class="img-fluid rounded-start" alt="..." style="width: 500px;">
                    <!-- jika tidak -->
                    <?php }else{ ?>
                        <img src="fotouser/default.svg" class="img-fluid rounded-start" alt="...">
                    <?php } ?>

                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="card-title">Akun Yang Sedang Login</h6>
                        <p class="card-text">
                            <b>Nama : </b><?= $tampiladmins['nama'] ?><br>
                            <b>No Telp :</b> <?= $tampiladmins['usertelp'] ?><br>
                        </p>
                        <p class="card-text"><small class="text-muted">Tanggal & jam login : <?= $_SESSION['tgllogin']; ?></small></p>
                    </div>
                    </div>
                </div>
                </div>
          </div>
    </div>


  <div class="container " style="background-color: blue">
  <H5 style="align: text-center">HALO</H5>

  </div>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/skycons/skycons.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>

        <!-- select2 -->
        <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script>

        <!-- Plugins js -->
        <script src="assets/plugins/timepicker/moment.js"></script>
        <script src="assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
        <script src="assets/plugins/colorpicker/jquery-asColor.js" type="text/javascript"></script>
        <script src="assets/plugins/colorpicker/jquery-asGradient.js" type="text/javascript"></script>
        <script src="assets/plugins/colorpicker/jquery-asColorPicker.min.js" type="text/javascript"></script>

        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
         <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
         <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
         <script src="assets/plugins/datatables/jszip.min.js"></script>
         <script src="assets/plugins/datatables/pdfmake.min.js"></script>
         <script src="assets/plugins/datatables/vfs_fonts.js"></script>
         <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
         <script src="assets/plugins/datatables/buttons.print.min.js"></script>
         <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
         <!-- Responsive examples -->
         <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
         <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
 
         <!-- Datatable init js -->
         <script src="assets/pages/datatables.init.js"></script>

        <!-- Plugins Init js -->
        <script src="assets/pages/form-advanced.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    <script>
      /* BEGIN SVG WEATHER ICON */
      if (typeof Skycons !== "undefined") {
        var icons = new Skycons({ color: "#fff" }, { resizeClear: true }),
          list = [
            "clear-day",
            "clear-night",
            "partly-cloudy-day",
            "partly-cloudy-night",
            "cloudy",
            "rain",
            "sleet",
            "snow",
            "wind",
            "fog",
          ],
          i;

        for (i = list.length; i--; ) icons.set(list[i], list[i]);
        icons.play();
      }

      // scroll

      $(document).ready(function () {
        $("#boxscroll").niceScroll({
          cursorborder: "",
          cursorcolor: "#cecece",
          boxzoom: true,
        });
        $("#boxscroll2").niceScroll({
          cursorborder: "",
          cursorcolor: "#cecece",
          boxzoom: true,
        });
      });
    </script>

    <script>
    function previewFoto(){
      const foto = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');

      const fileFoto = new FileReader();
      fileFoto.readAsDataURL(foto.files[0]);
      fileFoto.onload = function(e) {
      imgPreview.src = e.target.result;
      }
    }

    function printContent(el){
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
    </script>
  </body>
</html>

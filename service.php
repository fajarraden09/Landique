<?php 

// memulai session
session_start();

// menghilangkan undifine error index
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// membuat keamanan, jika belum login maka kembali ke login.php
// if (!isset($_SESSION['login'])) {
//   header('location: login.php');
// }

// menyertakan koneksi.php
include "include/koneksi.php";

// menampilkan data user yang sedang login
// $id = $_SESSION['userid'];
// $users = mysqli_query($conn, "SELECT * FROM tb_users WHERE userid = '$id'");
// $tampilusers = mysqli_fetch_assoc($users);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Landique</title>

    <!-- STYLEHOME  -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700"
      rel="stylesheet"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="stylehome/css/bootstrap.min.css"
    />
    <link type="text/css" rel="stylesheet" href="stylehome/css/slick.css" />
    <link
      type="text/css"
      rel="stylesheet"
      href="stylehome/css/slick-theme.css"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="stylehome/css/nouislider.min.css"
    />
    <link rel="stylesheet" href="stylehome/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="stylehome/css/style.css" />
    <!-- STYLEHOME-END -->

    <!-- navbar style -->
  </head>
  <body>
    <!-- HEADER -->
    <?php include "include/napbar.php"; ?>
    <!-- /HEADER -->

		<!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
			<div class="container" style="margin-top: -10px; margin-bottom: -10px">
				<div class="row">
					<div class="col-md-12" >
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Beranda</a></li>
							<li class="active">Service</li>
						</ul>
					</div>
				</div>
			</div>
    </div>  
		<!-- /BREADCRUMB --> 

    <!-- MENU UTAMA-->

		<div class="section">
			<div class="container" >
				<div class="row">
					<!-- Product main img -->
          <?php 
                // $produk = mysqli_query($conn,"SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."' ");
                // while ($tampil = mysqli_fetch_array($produk)){
              ?>    
					<div class="col-md-6 col-md-push-1">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="assets/images/alat.jpg"; height="350px" width="400px">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-1 ">
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5 col-md-pull-1">
						<div class="product-details">
							<h2 class="product-name"> Segera Perbaiki Alat Anda Yang Rusak</h2>
							<div>
								<h3 class="product-price">Murah, Cepat dan hasil yang seperti baruuu!!</h3>
							</div>
							<p style="text-align:justify;">Tim teknisi kami yang ahli dan berpengalaman akan melakukan diagnosis dan perbaikan pada semua jenis kerusakan alat Anda. Kami menggunakan suku cadang asli untuk memastikan kinerja alat berat Anda kembali optimal.
              Atau anda butuh suku cadang alat segera??? Kami menyediakan berbagai macam suku cadang asli untuk berbagai merek alat ukur dengan harga kompetitif. Kami juga menawarkan layanan pengiriman cepat ke seluruh wilayah.</p>
                <div class="add-to-cart">
                  <a href="form_service.php"><button class="add-to-cart-btn" type="submit">
                  <i class="fa fa-cogs"></i>Perbaiki Barang ANDA</button></a>
                </div>
						</div>
					</div>
					<!-- /Product details -->
          <?php 
          // }
          ?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>


		<!-- <div class="section">
      <div class="container" style="
          max-width: 800px;
          margin: 0 auto;
          padding: 20px;">
              <h1 style="text-align: center;">Layanan Perawatan dan Kalibrasi Alat Ukur Tanah</h1>
              <p>Kami menyediakan layanan perawatan dan kalibrasi untuk berbagai jenis alat ukur tanah, seperti:</p>
              <ul style="    list-style-type: none;
          padding: 0;">
                  <li style="margin-bottom: 10px;">Total Station</li>
                  <li style="margin-bottom: 10px;">Theodolite</li>
                  <li style="margin-bottom: 10px;">Level</li>
                  <li style="margin-bottom: 10px;">Meteran</li>
                  </ul>

              <h2>Mengapa Memilih Layanan Kami?</h2>
              <ul>
                  <li style="margin-bottom: 10px;">Teknisi berpengalaman</li>
                  <li style="margin-bottom: 10px;">Peralatan kalibrasi yang akurat</li>
                  <li>Proses cepat dan efisien</li>
                  <li style="margin-bottom: 10px;">Harga kompetitif</li>
              </ul>

              <h2>Proses Layanan</h2>
              <ol style="    list-style-type: none;
              padding: 0;">
                  <li style="margin-bottom: 10px;">Pengiriman alat</li>
                  <li style="margin-bottom: 10px;">Pemeriksaan awal</li>
                  <li style="margin-bottom: 10px;">Proses kalibrasi</li>
                  <li style="margin-bottom: 10px;">Pembersihan dan perawatan</li>
                  <li style="margin-bottom: 10px;">Pengujian akhir</li>
                  <li style="margin-bottom: 10px;">Pengiriman kembali</li>
              </ol>

      </div>
    </div> -->
    <!-- /MENU UTAMA-->

          <!-- FOOTER -->
          <footer id="footer" style=" position: flex;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;">
        <div id="bottom-footer" class="section">
            <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <span class="copyright">
                    Copyright <a href="adminz.php">&copy;</a>
                    <script>
                    document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | This Made of Landique
                </span>
                </div>
            </div>
            </div>
        </div>
        </footer>
        <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="stylehome/js/jquery.min.js"></script>
    <script src="stylehome/js/bootstrap.min.js"></script>
    <script src="stylehome/js/slick.min.js"></script>
    <script src="stylehome/js/nouislider.min.js"></script>
    <script src="stylehome/js/jquery.zoom.min.js"></script>
    <script src="stylehome/js/main.js"></script>
  </body>
</html>

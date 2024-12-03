<?php
  include 'include/koneksi.php';
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
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Detail Produk</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Beranda</a></li>
              <li><a href="sewa.php">Sewa</a></li>
							<li class="active">Detail</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /BREADCRUMB --> 

    <!-- MENU UTAMA-->
		<div class="section" style="padding: -10px;">
			<div class="container" >
				<div class="row">
					<!-- Product main img -->
          <?php 
                $produk = mysqli_query($conn,"SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."' ");
                while ($tampil = mysqli_fetch_array($produk)){
              ?>    
					<div class="col-md-6 col-md-push-1">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="fotoproduks/<?= $tampil['foto']; ?>"; height="350px" width="400px">
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
							<h2 class="product-name">  <?php echo $tampil['produk']; ?></h2>
							<div>
								<h3 class="product-price">Rp <?= number_format($tampil['harga_sewa']); ?> /Hari</h3>
							</div>
							<p style="text-align:justify;"><?php echo $tampil['deskripsi']; ?></p>

                <div class="add-to-cart">
                  <?php  
                  $admin = mysqli_query($conn,"select * from tb_admins");
                  while ($a = mysqli_fetch_array($admin)){
                  ?>
                  <a href="form_sewa.php?id=<?php echo $tampil['id_produk']; ?>">
                    <button class="add-to-cart-btn">
                      <i class="fa fa-hand-peace-o"></i>Ayo sewa
                    </button>
                  </a>
                  <?php
                  }  ?>
                </div>
						</div>
					</div>
					<!-- /Product details -->
          <?php 
          }
          ?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
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

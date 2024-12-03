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

    <!-- MENU UTAMA-->
    <div id="breadcrumb" class="section">
			<div class="container" style="margin-top: -10px; margin-bottom: -10px">
				<div class="row">
					<div class="col-md-12" >
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Beranda</a></li>
							<li class="active">Sewa</li>
						</ul>
					</div>
				</div>
			</div>
    </div>  

    <div class="section">
      <div class="container" style="margin-top: -35px;">
        <div class="row">
          <!-- <div class="col-md-12">
            <div class="col-md-6  ">
              <div class="header-search">
                <form action="search.php" method="GET">
                  <input class="input" placeholder="Ketik Disini" />
                  <button type="submit" class="search-btn">Cari</button>
                </form>
              </div>
            </div>
          </div> -->

          <!-- BAGIAN PRODUK 1 -->
          <div class="col-md-12">
              <?php 
                include 'include/koneksi.php';
                $no = 1;
                $data = mysqli_query($conn,"select * from tb_produk");
                while ($tampil = mysqli_fetch_array($data)){
              ?>    
                <div class="col-md-3" style="width: 285px; height: 300px; margin-bottom: 100px;"> 
                  <div class="product" >
                    <div class="product-img">
                      <img
                        src="fotoproduks/<?= $tampil['foto']; ?>";
                        class="rounded-circle" style="width: 150px; height: 150px;"
                      />
                    </div>
                    <div class="product-body">
                      <p class="product-category"><?php echo $tampil['kategori']; ?></p>
                      <h3 class="product-name">
                        <a href="detail_sewa.php?id=<?php echo $tampil['id_produk']; ?>">
                          <?php echo $tampil['produk']; ?></a>
                      </h3>
                      <!-- HARGA -->
                      <h4 class="product-price">Rp <?= number_format($tampil['harga_sewa']); ?> /Hari</h4>
                      <!-- END HARGA -->
                      <div class="product-btns">
                        <button class="quick-view">
                          <a href="detail_sewa.php?id=<?php echo $tampil['id_produk']; ?>">
                            <i class="fa fa-eye"></i><span class="tooltipp">Lihat Detail</span>
                          </a>
                        </button>
                      </div>
                    </div>
                    <div class="add-to-cart">
                    <a href="form_sewa.php?id=<?php echo $tampil['id_produk']; ?>">
                      <button class="add-to-cart-btn">
                        <i class="fa fa-hand-peace-o"></i>Ayo sewa
                      </button>
                    </a>
                    </div>
                  </div>
                </div>
              <?php  
              }
              ?>
          </div>
          <!-- END BAGIAN PRODUK -->
        </div>
      </div>
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
    <script src="../../stylehome/js/jquery.min.js"></script>
    <script src="../../stylehome/js/bootstrap.min.js"></script>
    <script src="../../stylehome/js/slick.min.js"></script>
    <script src="../../stylehome/js/nouislider.min.js"></script>
    <script src="../../stylehome/js/jquery.zoom.min.js"></script>
    <script src="../../stylehome/js/main.js"></script>
  </body>
</html>

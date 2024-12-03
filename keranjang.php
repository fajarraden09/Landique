<?php
include 'include/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .product-details .add-cart {
                
                margin-bottom: 30px;
            }

            .product-details .add-cart .add-to-cart-btn {
            position: relative;
            border: 2px solid transparent;
            height: 40px;
            padding: 0 18px;
            background-color: #ef233c;
            color: #fff;
            text-transform: uppercase;
            font-weight: 700;
            border-radius: 40px;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
            }

            .product-details .add-cart .add-to-cart-btn > i {
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 40px;
            line-height: 38px;
            color: #d10024;
            opacity: 0;
            visibility: hidden;
            }

            .product-details .add-cart .add-to-cart-btn:hover {
            background-color: #fff;
            color: #d10024;
            border-color: #d10024;
            /* padding: 0px 30px 0px 30px; */
            }

            .product-details .add-cart .add-to-cart-btn:hover > i {
            opacity: 1;
            visibility: visible;
            }

            .product-details .add-cart .qty-label {
            display: inline-block;
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
            margin-right: 15px;
            margin-bottom: 0px;
            }

            .product-details .add-cart .qty-label .input-number {
            width: 90px;
            display: inline-block;
            }
        </style>
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
                        <h3 class="breadcrumb-header">KERANJANG</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href="index.php">Beranda</a></li>
                            <li class="active">Keranjang</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /BREADCRUMB --> 


        <!-- MAIN MENU -->

        <?php 
                if(!empty($_SESSION["troli"])){
        ?>
            <div class="section">
                <div class="container" >
                    <div class="row">
                            <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered">
                                            <thead>
                                                <tr >
                                                    <th style="text-align: center;">No</th>
                                                    <th style="text-align: center;">Foto</th>
                                                    <th style="text-align: center;">Produk</th>
                                                    <th style="text-align: center;">Harga</th>
                                                    <th style="text-align: center;">Jumlah</th>
                                                    <th style="text-align: center;">Total</th>
                                                    <th style="text-align: center; width:140px">Hapus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no=1;
                                                $totals =0;
                                                foreach($_SESSION["troli"] as $troli => $val){
                                                $subtotal = $val["harga"] * $val["jumlah"];
                                            ?>                                          
                                                <tr>
                                                    <td style="text-align: center; vertical-align: middle;"><?php echo $no++;?></td>
                                                    <th style="text-align: center;">
                                                        <?php if ($val['foto'] != NULL && $val['foto'] != "") { ?>
                                                        <a href="fotoproduks/<?= $val['foto']; ?>" target="_blank"><img src="fotoproduks/<?= $val['foto']; ?>" style="width: 60px;"></a>
                                                        <?php } ?> 
                                                    </th>
                                                    <td style="vertical-align: middle;"><?php echo $val["produk"];?></td>
                                                    <td align="center" style="vertical-align: middle;">Rp <?= number_format($val['harga']); ?></td>
                                                    <td align="center" style="vertical-align: middle;"> <?php echo $val["jumlah"];?></td>
                                                    <td align="center" style="vertical-align: middle;">Rp <?= number_format($subtotal); ?></td>
                                                    <td align="center" style="vertical-align: middle;">                                          
                                                        <!-- <a href="" class="btn btn-warning"><i class="fa fa-refresh"></i></a> -->
                                                        <a href="hapus_troli.php?id=<?php echo $troli?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus ?');"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                            <?php 
                                            $totals+=$subtotal;
                                            }
                                            ?>
                                                <tr style="margin-top:10px">
                                                    <th colspan="5" style="text-align: center; padding-top:25px;"><h3>Jumlah Total</h3></th>
                                                    <th style="text-align: center;  padding-top:27px;"><h5>Rp <?= number_format($totals); ?></h5></th>
                                                    <th>
                                                        <div class="product-details" style="text-align: center;  margin-top:8px; margin-bottom:-15px; padding-left: px">
                                                            <div class="add-cart" style="position: absolute;">
                                                            <a href="form_bayar.php?id=<?php echo $_SESSION['troli']; ?>">
                                                                <button class="add-to-cart-btn">
                                                                <i class=""></i>CHECKOUT
                                                                </button>
                                                            </a>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div  align="center">
                                <div >
                                    <a href="index.php" class="btn btn-success" style="width: 500px; font-size:20PX">
                                        <i class="fa fa-arrow-left">             KEMBALI</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            
        <?php 
            } else {
                echo "<a href='index.php'><h2 style='text-align: center'>Belum ada Produk masuk Keranjang, Ayo segera Pilih !!!</h2></a>";
            }
        ?>

        <!-- END MAIN MENU -->


        <!-- FOOTER -->
        <footer id="footer" style=" position: flex;margin-top: 100px;
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
        <!-- <script>
            function incrementQuantity() {
                var quantity = document.getElementById("quantity");
                quantity.value++;
            }

            function decrementQuantity() {
                var quantity = document.getElementById("quantity");
                if (quantity.value > 1) {
                    quantity.value--;
                }
            }
        </script> -->
        <script src="stylehome/js/jquery.min.js"></script>
        <script src="stylehome/js/bootstrap.min.js"></script>
        <script src="stylehome/js/slick.min.js"></script>
        <script src="stylehome/js/nouislider.min.js"></script>
        <script src="stylehome/js/jquery.zoom.min.js"></script>
        <script src="stylehome/js/main.js"></script>
    </body>
</html>

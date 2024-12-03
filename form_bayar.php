<?php
  include 'include/koneksi.php';

?>

<!DOCTYPE html>
<html>
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
        <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
<body>
    <!-- HEADER -->
    <?php include "include/napbar.php"; ?>
    <!-- /HEADER -->

    <div id="breadcrumb" class="section">
			<div class="container" style="margin-top: -10px; margin-bottom: -10px">
				<div class="row">
					<div class="col-md-12" >
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Beranda</a></li>
                            <li><a href="sewa.php">Produk</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
			</div>
    </div>  

    <div class="section">
        <div class="container" style="margin-top: -10px;">
        <div class="col-lg-6 col-lg-offset-3">
            <?php 
                $produk = mysqli_query($conn,"SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."' ");
                while ($tampil = mysqli_fetch_array($produk)){
            ?>    
            <h4>Isi Data Diri Anda !!</h4>
            <div class="panel panel-success">
                <div class="panel-heading">
                    Checkout Ke WhatsApp
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama" id="name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" id="email">
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" name="phone" class="form-control" placeholder="No Hp" id="phone">
                    </div>
                    <!-- <div class="form-group">
                        <label>Tanggal Sewa</label>
                        <input type="text" name="date" class="form-control" placeholder="Contoh : 21 November 2023" id="date">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="text" name="date_end" class="form-control" placeholder="Contoh : 25 November 2023" id="date_end">
                    </div> -->
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="product" class="form-control" id="product" value="<?php echo $tampil['produk']; ?>" readonly>
                    </div>
                    <div class="input-number">
                        <label>Jumlah Produk</label>
                        <input type="number" id="quantity" value="1" name="qty" class="form-control">
                        <span class="qty-up" style="margin-top:25px" onclick="incrementQuantity()">+</span>
                        <span class="qty-down" onclick="decrementQuantity()">-</span>
                    </div>
                    <div class="form-group">
                        <label>Alamat Kirim</label>
                        <textarea name="address" class="form-control" rows="3" id="address"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success send">Pesan via WhatsApp</button>
                    </div>
 
                    <div id="text-info"></div>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
        </div>
    </div>

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
</body>
<script>
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
                    </script>

<script>
    
   $(document).on('click','.send', function(){
    /* Inputan Formulir */
    var input_name      = $("#name").val(),
        input_email     = $("#email").val(),
        input_phone     = $("#phone").val(),
        // input_date      = $("#date").val(),
        // input_date_end  = $("#date_end").val(),
        input_product   = $("#product").val(),
        input_qty       = $("#quantity").val(),
        input_address   = $("#address").val();
 
    /* Pengaturan Whatsapp */
    var walink      = 'https://web.whatsapp.com/send',
        phone       = '6281217876185',
        text        = 'Halo saya ingin membeli produk anda ',
        text_yes    = 'Pesanan Anda berhasil terkirim.',
        text_no     = 'Isilah formulir terlebih dahulu.';
 
    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        var walink = 'whatsapp://send';
    }
 
    if(input_name != "" && input_phone != "" && input_product != ""){
        /* Whatsapp URL */
        var checkout_whatsapp = walink + '?phone=' + phone + '&text=' + text + '%0A%0A' +
            '*Nama*                   : ' + input_name + '%0A' +
            '*Alamat Email*       : ' + input_email + '%0A' +
            '*Nomor Hp*           : ' + input_phone + '%0A' +
            // '*Tanggal Sewa*      : ' + input_date + '%0A' +
            // '*Tanggal Selesai*   : ' + input_date_end + '%0A' +
            '*Produk*                 : ' + input_product + '%0A' +
            '*Jumlah Produk*    : ' + input_qty + '%0A' +
            '*Alamat Kirim*       : ' + input_address + '%0A';
 
        /* Whatsapp Window Open */
        window.open(checkout_whatsapp,'_blank');
        document.getElementById("text-info").innerHTML = '<div class="alert alert-success">'+text_yes+'</div>';
    } else {
        document.getElementById("text-info").innerHTML = '<div class="alert alert-danger">'+text_no+'</div>';
    }
});
</script>
<!-- <script src="stylehome/js/jquery.min.js"></script>
    <script src="stylehome/js/bootstrap.min.js"></script>
    <script src="stylehome/js/slick.min.js"></script>
    <script src="stylehome/js/nouislider.min.js"></script>
    <script src="stylehome/js/jquery.zoom.min.js"></script>
    <script src="stylehome/js/main.js"></script> -->
</html>
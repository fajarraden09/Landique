<div id="sidebar-menu">
  <ul>

    <li class="menu-title text-center"><b>Landique</b></li>
    
    <li>
      <a href="adminz.php" class="waves-effect">
        <i class="mdi mdi-airplay"></i><span> Dashboard</span>
      </a>
    </li>

    <li>

  <!-- jika level admin -->
  <?php if($_SESSION['level'] == 'Admin') : ?>

      <?php 
      // menghitung data pelanggan
      $datauser = mysqli_query($conn, "SELECT * FROM tb_users");
      $jmlDatauser = mysqli_num_rows($datauser);
      ?>
      <a href="?page=users" class="waves-effect">
        <i class="fa fa-users"></i>
        <span>Data User<span class="badge badge-pill badge-primary float-right"><?= $jmlDatauser; ?></span></span>
      </a>
    </li>
  
    <li>
      <?php 
      // menghitung data admin
      $dataadmins = mysqli_query($conn, "SELECT * FROM tb_admins");
      $jmlDataadmins = mysqli_num_rows($dataadmins);
      ?>
      <a href="?page=admin" class="waves-effect">
        <i class="fa fa-users"></i>
        <span>Data Admin<span class="badge badge-pill badge-primary float-right"><?= $jmlDataadmins; ?></span></span>
      </a>
    </li>

    <li>
    <?php 
      // menghitung data produk
      $produk = mysqli_query($conn, "SELECT * FROM tb_produk");
      $jmlproduk = mysqli_num_rows($produk);
      ?>
      <a href="?page=produk" class="waves-effect">
      <i class="fa fa-key"></i>
        <span>Produk<span class="badge badge-pill badge-primary float-right"><?= $jmlproduk; ?></span></span>
      </a>
    </li>
  
  
    <li>
      <?php 
      // menghitung data transaksi
      $transaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi");
      $jmltransaksi = mysqli_num_rows($transaksi);
      ?>
      <a href="?page=transaksi" class="waves-effect">
        <i class="fa fa-shopping-cart"></i>
        <span>Transaksi<span class="badge badge-pill badge-primary float-right"><?= $jmltransaksi; ?></span></span>
      </a>
    </li>

    <li>
      <?php 
      // menghitung data detail transaksi
      $detail_transaksi = mysqli_query($conn, "SELECT * FROM tb_detail_transaksi");
      $jmldetail_transaksi = mysqli_num_rows($detail_transaksi);
      ?>
      <a href="?page=detail_transaksi" class="waves-effect">
      <i class="fa fa-money"></i>
        <span>Detail Transaksi<span class="badge badge-pill badge-primary float-right"><?= $jmldetail_transaksi; ?></span></span>
      </a>
    </li>
    <?php endif; ?>
    <li>
      <a href="logout.php" class="waves-effect" onclick="return confirm('Apakah anda ingin logout ?');">
        <i class="mdi mdi-logout m-r-5 text-muted"></i>
        <span>Logout</span>
      </a>
    </li>

  </ul>
</div>

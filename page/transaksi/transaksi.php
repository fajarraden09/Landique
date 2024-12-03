<div class ="page-content-wrapper">
  <div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="#">Landique</a></li>
                      <li class="breadcrumb-item active">Transaksi</li>
                  </ol>
              </div>
              <h4 class="page-title">Transaksi</h4>
          </div>
      </div>
  </div>

    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-body">
          <div class="table-responsive">
            <!-- <h4 class="mt-0 header-title">
              <a href="?page=rental&aksi=tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Transaksi</a>
            </h4>
            <h4 class="mt-0 header-title">
      
              <a href="?page=rental&aksi=rentallunas" class="btn btn-success">Status Lunas</a>
  
              <a href="?page=rental&aksi=rentalbelumlunas" class="btn btn-danger">Status Belum Lunas</a>
            </h4> -->
            <table id="datatable" class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID</th>
                  <th>NAMA PEMBELI</th>
                  <th>NAMA PRODUK</th>
                  <th>HARGA</th>
                  <th>JUMLAH</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>
              <?php 
              // menampilkan data transaksi rental
              $query = "SELECT * FROM `tb_transaksi` INNER JOIN `tb_produk` ON `id_produk`INNER JOIN `tb_users` ON `usersid` ORDER BY `tb_transaksi`.`id_transaksi` DESC";
              $result = mysqli_query($conn, $query); ?>
              <?php $i = 1; ?>
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row['id_transaksi']; ?></td>
                  <td><?= $row['username']; ?></td>
                  <td><?= $row['produk']; ?></td>
                  <td><?= $row['harga']; ?></td>
                  <td><?= $row['jumlah_produk']; ?></td>
                  </td>
                </tr>
              <?php $i++; ?>
              <?php endwhile; ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
    <!-- end page title end breadcrumb -->
  </div>
  <!-- container -->
</div>

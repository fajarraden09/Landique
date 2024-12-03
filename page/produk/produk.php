<div class ="page-content-wrapper">
  <div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="#">Landique</a></li>
                      <li class="breadcrumb-item active">PRODUK</li>
                  </ol>
              </div>
              <h4 class="page-title">PRODUK</h4>
          </div>
      </div>
  </div>

    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-body">
          <div class="table-responsive">
            <h4 class="mt-0 header-title">
              <a href="?page=produk&aksi=tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
            </h4>
            <table id="datatable" class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Harga Sewa</th>
                  <th>Deskrispi</th>
                  <th>stok</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              // menampilkan data produk rental            
              $result = mysqli_query($conn, "SELECT * FROM tb_produk"); ?>
              <?php $i = 1; ?>
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <th>
                    <?php if ($row['foto'] != NULL && $row['foto'] != "") { ?>
                      <a href="fotoproduks/<?= $row['foto']; ?>" target="_blank"><img src="fotoproduks/<?= $row['foto']; ?>" style="width: 120px;"></a>
                    <?php } ?>
                  </th>
                  <td><?= $row['produk']; ?></td>
                  <td><?= $row['kategori']; ?> </td>
                  <td>Rp. <?= number_format($row['harga']); ?></td>
                  <td>Rp. <?= number_format($row['harga_sewa']); ?></td>
                  <td><?= $row['deskripsi']; ?></td>
                  <td><?= $row['stok']; ?></td>
                  <td>
                    <a href="?page=produk&aksi=foto&id=<?= $row['id_produk']; ?>" class="btn btn-primary mb-2"><i class="fa fa-image"></i></a>
                    <br>
                    <a href="?page=produk&aksi=ubah&id=<?= $row['id_produk']; ?>" class="btn btn-warning mb-2"><i class="fa fa-tags"></i></a>
                    <br>
                    <a href="?page=produk&aksi=hapus&id=<?= $row['id_produk']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus ?');"><i class="fa fa-trash-o"></i></a>
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

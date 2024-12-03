<div class ="page-content-wrapper">
  <div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="#">Landique</a></li>
                      <li class="breadcrumb-item active">Data Admin</li>
                  </ol>
              </div>
              <h4 class="page-title">Data Admin</h4>
          </div>
      </div>
  </div>

    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-body">
          <div class="table-responsive">
            <h4 class="mt-0 header-title">
              <a href="?page=admin&aksi=tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
            </h4>
            <table id="datatable" class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Jen. Kel</th>
                  <th>Alamat</th>
                  <th>No. Telp</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              // menampilkan data users              
              $result = mysqli_query($conn, "SELECT * FROM tb_admins ORDER BY adminsid DESC"); ?>
              <?php $i = 1; ?>
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <th>
                    <?php if ($row['adminsfoto'] != NULL && $row['adminsfoto'] != "") { ?>
                      <a href="fotoadmins/<?= $row['adminsfoto']; ?>" target="_blank"><img src="fotoadmins/<?= $row['adminsfoto']; ?>" style="width: 120px;"></a>
                    <?php } ?>
                  </th>
                  <td><?= $row['adminsname']; ?></td>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['jk']; ?></td>
                  <td><?= $row['alamat']; ?></td>
                  <td><?= $row['adminstelp']; ?></td>
                  <td><?= $row['level']; ?></td>
                  <td>
                    <a href="?page=admin&aksi=foto&id=<?= $row['adminsid']; ?>" class="btn btn-primary mb-2"><i class="fa fa-image"></i></a>
                    <br>
                    <a href="?page=admin&aksi=ubah&id=<?= $row['adminsid']; ?>" class="btn btn-warning mb-2"><i class="fa fa-tags"></i></a>
                    <br>
                    <a href="?page=admin&aksi=hapus&id=<?= $row['adminsid']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus ?');"><i class="fa fa-trash-o"></i></a>
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

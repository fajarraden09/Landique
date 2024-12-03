<?php 

// menangkap page dan aksi dari url
$page = $_GET['page'];
$aksi = $_GET['aksi'];

// page/halaman home / dashboard
if ($page == "") {
  include "home.php";
}

// page USERS
if ($page == "users") {
  // halaman USERS
  if ($aksi == "") {
    include "page/users/users.php";
  }
  // tambah data pelanggan
  if ($aksi == "tambah") {
    include "page/users/tambah.php";
  }
  // hapus data pelanggan
  if ($aksi == "hapus") {
    include "page/users/hapus.php";
  }
  // ubah data pelanggan
  if ($aksi == "ubah") {
    include "page/users/ubah.php";
  }
  // upload foto pelanggan
  if ($aksi == "foto") {
    include "page/users/uploadfoto.php";
  }
}


// jika levelnya admin maka dapat megakses halaman ini
// halaman ini hanya bisa diakses admin
if ($_SESSION['level'] == 'Admin') {
  // page admins
  if ($page == "admin") {
    // halaman admins
    if ($aksi == "") {
      include "page/admin/admin.php";
    }
    // tambah admins
    if ($aksi == "tambah") {
      include "page/admin/tambah.php";
    }
    // hapus admins
    if ($aksi == "hapus") {
      include "page/admin/hapus.php";
    }
    // ubah admins
    if ($aksi == "ubah") {
      include "page/admin/ubah.php";
    }
    // upload foto admins
    if ($aksi == "foto") {
      include "page/admin/uploadfoto.php";
    }
  }

  // page PRODUK
  if ($page == "produk") {
    // menampilkan halaman PRODUK
    if ($aksi == "") {
      include "page/produk/produk.php";
    }
    // tambah 
    if ($aksi == "tambah") {
      include "page/produk/tambah.php";
    }
    if ($aksi == "hapus") {
      include "page/produk/hapus.php";
    }
    if ($aksi == "ubah") {
      include "page/produk/ubah.php";
    }
    // upload foto produk
    if ($aksi == "foto") {
      include "page/produk/uploadfoto.php";
    }
  }
} // sampai sini


// page transaksi
if ($page == "transaksi") {
  // menampilkan halaman transaksi
  if ($aksi == "") {
    include "page/transaksi/transaksi.php";
  }
  // menampilkan data yg sudah lunas
  if ($aksi == "rentallunas") {
    include "page/rental/rentallunas.php";
  }
  // menampilkan data yang belum lunas
  if ($aksi == "rentalbelumlunas") {
    include "page/rental/rentalbelumlunas.php";
  }
  // tambah transaksi
  if ($aksi == "tambah") {
    include "page/rental/tambah.php";
  }
  // hapus transaksi
  if ($aksi == "hapus") {
    include "page/rental/hapus.php";
  }
  // melunasi transaksi
  if ($aksi == "lunasi") {
    include "page/rental/lunasi.php";
  }
  // menampilkan detail dari transaksi
  if ($aksi == "detail") {
    include "page/detail_transaksi.php";
  }
  // baju diambil
  if ($aksi == "diambil") {
    include "page/rental/diambil.php";
  }
}

// page DETAIL TRANSAKSI
if ($page == "detail_transaksi") {
  if ($aksi == "") {
    include "page/detail_transaksi/detail_transaksi.php";
  }
  if ($aksi == "tambah") {
    include "page/pengeluaran/tambah.php";
  }
  if ($aksi == "hapus") {
    include "page/pengeluaran/hapus.php";
  }
  if ($aksi == "ubah") {
    include "page/pengeluaran/ubah.php";
  }
  if ($aksi == "detail") {
    include "page/detail_pengeluaran.php";
  }
}

// page Proses
// if ($page == "proses") {
//   if ($aksi == "") {
//     include "page/laporan/laporan.php";
//   }
//   if ($aksi == "detail") {
//     include "page/detail_transaksi.php";
//   }
// }

// halaman profile
if ($page == "profile") {
  // menampilkan halaman profile
  if ($aksi == "") {
    include "page/profile.php";
  }
  // ubah foto profile
  if ($aksi == "ubahfoto") {
    include "page/uploadfotoprofile.php";
  }
}


?>
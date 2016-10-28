<?php
include "../auth/autho.php";

// Bagian Dashboard
if ($_GET[hp]=='home'){
  include "build/build-dashboard/tampil-dashboard.php";
}

elseif ($_GET[hp]=='pengambilan-sp'){
  include "build/build-pengambilan-sp/tambah-pengambilan-sp.php";
}

elseif ($_GET[hp]=='pengambilan-sp2'){
  include "build/build-pengambilan-sp/tambah-pengambilan-sp2.php";
}

elseif ($_GET[hp]=='penjualan-sp'){
  include "build/build-penjualan-sp/tambah-penjualan-sp.php";
}

elseif ($_GET[hp]=='penjualan-sp2'){
  include "build/build-penjualan-sp/tambah-penjualan-sp2.php";
}

elseif ($_GET[hp]=='tampil-penjualan-ro'){
  include "build/build-penjualan-sp/tampil-penjualan-ro.php";
}

elseif ($_GET[hp]=='penjualan-dompul'){
  include "build/build-penjualan-dompul/tambah-penjualan-dompul.php";
}

elseif ($_GET[hp]=='penjualan-dompul2'){
  include "build/build-penjualan-dompul/tambah-penjualan-dompul2.php";
}

elseif ($_GET[hp]=='penjualan-dompul3'){
  include "build/build-penjualan-dompul/tambah-penjualan-dompul3.php";
}

elseif ($_GET[hp]=='penjualan-dompul4'){
  include "build/build-penjualan-dompul/tambah-penjualan-dompul4.php";
}

elseif ($_GET[hp]=='penjualan-dompul5'){
  include "build/build-penjualan-dompul/tambah-penjualan-dompul5.php";
}

elseif ($_GET[hp]=='penjualan-list-dompul'){
  include "build/build-penjualan-dompul/list-penjualan-dompul1.php";
}

elseif ($_GET[hp]=='penjualan-list-dompul2'){
  include "build/build-penjualan-dompul/list-penjualan-dompul.php";
}

elseif ($_GET[hp]=='verifikasi-penjualan-dompul'){
  include "build/build-penjualan-dompul/verifikasi-penjualan-dompul.php";
}

elseif ($_GET[hp]=='edit-penjualan-dompul'){
  include "build/build-penjualan-dompul/edit-penjualan-dompul.php";
}

elseif ($_GET[hp]=='monitoring-upload'){
  include "build/build-monitoring-upload/monitoring-upload-dompul.php";
}

elseif ($_GET[hp]=='monitoring-upload2'){
  include "build/build-monitoring-upload/monitoring-upload-dompul2.php";
}

elseif ($_GET[hp]=='pengembalian-sp'){
  include "build/build-pengembalian-sp/tambah-pengembalian-sp.php";
}

elseif ($_GET[hp]=='detail-pengembalian-sp'){
  include "build/build-pengembalian-sp/detail-pengembalian-sp.php";
}

elseif ($_GET[hp]=='konfirmasi-pengambilan-sp'){
  include "build/build-pengambilan-sp/konfirmasi-pengambilan-sp.php";
}

elseif ($_GET[hp]=='konfirmasi-pengambilan-sp2'){
  include "build/build-pengambilan-sp/konfirmasi-pengambilan-sp2.php";
}

elseif ($_GET[hp]=='verifikasi-penjualan'){
  include "build/build-verifikasi-penjualan/tampil-verifikasi-penjualan.php";
}

elseif ($_GET[hp]=='verifikasi-penjualan-pimpinan'){
  include "build/build-verifikasi-penjualan-pimpinan/tampil-verifikasi-penjualan-p.php";
}

// Laporan Penjualan Dompul

elseif ($_GET[hp]=='laporan-pj-dompul'){
  include "build/build-laporan-penjualan/tampil-laporan-penjualan-dompul.php";
}

elseif ($_GET[hp]=='laporan-pj-dompul2'){
  include "build/build-laporan-penjualan/tampil-laporan-penjualan-dompul2.php";
}

elseif ($_GET[hp]=='laporan-pj-dompul3'){
  include "build/build-laporan-penjualan/tampil-laporan-penjualan-dompul3.php";
}

elseif ($_GET[hp]=='laporan-pj-dompul4'){
  include "build/build-laporan-penjualan/tampil-laporan-penjualan-dompul4.php";
}

elseif ($_GET[hp]=='laporan-pj-dompul-head'){
  include "build/build-laporan-penjualan/tampil-laporan-penjualan-dompul-head.php";
}

elseif ($_GET[hp]=='laporan-pj-dompul-head2'){
  include "build/build-laporan-penjualan/tampil-laporan-penjualan-dompul-head2.php";
}

elseif ($_GET[hp]=='laporan-hutang-dompul'){
  include "build/build-laporan-penjualan/tampil-laporan-hutang-dompul.php";
}


//PERSEDIAAN//
elseif ($_GET[hp]=='penerimaan-sp'){
  include "build/build-penerimaan-sp/tambah-penerimaan-sp.php";
}
// Bagian Tambah Register barang
elseif ($_GET[hp]=='register-barang'){
  include "build/build-register-barang/tambah-register-barang.php";
}

elseif ($_GET[hp]=='detail-register-barang'){
  include "build/build-register-barang/detail-register-barang.php";
}

// Bagian tambah register dompul
elseif ($_GET[hp]=='register-dompul'){
  include "build/build-register-dompul/tambah-register-dompul.php";
}

// Bagian transfer dompul
elseif ($_GET[hp]=='transfer-dompul'){
  include "build/build-transfer-dompul/tampil-transferdompul.php";
}

// Bagian acc dompul
elseif ($_GET[hp]=='acc-dompul'){
  include "build/build-transfer-dompul/acc-transferdompul.php";
}

// Bagian transfer sub dompul
elseif ($_GET[hp]=='transfer-subdompul'){
  include "build/build-transfer-subdompul/tampil-transfersubdompul.php";
}

// Bagian acc sub dompul
elseif ($_GET[hp]=='acc-subdompul'){
  include "build/build-transfer-subdompul/acc-transfersubdompul.php";
}

// Bagian Monitoring HO
elseif ($_GET[hp]=='monitoring-ho'){
  include "build/build-monitoring-ho/tampil-sp-ho.php";
}

// Bagian Monitoring HO2
elseif ($_GET[hp]=='monitoring-ho2'){
  include "build/build-monitoring-ho/tampil-sp-ho2.php";
}

// Bagian Monitoring HO3
elseif ($_GET[hp]=='monitoring-ho3'){
  include "build/build-monitoring-ho/tampil-sp-ho3.php";
}

elseif ($_GET[hp]=='monitoring-sp-canvaser'){
  include "build/build-monitoring-canvaser/tampil-monitoring-canvaser.php";
}

elseif ($_GET[hp]=='monitoring-sp-canvaser2'){
  include "build/build-monitoring-canvaser/tampil-monitoring-canvaser2.php";
}

elseif ($_GET[hp]=='monitoring-sp-canvaser3'){
  include "build/build-monitoring-canvaser/tampil-monitoring-canvaser3.php";
}

elseif ($_GET[hp]=='mutasi-dompul'){
  include "build/build-mutasi-dompul/tampil-mutasi-dompul.php";
}

elseif ($_GET[hp]=='mutasi-dompul2'){
  include "build/build-mutasi-dompul/tampil-mutasi-dompul2.php";
}

// Bagian Tambah Assigned barang
elseif ($_GET[hp]=='assign-barang'){
  include "build/build-assign-barang/tambah-assign-barang.php";
}

//MASTER//
// Master User
elseif ($_GET[hp]=='master-user'){
  include "build/build-master-user/tampil-user.php";
}

// Master Harga Dompul
elseif ($_GET[hp]=='master-hargadompul'){
  include "build/build-master-hargadompul/tampil-hargadompul.php";
}

// Master HO
elseif ($_GET[hp]=='master-ho'){
  include "build/build-master-ho/tampil-ho.php";
}

// Bagian Tambah Master HO
elseif ($_GET[hp]=='tambah-ho'){
  include "build/build-master-ho/tambah-ho.php";
}

// Master BO
elseif ($_GET[hp]=='master-bo'){
  include "build/build-master-bo/tampil-bo.php";
}

// Bagian Tambah Master BO
elseif ($_GET[hp]=='tambah-bo'){
  include "build/build-master-bo/tambah-bo.php";
}

// Master Canvaser
elseif ($_GET[hp]=='master-canvaser'){
  include "build/build-master-canvaser/tampil-canvaser.php";
}

// Bagian Tambah Master Canvaser
elseif ($_GET[hp]=='tambah-canvaser'){
  include "build/build-master-canvaser/tambah-canvaser.php";
}

// Master Counter Pulsa
elseif ($_GET[hp]=='master-counter'){
  include "build/build-master-counter/tampil-counter.php";
}

// Bagian Tambah Counter Pulsa
elseif ($_GET[hp]=='tambah-counter'){
  include "build/build-master-counter/tambah-counter.php";
}

// Master Barang
elseif ($_GET[hp]=='master-barang'){
  include "build/build-master-barang/tampil-barang.php";
}

// Bagian Tambah Master barang
elseif ($_GET[hp]=='tambah-barang'){
  include "build/build-master-barang/tambah-barang.php";
}

// Master Dompul
elseif ($_GET[hp]=='master-dompul'){
  include "build/build-master-dompul/tampil-dompul.php";
}

// Master HP Dompul
elseif ($_GET[hp]=='master-hpdompul'){
  include "build/build-master-hpdompul/tampil-hpdompul.php";
}

// Master HP Sub Dompul
elseif ($_GET[hp]=='master-hpsubdompul'){
  include "build/build-master-hpsubdompul/tampil-hpsubdompul.php";
}

// Bagian Tambah Master Dompul
elseif ($_GET[hp]=='tambah-dompul'){
  include "build/build-master-dompul/tambah-dompul.php";
}

// Bagian Upload Data SP
elseif ($_GET[hp]=='upload-sp'){
  include "build/build-upload-sp/upload-sp.php";
}

// Bagian Upload Data Dompul
elseif ($_GET[hp]=='upload-dompul'){
  include "build/build-upload-dompul/upload-dompul.php";
}

elseif ($_GET[hp]=='upload-rekening'){
  include "build/build-rekening-koran/upload-rekening.php";
}

elseif ($_GET[hp]=='list-rekening'){
  include "build/build-rekening-koran/list-rekening.php";
}

elseif ($_GET[hp]=='list-rekening1'){
  include "build/build-rekening-koran/list-rekening1.php";
}

elseif ($_GET[hp]=='list-rekening'){
  include "build/build-rekening-koran/list-rekening3.php";
}

// Apabila modul tidak ditemukan
else{
  include "build/build-notification/tampil-notification.php";
}
?>
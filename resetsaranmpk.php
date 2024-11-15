<?php
include 'db.php';
$id = $_GET["id"];
//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM `saran_mpk`";
$hasil_query = mysqli_query($host, $query);
//periksa query, apakah ada kesalahan
if (!$hasil_query) {
  die("Gagal menghapus data: " . mysqli_errno($host) .
    " - " . mysqli_error($host));
} else {
  echo "<script>alert('Data berhasil di reset.');window.location='admin.php';</script>";
}
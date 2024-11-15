<?php
include 'db.php';

$query = "UPDATE `murid` SET `status_pilih`='belum';";
$hasil_query = mysqli_query($host, $query);

if (!$hasil_query) {
  die("Gagal: " . mysqli_errno($host) .
    " - " . mysqli_error($host));
} else {
  $del_osis = "DELETE FROM `data_osis`";
  $res_del_osis = mysqli_query($host, $del_osis);
  if (!$res_del_osis) {
    die("Gagal: " . mysqli_errno($host) .
    " - " . mysqli_error($host));
  }else{
    $del_mpk = "DELETE FROM `data_mpk`";
    $res_del_mpk = mysqli_query($host, $del_mpk);
    if (!$res_del_mpk) {
      die("". mysqli_errno($host) . 
      "-". mysqli_error($host));
    }else{
      echo "<script>alert('Status Pilih berhasil di Reset.');window.location='admin.php';</script>";
    }
}
}
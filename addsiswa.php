<?php
session_start();
include("db.php");

if(isset($_POST['submit'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    
    $kelas = strtoupper($_POST['kelas']);
    $code = str_replace(' ', '', $kelas);
    $absen = $_POST['absen'];
    $kode_masuk = "SDA-$code-$absen";

    if(empty($nis) || empty($nama) || empty($kelas) || empty($absen)){
        echo "<script>alert('data kurang, isi kembali');</script>";
    }else{
        $sql = "INSERT INTO `murid`(`nis`, `nama`, `kelas`, `kode_masuk`, `status_pilih`) VALUES ('$nis','$nama','$kelas','$kode_masuk','belum')";
        $query_insert = mysqli_query($host, $sql);
        if($query_insert){
            echo "<script>alert('data berhasil ditambahkan'); window.location.href = 'admin.php';</script>";
        }else{
            echo "<script>alert('ERROR');</script>";
        }
            
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" >
        <div>
            <label for="">NIS</label>
            <input type="text" name="nis" id="">
        </div>
        <div>
            <label for="">Nama</label>
            <input type="text" name="nama" id="">
        </div>
        <div>
            <label for="">Kelas</label>
            <input type="text" name="kelas" id="">
        </div>
        <div>
            <label for="">Absen</label>
            <input type="number" name="absen" id="">
        </div>
        <button type="submit" name="submit" >Submit</button>
    </form>
</body>
</html>
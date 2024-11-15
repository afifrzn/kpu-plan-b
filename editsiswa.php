<?php
session_start();
include("db.php");
if(isset($_GET['nis'])){
    $nis_siswa = $_GET['nis'];
    $sql = "SELECT * FROM `murid` WHERE nis = '$nis_siswa'";  
    $result = mysqli_query($host, $sql);  
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
}

if(isset($_POST['submit'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    
    $kelas = strtoupper($_POST['kelas']);
    $kode_masuk = $_POST['kodemasuk'];
    $status_pilih = $_POST['status_pilih'];
    $status = $_POST['status'];

    if(empty($nis) || empty($nama) || empty($kelas) || empty($kode_masuk) || empty($status_pilih)){
        echo "<script>alert('data kurang, isi kembali');</script>";
    }else{
        $sql = "UPDATE `murid` SET `nis`='$nis',`nama`='$nama',`kelas`='$kelas',`kode_masuk`='$kode_masuk',`status_pilih`='$status_pilih',`status`='$status' WHERE nis = '$nis'";
        $query_insert = mysqli_query($host, $sql);
        if($query_insert){
            echo "<script>alert('data berhasil diubah'); window.location.href = 'admin.php';</script>";
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
    <style>
        div{
            width: 500px;
            display: flex;
            justify-content: space-between;
        }

        label{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
        }

        input{
            width: 380px;
            box-sizing: border-box;
            height: 32px;
            padding: 4px;
        }
    </style>
</head>
<body>
    <form action="" method="post" >
        <div>
            <label for="">NIS: </label>
            <input type="text" name="nis" id="" value="<?php echo $row['nis'] ?>" >
        </div>
        <div>
            <label for="">Nama: </label>
            <input type="text" name="nama" id="" value="<?php echo $row['nama'] ?>" >
        </div>
        <div>
            <label for="">Kelas: </label>
            <input type="text" name="kelas" id="" value="<?php echo $row['kelas'] ?>">
        </div>
        <div>
            <label for="">Kode Masuk: </label>
            <input type="text" name="kodemasuk" id="" value="<?php echo $row['kode_masuk'] ?>">
        </div>
        <div>
            <label for="">Status Pilih: </label>
            <input type="text" name="status_pilih" id="" value="<?php echo $row['status_pilih'] ?>">
        </div>
        <div>
            <label for="">Status Pilih: </label>
            <input type="text" name="status" id="" value="<?php echo $row['status'] ?>">
        </div>
        <button type="submit" name="submit" >Submit</button>
    </form>
</body>
</html>
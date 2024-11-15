<?php
session_start();
include("../db.php");

$nis = $_SESSION["nis"]; 

if(isset($_POST["finish"])){
    $update = "UPDATE `murid` SET `status_pilih`='sudah' WHERE nis = '$nis'";
    $query_update = mysqli_query($host, $update);
    if($query_update){
        session_destroy();
        echo "<script>window.location.href = '../'</script>";
    }else{
        echo "Gagal Euy";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Cara | 1</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="logout.css">

    <!-- Link Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <div class="logo">
            <div class="logo-wrapper">
                <img src="./asset/Logo.svg" alt="">
                <h1>#PemilihCerdasSkomda<span>Emas</span></h1>
            </div>
        </div>
    </header>
    <main>
        <form action="" method="post" style="display: flex; flex-direction: column; align-items: center;" >
        <div class="title">
            <h2>Terima Kasih Atas Partisipasimu Dalam <span>Pemilu</span> Kali Ini !</h2>
        </div>
        <div class="text-area">
            <p> Silahkan Klik Tombol <span>keluar</span> untuk keluar dari halaman ini.</p>
        </div>
        <button type="submit" name="finish">Keluar</button>
        </form>
    </main>

    <footer>
        <div class="pattern">
            <img src="asset/bottom-l.svg">
            <img src="asset/bottom-t.svg">
        </div>
    </footer>
</body>
</html>
<?php
session_start();
include("db.php");
$_SESSION["nama"] = "";
$_SESSION["kelas"] = "";
$_SESSION["nis"] = "";
$nis_error_massage = "";
$nama = "";
$kelas = "";
if(isset($_POST['submit'])){
    $nis = $_POST['nis'];
    $kode = $_POST['kode'];

    $check = "SELECT * FROM `murid` WHERE nis = '$nis'";
    $res = mysqli_query($host, $check);  
    $row_check = mysqli_fetch_array($res);
    $count_check = mysqli_num_rows($res);

    if($count_check != 0){
        if($row_check["status_pilih"] == "sudah"){
            echo "<script>alert('NIS ANDA SUDAH MEMILIH');</script>";
        }else{
            $sql = "SELECT * FROM `murid` WHERE nis = '$nis' AND kode_masuk= '$kode'";  
        
            $result = mysqli_query($host, $sql);  
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($count == 1){
                $nama = $row['nama'];
                $kelas = $row['kelas'];
                $status = $row['status'];
                $nis_error_massage = "NIS DITEMUKAN";
                $_SESSION["nama"] = $nama;
                $_SESSION["kelas"] = $kelas;
                $_SESSION["nis"] = $nis;
                $_SESSION["status"] = $status;
                if(isset($_SESSION["nama"]) && isset($_SESSION["kelas"]) && isset($_SESSION["nis"])) {
                    if($row["status"] == "kpu"){
                        echo "<script>alert('NIS INI MERUPAKAN MEMBER KPU');</script>";
                    }else{
                        echo "<script>window.location.href = './votetutor/'</script>";
                    }
                }
            
            }
        }
    } else{
        echo "<script>alert('USERNAME TIDAK DITEMUKAN ATAU KODE SALAH COBA LAGI');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
    <link href="./aos-master/dist/aos.css" rel="stylesheet">
</head>
<body>
    <div class="login">
        <div class="login-wrapper-left">
            <div class="form-wrapper">
                <div class="logo" data-aos="fade-right">
                    <img src="./image/logo.png" alt="">
                </div>
                <div class="form-text">
                    <h1 data-aos="fade-down">Selamat Datang di <br>
                    <span class="bold-text">Pemilu Skomda</span> 2023</h1>
                </div>

                <form class="form-input" method="post">
                    <div class="nisn" data-aos="fade-right" data-aos-duration="500">
                        <input type="text" name="nis" id="nisn" placeholder="Username" autocomplete="off"  >
                    </div>
                    <div class="password" data-aos="fade-right" data-aos-duration="750">
                        <input type="text" name="kode" id="password" placeholder="Kode Masuk" autocomplete="off" >
                    </div>
                    <button type="submit" name="submit" data-aos="fade-right" data-aos-duration="1000">Mulai</button>
                </form>
            </div>
            <img src="./image/dots1.png" alt="" class="dots1">
            <img src="./image/dots2.png" alt="" class="dots2">
        </div>

        <div class="login-wrapper-right">
            <h2>#PemilihCerdasSkomda<span>Emas</span></h2>
            <div class="image-slide-container">
                <div class="image-slide" id="slide" >
                    <img src="./image/detel.png" alt="" id="one" >
                    <img src="./image/detel2.png" alt="" id="two" >
                </div>
            </div>
        </div>
    </div>
    <script src="./aos-master/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
        
    <script>
        var slideIndex = 2;

        var slide = document.getElementById("slide");
        slide.className = "s".concat(slideIndex);
        var delay;

        autoSlide();

        function autoSlide(){
            //console.log("play");
            if (slideIndex < 2) {
                    slideIndex ++;
                    console.log("index", slideIndex, 'class', ".s"+slideIndex );
                    slide.className = "s".concat(slideIndex);
                }else{
                    slideIndex = 1;
                    console.log("index", slideIndex, 'class', ".s"+slideIndex );
                    slide.className = "s".concat(slideIndex);
                }

            delay = setTimeout(autoSlide, 4000);
        }
    </script>
</body>
</html>
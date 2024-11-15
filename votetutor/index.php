<?php
session_start();

$status = $_SESSION["status"];

if(isset($_POST["vote"])){
    if($status == "murid" || $status == "mpk" || $status == "guru" || $status == "murid_xii" ){
        echo "<script>window.location.href = '../voting-osis/'</script>";
    }else if($status == "osis"){
        echo "<script>window.location.href = '../voting-mpk/'</script>";
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
    <link rel="stylesheet" href="votetutor.css">

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
        <!-- Logo Header -->

        <!-- Text Area -->
        <form action="" method="post">
        <div class="text-area-wrapper">
            
            <div class="title">
                <h2>Tata Cara Pemungutan <span>Suara</span></h2>
            </div>
            <div class="text-area">
                <ol type="1">
                    <li>Pilih <span>Calon Ketua dan Wakil Ketua OSIS</span> pilihan kalian.</li>
                    <li>Jika sudah menentukan pilihan kalian, klik tombol <span>Vote</span>.</li>
                    <li>Lalu konfirmasi pilihanmu dengan klik “ <span>Yakin</span> ” atau “ <span>Belum</span> ” jika masih belum yakin.</li>
                    <li>Jika sudah kalian akan diarahkan ke halaman Voting MPK, Lalu pilih <span>Calon MPK</span> untuk kelas kalian. Lakukan <span> Cara Voting </span>sama seperti sebelumnya.</li>
                    <li>Untuk <span>Voting MPK</span>, jika kelasmu hanya memiliki <span>1 Calon MPK</span> maka kamu bisa memilih calon tersebut atau memilih untuk <span>Delegasi</span>, namun jika kelasmu tidak
 memiliki <span>Calon MPK</span> kamu dapat mengisi kotak saran <span> Siswa Calon MPK </span> untuk
 kelasmu</li>
                    <li>Setelah selesai <span>Voting MPK</span> klik tombol <span>Keluar</span> untuk keluar dari halaman Voting.</li>
                </ol>
            </div>
            <button href="#" type="submit" name="vote" value="vote">Lanjut</button>
            
        </div>
        </form>
    </main>

    <footer>
        <div class="pattern">
            <img src="./asset/bottom-l.svg">
            <img src="asset/bottom-t.svg">
        </div>
    </footer>
</body>
</html>
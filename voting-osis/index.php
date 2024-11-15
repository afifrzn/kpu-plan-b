<?php
session_start();
include("../db.php");

$status = $_SESSION["status"];

$select = "SELECT * FROM `osis`";
$result = mysqli_query($host, $select);
$nis = $_SESSION["nis"]; 

if(isset($_POST['pilih'])){
    $pilih = $_POST['pilih'];
    if(!empty(trim($pilih))){
    }
    
    $insert = "INSERT INTO `data_osis`(`id_osis`, `nisn_pemilih`) VALUES ('$pilih','$nis')";
    $query_insert = mysqli_query($host, $insert);
    if($query_insert){
        if($status == "mpk" || $status == "guru" || $status == "murid_xii" ){
            echo "<script>window.location.href = '../logout/'</script>";
        }else if($status == "murid"){
            echo "<script>window.location.href = '../voting-mpk/'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Voting Osis</title>
    <link rel="stylesheet" href="voting-osis.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background: url(./img.osis/BG.png);
            -ms-overflow-style: none;
            scrollbar-width: none;
            background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat;
        }

        /* hide-scrollbar-chrome&safari */
        body::-webkit-scrollbar {
            display: none;
        }

        .logo {
            box-sizing: border-box;
            padding: 0;
            padding-top : 71px;
            padding-left: 102px;
            padding-right: 87px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            transition: ;
            transition: all 0.3s ease, backdrop-filter 1ms;
        }

        .logo-scrolled {
            padding: 0;
            padding-top : 32px;
            padding-left: 102px;
            padding-right: 87px;
            padding-bottom: 32px;
            background: rgba(255, 255, 255, 0.27);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.8px);
            -webkit-backdrop-filter: blur(10.8px);
        }

        .logo img {
            width: 242px;
            transition: 0.3s;
        }

        .logo-scrolled img{
            width: 9vw;
        }

        .logo-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-wrapper h1 {
            transition: 0.3s;
            font-size: 1.5vw;
            text-align: center;
            font-family: 'Lexend', sans-serif;
        }

        .logo-wrapper h1 span{
            color: #FFD700;
        }

        .logo-scrolled .logo-wrapper h1{
            font-size: 1.2vw;
        }

        .voting-page {
            margin-top: 210px;
        }

        .title h1 {
            font-family: 'Poppins';
            margin-left: 8vw;
            font-size: 42px;
            font-weight: 600;
            margin-block: 3vw;
        }

        .title h1 span{
            text-align: center;
            font-size: 2vw;
            color: #AF1E21;
        }

        /* Vote Card */
        .vote-card-wrapper {
            display: flex;
            gap: 2vw;
            justify-content: center;
        }

        .vote-card {
            width: 28vw;
            height: 36vw;
            background-color: #FFF;
            box-shadow: 0.1vw 0.1vw 2.5vw 0vw rgba(0, 0, 0, 0.25);
            border-radius: 1vw;
            margin-bottom: 2vw;
        }

        .divider {
            border: solid;
            border-width: thin;
            border-color: #ccc;
            border-radius: 80vw;
            height: 3.5vw;
        }

        .image-paslon img{
            border-radius: 20px;
            width: 28vw;
            height: auto;
        }

        .text-paslon {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .controller {
            display: flex;
            justify-content: center;
            margin-block: 3vw;
            align-items: center;
            gap: 1.5vw;
        }

        .controller h1 {
            font-size: 4vw;
            font-weight: bolder;
            font-family: 'Lexend';
            color: #FFD700;
        }

        .text-paslon input {
            margin-inline: 10vw;
            margin-bottom: 3.7vw;
            padding-block: 0.75vw;
            background-color: #CC0606;
            border: none;
            color: white;
            border-radius: 0.5vw;
            cursor: pointer;
            font-size: 1vw;
        
        }

        .text-paslon input:hover{
            filter: drop-shadow(0vw 0.1vw 0.7vw #CC0606);
            transition: ease 0.25s;
        }

        .nama-paslon {
            display: flex;
            flex-direction: column;
            gap: 0.1vw;
        }

        .nama-paslon p {
            font-size: 1.2vw;
            font-family: 'Inter';
            font-weight: 600;
        }

        footer {
            justify-content: space-between;
            display: flex;
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
            margin: 0vw 1vw 1vw 1vw;
        }

        footer img {
            width: 14vw;
        }

        /* popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
            transition: fadeIn 0.5s;
        }

        .popup.fadeOut {
            transition: fadeOut 0.5s;
        }

        .popup-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        
        }

        .popup-content img {
            max-width: 100%;
            height: auto;
        }

        .vote-card-ltr {
            display: flex;
            padding: 1vw;
            width: 65vw;
            height: 22vw;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.90);
            border-radius: 1vw;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(0.2vw);
            -webkit-backdrop-filter: blur(25px);
            animation: popIn 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .vote-card-ltr.popOut {
            animation: popOut 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .vote-ctrl button {
            box-sizing: border-box;
            width: 190px;
            height: 76px;
            padding: 0.8vw 2.6vw;
            border: solid;
            border-radius: 0.5vw;

            font-size: 25px;
            font-weight: 700;
            font-family: 'Helvetica', sans-serif;   
        }

        .vote-ctrl {
            margin-left: 9vw;
        }

        #confirmYes {
            color: white;
            background-color: #CC0606;
            padding-inline: 3vw;
            cursor: pointer;
            border-color: #CC0606;
            border-width: 0.2vw;
        }
        #confirmYes:hover {
            filter: drop-shadow(0vw 0.1vw 0.7vw #CC0606);
            transition: ease 0.25s;
        }

        .closePopup {
            background-color: transparent;
            border: solid;
            border-color: #CC0606;
            border-width: 0.2vw;
            color: #CC0606;
            font-weight: 500;
        }

        .closePopup:hover {
            border: solid;
            border-color: #CC0606;
            cursor: pointer;
            background-color: #CC0606;
            color: white;
            transition: ease 0.25s;
        }


        .imagepop {
            border-radius: 20px;
            overflow: hidden;
            width: 22vw;
            display: flex;
            height: 22vw;
            order: 2;
        }


        .imagepop img {
            margin-left: -140px;
            object-fit: cover;
        }

        .vote-btn {
            display: flex;
            gap: 1vw;
            justify-content: center;
        }

        .vote-ctrl {
            display: flex;
            flex-direction: column;
            gap: 2vw;
        }

        .yakin h2{
            font-size: 38px;
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        @keyframes popIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes popOut {
            from {
                transform: scale(1);
                opacity: 1;
            }
            to {
                transform: scale(0.8);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="voting-wrapper">
        <div class="logo">
            <div class="logo-wrapper">
                <img src="img.osis/Logo.svg" alt="">
                <h1>#PemilihCerdasSkomda<span>Emas</span></h1>
            </div>
        </div>
        <div class="voting-page">
            <div class="title">
                <h1>Voting <span>Calon Ketua dan Wakil Ketua OSIS Skomda</span> Pilihanmu !</h1>
            </div>
            <div class="vote-card-wrapper">
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <div class="vote-card">
                    <div class="image-paslon">
                        <img src="../image/<?php echo $row['gambar_paslon']; ?>" alt="">
                    </div>
                    <div class="text-paslon">
                        <div class="controller">
                            <h1>#<?php echo $row['nomor_urut'] ?></h1>
                            <div class="divider"></div>
                            <div class="nama-paslon">
                                <p><?php echo $row['nama_ketos'] ?></p>
                                <p><?php echo $row['nama_waketos'] ?></p>
                            </div>
                        </div>
                        <input type="button" id="btn<?php echo $row['id_osis'] ?>" value="Vote">
                    </div>
                </div>

                <div class="popup" id="popup<?php echo $row['id_osis'] ?>">
                    <form action="" method="post">
                    <div class="vote-card-ltr" id="popupitems">
                        <div class="imagepop">
                            <img src="../image/<?php echo $row['gambar_paslon']; ?>" alt="<?php echo $row['id_osis'] ?>">
                        </div>
                        <div class="vote-ctrl-wrapper-ltr">
                            <div class="vote-ctrl">
                                <div class="name">
                                    <div class="yakin">
                                        <h2>Yakin Dengan Pilihanmu ?</h2>
                                    </div>
                                </div>
                                <div class="vote-btn">
                                    <button id="confirmYes" href="#" type="submit" name="pilih" value="<?php echo $row['id_osis'] ?>">Yakin</button>
                                    <button id="closePopup<?php echo $row['id_osis'] ?>" class="closePopup" href="#" type="button" value="vote">Belum</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                
                <?php } ?>
            </div>
            </div>
        </div>

        <footer id="footer">
                <img src="img.osis/bottom-l.svg" alt="">
                <img src="img.osis/bottom-t.svg" alt="">
        </footer>

        <script>
            const navEl = document.querySelector(".logo");
            window.addEventListener("scroll", () => {
                if (window.scrollY >= 56) {
                    navEl.classList.add("logo-scrolled");
                } else if (window.scrollY < 56) {
                    navEl.classList.remove("logo-scrolled");
                }
            });
            
            function checkFullVisibility() {
                const body = document.body;
                const html = document.documentElement;
            
                const fullHeight = Math.max( body.scrollHeight, body.offsetHeight, 
                html.clientHeight, html.scrollHeight, html.offsetHeight );
            
                const viewportHeight = window.innerHeight;
            
                return fullHeight <= viewportHeight;
            }
            
            function setFooterPosition() {
                const footer = document.getElementById('footer');
            
                if (checkFullVisibility()) {
                    footer.style.position = 'fixed';
                    footer.style.bottom = '0';
                    footer.style.left = '0';
                    footer.style.right = '0';
                } else {
                    footer.style.position = 'static';
                }
            }
            
            window.addEventListener('load', setFooterPosition);
            window.addEventListener('resize', setFooterPosition);
            
            document.getElementById('btn1').addEventListener('click', function() {
                document.getElementById('popup1').style.display = 'flex';
                document.getElementById('popup1').classList.remove('popOut');
            });
            
            document.getElementById('closePopup1').addEventListener('click', function() {
                document.getElementById('popup1').classList.add('popOut');
                setTimeout(function() {
                    document.getElementById('popup1').style.display = 'none';
                }, 500);
            });
            
            document.getElementById('btn2').addEventListener('click', function() {
                document.getElementById('popup2').style.display = 'flex';
                document.getElementById('popup2').classList.remove('popOut');
            });
            
            document.getElementById('closePopup2').addEventListener('click', function() {
                document.getElementById('popup2').classList.add('popOut');
                setTimeout(function() {
                    document.getElementById('popup2').style.display = 'none';
                }, 500);
            });

        </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
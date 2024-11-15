<?php
session_start();
include_once("../db.php");

$nis = $_SESSION["nis"]; 
$kelas = $_SESSION["kelas"];
$select = "SELECT * FROM `mpk` WHERE perwakilan_kelas = '$kelas'";
$result = mysqli_query($host, $select);
$count_mpk = mysqli_num_rows($result);

$select_murid = "SELECT * FROM `murid` WHERE kelas = '$kelas'";
$result_murid = mysqli_query($host, $select_murid);
$count_murid = mysqli_num_rows($result_murid);

if(isset($_POST['pilih'])){
    $pilih = $_POST['pilih'];
    
    $insert = "INSERT INTO `data_mpk`(`id_mpk`, `nisn_pemilih`, `kelas`) VALUES ('$pilih','$nis','$kelas')";
    $query_insert = mysqli_query($host, $insert);
    if($query_insert){
        echo "<script>window.location.href = '../logout/'</script>";
    }
}

if(isset($_POST['saran'])){
    $opsi = $_POST['opsi'];
    
    $insert = "INSERT INTO `saran_mpk`( `saran_mpk`, `perwakilan_kelas`, `nis_pemilih`) VALUES ('$opsi','$kelas','$nis')";
    $query_insert = mysqli_query($host, $insert);
    if($query_insert){
        echo "<script>window.location.href = '../logout/'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Osis</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Helvetica:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}

body {
    -ms-overflow-style: none;
    scrollbar-width: none;
    background-image: url(./img.mpk/BG.png);
    background-size: cover;
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
    margin-left: 8vw;
    font-size: 2vw;
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
    gap: 3vw;
    justify-content: center;
}

.vote-card {
    width: 22vw;
    height: auto;
    background-color: #fff;
    box-shadow: 0.1vw 0.1vw 2.5vw 0vw rgba(0, 0, 0, 0.25);
    border-radius: 1vw;
    margin-bottom: 2vw;
}



.image-paslon img{
    border-radius: 20px;
    width: 22vw;
    height: auto;
}

.text-paslon {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.controller {
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-block: 0.8vw;
    align-items: center;
    text-align: center;
    gap: 0.3vw;
}

.controller h1 {
    font-size: 3vw;
    font-weight: bold;
    font-family: 'Lexend';
    color: #FFD700;
}

.text-paslon input {
    margin-inline: 7.5vw;
    margin-top: 1.2vw;
    margin-bottom: 2.8vw;
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
    text-align:center;
}

.nama-paslon p {
    font-size: 1.2vw;
    font-family: 'Inter';
    font-weight: 500;
}

#jabatan{
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
            background-color: #FFF;
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
     margin-left: -100px;
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
    font-size: 35px;
    font-weight: 600;
}

.text-area-wrapper {
    
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 3.4vw;
}

.title h2 {
    font-size: 1.8vw;
}

.text-area-wrapper span {
    color: #CC0606;
}

.text-area {
    margin-top: 4vw;
    display: flex;
    flex-direction: column;
    width: 68vw;
    padding: 1vw;
    font-size: 1vw;
    font-weight: bold;
    line-height: normal;
    word-wrap: break-word;
    word-break: break-word;
    align-items: center;
    font-size: 1.4vw;
}

.text-area ul {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.text-area span {
    color: #CC0606;
}

.text-area-wrapper button {
    padding-inline: 2.5vw;
    padding-block: 0.9vw;
    font-size: 1vw;
    background-color: #CC0606;
    color: white;
    border: none;
    border-radius: 0.4vw;
}

.text-area-wrapper button:hover {
    filter: drop-shadow(0px 1px 7px #CC0606);
    cursor: pointer;
    transition: 0.1s ease-in;
}

#saran{
    color: rgba(89, 90, 92, 0.70);
font-family: 'Inter';
font-size: 30px;
font-style: normal;
font-weight: 500;
line-height: normal;
    box-sizing: border-box;
    padding-left: 36px;
    width: 998px;
    height: 88px;
    border: 0;
    border-radius: 5px;
    background: #E8F0FE;
    box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.25) inset;
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
                <img src="img.mpk/Logo.svg" alt="">
                <h1>#PemilihCerdasSkomda<span>Emas</span></h1>
            </div>
        </div>
        <div class="voting-page">
            <?php if ($count_mpk != 0 ) { ?>
                <div class="title">
                    <h1>Voting <span>Calon MPK</span> Pilihanmu !</h1>
                </div>
                <div class="vote-card-wrapper">
                    
                <?php while ($row = mysqli_fetch_array($result)) {?>
                    <div class="vote-card">
                        <?php if($row["nama_mpk"] != "Kotak Kosong"){ ?>
                        <div class="image-paslon">
                            <img src="../image/<?php echo $row['gambar_paslon']; ?>" alt="">
                        </div>
                        <div class="text-paslon">
                            <div class="controller">
                                <h1>#<?php echo $row['nomor_urut'] ?></h1>
                                <div class="divider"></div>
                                <div class="nama-paslon">
                                    <p><?php echo $row['nama_mpk'] ?></p>
                                    <p id="jabatan" >Calon MPK <?php echo $row['perwakilan_kelas'] ?></p>
                                </div>
                            </div>
                            <input type="button" id="button<?php echo $row['nomor_urut'] ?>" value="Vote">
                        </div>
                        <?php }else{ ?>
                            <div class="image-paslon" style="cursor: pointer; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; " id="button<?php echo $row['nomor_urut'] ?>" >
                                <img style="width: 208px;" src="../image/<?php echo $row['gambar_paslon']; ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="popup" id="popup<?php echo $row['nomor_urut'] ?>">
                        <form action="" method="post">
                        <div class="vote-card-ltr" id="popupitems" style="display:flex; <?php if($row["nama_mpk"] == "Kotak Kosong"){ echo "justify-content: center;";}else{ echo "justify-content: space-between;";} ?>" >
                        
                            <div class="imagepop"<?php if($row["nama_mpk"] == "Kotak Kosong"){ echo "style='display:none;'";} ?> >
                                <img src="../image/<?php echo $row['gambar_paslon'];?>" alt="">
                            </div>
                        
                            <div class="vote-ctrl-wrapper-ltr" style=" margin-left: -60px; margin-right: 80px" >
                                <div class="vote-ctrl">
                                    <div class="name">
                                        <div class="yakin">
                                            <h2>Yakin Dengan Pilihanmu ?</h2>
                                        </div>
                                    </div>
                                    <div class="vote-btn">
                                        <button id="confirmYes" href="#" name="pilih" type="submit" value="<?php echo $row['id_mpk'] ?>">Yakin</button>
                                        <button id="closePopup<?php echo $row['nomor_urut'] ?>" class="closePopup" href="#" type="button" value="vote">Belum</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <?php } ?>
                </div> 
           <?php }else{ ?>
            <form action="" method="post">
                <div class="text-area-wrapper" style="margin-top: 64px;" >

                    <div class="text-area">
                        <ul type="none">
                            <li><h4 style="font-size: 36px; font-weight: 500;" >Waduh Kelasmu <span>Belum Punya MPK</span> nih...</h4></li>
                            <li><h3 style="font-size: 42px; font-weight: 600;" >Pilih Siswa yang Kamu Rekomendasikan untuk</h3> </li>
                            <li><h3 style="font-size: 42px; font-weight: 600;">Menjadi <span>Calon MPK</span> untuk Kelasmu !</h3></li>
                        </ul>
                        <select name="opsi" id="saran" style="margin-top: 64px;"  >
                            <option value="" selected >Pilih Siswa</option>
                            <?php while($row_murid = mysqli_fetch_array($result_murid)) {
                                if(($row_murid['status'] == 'murid') && ($row_murid['nama'] != "Nailah Anastasya ")){
                                ?>
                            <option value="<?php echo $row_murid['nama']; ?>" ><?php echo $row_murid['nama']; ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <button href="#" type="submit" name="saran" value="vote">Lanjut</button>
                </div>
            </form>
            <?php } ?>

            </div>
        </div>
        
        <footer id="footer">
                <img src="img.mpk/bottom-l.svg" alt="">
                <img src="img.mpk/bottom-t.svg" alt="">
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


            document.getElementById('button1').addEventListener('click', function() {
                    document.getElementById('popup1').style.display = 'flex';
                    document.getElementById('popup1').classList.remove('popOut');
                });
            
            
            document.getElementById('closePopup1').addEventListener('click', function() {
                document.getElementById('popup1').classList.add('popOut');
                setTimeout(function() {
                    document.getElementById('popup1').style.display = 'none';
                }, 500);
            });

            document.getElementById('button2').addEventListener('click', function() {
                    document.getElementById('popup2').style.display = 'flex';
                    document.getElementById('popup2').classList.remove('popOut');
                });
            
            
            document.getElementById('closePopup2').addEventListener('click', function() {
                document.getElementById('popup2').classList.add('popOut');
                setTimeout(function() {
                    document.getElementById('popup2').style.display = 'none';
                }, 500);
            });

            document.getElementById('button3').addEventListener('click', function() {
                    document.getElementById('popup3').style.display = 'flex';
                    document.getElementById('popup3').classList.remove('popOut');
                });
            
            
            document.getElementById('closePopup3').addEventListener('click', function() {
                document.getElementById('popup3').classList.add('popOut');
                setTimeout(function() {
                    document.getElementById('popup3').style.display = 'none';
                }, 500);
            });

        </script>

<script src="voting-mpk.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
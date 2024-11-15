<?php
session_start();
include("db.php");

$select = "SELECT * FROM `osis`";
$result = mysqli_query($host, $select);
$nis = $_SESSION["nis"]; 


if(isset($_POST['pilih'])){
    $pilih = $_POST['pilih'];
    if(!empty(trim($pilih))){
    }
    
    $insert = "INSERT INTO `data_osis`(`id_data_osis`, `id_osis`, `nisn_pemilih`) VALUES ('','$pilih','$nis')";
    $query_insert = mysqli_query($host, $insert);
    if($query_insert){
        
        header('Location: mpk.php');
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
    <h1>Halo, <?php echo $_SESSION['nama'] ?></h1>
    <h3>Pilih ketos waketos anda</h3>
    <form action="" method="post" style="display:flex;">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="ketos" style="border: 1px solid #000; display:flex; flex-direction: column; align-items:center;">
                <h4><?php echo $row['nama_ketos'] ?> dan <?php echo $row['nama_waketos'] ?></h4>
                <img width="300px" src="image/<?php echo $row['gambar_paslon'] ?>" alt="">
                <h1><?php echo $row['nomor_urut'] ?></h1>
                <button type="submit" name="pilih" value="<?php echo $row['id_osis'] ?>">Pilih</button>
            </div>
        <?php } ?>
    </form>
        
</body>
</html>
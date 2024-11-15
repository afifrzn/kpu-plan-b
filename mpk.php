<?php
session_start();
include("db.php");

$nis = $_SESSION["nis"]; 
$kelas = $_SESSION["kelas"];

$select = "SELECT * FROM `mpk` WHERE perwakilan_kelas = '$kelas'";
$result = mysqli_query($host, $select);

if(isset($_POST['pilih'])){
    $pilih = $_POST['pilih'];
    
    $insert = "INSERT INTO `data_mpk`(`id_data_mpk`, `id_mpk`, `nisn_pemilih`, `kelas`) VALUES ('','$pilih','$nis','$kelas')";
    $query_insert = mysqli_query($host, $insert);
    if($query_insert){
        $update = "UPDATE `murid` SET `status_pilih`='sudah' WHERE nis = '$nis'";
        $query_update = mysqli_query($host, $update);
        if($query_update){
            echo "<script>window.location.href = '../'</script>";
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
    <h1>Halo, <?php echo $_SESSION['nama'] ?></h1>
    <h3>Pilih mpk kelas anda</h3>
    <form action="" method="post"style="display:flex;">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="ketos" style="border: 1px solid #000; display:flex; flex-direction: column; align-items:center;">
                <h4><?php echo $row['nama_mpk'] ?></h4>
                <img width="300px" src="image/<?php echo $row['gambar_paslon'] ?>" alt="">
                <h1><?php echo $row['nomor_urut'] ?></h1>
                <button type="submit" name="pilih" value="<?php echo $row['id_mpk'] ?>">Pilih</button>
            </div>
        <?php } ?>
    </form>
        
</body>
</html>
<?php 
session_start();
include("db.php");

$sql_mpk = "SELECT * FROM `mpk` ORDER BY `perwakilan_kelas` ASC";
$result_mpk = mysqli_query($host, $sql_mpk);
$count_mpk = mysqli_num_rows($result_mpk);

$current = null;
?>

<?php while($row_mpk = mysqli_fetch_assoc($result_mpk)) {
    
    if($row_mpk["perwakilan_kelas"] != $current) { 
        $current = $row_mpk["perwakilan_kelas"]; ?>
        <tr>
            <th>Nama Calon MPK</th>
            <th>Kelas</th>
            <th>COUNT</th>
        </tr>
<?php    }
    ?>
    <tr>
        <td><h2><?php echo $row_mpk['nama_mpk'] ?></h2></td>
        <td><h2><?php echo $row_mpk['perwakilan_kelas'] ?><h2></td>
        <?php  
        
        $id = $row_mpk['id_mpk'];
        $perwakilan_kelas = $row_mpk['perwakilan_kelas'];
        $check_mpk = "SELECT * FROM `data_mpk` WHERE id_mpk = '$id';";
        $result_mpk_count = mysqli_query($host, $check_mpk);
        $count_mpk_count = mysqli_num_rows($result_mpk_count);

        $sql = "SELECT COUNT(*) AS murid FROM `murid` WHERE kelas = '$perwakilan_kelas' ";
        $result = mysqli_query($host, $sql);  
        $row = mysqli_fetch_array($result);
        ?>
        <td><h2 style="color: blue;" ><?php echo $count_mpk_count; ?>/<?php echo $row['murid']; ?></h2></td>
    </tr>
<?php } ?>
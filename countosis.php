<?php

session_start();
include("db.php");

$sql = "SELECT * FROM `murid` ORDER BY `kelas` ASC;";
$result = mysqli_query($host, $sql);  
$count = mysqli_num_rows($result);

$sql_osis = "SELECT * FROM `osis`";
$result_osis = mysqli_query($host, $sql_osis);
$count_osis = mysqli_num_rows($result_osis);

?>

<tr>
    <th>Nama Calon Ketos</th>
    <th>Nama Calon Waketos</th>
    <th>COUNT</th>
</tr>
<?php while($row_osis = mysqli_fetch_assoc($result_osis)) {?>
    <tr>
        <td><h2><?php echo $row_osis['nama_ketos'] ?></h2></td>
        <td><h2><?php echo $row_osis['nama_waketos'] ?><h2></td>
        <?php  
        $id = $row_osis['id_osis'];
        $check_osis = "SELECT * FROM `data_osis` WHERE id_osis = '$id';";
        $result_osis_count = mysqli_query($host, $check_osis);
        $count_osis_count = mysqli_num_rows($result_osis_count);
        ?>
        <td><h2 style="color: blue;" ><?php echo $count_osis_count; ?>/<?php echo $count; ?></h2></td>
    </tr>
<?php } ?>
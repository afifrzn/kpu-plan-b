<?php

include("db.php");

$sql_data_mpk = "SELECT *, COUNT(saran_mpk) AS mpkcount FROM `saran_mpk` GROUP BY perwakilan_kelas;";
$result_data_mpk = mysqli_query($host, $sql_data_mpk);
$num_data_mpk = mysqli_num_rows($result_data_mpk);

?>

<tr>
    <th>Nama Ketos Waketos</th>
    <th>NIS Pemilih</th>
    <th>Kelas</th>
    <th>COUNT</th>
</tr>
<?php while ($row_data_mpk = mysqli_fetch_assoc($result_data_mpk)) { ?>
<tr>
    <td><h2><?php echo $row_data_mpk['saran_mpk'] ?></h2></td>
    <td><h2><?php echo $row_data_mpk['nis_pemilih'] ?></h2></td>
    <td><h2><?php echo $row_data_mpk['perwakilan_kelas'] ?></h2></td>
    <?php
    $kelas = $row_data_mpk['perwakilan_kelas'];
    $select_kelas = "SELECT * FROM `murid` WHERE kelas = '$kelas'";
    $result_kelas = mysqli_query($host, $select_kelas);
    $count_kelas = mysqli_num_rows($result_kelas);
    ?>
    <td><h2><?php echo $row_data_mpk['mpkcount'] ?>/ <?php echo $count_kelas; ?><h2></td>
</tr>
<?php } ?>
<?php

include("db.php");

$sql_data_mpk = "SELECT * FROM `data_mpk`";
$result_data_mpk = mysqli_query($host, $sql_data_mpk);
$num_data_mpk = mysqli_num_rows($result_data_mpk);


?>

<tr>
    <th>Nama Ketos Waketos</th>
    <th>NIS Pemilih</th>
    <th>Kelas</th>
    <th>FUNC</th>
</tr>
<?php while ($row_data_mpk = mysqli_fetch_assoc($result_data_mpk)) { ?>
<tr>
    <td><?php
    $id_mpk = $row_data_mpk['id_mpk']; 
    $sql_mpk = "SELECT * FROM `mpk` WHERE id_mpk = '$id_mpk'";
    $result_mpk = mysqli_query($host, $sql_mpk);
    $row_mpk = mysqli_fetch_assoc($result_mpk);
    $count_mpk = mysqli_num_rows($result_mpk); 

    echo $row_mpk["nama_mpk"];

    ?>
    </td>
    <td><?php echo $row_data_mpk['nisn_pemilih'] ?></</td>
    <td><?php echo $row_data_mpk['kelas'] ?></td>
    <td><button class="delete"><a href="delete_data_mpk.php?id=<?php echo $row_data_mpk['id_data_mpk'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" >Delete</a></button></td>
</tr>
<?php } ?>
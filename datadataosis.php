<?php

include("db.php");

$sql_data_osis = "SELECT * FROM `data_osis`";
$result_data_osis = mysqli_query($host, $sql_data_osis);
$num_data_osis = mysqli_num_rows($result_data_osis);


?>

<tr>
    <th>Nama Ketos Waketos</th>
    <th>NIS Pemilih</th>
    <th>FUNC</th>
</tr>
<?php while ($row_data_osis = mysqli_fetch_assoc($result_data_osis)) { ?>
<tr>
    <td><?php
    $id_osis = $row_data_osis['id_osis']; 
    $sql_osis = "SELECT * FROM `osis` WHERE id_osis = '$id_osis'";
    $result_osis = mysqli_query($host, $sql_osis);
    $row_osis = mysqli_fetch_assoc($result_osis);
    $count_osis = mysqli_num_rows($result_osis); 

    echo $row_osis["nama_ketos"]." & ".$row_osis["nama_waketos"];

    ?>
    </td>
    <td><?php echo $row_data_osis['nisn_pemilih'] ?></td>
    <td><button class="delete"><a href="delete_data_osis.php?id=<?php echo $row_data_osis['id_data_osis'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" >Delete</a></button></td>
</tr>
<?php } ?>

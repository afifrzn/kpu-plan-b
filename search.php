<?php 
session_start();
include("db.php");

$column = $_SESSION["column"];
$search = $_SESSION["search"];

$sql = "SELECT * FROM `murid` WHERE $column LIKE '%$search%' ORDER BY `kelas`;";
$result = mysqli_query($host, $sql);
$count = mysqli_num_rows($result);

$perpage = 18;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$start = ($page -1) * $perpage;
$sql_murid = "SELECT * FROM `murid` WHERE $column LIKE '%$search%' ORDER BY `kelas` ASC LIMIT $start,$perpage;";
$result_murid = mysqli_query($host, $sql_murid);  
$num = mysqli_num_rows($result_murid);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        table{
            margin-top: 24px;
        }
        table {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 80%;
        }
        
        table td, table th {
          font-size: 12px;
          text-align: center;
          border: 1px solid #ddd;
          padding: 1px;
        
        }
        
        table tr:nth-child(even){background-color: #f2f2f2;}
        
        table tr:hover {background-color: #ddd;}
        
        table th {

          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #008CBA;
          color: white;
        }

        td button{
          border: none;
          padding: 7px 16px;
          
          display: inline-block;
          font-size: 12px;
            
        }

        .edit{
            background-color: #097969;
        }

        .delete{
            margin-left: 24px;
            background-color: #FF3F29;
        }

        td button a {
            text-align: center;
            color: white;
            text-decoration: none;
        }

        .data-name{
            width: 360px;
        }

        .page-container{
            margin-top: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page:first-child{
            margin-left  : 0;
        }

        .page{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border: 2px solid green;
            color: green;
            text-decoration: none;
            margin-left: 12px;
            
        }

        .btn{
            margin-top: 24px;
            border: none;
            padding: 7px 16px;
            background-color: #9829FF;
            display: inline-block;
            font-size: 12px;
            color: white;
        }
    </style>
</head>
<body>
<table border="1">
        <tr>
            <th>NIS</th>
            <th class="data-name">Nama</th>
            <th>Kelas</th>
            <th>Kode Masuk</th>
            <th>Status Pilih</th>
            <th>Status</th>
            <th>FUNC</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result_murid)) { ?>
        <tr>
            <td><?php echo $row['nis'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['kelas'] ?></td>
            <td><?php echo $row['kode_masuk'] ?></td>
            <td <?php if($row['status_pilih'] == "sudah"){ echo "style='color:green; font-weight: bold;'"; }else{ echo "style='color:red; font-weight: bold;'"; }?>><h2> <?php echo $row['status_pilih'] ?></h2></td>
            <td style='color:green; font-weight: bold;'><h2><?php echo $row['status'] ?> </h2></td>
            <td> <button class="edit" ><a href="editsiswa.php?nis=<?php echo $row['nis'] ?>">Edit</a> </button><button class="delete"><a href="deletesiswa.php?nis=<?php echo $row['nis'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" >Delete</a></button></td>
        </tr>
        <?php } ?>
    </table>
    <div class="page-container">
        <?php 
        $pages = ceil($count / $perpage);

        for ($i = 1; $i <= $pages; $i++) {
            echo "<a class='page' href='search.php?page=$i'>$i</a>";
        }
        ?>
    </div>
    <button class="btn" type="button" onclick="window.location.href = 'admin.php'">Back</button>
    
</body>
</html>
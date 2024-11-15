<?php 
session_start();
include("db.php");

$sql = "SELECT * FROM `murid` ORDER BY `kelas` ASC;";
$result = mysqli_query($host, $sql);  
$count = mysqli_num_rows($result);

$perpage = 18;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$start = ($page -1) * $perpage;
$sql_murid = "SELECT * FROM `murid` ORDER BY `kelas` ASC LIMIT $start,$perpage;";
$result_murid = mysqli_query($host, $sql_murid);  
$num = mysqli_num_rows($result_murid);

if(isset($_POST['search'])){
    $search = $_POST['search_text'];
    $column = $_POST['column'];
    if($column == "" || $search == ""){
        echo "<script>alert('harap lengkapi untuk mencari data');</script>";
    }else{
        $_SESSION["search"] = $search;
        $_SESSION["column"] = $column;

        if(isset($_SESSION["search"]) && isset($_SESSION['column'])){
            header('Location: search.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .search{
            margin-top: 12px;
        }

        .search input{
            height: 32px;
        }
        table{
            margin-top: 24px;
        }
        table {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 85%;
        }
        
        table td, table th {
          font-size: 12px;
          text-align: center;
          border: 1px solid #ddd;
          padding: 4px;
        
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

        .btn-sys{
            box-sizing: border-box;
            padding: 4px;
            background-color: white;
            border: 2px solid #9829FF;
            margin-top: 32px;
            width: auto;
            display: flex;
            justify-content: space-between;
        }

        .btn-sys button:first-child{
            margin-left: 0;
        }

        .btn-sys button{
            margin-left: 4px;
            border: none;
            padding: 7px 16px;
            background-color: #9829FF;
            display: inline-block;
            font-size: 12px;
        }

        .btn-sys button a{
            text-align: center;
            color: white;
            text-decoration: none;
        }

        .table button{
            margin-left: 4px;
            border: none;
            padding: 7px 16px;
            background-color: #9829FF;
            display: inline-block;
            font-size: 12px;
        }

        .table button a{
            text-align: center;
            color: white;
            text-decoration: none;
        }

        td h2{
            font-family: Arial, Helvetica, sans-serif ;
        }

        <?php
        echo".page:nth-child($page){background-color : green; color: white;}";
        ?>
        
    </style>
</head>
<body>
    
    <form action="" method="post" class="search">
        <input type="text" name="search_text" id="" style="width: 500px" >
        <select name="column" id="">
            <option value="" selected >Choose Column</option>
            <option value="nis" >NIS</option>
            <option value="nama" >Nama</option>
            <option value="kelas" >Kelas</option>
            <option value="status_pilih" >Status Pilih</option>
            <option value="status" >Status</option>
        </select>
        <button type="submit" name="search" style="width: 75px">Search</button>
    </form>

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
            echo "<a class='page' href='admin.php?page=$i'>$i</a>";
        }
        ?>
    </div>
    <div class="btn-sys" >
        <button><a href="addsiswa.php">Tambahkan Data</a></button>
        <button type="button"><a href="index.php"  onclick="return confirm('Anda yakin pergi ke User Page?')">User Page</a></button>
        <button type="button"><a href="reset.php" onclick="return confirm('Anda yakin mereset data?')" >Reset Status Pilih</a></button>
    </div>

    <div style="display:flex; justify-content: space-between; width: 80%; height: auto;" >
        <table id="osis" style="width: 55%; height: fit-content ;" >

        </table>
        <table id="osis_count" style="width: 43%; height: fit-content ;">
        
        </table>
    </div>

    <div class="table" style="display:flex; margin-top: 64px ; justify-content: space-between; width: 85%; height: auto;" >

        <table id="mpk" border="1" style="width: 55%; height: fit-content ;" >

        </table>
        <div style="width: 43%;" >
            <table id="mpk_count" style="width: 100%; height: fit-content ;">
            
            </table>
            <h2>SARAN MPK</h2>
            <table id="saran_count" style="width: 100%; height: fit-content ;">
            
            </table>
            <button><a href="resetsaranmpk.php" onclick="return confirm('Anda yakin mereset data?')" >Reset Data</a></button>

        </div>
        
    </div>

    <script>
    $(document).ready(function(){  
        setInterval(function(){   
            $("#osis").load("datadataosis.php");
        }, 240);
        setInterval(function(){   
            $("#mpk").load("datadatampk.php");
        }, 240);
        setInterval(function(){   
            $("#osis_count").load("countosis.php");
        }, 240);
        setInterval(function(){   
            $("#mpk_count").load("countmpk.php");
        }, 240);
        setInterval(function(){   
            $("#saran_count").load("datasaranmpk.php");
        }, 240);
    });
    </script>
</body>
</html>
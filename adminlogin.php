<?php
session_start();
include("db.php");


if (isset($_POST["log"])) {
    $username = $_POST["useradmin"];
    $password = $_POST["password"];

    $sql_admin = "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password';";
    $result = mysqli_query($host, $sql_admin);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $username = $row["username"];
        $password = $row["password"];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
            header('Location: admin.php');
        }
    } else {
        echo 'Gagal';
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
    <h1>Login Admin</h1>
    <form action="" method="post">
        <label for="">Username Admin</label>
        <input type="text" name="useradmin" id="">
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <button type="submit" name="log" >Log In</button>
    </form>
</body>
</html>
<?php
session_start();
if(!empty($_SESSION['role'])) {
    $role = $_SESSION['role'];
    if($role != 'kasir'){
        header('location: ../index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Kasir</title>
</head>
<body>
    <H1>Selamat datang <?=  $_SESSION['role'] ?></H1>
    
</body>
</html>


<!--menghubungkan antara database dan PHP
tangkap seluruh data  ke dalam variabel
lakukan pencocokan data  -->

<!-- kita akan menyimpan informasi bahwa kita sudah login dengan cara menyimpan username ke local komputer -->
<?php
session_start();
//kondisi jika punya status login [username / role] maka lngsung di arahkan sesuai ketentuan
if(!empty($_SESSION['role'])){
    $role = $_SESSION['role'];
    if($role == 'admin'){
        header('location:admin');
    } else if($role == 'manager'){
        header('location:manager');
    } else if($role == 'kasir'){
        header('location:kasir');
    }
}

?>
<?php
if(!empty($_POST['login'])){
    
include 'lib/_koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$eksekusi = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($eksekusi);

if($eksekusi ->num_rows > 0){
    // lakukan aksi berdasarkan role user -->
    $role = $data['role'];

    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];


    if($role == 'admin'){
        header('location:admin');
    } else if($role == 'manager'){
        header('location:manager');
    } else if($role == 'kasir'){
        header('location:kasir');
    }

}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        input{
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="masukkan username">
        <input type="password" name="password" placeholder="masukkan password">
        <input type="submit" name="login" value="login">
        
    </form>
    
</body>
</html>
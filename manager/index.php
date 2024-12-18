<?php
session_start();
if(!empty($_SESSION['role'])) {
    $role = $_SESSION['role'];
    if($role != 'manager'){
        header('location: ../index.php');
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
    <h1>Selamat datang <?=  $_SESSION['role'] ?> </h1>
    <div>
        <a href="tambah_menu.php"><button>Tambah Menu</button></a>
        <button>Catatan Transaksi</button>
        <button>Pendapatan Harian</button>
        <button>Pendapatan Bulanan</button>
        <button>Log Aktivitas Pegawai</button>
    </div>
    
    <?php
        include '../lib/_koneksi.php';
        $query_tampil = "SELECT * FROM menu";
        $eksekusi_query = mysqli_query($koneksi, $query_tampil);
        $menus = mysqli_fetch_all($eksekusi_query, MYSQLI_ASSOC);
        // $json = json_encode($menus);
        // echo  $json;
        if (empty($menus)){
            echo "data kosong";
        }
        foreach ($menus as $menu) {
        ?>

            <div>
                <h2 class="text-center"><?= $menu['nama'] ?></h2>
                <p><?= $menu['harga'] ?></p>
                <p><?= $menu['status'] ?></p>

            </div>
            <div>
                <a href="edit.php?id=<?= $menu['id'] ?>">
                    <button class="btn btn-success">edit</button>
                </a>
                <a href="?aksi=delete&id=<?= $menu['id'] ?>">
                    <button class="btn btn-danger">delete</button>
                </a>
                <p></p>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
<!-- berisi tampilan seluruh data dari database-->
<?php
if (!empty($_POST)) {

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    include '../lib/_koneksi.php';
    $query = "INSERT INTO menu VALUES ('$nama','$kategori','$harga','$status')";
    $eksekusi = mysqli_query($koneksi, $query);
    if ($eksekusi) {
        header('location:../index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
</head>

<body>
    <div>
        <h1>Tambah Menu</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label class="form-label">nama</label>
                <input class="form-control" type="text" name="nama" placeholder="Masukkan nama">
            </div>
            <div>
                <label class="form-label">kategori</label>
                <select class="form-select" id="floatingSelect" name="kategori">
                    <option selected>pilih jenis</option>
                    <option value="1">makanan</option>
                    <option value="2">minuman </option>
                </select>
            </div>
            <div>
                <label class="form-label">harga</label>
                <input class="form-control" type="text" name="harga" placeholder="Masukkan nama harga">
            </div>
            <div>
                <label class="form-label">status</label>
                <select class="form-select" name="status" id="floatingSelect">
                    <option selected>status</option>
                    <option value="1">tersedia</option>
                    <option value="2">habis</option>
                </select>
            <input class="btn btn-primary" type="submit" value="tambah">
        </form>
    </div>
</body>

</html>
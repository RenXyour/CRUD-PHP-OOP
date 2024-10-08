<?php
include_once 'database.php';
include_once 'gudang_class.php';

$database = new Database();
$db = $database->getConnection();

$gudang = new Gudang($db);

if ($_POST) {
    $gudang->name = $_POST['name'];
    $gudang->location = $_POST['location'];
    $gudang->capacity = $_POST['capacity'];
    $gudang->status = $_POST['status'];
    $gudang->opening_hour = $_POST['opening_hour'];
    $gudang->closing_hour = $_POST['closing_hour'];

    if ($gudang->create()) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambahkan gudang.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Gudang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Tambah Gudang Baru</h1>
        <form method="post">
            <div class="form-group">
                <label>Nama Gudang</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="capacity" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif">Aktif</option>
                    <option value="tidak_aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jam Buka</label>
                <input type="time" name="opening_hour" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jam Tutup</label>
                <input type="time" name="closing_hour" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Gudang</button>
        </form>
    </div>
</body>
</html>

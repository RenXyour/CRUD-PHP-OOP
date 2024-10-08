<?php
include_once 'database.php';
include_once 'gudang_class.php';

$database = new Database();
$db = $database->getConnection();

$gudang = new Gudang($db);

// Mendapatkan ID gudang yang akan di-update
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID tidak ditemukan.');

// Mendapatkan detail data gudang berdasarkan ID
$gudang->id = $id;
$query = "SELECT * FROM gudang WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_POST) {
    $gudang->name = $_POST['name'];
    $gudang->location = $_POST['location'];
    $gudang->capacity = $_POST['capacity'];
    $gudang->status = $_POST['status'];
    $gudang->opening_hour = $_POST['opening_hour'];
    $gudang->closing_hour = $_POST['closing_hour'];

    if ($gudang->update()) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal mengupdate gudang.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Gudang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Update Gudang</h1>
        <form method="post">
            <div class="form-group">
                <label>Nama Gudang</label>
                <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="location" class="form-control" value="<?= $row['location'] ?>" required>
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="capacity" class="form-control" value="<?= $row['capacity'] ?>" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif" <?= ($row['status'] == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                    <option value="tidak_aktif" <?= ($row['status'] == 'tidak_aktif') ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jam Buka</label>
                <input type="time" name="opening_hour" class="form-control" value="<?= $row['opening_hour'] ?>" required>
            </div>
            <div class="form-group">
                <label>Jam Tutup</label>
                <input type="time" name="closing_hour" class="form-control" value="<?= $row['closing_hour'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Gudang</button>
        </form>
    </div>
</body>
</html>

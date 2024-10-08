<?php
include_once 'database.php';
include_once 'gudang_class.php';

$database = new Database();
$db = $database->getConnection();

$gudang = new Gudang($db);

// Mendapatkan ID dari URL
if (isset($_GET['id'])) {
    $gudang->id = $_GET['id'];

    // Menonaktifkan gudang
    if ($gudang->deactivate()) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menonaktifkan gudang.";
    }
} else {
    echo "ID gudang tidak ditemukan.";
}
?>

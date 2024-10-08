<?php
include_once 'database.php';
include_once 'gudang_class.php';

$database = new Database();
$db = $database->getConnection();

$gudang = new Gudang($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID tidak ditemukan.');
$gudang->id = $id;

if ($gudang->delete()) {
    
    header("Location: index.php");
    exit();
} else {
    echo "Gagal menghapus gudang.";
}
?>

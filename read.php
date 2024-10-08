<?php
include_once 'config.php';
include_once 'Gudang.php';

$database = new Database();
$db = $database->getConnection();

$gudang = new Gudang($db);
$stmt = $gudang->read();

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nama</th><th>Lokasi</th><th>Kapasitas</th><th>Status</th><th>Jam Buka</th><th>Jam Tutup</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Akses data secara eksplisit dari hasil query
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
    echo "<td>" . htmlspecialchars($row['capacity']) . "</td>";
    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
    echo "<td>" . htmlspecialchars($row['opening_hour']) . "</td>";
    echo "<td>" . htmlspecialchars($row['closing_hour']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>

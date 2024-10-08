<?php

include_once 'database.php';
include_once 'gudang_class.php';


$database = new Database();
$db = $database->getConnection();


$gudang = new Gudang($db);

// Mengambil total data gudang untuk pagination
$totalStmt = $gudang->readAll();
$total = $totalStmt->rowCount();

// Pagination settings
$limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Mengambil data gudang dengan pagination
$stmt = $gudang->readPaginated($start, $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse MSIB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Warehouse MSIB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">List Daftar Gudang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Tambah Data Gudang</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">List Daftar Gudang</h1>
        
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['location']) ?></td>
                        <td><?= htmlspecialchars($row['capacity']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                        <td><?= htmlspecialchars($row['opening_hour']) ?></td>
                        <td><?= htmlspecialchars($row['closing_hour']) ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning">Update</a>
                                <a href="status_gudang.php?id=<?= $row['id'] ?>" class="btn btn-secondary">Nonaktifkan</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data gudang ini?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($page == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?= $page - 1; ?>">Previous</a>
                </li>
                <?php 
                $totalPages = ceil($total / $limit); // Hitung total halaman
                for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= ($page == $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?= $page + 1; ?>">Next</a>
                </li>
            </ul>
        </nav>

        <footer>
            <div class="text-center py-3 mt-4">
                <p class="mb-0">© 2024 Sistem CRUD Warehouse MSIB</p>
                <p class="mb-0">PT. Citra Gama Sakti</p>
                <p class="mb-0">Developed by Renaldy Syahputra (Aldy)</p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include('../config.php');
include('../includes/header.php');
// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// tambah data
?>
<h2>Daftar costumer</h2>
<a href="add_cos.php" class="btn btn-primary">Tambah Customer</a>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light p-3">
        <h1 class="text-center">Daftar Customer</h1>
    </header>

    <main class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $conn = new mysqli('localhost', 'root', '', 'db_crud');
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Ambil data customer
                $result = $conn->query("SELECT * FROM customer");
                if (!$result) {
                    die("Query gagal: " . $conn->error);
                }

                // Tampilkan data
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_customer'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['telepon'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td>
                            <a href="edit_customer.php?id=<?= $row['id_customer'] ?>">Edit</a>
                            <a href="?hapus=<?= $row['id_customer'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus customer ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

    <footer class="text-center p-3 bg-light">
        <p>&copy; 2024 Nama Perusahaan. Semua hak dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

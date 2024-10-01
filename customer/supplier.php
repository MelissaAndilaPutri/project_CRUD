<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah supplier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
    $nama_supplier = $_POST['nama_supplier'];
    $kontak = $_POST['kontak'];
    $alamat_supplier = $_POST['alamat_supplier'];

    $sql = "INSERT INTO supplier (nama_supplier, kontak, alamat_supplier) VALUES ('$nama_supplier', '$kontak', '$alamat_supplier')";
    $conn->query($sql);
}

// Hapus supplier
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM supplier WHERE id_supplier = $id");
}

// Ambil data supplier
$result = $conn->query("SELECT * FROM supplier");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Supplier</title>
</head>
<body>
    <h1>CRUD Supplier</h1>
    <form method="post">
        <input type="text" name="nama_supplier" placeholder="Nama Supplier" required>
        <input type="text" name="kontak" placeholder="Kontak" required>
        <textarea name="alamat_supplier" placeholder="Alamat Supplier"></textarea>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <h2>Daftar Supplier</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Supplier</th>
            <th>Kontak</th>
            <th>Alamat Supplier</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_supplier'] ?></td>
                <td><?= $row['nama_supplier'] ?></td>
                <td><?= $row['kontak'] ?></td>
                <td><?= $row['alamat_supplier'] ?></td>
                <td>
                    <a href="?hapus=<?= $row['id_supplier'] ?>">Hapus</a>
                    <a href="edit_supplier.php?id=<?= $row['id_supplier'] ?>">Edit</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>

<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Edit supplier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_supplier = $_POST['nama_supplier'];
    $kontak = $_POST['kontak'];
    $alamat_supplier = $_POST['alamat_supplier'];

    $sql = "UPDATE supplier SET nama_supplier='$nama_supplier', kontak='$kontak', alamat_supplier='$alamat_supplier' WHERE id_supplier=$id";
    $conn->query($sql);
    header("Location: supplier.php");
}

// Ambil data supplier
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM supplier WHERE id_supplier = $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
</head>
<body>
    <h1>Edit Supplier</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $row['id_supplier'] ?>">
        <input type="text" name="nama_supplier" value="<?= $row['nama_supplier'] ?>" required>
        <input type="text" name="kontak" value="<?= $row['kontak'] ?>" required>
        <textarea name="alamat_supplier"><?= $row['alamat_supplier'] ?></textarea>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>

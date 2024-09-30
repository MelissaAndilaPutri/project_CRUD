<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_crud'); // Gantilah 'db_crud' dengan nama database Anda

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID customer dari URL
$id = $_GET['id'];

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // Query untuk mengupdate data customer
    $sql = "UPDATE customer SET nama='$nama', email='$email', telepon='$telepon', alamat='$alamat' WHERE id_customer=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Customer berhasil diperbarui!";
        header("Location: customer.php"); // Redirect ke halaman customer setelah update
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data customer untuk ditampilkan di form
$result = $conn->query("SELECT * FROM customer WHERE id_customer = $id");

// Cek apakah query berhasil
if (!$result) {
    die("Query gagal: " . $conn->error);
}

$row = $result->fetch_assoc();

if (!$row) {
    die("Data customer tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
</head>
<body>
    <h1>Edit Customer</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $row['id_customer'] ?>">
        <input type="text" name="nama" value="<?= $row['nama'] ?>" required>
        <input type="email" name="email" value="<?= $row['email'] ?>" required>
        <input type="text" name="telepon" value="<?= $row['telepon'] ?>">
        <textarea name="alamat" required><?= $row['alamat'] ?></textarea>
        <button type="submit">Update</button>
    </form>
    <a href="customer.php">Kembali ke Daftar Customer</a>
</body>
</html>

<?php $conn->close(); ?>

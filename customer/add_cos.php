<?php
include('../config.php');
include('../includes/header.php');
?>
<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_crud');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form jika tombol kirim ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO customer (nama, email, telepon, alamat) VALUES ('$nama', '$email', '$telepon', '$alamat')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: customer.php"); // Redirect ke halaman daftar customer
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Customer</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="customer.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>

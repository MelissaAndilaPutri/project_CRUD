<?php
$host = 'localhost';
$db = 'db_crud';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
// Jika koneksi gagal, tampilkan pesan kesalahan 
if ($conn->connect_error) {
 die("Koneksi gagal: " . $conn->connect_error);
}
?>
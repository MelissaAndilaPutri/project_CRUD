<?php
session_start(); 
include('config.php');
if (isset($_POST['login'])){
$username = $_POST['username'];
$password = md5($_POST['password']);

 $sql = "SELECT * FROM users WHERE username='$username' AND password=md5('$password')";
 $result = $conn->query($sql);

// Jika login berhasil 
if ($result->num_rows > 0) { 
$row = $result->fetch_assoc();
 $_SESSION['username'] = $username; // Menyimpan username ke session
 $_SESSION['role'] = $row['role']; // Menyimpan role ke session

 if ($row['role'] == 'admin') {
 header("Location: dashboard/admin.php"); 
} else { 
header("Location: dashboard/user.php");
}
 } else {
$_SESSION['error'] = "Username atau password salah";
header("Location: index.php"); 
 }
}
?>
<?php
include('../config.php');
include('../includes/header.php');
?>
<h2>Tambah Produk</h2>
<form method="POST" action="">
 <div class="form-group mb-3">
 <label for="name">Nama Produk</label> 
<input type="text" name="name" class="form-control" required>
</div>
 <div class="form-group mb-3">
 <label for="description">Deskripsi</label>
 <textarea name="description" class="form-control" required></textarea>
 </div>
 <div class="form-group mb-3">
 <label for="price">Harga</label>
 <input type="number" name="price" class="form-control" required>
 </div>
<button type="submit" name="submit" class="btn btn-success">Simpan</button>
</form>
 <?php include('../includes/footer.php'); ?>
<?php
if (isset($_POST['submit'])) { 
 $name = $_POST['name'];
 $description = $_POST['description'];
 $price = $_POST['price'];
$sql = "INSERT INTO products (name, description, price) 
 VALUES ('$name', '$description', '$price')";
if ($conn->query($sql) === TRUE) {
 header("Location: index.php");
 } else {
 echo "Error: " . $conn->error;
 }
}
?>
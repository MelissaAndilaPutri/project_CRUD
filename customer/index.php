<?php
include('../config.php');
include('../includes/header.php');
?>
<h2>Daftar Produk</h2>
<a href="add.php" class="btn btn-success mb-3">Tambah Data</a>
<table class="table table-bordered">
 <thead>
 <tr>
 <th>id</th>
 <th>Nama Customer</th>
 <th>email</th>
<th>telepon</th> 
<th>alamat</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $sql = "SELECT * FROM customer ORDER BY name";
 $result = $conn->query($sql);
 if ($result->num_rows > 0):
 $no = 1; 
while ($row = $result->fetch_assoc()):
 ?>
 <tr>
 <td><?= $no++; ?></td>
 <td><?= $row['name']; ?></td>
 <td><?= $row['email']; ?></td>
 <td><?= $row['telepon']; ?></td>
 <td><?= $row['alamat']; ?></td>
 <td>
 <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
 <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" 
 onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
 </td>
 </tr>
<?php 
endwhile; 
else: 
?>
 <tr>
 <td colspan="5">Tidak ada data customer</td>
 </tr> 
<?php 
endif; 
?>
 </tbody>
</table>
<?php include('../includes/footer.php'); ?>
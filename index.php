<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Login Sistem</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body>
 <div class="container mt-5">
 <div class="row justify-content-center">
 <div class="col-md-4">
<div class="card">
 <div class="card-header">Login</div>
 <div class="card-body">
 <form method="POST" action="login.php">
 <div class="form-group mb-3">
 <label for="username">Username</label>
 <input type="text" name="username" class="form-control" required>
</div>
<div class="form-group mb-3">
 <label for="password">Password</label>
 <input type="password" name="password" class="form-control" required>
</div>
<?php if (isset($_SESSION['error'])) { ?>
 <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
<?php } ?>
<button type="submit" name="login" class="btn btn-primary w100">
Login
</button>
 </form>
 </div>
 </div>
 </div>
 </div>
 </div>
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html>
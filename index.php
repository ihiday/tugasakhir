<?php
include 'function.php';
session_start();
error_reporting(0);
if (isset($_SESSION['username'])) {
	header("Location: home.php");
}
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$datalogin = cekLogin($conn, $username, $password);
	if ($datalogin) {
		$_SESSION['username'] = $datalogin[0]['username'];
		$_SESSION['id'] = $datalogin[0]['id'];
		$_SESSION['jenis'] = $datalogin[0]['jenis'];
		$_SESSION['nama'] = $datalogin[0]['nama'];
		header("Location: home.php");
	} else {
		echo "<script>alert('Woops! username or Password is Wrong.')</script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login Form - Pure Coding</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</body>

</html>
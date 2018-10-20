<?php
require_once 'fungsi.php';

$error = '';

if(isset($_SESSION['user']) ){
	if($_SESSION['user'] == 1){
		header('Location:4dm1n/');
	}else{
		header('Location:operator/');
	}
}


if(isset($_POST['login'])){
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$level 		= $_POST['level'];
	$password 	= md5($password);

	if(!empty($username) && !empty($password) ){
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND level='$level' ";
		if($login = run($query)){
			if(mysqli_num_rows($login) != 0 ){
				$_SESSION['user'] = $level;
				if($level == '1'){
					header('Location: 4dm1n/');
				}else{
					header('Location: operator/');
				}
			}else{
				// header('Location: index.php');
				$error = '<p class="error">Login gagal :P</p>';
			}
		}else{
			$error = '<p class="error">Ada yang salah</p>';
		}
	}else{
		$error = '<p class="error">Wajib diisi semua :D</p>';
	}

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INVENTARIS</title>
	<link rel="stylesheet" href="style.css">
	<link rel="icon" href="assets/tut.png">
</head>
<body>
	

<div class="login">

	<div class="icon"><img src="assets/tut.png" alt=""></div>
	<div class="judul j-biru" style="background: #fff;">
		<h3>APLIKASI INVENTARIS SARPRAS SMK</h3>
	</div>

	<div class="form-login">
		<h3>LOGIN APLIKASI</h3>
		<label for=""></label>
		<form action="" method="post" class="full">
			<table class="full">
			<label for="">Username</label>
			<input type="text" name="username" placeholder="Username" required="" class="full">
			<label for="">Password</label>
			<input type="password" name="password" placeholder="Password" required="" class="full">
			<label for="">Status</label>
			<select name="level" class="full">
				<option value="1" class="fl">Admin</option>
				<option value="0" class="fl">Operator</option>
			</select>
			<label for=""></label>
			<input type="submit" name="login" value="Login" class="full hijau">
			<p><?= $error; ?></p>
		</form>
	</div>
</div>


</body>
</html>
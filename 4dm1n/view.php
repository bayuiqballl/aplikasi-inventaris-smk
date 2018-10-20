<?php
require_once '../fungsi.php';

?>

<?php function headerku($judul){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INVENTARIS</title>
	<link rel="stylesheet" href="../style.css">
	<link rel="icon" href="../assets/tut.png">
</head>
<body>
	<div class="nav-admin">
		<ul>
			<li>
				<div class="i-logo">
					<img src="../assets/tut.png" alt="">
				</div>
				<b>APLIKASI INVENTARIS SARPRAS SMK</b>
			</li>
			<a href="view.php?log=out"><li class="kanan">&#9919; Logout</li></a>
		</ul>
	</div>
	<div class="kop">Dashboard / <?= $judul; ?></div>
<?php } ?>

<?php function cetak(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INVENTARIS</title>
	<link rel="stylesheet" href="../style.css">
	<link rel="icon" href="../assets/tut.png">
</head>
<body>
	<div class="nav-admin">
		<ul>
			<li>
				<div class="i-logo">
					<img src="../assets/tut.png" alt="">
				</div>
				<b>APLIKASI INVENTARIS SARPRAS SMK</b>
			</li>
		</ul>
	</div>
<?php } ?>

<?php 
if(isset($_GET['log']) == 'out'){
	session_destroy();
	header('Location:../index.php');
}

?>
	
<?php function sideku(){ ?>
<div class="side-admin">
	<ul>
		<a href="index.php"><li>&#9921; Home</li></a>
		<a href="barang.php"><li>&#9921; Barang</li></a>
		<a href="supplier.php"><li>&#9921; Supplier</li></a>
		<a href="backup.php"><li>&#9921; Backup</li></a>
	</ul>
</div>
<?php } ?>

<?php function footerku(){ ?>
<div class="footer-admin">
	&copy; hikam abqory
</div>
</body>
</html>
<?php } ?>
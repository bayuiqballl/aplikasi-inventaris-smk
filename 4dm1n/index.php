<?php
$judul = 'Home';
require_once '../fungsi.php';
require_once 'view.php';


if(!isset($_SESSION['user'])){
	header('Location:../index.php');
}

headerku($judul);

$query = "SELECT * FROM barang";
$read  = run($query);

?>

<div class="main-admin">
	<?php sideku(); ?>
	<div class="isi">
		<div class="konten">
			
			<img src="../assets/iconku.png" alt="">
			<div class="judul j-hijau">
				<h3>APLIKASI INVENTARIS SARANA DAN PRASARANA SMK</h3>
				<br>
				<p>
					Merupakan aplikasi yang dibuat oleh anak SMK NEGERI 2 SURAKARTA. Aplikasi ini dibuat dengan koding manual alias murni koding dari awal tanpa framework.
				</p>
			</div>
			<br>
			<div class="judul j-merah">
				&#9888; HATI-HATI dalam menggunakan aplikasi ini.
			</div>
			<br><br>
			<a href="index.php" class="tmbl putih">Normal Style</a>
			<a href="index.php?pink=pink" class="tmbl putih">Pink Style</a>
		</div>
	</div>
</div>


<?php
footerku();
?>
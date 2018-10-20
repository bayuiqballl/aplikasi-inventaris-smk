<?php
$judul = 'Barang / Ambil Barang';
require_once '../fungsi.php';
require_once 'view.php';


if(!isset($_SESSION['user'])){
	header('Location:../index.php');
}

headerku($judul);

$id = $_GET['id'];
$query = "SELECT * FROM stok WHERE jumlah = $id";
$getid = mysqli_fetch_assoc(run($query));

$query = "SELECT * FROM barang,stok WHERE barang.jumlah = stok.jumlah";
$jumlah  = run($query);

if(isset($_POST['keluar'])){
	$kode 		=	$_POST['kode'];
	$tanggal 	=	$_POST['tanggal'];
	$jumlah 		=	$getid['jumlah'] - $_POST['jumlah'];
	$jumlahkel	=	$_POST['jumlah'];
	$penerima 	=	$_POST['penerima'];
	$status		= 'ok';

	mysqli_query($link,"UPDATE stok SET tanggal='$tanggal',jumlah_masuk='$jumlah',jumlah_keluar='$jumlahkel',penerima='$penerima',status='$status' WHERE kode_barang='$kode' ");
	header('Location: barang.php');

}



?>

<div class="main-admin">
	<?php sideku(); ?>
	<div class="isi">
		<div class="konten">
			
			<div class="add-form">
				<div class="judul j-hijau">
					<h3>AMBIL BARANG</h3>
				</div>
				<div class="form-data full">
					<form action="" method="post">
						<table style="background: #fff;" class="full">
							<tr>
								<input type="hidden" name="kode" value="<?= $getid['kode_barang']; ?>">
								<td>Nama Barang</td>
								<td><input type="text" name="penerima" value="<?= $getid['nama_barang']; ?>"></td>
							</tr>
							<tr>
								<td>Jumlah</td>
								<td>
									<input type="number" min="0" max="<?= $getid['jumlah_masuk']; ?>" class="f20" name="jumlah" value="<?= $getid['jumlah_masuk']; ?>">

								</td>
							</tr>
							<tr>
								<td valign="top">Tanggal</td>
								<td><input type="date" name="tanggal"></td>
							</tr>
							<tr>
								<td valign="top">Penerima</td>
								<td><input type="text" name="penerima"></td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<input type="submit" value="Keluarkan Barang" class="tmbl biru" name="keluar">
									<a href="barang.php"><input type="button" value="Batal" class="tmbl merah"></a>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>


<?php
footerku();
?>
<?php
$judul = 'Barang / Masukkan Barang';
require_once '../fungsi.php';
require_once 'view.php';


if(!isset($_SESSION['user'])){
	header('Location:../index.php');
}

headerku($judul);

if(isset($_POST['tambah'])){
	$kode 			= "BRG-".date('hi');
	$supplier		= $_POST['supplier'];
	$nama 			= $_POST['nama'];
	$lokasi 			= $_POST['lokasi'];
	$jumlah 			= $_POST['jumlah'];
	$kondisi 		= $_POST['kondisi'];
	$dana 			= $_POST['dana'];
	$tanggal			= $_POST['tanggal'];

	mysqli_query($link,"INSERT INTO barang (kode_barang,nama_barang,lokasi_barang,kondisi,jumlah,sumber_dana,supplier,tanggal) VALUES ('$kode','$nama','$lokasi','$kondisi','$jumlah','$dana','$supplier','$tanggal') ");
	mysqli_query($link,"INSERT INTO stok (kode_barang,nama_barang,jumlah_masuk,jumlah) VALUES ('$kode','$nama','$jumlah','$jumlah') ");

	header('Location: barang.php');

}

$query = "SELECT * FROM supplier";
$supplier  = run($query);

?>

<div class="main-admin">
	<?php sideku(); ?>
	<div class="isi">
		<div class="konten">
			
			<div class="add-form">
				<div class="judul j-hijau">
					<h3>MASUKKAN BARANG</h3>
				</div>
				<div class="form-data full">
					<form action="" method="post">
						<table style="background: #fff;" class="full">
							<tr>
								<td width="150">Supplier Barang</td>
								<td>
									<select name="supplier" class="f20">
										<?php while($sup = mysqli_fetch_assoc($supplier)){ ?>
										<option value="<?= $sup['nama_supplier']; ?>"><?= $sup['nama_supplier']; ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Nama Barang</td>
								<td><input type="text" placeholder="Nama Barang" class="f50" name="nama"></td>
							</tr>
							<tr>
								<td valign="top">Lokasi Barang</td>
								<td><textarea name="lokasi" class="f50" rows="3"></textarea></td>
							</tr>
							<tr>
								<td>Kondisi</td>
								<td><input type="text" placeholder="Kondisi" class="f20" name="kondisi"></td>
							</tr>
							<tr>
								<td>Jumlah</td>
								<td><input type="number" min="1" class="f20" name="jumlah"></td>
							</tr>
							<tr>
								<td>Sumber Dana</td>
								<td><input type="text" placeholder="Sumber Dana" class="f50" name="dana"></td>
							</tr>
							<tr>
								<td>Tanggal</td>
								<td><input type="date" class="f50" name="tanggal"></td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<input type="submit" value="Masukkan Barang" class="tmbl biru" name="tambah">
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
<?php
$judul = 'Supplier / Edit Supplier';
require_once '../fungsi.php';
require_once 'view.php';


if(!isset($_SESSION['user'])){
	header('Location:../index.php');
}

headerku($judul);

$id = $_GET['id'];
$query = "SELECT * FROM supplier WHERE id_supplier= '$id' ";
$sup  = mysqli_fetch_assoc(run($query));

if(isset($_POST['edit'])){
	$id 				= $_POST['id'];
	$nama 			= $_POST['nama'];
	$alamat 			= $_POST['alamat'];
	$telepon			= $_POST['telepon'];
	$kota 			= $_POST['kota'];


	if(!empty($id) && !empty($nama) && !empty($alamat) && !empty($telepon) && !empty($kota) ){
		$query = "UPDATE supplier SET nama_supplier='$nama',alamat_supplier='$alamat',telp_supplier='$telepon',kota_supplier='$kota' WHERE id_supplier = $id ";
		$update = run($query);
		if($update){
			header('Location: supplier.php');
		}
	}

}


?>

<div class="main-admin">
	<?php sideku(); ?>
	<div class="isi">
		<div class="konten">
			
			<div class="add-form">
				<div class="judul j-kuning">
					<h3>EDIT DATA SUPPLIER</h3>
				</div>
				<div class="form-data full">
					<form action="" method="post">
						<table style="background: #fff;" class="full">
							<tr>
								<input type="hidden" name="id" value="<?= $sup['id_supplier']; ?>">
								<td>Nama Supplier</td>
								<td><input type="text" value="<?= $sup['nama_supplier']; ?>" class="f50" name="nama"></td>
							</tr>
							<tr>
								<td valign="top">Alamat Supplier</td>
								<td><textarea name="alamat" class="f50" rows="3"><?= $sup['alamat_supplier']; ?></textarea></td>
							</tr>
							<tr>
								<td>Telepon Supplier</td>
								<td><input type="text" class="f20" name="telepon"  value="<?= $sup['telp_supplier']; ?>"></td>
							</tr>
							<tr>
								<td>Kota Supplier</td>
								<td><input type="text"  value="<?= $sup['kota_supplier']; ?>" class="f20" name="kota"></td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<input type="submit" value="Edit Data" class="tmbl hijau" name="edit">
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
<?php
$judul = 'Barang / Tambah Supplier';
require_once '../fungsi.php';
require_once 'view.php';


if(!isset($_SESSION['user'])){
	header('Location:../index.php');
}

headerku($judul);

if(isset($_POST['tambah'])){
	$kode 			= "SUP-".date('hi');
	$nama 			= $_POST['nama'];
	$alamat 			= $_POST['alamat'];
	$telepon			= $_POST['telepon'];
	$kota 			= $_POST['kota'];


	if(!empty($kode) && !empty($nama) && !empty($alamat) && !empty($telepon) && !empty($kota) ){
		$query = "INSERT INTO supplier 
					(kode_supplier,nama_supplier,alamat_supplier,telp_supplier,kota_supplier)
					VALUES 
					('$kode','$nama','$alamat','$telepon','$kota') ";
		$insert = run($query);
		if($insert){
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
					<h3>TAMBAH DATA SUPPLIER</h3>
				</div>
				<div class="form-data full">
					<form action="" method="post">
						<table style="background: #fff;" class="full">
							<tr>
								<td>Nama Supplier</td>
								<td><input type="text" placeholder="Nama Supplier" class="f50" name="nama"></td>
							</tr>
							<tr>
								<td valign="top">Alamat Supplier</td>
								<td><textarea name="alamat" class="f50" rows="3"></textarea></td>
							</tr>
							<tr>
								<td>Telepon Supplier</td>
								<td><input type="text" class="f20" name="telepon"></td>
							</tr>
							<tr>
								<td>Kota Supplier</td>
								<td><input type="text" placeholder="Kota" class="f20" name="kota"></td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<input type="submit" value="Tambah Data" class="tmbl hijau" name="tambah">
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
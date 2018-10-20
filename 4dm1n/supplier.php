<?php
$judul = 'Supplier';
require_once '../fungsi.php';
require_once 'view.php';


if(!isset($_SESSION['user'])){
	header('Location:../index.php');
}

headerku($judul);

$query = "SELECT * FROM supplier";
$read  = run($query);

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$query = "SELECT * FROM supplier WHERE nama_supplier LIKE '%$cari%' ";
	$read  = run($query);
}

?>

<div class="main-admin">
	<?php sideku(); ?>
	<div class="isi">
		<div class="konten">
			<div class="judul j-hijau">
				<div class="k2">
					<h3>DATA SUPPLIER</h3>
				</div>
				<div class="k2" style="text-align: right;">
					<a href="addsup.php" class="tmbl hijau">TAMBAH SUPPLIER</a>
				</div>
			</div>

			<div class="data-barang">
				<table>
					<thead>
						<tr>
							<td width="30" align="center">No</td>
							<td>Kode Supplier</td>
							<td>Nama Supplier</td>
							<td>Telepon</td>
							<td align="center">Opsi</td>
						</tr>
					</thead>

					<tbody>
					<?php 
				if(mysqli_num_rows($read) > 0){
					$no = 0;
					while($row = mysqli_fetch_assoc($read)){ 
					$no++;
						?>
						<tr>
							<td align="center"><?= $no; ?></td>
							<td><?= $row['kode_supplier']; ?></td>
							<td><?= $row['nama_supplier']; ?></td>
							<td><?= $row['telp_supplier']; ?></td>
							<td align="center">
								<a href="editsup.php?id=<?= $row['id_supplier']; ?>" class="tmbl biru">Edit</a>
								<a href="delete.php?id=<?= $row['id_supplier']; ?>" class="tmbl merah">Hapus</a>
							</td>
						</tr>
					<?php }
				}else{
					echo '<tr>
								<td colspan="11">
									<h3 style="padding:15px; text-align:center;">Data kosong!</h3>
								</td>
							</tr>';
				}
					 ?>
					</tbody>

				</table>

			</div>
		</div>
	</div>
</div>


<?php
footerku();
?>
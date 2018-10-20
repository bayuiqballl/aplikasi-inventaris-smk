<?php
$judul = 'Barang';
require_once '../fungsi.php';
require_once 'view.php';


if(!isset($_SESSION['user'])){
	header('Location:../index.php');
}

headerku($judul);

$query = "SELECT * FROM stok";
$read  = run($query);

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$query = "SELECT * FROM stok WHERE nama_barang LIKE '%$cari%' ";
	$read  = run($query);
}

?>

<div class="main-admin">
	<?php sideku(); ?>
	<div class="isi">
		<div class="konten">

			<div class="judul j-merah">
				<!-- <h3>DATA BARANG INVENTARIS</h3> -->
				<a href="barang.php" class="kiri tmbl merah">Kembali</a>
				<form action="cari.php" class="kanan" method="get">
					<input type="text" placeholder="Cari barang..." name="cari"><button class="biru">Go</button>
				</form>
			</div>
			<br>
			<div class="dataa">
				<h3>Hasil Pencarian - Stok barang</h3>
			</div>
			<div class="data-barang">
				<table>
					<thead>
						<tr>
							<td width="30" align="center">No</td>
							<td>Nama Barang</td>
							<td align="center">Jumlah</td>
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
							<td><?= $row['nama_barang']; ?></td>
							<td align="center"><?= $row['jumlah_masuk']; ?></td>
							<td align="center"><a href="kel.php?id=<?= $row['jumlah']; ?>" class="tmbl kuning">Ambil keluar</a></td>
						</tr>
					<?php }
				}else{
					echo '<tr>
								<td colspan="11">
									<h3 style="padding:15px; text-align:center;">Tidak ada hasil!</h3>
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
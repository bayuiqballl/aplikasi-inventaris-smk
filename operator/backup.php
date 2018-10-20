<?php
$judul = 'Backup';
require_once 'view.php';
headerku($judul);
// query untuk menampilkan semua tabel dalam database
$query = "SHOW TABLES";
$hasil = run($query);

 ?>



<div class="main-admin">
	<?php sideku(); ?>
	<div class="isi">
		<div class="konten">
			<div class="judul j-hijau"><h3>BackUp Database</h3></div><br>


			<h3>Nama Database: Inventaris</h3>
			<h3>Daftar Tabel</h3>
			<label for=""></label>
		<div class="k2">
			<form method="post" action="proses.php">
			<table>
				<tr style="border-bottom: 3px solid #2196f3; ">
					<td width="50" align="center">Pilih</td>
					<td>Nama tabel</td>
				</tr>
			<?php while ($data = mysqli_fetch_row($hasil)) { ?>
				<tr>
					<td align="center"><input type="checkbox" name="tabel[]" value="<?= $data[0]?>" checked></td>
					<td><?= $data[0]?></td>
				</tr>
			<?php } ?>
			</table><br>
			<input type="submit" name="submit" value="Backup Data" class="tmbl biru">
			</form>
		</div>

		</div>
	</div>
</div>


<?php
footerku();
?>
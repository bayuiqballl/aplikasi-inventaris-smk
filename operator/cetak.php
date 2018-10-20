<?php
require_once '../fungsi.php';
$query = "SELECT * FROM stok";
$read = run($query);

$content = '
	<style type="text/css">
		table{border-collapse: collapse; width: 100%; border:1px solid #e0e0e0;}
		table th{padding: 10px; background:#f8f8f8;}
		table td{padding: 10px;}
	</style>
';

$content .= '
	<page>

		<div style="padding:10px; background:#2196f3; color:#fff; text-align:center;">
			<span>LAPORAN TRANSAKSI BARANG</span>
		</div>
		<div style="padding:15px; text-align:center;">
			<span>DATA TRANSAKSI BARANG</span>
		</div>
		
		<div style="width:100%;">
			<table border="1px" class="tabel" style="width:100%; >
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Jumlah Masuk</th>
					<th>Jumlah Keluar</th>
					<th>Total barang</th>
				</tr>';
			$no = 0;
			while($row = mysqli_fetch_assoc($read) ){ 
			$no++;
				$content .= '
					<tr>
						<td>'. $no .'</td>
						<td>'.$row["kode_barang"].'</td>
						<td>'.$row["nama_barang"] .'</td>
						<td>'.$row["jumlah_masuk"] .'</td>
						<td>'.$row["jumlah_keluar"] .'</td>
						<td>'.$row["jumlah"] .'</td>
					</tr>
				';
			}

$content .= '
			</table>
		</div>

	</page>
';

require_once '../html2pdf/html2pdf.class.php';
$pdf = new HTML2PDF('p','A4','en');
$pdf->WriteHTML($content);
$pdf->Output('DataPasTerdaftar.pdf', 'D');
// $pdf->Output('DataDokter.pdf');
?>
<?php
require_once '../Control.php';
$query = "SELECT * FROM pendaftaran";
$read = data($query);

$content = '
	<style type="text/css">
		table{border-collapse: collapse; width: 100%; border:1px solid #e0e0e0;}
		table th{padding: 10px; background:#f8f8f8;}
		table td{padding: 10px;}
	</style>
';

$content .= '
	<page>

		<div style="padding:10px; background:#2196f3; color:#fff; text-align:center;">
			<span>LAPORAN POLIKLINIK</span>
		</div>
		<div style="padding:15px; text-align:center;">
			<span>DATA PASIEN TERDAFTAR</span>
		</div>
		
		<div style="width:100%;">
			<table border="1px" class="tabel" style="width:100%; >
				<tr>
					<th>No</th>
					<th>Pasien</th>
					<th>Poli</th>
					<th>Ditangaani Oleh</th>
					<th>Tanggal Terdaftar</th>
				</tr>';
			$no = 0;
			while($row = mysqli_fetch_assoc($read) ){ 
			$no++;
				$content .= '
					<tr>
						<td>'. $no .'</td>
						<td>Poli '.$row["pasien"].'</td>
						<td>'.$row["poli"] .'</td>
						<td>'.$row["dokter"] .'</td>
						<td>'.$row["tanggal_daftar"] .'</td>
					</tr>
				';
			}

$content .= '
			</table>
		</div>

	</page>
';

require_once '../html2pdf/html2pdf.class.php';
$pdf = new HTML2PDF('p','A4','en');
$pdf->WriteHTML($content);
$pdf->Output('DataPasTerdaftar.pdf', 'D');
// $pdf->Output('DataDokter.pdf');
?>

<?php
include "koneksi/koneksi_pemeliharaan.php";
$db=new koneksi();
$db->koneksi_db();
	
include "class_pdf_pemeliharaan.php";
$pdf_pemeliharaan = new pdf_pemeliharaan();

if ($_GET['laporan']=='tampil')
{
	$tampil = $pdf_pemeliharaan->tampil($_GET['id_lingkup']);
	$banyak_data = $pdf_pemeliharaan->banyak_tampil($_GET['id_lingkup']);
	if ($banyak_data != 0)
	{
	?>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Inspektor</th>
			<th>Tanggal Inspeksi</th>
		<?php
		if ($_GET['id_lingkup']== 3)
		{
			?>
			<th>Lokasi</th>
			<?php
		}
		?>
			<th>Aksi</th>
		</tr>
		<?php
		$no = 1;
		if ($_GET['id_lingkup'] == 3)
		{
			foreach ($tampil as $data)
			{
				echo "
				<tr>
					<td>$no</td>
					<td>$data[USER]</td>
					<td>$data[tgl_inspeksi]</td>
					<td>$data[nama_lokasi]</td>
					<td><a href='?laporan=detail&user=$data[id_user]&tgl=$data[tgl_inspeksi]&id_lingkup=$data[id_lingkup]&lokasi=$data[id_lokasi]'>Detail</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='?menu=apd&user=$data[id_user]&tgl=$data[tgl_inspeksi]&id_lingkup=$data[id_lingkup]&'>Print APD</a></td>
				</tr>";
				$no++;
			}
		}
		else 
		{
			foreach ($tampil as $data)
			{
				echo "
				<tr>
					<td>$no</td>
					<td>$data[USER]</td>
					<td>$data[tgl_inspeksi]</td>
					<td><a href='?laporan=detail&user=$data[id_user]&tgl=$data[tgl_inspeksi]&id_lingkup=$data[id_lingkup]'>Detail</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='?menu=apd&user=$data[id_user]&tgl=$data[tgl_inspeksi]&id_lingkup=$data[id_lingkup]'>Print APD</a></td>
				</tr>";
				$no++;
			}
		}
		?>
	</table>
	<?php
	}
	else
	{
		echo "Data Kosong";
	}
}

else if ($_GET['laporan']=='detail')
{
	$tampil = $pdf_pemeliharaan->objek($_GET['user'],$_GET['tgl'],$_GET['id_lingkup']);
	$banyak_data = $pdf_pemeliharaan->banyak_objek($_GET['user'],$_GET['tgl'],$_GET['id_lingkup']);
	if ($banyak_data != 0)
	{
	$no = 1;
	?>
	<table border='1'>
		<tr>
			<th>No</th>
			<th>Objek</th>
			<th>Aksi</th>
		</tr>
		<?php
		if ($_GET['id_lingkup']==3)
		{
			foreach ($tampil as $data)
			{
				echo "
				<tr>
					<td>$no</td>
					<td>$data[nama]</td>
					<td><a href='#'>Kelola</a>&nbsp;&nbsp;&nbsp;
					<a href='?menu=detail&user=$_GET[user]&tgl=$_GET[tgl]&objek=$data[id_objek]&id_lingkup=$data[id_lingkup]&lokasi=$_GET[lokasi]'>Print</a></td>
				</tr>";
				$no++;
			}
		}
		else
		{
			foreach ($tampil as $data)
			{
				echo "
				<tr>
					<td>$no</td>
					<td>$data[nama]</td>
					<td><a href='#'>Kelola</a>&nbsp;&nbsp;&nbsp;
					<a href='?menu=detail&user=$_GET[user]&tgl=$_GET[tgl]&objek=$data[id_objek]&id_lingkup=$data[id_lingkup]'>Print</a></td>
				</tr>";
				$no++;
			}
		}
		?>
	</table>
	<?php
	}
	else
	{
		echo "Data Kosong";
	}
}

else if ($_GET['menu']=='apd')
{
	$apd=$pdf_pemeliharaan->apd($_GET[id_lingkup],$_GET[user],$_GET[tgl]);
	?>
	<form method='post' action='convert/preview_pemeliharaan.php'>
	<input type="hidden" name="objek" value="APD">
	<?php
		foreach ($apd as $data)
		{
			?>
			<input type="hidden" name="nama" value="<?php echo $data[nama] ?>">
			<input type="hidden" name="jabatan" value="<?php echo $data[jabatan] ?>">
			<input type="hidden" name="tgl_inspeksi" value="<?php echo $data[tgl_inspeksi] ?>">
			<input type="hidden" name="lingkup" value="<?php echo $data[lingkup] ?>">
			<input type="hidden" name="kelengkapan[]" value="<?php echo $data[kelengkapan] ?>">
			<input type="hidden" name="kriteria[]" value="<?php echo $data[kriteria] ?>">
			<input type="hidden" name="keterangan[]" value="<?php echo $data[catatan] ?>">
			<input type="hidden" name="kategori[]" value="<?php echo $data[kategori] ?>">
			<input type="hidden" name="photo1[]" value="<?php echo $data[foto1] ?>">
			<input type="hidden" name="photo2[]" value="<?php echo $data[foto2] ?>">
			<input type="hidden" name="photo3[]" value="<?php echo $data[foto3] ?>">
			<input type="hidden" name="photo4[]" value="<?php echo $data[foto4] ?>">
			<?php
		}
	?>
		<button type="submit" name="btn_preview">Preview &amp; Download</button>
	</form>
	<?php
}

else if ($_GET['menu']=='detail')
{
	$tindakan=$pdf_pemeliharaan->tindakan($_GET[objek],$_GET[user],$_GET[tgl]);
	$banyak_subobjek_tindakan=$pdf_pemeliharaan->banyak_subobjek_tindakan($_GET[objek],$_GET[user],$_GET[tgl]);
	$indikasi=$pdf_pemeliharaan->indikasi($_GET[objek],$_GET[user],$_GET[tgl]);
	$banyak_subobjek_indikasi=$pdf_pemeliharaan->banyak_subobjek_indikasi($_GET[objek],$_GET[user],$_GET[tgl]);
	$item=$pdf_pemeliharaan->item($_GET[objek],$_GET[user],$_GET[tgl],$_GET[lokasi]);
	$banyak_subobjek_item=$pdf_pemeliharaan->banyak_subobjek_item($_GET[objek],$_GET[user],$_GET[tgl],$_GET[lokasi]);
	
	?>
	<form method='post' action='convert/preview_pemeliharaan.php'>
	<?php
	foreach ($tindakan as $data)
	{
		?>
		<input type="hidden" name="nama" value="<?php echo $data[nama] ?>">
		<input type="hidden" name="jabatan" value="<?php echo $data[jabatan] ?>">
		<input type="hidden" name="tgl_inspeksi" value="<?php echo $data[tgl_inspeksi] ?>">
		<input type="hidden" name="lokasi[]" value="<?php echo $data[lokasi] ?>">
		<input type="hidden" name="objek" value="<?php echo $data[nama_objek] ?>">
		<input type="hidden" name="nama_subobjek_tindakan[]" value="<?php echo $data[nama_subobjek] ?>">
		<input type="hidden" name="tindakan[]" value="<?php echo $data[nama_tindakan] ?>">
		<input type="hidden" name="kriteria_tindakan[]" value="<?php echo $data[kriteria] ?>">
		<input type="hidden" name="keterangan_tindakan[]" value="<?php echo $data[keterangan] ?>">
		<?php
	}
	foreach ($banyak_subobjek_tindakan as $data)
	{
		$banyak_tindakan += 1;
		?>
		<input type="hidden" name="subobjek_tindakan[]" value="<?php echo $data[nama_subobjek] ?>">
		<?php
	}
	?>
	<input type="hidden" name="banyak_subobjek_tindakan" value="<?php echo $banyak_tindakan ?>">
	<?php
	foreach ($indikasi as $data)
	{
		?>
		<input type="hidden" name="nama" value="<?php echo $data[nama] ?>">
		<input type="hidden" name="jabatan" value="<?php echo $data[jabatan] ?>">
		<input type="hidden" name="tgl_inspeksi" value="<?php echo $data[tgl_inspeksi] ?>">
		<input type="hidden" name="lokasi_indikasi[]" value="<?php echo $data[lokasi] ?>">
		<input type="hidden" name="objek" value="<?php echo $data[nama_objek] ?>">
		<input type="hidden" name="nama_subobjek_indikasi[]" value="<?php echo $data[nama_subobjek] ?>">
		<input type="hidden" name="nama_indikasi[]" value="<?php echo $data[nama_indikasi] ?>">
		<input type="hidden" name="km_awal_indikasi[]" value="<?php echo $data[km_awal] ?>">
		<input type="hidden" name="km_akhir_indikasi[]" value="<?php echo $data[km_akhir] ?>">
		<input type="hidden" name="kriteria_indikasi[]" value="<?php echo $data[kriteria] ?>">
		<input type="hidden" name="kk_indikasi[]" value="<?php echo $data[KK] ?>">
		<input type="hidden" name="prioritas_indikasi[]" value="<?php echo $data[prioritas] ?>">
		<input type="hidden" name="rencana_tl_indikasi[]" value="<?php echo $data[rencana_tl] ?>">
		<input type="hidden" name="selesai_tl_indikasi[]" value="<?php echo $data[selesai_tl] ?>">
		<input type="hidden" name="dana_indikasi[]" value="<?php echo $data[dana] ?>">
		<input type="hidden" name="rekanan_indikasi[]" value="<?php echo $data[rekanan] ?>">
		<input type="hidden" name="keterangan[]" value="<?php echo $data[keterangan] ?>">
		<input type="hidden" name="keterangan_perbaikan[]" value="<?php echo $data[catatan_perbaikan] ?>">
		<input type="hidden" name="lajur[]" value="<?php echo $data[lajur] ?>">
		
		<?php
	}
	foreach ($banyak_subobjek_indikasi as $data)
	{
		$banyak_indikasi += 1;
		?>
		<input type="hidden" name="subobjek_indikasi[]" value="<?php echo $data[nama_subobjek] ?>">
		<input type="hidden" name="photo1[]" value="<?php echo $data[foto1] ?>">
		<input type="hidden" name="photo2[]" value="<?php echo $data[foto2] ?>">
		<input type="hidden" name="photo3[]" value="<?php echo $data[foto3] ?>">
		<input type="hidden" name="photo4[]" value="<?php echo $data[foto4] ?>">
		<input type="hidden" name="photo0[]" value="<?php echo $data[foto0] ?>">
		<input type="hidden" name="photo50[]" value="<?php echo $data[foto50] ?>">
		<input type="hidden" name="photo100[]" value="<?php echo $data[foto100] ?>">
		<?php
	}
	?>
	<input type="hidden" name="banyak_subobjek_indikasi" value="<?php echo $banyak_indikasi ?>">
	<?php
	foreach ($item as $data)
	{
		?>
		<input type="hidden" name="nama" value="<?php echo $data[nama] ?>">
		<input type="hidden" name="jabatan" value="<?php echo $data[jabatan] ?>">
		<input type="hidden" name="tgl_inspeksi" value="<?php echo $data[tgl_inspeksi] ?>">
		<input type="hidden" name="lokasi" value="<?php echo $data[lokasi] ?>">
		<input type="hidden" name="objek" value="<?php echo $data[nama_objek] ?>">
		<input type="hidden" name="nama_subobjek_item[]" value="<?php echo $data[nama_subobjek] ?>">
		<input type="hidden" name="nama_bagian_item[]" value="<?php echo $data[bagian] ?>">
		<input type="hidden" name="item[]" value="<?php echo $data[nama_item] ?>">
		<input type="hidden" name="kriteria_item[]" value="<?php echo $data[kriteria] ?>">
		<input type="hidden" name="rencana_tl_item[]" value="<?php echo $data[rencana_tl] ?>">
		<input type="hidden" name="selesai_tl_item[]" value="<?php echo $data[selesai_tl] ?>">
		<input type="hidden" name="dana_item[]" value="<?php echo $data[dana] ?>">
		<input type="hidden" name="keterangan_item[]" value="<?php echo $data[keterangan] ?>">
		<input type="hidden" name="rekanan_item[]" value="<?php echo $data[rekanan] ?>">
		<input type="hidden" name="keterangan_perbaikan[]" value="<?php echo $data[catatan_perbaikan] ?>">
		<?php
	}
	foreach ($banyak_subobjek_item as $data)
	{
		?>
		<input type="hidden" name="subobjek_item[]" value="<?php echo $data[nama_subobjek] ?>">
		<input type="hidden" name="bagian_subobjek_item[]" value="<?php echo $data[bagian] ?>">
		<input type="hidden" name="photo1[]" value="<?php echo $data[foto1] ?>">
		<input type="hidden" name="photo2[]" value="<?php echo $data[foto2] ?>">
		<input type="hidden" name="photo3[]" value="<?php echo $data[foto3] ?>">
		<input type="hidden" name="photo4[]" value="<?php echo $data[foto4] ?>">
		<input type="hidden" name="photo0[]" value="<?php echo $data[foto0] ?>">
		<input type="hidden" name="photo50[]" value="<?php echo $data[foto50] ?>">
		<input type="hidden" name="photo100[]" value="<?php echo $data[foto100] ?>">
		<?php
	}
	
	if ($_GET['objek']=="O_07")
	{
		?>
		Jabatan :
		<input type="text" name="jabatan_mengetahui" required>
		Mengetahui :
		<input type="text" name="mengetahui" required>
		<?php
	}
	?>
	<button type="submit" name="btn_preview">Preview &amp; Download</button>
	</form>
	<?php
}

else if ($_GET['laporan']=='penilaian')
{
	$penilaian = $pdf_pemeliharaan->penilaian($_GET['nama'],$_GET['tgl_awal'],$_GET['tgl_akhir']);
	?>
	Tanggal Awal :<input type='date' name='tgl_awal'>
	Tanggal Akhir :<input type='date' name='tgl_akhir'>
	Cari :<input type='text' name='nama' placeholder="nama">
	<table border='1'>
	<tr>
		<td>NO</td>
		<td>Nama Inspektor</td>
		<td>Banyak Inspeksi</td>
		<td>Detail</td>
	</tr>
	<?php
	$no=1;
	foreach ($penilaian as $data)
	{
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $data['nama'] ?></td>
			<td><?php echo $data['banyak_inspeksi'] ?></td>
			<td><a href="?laporan=detail_penilaian&user=<?php echo $data['id_user'] ?>&tgl_awal=<?php echo $_GET['tgl_awal'] ?>&tgl_akhir=<?php echo $_GET['tgl_akhir'] ?>">Detail</a></td>
		</tr>
		<?php
	}
	?>
	</table>
	<?php
}

else if ($_GET['laporan']=='detail_penilaian')
{
	$detail_penilaian = $pdf_pemeliharaan->detail_penilaian($_GET['user'],$_GET['tgl_awal'],$_GET['tgl_akhir']);
	?>
	<form method='post' action='convert/preview_pemeliharaan.php'>
		<input type="hidden" name="objek" value="penilaian">
		<?php
		foreach ($detail_penilaian as $data)
		{
			?>
			<input type="hidden" name="nama" value="<?php echo $data['nama'] ?>">
			<input type="hidden" name="npp" value="<?php echo $data['id_user'] ?>">
			<input type="hidden" name="tgl_awal" value="<?php echo $_GET['tgl_awal'] ?>">
			<input type="hidden" name="tgl_akhir" value="<?php echo $_GET['tgl_akhir'] ?>">
			<input type="hidden" name="foto" value="<?php echo $data['foto'] ?>">
			<input type="hidden" name="tgl_inspeksi[]" value="<?php echo $data['tgl_inspeksi'] ?>">
			<input type="hidden" name="nama_objek[]" value="<?php echo $data['nama_objek'] ?>">
			<input type="hidden" name="banyak_inspeksi[]" value="<?php echo $data['banyak_inspeksi'] ?>">
			<?php
		}
		?>
		<button type="submit" name="btn_preview">Preview &amp; Download</button>
	</form>
	<?php
}

else
{
$lingkup=$pdf_pemeliharaan->lingkup();
?>
<html>
<body>
	<table border='1'>
		<?php
		foreach ($lingkup as $data)
		{
		?>
		<tr>
			<td><a href="?laporan=tampil&id_lingkup=<?php echo $data['id_lingkup'] ?>"><?php echo $data['nama'] ?></a></td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td><a href="?laporan=penilaian&tgl_awal=0000-00-00&tgl_akhir=0000-00-00&nama=-">Penliaian</a></td>
		</tr>
	</table>
</body>
</html>
<?php
}
?>
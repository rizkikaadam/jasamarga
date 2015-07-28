<?php
$apd=$pdf_pemeliharaan->apd($_GET[vid],$_GET[user],$_GET[tgl]);
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
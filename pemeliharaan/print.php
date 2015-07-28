<?php
	$tindakan=$pdf_pemeliharaan->tindakan($_GET[objek],$_GET[user],$_GET[tgl]);
	$banyak_subobjek_tindakan=$pdf_pemeliharaan->banyak_subobjek_tindakan($_GET[objek],$_GET[user],$_GET[tgl]);
	$indikasi=$pdf_pemeliharaan->indikasi($_GET[objek],$_GET[user],$_GET[tgl]);
	$banyak_subobjek_indikasi=$pdf_pemeliharaan->banyak_subobjek_indikasi($_GET[objek],$_GET[user],$_GET[tgl]);
	$item=$pdf_pemeliharaan->item($_GET[objek],$_GET[user],$_GET[tgl],$_GET[lokasi]);
	$banyak_subobjek_item=$pdf_pemeliharaan->banyak_subobjek_item($_GET[objek],$_GET[user],$_GET[tgl],$_GET[lokasi]);
	
	?>
	<div id="content">
            <div class="inner">
                <br/>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<div class="panel-heading">
                            <i class="icon-table"></i> Print
                    </div>
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
	</div>
				</div>
				</div>
			</div>
		</div>
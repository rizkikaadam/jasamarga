<?php
	$tampil_kelola_indikasi=$tampil_suep->kelola_indikasi($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir,$id);
	foreach ($tampil_kelola_indikasi as $data_kelola_indikasi)
	{
	}
?>
	<div class="form-group">
		<label>Selesai TL</label>
		<input class="form-control" type="date" name="txt_selesai_tl" value="<?php echo $data_kelola_indikasi[selesai_tl];?>"/>
	</div>
	<div class="form-group">
		<label>Photo 0%</label>
		<input type="file" name="photo0"/>
	</div>
	<div class="form-group">
		<label>Photo 50%</label>
		<input type="file" name="photo50"/>
	</div>
	<div class="form-group">
		<label>Photo 100%</label>
		<input type="file" name="photo100" />
	</div>
	<div class="form-group">
					<label>Catatan</label>
					<textarea class="form-control" rows="3" type="date" name="txt_cat_per"><?php echo $data_kelola_indikasi[catatan_perbaikan];?></textarea>
	</div>
	<input type='text'  name='txt_id_detail_indikasi' value='<?php echo $data_kelola_indikasi[id_detail_indikasi];?>' />
	<input type='text'  name='txt_id_detail' value='<?php echo $data_kelola_indikasi[id_detail];?>' />
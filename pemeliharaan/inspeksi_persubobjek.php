<?php
//edit data
if ($_GET[input]=='input-perbaikan')
{
	$detail->id = $_POST['txt_id_detail_indikasi'];
	$detail->id_detail = $_POST['txt_id_detail'];
	$detail->selesai_tl = $_POST['txt_selesai_tl'];
	$detail->catatan_perbaikan=$_POST['txt_cat_per'];
	//untuk photo0
		$lokasi_file=$_FILES['photo0']['tmp_name'];
		$tipe_file=$_FILES['photo0']['type'];
		$nama_file=$_FILES['photo0']['name'];
		$direktori="popup_image/photo/perbaikan/$nama_file";
		$extensi=pathinfo($direktori,PATHINFO_EXTENSION);
	//untuk photo50
		$lokasi_file50=$_FILES['photo50']['tmp_name'];
		$tipe_file50=$_FILES['photo50']['type'];
		$nama_file50=$_FILES['photo50']['name'];
		$direktori50="popup_image/photo/perbaikan/$nama_file50";
		$extensi50=pathinfo($direktori50,PATHINFO_EXTENSION);
	//untuk photo 100
		$lokasi_file100=$_FILES['photo100']['tmp_name'];
		$tipe_file100=$_FILES['photo100']['type'];
		$nama_file100=$_FILES['photo100']['name'];
		$direktori100="popup_image/photo/perbaikan/$nama_file100";
		$extensi100=pathinfo($direktori100,PATHINFO_EXTENSION);
		(move_uploaded_file($lokasi_file,$direktori));
		(move_uploaded_file($lokasi_file50,$direktori50));
		(move_uploaded_file($lokasi_file100,$direktori100));
	$detail->photo0="$nama_file";
	$detail->photo50="$nama_file50";	
	$detail->photo100="$nama_file100";
	
	$detail->input_perbaikan();
}
else if ($_GET[input]=='input-perbaikan-gedung')
{

	$detail->id = $_POST['txt_id_detail_item'];
	$detail->id_detail = $_POST['txt_id_detail'];
	$detail->selesai_tl = $_POST['txt_selesai_tl'];
	$detail->catatan_perbaikan=$_POST['txt_cat_per'];
	
	//untuk photo0
		$lokasi_file=$_FILES['photo0']['tmp_name'];
		$tipe_file=$_FILES['photo0']['type'];
		$nama_file=$_FILES['photo0']['name'];
		$direktori="popup_image/photo/perbaikan/$nama_file";
		$extensi=pathinfo($direktori,PATHINFO_EXTENSION);
	//untuk photo50
		$lokasi_file50=$_FILES['photo50']['tmp_name'];
		$tipe_file50=$_FILES['photo50']['type'];
		$nama_file50=$_FILES['photo50']['name'];
		$direktori50="popup_image/photo/perbaikan/$nama_file50";
		$extensi50=pathinfo($direktori50,PATHINFO_EXTENSION);
	//untuk photo 100
		$lokasi_file100=$_FILES['photo100']['tmp_name'];
		$tipe_file100=$_FILES['photo100']['type'];
		$nama_file100=$_FILES['photo100']['name'];
		$direktori100="popup_image/photo/perbaikan/$nama_file100";
		$extensi100=pathinfo($direktori100,PATHINFO_EXTENSION);
		(move_uploaded_file($lokasi_file,$direktori));
		(move_uploaded_file($lokasi_file50,$direktori50));
		(move_uploaded_file($lokasi_file100,$direktori100));
	$detail->photo0="$nama_file";
	$detail->photo50="$nama_file50";	
	$detail->photo100="$nama_file100";
	
	$detail->input_perbaikan_gedung();
}
else if (($_GET[subobjek]=='S_031') and ($_GET[input]!='kelola-gardu'))
{
	include "inspeksi_untuk_gedung_gardu_lajur.php";
}
else if(($_GET[subobjek]=='S_031') and ($_GET[input]=='kelola-gardu'))
{
	?>
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Tindak Lanjut</a>
			</li>
			<li><a href="#profile" data-toggle="tab">Perbaikan</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade in active" id="home">
				<p><?php
					//untuk tindak lanjut inspeksi
					//untuk inspeksi gedung
						include "inspeksi_untuk_gedung_gardu.php";	
					?></p>
			</div>
			<div class="tab-pane fade" id="profile">
				<p><?php
					//untuk perbaikan inspeksi
					//untuk perbaikan gedung
							include "perbaikan_gedung_gardu.php";
					?></p>
			</div>
		</div>
	</div>
<?php
}
else if(($_GET[subobjek]=='S_031') and ($_GET[input]=='kelola-lajur'))
{
	?>
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Tindak Lanjut</a>
			</li>
			<li><a href="#profile" data-toggle="tab">Perbaikan</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade in active" id="home">
				<p><?php
					//untuk tindak lanjut inspeksi
					//untuk inspeksi gedung
						include "inspeksi_untuk_gedung_lajur.php";	
					?></p>
			</div>
			<div class="tab-pane fade" id="profile">
				<p><?php
					//untuk perbaikan inspeksi
					//untuk perbaikan gedung
							include "perbaikan_gedung_lajur.php";
					?></p>
			</div>
		</div>
	</div>
<?php
}
else if ($_GET[input]=='kelola')
{
	$objek=$_GET['objek'];
	$user=$_GET['user'];
	$lokasi=$_GET['lokasi'];
	$tgl=$_GET['tgl'];
	$subobjek=$_GET['subobjek'];
	$awal=$_GET['awal'];
	$akhir=$_GET['akhir'];
?>
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Tindak Lanjut</a>
			</li>
			<li><a href="#profile" data-toggle="tab">Perbaikan</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade in active" id="home">
				<p><?php
					//untuk tindak lanjut inspeksi
						if($objek!='O_07') //untuk jalaan
						{
							include "inspeksi_jalan_aspal.php";													
						}
						else //untuk inspeksi gedung
						{
								include "inspeksi_untuk_gedung.php";	
						}
					?></p>
			</div>
			<div class="tab-pane fade" id="profile">
				<p><?php
					//untuk perbaikan inspeksi
						if($objek!='O_07')
						{
							include "perbaikan.php";
						}
						else //untuk perbaikan gedung
						{
							include "perbaikan_gedung.php";												
						}
					?></p>
			</div>
		</div>
	</div>
<?php
} //akhir else tabs
else
{
?>	
<!--PAGE CONTENT -->
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama SubObjek 2</th>
					<th>Lokasi</th>
					<th>Lajur</th>
					<th>Detail</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$hid=$_GET['hid'];
				$vid=$_GET['vid'];
				$idtk=$_GET['idtk'];
				$id_objek=$_GET['objek'];
				$id_lokasi=$_GET['lokasi'];
				$awal=$_GET['awal'];
				$akhir=$_GET['akhir'];
				$tampil_subobjek=$tampil_suep->tampil_subobjek($id_objek,$id_lokasi,$awal,$akhir);
				foreach ($tampil_subobjek as $data)
				{
					echo "
					<tr class='odd gradeX'>
						<td>$no</td>
						<td>$data[nama_subobjek]</td>";
						if(($data[awal]!="-") && ($data[akhir]!="-") && ($data[lokasi]!="-"))
						{
							echo "<td>$data[lokasi] , KM  Awal : $data[awal] - KM Akhir : $data[akhir] </td>";
						}
						else if(($data[awal]!="-") && ($data[akhir]!="-") && ($data[lokasi]=="-"))
						{
							echo "<td>KM  Awal : $data[awal] - KM Akhir : $data[akhir] </td>";
						}
						else
						{
						    echo "<td>$data[lokasi]</td>";
						}
					echo"	<td>$data[lajur]</td>
						<td>
							<a class='btn btn-danger btn-sm btn-flat' href='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&input=kelola&user=$data[id_user]&objek=$data[id_objek]&lokasi=$data[id_lokasi]&tgl=$data[tgl_inspeksi]&subobjek=$data[id_subobjek]&awal=$data[awal]&akhir=$data[akhir]'>
							detail
							</a>
						</td>
					</tr>";
					$no++;
					//<a href='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&user=$data[id_user]&objek=$data[id_objek]&lokasi=$data[id_lokasi]&tgl=$data[tgl_inspeksi]&subobjek=$data[id_subobjek]&awal=$data[awal]&akhir=$data[akhir]#popup'>
				}
				?>
			</tbody>
		</table>
		
	</div>
<?php
} //akhir dari else 
?>
<!-- popup untuk perbaikan-->
	<div id="popup"> 
		<div class="window">
				<div class="col-lg-12">
				<?php 
					$hid=$_GET['hid'];
					$vid=$_GET['vid'];
					$id=$_GET['id'];
					$nama=$_GET['nama'];
					$objek=$_GET['objek'];
					$user=$_GET['user'];
					$lokasi=$_GET['lokasi'];
					$tgl=$_GET['tgl'];
					$subobjek=$_GET['subobjek'];
					$awal=$_GET['awal'];
					$akhir=$_GET['akhir'];
					echo "<a href='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&input=kelola&user=$user&objek=$objek&lokasi=$lokasi&tgl=$tgl&subobjek=$subobjek&awal=$awal&akhir=$akhir#profile'><button type='button' class='close' >&times;</button></a>";
					?>
					<h4>Input Hasil Perbaikan </h4>
						<?php 
							if($objek!="O_07")
							{
								echo "<form enctype='multipart/form-data' method='post' action='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&user=$user&objek=$objek&lokasi=$lokasi&tgl=$tgl&subobjek=$subobjek&input=input-perbaikan&awal=$data[awal]&akhir=$data[akhir]'>";
								include "input_perbaikan.php";
							}
							else //kalau gedung
							{	
								echo "<form enctype='multipart/form-data' method='post' action='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&user=$user&objek=$objek&lokasi=$lokasi&tgl=$tgl&subobjek=$subobjek&input=input-perbaikan-gedung&awal=$data[awal]&akhir=$data[akhir]'>";
								include "input_perbaikan_gedung.php";
							}
						?>
							<div>
								<button type="submit" class="btn btn-primary">Simpan</button>
								<button type="reset" class="btn btn-danger">Batal</button>
							</div>
						</form>
					<br/>
                </div>
		</div>
	</div>
	<!--END popup -->
          <!--END PAGE CONTENT -->
     <!--END MAIN WRAPPER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
       <script src="assets/js/formsInit.js"></script>
	     
        <script>
            $(function () { formInit(); });
        </script>
    <!-- END GLOBAL SCRIPTS -->   
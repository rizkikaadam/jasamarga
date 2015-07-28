		 <!--PAGE CONTENT --> 
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <header>
                <h5>Gardu</h5>
            </header>
            <!--untuk gardu-->
            <div class="body">
			    <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Gardu</th>
								<th>Detail</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
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
							$tampil_gardu=$tampil_suep->tampil_gardu($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
							foreach ($tampil_gardu as $data)
							{
								echo "
								<tr class='odd gradeX'>
									<td>$no</td>
									<td>$data[nogardu]</td>
									<td>
										<a class='btn btn-danger btn-sm btn-flat' href='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&input=kelola-gardu&user=$data[id_user]&objek=$data[id_objek]&lokasi=$data[id_lokasi]&tgl=$data[tgl_inspeksi]&subobjek=$data[id_subobjek]&awal=$data[km_awal]&akhir=$data[km_akhir]&gardu=$data[nogardu]'>
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
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="box">
            <header>
                <h5>Lajur</h5>
            </header>
            <div class="body">
            <!--untuk lajur-->
            	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>No</th>
					<th>Lajur</th>
					<th>Detail</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
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
				$tampil_lajur=$tampil_suep->tampil_lajur($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
				foreach ($tampil_lajur as $data)
				{
					echo "
					<tr class='odd gradeX'>
						<td>$no</td>
						<td>$data[lajur]</td>
						<td>
							<a class='btn btn-danger btn-sm btn-flat' href='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&input=kelola-lajur&user=$data[id_user]&objek=$data[id_objek]&lokasi=$data[id_lokasi]&tgl=$data[tgl_inspeksi]&subobjek=$data[id_subobjek]&awal=$data[awal]&akhir=$data[akhir]'>
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
            </div>
        </div>
    </div>
</div>
     
 
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
        <script>
            $(function () { formInit(); });
        </script>
    <!-- END GLOBAL SCRIPTS -->   
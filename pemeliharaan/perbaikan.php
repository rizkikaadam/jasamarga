		<!--PAGE CONTENT --> 
                                    <div >
									<?php
									echo"
									<form method='post' action='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&user=$user&objek=$objek&lokasi=$lokasi&tgl=$tgl&subobjek=$subobjek&menu=detail-inspeksi&input=input-kelola&awal=$data[awal]&akhir=$data[akhir]#popup'>
									";
									?>
                                        <div class="panel-body">
											<div class="table-responsive">
													<table class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th>No</th>
																<th>Indikasi</th>
																<th>Recana_tl</th>
																<th>Selesai_tl</th>
																<th>Rekanan</th>
																<th>Photo</th>
																<th>Catatan</th>
																<?php
																if(($_SESSION['jabatan']=="ME") or ($_SESSION['jabatan']=="admin"))
																{
																?>
																	<th>kelola</th>
																<?php
																}
																?>
															</tr>
														</thead>
														<?php
														$hid=$_GET['hid'];
														$vid=$_GET['vid'];
														$objek=$_GET['objek'];
														$user=$_GET['user'];
														$lokasi=$_GET['lokasi'];
														$tgl=$_GET['tgl'];
														$subobjek=$_GET['subobjek'];
														$awal=$_GET['awal'];
														$akhir=$_GET['akhir'];
														$no=1;
														$tampil_subobjek_indikasi=$tampil_suep->subobjek_indikasi($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
														foreach ($tampil_subobjek_indikasi as $data)
														{
														echo"
														<tbody>
															<tr>
																<td>$no</td>
																<td><h5>$data[nama_indikasi]</h5></td>
																<td>
																			$data[rencana_tl]
																</td>
																<td>
																			$data[selesai_tl]
																</td>
																<td>
																			$data[rekanan]
																</td>
																<td>
																	Foto 0 % = $data[foto0]<br/>
																	Foto 50 %  = $data[foto50] <br/>
																	Foto 100 % = $data[foto100] <br/>
																</td>
																<td>
																	$data[catatan_perbaikan]
																</td>";
																if(($_SESSION['jabatan']=="ME") or ($_SESSION['jabatan']=="admin"))
																{
																echo"<td>
																	<a href='laporan.php?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&user=$user&objek=$objek&lokasi=$lokasi&tgl=$tgl&subobjek=$subobjek&awal=$awal&akhir=$akhir&id=$data[id_detail_indikasi]#popup'>Kelola</a>
																</td>";
																}
															echo"</tr>
														</tbody>";
														echo"<input type='hidden'  name='txt_id_detail_indikasi' value='$data[id_detail_indikasi]' />";
														$rekanan=$data[rekanan];
														$no++;
														}
														//<a href='#popup'>Kelola</a>
													?>
													</table>
												</div>
                                        </div>
									</form>
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
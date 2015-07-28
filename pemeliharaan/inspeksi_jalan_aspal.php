		<!--PAGE CONTENT --> 
                <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Data Tindakan</h4>
                                    </div>
                                    <div >
                                        <div class="panel-body">
                                            <?php
											$objek=$_GET['objek'];
											$user=$_GET['user'];
											$lokasi=$_GET['lokasi'];
											$tgl=$_GET['tgl'];
											$subobjek=$_GET['subobjek'];
											$awal=$_GET['awal'];
											$akhir=$_GET['akhir'];
											//untuk thead indikasi
											?>
													<table class="table table-striped table-bordered table-hover">
														<thead>
														<?php
															$tampil_subobjek_tindakan=$tampil_suep->subobjek_tindakan($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
															foreach ($tampil_subobjek_tindakan as $data)
															{
															}
															if(($data[kriteria]=="SB") or ($data[kriteria]=="SL"))
																{
																?>
																<tr>
																	<th>Tindakan</th>
																	<th>SB</th>
																	<th>SL</th>
																</tr>
																<?php
																}
																else
																{
																?>
																<tr>
																	<th>Tindakan</th>
																	<th><i class='icon-check'></i></th>
																</tr>
																<?php
																}
																
																?>
														</thead>
														<tbody>
														<?php
															$tampil_subobjek_tindakan=$tampil_suep->subobjek_tindakan($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
															foreach ($tampil_subobjek_tindakan as $data_tindakan)
															{
																if($data_tindakan[kriteria]=="SB") 
																{
																?>
																<tr>
																	<td><?php echo $data_tindakan[nama_tindakan] ;?></td>
																	<td><i class='icon-check'></i></td>
																	<td>-</td>
																</tr>
																<?php
																}
																else if($data_tindakan[kriteria]=="SL") 
																{
																?>
																<tr>
																	<td><?php echo $data_tindakan[nama_tindakan] ;?></td>
																	<td></td>
																	<td><i class='icon-check'></i></td>
																</tr>
																<?php
																}
																else
																{
																?>
																<tr>
																	<td><?php echo $data_tindakan[nama_tindakan] ;?></td>
																	<td><i class='icon-check'></i></td>
																</tr>
																<?php
																}
																?>
															<?php
															}
														?>
														</tbody>
													</table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Data Indikasi</h4>
                                    </div>
                                    <div >
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-hover">
														<thead>
														<?php
															$tampil_subobjek_indikasi=$tampil_suep->subobjek_indikasi($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
															foreach ($tampil_subobjek_indikasi as $data)
															{
															}
																if($data['KK']!="-")
																{?>
																<tr>
																	<th>Indikasi</th>
																	<th>SB</th>
																	<th>SL</th>
																	<th>KK</th>
																</tr>	
																<?php
																}
																else
																{?>
																	<tr>
																		<th>Indikasi</th>
																		<th>SB</th>
																		<th>SL</th>
																	</tr>
																<?php 
																}
															?>
														</thead>
														<tbody>
														<?php
														$no=1;
															$tampil_subobjek_indikasi=$tampil_suep->subobjek_indikasi($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
															foreach ($tampil_subobjek_indikasi as $data_indikasi)
															{
																echo "<tr>
																	<td>$data_indikasi[nama_indikasi]</td>";
																		if($data_indikasi[KK]!="-")
																		{
																			if($data_indikasi[kriteria]=="SB")
																			{											
																				echo"
																				<td><i class='icon-check'></i></td>
																				<td>-</td>
																				<td>$data_indikasi[KK]</td>";
																			}
																			else 
																			{
																				echo"
																				<td>-</td>
																				<td><i class='icon-check'></i></td>
																				<td>$data_indikasi[KK]</td>";
																			}
																		}
																		else
																		{
																			if($data_indikasi[kriteria]=="SB")
																			{											
																				echo"
																				<td ><i class='icon-check'></i></td>
																				<td >-</td>";
																			}
																			else 
																			{
																				echo"
																				<td >-</td>
																				<td ><i class='icon-check'></i></td>";
																			}
																		}
																echo "</tr>";
															}
														?>
														</tbody>
													</table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Kelola</h4>
                                    </div>
                                    <div >
									<form method='post' action='laporan.php?pilihan=Laporan&menu=input-kelola'>
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
															</tr>
														</thead>
														<?php
														$no=1;
														$tampil_subobjek_indikasi=$tampil_suep->subobjek_indikasi($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
														foreach ($tampil_subobjek_indikasi as $data)
														{
														if(($_SESSION['jabatan']=="ME") or ($_SESSION['jabatan']=="admin"))
														{
														echo"
															<tbody>
																<tr>
																	<td>$no</td>
																	<td><h5>$data[nama_indikasi]</h5></td>
																	<td>
																				<input type='date' name='txt_rencana_tl' value='$data[rencana_tl]'/>
																	</td>
																	<td>
																				<input type='date' name='txt_selesai_tl' value='$data[selesai_tl]'/>
																	</td>
																	<td>
																				<input type='text' name='txt_rekanan' value='$data[rekanan]'/>
																	</td>
																</tr>
															</tbody>";
														}
														else
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
																</tr>
															</tbody>";
														}
														echo"<input type='text'  name='txt_id_detail_indikasi' value='$data[id_detail_indikasi]' />";
														$rekanan=$data[rekanan];
														$no++;
														
														}
													?>
													</table>
												</div>
												<div class="row">
												<div class="col-lg-3">
												<?php
												if(($_SESSION['jabatan']=="ME") or ($_SESSION['jabatan']=="admin"))
													{
												?>
														<button type="submit" class="btn btn-default btn-flat">Simpan</button>
												<?php
													}
												?>
														</div>
												</div>
                                        </div>
									</form>
                                    </div>
                                </div>
								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Photo
                                        </h4>
                                    </div>
                                    <div>
										<div class="panel-heading">
												<center>
													<div class="panel-body">
													<?php
														$tampil_subobjek_indikasi=$tampil_suep->subobjek_indikasi($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir);
														foreach ($tampil_subobjek_indikasi as $data)
														{
														}
													?>
															<img src="popup_image/photo/inspeksi/<?php echo $data[foto1];?>" alt="" class="photo_inspeksi"/>
															<img src="popup_image/photo/inspeksi/<?php echo $data[foto2];?>" alt="" class="photo_inspeksi"/>
															<img src="popup_image/photo/inspeksi/<?php echo $data[foto3];?>" alt="" class="photo_inspeksi"/>
															<img src="popup_image/photo/inspeksi/<?php echo $data[foto4];?>" alt="" class="photo_inspeksi"/>
													<?php
														
													?>
													</div>
												</center>
										</div>
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
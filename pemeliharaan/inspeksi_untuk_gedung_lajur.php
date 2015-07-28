		 <!--PAGE CONTENT --> 
                <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Data Tindakan
                                        </h4>
                                    </div>
                                    <div >
                                        <div class="panel-body">
                                            <?php
											$objek=$_GET['objek'];
											$user=$_GET['user'];
											$lokasi=$_GET['lokasi'];
											$tgl=$_GET['tgl'];
											$subobjek=$_GET['subobjek'];
											$lajur=$_GET['lajur'];
											$awal=$_GET['awal'];
											$akhir=$_GET['akhir'];
											//untuk thead indikasi
											?>
													<table class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th>Item</th>
																<th>BAIK</th>
																<th>RUSAK</th>
																<th>TIDAK ADA</th>
															</tr>
														</thead>
														<tbody>
														<?php
															$gedung_item_lajur=$tampil_suep->item_lajur($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir,$lajur);
															foreach ($gedung_item_gardu as $data2)
															{
																if($data2[kriteria]=="V") 
																{
																?>
																<tr>
																	<td><?php echo $data2[nama_item] ;?></td>
																	<td><i class='icon-check'></i></td>
																	<td>-</td>
																	<td>-</td>
																</tr>
																<?php
																}
																else if($data2[kriteria]=="X") 
																{
																?>
																<tr>
																	<td><?php echo $data2[nama_item] ;?></td>
																	<td>-</td>
																	<td><i class='icon-check'></i></td>
																	<td>-</td>
																</tr>
																<?php
																}
																else
																{
																?>
																<tr>
																	<td><?php echo $data2[nama_item] ;?></td>
																	<td>-</td>
																	<td>-</td>
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
                                        <h4 class="panel-title">Kelola
                                        </h4>
                                    </div>
                                    <div >
									<form method="post" action="laporan.php?pilihan=Laporan&hid=2&vid=1&menu=input-kelola-item">
                                        <div class="panel-body">
											<div class="table-responsive">
													<table class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th>No</th>
																<th>Item</th>
																<th>Recana_tl</th>
																<th>Selesai_tl</th>
																<th>Rekanan</th>
															</tr>
														</thead>
														<?php
														$no=1;
														$gedung_item_lajur=$tampil_suep->item_lajur($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir,$lajur);
														foreach ($gedung_item_gardu as $data)
														{
														echo"
														<tbody>
															<tr>
																<td>$no</td>
																<td><h5>$data[nama_item]</h5></td>
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
														echo"<input type='text'  name='txt_id_detail_item' value='$data[id_detail_item]' />";
														$rekanan=$data[rekanan];
														$no++;
														}
													?>
													</table>
												</div>
												<div class="row">
												<div class="col-lg-3">
														<a class="btn btn-default btn-flat"><button type="submit">Simpan</button></a>
														</div>
												</div>
                                        </div>
									</form>
                                    </div>
                                </div>
								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Photo
                                        </h4>
                                    </div>
                                    <div>
										<div class="panel-heading">
												<center>
													<div class="panel-body">
													<?php
														$gedung_item_lajur=$tampil_suep->item_lajur($objek,$user,$tgl,$lokasi,$subobjek,$awal,$akhir,$lajur);
														foreach ($gedung_item_gardu as $data)
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
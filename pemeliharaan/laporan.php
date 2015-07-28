<?php
include "header.php";

//edit item
if ($_GET[menu]=='input-kelola')
{
	//$rowCount = count($_POST["txt_id_detail_indikasi"]);
	//for($i=0;$i<$rowCount;$i++) {
	$detail->id=$_POST['txt_id_detail_indikasi'];
	$detail->selesai_tl=$_POST['txt_selesai_tl'];
	$detail->rencana_tl=$_POST['txt_rencana_tl'];
	$detail->rekanan=$_POST['txt_rekanan'];
	$detail->edit_indikasi();
}
else if ($_GET[menu]=='input-kelola-item')
{
	//$rowCount = count($_POST["txt_id_detail_indikasi"]);
	//for($i=0;$i<$rowCount;$i++) {
	$detail->id = $_POST['txt_id_detail_item'];
	$detail->selesai_tl = $_POST['txt_selesai_tl'];
	$detail->rencana_tl=$_POST['txt_rencana_tl'];
	$detail->rekanan=$_POST['txt_rekanan'];
	$detail->edit_item();
}
//cetak inspeksi
else if($_GET[menu]=="print")
{
	$user=$_GET['user'];
		$lokasi=$_GET['lokasi'];
		$tgl=$_GET['tgl'];
		$hid=$_GET['hid'];
		$vid=$_GET['vid'];
		$objek=$_GET['objek'];
		$idtk=$_GET['idtk'];
		include "print.php";
}
//detail cetak apd
else if($_GET[menu]=='cetak-apd')
{

		$user=$_GET['user'];
		$lokasi=$_GET['lokasi'];
		$tgl=$_GET['tgl'];
		$hid=$_GET['hid'];
		$vid=$_GET['vid'];
		$idtk=$_GET['idtk'];
		$apd=$pdf_pemeliharaan->apd($vid,$user,$tgl);
?>
	<!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <br/>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<div class="panel-heading">
                            <i class="icon-table"></i> Kelengkapan APD
                        </div>
                        <div class="panel-body">
						<center>
						<h2>Data Kelengkapan APD</h2>
						<hr/>
						</center>
						<button class="btn btn-success btn-xs" style="float:right;" data-toggle="modal" data-target="#print-apd">
												Klik untuk print
											</button>
						
                            <div class="row">
								<div class="col-lg-4">
									<div class="panel panel-default">
										<div class="panel-heading">
											<i class="icon-tasks"></i>  
										</div>
										<div class="panel-body">
											<p>
											<?php
											$tampil_inspektor_apd=$tampil_suep->tampil_inspektor_apd($vid,$idtk);
											foreach ($tampil_inspektor_apd as $data)
											{
											?>
												<table>
													<tr>
														<td><i class="icon-user"></i> Nama</td>
														<td>&nbsp :</td>
														<td><?php echo $data[nama] ;?></td>
													</tr>
													<tr>
														<td><i class="icon-calendar"></i> Tanggal</td>
														<td> &nbsp :</td>
														<td><?php echo $data[tgl_inspeksi] ;?></td>
													</tr>
													<!--<tr>
														<td><i class="icon-location-arrow"></i> Lokasi</td>
														<td> &nbsp :</td>
														<td></td>
													</tr>-->
												</table>
											<?php
											}
											?>											
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											<i class="icon-wrench"></i> Perlengkapan APD
										</div>
										<div class="panel-body">
											<p><div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
									<?php
									$no=0;
									foreach ($apd as $data)
									{
										if($data[kategori]=="APD")
										{
											$no++;
												echo"
												<tr>
													<td>$no;</td>
													<td>$data[kelengkapan]</td>
													<td><i class='icon-check'></i></td>
												</tr>";
										}
									}
									
										if($no==0)
										{
											echo "
											<div class='alert alert-info'>
												Tidak ada Perlengkapan APD yang digunakan. 
											</div>";
										}
									?>
                                    </tbody>
                                </table>
                            </div>
							</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											<i class="icon-wrench"></i> Alat Bantu
										</div>
										<div class="panel-body">
											<p>
												<div class="table-responsive">
													<table class="table table-striped">
														<tbody>
															<?php
																$no=0;
																foreach ($apd as $data)
																{
																	if($data[kategori]!="APD")
																	{
																		$no++;
																			echo"
																			<tr>
																				<td>$no;</td>
																				<td>$data[kelengkapan]</td>
																				<td><i class='icon-check'></i></td>
																			</tr>";
																	}
																}
																if($no==0)
																{
																	echo "
																	<div class='alert alert-info'>
																		Tidak ada alat bantu yang digunakan. 
																	</div>";
																}
															?>
														</tbody>
													</table>
												</div>
							</p>
										</div>
									</div>
								</div>
							</div> 
							<div class="row">
								<div class="col-lg-12">
									<div class="well">
										<h4>Catatan : </h4>
										<p>
										<?php
											foreach ($tampil_inspektor_apd as $data)
											{
											}
												if($data[catatan]=="")
												{
													echo"
													<div class='alert alert-info'>
														Petugas Tidak menulis catatan
													</div>";
												}
												else 
												{
													echo"$data[catatan]";
												}
											
										?></p>
									</div>
								</div>
							</div>							
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-lg-12">
                        <div class="modal fade" id="print-apd" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H1">Print</h4>
                                        </div>
										<center>
                                            <?php
												include"print-apd.php";
											?>
										</center>
										<br/>										
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>

     <!--END MAIN WRAPPER -->
	 <?php
}
//akhir cetak apd
//detail inspeksi
else if($_GET[menu]=='detail-inspeksi')
{
?>
	<!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <br/>
                <div class="row">
                <div class="col-lg-12">
                  <!--awal untuk persubobjek -->
					<div class="panel panel-default">
						<div class="panel-heading">
                            <i class="icon-table"></i> Tabel Data Laporan
                        </div>
                        <div class="panel-body">
							<center>
							<h2><i class="icon-table"></i> Inspeksi</h2>
							</center>
							<hr/>
							<?php
							$objek=$_GET['objek'];
							$lokasi=$_GET['lokasi'];
							$user=$_GET['user'];
							$tgl=$_GET['tgl'];
							include "inspeksi_persubobjek.php";
							?>
						</div>
					</div>
				  <!--akhir untuk persubobjek -->				  
            </div>
            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>

     <!--END MAIN WRAPPER -->
	 <?php
}
//detail - apd
else if ($_GET[menu]=='detail-apd')
{
		$objek=$_GET['objek'];
		$user=$_GET['user'];
		$lokasi=$_GET['lokasi'];
		$tgl=$_GET['tgl'];
	?>
		<!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <br/>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<div class="panel-heading">
                            <i class="icon-table"></i> Tabel Data Laporan
                        </div>
                        <div class="panel-body">
						<center>
						<h2><i class="icon-table"></i> Data Inspeksi</h2>
						</center>
						<hr/>
                            <div class="col-lg-6">
                                <div class="box">
                                    <header>
                                        <h5>Laporan inspeksi Kondisi Rusak</h5>
                                        <div class="toolbar">
                                            <span class="label label-danger">Kondisi Rusak</span>
                                        </div>
                                    </header>
                                    <div class="body">
                                        <!-- awal tabel filter rusak -->
                                            <div class="table-responsive"><!-- tabel-->
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Laporan Inspeksi edit </th>
                                                            <th>Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $hid=$_GET['hid'];
                                                        $vid=$_GET['vid'];
                                                        $idtk=$_GET['idtk'];
                                                            $tampil_objek=$tampil_suep->tampil_objek_ins($vid,$idtk);
                                                            foreach ($tampil_objek as $data)
                                                            {
                                                                echo "
                                                                <tr class='odd gradeX'>
                                                                    <td>$no</td>
                                                                    <td>$data[objek]</td>
                                                                    <td><a href='?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-inspeksi&user=$data[id_user]&objek=$data[id_objek]&lokasi=$data[lokasi]&tgl=$data[tgl_inspeksi]&awal=$data[awal]&akhir=$data[akhir]' class='btn btn-danger btn-sm btn-flat'>Detail</a>
                                                                    <a href='?pilihan=Laporan&hid=$hid&vid=$vid&menu=print&user=$data[id_user]&objek=$data[id_objek]&lokasi=$data[lokasi]&tgl=$data[tgl_inspeksi]' class='btn btn-success btn-sm btn-flat'>Print</a>

                                                                    </td>
                                                                </tr>";
                                                                $no++;
                                                                //<a data-toggle='modal' data-target='#print' class='btn btn-success btn-sm btn-flat'><i class='icon-print' ></i> Print</a>
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <!-- akhir tabel filter baik -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="box">
                                    <header>
                                        <h5>Laporan Inspeksi kondisi baik</h5>
                                        <div class="toolbar">
                                            <span class="label label-success">Kondisi Baik</span>
                                        </div>
                                    </header>
                                    <div class="body">
                                        tabel filter baik
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
			
			
			</div>
            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>

     <!--END MAIN WRAPPER -->
	
	<?php
}//akhir detail-apd
else if($_GET['vid']!="")
{
$jenis=$_GET['vid'];
$banyak_data = $pdf_pemeliharaan->banyak_tampil($jenis);
	
?>
 <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <br/>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<div class="panel-heading">
                            <i class="icon-table"></i> Tabel Data Laporan
                        </div>
                        <div class="panel-body">
						<center>
						<h2><i class="icon-table"></i> Data APD</h2>
						</center>
						<hr/>
							<?php
							if ($banyak_data == 0)
							{
							?>
								<div class="row">
									<div class="col-lg-12">
										<div class="alert alert-info alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<i class="fa fa-info-circle"></i><strong> Data Tidak Ditemukan</strong>
										</div>
									</div>
								</div>
							<?php
							}
							else
							{
							?>
							<form method="get" >
							<div class="form-group row">
							<div class="col-lg-2">
							<input type="hidden" name="pilihan" value="<?php echo $_GET['pilihan'];?>"/>
							<input type="hidden" name="hid" value="<?php echo $_GET['hid'];?>"/>
							<input type="hidden" name="vid" value="<?php echo $_GET['vid'];?>"/>
							<div class="form-group">
                                            <select class="form-control" name="bulan">
                                                <option>Bulan</option>
                                                <option value='01' >Januari</option>
												<option value='02' >Februari</option>
												<option value='03' >Maret</option>
												<option value='04' >April</option>
												<option value='05' >Mei</option>
												<option value='06' >Juni</option>
												<option value='07' >Juli</option>
												<option value='08' >Agustus</option>
												<option value='09' >September</option>
												<option value='10' >Oktober</option>
												<option value='11' >November</option>
												<option value='12' >Desember</option>
                                            </select>
                                        </div>
							</div>
							<div class="col-lg-3">
											<div class="form-group">
                                            <select class="form-control" style="float:right;" name="tahun">
                                                <?php
												$tampil_tahun = $detail->tampil_tahun($jenis);
												foreach ($tampil_tahun as $data)
												{
													echo "<option value='$data[tahun]'>$data[tahun]</option>";
												}
												?>
                                            </select>
                                        </div>
										
							</div>
							<div class="col-lg-3">
											<div class="form-group">
												<button type="submit" class="btn btn-default btn-grad btn-rect" > <i class="icon-search"></i>Cari</button>
											</div>
							</div>
						</div>
						</form>
						<?php
						$jenis=$_GET['vid'];
						$bulan=$_GET['bulan'];
						$tahun=$_GET['tahun'];
						$hid=$_GET['hid'];
						$vid=$_GET['vid'];
						?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>No</th>
											<th>Tanggal Inspeksi</th>
											<th>Nama Inspektor</th>
											<th>Aksi</th>
										</tr>
                                    </thead>
                                    <tbody>
									   <?php
										$no = 1;
										$tampil_apd_urut=$tampil_suep->tampil_apd_urut($vid,$bulan,$tahun);
										foreach ($tampil_apd_urut as $data)
										{
											echo "
											<tr class='odd gradeX'>
												<td>$no</td>
												<td>$data[tgl_inspeksi]</td>
												<td>$data[nama]</td>
												<td><a href='?pilihan=Laporan&hid=$hid&vid=$vid&menu=detail-apd&user=$data[id_user]&objek=$data[id_objek]&lokasi=$data[id_lokasi]&tgl=$data[tgl_inspeksi]&idtk=$data[id_detail_kel]' class='btn btn-danger btn-sm btn-flat'><i class='icon-th' ></i> Detail</a>
												<a href='?pilihan=Laporan&hid=$hid&vid=$vid&menu=cetak-apd&user=$data[id_user]&lokasi=$data[id_lokasi]&tgl=$data[tgl_inspeksi]&idtk=$data[id_detail_kel]' class='btn btn-success btn-sm btn-flat'> <i class='icon-user' ></i> APD</a>
                                                <a href='#print' class='btn btn-warning btn-sm btn-flat'><i class='icon-print' ></i> Print</a></td>
											</tr>";
											$no++;
										}
										if($no==1)
										{
											echo "
											<div class='alert alert-info'>
												Tidak ada data pada bulan $bulan dan tahun $tahun. 
											</div>";
										}
										?>
                                    </tbody>
                                </table>
                            </div>
							<?php
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
			
            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>
	

     <!--END MAIN WRAPPER -->
	 <?php
}
?>
   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>

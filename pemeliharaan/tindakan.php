<?php
include "header.php";

if ($_GET['menu']=='tindakan' && $_GET['action']=='tambah-data')
	{
		$tindakan->id_tindakan = $_POST['txt_id_tindakan'];
		$tindakan->id_subobjek_tindakan=$_POST['txt_subobjek'];
		$tindakan->nama_tindakan = $_POST['txt_tindakan'];
		$tindakan->tambah();
	}
	else if ($_GET['menu']=='tindakan' && $_GET['action']=='hapus-data')
	{
		
		$tindakan->hapus($_GET[id]);
	}
	
	else if ($_GET['menu']=='tindakan' && $_GET['action']=='edit-data')
	{
		$tindakan->id_tindakan = $_POST['txt_id_tindakan'];
		$tindakan->nama_tindakan = $_POST['txt_tindakan'];
		$tindakan->ubah();
	}
?> 
 <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> <i class="icon-table"></i> Data Tindakan </h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
					<div class="panel-heading">
                            <i class="icon-table"></i> Tabel Data Tindakan
                        </div>
						
                        <div class="panel-body">
						
                            <div class="table-responsive">
							<?php
								$per_page=15;
								$baris=$tindakan->halaman1($_GET['nama_obj']);
								$pages=ceil($baris/$per_page);
								$page=(isset($_GET['page'])) ? (int)$_GET['page'] :1;
								$start=($page-1)*$per_page;
								$index=0;
								$tampil=$tindakan->halaman2($start,$per_page,$_GET['nama_obj']);	
								if ($baris==0)
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>No</th>
											<th>Tindakan</th>
											<th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$id_objek = "";
											$tampil = $tindakan->tampil($id_objek);
                                            $no=0;
											foreach ($tampil as $data)
											{
                                                $no++;
												echo "<tr class='odd gradeX'>";
												echo "<td>$no</td>";
												echo "<td>$data[nama]</td>";
												echo "<td class='center'>
																<a href='tindakan.php?menu=tindakan&action=edit&id=$data[id_tindakan]&pilihan=Input&hid=3&vvid=5'><button class='btn btn-primary'><i class='icon-pencil icon-white'></i> Edit</button></a>
																
															</td>";
												$index++;
											}
											//<a href='tindakan.php?menu=tindakan&action=hapus-data&id=$data[id_tindakan]'><button class='btn btn-danger'><i class='icon-remove icon-white'></i> Delete</button></a>
											?>
                                    </tbody>
                                </table>
								<?php
								}
								?>
                            </div>
                           
                        </div>
                    </div>
                </div>
				<div class="col-lg-3">
				<div class="panel panel-default">
				<?php if($_GET['action']=='edit' )
				{
				$id = $_GET[id];
				$tampil = $tindakan->tampil($id);
				foreach ($tampil as $data2)
				{	
				?>
				<div class="panel-heading">
                             <i class="icon-plus"></i> Edit Data
                        </div>
						
							<div class="panel-body">
							<form enctype="multipart/form-data" method='post' action='?menu=tindakan&action=edit-data'>
								<div class="form-group">
												<label>Nama Sub Objek</label>
												<select class="form-control" name="txt_subobjek" disabled="disabled" />
													<?php
													/* $tampil = $tindakan->subobjek();
													foreach ($tampil as $data)
													{
													 */
													echo "<option value='$data[id_subobjek]'>$data2[nama_subobjek]</option>";
													
													/* } */?>
												</select>
								</div>	
								<div class="form-group">
                                            <label>Kode Tindakan</label>
											<input type="hidden" name="txt_id_tindakan" value="<?php echo $data2[id_tindakan] ;?>"  >
                                            <input class="form-control" value="<?php echo $data2[id_tindakan] ;?>" disabled="disabled"  >
                                </div>		
								<div class="form-group">
                                            <label>Nama Tindakan</label>
                                            <input class="form-control" name="txt_tindakan" value="<?php echo $data2[nama] ;?>" placeholder="masukan nama tindakan" >
                                </div>		
								<div>
											<button type="submit" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_submit">Simpan</button>
											<button type="reset" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_reset">Batal</button>
								</div>
						</form>
                        </div>
				<?php
				}
				}
				else
				{
				?>
					<div class="panel-heading">
                             <i class="icon-plus"></i> Input Data
                        </div>
							<div class="panel-body">
							<form name='frmmenu'>
								<div class="form-group">
												<label>Objek</label>
												<select class="form-control" name="cmbmenu" onChange='top.location.href =this.form.cmbmenu.options[this.form.cmbmenu.selectedIndex].value;return false;' required/>
													<option value='0'>-- Pilih Objek --</option>
													<?php
													$tampil = $tindakan->tampil_objek();
													foreach ($tampil as $data)
													{
														if($_GET['objek']==$data[id_objek])
														{
															echo "<option value='Indikasi.php?pilihan=Input&hid=3&vvid=4&objek=$data[id_objek]' selected>$data[nama]</option>";
														}
													
													echo "<option value='tindakan.php?pilihan=Input&hid=3&vvid=5&objek=$data[id_objek]'>$data[nama]</option>";
													
													}?>
												</select>
								</div>
								</form>
								<?php
								if($_GET[objek]!='')
								{
								?>
							<form enctype="multipart/form-data" method='post' action='?menu=tindakan&action=tambah-data'>
								<div class="form-group">
												<label>Nama Sub Objek</label>
												<select class="form-control" name="txt_subobjek" required />
													<?php
													$sub=$_GET[objek];
													$tampil = $tindakan->subobjek($sub);
													foreach ($tampil as $data)
													{
													echo "<option value='$data[id_subobjek]'>$data[nama]</option>";
													
													}?>
												</select>
								</div>	
								<div class="form-group">
								<?php
											$tampil_id_tindakan=$tindakan->tampil_id_tindakan();
											foreach($tampil_id_tindakan as $data_id)
											{
								?>
                                            <label>Kode Tindakan</label>
                                            <input class="form-control" name="txt_id_tindakan" value="T_0<?php echo $data_id[id];?>" />
                                            <p class="help-block">Kode Lokasi</p>
								<?php
											}
								?>	
                                </div>		
								<div class="form-group">
                                            <label>Nama Tindakan</label>
                                            <input class="form-control" name="txt_tindakan" placeholder="masukan nama tindakan">
                                </div>		
								<div>
											<button type="submit" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_submit">Simpan</button>
											<button type="reset" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_reset">Batal</button>
								</div>
						</form>
						<?php
								}
								?>
                        </div>
						<?php
						}
						?>
                    </div>
				</div>
            </div>
            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script>
         $('li').click(function(){
  
  $(this).addClass('active')
       .siblings()
       .removeClass('active');
    
});
    </script>
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

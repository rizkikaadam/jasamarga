<?php
include "header.php";

if ($_GET['menu']=='subobjek' && $_GET['action']=='tambah-data')
	{
		$subobjek->id_subobjek = $_POST['txt_id_subobjek'];
		$subobjek->id_objek_subobjek=$_POST['txt_objek'];
		$subobjek->nama_subobjek = $_POST['txt_nama_subobjek'];
		$subobjek->bagian = $_POST['txt_bagian'];
		$subobjek->tambah();
	}
	
	/*else if ($_GET['menu']=='subobjek' && $_GET['action']=='hapus-data')
	{
		
		$subobjek->hapus($_POST['bukuid']);
	}*/
	
	else if ($_GET['menu']=='subobjek' && $_GET['action']=='edit-data')
	{
		$subobjek->id_subobjek = $_POST['txt_id_subobjek'];
		$subobjek->nama_subobjek = $_POST['txt_nama_subobjek'];
		$subobjek->bagian_subobjek = $_POST['txt_bagian'];
		$subobjek->ubah();
	}
	
?> 
 <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><i class="icon-table"></i> Data SubObjek </h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
					<div class="panel-heading">
                           <i class="icon-table"></i> Tabel Data Objek
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
							<?php
								$per_page=15;
								$baris=$subobjek->halaman1($_GET['nama_sbjk']);
								$pages=ceil($baris/$per_page);
								$page=(isset($_GET['page'])) ? (int)$_GET['page'] :1;
								$start=($page-1)*$per_page;
								$index=0;
								$tampil=$subobjek->halaman2($start,$per_page,$_GET['nama_sbjk']);
								if ($baris==0)
								{
									?>
									<!-- notifikasi tidak ada data -->
								<?php
								}
								else 
								{
								?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style= "border-left : 1px solid#C1DAD7"><input type="checkbox" onClick="ceksemua()" id="cekbox"></th>
											<th>Kode</th>
											<th>Nama Subobjek</th>
											<th>Objek</th>
											<th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
			
													$id_lokasi = "";
													$tampil = $subobjek->tampil($id_lokasi);
													foreach ($tampil as $data)
													{
														echo "<tr class='odd gradeX'>";
														echo "<td style= 'border-left : 1px solid#C1DAD7'><input type='checkbox' onClick='ceksemua()' id='cekbox'></td>";
														echo "<td>$data[id_subobjek]</td>";
														echo "<td>$data[nama]</td>";
														echo "<td>$data[objek]</td>";
														echo "<td class='center'>
																<a href='subobjek.php?menu=subobjek&action=edit&id=$data[id_subobjek]&pilihan=Input&hid=3&vvid=6'><button class='btn btn-primary'><i class='icon-pencil icon-white'></i> Edit</button></a>
																<button class='btn btn-danger'>
																<i class='icon-remove icon-white'></i> Delete</button>
															</td>";
														echo "</tr>";
														$index++;
													}
												?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3">
				<div class="panel panel-default">
				<?php
				if($_GET['action']=='edit' )
				{
				$id=$_GET['id'];
				$tampil=$subobjek->tampil($id);
				foreach ($tampil as $data)
				{
				?>
				<div class="panel-heading">
                             <i class="icon-plus"></i> Edit Data
                        </div>
							<div class="panel-body">
							<form enctype="multipart/form-data" method='post' action='?menu=subobjek&action=edit-data'>
								<div class="form-group">
												<label>Nama Objek</label>
												<select class="form-control" name="txt_objek" disabled="disabled" />
													<?php
													$id_objek=$data[id_objek];
													$tampil1 = $subobjek->objek_edit($id_objek);
													foreach ($tampil1 as $data2)
													{
													 
													echo "<option value='$data2[id_objek]'>$data2[nama]</option>";
													
													 } 
													 ?>
												</select>
								</div>	
								<div class="form-group">
                                            <label>Kode SubObjek</label>
                                            <input type="hidden" name="txt_id_subobjek"  value="<?php echo $data[id_subobjek] ;?>" />
											<input class="form-control" value="<?php echo $data[id_subobjek] ;?>" disabled="disabled" />
                                            <p class="help-block">Masukan Kode</p>
                                </div>		
								<div class="form-group">
                                            <label>Nama SubObjek</label>
                                            <input class="form-control" name="txt_nama_subobjek"  value="<?php echo $data[nama] ;?>" />
                                            <p class="help-block">Masukan Nama</p>
                                </div>
								<div class="form-group">
                                            <label>Bagian</label>
                                            <input class="form-control" name="txt_bagian"  value="<?php echo $data[bagian] ;?>" />
                                            <p class="help-block">Masukan Bagian</p>
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
							<form enctype="multipart/form-data" method='post' action='?menu=subobjek&action=tambah-data'>
								<div class="form-group">
												<label>Nama Objek</label>
												<select class="form-control" name="txt_objek" required />
													<option value='0'>Pilih Objek</option>
													<?php
													$objek_subobjeks=$subobjek->objek();

													foreach($objek_subobjeks as $data)
													{
													
													echo "<option value='$data[id_objek]'>$data[nama]</option>";
													}
													
													?>
												</select>
								</div>	
								<div class="form-group">
                                            <label>Kode SubObjek</label>
                                            <input class="form-control" name="txt_id_subobjek" required />
                                            <p class="help-block">Masukan Kode</p>
                                </div>		
								<div class="form-group">
                                            <label>Nama SubObjek</label>
                                            <input class="form-control" name="txt_nama_subobjek" required />
                                            <p class="help-block">Masukan Nama</p>
                                </div>
								<div class="form-group">
                                            <label>Bagian</label>
                                            <input class="form-control" name="txt_bagian" required />
                                            <p class="help-block">Masukan Bagian</p>
                                </div>		
								<div>
										<button type="submit" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_submit">Simpan</button>
										<button type="reset" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_reset">Batal</button>
								</div>
								</form>
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
	<?php
				}
			?>
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

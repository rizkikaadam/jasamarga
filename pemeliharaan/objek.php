<?php
include "header.php";

if ($_GET['menu']=='objek' && $_GET['action']=='tambah-data')
	{
		$objek->id_objek = $_POST['txt_id_objek'];
		$objek->nama_objek = $_POST['txt_nama_objek'];
		$objek->tambah();
	}
	
	else if ($_GET['menu']=='objek' && $_GET['action']=='hapus-data')
	{
		$objek->hapus($_GET[id]);
	}
	
	else if ($_GET['menu']=='objek' && $_GET['action']=='edit-data')
	{
		$objek->id_objek = $_POST['txt_id_objek'];
		$objek->nama_objek = $_POST['txt_nama_objek'];
		$objek->ubah();
	}
?> 
 <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><i class="icon-table"></i> Data Objek </h2>
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
							$baris=$objek->halaman1($_GET['nama_obj']);
							$pages=ceil($baris/$per_page);
							$page=(isset($_GET['page'])) ? (int)$_GET['page'] :1;
							$start=($page-1)*$per_page;
							$index=0;
							$tampil=$objek->halaman2($start,$per_page,$_GET['nama_obj']);	
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
                                            <th style= "border-left : 1px solid#C1DAD7"><input type="checkbox" onClick="ceksemua()" id="cekbox"></th>
											<th>Kode Objek</th>
											<th>Nama Objek</th>
											<th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
			
													/*$id_lokasi = "";
													$tampil = $lokasi->tampil($id_lokasi);*/
													foreach ($tampil as $data)
													{
														echo "<tr class='odd gradeX'>";
														echo "<td style= 'border-left : 1px solid#C1DAD7'><input type='checkbox' onClick='ceksemua()' id='cekbox'></td>";
														echo "<td>$data[id_objek]</td>";
														echo "<td>$data[nama]</td>";
														echo "<td class='center'>
																<a href='objek.php?menu=objek&action=edit&id=$data[id_objek]&pilihan=Input&hid=3&vvid=3'><button class='btn btn-primary'><i class='icon-pencil icon-white'></i> Edit</button></a>
																<a href='objek.php?menu=objek&action=hapus-data&id=$data[id_objek]'><button class='btn btn-danger'><i class='icon-remove icon-white'></i> Delete</button></a>
															</td>";
														$index++;
													}
												?>
                                    </tbody>
                                </table>
                            </div> 
							
                        </div>
                    </div>
                </div>
				<?php
				if($_GET['action']=='edit' )
				{
				$id=$_GET['id'];
				$tampil=$objek->tampil($id);
				foreach ($tampil as $data)
				{
				?>
				<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">
                             <i class="icon-plus"></i> Edit Data
                        </div>
							<div class="panel-body">		
							<form enctype="multipart/form-data" method='post' action='?menu=objek&action=edit-data'>
								<div class="form-group">
                                            <label>Kode Objek</label>
											<input type="hidden" name="txt_id_objek" value="<?php echo $data[id_objek] ;?>"  >
                                            <input class="form-control" value="<?php echo $data[id_objek] ;?>" disabled="disabled" />
                                            <p class="help-block">Masukan Kode</p>
                                </div>		
								<div class="form-group">
                                            <label>Nama Objek</label>
                                            <input class="form-control" name="txt_nama_objek" value="<?php echo $data[nama] ;?>" />
                                            <p class="help-block">Masukan Nama</p>
                                </div>
								<div>
									<button type="submit" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_submit">Simpan</button>
									<button type="reset" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_reset">Batal</button>
								</div>
								</form>
                        </div>
                    </div>
				</div>
				<?php
				}
				}
				else
				{
				?>
				<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">
                             <i class="icon-plus"></i> Input Data
                        </div>
							<div class="panel-body">		
							<form enctype="multipart/form-data" method='post' action='?menu=objek&action=tambah-data'>
								<div class="form-group">
                                            <label>Kode Objek</label>
                                            <input class="form-control" name="txt_id_objek" required />
                                            <p class="help-block">Masukan Kode</p>
                                </div>		
								<div class="form-group">
                                            <label>Nama Objek</label>
                                            <input class="form-control" name="txt_nama_objek" required />
                                            <p class="help-block">Masukan Nama</p>
                                </div>
								<div>
									<button type="submit" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_submit">Simpan</button>
									<button type="reset" class="btn btn-default btn-sm btn-grad btn-rect" name="btn_reset">Batal</button>
								</div>
								</form>
                        </div>
                    </div>
				</div>
				<?php
				}			
				?>
				
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

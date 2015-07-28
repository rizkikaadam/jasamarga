<?php
include "header.php";
if ($_GET['menu']=='lokasi' && $_GET['action']=='tambah-data')
	{
		$lokasi->id_lokasi = $_POST['txt_id_lokasi'];
		$lokasi->nama_lokasi = $_POST['txt_nama_lokasi'];
		$lokasi->lokasi_file=$_FILES['photo']['tmp_name'];
		$lokasi->tipe_file=$_FILES['photo']['type'];
		$lokasi->nama_file=$_FILES['photo']['name'];
		$lokasi->direktori="img/lokasi/$lokasi->nama_file";
		$lokasi->extensi=pathinfo($lokasi->direktori,PATHINFO_EXTENSION);
		$lokasi->tambah();
	}
	
	else if ($_GET['menu']=='lokasi' && $_GET['action']=='hapus-data')
	{
		$lokasi->direktori_hapus="img/lokasi/";
		$lokasi->hapus($_GET[id]);
		
	}
	
	else if ($_GET['menu']=='lokasi' && $_GET['action']=='edit-data')
	{
		$lokasi->id_lokasi = $_POST['txt_id_lokasi'];
		$lokasi->nama_lokasi = $_POST['txt_nama_lokasi'];
		$lokasi->nama_foto_lama = $_POST['txt_nama_fotolama'];
		$lokasi->lokasi_file=$_FILES['photo']['tmp_name'];
		$lokasi->tipe_file=$_FILES['photo']['type'];
		$lokasi->nama_file=$_FILES['photo']['name'];
		$lokasi->direktori_upload="img/lokasi/$lokasi->nama_file";
		$lokasi->direktori_hapus="img/lokasi/";
		$lokasi->extensi=pathinfo($lokasi->direktori_upload,PATHINFO_EXTENSION);
		$lokasi->ubah();
	}
?> 
 <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><i class="icon-table"></i> Data Lokasi </h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
					<div class="panel-heading">
                            <i class="icon-table"></i> Tabel Data Lokasi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
							<?php
								$per_page=15;
								$baris=$lokasi->halaman1($_GET['nama_lok']);
								$pages=ceil($baris/$per_page);
								$page=(isset($_GET['page'])) ? (int)$_GET['page'] :1;
								$start=($page-1)*$per_page;
								$index=0;
								$tampil=$lokasi->halaman2($start,$per_page,$_GET['nama_lok']);	
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
												<th>Nama Lokasi</th>
												<th>Detail</th>
											</tr>
										</thead>
										<tbody>
												<?php
			
													/*$id_lokasi = "";
													$tampil = $lokasi->tampil($id_lokasi);*/
                                                    $no=0;
													foreach ($tampil as $data)
													{
                                                        $no++;
														echo "<tr class='odd gradeX'>";
														echo "<td>$no</td>";
														echo "<td>$data[nama]</td>";
														echo "<td class='center'>
																<a href='lokasi.php?menu=lokasi&action=edit&id=$data[id_lokasi]&pilihan=Input&hid=3&vvid=2'><button class='btn btn-primary'><i class='icon-pencil icon-white'></i> Edit</button></a>
																
															</td>";
														echo "</tr>";
														$index++;
													}
													//<a href='lokasi.php?menu=lokasi&action=hapus-data&id=$data[id_lokasi]'><button class='btn btn-danger'><i class='icon-remove icon-white'></i> Delete</button></a>
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
				$tampil=$lokasi->tampil($id);
				foreach ($tampil as $data)
				{
				?>
				<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">
                             <i class="icon-plus"></i> Edit Data
                        </div>
						<div class="panel-body">
						<form enctype="multipart/form-data" method='post' action='?menu=lokasi&action=edit-data'>
								<div class="form-group">
                                            <label>Kode Lokasi</label>
											<input type="hidden" name="txt_id_lokasi" value="<?php echo $data[id_lokasi] ;?>"  >
                                            <input class="form-control"  value="<?php echo $data[id_lokasi] ;?>" disabled="disabled" />
                                            <p class="help-block">Masukan Kode</p>
                                </div>		
								<div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input class="form-control" name="txt_nama_lokasi" value="<?php echo $data[nama];?>" placeholder="Masukan Nama Lokasi"/>
                                </div>
								<div>
									<button type="submit" class="btn btn-primary">Simpan</button>
											<button type="reset" class="btn btn-danger">Batal</button>
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
						<form enctype="multipart/form-data" method='post' action='?menu=lokasi&action=tambah-data'>
								<div class="form-group">
								<?php
											$tampil_id_lokasi=$lokasi->tampil_id_lokasi();
											foreach($tampil_id_lokasi as $data_id)
											{
								?>
                                            <label>Kode Lokasi</label>
                                            <input class="form-control" name="txt_id_lokasi" value="LOK-0<?php echo $data_id[id];?>" />
                                            <p class="help-block">Kode Lokasi</p>
								<?php
											}
								?>	
                                </div>		
								<div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input class="form-control" name="txt_nama_lokasi" placeholder="Masukan Nama Lokasi" required />
                                </div>
								<div>
									<button type="submit" class="btn btn-primary">Simpan</button>
											<button type="reset" class="btn btn-danger">Batal</button>
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
		<?php
		}
		?>
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
	<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>

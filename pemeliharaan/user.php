<?php
include "header.php";


	if ($_GET['menu']=='user' && $_GET['action']=='tambah-data')
	{
		
		$user->npp = $_POST['txt_npp'];
		$user->nama= $_POST['txt_nama'];
		$user->jabatan= $_POST['txt_jabatan'];
		$user->password= md5($_POST['txt_password']);
		$user->cpassword= md5($_POST['txt_cpassword']);
		$user->vpass= $_POST['txt_password']; 
		$user->tambah();
	}
	
	else if ($_GET['menu']=='user' && $_GET['action']=='hapus-data')
	{
		$user->direktori_hapus="img/user/";
		$user->hapus($_GET[id]);
	}
	
	else if ($_GET['menu']=='user' && $_GET['action']=='edit-data')
	{
		$user->npp = $_POST['txt_npp'];
		$user->nama = $_POST['txt_nama'];
		$user->jabatan= $_POST['txt_jabatan'];
		$user->status= $_POST['txt_status'];
		$user->password= md5($_POST['txt_password']);
		$user->vpass= $_POST['txt_password']; 
		$user->ubah();
	}
	if($_GET['action']=='edit')
	{
	$npp=$_GET['id'];
	$tampil=$user->tampil($npp);
	foreach($tampil as $data)
	{
	?>
	<div id="content">
				<div class="inner">
					<br />
					<div class="row">
					<div class="col-lg-10">
					<div class="panel panel-default">
					<div class="panel-heading">
                            Edit Data
                        </div>
						
                        <div class="panel-body">
						 <form enctype="multipart/form-data" method='post' action='?menu=user&action=edit-data'>
                                            <div class="form-group">
                                                <label for="disabledSelect">NPP</label>
                                                <input class="form-control" type="number" min="0" value="<?php echo $data[id_user] ;?>" name="txt_npp" />
                                            </div>
											<div class="form-group">
                                                <label for="disabledSelect">Nama</label>
                                                <input class="form-control" type="text" value="<?php echo $data[nama] ;?>" name="txt_nama"  />
                                            </div>
											<div class="form-group">
                                                <label for="disabledSelect">Password</label>
                                                <input class="form-control" type="password" value="<?php echo $data[vpass] ;?>"  name="txt_password"/>
                                            </div>
											<div class="form-group">
                                                <label >Hak User</label>
                                                <select  class="form-control" name="txt_jabatan" required>
													<?php
													$tampil2=$user->tampil($npp);
													foreach($tampil2 as $data2)
													{
													 if($data2[jabatan]==$data[jabatan])
													 {
														echo "<option value='$data2[jabatan]' selected >$data2[jabatan]</option>
														<option value='Inspektor'>Inspektor</option>
														<option value='ME'>ME</option>
														<option value='ME'>Data Processing</option>
														<option value='nonaktif'>nonaktif</option>";
													 }
													} 
													 ?>
												</select>
                                            </div>
                                            <div class="form-group">
                                                <label >Status</label>
                                                <select  class="form-control" name="txt_status" required>
													<?php
													$tampil2=$user->tampil($npp);
													foreach($tampil2 as $data2)
													{
													 if($data2[status]==$data[status])
													 {
														echo "<option value='$data2[jabatan]' selected >$data2[status]</option>
														<option value='Aktif'>Aktif</option>
														<option value='Tidak Aktif'>Tidak Aktif</option>";
													 }
													} 
													 ?>
												</select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
					</div>
					</div>
					</div>
				</div>
			</div>
		   <!--END PAGE CONTENT -->
		</div>
	<?php
	}
	}
	/*
	else if($_GET['menu']=='user' && $_GET['action']=='detail')
	{
	$npp=$_GET[id];
	$tampil=$user->tampil($npp);
	foreach ($tampil as $data)
	{
	
	if($data[jk]=="P")
	{
		$jk="Wanita";
	}
	else
	{
		$jk="Pria";
	}
	?>
			<!--PAGE CONTENT -->
			<div id="content">
				<div class="inner">
					<br />
					<div class="row">
					<div class="col-lg-10">
					<div class="panel panel-default">
					<div class="panel-heading">
                            Data Detail User    <a href="User.php?pilihan=Input&hid=3&vvid=1&menu=user&action=edit&id=<?php echo $data[id_user] ;?>" class="btn btn-primary btn-sm btn-flat btn-rect">Edit Data</a>
                        </div>
                        <div class="panel-body">
						<form role="form">
                                        <fieldset disabled="disabled">
                                            <div class="form-group">
                                                <label for="disabledSelect">NPP</label>
                                                <input class="form-control" id="disabledInput" type="text" value="<?php echo $data[id_user] ;?>" disabled="disabled" />
                                            </div>
											<div class="form-group">
                                                <label for="disabledSelect">Nama</label>
                                                <input class="form-control" id="disabledInput" type="text" value="<?php echo $data[nama] ;?>" disabled="disabled" />
                                            </div>
											<div class="form-group">
                                                <label for="disabledSelect">Password</label>
                                                <input class="form-control" id="disabledInput" type="password" value="<?php echo $data[vpass] ;?>" disabled="disabled" />
                                            </div>
											<div class="form-group">
                                                <label >Hak User</label>
                                                <input class="form-control" id="disabledInput" type="text" value="<?php echo $data[jabatan] ;?>" disabled="disabled" />
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </fieldset>
                        </form>
					</div>
					</div>
					</div>
				</div>
			</div>
		   <!--END PAGE CONTENT -->
		</div>
		<?php
		}
		} */
	
	else if($_GET['menu']=='user' && $_GET['action']=='tambah')
	{
		$npp=$_GET['npp'];
		$nama=$_GET['nama'];
	?>
			<!--PAGE CONTENT -->
			<div id="content">
				<div class="inner">
					<br />
					<div class="row">
					
					<div class="col-lg-10">
					<div class="panel panel-default">
					<div class="panel-heading">
                            Tambah Data
                        </div>
                        <div class="panel-body">
						 <form enctype="multipart/form-data" method='post' action='?menu=user&action=tambah-data'>
                                            <div class="form-group">
                                                <label >NPP</label>
                                                <input class="form-control" name="txt_npp" min="0" type="number" value="<?php echo $npp ;?>" required />
                                            </div>
											<div class="form-group">
                                                <label>Nama</label>
                                                <input class="form-control" type="text" name="txt_nama" value="<?php echo $nama ;?>" required/>
                                            </div>
											<div class="form-group">
                                                <label >Password</label>
                                                <input class="form-control" type="password" name="txt_password" required />
                                            </div>
                                            <div class="form-group">
                                                <label >Konfirmasi Password</label>
                                                <input class="form-control" type="password" name="txt_cpassword" required />
                                            </div>
											<div class="form-group">
                                                <label >Hak User</label>
                                                <select  class="form-control" name="txt_jabatan" required>
                                                    <option value='Inspektor'>Inspektor</option>
													<option value='ME'>ME</option>
													<option value='ME'>Data Processing</option>
                                                </select>
                                            </div>
											<div class="form-group">
                    </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
											<button type="reset" class="btn btn-danger">Batal</button>
                        </form> 
						
					</div>
					</div>
					</div>
				</div>
			</div>
		   <!--END PAGE CONTENT -->
		</div>
		<?php
	}
	else
	{
?> 
 <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <br />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<div class="panel-heading">
                            <a href="User.php?pilihan=Input&hid=3&vvid=1&menu=user&action=tambah" class="btn btn-primary btn-sm btn-flat btn-rect">Tambah Data</a>
                        </div>
                        <div class="panel-body">
						<center>
						<h2><i class="icon-table"></i> Data User</h2>
						</center>
						<hr/>
                            <div class="table-responsive">
							<?php
								$per_page=5;
								$baris=$user->halaman1($_GET['nama_user']);
								$pages=ceil($baris/$per_page);
								$page=(isset($_GET['page'])) ? (int)$_GET['page'] :1;
								$start=($page-1)*$per_page;
								$index=0;
								$tampil=$user->halaman2($start,$per_page,$_GET['nama_user']);
								$npp="";
								$user=$user->tampil($npp);
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
											<th>NPP</th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Status</th>
											<th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
			
													/*$id_lokasi = "";
													$tampil = $lokasi->tampil($id_lokasi);*/
                                                    $no=0;
													foreach ($user as $data)
													{
                                                        $no++;
														echo "<tr class='odd gradeX'>";
                                                        echo "<td>$no</td>";
														echo "<td>$data[id_user]</td>";
														echo "<td>$data[nama]</td>";
														echo "<td>$data[jabatan]</td>";
														echo "<td>$data[status]</td>";
														echo "<td class='center'>
																<a href='User.php?pilihan=Input&hid=3&vvid=1&menu=user&action=edit&id=$data[id_user]'><button class='btn btn-primary btn-sm'>Edit</button></a>
															</td>";
														echo "</tr>";
														$index++;
														//<a href='user.php?menu=user&action=hapus-data&id=$data[npp]'><button class='btn btn-danger btn-sm'><i class='icon-remove icon-white'></i> Delete</button></a>
													}
												?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>
	<?php
	}
	}
	?>
     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  Jasa Marga &nbsp;2014 &nbsp;</p>
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

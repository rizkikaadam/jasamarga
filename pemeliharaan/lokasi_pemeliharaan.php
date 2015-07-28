<?php 
include "header.php";
if ($_GET['tampil']=='detail')
{
?>
	<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Lokasi</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="home.php">Home</a>
					</li>
					<li>
						<i class="fa fa-table"></i><a href="lokasi_pemeliharaan.php">Data Lokasi</a>
					</li>
					<li class="active">
						<i class="fa fa-table"></i> Detail Lokasi
					</li>
				</ol>
			</div>
		</div>
		<div id="kotakuser">
			<div id="layarkiri">
				<img src="images/user.png" width="200px" height="175px"></img>
				<br/>
			</div>
			<div id="layarkanan">
				<label>Kode Lokasi</label><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>LOK-001
				<br/>
	
				<label>Nama Lokasi</label><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>Cabang Jakarta Cikampek\
				<br/><br/>
			</div>
			
			<a href="?menu=lokasi&tampil=edit&id="><input type="button" class="btn btn-default" value="EDIT DATA LOKASI" style="width: auto;
			height:30px;
			font-size: 14px;
			background-image:none;
			border-radius: 4px;"></a>
		</div>
	</div>
	</div>
<?php
}
else if ($_GET['tampil']=='tambah')
{
?>
	<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Lokasi</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i><a href="home.php">Home</a>
					</li>
					<li class="active">
						<i class="fa fa-table"></i><a href="lokasi_pemeliharaan.php">Data Lokasi</a>
					</li>
					<li class="active">
						<i class="fa fa-table"></i>Tambah Lokasi
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<form enctype="multipart/form-data" method='post' action='?menu=lokasi&action=tambah-data&id='>
			<div class="form-group">
				<label>Kode Lokasi</label>
				<input type="text" class="form-control" placeholder="Kode Lokasi" readonly name="txt_kode_lokasi">
			</div>
			
			<div class="form-group">
				<label>Nama Lokasi</label>
				<input class="form-control" placeholder="Nama Lokasi" name="txt_nama_lokasi">
			</div>
			
			<div class="form-group">
				<label>Photo</label>
				<br><br>
				<input type="file" name="photo">
			</div>
			
			<button type="submit" class="btn btn-default" name="btn_submit">Simpan</button>
			<button type="reset" class="btn btn-default" name="btn_reset">Batal</button>
			</form>
		</div>
	</div>
	</div>
<?php
}
else if ($_GET['tampil']=='edit') {
?>
	<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Lokasi</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i><a href="home.php">Home</a>
					</li>
					<li>
						<i class="fa fa-table"></i><a href="lokasi_pemeliharaan.php">Data Lokasi</a>
					</li>
					<li class="active">
						<i class="fa fa-table"></i>Edit Lokasi
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<form enctype="multipart/form-data" method='post' action='?menu=lokasi&action=edit-data&id='>
			<div class="form-group">
				<label>Kode Lokasi</label>
				<input type="text" class="form-control" placeholder="Kode Lokasi" readonly name="txt_kode_lokasi" value="LOK-001">
			</div>
			
			<div class="form-group">
				<label>Nama Lokasi</label>
				<input class="form-control" placeholder="Nama Lokasi" name="txt_nama_lokasi" value="Cabang Jakarta Cikampek">
			</div>
			
			<div class="form-group">
				<label>Photo</label>
				<input type="hidden" name="nama_foto_lama" value=""><br>
				<img src="images/user.png" width = "75" height = "75"/>
				<br><br>
				<input type="file" name="photo">
			</div>
			
			<button type="submit" class="btn btn-default" name="btn_submit">Simpan</button>
			<button type="reset" class="btn btn-default" name="btn_reset">Reset</button>
			</form>
			</div>
	</div>
	</div>
<?php
}
else 
{
?>
<link rel="stylesheet" href="css/table-paging.css" type="text/css">	
	<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
			<h1 class="page-header">Data Lokasi</h1>
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-dashboard"></i>  <a href="home.php">Home</a>
				</li>
				<li class="active">
					<i class="fa fa-table"></i> Data Lokasi
				</li>
			</ol>
			</div>
		</div>
		<div class="row">
			<!-- SEARCH -->
			<center>
			<form method="get">
			<table>
			<tr>
				<td class="noborder"><input type="text" placeholder="Lokasi" name='nama_lokasi' id="search"></td>
				<td class="noborder"><input type="image" src="images/search.png" width="34px" height="34px"></td>
			</tr>
			</table>
			</form>
			</center>
	
			<!-- TAMBAH LOKASI -->
			<div style= 'float:center;'>
				<a href="?menu=lokasi&tampil=tambah"><img src="images/add.png" width="50px" height="50px"></a>
			</div>
	
			<!-- TABEL DATA -->
			<div class="table-responsive">
				<form action="?menu=lokasi&action=hapus-data"  method="post" id="formulirku">
				<table id="table table-bordered table-hover">
				<thead>
				<tr>
					<th style= "border-left : 1px solid#C1DAD7"><input type="checkbox" onClick="ceksemua()" id="cekbox"></th>
					<th style= "border-left : 1px solid#C1DAD7">Kode Lokasi</th>
					<th>Nama Lokasi</th>
					<th>Detail</th>
				</tr>
				</thead>
				
				<tbody>
				<tr>
					<td align="center" style= "border-left : 1px solid#C1DAD7"><input type="checkbox" onClick="ceksemua()" id="cekbox"></td>
					<td>LOK-001</td>
					<td>Cabang Jakarta Cimapek</td>
					<td align="center"><a href="?menu=lokasi&tampil=detail"><img src="images/detail.png" width="30px" height="30px"></img></a></td>
				</tr>
				</tbody>
				</table>
	
	<!-- PAGING -->
	<h6 align="center">
		<div class="pagination">
		<?php
			echo'<b><a href="">1</a><b>';
		?>
		</div>
	
	<!-- DELETE LOKASI -->
	<div style='float:right;'><a href="javascript:konfirmasicek2();"><img src="images/delete.png" width="60px" height="60px"></a></div>
				</form>
			</div>
		</div>
	</div>
	</div>
<?php } ?>
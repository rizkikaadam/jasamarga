<?php

error_reporting(0);
SESSION_START();
include"koneksi/koneksi_pemeliharaan.php";
$db=new koneksi();
$db->koneksi_db();
	
$npp=$_POST['txt_npp'];
$password=md5($_POST['txt_password']);

$sql=mysql_query("select * from t_user where id_user='$npp' and password='$password' ");
$data=mysql_fetch_array($sql);
$ketemu=mysql_num_rows($sql);

if($ketemu > 0 )
{
	$_SESSION['npp']=$npp;
	$_SESSION['nama']=$data['nama'];
	$_SESSION['jabatan']=$data['jabatan'];
?>
			<script language="javascript">
			
			document.location="home.php";
			</script>
<?php
}
else
{
$status="gagal";
?>
			<script language="javascript">
			
			document.location="index.php?status=<?php echo $status; ?>";
			</script>
<?php
}
?>
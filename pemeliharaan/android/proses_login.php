<?php
$host='127.0.0.1';
$uname='root';
$pwd='';
$db="db_pemeliharaan";
 
$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
mysql_select_db($db,$con) or die("db selection failed");

$npp = $_POST['username'];
$password = md5($_POST['password']); 

$r=mysql_query("select id_user,nama from t_user where id_user='$npp' and password='$password' and jabatan='Inspektor'",$con);
$res = mysql_num_rows($r);
if($res>0)
{ 
	while($row=mysql_fetch_array($r)) 
	{
		$flag[]=$row;
	}
print(json_encode($flag));
}else{
	echo"Login Gagal";
}

mysql_close($con);
?>
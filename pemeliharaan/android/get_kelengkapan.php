<?php
error_reporting(0);
$host='localhost';
$uname='root';
$pwd='';
$db="db_pemeliharaan";	
 
$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
mysql_select_db($db,$con) or die("db selection failed");

$result=mysql_query("SELECT * FROM t_kelengkapan where kategori='APD'",$con);
 
while($row=mysql_fetch_array($result)) {
 
	$flag[]=$row;
}
 
print(json_encode($flag));
mysql_close($con);
?>
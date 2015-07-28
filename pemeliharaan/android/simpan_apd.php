<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$host='localhost';
$uname='root';
$pwd='';
$db="db_pemeliharaan";

$id_user=$_POST['id_user'];
$catatan=$_POST['catatan'];
$tgl_inspeksi		= date('Y-m-d');
$alat_bantu= explode("^",$_POST['alat_bantu']);
$perlengkapan= explode("^",$_POST['perlengkapan']);

$target_path= "../popup_image/photo/apd/";
if($_REQUEST['image']!="")
{
$base=$_REQUEST['image'];
$name=str_replace(":","_",$_REQUEST['cmd']);
}
else
{
$base=$_REQUEST['image'];
$name="-";
}
if($_REQUEST['image2']!="")
{
$base2=$_REQUEST['image2'];
$name2=str_replace(":","_",$_REQUEST['cmd2']);
}
else
{
$base2=$_REQUEST['image2'];
$name2="-";
}
if($_REQUEST['image3']!="")
{
$base3=$_REQUEST['image3'];
$name3=str_replace(":","_",$_REQUEST['cmd3']);
}
else
{
$base3=$_REQUEST['image3'];
$name3="-";
}
if($_REQUEST['image4']!="")
{
$base4=$_REQUEST['image4'];
$name4=str_replace(":","_",$_REQUEST['cmd4']);
}
else
{
$base4=$_REQUEST['image4'];
$name4="-";
}

$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
mysql_select_db($db,$con) or die("db selection failed");

$query="INSERT INTO t_detail_kelengkapan (id_detail_kel,id_user,tgl_inspeksi,catatan,foto1,foto2,foto3,foto4)
VALUES ('','$id_user','$tgl_inspeksi','$catatan','$name','$name2','$name3','$name4')"; 
$result=mysql_query($query,$con);

if ($result)
{
$sql=mysql_query("select id_detail_kel from t_detail_kelengkapan order by id_detail_kel desc limit 1");
while($row = mysql_fetch_array($sql)){
        // temporary array to create single category
        $id_detail_kel=$row['id_detail_kel'];
    }
for ($i=1;$i<count($perlengkapan);$i++)
{
$query3="INSERT INTO t_detail_detail_kelengkapan (id_detail_detail_kelengkapan,id_detail_kel,id_kelengkapan,kriteria)
VALUES ('','$id_detail_kel','$perlengkapan[$i]','v');"; 
$result3=mysql_query($query3,$con);
}
for ($i=1;$i<count($alat_bantu);$i++)
{
$query2="INSERT INTO t_detail_detail_kelengkapan (id_detail_detail_kelengkapan,id_detail_kel,id_kelengkapan,kriteria)
VALUES ('','$id_detail_kel','$alat_bantu[$i]','v');"; 
$result2=mysql_query($query2,$con);
}

}

if($result && $result2&& $result3)
{
 $binary=base64_decode($base);
 $binary2=base64_decode($base2);
 $binary3=base64_decode($base3);
 $binary4=base64_decode($base4);

 header('Content-Type: bitmap; charset=utf-8');

 $file = fopen($target_path, 'wb');
 $file = fopen($name, 'wb');
 fwrite($file, $binary);
 fclose($file);
 copy($name,$target_path.$name);
 unlink($name);
 
 $file2 = fopen($target_path, 'wb2');
 $file2 = fopen($name2, 'wb2');
 fwrite($file2, $binary2);
 fclose($file2);
 copy($name2,$target_path.$name2);
 unlink($name2);
 
 $file3 = fopen($target_path, 'wb3');
 $file3 = fopen($name3, 'wb3');
 fwrite($file3, $binary3);
 fclose($file3);
 copy($name3,$target_path.$name3);
 unlink($name3);
 
 $file4 = fopen($target_path, 'wb4');
 $file4 = fopen($name4, 'wb4');
 fwrite($file4, $binary4);
 fclose($file4);
 copy($name4,$target_path.$name4);
 unlink($name4);
echo "Sukses";
 }
 
 else
 {
 echo "gagal";
 echo mysql_error();
 }

mysql_close($con);
?>
<?php
	$server = "127.0.0.1";
	$username = "root";
	$password = "";
	$database = "db_pemeliharaan";
	
	//Koneksi
	$link = mysql_connect($server,$username,$password);
	if (!$link)
	{
		die('Could not Connect: '.mysql_error());
	}
	
	//Gunakan Database yang Aktif
	$db = mysql_select_db($database);
	if (!$db)
	{
		die ('Error  ; '.mysql_error());
	}
	$query_sub = "SELECT DISTINCT s.nama nama_subobjek, s.id_subobjek, IF (d.foto1!='-',d.foto1,'-') AS foto1, IF (d.foto2!='-',d.foto2,'-') AS foto2, IF (d.foto3!='-',d.foto3,'-') AS foto3, IF (d.foto4!='-',d.foto4,'-') AS foto4,
		s.id_subobjek
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_tindakan ON t_detail_tindakan.id_detail=d.id_detail
		INNER JOIN t_tindakan t ON t.id_tindakan=t_detail_tindakan.id_tindakan
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='O_08'
		AND dk.id_user='admin'
		AND d.id_lokasi='LOK-001'";
	$hasil_sub=mysql_query($query_sub);
                        
?>
<h3> Tindakan</h3>
<table>
<tr>
<?php 
$i=1;
while ($data=mysql_fetch_array($hasil_sub))
{
?>
<td>
<table width="300" border=1" height="200">
				<tr>
					<th width="50"><?php echo $data['nama_subobjek'];?></th>
					<th width="19">SB</th>
					<th width="19">SL</th>
				</tr>
				<?php
				$query_tindakan = "SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,l.nama lokasi,o.nama nama_objek,s.nama nama_subobjek,t.nama nama_tindakan,t_detail_tindakan.kriteria,t_detail_tindakan.keterangan
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON d.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_tindakan ON t_detail_tindakan.id_detail=d.id_detail
		INNER JOIN t_tindakan t ON t.id_tindakan=t_detail_tindakan.id_tindakan
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='O_08'
		AND dk.id_user='admin'
		AND d.id_lokasi='LOK-001'
		AND s.`id_subobjek`='$data[id_subobjek]'";
				$hasil_tindakan=mysql_query($query_tindakan);
				while ($data_tindakan=mysql_fetch_array($hasil_tindakan))
				{
				?>
				<tr>
					<td width="50"><?php echo $data_tindakan['nama_tindakan'];?></td>
					<td width="19">-</td>
					<td width="19">-</td>
				</tr>
				<?php
				}
				?>
</table>			
</td>
<?php
	if ($i % 3==0)
	{
	?>
	</tr><tr>	
<?php
	}
	$i++;
}
?>
</tr>
</table>

<h3> Indikasi</h3>
<table>
<tr>
<?php 
$i=1;
$cnt=0;
$query_sub = "SELECT DISTINCT s.nama nama_subobjek, s.id_subobjek, IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'-') AS foto1, IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'-') AS foto2, IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'-') AS foto3, IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'-') AS foto4,
		s.id_subobjek
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi ON t_detail_indikasi.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=t_detail_indikasi.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='O_08'
		AND dk.id_user='admin'
		AND d.id_lokasi='LOK-001'";
	$hasil_sub=mysql_query($query_sub);
while ($data=mysql_fetch_array($hasil_sub))
{
?>
<td>
<table width="300" border=1" height="200">
				<tr>
					<th width="50"><?php echo $data['nama_subobjek'];?></th>
					<th width="19">SB</th>
					<th width="19">SL</th>
				</tr>
				<?php
				$query_indikasi = "SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!='NULL' OR l.nama!='-',l.nama,'-') lokasi,o.nama nama_objek,s.nama nama_subobjek,d.km_awal,d.km_akhir,i.nama nama_indikasi,di.kriteria,di.KK, di.prioritas, di.rencana_tl, di.selesai_tl, di.keterangan, IF (di.rekanan!='NULL' OR di.rekanan!='-',di.rekanan,'-') AS rekanan
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.`id_detail_kel`
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='O_08'
		AND dk.id_user='admin'
		AND d.id_lokasi='LOK-001'
		AND s.`id_subobjek`='$data[id_subobjek]'";
				$hasil_indikasi=mysql_query($query_indikasi);
				
				while ($data_indikasi=mysql_fetch_array($hasil_indikasi))
				{
				?>
				<tr>
					<td width="50"><?php echo $data_indikasi['nama_indikasi'];?></td>
					<?php
					
					?>
					<td width="19">-</td>
					<td width="19">-</td>
				</tr>
				<?php
				}
				?>
</table>			
</td>
<?php
	if ($i % 3==0)
	{
	?>
	</tr><tr>	
<?php
	}
	$i++;
}
?>
</tr>
</table>
<?php
class pdf_lalin
{
	public function tampil()
	{
		$sql = mysql_query("
		SELECT DISTINCT u.id_user, u.nama 'user', d.id_objek, o.nama objek, d.tgl_inspeksi
		FROM t_detail d
		INNER JOIN t_detail_sarana ds ON ds.id_detail=d.id_detail
		INNER JOIN t_user u ON u.id_user=d.id_user
		INNER JOIN t_objek o ON o.id_objek=d.id_objek");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function sarana($id_user,$id_objek,$tgl)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama, u.jabatan, d.tgl_inspeksi, o.nama nama_objek, s.nama_sarana, ds.lokasi, ds.KM, ds.kondisi, ds.volume, ds.satuan, ds.KK, ds.rencana_tl, ds.selesai_tl, ds.dana, ds.keterangan
		FROM t_detail d
		INNER JOIN t_detail_sarana ds ON d.id_detail=ds.id_detail
		INNER JOIN t_user u ON u.id_user=d.id_user
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_sarana s ON s.id_sarana=ds.id_sarana
		WHERE d.id_user='$id_user'
		AND d.id_objek='$id_objek'
		AND d.tgl_inspeksi='$tgl'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function rekanan($id_user,$id_objek,$tgl)
	{
		$sql = mysql_query("
		SELECT DISTINCT r.nama nama_rekanan, s.nama_sarana
		FROM t_detail d
		INNER JOIN t_detail_rekanan dr ON dr.id_detail=d.id_detail
		INNER JOIN t_rekanan r ON r.id_rekanan=dr.id_rekanan
		INNER JOIN t_detail_sarana ds ON ds.id_detail=d.id_detail
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_sarana s ON s.id_objek=d.id_objek
		WHERE d.id_user='$id_user'
		AND d.id_objek='$id_objek'
		AND d.tgl_inspeksi='$tgl'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
}
?>
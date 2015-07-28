<?php
class pdf_pemeliharaan
{
	public function tampil($id_lingkup)
	{
		if ($id_lingkup != 3)
		{
			$sql = mysql_query("
			SELECT DISTINCT dk.id_user, u.nama USER, dk.tgl_inspeksi, o.id_lingkup
			FROM t_detail d
			INNER JOIN t_detail_kelengkapan dk ON d.id_detail_kel=dk.id_detail_kel
			INNER JOIN t_user u ON dk.id_user=u.id_user
			INNER JOIN t_objek o ON d.id_objek=o.id_objek
			INNER JOIN t_lingkup li ON li.id_lingkup=o.id_lingkup
			WHERE o.id_lingkup=$id_lingkup");
		}
		else if($id_lingkup == 3)
		{
			$sql = mysql_query("
			SELECT DISTINCT dk.id_user, u.nama USER, dk.tgl_inspeksi, o.id_lingkup, l.id_lokasi, l.nama nama_lokasi
			FROM t_detail d
			INNER JOIN t_detail_kelengkapan dk ON d.id_detail_kel=dk.id_detail_kel
			INNER JOIN t_user u ON dk.id_user=u.id_user
			INNER JOIN t_objek o ON d.id_objek=o.id_objek
			INNER JOIN t_lingkup li ON li.id_lingkup=o.id_lingkup
			INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
			WHERE o.id_lingkup=$id_lingkup");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function banyak_tampil($id_lingkup)
	{
		$sql = mysql_query("
		SELECT DISTINCT dk.id_user, u.nama USER, dk.tgl_inspeksi, o.id_lingkup
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON d.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_objek o ON d.id_objek=o.id_objek
		INNER JOIN t_lingkup li ON li.id_lingkup=o.id_lingkup
		WHERE o.id_lingkup=$id_lingkup");
		$data = mysql_num_rows($sql);
		return $data;
	}
	
	public function objek($id_user,$tgl_inspeksi,$id_lingkup)
	{
		$sql = mysql_query("
		SELECT DISTINCT o.nama, o.id_objek, o.id_lingkup
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON u.id_user=dk.id_user
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_lingkup li ON li.id_lingkup=o.id_lingkup
		WHERE dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'
		AND o.id_lingkup=$id_lingkup");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function banyak_objek($id_user,$tgl_inspeksi,$id_lingkup)
	{
		$sql = mysql_query("
		SELECT DISTINCT o.nama, o.id_objek, o.id_lingkup
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON u.id_user=dk.id_user
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_lingkup li ON li.id_lingkup=o.id_lingkup
		WHERE dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'
		AND o.id_lingkup=$id_lingkup");
		$data = mysql_num_rows($sql);
		return $data;
	}
	
	public function tindakan($id_objek,$id_user,$tgl_inspeksi)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,l.nama lokasi,o.nama nama_objek,s.nama nama_subobjek,t.nama nama_tindakan,t_detail_tindakan.kriteria
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON d.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_tindakan ON t_detail_tindakan.id_detail=d.id_detail
		INNER JOIN t_tindakan t ON t.id_tindakan=t_detail_tindakan.id_tindakan
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	//berubah
	public function indikasi($id_objek,$id_user,$tgl_inspeksi)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!=NULL OR l.nama!='-',l.nama,'-') AS lokasi,o.nama nama_objek,s.nama nama_subobjek,IF (d.km_awal!=NULL OR d.km_awal!='-',d.km_awal,'-') AS km_awal,IF (d.km_akhir!=NULL OR d.km_akhir!='-',d.km_akhir,'-') AS km_akhir,i.nama nama_indikasi,di.kriteria,di.KK, di.prioritas, di.rencana_tl, di.selesai_tl, IF (d.keterangan!=NULL OR d.keterangan!='-',d.keterangan,'-') AS keterangan, IF (di.rekanan!='NULL' OR di.rekanan!='-',di.rekanan,'-') AS rekanan, IF (di.catatan_perbaikan!=NULL OR di.catatan_perbaikan!='-',di.catatan_perbaikan,'-') AS catatan_perbaikan, IF (d.lajur!=NULL OR d.lajur!='-',d.lajur,'-') AS lajur
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.`id_detail_kel`
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function banyak_subobjek_tindakan($id_objek,$id_user,$tgl_inspeksi)
	{
		$sql = mysql_query("
		SELECT DISTINCT s.nama nama_subobjek, s.id_subobjek
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_tindakan ON t_detail_tindakan.id_detail=d.id_detail
		INNER JOIN t_tindakan t ON t.id_tindakan=t_detail_tindakan.id_tindakan
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	//berubah
	public function banyak_subobjek_indikasi($id_objek,$id_user,$tgl_inspeksi)
	{
		$sql = mysql_query("
		SELECT DISTINCT s.nama nama_subobjek, s.id_subobjek, IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'-') AS foto1, IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'-') AS foto2, IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'-') AS foto3, IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'-') AS foto4, IF (d.foto0!='-' OR d.foto0!=NULL,d.foto0,'-') AS foto0, IF (d.foto50!='-' OR d.foto50!=NULL,d.foto50,'-') AS foto50, IF (d.foto100!='-' OR d.foto100!=NULL,d.foto100,'-') AS foto100
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi ON t_detail_indikasi.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=t_detail_indikasi.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'
		ORDER BY s.id_subobjek ASC");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function item($id_objek,$id_user,$tgl_inspeksi,$id_lokasi)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!=NULL OR l.nama!='-',l.nama,'-') as lokasi,o.nama nama_objek,s.nama nama_subobjek,i.nama as nama_item,di.kriteria,di.rencana_tl,di.selesai_tl,IF (d.keterangan!=NULL OR d.keterangan!='-',d.keterangan,'-') AS keterangan, IF (di.rekanan!=NULL OR di.rekanan!='-',di.rekanan,'-') AS rekanan, di.catatan_perbaikan
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_item di ON di.id_detail=d.id_detail
		INNER JOIN t_item i ON i.id_item=di.id_item
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'
		AND d.id_lokasi='$id_lokasi'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	//berubah
	public function banyak_subobjek_item($id_objek,$id_user,$tgl_inspeksi,$id_lokasi)
	{
		$sql = mysql_query("
		SELECT DISTINCT s.nama nama_subobjek, s.bagian, IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'-') AS foto1, IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'-') AS foto2, IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'-') AS foto3, IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'-') AS foto4, IF (d.foto0!='-' OR d.foto0!=NULL,d.foto0,'-') AS foto0, IF (d.foto50!='-' OR d.foto50!=NULL,d.foto50,'-') AS foto50, IF (d.foto100!='-' OR d.foto100!=NULL,d.foto100,'-') AS foto100
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_item ON t_detail_item.id_detail=d.id_detail
		INNER JOIN t_item i ON i.id_item=t_detail_item.id_item
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'
		AND d.id_lokasi='$id_lokasi'
		ORDER BY nama_subobjek ASC");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function subobjek($id_objek)
	{
		$sql = mysql_query("
		SELECT DISTINCT nama
		FROM t_subobjek
		WHERE id_objek='$id_objek'
		ORDER BY nama");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	public function lingkup()
	{
		$sql = mysql_query("
		SELECT DISTINCT id_lingkup,nama FROM t_lingkup");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function apd($id_lingkup,$id_user,$tgl_inspeksi)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,li.nama AS lingkup,k.nama AS kelengkapan,ddk.kriteria,IF (dk.catatan!=NULL OR dk.catatan!='-',dk.catatan,'-') AS catatan,k.kategori, IF (dk.foto1!='-' OR dk.foto1!=NULL,dk.foto1,'-') AS foto1, IF (dk.foto2!='-' OR dk.foto2!=NULL,dk.foto2,'-') AS foto2, IF (dk.foto3!='-' OR dk.foto3!=NULL,dk.foto3,'-') AS foto3, IF (dk.foto4!='-' OR dk.foto4!=NULL,dk.foto4,'-') AS foto4
		FROM t_detail_kelengkapan dk
		INNER JOIN t_detail_detail_kelengkapan ddk ON ddk.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_kelengkapan k ON k.id_kelengkapan=ddk.id_kelengkapan
		INNER JOIN t_detail d ON d.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_user u ON u.id_user=dk.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_lingkup li ON li.id_lingkup=o.id_lingkup
		WHERE o.id_lingkup=$id_lingkup
		AND u.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	// dari sini untuk yang kika ++++++++ ++++ +++++ ++++ ++++
	
	//FUNCTION TINDAKAN BERUBAH, SOALNYA TABLE T_DETAIL_TINDAKAN BERUBAH FIELDNYA
	public function tindakan_persubobjek($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$subobjek)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,d.tgl_inspeksi,l.nama lokasi,o.nama nama_objek,s.nama nama_subobjek,t.nama nama_tindakan,t_detail_tindakan.kriteria
		FROM t_detail d
		INNER JOIN t_user u ON d.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_tindakan ON t_detail_tindakan.id_detail=d.id_detail
		INNER JOIN t_tindakan t ON t.id_tindakan=t_detail_tindakan.id_tindakan
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND d.id_user='$id_user'
		AND d.tgl_inspeksi='$tgl_inspeksi'
		AND d.id_lokasi='$id_lokasi'
		AND d.id_subobjek='$subobjek'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	//FUNCTION INDIKASI BERUBAH, SOALNYA TABLE T_DETAIL_INDIKASI BERUBAH FIELDNYA
	public function indikasi_persubobjek($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$subobjek)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,d.tgl_inspeksi,l.nama lokasi,o.nama nama_objek,s.nama nama_subobjek,d.km_awal,d.km_akhir,i.nama nama_indikasi,di.kriteria,di.KK, di.prioritas, di.rencana_tl, di.selesai_tl, di.dana, d.keterangan
		FROM t_detail d
		INNER JOIN t_user u ON d.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		LEFT JOIN t_rekanan r ON dr.id_rekanan=r.id_rekanan
		WHERE d.id_objek='$id_objek'
		AND d.id_user='$id_user'
		AND d.tgl_inspeksi='$tgl_inspeksi'
		AND d.id_lokasi='$id_lokasi'
		AND d.id_subobjek='$subobjek'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function penilaian($nama,$tgl_awal,$tgl_akhir)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama, u.id_user, 
		(SELECT DISTINCT COUNT(s_d.id_detail)
		FROM t_detail s_d
		INNER JOIN t_detail_kelengkapan s_dk ON s_d.id_detail_kel=s_dk.id_detail_kel
		INNER JOIN t_detail_detail_kelengkapan s_ddk ON s_ddk.id_detail_kel=s_dk.id_detail_kel
		INNER JOIN t_detail_inspeksi s_di ON s_di.id_detail_kelengkapan=s_dk.id_detail_kel
		INNER JOIN t_user s_u ON s_u.id_user=s_dk.id_user
		INNER JOIN t_objek s_o ON s_o.id_objek=s_d.id_objek
		WHERE (dk.tgl_inspeksi BETWEEN '$tgl_awal' AND '$tgl_akhir')
		AND s_u.id_user=u.id_user
		AND s_o.id_objek=o.id_objek) AS banyak_inspeksi
		FROM t_user u
		INNER JOIN t_detail_kelengkapan dk ON dk.id_user=u.id_user
		INNER JOIN t_detail_detail_kelengkapan ddk ON ddk.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_detail_inspeksi di ON di.id_detail_kelengkapan=dk.id_detail_kel
		INNER JOIN t_detail d ON d.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_objek o ON d.id_objek=o.id_objek
		WHERE (dk.tgl_inspeksi BETWEEN '$tgl_awal' AND '$tgl_akhir')
		AND u.nama = '$nama'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function detail_penilaian($id_user,$tgl_awal,$tgl_akhir)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama, u.id_user, u.foto, dk.tgl_inspeksi, o.nama AS nama_objek, 
		(SELECT DISTINCT COUNT(s_d.id_detail)
		FROM t_detail s_d
		INNER JOIN t_detail_kelengkapan s_dk ON s_d.id_detail_kel=s_dk.id_detail_kel
		INNER JOIN t_detail_detail_kelengkapan s_ddk ON s_ddk.id_detail_kel=s_dk.id_detail_kel
		INNER JOIN t_detail_inspeksi s_di ON s_di.id_detail_kelengkapan=s_dk.id_detail_kel
		INNER JOIN t_user s_u ON s_u.id_user=s_dk.id_user
		INNER JOIN t_objek s_o ON s_o.id_objek=s_d.id_objek
		WHERE (dk.tgl_inspeksi BETWEEN '$tgl_awal' AND '$tgl_akhir')
		AND s_u.id_user=u.id_user
		AND s_o.id_objek=o.id_objek) AS banyak_inspeksi
		FROM t_user u
		INNER JOIN t_detail_kelengkapan dk ON dk.id_user=u.id_user
		INNER JOIN t_detail_detail_kelengkapan ddk ON ddk.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_detail_inspeksi di ON di.id_detail_kelengkapan=dk.id_detail_kel
		INNER JOIN t_detail d ON d.id_detail_kel=dk.id_detail_kel
		INNER JOIN t_objek o ON d.id_objek=o.id_objek
		WHERE (dk.tgl_inspeksi BETWEEN '$tgl_awal' AND '$tgl_akhir')
		AND u.id_user = '$id_user'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
}
?>
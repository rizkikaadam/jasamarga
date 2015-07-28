<?php
class tampil_suep
{
	//tampil apd
	public function tampil_apd($id_lingkup)
	{
		$sql = mysql_query ("SELECT DISTINCT  dk.`tgl_inspeksi`,u.`nama`,lo.`nama` AS lokasi,dk.`id_detail_kel`,
							u.id_user,lo.id_lokasi
							FROM t_detail_kelengkapan dk 
							INNER JOIN t_user u ON dk.`id_user`=u.`id_user`
							INNER JOIN t_detail d ON d.`id_detail_kel`=dk.`id_detail_kel`
							INNER JOIN t_objek o ON o.`id_objek`=d.`id_objek`
							INNER JOIN t_lingkup li ON li.`id_lingkup`=o.`id_lingkup`
							WHERE li.`id_lingkup`='$id_lingkup'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function banyak_apd($id_lingkup)
	{
		$sql = mysql_query ("SELECT DISTINCT  dk.`tgl_inspeksi`,u.`nama`,dk.`id_detail_kel`,u.id_user
							FROM t_detail_kelengkapan dk 
							INNER JOIN t_user u ON dk.`id_user`=u.`id_user`
							INNER JOIN t_detail d ON d.`id_detail_kel`=dk.`id_detail_kel`
							INNER JOIN t_objek o ON o.`id_objek`=d.`id_objek`
							INNER JOIN t_lingkup li ON li.`id_lingkup`=o.`id_lingkup`
							WHERE li.`id_lingkup`='$id_lingkup'");
		$data = mysql_num_rows($sql);
		return $data;
	}
	
	//menampilkan banyak subobjek
	public function tampil_subobjek($id_objek,$id_lokasi,$awal,$akhir)
	{
		$sql = mysql_query ("SELECT * FROM vwins_apd_subobjek
							WHERE id_objek='$id_objek' AND id_lokasi='$id_lokasi' AND awal='$awal' AND akhir='$akhir'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function tampil_apd_urut($id_lingkup,$bulan,$tahun)
	{
		
		if ($bulan!=0 AND $tahun!=0)
		{
			$sql = mysql_query("
								SELECT * FROM vwins_apd
								WHERE id_lingkup='$id_lingkup'
								AND substr(tgl_inspeksi,6,2)='$bulan' 
								AND substr(tgl_inspeksi,1,4)='$tahun'");
		}
		else if($bulan!=0 AND $tahun=0)
		{
			$sql = mysql_query("
								SELECT * FROM vwins_apd
								WHERE id_lingkup='$id_lingkup'
								AND substr(tgl_inspeksi,6,2)='$bulan'");
		}
		else if ($bulan=0 AND $tahun!=0)
		{
			$sql = mysql_query("
								SELECT * FROM vwins_apd
								WHERE id_lingkup='$id_lingkup'
								AND substr(tgl_inspeksi,1,4)='$tahun'");
		}
		else
		{
			$sql = mysql_query ("SELECT * FROM vwins_apd
								WHERE id_lingkup='$id_lingkup'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	//tampil nama inspekto apd
	public function tampil_inspektor_apd($id_lingkup,$id_detail_kel)
	{
		$sql = mysql_query ("SELECT DISTINCT  dk.`tgl_inspeksi`,u.`nama`,lo.`nama` AS lokasi,dk.`id_detail_kel`,
							u.id_user,lo.id_lokasi,dk.catatan
							FROM t_detail_kelengkapan dk 
							INNER JOIN t_user u ON dk.`id_user`=u.`id_user`
							INNER JOIN t_detail d ON d.`id_detail_kel`=dk.`id_detail_kel`
							INNER JOIN t_objek o ON o.`id_objek`=d.`id_objek`
							INNER JOIN t_lingkup li ON li.`id_lingkup`=o.`id_lingkup`
							INNER JOIN t_lokasi lo ON lo.`id_lokasi`=d.`id_lokasi`
							WHERE li.`id_lingkup`='$id_lingkup'
							AND dk.id_detail_kel='$id_detail_kel' ");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	//untuk subobjek untuk tindakan
	public function subobjek_tindakan($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir)
	{
		$sql = mysql_query("
		SELECT DISTINCT s.nama nama_subobjek, s.id_subobjek, IF (d.foto1!='-',d.foto1,'-') AS foto1, IF (d.foto2!='-',d.foto2,'-') AS foto2, IF (d.foto3!='-',d.foto3,'-') AS foto3, IF (d.foto4!='-',d.foto4,'-') AS foto4,
		t_detail_tindakan.`kriteria`,t.nama nama_tindakan,d.`km_awal`,d.`km_akhir`
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
		AND dk.tgl_inspeksi='$tgl_inspeksi'
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	//untuk subjek untuk indikasi
	public function subobjek_indikasi($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir)
	{
		$sql = mysql_query("
		SELECT DISTINCT s.nama nama_subobjek, s.id_subobjek, 
		IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'no-photo.jpg') AS foto1, 
		IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'no-photo.jpg') AS foto2, 
		IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'no-photo.jpg') AS foto3, 
		IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'no-photo.jpg') AS foto4,
		IF (d.foto0!='-' OR d.foto0!=NULL,d.foto0,'no-photo.jpg') AS foto0, 
		IF (d.foto50!='-' OR d.foto50!=NULL,d.foto50,'no-photo.jpg') AS foto50, 
		IF (d.foto100!='-' OR d.foto100!=NULL,d.foto100,'no-photo.jpg') AS foto100, 
		di.KK,i.nama nama_indikasi,di.kriteria, di.prioritas, di.rencana_tl, di.selesai_tl, 
		IF (di.rekanan!='NULL' OR di.rekanan!='-',di.rekanan,'-') AS rekanan,
		di.`id_detail_indikasi`,d.`km_awal`,d.`km_akhir`,di.`catatan_perbaikan`,
		di.`id_detail_indikasi`
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	
	//tampil untuk kelola perbaikan
	public function kelola_indikasi($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir,$id)
	{
		$sql = mysql_query("
		SELECT DISTINCT s.nama nama_subobjek, s.id_subobjek, 
		IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'no-photo.jpg') AS foto1, 
		IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'no-photo.jpg') AS foto2, 
		IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'no-photo.jpg') AS foto3, 
		IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'no-photo.jpg') AS foto4,
		di.KK,i.nama nama_indikasi,di.kriteria, di.prioritas, di.rencana_tl, di.selesai_tl, 
		IF (di.rekanan!='NULL' OR di.rekanan!='-',di.rekanan,'-') AS rekanan,
		di.`id_detail_indikasi`,d.`km_awal`,d.`km_akhir`,dk.`tgl_inspeksi`,di.`catatan_perbaikan`,
		di.`id_detail_indikasi`,d.id_detail
		FROM t_detail d
		INNER JOIN t_detail_kelengkapan dk ON dk.id_detail_kel=d.id_detail_kel
		INNER JOIN t_user u ON dk.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND dk.id_user='$id_user'
		AND dk.tgl_inspeksi='$tgl_inspeksi'
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'
		AND di.id_detail_indikasi='$id'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	// untuk subjek untuk item
	public function subobjek_item($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!=NULL OR l.nama!='-',l.nama,'-') as lokasi,o.nama nama_objek,s.nama nama_subobjek,
		i.nama as nama_item,di.kriteria,di.rencana_tl,di.selesai_tl,di.catatan_perbaikan,
		IF (di.rekanan!=NULL OR di.rekanan!='-',di.rekanan,'-') AS rekanan,
		di.`id_detail_item`,d.`km_awal`,d.`km_akhir`,
		IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'no-photo.jpg') AS foto1, 
		IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'no-photo.jpg') AS foto2, 
		IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'no-photo.jpg') AS foto3, 
		IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'no-photo.jpg') AS foto4
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
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	// untuk subjek untuk item
	public function kelola_item($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir,$id)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!=NULL OR l.nama!='-',l.nama,'-') as lokasi,o.nama nama_objek,s.nama nama_subobjek,
		i.nama as nama_item,di.kriteria,di.rencana_tl,di.selesai_tl,di.catatan_perbaikan,
		IF (di.rekanan!=NULL OR di.rekanan!='-',di.rekanan,'-') AS rekanan,
		di.`id_detail_item`,d.`km_awal`,d.`km_akhir`,d.id_detail,
		IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'no-photo.jpg') AS foto1, 
		IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'no-photo.jpg') AS foto2, 
		IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'no-photo.jpg') AS foto3, 
		IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'no-photo.jpg') AS foto4
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
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'
		AND di.id_detail_item='$id'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}

	//tampil untuk item gardu pada objek gedung dan subobjek gardu
	public function item_gardu($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir,$nogardu)
	{
		$sql = mysql_query("SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!=NULL OR l.nama!='-',l.nama,'-') AS lokasi,o.nama nama_objek,s.nama nama_subobjek,
		i.nama AS nama_item,di.kriteria,di.rencana_tl,di.selesai_tl,di.catatan_perbaikan,
		IF (di.rekanan!=NULL OR di.rekanan!='-',di.rekanan,'-') AS rekanan,
		di.`id_detail_item`,d.`km_awal`,d.`km_akhir`,d.nogardu,d.lajur,di.id_detail_item,
		IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'no-photo.jpg') AS foto1, 
		IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'no-photo.jpg') AS foto2, 
		IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'no-photo.jpg') AS foto3, 
		IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'no-photo.jpg') AS foto4
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
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'
		AND d.nogardu='$nogardu'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}

	//tampil untuk item pada objek gedung dan subobjek lajur
	public function item_lajur($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir,$lajur)
	{
		$sql = mysql_query("SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!=NULL OR l.nama!='-',l.nama,'-') AS lokasi,o.nama nama_objek,s.nama nama_subobjek,
		i.nama AS nama_item,di.kriteria,di.rencana_tl,di.selesai_tl,di.catatan_perbaikan,
		IF (di.rekanan!=NULL OR di.rekanan!='-',di.rekanan,'-') AS rekanan,
		di.`id_detail_item`,d.`km_awal`,d.`km_akhir`,d.nogardu,d.lajur,di.id_detail_item,
		IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'no-photo.jpg') AS foto1, 
		IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'no-photo.jpg') AS foto2, 
		IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'no-photo.jpg') AS foto3, 
		IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'no-photo.jpg') AS foto4
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
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'
		AND di.id_detail_item='$id'
		AND d.lajur='$lajur'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}

	//menampilkan banyak gardu
	public function tampil_gardu($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir)
	{
		$sql = mysql_query("SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!=NULL OR l.nama!='-',l.nama,'-') AS lokasi,o.nama nama_objek,s.nama nama_subobjek,
		i.nama AS nama_item,di.kriteria,di.rencana_tl,di.selesai_tl,di.catatan_perbaikan,
		IF (di.rekanan!=NULL OR di.rekanan!='-',di.rekanan,'-') AS rekanan,
		di.`id_detail_item`,d.`km_awal`,d.`km_akhir`,d.nogardu,d.lajur,d.id_lokasi,u.id_user,o.id_objek,s.id_subobjek,
		IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'no-photo.jpg') AS foto1, 
		IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'no-photo.jpg') AS foto2, 
		IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'no-photo.jpg') AS foto3, 
		IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'no-photo.jpg') AS foto4
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
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'
		and d.lajur='-'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}

	//menampilkan banyak gardu
	public function tampil_lajur($id_objek,$id_user,$tgl_inspeksi,$id_lokasi,$id_subobjek,$awal,$akhir)
	{
		$sql = mysql_query("SELECT DISTINCT u.nama,u.jabatan,dk.tgl_inspeksi,IF (l.nama!=NULL OR l.nama!='-',l.nama,'-') AS lokasi,o.nama nama_objek,s.nama nama_subobjek,
		i.nama AS nama_item,di.kriteria,di.rencana_tl,di.selesai_tl,di.catatan_perbaikan,
		IF (di.rekanan!=NULL OR di.rekanan!='-',di.rekanan,'-') AS rekanan,
		di.`id_detail_item`,d.`km_awal`,d.`km_akhir`,d.nogardu,d.lajur,d.id_lokasi,u.id_user,o.id_objek,s.id_subobjek,
		IF (d.foto1!='-' OR d.foto1!=NULL,d.foto1,'no-photo.jpg') AS foto1, 
		IF (d.foto2!='-' OR d.foto2!=NULL,d.foto2,'no-photo.jpg') AS foto2, 
		IF (d.foto3!='-' OR d.foto3!=NULL,d.foto3,'no-photo.jpg') AS foto3, 
		IF (d.foto4!='-' OR d.foto4!=NULL,d.foto4,'no-photo.jpg') AS foto4
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
		AND d.id_lokasi='$id_lokasi'
		AND d.`km_awal`='$awal'
		AND d.`km_akhir`='$akhir'
		AND d.`id_subobjek`='$id_subobjek'
		and d.nogardu='-'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}

	//tampil objek yang diinspeksi
	public function tampil_objek_ins($id_lingkup,$id_detail_kel)
	{
		$sql = mysql_query ("SELECT * FROM vwins_apd_objek
							WHERE 
							id_lingkup='$id_lingkup' AND id_detail_kel='$id_detail_kel' ");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	//tampil objek yang diinspeksi
	public function tampil_objek_ins_gedung($id_lingkup,$id_detail_kel)
	{
		$sql = mysql_query ("SELECT * FROM vwins_objek_ins_gedung
							WHERE 
							id_lingkup='$id_lingkup' AND id_detail_kel='$id_detail_kel' ");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
}
?>
<?php
class detail 
{
	public $id;
	public $id_detail;
	public $selesai_tl;
	public $rencana_tl;
	public $dana;
	public $rekanan;
	public $catatan_perbaikan;
	public $photo0;
	public $photo50;
	public $photo100;
	
	public function sub_objek($id_objek,$npp,$tgl_inspeksi,$id_lokasi)
	{
		$sql = mysql_query("
		SELECT DISTINCT s.nama nama_subobjek,s.id_subobjek
		FROM t_detail d 
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		WHERE d.id_objek='$id_objek'
		AND d.id_user='$npp'
		AND d.tgl_inspeksi='$tgl_inspeksi'
		AND d.id_lokasi='$id_lokasi'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function semua_indikasi($id_objek,$npp,$tgl_inspeksi,$id_lokasi,$sub_objek)
	{
		$sql = mysql_query("
		SELECT DISTINCT di.`id_detail_indikasi`,s.`id_subobjek`,u.nama,u.jabatan,d.tgl_inspeksi,l.nama lokasi,o.nama nama_objek,s.nama nama_subobjek,i.nama nama_indikasi,di.kriteria,di.KK, di.prioritas, di.rencana_tl, di.selesai_tl, di.dana, di.keterangan, IF (r.nama!='NULL',r.nama,'-') AS rekanan
		FROM t_detail d
		INNER JOIN t_user u ON d.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		LEFT JOIN t_detail_rekanan dr ON di.id_detail_indikasi=dr.id_detail_indikasi
		LEFT JOIN t_rekanan r ON dr.id_rekanan=r.id_rekanan
		WHERE d.id_objek='$id_objek'
		AND d.`id_user`='$npp'
		AND d.id_lokasi='$id_lokasi'
		AND d.`tgl_inspeksi`='$tgl_inspeksi'
		AND s.nama='$sub_objek'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	public function semua_tindakan($id_objek,$npp,$tgl_inspeksi,$id_lokasi,$sub_objek)
	{
		$sql = mysql_query("
		SELECT DISTINCT d.`id_detail`,
		a.`kriteria`,
		v.`nama`
		FROM t_detail d 
		INNER JOIN t_detail_tindakan a ON a.`id_detail`=d.`id_detail`
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		INNER JOIN t_user u ON u.`id_user`=d.`id_user`
		INNER JOIN t_tindakan v ON v.`id_subobjek`=d.`id_subobjek`
		WHERE d.id_objek='$id_objek'
		AND d.`id_user`='$npp'
		AND d.id_lokasi='$id_lokasi'
		AND d.`tgl_inspeksi`='$tgl_inspeksi'
		AND s.nama='$sub_objek'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	public function tampil_tahun($id_lingkup)
		{
			$sql= mysql_query("SELECT SUBSTR(tgl_inspeksi,1,4) AS tahun FROM vwins_apd WHERE id_lingkup='$id_lingkup'");
			while ($jmlh = mysql_fetch_array($sql))
			$data[] = $jmlh;
			return $data;
		}	
		
	public function tampil($jenis,$tahun,$bulan)
	{
		if($bulan==0 or $bulan =="")
		{
			$sql = mysql_query("
			SELECT DISTINCT d.id_user, u.nama USER, d.id_objek, o.nama Objek, d.id_lokasi, l.nama lokasi, d.tgl_inspeksi
			FROM t_detail d
			INNER JOIN t_user u ON d.id_user=u.id_user
			INNER JOIN t_objek o ON d.id_objek=o.id_objek
			INNER JOIN t_lokasi l ON d.id_lokasi=l.id_lokasi
			WHERE d.id_objek='$jenis'");
		}
		else if ($bulan!=0)
		{
			$sql = mysql_query("
			SELECT DISTINCT d.id_user, u.nama USER, d.id_objek, o.nama Objek, d.id_lokasi, l.nama lokasi, d.tgl_inspeksi
			FROM t_detail d
			INNER JOIN t_user u ON d.id_user=u.id_user
			INNER JOIN t_objek o ON d.id_objek=o.id_objek
			INNER JOIN t_lokasi l ON d.id_lokasi=l.id_lokasi
			WHERE d.id_objek='$jenis'
			AND substr(d.tgl_inspeksi,6,2)='$bulan' 
			AND substr(d.tgl_inspeksi,1,4)='$tahun'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function hitung_tampil($jenis,$tahun,$bulan)
	{
			if($bulan==0 or $bulan =="")
		{
			$sql = mysql_query("
			SELECT DISTINCT d.id_user, u.nama USER, d.id_objek, o.nama Objek, d.id_lokasi, l.nama lokasi, d.tgl_inspeksi
			FROM t_detail d
			INNER JOIN t_user u ON d.id_user=u.id_user
			INNER JOIN t_objek o ON d.id_objek=o.id_objek
			INNER JOIN t_lokasi l ON d.id_lokasi=l.id_lokasi
			WHERE d.id_objek='$jenis'");
		}
		else if ($bulan!=0)
		{
			$sql = mysql_query("
			SELECT DISTINCT d.id_user, u.nama USER, d.id_objek, o.nama Objek, d.id_lokasi, l.nama lokasi, d.tgl_inspeksi
			FROM t_detail d
			INNER JOIN t_user u ON d.id_user=u.id_user
			INNER JOIN t_objek o ON d.id_objek=o.id_objek
			INNER JOIN t_lokasi l ON d.id_lokasi=l.id_lokasi
			WHERE d.id_objek='$jenis'
			AND substr(d.tgl_inspeksi,6,2)='$bulan' 
			AND substr(d.tgl_inspeksi,1,4)='$tahun'");
		};
		
		$jumlah_baris = mysql_num_rows($sql);
			return $jumlah_baris ;
	}
	public function hitung_semua_indikasi($id_objek)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,d.tgl_inspeksi,l.nama lokasi,o.nama nama_objek,s.nama nama_subobjek,i.nama nama_indikasi,di.kriteria,di.KK, di.prioritas, di.rencana_tl, di.selesai_tl, di.dana, di.keterangan, IF (r.nama!='NULL',r.nama,'-') AS rekanan
		FROM t_detail d
		INNER JOIN t_user u ON d.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		LEFT JOIN t_detail_rekanan dr ON di.id_detail_indikasi=dr.id_detail_indikasi
		LEFT JOIN t_rekanan r ON dr.id_rekanan=r.id_rekanan
		WHERE (di.`rencana_tl`='0000-00-00' OR di.`selesai_tl`='0000-00-00' OR di.`dana`=0 OR r.`nama`='' OR r.`nama`='-')
		AND d.id_objek='$id_objek'");
		 
		$jumlah_baris = mysql_num_rows($sql);
			return $jumlah_baris ;
	}
	public function semua_indikasi_edit($id_objek,$npp,$tgl_inspeksi,$id_lokasi,$sub_objek,$id)
	{
		$sql = mysql_query("
		SELECT DISTINCT di.`id_detail_indikasi`,s.`id_subobjek`,u.nama,u.jabatan,d.tgl_inspeksi,l.nama lokasi,o.nama nama_objek,s.nama nama_subobjek,i.nama nama_indikasi,di.kriteria,di.KK, di.prioritas, di.rencana_tl, di.selesai_tl, di.dana, di.keterangan, IF (r.nama!='NULL',r.nama,'-') AS rekanan
		FROM t_detail d
		INNER JOIN t_user u ON d.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		LEFT JOIN t_detail_rekanan dr ON di.id_detail_indikasi=dr.id_detail_indikasi
		LEFT JOIN t_rekanan r ON dr.id_rekanan=r.id_rekanan
		WHERE d.id_objek='$id_objek'
		AND d.`id_user`='$npp'
		AND d.id_lokasi='$id_lokasi'
		AND d.`tgl_inspeksi`='$tgl_inspeksi'
		AND s.id_subobjek='$sub_objek'
		AND di.id_detail_indikasi='$id'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	public function edit_indikasi()
	{
		
		$query = mysql_query("UPDATE t_detail_indikasi SET selesai_tl='$this->selesai_tl',
		rencana_tl='$this->rencana_tl',
		rekanan='$this->rekanan'
		WHERE id_detail_indikasi='$this->id'");
		if($query)
		{
		echo '<script type="text/javascript">alert("berhasil Merubah Data ! ");
				opener.location.reload(true);
				self.close();
			  </script>'; 
			//echo "<meta http-equiv='refresh' content='0; url=laporan.php?pilihan=Laporan&hid=2'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Merubah Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=laporan.php?pilihan=Laporan&hid=2'>";
		}
	}
	public function input_perbaikan()
	{
		$query = mysql_query("UPDATE t_detail_indikasi SET selesai_tl='$this->selesai_tl',
		catatan_perbaikan='$this->catatan_perbaikan'
		WHERE id_detail_indikasi='$this->id'");
		$query2 = mysql_query("UPDATE t_detail SET
		foto0='$this->photo0',
		foto50='$this->photo50',
		foto100='$this->photo100'
		WHERE id_detail='$this->id_detail'");
		if($query and $query2)
		{
		//rename("popup_image/photo/perbaikan/$nama_file","popup_image/photo/perbaikan/$nama_file");
		echo '<script type="text/javascript">alert("Berhasil Memasukan Data Perbaikan ! ");
				opener.location.reload(true);
				self.close();
			  </script>'; 
			//echo "<meta http-equiv='refresh' content='0; url=laporan.php?pilihan=Laporan&hid=2'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Memasukan Data Perbaikan !");opener.location.reload(true);
				self.close();
			  </script>'; 
		}
	}
	public function input_perbaikan_gedung()
	{
		
		$query = mysql_query("UPDATE t_detail_item SET selesai_tl='$this->selesai_tl',
		catatan_perbaikan='$this->catatan_perbaikan'
		WHERE id_detail_item='$this->id'");
		$query2 = mysql_query("UPDATE t_detail SET
		foto0='$this->photo0',
		foto50='$this->photo50',
		foto100='$this->photo100'
		WHERE id_detail='$this->id_detail'");
		if($query and $query2)
		{
		echo '<script type="text/javascript">alert("Berhasil Memasukan Data Perbaikan ! ");
				opener.location.reload(true);
				self.close();
			  </script>'; 
			//echo "<meta http-equiv='refresh' content='0; url=laporan.php?pilihan=Laporan&hid=2'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Memasukan Data Perbaikan !");opener.location.reload(true);
				self.close();
			  </script>'; 
		}
	}
	public function edit_item()
	{
		
		$query = mysql_query("UPDATE t_detail_item SET selesai_tl='$this->selesai_tl',
		rencana_tl='$this->rencana_tl',
		rekanan='$this->rekanan'
		WHERE id_detail_item='$this->id'");
		if($query)
		{
		echo '<script type="text/javascript">alert("berhasil Merubah Data Item ! ");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=laporan.php?pilihan=Laporan&hid=2'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Merubah Data Item !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=laporan.php?pilihan=Laporan&hid=2'>";
		}
	}
	public function hitung_indikasi($id_objek)
	{
		$sql = mysql_query("
		SELECT DISTINCT u.nama,u.jabatan,d.tgl_inspeksi,l.nama lokasi,o.nama nama_objek,s.nama nama_subobjek,i.nama nama_indikasi,di.kriteria,di.KK, di.prioritas, di.rencana_tl, di.selesai_tl, di.dana, di.keterangan, IF (r.nama!='NULL',r.nama,'-') AS rekanan
		FROM t_detail d
		INNER JOIN t_user u ON d.id_user=u.id_user
		INNER JOIN t_lokasi l ON l.id_lokasi=d.id_lokasi
		INNER JOIN t_detail_indikasi di ON di.id_detail=d.id_detail
		INNER JOIN t_indikasi i ON i.id_indikasi=di.id_indikasi
		INNER JOIN t_objek o ON o.id_objek=d.id_objek
		INNER JOIN t_subobjek s ON s.id_subobjek=d.id_subobjek
		LEFT JOIN t_detail_rekanan dr ON di.id_detail_indikasi=dr.id_detail_indikasi
		LEFT JOIN t_rekanan r ON dr.id_rekanan=r.id_rekanan
		WHERE d.id_objek='$id_objek'");
		 
		$jumlah_baris = mysql_num_rows($sql);
			return $jumlah_baris ;
	}
}
?>
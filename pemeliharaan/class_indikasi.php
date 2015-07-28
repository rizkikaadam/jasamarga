<?php
class indikasi
{
	public $id_indikasi;
	public $nama_indikasi;
	public $id_subobjek_indikasi;
	
	public function tampil($id_indikasi)
	{
		if($id_indikasi == "")
		{
			$sql = mysql_query("SELECT t_indikasi.id_indikasi,t_indikasi.nama indikasi,t_subobjek.id_subobjek,t_subobjek.nama FROM t_indikasi INNER JOIN t_subobjek ON t_indikasi.id_subobjek=t_subobjek.id_subobjek order by id_indikasi asc");
		}
		else
		{
			$sql = mysql_query("SELECT t_indikasi.id_indikasi,t_indikasi.nama indikasi,t_subobjek.id_subobjek,t_subobjek.nama FROM t_indikasi INNER JOIN t_subobjek ON t_indikasi.id_subobjek=t_subobjek.id_subobjek WHERE t_indikasi.id_indikasi='$id_indikasi'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function tampil_subobjek()
	{
		
			$sql = mysql_query("SELECT * from t_subobjek");
		
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	
	public function tambah()
	{
		$query = "INSERT INTO t_indikasi VALUES('$this->id_indikasi','$this->nama_indikasi','$this->id_subobjek_indikasi')";
		$hasil = mysql_query($query);
		if ($hasil)
		{
			echo '<script type="text/javascript">alert("berhasil Merubah Data !");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=Indikasi.php?pilihan=Input&hid=3&vvid=4'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Menghapus Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=Indikasi.php?pilihan=Input&hid=3&vvid=4'>";
		}
	}
	
	public function ubah()
	{
		$query = mysql_query("UPDATE t_indikasi SET nama='$this->nama_indikasi' WHERE id_indikasi='$this->id_indikasi'");
		if($query)
		{
		echo '<script type="text/javascript">alert("berhasil Merubah Data !");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=Indikasi.php?pilihan=Input&hid=3&vvid=4'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Menghapus Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=Indikasi.php?pilihan=Input&hid=3&vvid=4'>";
		}
	}

	public function hapus($id)
	{
		/* foreach($id as $value)
		{ */
			$del = mysql_query("DELETE FROM t_indikasi WHERE id_indikasi='$id'");
		/* } */
		if ($del)
		{
			echo '<script type="text/javascript">alert("Indikasi Berhasil dihapus");location= "Indikasi.php?pilihan=Input&hid=3&vvid=4";</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Menghapus Lokasi !");location= "Indikasi.php?pilihan=Input&hid=3&vvid=4";</script>';
		}
	}
	public function halaman1($nama_indk)
	{
			if($nama_indk=="")
				{
				$sql = mysql_query("SELECT * FROM t_indikasi");
				}
			else
			{
			$sql = mysql_query("SELECT * FROM t_indikasi where nama like('%$nama_indk%')");	
			}
				$baris=mysql_num_rows($sql);
				return $baris;
																
	}
	public function halaman2($start,$per_page,$nama_indk)
	{
			if($nama_indk=="")
			{
				$res=mysql_query("SELECT id_indikasi,nama,id_subobjek_indikasi,t_subobjek.nama FROM t_indikasi INNER JOIN t_subobjek ON t_indikasi.id_subobjek_indikasi=t_subobjek.id_subobjek order by id_indikasi asc limit $start,$per_page");
			}
			else
			{
			$res=mysql_query("SELECT id_indikasi,nama,id_subobjek_indikasi,t_subobjek.nama FROM t_indikasi INNER JOIN t_subobjek ON t_indikasi.id_subobjek_indikasi=t_subobjek.id_subobjek where nama_indikasi like ('%$nama_indk%') order by id_indikasi asc limit $start,$per_page");	
			}
				while($jmlh=mysql_fetch_array($res))
				$data[]=$jmlh;
				
				return $data;
	}
	public function subobjek($sub) 
	{
		$sql= mysql_query("SELECT * FROM t_subobjek where id_objek='$sub'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
		
	}
	public function tampil_objek() 
	{
		$sql= mysql_query("SELECT * FROM t_objek");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
		
	}
	public function tampil_id_indikasi()
	{
		$sql=mysql_query("SELECT MAX(SUBSTR(id_indikasi,-4))+1 AS id FROM t_indikasi");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
}
?>
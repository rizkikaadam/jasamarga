<?php
class tindakan
{
	public $id_tindakan;
	public $nama_tindakan;
	public $id_subobjek_tindakan;
	
	public function tampil($id_tindakan)
	{
		if($id_tindakan == "")
		{
			$sql = mysql_query("SELECT id_tindakan,t_tindakan.nama,t_subobjek.id_subobjek,t_subobjek.nama nama_subobjek FROM t_tindakan INNER JOIN t_subobjek ON t_tindakan.id_subobjek=t_subobjek.id_subobjek order by id_tindakan asc");
		}
		else
		{
			$sql = mysql_query("SELECT id_tindakan,t_tindakan.nama,t_subobjek.id_subobjek,t_subobjek.nama nama_subobjek FROM t_tindakan INNER JOIN t_subobjek ON t_tindakan.id_subobjek=t_subobjek.id_subobjek WHERE id_tindakan='$id_tindakan'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	

	public function tambah()
	{
		$query = "INSERT INTO t_tindakan VALUES('$this->id_tindakan','$this->nama_tindakan','$this->id_subobjek_tindakan')";
		$hasil = mysql_query($query);
		if ($hasil)
		{
			echo '<script type="text/javascript">alert("berhasil Menambah Data !");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=Tindakan.php?pilihan=Input&hid=3&vvid=5'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Menambah Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=Tindakan.php?pilihan=Input&hid=3&vvid=5'>";
		}
	}
	
	public function ubah()
	{
		$query = mysql_query("UPDATE t_tindakan SET nama='$this->nama_tindakan' WHERE id_tindakan='$this->id_tindakan'");
		if($query)
		{
			echo '<script type="text/javascript">alert("berhasil Merubah Data !");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=Tindakan.php?pilihan=Input&hid=3&vvid=5'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Merubah Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=Tindakan.php?pilihan=Input&hid=3&vvid=5'>";
		}
	}

	public function hapus($id)
	{
			$del = mysql_query("DELETE FROM t_tindakan WHERE id_tindakan='$id'");
		if ($del)
		{
			echo '<script type="text/javascript">alert("berhasil Menghapus Data !");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=Tindakan.php?pilihan=Input&hid=3&vvid=5'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Menghapus Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=Tindakan.php?pilihan=Input&hid=3&vvid=5'>";
		}
	}
	public function halaman1($nama_tind)
	{
			if($nama_tind=="")
				{
				$sql = mysql_query("SELECT * FROM t_tindakan");
				}
			else
			{
			$sql = mysql_query("SELECT * FROM t_tindakan where nama_tindakan like('%$nama_tind%')");	
			}
				$baris=mysql_num_rows($sql);
				return $baris;
																
	}
	public function halaman2($start,$per_page,$nama_tind)
	{
			if($nama_tind=="")
			{
				$res=mysql_query("SELECT id_tindakan,nama_tindakan,id_subobjek_tindakan,nama_subobjek FROM t_tindakan INNER JOIN t_subobjek ON t_tindakan.id_subobjek_tindakan=t_subobjek.id_subobjek order by id_tindakan asc limit $start,$per_page");
			}
			else
			{
			$res=mysql_query("SELECT id_tindakan,nama_tindakan,id_subobjek_tindakan,nama_subobjek FROM t_tindakan INNER JOIN t_subobjek ON t_tindakan.id_subobjek_tindakan=t_subobjek.id_subobjek where nama_tindakan like ('%$nama_tind%') order by id_tindakan asc limit $start,$per_page");	
			}
				while($jmlh=mysql_fetch_array($res))
				$data[]=$jmlh;
				
				return $data;
	}
	public function tampil_objek() 
	{
		$sql= mysql_query("SELECT * FROM t_objek");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
		
	}
	public function subobjek($sub) 
	{
		$sql= mysql_query("SELECT * FROM t_subobjek where id_objek='$sub'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
		
	}
	public function tampil_id_tindakan()
	{
		$sql=mysql_query("SELECT MAX(SUBSTR(id_tindakan,-4))+1 AS id FROM t_tindakan");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
}
?>
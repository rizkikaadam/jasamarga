<?php
class subobjek
{
	public $id_subobjek;
	public $nama_subobjek;
	public $id_objek_subobjek;
	public $bagian_subobjek;
	
	public function tampil($id_subobjek)
	{
		if($id_subobjek == "")
		{
			$sql = mysql_query("SELECT  a.`id_subobjek`,a.`nama`,a.`bagian`,b.`nama` objek,a.`id_objek`  
FROM t_subobjek a 
INNER JOIN t_objek b ON b.`id_objek`=a.`id_objek`");
		}
		else
		{
			$sql = mysql_query("SELECT  a.`id_subobjek`,a.`nama`,a.`bagian`,b.`nama` objek,a.`id_objek`  
FROM t_subobjek a 
INNER JOIN t_objek b ON b.`id_objek`=a.`id_objek` WHERE a.id_subobjek='$id_subobjek'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	

	public function tambah()
	{
		$query = "INSERT INTO t_subobjek VALUES('$this->id_subobjek','$this->nama_subobjek','$this->id_objek_subobjek','$this->bagian')";
		$hasil = mysql_query($query);
		if ($hasil)
		{
			echo "<meta http-equiv='refresh' content='0; url=Objek.php?pilihan=Input&hid=3&vvid=6'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Tidak Dapat Menyimpan ID Objek yang Telah Terdaftar !");location= "Objek.php?pilihan=Input&hid=3&vvid=6";</script>';
		}
	}
	
	public function ubah()
	{
		$query = mysql_query("UPDATE t_subobjek SET nama='$this->nama_subobjek',bagian='$this->bagian_subobjek' WHERE id_subobjek='$this->id_subobjek'");
		if($query)
		{
		echo '<script type="text/javascript">alert("berhasil Merubah Data !");location= "subobjek.php?pilihan=Input&hid=3&vvid=6";</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("gagal Merubah Data !");location= "subobjek.php?pilihan=Input&hid=3&vvid=6";</script>';
		}
	}

	public function hapus($id)
	{
		foreach($id as $value)
		{
			$del = mysql_query("DELETE FROM t_subobjek WHERE id_subobjek='$value'");
		}
		if ($del)
		{
			echo '<script type="text/javascript">alert("Subobjek Berhasil dihapus");location= "Subobjek.php";</script>';
		}
		else
		{
			echo mysql_error();
		}
	}
	public function halaman1($nama_sbjk)
	{
			if($nama_sbjk=="")
				{
				$sql = mysql_query("SELECT * FROM t_subobjek");
				}
			else
			{
			$sql = mysql_query("SELECT * FROM t_subobjek where nama_subobjek like('%$nama_sbjk%')");	
			}
				$baris=mysql_num_rows($sql);
				return $baris;
																
	}
	public function halaman2($start,$per_page,$nama_sbjk)
	{
			if($nama_sbjk=="")
			{
				$res=mysql_query("SELECT id_subobjek,nama_subobjek,id_objek_subobjek,nama_objek FROM t_subobjek INNER JOIN t_objek ON t_subobjek.id_objek_subobjek=t_objek.id_objek order by id_subobjek asc limit $start,$per_page");
			}
			else
			{
			$res=mysql_query("SELECT id_subobjek,nama_subobjek,id_objek_subobjek,nama_objek FROM t_subobjek INNER JOIN t_objek ON t_subobjek.id_objek_subobjek=t_objek.id_objek where nama_subobjek like ('%$nama_sbjk%') order by id_subobjek asc limit $start,$per_page");	
			}
				while($jmlh=mysql_fetch_array($res))
				$data[]=$jmlh;
				
				return $data;
	}
	public function objek() 
	{
		$sql= mysql_query("SELECT * FROM t_objek");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	public function objek_edit($id) 
	{
		$sql= mysql_query("SELECT * FROM t_objek where id_objek='$id'");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
}
?>
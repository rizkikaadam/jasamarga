<?php
class objek
{
	public $id_objek;
	public $nama_objek;
	

	public function tampil($id_objek)
	{
		if($id_objek == "")
		{
			$sql = mysql_query("SELECT * FROM t_objek");
		}
		else
		{
			$sql = mysql_query("SELECT * FROM t_objek WHERE id_objek='$id_objek'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	

	public function tambah()
	{
		$query = "INSERT INTO t_objek VALUES('$this->id_objek','$this->nama_objek')";
		$hasil = mysql_query($query);
		if ($hasil)
		{
			echo "<meta http-equiv='refresh' content='0; url=Objek.php?pilihan=Input&hid=3&vvid=3'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Tidak Dapat Menyimpan ID Objek yang Telah Terdaftar !");location= "Objek.php?pilihan=Input&hid=3&vvid=3";</script>';
		}
	}
	
	public function ubah()
	{
		$query = mysql_query("UPDATE t_objek SET nama='$this->nama_objek' WHERE id_objek='$this->id_objek'");
		if($query)
		{
		echo '<script type="text/javascript">alert("berhasil Merubah Data !");location= "objek.php?pilihan=Input&hid=3&vvid=3";</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("gagal Merubah Data !");location= "objek.php?pilihan=Input&hid=3&vvid=3";</script>';
		}
	}

	public function hapus($id)
	{
		/* foreach($id as $value)
		{ */
			$del = mysql_query("DELETE FROM t_objek WHERE id_objek='$id'");
		/* } */
		if ($del)
		{
			echo '<script type="text/javascript">alert("Objek Berhasil dihapus");location= "Objek.php?pilihan=Input&hid=3&vvid=3";</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Menghapus Lokasi !");location= "Objek.php?pilihan=Input&hid=3&vvid=3";</script>';
		}
	}
	public function halaman1($nama_obj)
	{
		if($nama_obj=="")
		{
				$sql = mysql_query("SELECT * FROM t_objek");
		}
		else
		{
		$sql = mysql_query("SELECT * FROM t_objek where nama_objek like('%$nama_obj%')");	
		}
		$baris=mysql_num_rows($sql);
		return $baris;
																
	}
	public function halaman2($start,$per_page,$nama_obj)
	{
	if ($nama_obj=="")
		{
				$res=mysql_query("select * from t_objek order by id_objek asc limit $start,$per_page");
		}
	else
	{
	$res=mysql_query("select * from t_objek where nama_objek like ('%$nama_obj%') order by id_objek asc limit $start,$per_page");	
	}
			
				while($jmlh=mysql_fetch_array($res))
				$data[]=$jmlh;
				
				return $data;
	}
}
?>
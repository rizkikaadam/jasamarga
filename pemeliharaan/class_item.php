<?php
class item
{
	public $id_item;
	public $nama_item;
	public $id_subobjek_item;
	
	public function tampil($id_item)
	{
		if($id_item == "")
		{
			$sql = mysql_query("SELECT id_item,t_item.nama,t_subobjek.id_subobjek,t_subobjek.nama nama_subobjek FROM t_item INNER JOIN t_subobjek ON t_item.id_subobjek=t_subobjek.id_subobjek order by id_item asc");
		}
		else
		{
			$sql = mysql_query("SELECT id_item,t_item.nama,t_subobjek.id_subobjek,t_subobjek.nama nama_subobjek FROM t_item INNER JOIN t_subobjek ON t_item.id_subobjek=t_subobjek.id_subobjek WHERE id_item='$id_item'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	

	public function tambah()
	{
		$query = "INSERT INTO t_item VALUES('$this->id_item','$this->id_subobjek_item','$this->nama_item')";
		$hasil = mysql_query($query);
		if ($hasil)
		{
			echo '<script type="text/javascript">alert("berhasil Menambah Data !");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=item.php?pilihan=Input&hid=3&vvid=7'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Menambah Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=item.php?pilihan=Input&hid=3&vvid=7'>";
		}
	}
	
	public function ubah()
	{
		$query = mysql_query("UPDATE t_item SET nama='$this->nama_item' WHERE id_item='$this->id_item'");
		if($query)
		{
			echo '<script type="text/javascript">alert("berhasil Merubah Data !");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=item.php?pilihan=Input&hid=3&vvid=7'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Merubah Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=item.php?pilihan=Input&hid=3&vvid=7'>";
		}
	}

	public function hapus($id)
	{
			$del = mysql_query("DELETE FROM t_item WHERE id_item='$id'");
		if ($del)
		{
			echo '<script type="text/javascript">alert("berhasil Menghapus Data !");</script>'; 
			echo "<meta http-equiv='refresh' content='0; url=item.php?pilihan=Input&hid=3&vvid=7'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Menghapus Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=item.php?pilihan=Input&hid=3&vvid=7'>";
		}
	}
	public function halaman1($nama_tind)
	{
			if($nama_tind=="")
				{
				$sql = mysql_query("SELECT * FROM t_item");
				}
			else
			{
			$sql = mysql_query("SELECT * FROM t_item where nama_item like('%$nama_tind%')");	
			}
				$baris=mysql_num_rows($sql);
				return $baris;
																
	}
	public function halaman2($start,$per_page,$nama_tind)
	{
			if($nama_tind=="")
			{
				$res=mysql_query("SELECT id_item,nama_item,id_subobjek_item,nama_subobjek FROM t_item INNER JOIN t_subobjek ON t_item.id_subobjek_item=t_subobjek.id_subobjek order by id_item asc limit $start,$per_page");
			}
			else
			{
			$res=mysql_query("SELECT id_item,nama_item,id_subobjek_item,nama_subobjek FROM t_item INNER JOIN t_subobjek ON t_item.id_subobjek_item=t_subobjek.id_subobjek where nama_item like ('%$nama_tind%') order by id_item asc limit $start,$per_page");	
			}
				while($jmlh=mysql_fetch_array($res))
				$data[]=$jmlh;
				
				return $data;
	}
	public function tampil_objek() 
	{
		$sql= mysql_query("SELECT * FROM t_subobjek");
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
	public function tampil_id_item()
	{
		$sql=mysql_query("SELECT MAX(SUBSTR(id_item,-3))+1 AS id FROM t_item");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
}
?>
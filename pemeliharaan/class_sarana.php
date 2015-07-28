<?php
class sarana
{
	public $id_sarana;
	public $jenis;
	public $nama_sarana;

	public function tampil($id_sarana,$jenis)
	{
		if($id_sarana == "")
		{
			$sql = mysql_query("SELECT * FROM t_sarana");
		}
		else
		{
			$sql = mysql_query("SELECT * FROM t_sarana WHERE id_sarana='$id_sarana'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	

	public function tambah()
	{
		$query = "INSERT INTO t_sarana VALUES('$this->id_sarana','$this->jenis','$this->nama_sarana')";
		$hasil = mysql_query($query);
		if ($hasil)
		{
			echo "<meta http-equiv='refresh' content='0; url=sarana.php?jenis=0'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Tidak Dapat Menyimpan ID Sarana yang Telah Terdaftar !");location= "?menu=sarana&tampil=tambah";</script>';
		}
	}
	
	public function ubah()
	{
		$query = mysql_query("UPDATE t_sarana SET jenis='$this->jenis',nama_sarana='$this->nama_sarana' WHERE id_sarana='$this->id_sarana'");
		if ($query)
		{
			echo "<meta http-equiv='refresh' content='0; url=sarana.php?jenis=0'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Tidak Dapat Menyimpan ID Sarana yang Telah Terdaftar !");location= "sarana.php?jenis=0";</script>';
		}
	}

	public function hapus($id)
	{
		foreach($id as $value)
		{
			$del = mysql_query("DELETE FROM t_sarana WHERE id_sarana='$value'");
		}
		if ($del)
		{
			echo '<script type="text/javascript">alert("Sarana Berhasil dihapus");location= "sarana.php?jenis=0";</script>';
		}
		else
		{
			echo mysql_error();
		}
	}
	public function halaman1($jenis,$nama_sarana)
	{
		if ($jenis!='0' AND $nama_sarana=="")
		{
				$sql = mysql_query("SELECT * FROM t_sarana where jenis='$jenis'");
		}
		else if ($jenis=='0' AND $nama_sarana!="")
		{
				$sql = mysql_query("SELECT * FROM t_sarana where nama_sarana like('%$nama_sarana%')");
		}
		else if ($jenis!='0' AND $nama_sarana!="")
		{
				$sql = mysql_query("SELECT * FROM t_sarana where nama_sarana like('%$nama_sarana%')
				AND jenis='$jenis'");
		}
		else
		{
			$sql=mysql_query("select * from t_sarana");
		}
				$baris=mysql_num_rows($sql);
				return $baris;
																
	}
	public function halaman2($start,$per_page,$jenis,$nama_sarana)
	{
	if ($jenis!='0' AND $nama_sarana=="")
	{
				$res=mysql_query("select * from t_sarana where jenis='$jenis' order by id_sarana asc limit $start,$per_page");
	}
	else if ($jenis=='0' AND $nama_sarana!="")
	{
				$res=mysql_query("select * from t_sarana where nama_sarana like('%$nama_sarana%') order by id_sarana asc limit $start,$per_page");
	}
	else if ($jenis!='0' AND $nama_sarana!="")
	{
				$res=mysql_query("select * from t_sarana where nama_sarana like('%$nama_sarana%')
				AND jenis='$jenis'
				order by id_sarana asc limit $start,$per_page");
	}
	else
		{
			$res=mysql_query("select * from t_sarana order by id_sarana asc limit $start,$per_page");
		}
				while($jmlh=mysql_fetch_array($res))
				$data[]=$jmlh;
				
				return $data;
	}
}
?>
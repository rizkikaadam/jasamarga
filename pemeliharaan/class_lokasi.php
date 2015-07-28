<?php
class lokasi
{
	public $id_lokasi;
	public $nama_lokasi;
	public $lokasi_file;
	public $tipe_file;
	public $nama_file;
	public $direktori;
	public $direktori_hapus;
	public $direktori_upload;
	public $nama_foto_lama;
	public $extensi;

	public function tampil($id_lokasi)
	{
		if($id_lokasi == "")
		{
			$sql = mysql_query("SELECT * FROM t_lokasi order by id_lokasi asc");
		}
		else
		{
			$sql = mysql_query("SELECT * FROM t_lokasi WHERE id_lokasi='$id_lokasi'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
	

	public function tambah()
	{
		$query = "INSERT INTO t_lokasi VALUES('$this->id_lokasi','$this->nama_lokasi')";
		$hasil = mysql_query($query);
		if ($hasil)
		{
			echo "<meta http-equiv='refresh' content='0; url=Lokasi.php?pilihan=Input&hid=3&vvid=2'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Tidak Dapat Menyimpan Id Lokasi yang Telah Terdaftar !");location= "Lokasi.php?pilihan=Input&hid=3&vvid=2";</script>';
		}
	}
	
	public function ubah()
	{
		if(!empty($this->lokasi_file))
		{
		$filename="$this->direktori_hapus$this->nama_foto_lama";
		if (file_exists($filename))
		{
			unlink($filename);
			
		}
		move_uploaded_file($this->lokasi_file,$this->direktori_upload);
		rename("img/lokasi/$this->nama_file","img/lokasi/$this->id_lokasi.$this->extensi");
		$sql="update t_lokasi set nama='$this->nama_lokasi',photo='$this->id_lokasi.$this->extensi' where id_lokasi='$this->id_lokasi'";
		}
		else
		{
		$sql="update t_lokasi set nama='$this->nama_lokasi' where id_lokasi='$this->id_lokasi'";
		}
		$hasil=mysql_query($sql);
		if($hasil)
		{
		echo '<script type="text/javascript">alert("berhasil Merubah Data !");location= "Lokasi.php?pilihan=Input&hid=3&vvid=2";</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Merubah Data !");location= "Lokasi.php?pilihan=Input&hid=3&vvid=2";</script>';
		}
	}

	public function hapus($id)
	{
	
	/* $sql="select photo from t_lokasi where id_lokasi='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$nama_gambar=$data['photo'];
	$filename="$this->direktori_hapus$nama_gambar";
			if (file_exists($filename))
			{ */
				
				$del = mysql_query("DELETE FROM t_lokasi WHERE id_lokasi='$id'");
				
			/* }
			 */
			if($del)
			{
				echo '<script type="text/javascript">alert("Data Lokasi Berhasil dihapus");location= "Lokasi.php?pilihan=Input&hid=3&vvid=2";</script>';
			}
			else
			{
			echo '<script type="text/javascript">alert("Gagal Menghapus Lokasi !");location= "Lokasi.php?pilihan=Input&hid=3&vvid=2";</script>';
			}
	}
	public function halaman1($nama_lok)
	{
		if($nama_lok=="")
		{
				$sql = mysql_query("SELECT * FROM t_lokasi");
		}
		else
		{
		$sql = mysql_query("SELECT * FROM t_lokasi where nama_lokasi like('%$nama_lok%')");	
		}
		$baris=mysql_num_rows($sql);
		return $baris;
																
	}
	public function halaman2($start,$per_page,$nama_lok)
	{
	if ($nama_lok=="")
		{
				$res=mysql_query("select * from t_lokasi order by id_lokasi asc");
		}
	else
	{
	$res=mysql_query("select * from t_lokasi where nama_lokasi like ('%$nama_lok%') order by id_lokasi asc ");	
	}
			
				while($jmlh=mysql_fetch_array($res))
				$data[]=$jmlh;
				
				return $data;
	}
	public function tampil_id_lokasi()
	{
		$sql=mysql_query("SELECT MAX(SUBSTR(id_lokasi,-2))+1 AS id FROM t_lokasi");
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		return $data;
	}
}
?>
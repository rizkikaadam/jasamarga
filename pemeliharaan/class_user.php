<?php
class user
{
	public $npp;
	public $nama;
	public $jk;
	public $jabatan;
	public $status;
	public $tlp;
	public $akses;
	public $password;
	public $cpassword;
	public $vpass;
	public $modified;
	public $lokasi_file;
	public $tipe_file;
	public $nama_file;
	public $direktori;
	public $direktori_hapus;
	public $direktori_upload;
	public $nama_foto_lama;
	public $extensi;
	

	public function tampil($npp)
	{
		if($npp == NULL)
		{
			$sql = mysql_query("SELECT * FROM t_user");
		}
		else
		{
			$sql = mysql_query("SELECT * FROM t_user WHERE id_user='$npp'");
		}
		while ($jmlh = mysql_fetch_array($sql))
		$data[] = $jmlh;
		
		return $data;
	}
	

	public function tambah()
	{
	//,'$this->nama.$this->extensi'
		if ($this->password!=$this->cpassword)
		{
			echo '<script type="text/javascript">alert("gagal menambahkan user karena : konfirmasi password tidak sesuai dengan password yang dimasukan !");location= "User.php?pilihan=Input&hid=3&vvid=1&menu=user&action=tambah&npp='.$this->npp.'&nama='.$this->nama.'";</script>';
		}
		else
		{
			$query = "INSERT INTO t_user VALUES('$this->npp','$this->nama','$this->jabatan','$this->password','$this->vpass','aktif')";
			$hasil = mysql_query($query);
			if ($hasil)
			{
				echo '<script type="text/javascript">alert("data berhasil ditambahkan !");location= "User.php?pilihan=Input&hid=3&vvid=1";</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("Tidak Dapat Menyimpan Id User yang Telah Terdaftar !");location= "User.php?pilihan=Input&hid=3&vvid=1&menu=user&action=tambah";</script>';
			}
		}
	}
	
	public function ubah()
	{$tgl_sekarang=date('Y-m-d H:i:s');
		$sql="update t_user set 
		nama='$this->nama',
		jabatan='$this->jabatan',
		status='$this->status',
		password='$this->password',
		vpass='$this->vpass'
		where 
		id_user='$this->npp'";
		$hasil=mysql_query($sql);
		if($hasil)
		{
		$id=$this->npp;
		echo '<script type="text/javascript">alert("berhasil Merubah Data !");</script>';
		echo "<meta http-equiv='refresh' content='0; url=User.php?pilihan=Input&hid=3&vvid=1&menu=user&action=detail&id=$id'>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Gagal Merubah Data !");location= "user.php?pilihan=Input&hid=3&vvid=2";</script>';
		}
	}

	public function hapus($id)
	{
 	
	$sql="select photo from t_user where npp='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$nama_gambar=$data['photo'];
	$filename="$this->direktori_hapus$nama_gambar";
			if (file_exists($filename))
			{ 
				$del = mysql_query("DELETE FROM t_user WHERE npp='$id'");
 			}
			
			if($del)
			{
			unlink($filename); 
				echo '<script type="text/javascript">alert("berhasil Menghapus Data !");</script>';
				echo "<meta http-equiv='refresh' content='0; url=User.php?pilihan=Input&hid=3&vvid=1'>";
			}

		else
			{
			echo '<script type="text/javascript">alert("Gagal Menghapus Data !");</script>';
			echo "<meta http-equiv='refresh' content='0; url=User.php?pilihan=Input&hid=3&vvid=1'>";
			} 

	}
	public function halaman1($nama_user)
	{
		if ($nama_user=="")
		{
			$sql = mysql_query("SELECT * FROM t_user ");
		}
		else
		{
			$sql = mysql_query("SELECT * FROM t_user where nama");
		}
				$baris=mysql_num_rows($sql);
				return $baris;
																
	}
	public function halaman2($start,$per_page,$nama_user)
	{
		if ($nama_user=="")
		{
		$res=mysql_query("select * from t_user order by npp asc ");
		}
		else
		{
		$res=mysql_query("select * from t_user where nama like ('%$nama_user%') order by npp asc");
		}
				while($jmlh=mysql_fetch_array($res))
				$data[]=$jmlh;
				
				return $data;
	}

}

    

?>
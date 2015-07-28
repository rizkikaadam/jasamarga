<?php
	class notif
	{
	public function hitung_inspeksi_fiber()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi
			FROM t_detail_fiber where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung_inspeksi_cctv_gerbang()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi,id_lokasi
			FROM t_cctv_gerbang where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung inspeksi_cctv_gardu()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi,id_lokasi
			FROM t_cctv_gardu where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung inspeksi_cctv_jalur()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi
			FROM t_cctv_jalur where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung inspeksi_cctv_antrian()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi
			FROM t_cctv_antrian where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung inspeksi_cctv_jpo()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi
			FROM t_cctv_jpo where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung_inspeksi_cctv_vms()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi
			FROM t_vms where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung_inspeksi_monitor_cctv()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi
			FROM t_monitor_cctv where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung_inspeksi_kantor_gerbang()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi,id_lokasi
			FROM t_detail_kantor_gerbang where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung_inspeksi_kantor_gerbang()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi,id_lokasi
			FROM t_detail_kantor_gerbang where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung_inspeksi_gardu()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi,id_lokasi
			FROM t_detail_gardu where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung_inspeksi_cctv_transaksi()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi,id_lokasi
			FROM t_cctv_transaksi where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	public function hitung_inspeksi_cctv_gandar()
		{
			$sql = mysql_query("
			SELECT DISTINCT id_user,tgl_inspeksi,id_lokasi
			FROM t_cctv_gandar where tgl_work_order==NULL or tgl_work_order=="-" ");
			$j = mysql_num_rows($sql);
		}
	
	
	}
?>
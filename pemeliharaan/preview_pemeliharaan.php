<?php
error_reporting(0);
if ($_POST['objek'] != "Bangunan Gedung Kantor, R.Dinas dan Gerbang Tol")
{
$html = '
	<html>
	<head>
	<link rel="stylesheet" href="progbar.css" type="text/css"/>
	</head>
	<body>
	<table width="900" align="center" id="mytable" style="table-layout: fixed;">
		<tr>
			<td width="270" style="border-left: 1px solid black; border-top: 1px solid black" class="isi">
				<table width="270" align="center" id="mytable" style="table-layout: fixed;">
				<tr>
					<td width="52" class="header">Nama</td>
					<td width="8" class="header">:</td>
					<td width="179" class="header">'. $_POST['nama'] .'</td>
				</tr>
				<tr>
					<td width="52" class="header">Jabatan</td>
					<td width="8" class="header">:</td>
					<td width="179" class="header">'. $_POST['jabatan'] .'</td>
				</tr>
				<tr>
					<td width="52" class="header">Tanggal</td>
					<td width="8" class="header">:</td>
					<td width="179" class="header">'. $_POST['tgl_inspeksi'] .'</td>
				</tr>
				<tr>
					<td width="52" class="header">Paraf</td>
					<td width="8" class="header">:</td>
					<td width="179" class="header">&nbsp;</td>
				</tr>
					</table>
			</td>';
			if ($_POST['objek']=='APD')
			{
				$html .='
				<td width="170" style="border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black" class="header" align="center">FORMULIR KELENGKAPAN APD</td>';
			}
			else
			{
				$html .='
				<td width="170" style="border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black" class="header" align="center">INSPEKSI '. strtoupper($_POST['objek']) .'</td>';
			}
			$html .='
			<td width="360" style="border-top: 1px solid black" class="isi">
				<table width="440" align="center" id="mytable" style="table-layout: fixed;">
				<tr>
					<td width="20" class="header">Nomor</td>
					<td width="7" class="header">:</td>
					<td colspan="4" class="header">&nbsp;</td>
				</tr>
				<tr>
					<td width="20" class="header">Cabang</td>
					<td width="7" class="header">:</td>
					<td colspan="4" class="header">Jakarta - Cikampek</td>
				</tr>
				<tr>';
				if ($_POST['objek']=='APD')
				{
					$html .='
					<td width="20" class="header">Lokasi</td>
					<td width="7" class="header">:</td>
					<td colspan="4" class="header">-</td>';
				}
				$html .='
				</tr>
				<tr>';
				if ($_POST['objek']=='APD')
				{
					$html .='
					<td width="20" class="header">DGM</td>
					<td width="7" class="header">:</td>
					<td width="129" class="header">&nbsp;</td>
					<td width="54" class="header">Manager</td>
					<td width="3" class="header">:</td>
					<td width="107" class="header">&nbsp;</td>';
				}
				else
				{
					$html .='
					<td width="20" class="header">Kabag</td>
					<td width="7" class="header">:</td>
					<td width="129" class="header">&nbsp;</td>
					<td width="54" class="header">Kasubag</td>
					<td width="3" class="header">:</td>
					<td width="107" class="header">&nbsp;</td>';
				}
				$html .='
				</tr>
				</table>
			</td>
		</tr>';
		
		if ($_POST['objek']=='APD')
		{
			$html .='
			<tr>
			<td colspan="3" style="border-left: 1px solid black" class="isi">
				<table width="262" align="left" id="mytable" style="table-layout: fixed;">
					<tr>
						<th width="262" style="border-left: 1px solid black"; word-wrap:break-word>Lingkup Inspeksi</th>
					</tr>
					<tr>
						<td width="19" class="isi" style="border-left: 1px solid black">Inspeki '. $_POST['lingkup'] .'</td>
					</tr>
				</table>
			</td>';
		}
		/* else
		{
			$html .='
			<tr>
			<td colspan="3" style="border-left: 1px solid black" class="isi">
			<p style="font-size:12pt"><b>Usulan tindak lanjut : Nyatakan indikasi kemungkinan / usulan tindak lanjut dengan tanda (V) dalam kotak</b></p>';
			$html .='
			<br/><br/>
				<table width="900" align="center" id="mytable" style="table-layout: fixed;">
					<tr>';
				for ($i=0;$i<count($_POST['subobjek_tindakan']);$i++)
				{
					$html .='
					<td>
					<table width="300" height="200" id="mytable" style="table-layout: fixed;">
						<tr>
							<th width="262" style="border-left: 1px solid black"; word-wrap:break-word>'. $_POST['subobjek_tindakan'][$i] .'</th>
							<th width="19" style="word-wrap:break-word">SB</th>
							<th width="19" style="word-wrap:break-word">SL</th>
						</tr>';
						for($j=0;$j<count($_POST['nama_subobjek_tindakan']);$j++)
						{
							if ($_POST['nama_subobjek_tindakan'][$j] == $_POST['subobjek_tindakan'][$i])
							{
								$html .='
								<tr>
									<td width="262" style="border-left: 1px solid black" class="isi">'. $_POST['tindakan'][$j] .'</td>';
									if (strtoupper($_POST['kriteria_tindakan'][$j]) == 'SB')
									{
										$html .='
										<td width="19" class="isi" align="center">V</td>
										<td width="19" class="isi" align="center">&nbsp;</td>';
									}
									else if (strtoupper($_POST['kriteria_tindakan'][$j]) == 'SL')
									{
										$html .='
										<td width="19" class="isi" align="center">&nbsp;</td>
										<td width="19" class="isi" align="center">V</td>';
									}
									else
									{
										$html .='
										<td width="19" class="isi" align="center">&nbsp;</td>
										<td width="19" class="isi" align="center">&nbsp;</td>';
									}
								$html .='
								</tr>';
							}
						}
					$html .='
					</table>
					</td>';
					if (($i+1) % 3 == 0)
					{
						$html .='</tr><tr>';
					}
				}
				$html .='
				</tr>
				</table>
			</td>';
		} */
		$html .='
		</tr>';
		
		if ($_POST['objek']=='APD')
		{
			$html .='
			<tr>
			<td colspan="3" style="border-left: 1px solid black" class="isi">
			<table width="524" id="mytable" style="table-layout: fixed;">
				<tr>';
			foreach (array_unique($_POST['kategori']) as $data)
			{
				$html .='
				<td>
				<table width="262" id="mytable" style="table-layout: fixed;">
				<tr>
					<th width="262" style="border-left: 1px solid black"; word-wrap:break-word>';
				if (strtoupper($data) == 'APD')
				{
					$html .= 'Inspeksi '.
					$data .'</th>
							</tr>';
				}
				else 
				{
					$html .= $data .' Bantu</th>
							</tr>';
				}
				for ($j=0;$j<count($_POST['kategori']);$j++)
				{
					if ($data == $_POST['kategori'][$j])
					{
						$html .='
						<tr>
							<td width="262" class="isi" style="border-left: 1px solid black">'. $_POST['kelengkapan'][$j] .'</td>
						</tr>';
					}
				}
				$html .='
				</table>
				</td>';
			}
			$html .='
			</tr>
			</table>
			</td>
			</td>';
		}
		/* else
		{
			$html .='
			<tr>
			<td colspan="3" style="border-left: 1px solid black" class="isi">
			<p style="font-size:12pt"><b>Berdasarkan hasil survey, indikasikan masalah yang ada dengan tanda (V) pada kotak yang tersedia, sehingga mewakili keadaan rata-rata kondisi objek dan tentukan kriteria kerusakan pada kolom SB (Kerusakan Sebagian) dan SL (Kerusakan Menyeluruh).</b></p>';
		
			$html .='
			<br/><br/>
				<table width="900" align="center" id="mytable" style="table-layout: fixed;">
					<tr>';
				for ($i=0;$i<count($_POST['subobjek_indikasi']);$i++)
				{
					$html .='
					<td>
					<table width="300" height="200" id="mytable" style="table-layout: fixed;">
						<tr>
							<th width="262" style="border-left: 1px solid black"; word-wrap:break-word>'. $_POST['subobjek_indikasi'][$i] .'</th>
							<th width="19" style="word-wrap:break-word">SB</th>
							<th width="19" style="word-wrap:break-word">SL</th>
						</tr>';
						for($j=0;$j<count($_POST['nama_subobjek_indikasi']);$j++)
						{
							if ($_POST['nama_subobjek_indikasi'][$j] == $_POST['subobjek_indikasi'][$i])
							{
								$html .='
								<tr>
									<td width="262" style="border-left: 1px solid black" class="isi">'. $_POST['nama_indikasi'][$j] .'</td>';
									if (strtoupper($_POST['kriteria_indikasi'][$j]) == 'SB')
									{
										$html .='
										<td width="19" class="isi" align="center">V</td>
										<td width="19" class="isi" align="center">&nbsp;</td>';
									}
									else if (strtoupper($_POST['kriteria_indikasi'][$j]) == 'SL')
									{
										$html .='
										<td width="19" class="isi" align="center">&nbsp;</td>
										<td width="19" class="isi" align="center">V</td>';
									}
									else
									{
										$html .='
										<td width="19" class="isi" align="center">&nbsp;</td>
										<td width="19" class="isi" align="center">&nbsp;</td>';
									}
								$html .='
								</tr>';
							}
						}
					$html .='
					</table>
					</td>';
					if (($i+1) % 3 == 0)
					{
						$html .='</tr><tr>';
					}
				}
				$html .='
				</tr>
				</table>
			</td>';
		} */
			$html .='
		</tr>
		<tr>
			<td colspan="3" style="border-left: 1px solid black; word-wrap:break-word" class="isi">
			<p style="font-size:14pt"><strong>REKAP HASIL INSPEKSI</strong><br/><br/></p>';
			for ($i=0;$i<count(array_unique($_POST['subobjek_indikasi']));$i++)
			{
				$no=1;
				for ($j=0;$j<count($_POST['nama_indikasi']);$j++)
				{
					if ($j==0)
					{
						$html .= '
						<p style="font-size:12pt"><strong>'. $_POST['subobjek_indikasi'][$i] .'</strong><br/></p>
						<table width="950" id="mytable" style="table-layout: fixed;" align="center">
						<tr>
							<th width="30" style="border-left: 1px solid black; word-wrap:break-word">No</th>
							<th width="400" style="word-wrap:break-word">Nama Kerusakan</th>
							<th width="300" style="word-wrap:break-word">Lokasi</th>';
							if (strtoupper($_POST['objek']) == 'JALAN BETON' or strtoupper($_POST['objek']) == 'JALAN ASPAL')
							{
								$html .='
								<th width="100" style="word-wrap:break-word">Lajur</th>';
							}
							$html .='
							<th width="70" style="word-wrap:break-word">Kriteria</th>
							<th width="30" style="word-wrap:break-word">KK</th>
						</tr>';
					}
					if ($_POST['subobjek_indikasi'][$i] == $_POST['nama_subobjek_indikasi'][$j])
					{
						$html .='
						<tr>
							<td align="center" class="isi" style="border-left: 1px solid black;">'. $no .'</td>
							<td class="isi">'. $_POST['nama_indikasi'][$j] .'</td>';
							if ($_POST['lokasi_indikasi'][$j]!='-' and $_POST['km_awal_indikasi'][$j]!='-' and $_POST['km_akhir_indikasi'][$j]!='-')
							{
								$html .='
								<td class="isi">'. $_POST['lokasi_indikasi'][$j] .', '. $_POST['km_awal_indikasi'][$j] .'-'. $_POST['km_akhir_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]!='-' and $_POST['km_awal_indikasi'][$j]!='-' and $_POST['km_akhir_indikasi'][$j]=='-')
							{
								$html .='
								<td class="isi">'. $_POST['lokasi_indikasi'][$j] .', '. $_POST['km_awal_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]!='-' and $_POST['km_awal_indikasi'][$j]=='-' and $_POST['km_akhir_indikasi'][$j]!='-')
							{
								$html .='
								<td class="isi">'. $_POST['lokasi_indikasi'][$j] .', '. $_POST['km_akhir_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]=='-' and $_POST['km_awal_indikasi'][$j]!='-' and $_POST['km_akhir_indikasi'][$j]!='-')
							{
								$html .='
								<td class="isi">'. $_POST['km_awal_indikasi'][$j] .'-'. $_POST['km_akhir_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]=='-' and $_POST['km_awal_indikasi'][$j]=='-' and $_POST['km_akhir_indikasi'][$j]!='-')
							{
								$html .='
								<td class="isi'. $_POST['km_akhir_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]=='-' and $_POST['km_awal_indikasi'][$j]!='-' and $_POST['km_akhir_indikasi'][$j]=='-')
							{
								$html .='
								<td class="isi">'. $_POST['km_awal_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]!='-' and $_POST['km_awal_indikasi'][$j]=='-' and $_POST['km_akhir_indikasi'][$j]=='-')
							{
								$html .='
								<td class="isi">'. $_POST['lokasi_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]=='-' and $_POST['km_awal_indikasi'][$j]=='-' and $_POST['km_akhir_indikasi'][$j]=='-')
							{
								$html .='
								<td class="isi">-</td>';
							}
							if (strtoupper($_POST['objek']) == 'JALAN BETON' or strtoupper($_POST['objek']) == 'JALAN ASPAL')
							{
								$html .='
								<td align="center" class="isi">'. strtoupper($_POST['lajur'][$j]) .'</td>';
							}
							$html .='
							<td align="center" class="isi">'. strtoupper($_POST['kriteria_indikasi'][$j]) .'</td>
							<td align="center" class="isi">'. strtoupper($_POST['kk_indikasi'][$j]) .'</td>
						</tr>';
						$no++;
					}
				}
				$html.='
				</table>
				';
			}
			$html .='
			</td>
		</tr>';
		if ($_POST['objek']=='APD')
		{
			$html .='
			<tr>
				<td colspan="3" style="border-left: 1px solid black" class="isi"><p style="font-size:12pt"><strong>Catatan :</strong></p>
				<table width="1020" id="mytable" style="table-layout: fixed;">
					<tr>
						<td width="1019" height="113" style="border-left: 1px solid black; border-top: 1px solid black" class="isi" bgcolor="#CCCCCC" valign="baseline">';
						if (!empty(count($_POST['keterangan'])))
						{
							for ($i=0; $i < count($_POST['keterangan']); $i++)
							{
								if (trim($_POST['keterangan'][$i]) != NULL and trim($_POST['keterangan'][$i]) !='-' and trim($_POST['keterangan'][$i]) != '')
								{
									$html .= trim($_POST['keterangan'][$i]).'<br/>';
								}
								break;
							}
						}
						$html .='
						</td>
					</tr>
				</table>
				</td>
			</tr>';
		}
		else
		{
			$html .='
			<tr>
				<td colspan="3" style="border-left: 1px solid black" class="isi"><p style="font-size:12pt"><strong>Catatan :</strong></p>
				<table width="1020" id="mytable" style="table-layout: fixed;">
					<tr>
						<td width="1019" height="113" style="border-left: 1px solid black; border-top: 1px solid black" class="isi" bgcolor="#CCCCCC" valign="baseline">';
						if (!empty(count($_POST['keterangan'])))
						{
							for ($i=0;$i<count(array_unique($_POST['subobjek_indikasi']));$i++)
							{
								$html .= '<p style="font-size:10pt"><strong>'. $_POST['subobjek_indikasi'][$i] .'</strong><br/></p>';
								$no=1;
								for ($j=0;$j<count($_POST['keterangan']);$j++)
								{
									if ($_POST['subobjek_indikasi'][$i]==$_POST['nama_subobjek_indikasi'][$j])
									{
										if (trim($_POST['keterangan'][$j]) != NULL and trim($_POST['keterangan'][$j]) !='-' and trim($_POST['keterangan'][$j]) != '')
										{
											$html .= $no.'. '.trim($_POST['keterangan'][$j]).'<br/>';
										}
										else if (count($_POST['keterangan'])-1==$j)
										{
											$html .= '-<br/>';
										}
									}
									
								}
								$html .= '<br/>';
							}
						}
						$html .='
						</td>
					</tr>
				</table>
				</td>
			</tr>';
		}
	$html .='
	</table>
	</body>
	</html>';
	if ($_POST['objek']== 'APD')
	{
		$foto = '
		<html>
		<body>
		<table>
		<tr>
			<td colspan="4"><p style="font-size:12pt"><strong>REKAMAN GAMBAR APD</strong></p></td>
		</tr>';
			for ($i=0; $i < count($_POST['photo1']); $i++)
			{
				if ($_POST['photo1'][$j] != '-' or $_POST['photo2'][$j] != '-' or $_POST['photo3'][$j] != '-' or $_POST['photo4'][$j] != '-')
				{
					$foto .='
					<tr>
						<td class="header">'. $_POST['subobjek_tindakan'][$i] .'</td>
					</tr>
					<tr>';
				}
				if ($_POST['photo1'][$i] != '-')
				{
					$foto .='
					<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo1'][$i] .'" width="200px" height="180px" /></td>';
				}
				if ($_POST['photo2'][$i] != '-')
				{
					$foto .='
					<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo2'][$i] .'" width="200px" height="180px" /></td>';
				}
				if ($_POST['photo3'][$i] != '-')
				{
					$foto .='
					<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo3'][$i] .'" width="200px" height="180px" /></td>';
				}
				if ($_POST['photo4'][$i] != '-')
				{
					$foto .='
					<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo4'][$i] .'" width="200px" height="180px" /></td>';
				}
					$foto .='
					</tr>
					<tr>';
			}
			$foto .= '
			</tr>
			</table>
			</body>
			</html>';
	}
	else 
	{
		$foto = '
		<html>
		<body>
		<table>
		<tr>
			<td colspan="4"><p style="font-size:12pt"><strong>REKAMAN GAMBAR INSPEKSI PEMELIHARAAN</strong></p></td>
		</tr>
		';
		for ($j=0;$j<$_POST['banyak_subobjek_indikasi'];$j++)
		{
			if (($j>0) and ($_POST['subobjek_indikasi'][$j] == $_POST['subobjek_indikasi'][$j-1]))
			{
				if ($_POST['photo1'][$j] != '-' or $_POST['photo2'][$j] != '-' or $_POST['photo3'][$j] != '-' or $_POST['photo4'][$j] != '-')
				{
					$foto .='';
				}
			}
			else
			{
				if ($_POST['photo1'][$j] != '-' or $_POST['photo2'][$j] != '-' or $_POST['photo3'][$j] != '-' or $_POST['photo4'][$j] != '-')
				{
					$foto .='
					<tr>
						<td class="header">'. $_POST['subobjek_indikasi'][$j] .'</td>
					</tr>
					<tr>';
				}
			}
			if ($_POST['photo1'][$j] != '-')
			{
				$foto .='
				<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo1'][$j] .'" width="200px" height="180px" /></td>';
			}
			if ($_POST['photo2'][$j] != '-')
			{
				$foto .='
				<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo2'][$j] .'" width="200px" height="180px" /></td>';
			}
			if ($_POST['photo3'][$j] != '-')
			{
				$foto .='
				<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo3'][$j] .'" width="200px" height="180px" /></td>';
			}
			if ($_POST['photo4'][$j] != '-')
			{
				$foto .='
				<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo4'][$j] .'" width="200px" height="180px" /></td>';
			}
			$foto .='
			</tr>
			<tr>';
		}
			$foto .= '
			</tr>
			</table>
			</body>
			</html>';
	}
	
	//---------------------------------------------PERBAIKAN-----------------------------------------------
	$perbaikan = '
	<html>
	<head>
	<link rel="stylesheet" href="progbar.css" type="text/css"/>
	</head>
	<body>
	<table width="900" align="center" id="mytable" style="table-layout: fixed;">
		<tr colspan="3">
			<td width="170" height="50" style="border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black; font-size:16pt" class="header" align="center" >PERBAIKAN '. strtoupper($_POST['objek']) .'</td>
		</tr>
		<tr>
			<td colspan="3" style="border-left: 1px solid black; word-wrap:break-word" class="isi">
			<p style="font-size:14pt"><strong>REKAP HASIL PERBAIKAN</strong><br/><br/></p>';
			for ($i=0;$i<count(array_unique($_POST['subobjek_indikasi']));$i++)
			{
				$no=1;
				for ($j=0;$j<count($_POST['nama_indikasi']);$j++)
				{
					if ($j==0)
					{
						$perbaikan .= '
						<p style="font-size:12pt"><strong>'. $_POST['subobjek_indikasi'][$i] .'</strong><br/></p>
						<table width="865" id="mytable" style="table-layout: fixed;" align="center">
						<tr>
							<th width="24" style="border-left: 1px solid black; word-wrap:break-word">No</th>
							<th width="230" style="word-wrap:break-word">Nama Kerusakan</th>
							<th width="70" style="word-wrap:break-word">Lokasi</th>';
							if (strtoupper($_POST['objek']) == 'JALAN BETON' or strtoupper($_POST['objek']) == 'JALAN ASPAL')
							{
								$perbaikan .='
								<th width="70" style="word-wrap:break-word">Lajur</th>';
							}
							$perbaikan .='
							<th width="70" style="word-wrap:break-word">Kriteria</th>
							<th width="30" style="word-wrap:break-word">KK</th>
							<th width="90" style="word-wrap:break-word">Prioritas</th>
							<th width="96" style="word-wrap:break-word">Rencana TL</th>
							<th width="93" style="word-wrap:break-word">Selesai TL</th>
							<th width="149" style="word-wrap:break-word">Rekanan</th>
						</tr>';
					}
					if ($_POST['subobjek_indikasi'][$i] == $_POST['nama_subobjek_indikasi'][$j])
					{
						$perbaikan .='
						<tr>
							<td align="center" class="isi" style="border-left: 1px solid black;">'. $no .'</td>
							<td class="isi">'. $_POST['nama_indikasi'][$j] .'</td>';
							if ($_POST['lokasi_indikasi'][$j]!='-' and $_POST['km_awal_indikasi'][$j]!='-' and $_POST['km_akhir_indikasi'][$j]!='-')
							{
								$perbaikan .='
								<td class="isi">'. $_POST['lokasi_indikasi'][$j] .', '. $_POST['km_awal_indikasi'][$j] .'-'. $_POST['km_akhir_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]!='-' and $_POST['km_awal_indikasi'][$j]!='-' and $_POST['km_akhir_indikasi'][$j]=='-')
							{
								$perbaikan .='
								<td class="isi">'. $_POST['lokasi_indikasi'][$j] .', '. $_POST['km_awal_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]!='-' and $_POST['km_awal_indikasi'][$j]=='-' and $_POST['km_akhir_indikasi'][$j]!='-')
							{
								$perbaikan .='
								<td class="isi">'. $_POST['lokasi_indikasi'][$j] .', '. $_POST['km_akhir_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]=='-' and $_POST['km_awal_indikasi'][$j]!='-' and $_POST['km_akhir_indikasi'][$j]!='-')
							{
								$perbaikan .='
								<td class="isi">'. $_POST['km_awal_indikasi'][$j] .'-'. $_POST['km_akhir_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]=='-' and $_POST['km_awal_indikasi'][$j]=='-' and $_POST['km_akhir_indikasi'][$j]!='-')
							{
								$perbaikan .='
								<td class="isi'. $_POST['km_akhir_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]=='-' and $_POST['km_awal_indikasi'][$j]!='-' and $_POST['km_akhir_indikasi'][$j]=='-')
							{
								$perbaikan .='
								<td class="isi">'. $_POST['km_awal_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]!='-' and $_POST['km_awal_indikasi'][$j]=='-' and $_POST['km_akhir_indikasi'][$j]=='-')
							{
								$perbaikan .='
								<td class="isi">'. $_POST['lokasi_indikasi'][$j] .'</td>';
							}
							else if ($_POST['lokasi_indikasi'][$j]=='-' and $_POST['km_awal_indikasi'][$j]=='-' and $_POST['km_akhir_indikasi'][$j]=='-')
							{
								$perbaikan .='
								<td class="isi">-</td>';
							}
							if (strtoupper($_POST['objek']) == 'JALAN BETON' or strtoupper($_POST['objek']) == 'JALAN ASPAL')
							{
								$perbaikan .='
								<td align="center" class="isi">'. strtoupper($_POST['lajur'][$j]) .'</td>';
							}
							$perbaikan .='
							<td align="center" class="isi">'. strtoupper($_POST['kriteria_indikasi'][$j]) .'</td>
							<td align="center" class="isi">'. strtoupper($_POST['kk_indikasi'][$j]) .'</td>
							<td align="center" class="isi">'. strtoupper($_POST['prioritas_indikasi'][$j]) .'</td>
							<td align="center" class="isi">'. $_POST['rencana_tl_indikasi'][$j] .'</td>
							<td align="center" class="isi">'. $_POST['selesai_tl_indikasi'][$j] .'</td>
							<td class="isi">'. $_POST['rekanan_indikasi'][$j] .'</td>
						</tr>';
						$no++;
					}
				}
				$perbaikan.='
				</table>
				';
			}
			$perbaikan .='
			</td>
		</tr>';
			$perbaikan .='
			<tr>
				<td colspan="3" style="border-left: 1px solid black" class="isi"><p style="font-size:12pt"><strong>Catatan :</strong></p>
				<table width="1020" id="mytable" style="table-layout: fixed;">
					<tr>
						<td width="1019" height="113" style="border-left: 1px solid black; border-top: 1px solid black" class="isi" bgcolor="#CCCCCC" valign="baseline">';
						if (!empty(count($_POST['keterangan_perbaikan'])))
						{
							for ($i=0;$i<count(array_unique($_POST['subobjek_indikasi']));$i++)
							{
								$perbaikan .= '<p style="font-size:10pt"><strong>'. $_POST['subobjek_indikasi'][$i] .'</strong><br/></p>';
								$no=1;
								for ($j=0;$j<count($_POST['keterangan_perbaikan']);$j++)
								{
									if ($_POST['subobjek_indikasi'][$i]==$_POST['nama_subobjek_indikasi'][$j])
									{
										if (trim($_POST['keterangan_perbaikan'][$j]) != NULL and trim($_POST['keterangan_perbaikan'][$j]) !='-' and trim($_POST['keterangan_perbaikan'][$j]) != '')
										{
											$perbaikan .= $no.'. '.trim($_POST['keterangan_perbaikan'][$j]).'<br/>';
										}
										else if (count($_POST['keterangan_perbaikan'])-1==$j)
										{
											$perbaikan .= '-<br/>';
										}
									}
									
								}
								$perbaikan .= '<br/>';
							}
						}
						$perbaikan .='
						</td>
					</tr>
				</table>
				</td>
			</tr>
	</table>
	</body>
	</html>';
		$foto_perbaikan = '
		<html>
		<body>
		<table>
		<tr>
			<td colspan="4"><p style="font-size:12pt"><strong>REKAMAN GAMBAR HASIL PERBAIKAN PEMELIHARAAN</strong></p></td>
		</tr>
		';
		for ($j=0;$j<$_POST['banyak_subobjek_indikasi'];$j++)
		{
			if ($_POST['photo0'][$j] != '-' or $_POST['photo50'][$j] != '-' or $_POST['photo100'][$j] != '-')
			{
				$foto_perbaikan .='
				<tr>
					<td class="header">'. $_POST['subobjek_indikasi'][$j] .'</td>
				</tr>
				<tr>';
			}
			if ($_POST['photo0'][$j] != '-')
			{
				$foto_perbaikan .='
				<td class="header"><img src="../popup_image/photo/perbaikan/'. $_POST['photo0'][$j] .'" width="200px" height="180px" /></td>';
			}
			if ($_POST['photo50'][$j] != '-')
			{
				$foto_perbaikan .='
				<td class="header"><img src="../popup_image/photo/perbaikan/'. $_POST['photo50'][$j] .'" width="200px" height="180px" /></td>';
			}
			if ($_POST['photo100'][$j] != '-')
			{
				$foto_perbaikan .='
				<td class="header"><img src="../popup_image/photo/perbaikan/'. $_POST['photo100'][$j] .'" width="200px" height="180px" /></td>';
			}
			$foto_perbaikan .='
			</tr>
			<tr>';
		}
			$foto_perbaikan .= '
			</tr>
			</table>
			</body>
			</html>';
}

//----------------------PAKE ITEM--------------------------
else if ($_POST['objek'] == "Bangunan Gedung Kantor, R.Dinas dan Gerbang Tol")
{
$html = '
	<html>
	<head>
	<link rel="stylesheet" href="progbar.css" type="text/css"/>
	</head>
	<body>
	<table width="865" align="center" id="mytable" style="table-layout: fixed;">
		<tr>
		<td style="border-left: 1px solid black; border-top: 1px solid black" width="346" class="isi">
			<table width="346" id="mytable">
			<tr>
				<td width="112" class="header">Nama</td>
				<td width="8" class="header">:</td>
				<td width="204" class="header" bgcolor="#CCCCCC">'. $_POST['nama'] .'</td>
			</tr>
			<tr>
				<td class="header">Jabatan</td>
				<td class="header">:</td>
				<td class="header" bgcolor="#CCCCCC">'. $_POST['jabatan'] .'</td>
			</tr>
			<tr>
				<td class="header">Tgl Inspeksi</td>
				<td class="header">:</td>
				<td class="header" bgcolor="#CCCCCC">'. $_POST['tgl_inspeksi'] .'</td>
			</tr>
			<tr>
				<td class="header">Tanda Tangan</td>
				<td class="header">:</td>
				<td class="header"></td>
			</tr>
			</table>
		</td>
		<td style="border-top: 1px solid black" width="151" align="center" class="isi">
			<strong>INSPEKSI RUTIN BANGUNAN GEDUNG KANTOR, R.DINAS DAN GERBANG TOL</strong></td>
			<td style="border-top: 1px solid black" width="346" class="isi">
			<table width="346" id="mytable">
			<tr>
				<td class="header">Cabang</td>
				<td class="header">:</td>
				<td colspan="4" bgcolor="#CCCCCC" class="header">JAKARTA - CIKAMPEK</td>
			</tr>
			<tr>
				<td class="header">Lokasi</td>
				<td class="header">:</td>
				<td colspan="4" bgcolor="#CCCCCC" class="header">Gerbang Tol '. $_POST['lokasi'] .'</td>
			</tr>
			<tr>
				<td class="header">Ka.Bag.</td>
				<td class="header">:</td>
				<td width="64" class="header"></td>
				<td width="58" class="header">Ka.Sub.Bag</td>
				<td width="3">:</td>
				<td width="64" class="header"></td>
			</tr>
			<tr>
				<td class="header"></td>
				<td class="header"></td>
				<td colspan="4" class="header"></td>
			</tr>
			</table>
		</td>
		</tr>';
if (!empty(count($_POST['item'])))
		{
		$banyak_ruangan = 0;
		$banyak_r_dinas = 0;
		$banyak_lajur_gardu = 0;
		for ($i=0;$i<count($_POST['subobjek_item']);$i++)
		{
			if ($_POST['bagian_subobjek_item'][$i] == "Ruangan") $banyak_ruangan += 1;
			else if ($_POST['bagian_subobjek_item'][$i] == "R. Dinas") $banyak_r_dinas += 1;
			else if ($_POST['bagian_subobjek_item'][$i] == "Lajur / Gardu") $banyak_lajur_gardu += 1;
		}
$html .= '
		<tr>
			<td style="border-left: 1px solid black" colspan="3" class="isi">
				<p><strong>Keterangan : v = Baik, x = Rusak, o = Tidak Ada<br/>
				(*) penomoran lajur / gardu menyesuaikan kondisi di masing-masing gerbang tol</strong></p>
			</td>
		</tr>';
		
		$html .='
		<tr>
			<td style="border-left: 1px solid black; word-wrap:break-word" colspan="3" width="346" class="isi">
			<p style="font-size:14pt"><strong>REKAP HASIL INSPEKSI</strong><br/></p>';
			if ($banyak_ruangan > 0)
			{
				$html .='
				<p style="font-size:12pt;"><strong>Ruangan</strong><br/><br/></p>
				<table width="867px" id="mytable" align="center" style="table-layout: fixed;">';
				$html .= '
				<tr>
				<td class="header" colspan="3">';
				for ($i=0;$i<count(array_unique($_POST['subobjek_item']));$i++)
				{
					if ($_POST['bagian_subobjek_item'][$i] == "Ruangan")
					{
						$no = 1;
						$html .= '
						<p style="font-size:12pt"><strong>'. $_POST['subobjek_item'][$i] .'</strong></p>';
						for ($j=0;$j<count($_POST['item']);$j++)
						{
							if ($j==0)
							{
								$html .= '
								<table width="865" id="mytable" style="table-layout: fixed;" align="center">
								<tr>
									<th width="24" style="border-left: 1px solid black; word-wrap:break-word">No</th>
									<th width="771" style="word-wrap:break-word">Nama Kerusakan</th>
									<th width="70" style="word-wrap:break-word">Kriteria</th>
								</tr>';
							}
							if ($_POST['subobjek_item'][$i]==$_POST['nama_subobjek_item'][$j])
							{
								$html .='
								<tr>
									<td align="center" class="isi" style="border-left: 1px solid black;">'. $no .'</td>
									<td class="isi">'. $_POST['item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['kriteria_item'][$j] .'</td>
								</tr>';
								$no++;
							}
						}
						$html.='
						</table>';
					}
				}
			$html .='</td></tr></table>';
			}
			if ($banyak_r_dinas > 0)
			{
				$html .='
				<br/>
				<p style="font-size:12pt;"><strong>R. Dinas</strong><br/><br/></p>
				<table width="867px" id="mytable" align="center" style="table-layout: fixed;">';
				$html .= '
				<tr>
				<td class="header" colspan="3">';
				for ($i=0;$i<count(array_unique($_POST['subobjek_item']));$i++)
				{
					if ($_POST['bagian_subobjek_item'][$i] == "R. Dinas")
					{
						$no = 1;
						$html .= '
						<p style="font-size:12pt"><strong>'. $_POST['subobjek_item'][$i] .'</strong></p>';
						for ($j=0;$j<count($_POST['item']);$j++)
						{
							if ($j==0)
							{
								$html .= '
								<table width="865" id="mytable" style="table-layout: fixed;" align="center">
								<tr>
									<th width="24" style="border-left: 1px solid black; word-wrap:break-word">No</th>
									<th width="771" style="word-wrap:break-word">Nama Kerusakan</th>
									<th width="70" style="word-wrap:break-word">Kriteria</th>
								</tr>';
							}
							if ($_POST['subobjek_item'][$i]==$_POST['nama_subobjek_item'][$j])
							{
								$html .='
								<tr>
									<td align="center" class="isi" style="border-left: 1px solid black;">'. $no .'</td>
									<td class="isi">'. $_POST['item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['kriteria_item'][$j] .'</td>
								</tr>';
								$no++;
							}
						}
						$html.='
						</table>';
					}
				}
				$html .='</td></tr></table>';
			}
			if ($banyak_lajur_gardu > 0)
			{
				$html .='
				<br/>
				<p style="font-size:12pt;"><strong>Lajur / Gardu(*)</strong><br/><br/></p>
				<table width="867px" id="mytable" align="center" style="table-layout: fixed;">';
				$html .= '
				<tr>
				<td class="header" colspan="3">';
				for ($i=0;$i<count(array_unique($_POST['subobjek_item']));$i++)
				{
					if ($_POST['bagian_subobjek_item'][$i] == "Lajur / Gardu")
					{
						$no = 1;
						$html .= '
						<p style="font-size:12pt"><strong>'. $_POST['subobjek_item'][$i] .'</strong></p>';
						for ($j=0;$j<count($_POST['item']);$j++)
						{
							if ($j==0)
							{
								$html .= '
								<table width="865" id="mytable" style="table-layout: fixed;" align="center">
								<tr>
									<th width="24" style="border-left: 1px solid black; word-wrap:break-word">No</th>
									<th width="771" style="word-wrap:break-word">Nama Kerusakan</th>
									<th width="70" style="word-wrap:break-word">Kriteria</th>
								</tr>';
							}
							if ($_POST['subobjek_item'][$i]==$_POST['nama_subobjek_item'][$j])
							{
								$html .='
								<tr>
									<td align="center" class="isi" style="border-left: 1px solid black;">'. $no .'</td>
									<td class="isi">'. $_POST['item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['kriteria_item'][$j] .'</td>
								</tr>';
								$no++;
							}
						}
						$html.='
						</table>';
					}
				}
				$html .='</td></tr></table>';
			}
		}
	
	$html .= '
	<tr>
      <td colspan="2" style="border-left: 1px solid black" class="isi">
	  <p style="font-size:12pt"><strong>Keterangan :</strong></p>
		<table width="509" id="mytable" style="table-layout: fixed;">
          <tr>
            <td width="499" height="113" style="border-left: 1px solid black; border-top: 1px solid black" class="isi" bgcolor="#CCCCCC" valign="baseline">';
	if (!empty(count($_POST['keterangan_item'])))
	{
		for ($j=0;$j<count(array_unique($_POST['subobjek_item']));$j++)
		{
			$html .='<p style="font-size:10pt"><strong>'. $_POST['subobjek_item'][$j] .'</strong></p>';
			$no = 1;
			for ($i=0; $i < count($_POST['keterangan_item']); $i++)
			{
				if ($_POST['keterangan_item'][$i] != NULL and $_POST['keterangan_item'][$i] !='-' and $_POST['keterangan_item'][$i] != '' and $_POST['subobjek_item'][$j]==$_POST['nama_subobjek_item'][$i])
				{
					$html .= $no.'. '.$_POST['keterangan_item'][$i].'<br/>';
					$no++;
				}
				else if (($_POST['keterangan_item'][$i] == NULL or $_POST['keterangan_item'][$i] =='-' or $_POST['keterangan_item'][$i] == '') and (count($_POST['keterangan_item'])-1==$i) and $no==1)
				{
					$html .= '-<br/>';
				}
			}
		}
	}
	$html .='</td>
          </tr>
		</table></td>
	  <td class="isi" align="center"><p>Mengetahui<br/>
	  '. $_POST['jabatan_mengetahui'] .'</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><u>'. $_POST['mengetahui'] .'</u></p></td>
    </tr>
	';
	
	$html .= '
	</table>
	</body>
	</html>';
		$foto = '
		<html>
		<body>
		<table>
		<tr>
			<td colspan="4"><p style="font-size:12pt"><strong>REKAMAN GAMBAR INSPEKSI PEMELIHARAAN</strong></p></td>
		</tr>
		';
		for ($i=0; $i < count($_POST['photo1']); $i++)
		{
			if (($i>0) and ($_POST['subobjek_item'][$i] == $_POST['subobjek_item'][$i-1]))
			{
				if ($_POST['photo1'][$i] != '-' or $_POST['photo2'][$i] != '-' or $_POST['photo3'][$i] != '-' or $_POST['photo4'][$i] != '-')
				{
					$foto .='';
				}
			}
			else
			{
				if ($_POST['photo1'][$i] != '-' or $_POST['photo2'][$i] != '-' or $_POST['photo3'][$i] != '-' or $_POST['photo4'][$i] != '-')
				{
					$foto .='
					<tr>
						<td class="header">'. $_POST['subobjek_item'][$i] .'</td>
					</tr>
					<tr>';
				}
			}
			if ($_POST['photo1'][$i] != '-')
			{
				$foto .='
				<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo1'][$i] .'" width="200px" height="180px" /></td>';
			}
			if ($_POST['photo2'][$i] != '-')
			{
				$foto .='
				<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo2'][$i] .'" width="200px" height="180px" /></td>';
			}
			if ($_POST['photo3'][$i] != '-')
			{
				$foto .='
				<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo3'][$i] .'" width="200px" height="180px" /></td>';
			}
			if ($_POST['photo4'][$i] != '-')
			{
				$foto .='
				<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo4'][$i] .'" width="200px" height="180px" /></td>';
			}
				$foto .='
				</tr>
				<tr>';			
		}
			$foto .= '
			</tr>
			</table>
			</body>
			</html>';
			
//---------------------------------------------------------------PERBAIKAN--------------------------------------------------------
$perbaikan = '
	<html>
	<head>
	<link rel="stylesheet" href="progbar.css" type="text/css"/>
	</head>
	<body>
	<table width="865" align="center" id="mytable" style="table-layout: fixed;">
		<tr>
			<td style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black" align="center" class="header" colspan="2">
			<p><strong>PERBAIKAN RUTIN BANGUNAN GEDUNG KANTOR, R.DINAS DAN GERBANG TOL</strong></p>
			</td>
		</tr>';
if (!empty(count($_POST['item'])))
		{
		$banyak_ruangan = 0;
		$banyak_r_dinas = 0;
		$banyak_lajur_gardu = 0;
		for ($i=0;$i<count($_POST['subobjek_item']);$i++)
		{
			if ($_POST['bagian_subobjek_item'][$i] == "Ruangan") $banyak_ruangan += 1;
			else if ($_POST['bagian_subobjek_item'][$i] == "R. Dinas") $banyak_r_dinas += 1;
			else if ($_POST['bagian_subobjek_item'][$i] == "Lajur / Gardu") $banyak_lajur_gardu += 1;
		}
$perbaikan .= '
		<tr>
			<td style="border-left: 1px solid black" colspan="2" class="isi">
				<p><strong>Keterangan : v = Baik, x = Rusak, o = Tidak Ada<br/>
				(*) penomoran lajur / gardu menyesuaikan kondisi di masing-masing gerbang tol</strong></p>
			</td>
		</tr>';
		
		$perbaikan .='
		<tr>
			<td style="border-left: 1px solid black; word-wrap:break-word" colspan="2" width="346" class="isi">
			<p style="font-size:14pt"><strong>REKAP HASIL INSPEKSI</strong><br/></p>';
			if ($banyak_ruangan > 0)
			{
				$perbaikan .='
				<p style="font-size:12pt;"><strong>Ruangan</strong><br/><br/></p>
				<table width="867px" id="mytable" align="center" style="table-layout: fixed;">';
				$perbaikan .= '
				<tr>
				<td class="header" colspan="2">';
				for ($i=0;$i<count(array_unique($_POST['subobjek_item']));$i++)
				{
					if ($_POST['bagian_subobjek_item'][$i] == "Ruangan")
					{
						$no = 1;
						$perbaikan .= '
						<p style="font-size:12pt"><strong>'. $_POST['subobjek_item'][$i] .'</strong></p>';
						for ($j=0;$j<count($_POST['item']);$j++)
						{
							if ($j==0)
							{
								$perbaikan .= '
								<table width="865" id="mytable" style="table-layout: fixed;" align="center">
								<tr>
									<th width="24" style="border-left: 1px solid black; word-wrap:break-word">No</th>
									<th width="230" style="word-wrap:break-word">Nama Tindakan</th>
									<th width="70" style="word-wrap:break-word">Kriteria</th>
									<th width="96" style="word-wrap:break-word">Rencana TL</th>
									<th width="93" style="word-wrap:break-word">Selesai TL</th>							
									<th width="149" style="word-wrap:break-word">Rekanan</th>
								</tr>';
							}
							if ($_POST['subobjek_item'][$i]==$_POST['nama_subobjek_item'][$j])
							{
								$perbaikan .='
								<tr>
									<td align="center" class="isi" style="border-left: 1px solid black;">'. $no .'</td>
									<td class="isi">'. $_POST['item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['kriteria_item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['rencana_tl_item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['selesai_tl_item'][$j] .'</td>
									<td class="isi">'. $_POST['rekanan_item'][$j] .'</td>
								</tr>';
								$no++;
							}
						}
						$perbaikan.='
						</table>';
					}
				}
				$perbaikan .= '</td></tr></table>';
			}
			if ($banyak_r_dinas > 0)
			{
				$perbaikan .='
				<br/>
				<p style="font-size:12pt;"><strong>R. Dinas</strong><br/><br/></p>
				<table width="867px" id="mytable" align="center" style="table-layout: fixed;">';
				$perbaikan .= '
				<tr>
				<td class="header" colspan="2">';
				for ($i=0;$i<count(array_unique($_POST['subobjek_item']));$i++)
				{
					if ($_POST['bagian_subobjek_item'][$i] == "R. Dinas")
					{
						$no = 1;
						$perbaikan .= '
						<p style="font-size:12pt"><strong>'. $_POST['subobjek_item'][$i] .'</strong></p>';
						for ($j=0;$j<count($_POST['item']);$j++)
						{
							if ($j==0)
							{
								$perbaikan .= '
								<table width="865" id="mytable" style="table-layout: fixed;" align="center">
								<tr>
									<th width="24" style="border-left: 1px solid black; word-wrap:break-word">No</th>
									<th width="230" style="word-wrap:break-word">Nama Tindakan</th>
									<th width="70" style="word-wrap:break-word">Kriteria</th>
									<th width="96" style="word-wrap:break-word">Rencana TL</th>
									<th width="93" style="word-wrap:break-word">Selesai TL</th>
									<th width="149" style="word-wrap:break-word">Rekanan</th>
								</tr>';
							}
							if ($_POST['subobjek_item'][$i]==$_POST['nama_subobjek_item'][$j])
							{
								$perbaikan .='
								<tr>
									<td align="center" class="isi" style="border-left: 1px solid black;">'. $no .'</td>
									<td class="isi">'. $_POST['item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['kriteria_item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['rencana_tl_item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['selesai_tl_item'][$j] .'</td>
									<td class="isi">'. $_POST['rekanan_item'][$j] .'</td>
								</tr>';
								$no++;
							}
						}
						$perbaikan.='
						</table>';
					}
				}
				$perbaikan .='</td></tr></table>';
			}
			if ($banyak_lajur_gardu > 0)
			{
				$perbaikan .='
				<br/>
				<p style="font-size:12pt;"><strong>Lajur / Gardu(*)</strong><br/><br/></p>
				<table width="867px" id="mytable" align="center" style="table-layout: fixed;">';
				$perbaikan .= '
				<tr>
				<td class="header" colspan="2">';
				for ($i=0;$i<count(array_unique($_POST['subobjek_item']));$i++)
				{
					if ($_POST['bagian_subobjek_item'][$i] == "Lajur / Gardu")
					{
						$no = 1;
						$perbaikan .= '
						<p style="font-size:12pt"><strong>'. $_POST['subobjek_item'][$i] .'</strong></p>';
						for ($j=0;$j<count($_POST['item']);$j++)
						{
							if ($j==0)
							{
								$perbaikan .= '
								<table width="865" id="mytable" style="table-layout: fixed;" align="center">
								<tr>
									<th width="24" style="border-left: 1px solid black; word-wrap:break-word">No</th>
									<th width="230" style="word-wrap:break-word">Nama Tindakan</th>
									<th width="70" style="word-wrap:break-word">Kriteria</th>
									<th width="96" style="word-wrap:break-word">Rencana TL</th>
									<th width="93" style="word-wrap:break-word">Selesai TL</th>
									<th width="149" style="word-wrap:break-word">Rekanan</th>
								</tr>';
							}
							if ($_POST['subobjek_item'][$i]==$_POST['nama_subobjek_item'][$j])
							{
								$perbaikan .='
								<tr>
									<td align="center" class="isi" style="border-left: 1px solid black;">'. $no .'</td>
									<td class="isi">'. $_POST['item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['kriteria_item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['rencana_tl_item'][$j] .'</td>
									<td align="center" class="isi">'. $_POST['selesai_tl_item'][$j] .'</td>
									<td class="isi">'. $_POST['rekanan_item'][$j] .'</td>
								</tr>';
								$no++;
							}
						}
						$perbaikan.='
						</table>';
					}
				}
				$perbaikan .='</td></tr></table>';
			}
		}
	
	$perbaikan .= '
	<tr>
      <td style="border-left: 1px solid black" class="isi">
	  <p style="font-size:12pt"><strong>Keterangan :</strong></p>
		<table width="450" id="mytable" style="table-layout: fixed;">
          <tr>
            <td width="450" height="113" style="border-left: 1px solid black; border-top: 1px solid black" class="isi" bgcolor="#CCCCCC" valign="baseline">';
	if (!empty(count($_POST['keterangan_perbaikan'])))
	{
		for ($j=0;$j<count(array_unique($_POST['subobjek_item']));$j++)
		{
			$perbaikan .='<p style="font-size:10pt"><strong>'. $_POST['subobjek_item'][$j] .'</strong></p>';
			$no = 1;
			for ($i=0; $i < count($_POST['keterangan_perbaikan']); $i++)
			{
				if ($_POST['keterangan_perbaikan'][$i] != NULL and $_POST['keterangan_perbaikan'][$i] !='-' and $_POST['keterangan_perbaikan'][$i] != '' and $_POST['subobjek_item'][$j]==$_POST['nama_subobjek_item'][$i])
				{
					$perbaikan .= $no.'. '.$_POST['keterangan_perbaikan'][$i].'<br/>';
					$no++;
				}
				else if (($_POST['keterangan_perbaikan'][$i] == NULL or $_POST['keterangan_perbaikan'][$i] =='-' or $_POST['keterangan_perbaikan'][$i] == '') and (count($_POST['keterangan_perbaikan'])-1==$i) and $no==1)
				{
					$perbaikan .= '-<br/>';
				}
			}
		}
	}
	$perbaikan .='</td>
          </tr>
		</table></td>
	  <td class="isi" align="center" width="250">
		<p>Mengetahui<br/>'. $_POST['jabatan_mengetahui'] .'</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p><u>'. $_POST['mengetahui'] .'</u></p></td>
    </tr>';
	
	$perbaikan .= '
	</table>
	</body>
	</html>';
		$foto_perbaikan = '
		<html>
		<body>
		<table>
		<tr>
			<td colspan="4"><p style="font-size:12pt"><strong>REKAMAN GAMBAR PERBAIKAN PEMELIHARAAN</strong></p></td>
		</tr>
		';
			for ($i=0; $i < count($_POST['photo0']); $i++)
			{
				if ($_POST['photo0'][$i] != '-' or $_POST['photo50'][$i] != '-' or $_POST['photo100'][$i] != '-')
				{
					$foto_perbaikan .='
					<tr>
						<td class="header">'. $_POST['subobjek_item'][$i] .'</td>
					</tr>
					<tr>';
				}
				if ($_POST['photo0'][$i] != '-')
				{
					$foto_perbaikan .='
					<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo0'][$i] .'" width="200px" height="180px" /></td>';
				}
				if ($_POST['photo50'][$i] != '-')
				{
					$foto_perbaikan .='
					<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo50'][$i] .'" width="200px" height="180px" /></td>';
				}
				if ($_POST['photo100'][$i] != '-')
				{
					$foto_perbaikan .='
					<td class="header"><img src="../popup_image/photo/inspeksi/'. $_POST['photo100'][$i] .'" width="200px" height="180px" /></td>';
				}
					$foto_perbaikan .='
					</tr>
					<tr>';
			}
			$foto_perbaikan .= '
			</tr>
			</table>
			</body>
			</html>';
}

/* $outputhtml[] = $html;
$outputfoto[] = $foto;
foreach($outputhtml as $data)
{
	echo $data;
}
foreach($outputfoto as $data)
{
	echo $foto;
} */
include("mpdf.php");
/*lihat method constructor pada file mpdf.php  
 /  disana terdapat penjelasan lebih detail tentang parameternya, 
   atau lihatlah dokumentasinya */

// A4 maksudnya ukuran kertas
$mpdf = new mPDF('utf-8', 'A4', 0, '', 10, 10, 5, 1, 1, 1, '');
$mpdf->SetProtection(array('print'));
$mpdf->setFooter('{PAGENO}');
$mpdf->WriteHTML($html);
$mpdf->AddPage();
$mpdf->WriteHTML($foto);
if($_POST['objek']!='APD')
{
	$mpdf->AddPage();
	$mpdf->WriteHTML($perbaikan);
	$mpdf->AddPage();
	$mpdf->WriteHTML($foto_perbaikan);
}
$mpdf->Output('','',$_POST['tgl_inspeksi'],$_POST['objek']);
?>
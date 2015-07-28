<?php
session_start();
error_reporting(0);
ob_start();

if((empty($_SESSION['nama'])) )
{
?>
	<script language="javascript">
		alert("Harus Login Terlebih Dahulu");
		document.location="index.php";
	</script>
<?php
}
else
{
	include "koneksi/koneksi_pemeliharaan.php";
	$db=new koneksi();
	$db->koneksi_db();
	
	include "class_lokasi.php";
	$lokasi = new lokasi();
	
	include "class_indikasi.php";
	$indikasi = new indikasi();
	
	include "class_subobjek.php";
	$subobjek = new subobjek();
	
	include "class_tindakan.php";
	$tindakan = new tindakan();
	
	include "class_user.php";
	$user = new user();
	
	include "class_objek.php";
	$objek = new objek();
	
	include "class_item.php";
	$item = new item();
	
	include "class_detail.php";
	$detail = new detail();
	
	include "class_tampil.php";
	$tampil_suep = new tampil_suep();
	
	include "class_pdf_pemeliharaan.php";
	$pdf_pemeliharaan = new pdf_pemeliharaan();
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>PT Jasa Marga JAPEK Inspeksi Pemeliharaan </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/stylepop.css" type="text/css"/>	
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
	<link rel="stylesheet" href="assets/css/horizontal-menu.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES sesuaikan dengan css periksa apakah sudah semua dimasukan-->
    <link href="assets/css/layout2.css" rel="stylesheet" />
       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
	     <link rel="stylesheet" href="assets/plugins/fullcalendar-1.6.2/fullcalendar/fullcalendar.css" />
<link rel="stylesheet" href="assets/css/calendar.css" />
 <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
    <link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
	<!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" style="background-image : url('assets/img/background.png');
			background-image:repeat;" >
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;padding-bottom: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                    <img src="assets/img/jasamarga.png" width="220px" alt="Logo Perusahaan" /></a> 
					
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
				<li >
                <a class="user-link" href="#">
				</li>
				<li><i class="icon-user"></i> Hi, <?php echo $_SESSION['nama']; ?> </a><br/></li>
				<li><a href="#">|</a><br/></li>
				<li><a href="index.php"><i class="icon-signout" ></i> Logout </a><br/></li>
                    <!--END ADMIN SETTINGS -->
                </ul>
				<br/>
				<br/>
				<br/>
				<div class="horizontal-menu">
					<ul>
					<?php
						$query = "SELECT * FROM t_hmenu";
						$exe = mysql_query($query);
						$no = 1;
						while($row = mysql_fetch_assoc($exe))
                        {
                            if ($_GET['hid']==$row[id_hmenu])
                            {
                            ?>
                                <li class="active"><a href="<?php echo $row[nama_hmenu] ;?>.php?pilihan=<?php echo $row[nama_hmenu] ;?>&hid=<?php echo $row[id_hmenu] ;?>" ><i class="<?php echo $row[icon] ;?>"></i> <?php echo $row[nama_hmenu];?></a></li>
                            <?php
                            }
                            else if ($_GET['hid']!=$row[id_hmenu])
                            {
                            ?>
                                <li><a href="<?php echo $row[nama_hmenu];?>.php?pilihan=<?php echo $row[nama_hmenu] ;?>&hid=<?php echo $row[id_hmenu] ;?>" ><i class="<?php echo $row[icon] ;?>"></i> <?php echo $row[nama_hmenu];?></a></li>
                            <?php
                            }
                            ?>


						<?php
						}
						?>
					</ul>
     
				</div>
            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
		<?php
			if ($_GET['pilihan']=='Laporan')
			{
				
				?>
				<div id="left" >
				<ul id="menu" class="collapse">
				<?php
				
				$query = "SELECT * FROM t_lingkup order by nama asc";
                $exe = mysql_query($query);
                $no = 1;
                while($row = mysql_fetch_assoc($exe)){
				if ($_GET['vid']==$row[id_lingkup])
				{
				?>
					<li class="active"><a href="laporan.php?pilihan=Laporan&hid=<?php echo $_GET['hid'] ;?>&vid=<?php echo $row[id_lingkup] ;?>" ><i class="icon-file-alt"></i> <?php echo $row[nama];?>
					</a>
					</li>
				<?php
				}
				else if ($_GET['vid']!=$row[id_lingkup])
				{
				?>
					<li><a href="laporan.php?pilihan=Laporan&hid=<?php echo $_GET['hid'] ;?>&vid=<?php echo $row[id_lingkup] ;?>" ><i class="icon-file-alt"></i> <?php echo $row[nama];?>
					</a>
					</li>
				<?php
				}
				?>
				
					
				<?php
				}
				?>
				</ul>
				</div>
				
				<?php
				
			}
			else if ($_GET['pilihan']=='Aset')
			{
			?>
				<div id="left" >
				<ul id="menu" class="collapse">
				<?php
				if($_SESSION['jabatan']!="admin")
				{
					$query = "SELECT * FROM t_menu_input where level='umum' ";
				}
				else
				{
					$query = "SELECT * FROM t_menu_input";
				}
                $exe = mysql_query($query);
                $no = 1;
                while($row = mysql_fetch_assoc($exe)){
				if ($_GET['vvid']==$row[id_input])
				{
				?>
					<li class="active"><a href="<?php echo $row[nama_menu] ;?>.php?pilihan=Aset&hid=<?php echo $_GET['hid'] ;?>&vvid=<?php echo $row[id_input] ;?>" ><i class="<?php echo $row[icon]; ?>"></i> <?php echo $row[nama_menu];?></a></li>
				<?php
				}
				else if ($_GET['vvid']!=$row[id_input])
				{
				?>
					<li><a href="<?php echo $row[nama_menu] ;?>.php?pilihan=Aset&hid=<?php echo $_GET['hid'] ;?>&vvid=<?php echo $row[id_input] ;?>" ><i class="<?php echo $row[icon]; ?>"></i> <?php echo $row[nama_menu];?></a></li>
				<?php
				}
				?>
				
					
				<?php
				}
				?>
				</ul>
				</div>
			<?php	
			}
		?>
       
		<!--initiate accordion-->
        <!--END MENU SECTION -->
<?php
include "header.php";


	if ($_GET['menu']=='user' && $_GET['action']=='tambah-data')
	{
		$user->npp = $_POST['txt_npp'];
		$user->nama= $_POST['txt_nama'];
		$user->jk= $_POST['txt_jk'];
		$user->divisi= $_POST['txt_divisi'];
		$user->telepon= $_POST['txt_telepon'];
		$user->akses= $_POST['txt_akses'];
		$user->password= md5($_POST['txt_password']);
		$user->vpass= $_POST['txt_password'];
		$user->lokasi_file=$_FILES['photo']['tmp_name'];
		$user->tipe_file=$_FILES['photo']['type'];
		$user->nama_file=$_FILES['photo']['name'];
		$user->direktori="img/user/$user->nama_file";
		$user->extensi=pathinfo($user->direktori,PATHINFO_EXTENSION);
			
		$user->tambah();
	}
	
	else if ($_GET['menu']=='user' && $_GET['action']=='hapus-data')
	{
		$user->direktori_hapus="img/user/";
		$user->hapus($_POST['bukuid']);
	}
	
	else if ($_GET['menu']=='user' && $_GET['action']=='edit-data')
	{
		$user->npp = $_POST['txt_npp'];
		$user->nama = $_POST['txt_nama'];
		$user->jk= $_POST['txt_jk'];
		$user->divisi= $_POST['txt_divisi'];
		$user->telepon= $_POST['txt_telepon'];
		$user->akses= $_POST['txt_akses'];
		$user->password= md5($_POST['txt_password']);
		$user->vpass= $_POST['txt_password'];
		$user->nama_foto_lama = $_POST['nama_foto_lama'];
		$user->lokasi_file=$_FILES['photo']['tmp_name'];
		$user->tipe_file=$_FILES['photo']['type'];
		$user->nama_file=$_FILES['photo']['name'];
		$user->direktori_upload="img/user/$user->nama_file";
		$user->direktori_hapus="img/user/";
		$user->extensi=pathinfo($user->direktori_upload,PATHINFO_EXTENSION);
		$user->ubah();
	}
?> 
 <!--PAGE CONTENT -->
        
       <!--END PAGE CONTENT -->
    </div>
	
     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script>
			 $('li').click(function(){
	  
	  $(this).addClass('active')
		   .siblings()
		   .removeClass('active');
		
	});
    </script>
	<!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>

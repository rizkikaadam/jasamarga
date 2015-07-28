<?php
include "header.php";
{
?>
 <!--PAGE CONTENT -->
        <div id="content-home">
            <div class="inner-home">
                <br/>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
							<!-- isi disini -->
								<div class="col-lg-12">
									<h1> Admin Dashboard </h1>
								</div>
							<hr />
								<div style="text-align: center;">
									<?php
										$query = "SELECT * FROM t_lingkup order by nama asc";
										$exe = mysql_query($query);
										$no = 1;
										while($row = mysql_fetch_assoc($exe)){
										?>
												<a class="quick-btn2" href="laporan.php?pilihan=Laporan&hid=2&vid=<?php echo $row[id_lingkup] ;?>" >
													<i class="icon-archive icon-2x"></i>
													<?php
													$banyak_apd=$tampil_suep->banyak_apd($row['id_lingkup']);
													echo "<h4>$banyak_apd</h4>";
													?>
													<span> <?php echo $row[nama] ;?></span>
												</a>
										<?php
										}
									?>                           
								</div>
							<hr />
							<!-- isi disini -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
       <!--END PAGE CONTENT -->	
	   </div> 
     <!--END MAIN WRAPPER -->
 
   <!-- FOOTER -->
    <div id="footer">
         <p>&copy;  JASAMARGA &nbsp;2015 &nbsp;</p>
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
<?php
}
?>
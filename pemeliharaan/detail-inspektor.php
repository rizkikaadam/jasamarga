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
									<h1> Detail Laporan Kegiatan Inspektor </h1>
								</div>
							<hr />
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="box">
                                        <header>
                                            <h5></h5>
                                            <div class="toolbar">
                                                 <button class="btn btn-sm btn-primary"><i class="icon-print"></i> print</button>
                                            </div>
                                        </header>
                                        <div class="body">
                                            <!-- UNTUK PROFIL -->
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="box">
                                        <header>
                                            <h5><i class="icon-user"></i> Profi Inspektor</h5>

                                        </header>
                                        <div class="body">
                                            <a  id="example1" href="assets/img/demoBig.jpg"  title="Lorem ipsum dolor sit amet"><img src="assets/img/1G.jpg" alt="" /></a>
                                            <h5>NPP:<br/>Nama:</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- AKHIR UNTUK PROFIL -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box">
                                            <header>
                                                <h5><i class="icon-list-alt"></i> Detail</h5>
                                                <div class="toolbar">
                                                    <span class="label">label</span>
                                                </div>
                                            </header>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Inspeksi</th>
                                                                <th>banyak Inspeksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                    <tr class='odd gradeX'>
                                                                        <td>1</td>
                                                                        <td>Nama_inspektor</td>
                                                                        <td>banyak_inspeksi</td>                              
                                                                        </td>
                                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                        </div>
                                    </div>
                                </div>
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
  <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
       <script src="assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
<?php
}
?>
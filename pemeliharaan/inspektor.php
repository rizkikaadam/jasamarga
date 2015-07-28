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
									<h1> Laporan Kegiatan Inspektor </h1>
								</div>
							<hr />
                                <div class="box">
                                    <header>
                                        <div class="icons">
                                            <i class="icon-calendar"></i>
                                        </div>
                                        <h5>Urut Berdasarkan : </h5>

                                        <div class="toolbar">
                                            <ul class="nav pull-right">
                                                <li>
                                                    <a href="#dateRangePickerBlock" data-toggle="collapse"
                                                       class="accordion-toggle minimize-box">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="close-box">
                                                        <i class="icon-remove"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </header>

                                    <div class="col-lg-6">
                                        <div id="dateRangePickerBlock" class="body collapse in">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4" for="reservation">Periode tanggal :</label>
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                            <input type="text" name="reservation" id="reservation" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Periode Bulan</label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Periode Tahun</label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <center><a href='#' class='btn btn-default btn-grad'>Urut</a></center>
                                                
                                    </form>
                                        </div>
                                    </div>
                                </div>
								<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>No</th>
											<th>Nama Inspektor</th>
											<th>banyak Inspeksi</th>
											<th>Detail</th>
										</tr>
                                    </thead>
                                    <tbody>
												<tr class='odd gradeX'>
													<td>1</td>
													<td>Nama_inspektor</td>
													<td>banyak_inspeksi</td>
													<td><a href='detail-inspektor.php' class='btn btn-danger btn-sm btn-flat'>Detail</a>                                                    
													</td>
												</tr>
                                    </tbody>
                                </table>
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
<?php
include "header.php";
?>
<!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Full Calendar </h2>



                    </div>
                </div>

                <hr />
                  <div class="row">
                    <div class="col-lg-12">

                <div class="box">
  <header>
      <h5>Calendar</h5>
  </header>
  <div class="body">
      <div class="row">
	  <div class="col-lg-3">
	      <div class="well well-small">
		  <div id="add-event-form">
		      <fieldset>
			  <legend>Add Custom Event</legend>
			  <span class="help-block">Event Title</span>
			  <input id="title" name="title" type="text" placeholder="event title" class="form-control input-small">
			  <label class="radio">
			      <input type="radio" name="priority" value="label label-default" checked>
			      <span class="label label-default">default</span>
			  </label>
			  <label class="radio">
			      <input type="radio" name="priority" value="label label-warning">
			      <span class="label label-warning">warning</span>
			  </label>
			  <label class="radio">
			      <input type="radio" name="priority" value="label label-success">
			      <span class="label label-success">success</span>
			  </label>
			  <label class="radio">
			      <input type="radio" name="priority" value="label label-info">
			      <span class="label label-info">info</span>
			  </label>
			  <label class="radio">
			      <input type="radio" name="priority" value="label label-danger">
			      <span class="label label-danger">danger</span>
			  </label>
			  <br>
			  <button id="add-event" type="button" class="btn btn-sm btn-default">Add Event</button>
		      </fieldset>
		  </div>

	      </div>
	      <div class="well well-small">
		  <h4>Draggable Events</h4>
		  <ul id='external-events' class="list-inline">
		      <li class="external-event"><span class="label label-default">My Event 1</span></li>
		      <li class="external-event"><span class="label label-danger">My Event 2</span></li>
		      <li class="external-event"><span class="label label-success">My Event 3</span></li>
		      <li class="external-event"><span class="label label-warning">My Event 4</span></li>
		      <li class="external-event"><span class="label label-info">My Event 5</span></li>
		  </ul>

		  <label class="checkbox inline" for='drop-remove'>
		      <input type="checkbox" id="drop-remove">
		      remove after drop
		  </label>
	      </div>
	  </div>
	  <div id="calendar" class="col-lg-9"></div>
      </div>
  </div>


            </div>

</div>
                      </div>
                </div> 
				<!--PAGE CONTENT -->

         
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
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/js/jquery-ui.min.js"></script>

     <script src="assets/plugins/fullcalendar-1.6.2/fullcalendar/fullcalendar.min.js"></script>  
   <script src="assets/js/calendarInit.js"></script>
        <script>
            $(function () { CalendarInit(); });
        </script>
    <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>
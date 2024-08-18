<!DOCTYPE html>
<html>
<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title> Drivera | schedual </title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="view/resources/vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="view/resources/vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="view/resources/vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="view/resources/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="view/resources/vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="view/resources/src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="view/resources/src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="view/resources/vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<style>
			

			.notification-dot {
			display: inline-block;
			width: 10px;
			height: 10px;
			background-color: darkmagenta ;
			border-radius: 50%;
			margin-left: 5px;
			margin-left : 20%;
			}
	
			</style>
		<!-- End Google Tag Manager -->


<!-- Include FullCalendar library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>



<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- JS for full calender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<!-- bootstrap css and js -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>














<body>



<div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="view/resources/logo.png"  width="400" 
					height="500" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div>


	<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
						<span class="user-icon">
								<img src="view/resources/profile.png" alt="" />
							</span>
							<span class="user-name"><?php echo htmlspecialchars($owner[0]['lname']) . "  " . htmlspecialchars($owner[0]['fname']) ;?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="index.php?action=owner_profile">
							<i class="dw dw-user1"></i> Profile</a>
							<a class="dropdown-item" href="index.php?action=logout">
							<i class="dw dw-logout"></i> Log Out</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="index3.html">
					<img src="view/resources/logo.png"
					width= "115 "
					height="50"
					text-align="right-sidebar"
					alt="" class="dark-logo" />
					
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
					<?php if ($_COOKIE["isowner"] == 1)
					{ echo
						'<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-house"></span
								><span class="mtext">Dashboard</span>
							</a>
							<ul class="submenu">
								
								<li><a href="index.php?action=owner_profile"> Owner profile </a></li>
							</ul>
						</li>
		
						<li class="dropdown">
							<a href="index.php?action=list_monitors" class="dropdown-toggle">
								<span class="micon bi bi-textarea-resize"></span
								><span class="mtext">Monitors </span>
							</a>
							
						</li> ';
					}
						else 
                        {
							echo '<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-house"></span
								><span class="mtext">Monitor Page </span>
							</a>
							<ul class="submenu">
								<li><a href="index.php?action=monitor_profile_2"> Monitor profile </a></li>
								
							</ul>
						</li>';
	
						}
					
					?>
						<li class="dropdown">
							<a href="index.php?action=list_student" class="dropdown-toggle">
								<span class="micon bi bi-table"></span
								><span class="mtext">Students </span>
							</a>
							
						</li>
						<li>
							<a href="index.php?action=show_calendar" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-calendar4-week"></span
								><span class="mtext">Scheduling </span>
							</a>
						</li>
						<li class="dropdown">
							<a href="index.php?action=Category_Management" class="dropdown-toggle">
								<span class="micon bi bi-archive"></span
								><span class="mtext">Categories</span>
							</a>
						</li>
						<li>
							<a href="index.php?action=show_notifications" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-chat-right-dots"></span
								><span class="mtext">Notifications </span>
								<?php if($there_are_notifications ){

									echo '<span class="notification-dot"></span>' ;
								}
								?>
								
							</a>
							
						</li>

						<li class="dropdown">
							<a href="index.php?action=exam_list" class="dropdown-toggle">
								<span class="micon bi bi-command"></span
								><span class="mtext">Exam   </span>
							</a>
							
						</li>
						<?php if ($_COOKIE["isowner"] == 1)
					{ echo
						'<li class="dropdown">
							<a href="index.php?action=list_vehicles" class="dropdown-toggle">
								<span class="micon bi bi-pie-chart"></span
								><span class="mtext"> Vehicles </span>
							</a>
							
						</li>';
					}
					?>

						<?php if ($_COOKIE["isowner"] == 1)
					{ echo
						'<li>
							<a href="index.php?action=list_payments" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-receipt-cutoff"></span
								><span class="mtext">Payment</span>
							</a>
						</li>';
					}
					?>
						<li>
							<div class="dropdown-divider"></div>
						</li>
						
						
						
					
				</div>
			</div>
		</div>

		<div class="mobile-menu-overlay"></div>

        
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4> Scheduling </h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol  class="breadcrumb" style="background-color:white;">
										<li class="breadcrumb-item">
											<a  href="index3.html">Dashboard</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											the schedules
										</li>
									</ol>
								</nav>
							</div>
							
							</div>
						</div>
					</div>
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30 container">
                    <div class="row">
						<div class="pd-20">
							<h4 class="text-blue h4">The month calendar </h4>
							<div id="calendar"></div>
						</div>

                    </div>


<!-- Start popup dialog box -->
<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Add New Event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">�</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">



					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label style=" width :100%;" for="event_name">Class name </label>
							  <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Enter your class name">
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label  style=" width :100%;"  for="event_description">Class description </label>
							  <input type="text" name="event_desc" id="event_desc" class="form-control" placeholder="Enter your class description ">
							</div>
						</div>
					</div>


					<hr>

					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label style=" width :100%;"  for="event_monitor">Class monitor </label>
							  <select name="event_monitor" id="event_monitor">
							  <?php 
            for ($i=0;$i<count($monitors);$i++){
				
            ?>

					<option value="<?php echo $monitors[$i]['IDM'] ;?> "><?php echo $monitors[$i]['fname'].' '.$monitors[$i]['lname'] ;?> </option>

            
            <?php
            }
          ?>
								
							  </select>
							</div>
						</div>
					</div>


					


					<hr>
					

					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label style=" width :100%;"  for="event_category">Class category </label>
							  <select name="event_category" id="event_category">
							  <?php 
								for ($i=0;$i<count($categories);$i++){
									
								?>

										<option value="<?php echo $categories[$i]['CategoryID'] ;?> "><?php echo $categories[$i]['CategoryName']  ;?> </option>

								
								<?php
								}
							?>
								
							  </select>
							</div>
						</div>
					</div>



					

					<hr>

					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label style=" width :100%;"  for="event_type">Class type </label>
							  <select name="event_type" id="event_type">
								<option value="Theoretical">theoretical</option>
								<option value="Practical Type 1">practical 1</option>
								<option value="Practical Type 2">practical 2</option>
							  </select>
							</div>
						</div>
					</div>
					


					<hr>

					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label  style=" width :100%;"  for="event_hours">The number of hours that the student has attend: </label>
							  <input type="number" max = "0" min="20"  name="event_hours" id="event_hours" class="form-control" >
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label style=" width :100%;"  for="event_vehicle">Class vehicle </label>
							  <select name="event_vehicle" id="event_vehicle">
							  <?php 
            for ($i=0;$i<count($vehicles);$i++){
				
            ?>

					<option value="<?php echo $vehicles[$i]['VehicleID'] ;?> "><?php echo $vehicles[$i]['Model'];?> </option>

            
            <?php
            }
          ?>
								
							  </select>
							</div>
						</div>
					</div>

					<hr>


					<div class="row">
						<div class="col-sm-6">  
							<div class="form-group">
							  <label style=" width :100%;"  for="event_start_date">Class date </label>
							  <input type="datetime-local" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Class date">
							 </div>
						</div>
						
					</div>


					<hr >

					





				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" style = "position:unset;width:50%;" onclick="save_event()">Save Event</button>
			</div>
		</div>
	</div>
</div>
<!-- End popup dialog box -->

<br>







						
					</div>
					<!-- Export Datatable End -->
				</div>
				
			</div>
		</div>




		<!-- End Google Tag Manager (noscript) -->
	</body>


    <!-- js -->
		<script src="view/resources/vendors/scripts/script.min.js"></script>
		<script src="view/resources/vendors/scripts/process.js"></script>
		<script src="view/resources/vendors/scripts/layout-settings.js"></script>
		<script src="view/resources/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="view/resources/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="view/resources/src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="view/resources/vendors/scripts/datatable-setting.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>

        

<script>
$(document).ready(function() {
	display_events();


}); //end document.ready block

function display_events() {
	var events = new Array();
$.ajax({
    url: 'lib/calendar/display_event.php',  
    dataType: 'json',
    success: function (response) {
		
    var result=response.data;
    $.each(result, function (i, item) {
    	events.push({
            event_id: result[i].event_id,
            title: result[i].title,
			url:result[i].url,
			start:moment(result[i].start).format('YYYY-MM-DDTHH:mm:ss'),
            color: result[i].color,
        }); 	
    })

	

	var calendar = $('#calendar').fullCalendar({


		

	    defaultView: 'month',
		 timeZone: 'local',
	    editable: true,
        selectable: true,
		selectHelper: true,


		select: function(start, end) {
		var selectedDate = start.format('YYYY-MM-DDTHH:mm:ss');
		$('#event_start_date').val(selectedDate);

		$('#event_entry_modal').modal('show');
        },



		events: events,



	    eventRender: function(event, element, view) { 
			var eventTime = moment(event.start).format('h:mm A'); // Format the start time
        
        element.find('.fc-title').html(event.title); // Update the event title
        element.find('.fc-time').text(eventTime); // Set the event time


            element.bind('click', function() {
				window.location.href = event.url;
				});
    	}
		}); //end fullCalendar block	
	  },//end success block


	 

	  error: function (xhr, status) {
	  alert(response.msg);
	  }

	});//end ajax block	
}

function save_event()
{
var event_name=$("#event_name").val();
var event_start_date=$("#event_start_date").val();
var event_end_date=$("#event_end_date").val();

var event_monitor =$("#event_monitor").val();
var event_vehicle =$("#event_vehicle").val();
var event_type=$("#event_type ").val();
var event_category=$("#event_category ").val();
var event_hours=$("#event_hours ").val();


if(event_name=="" || event_start_date=="" || event_end_date=="" || event_monitor=="" || event_type=="" || event_category==""|| event_hours=="")
{
alert("Please enter all required details.");
return false;
}
$.ajax({
 url:"lib/calendar/save_event.php",
 type:"POST",
 dataType: 'json',
 data: {event_name:event_name,event_start_date:event_start_date,event_end_date:event_end_date,event_monitor:event_monitor,event_type:event_type,event_vehicle:event_vehicle,event_category:event_category,event_hours:event_hours},
 success:function(response){
   $('#event_entry_modal').modal('hide');  
   if(response.status == true)
   {
	alert(response.msg);
	location.reload();
   }
   else
   {
	 alert(response.msg);
   }
  },
  error: function (xhr, status) {
  console.log('ajax error = ' + xhr.statusText);
  alert(response.msg);
  }


});    
return false;
}
</script>
</html> 
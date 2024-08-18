<!DOCTYPE html>
<html>
<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title> Drivera | class </title>

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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<style>
	.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 0 auto;
  margin-top: 10%;
  padding: 5%;
  border: 1px solid #ccc;
  height: 60%;
  width:40%;
  border-radius: 5px;
  box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3);
  text-align: center;
  position: relative;
  overflow: auto ;
}

.close {
  color: #aaa;
  position: absolute;
  top: 10px;
  right: 20px;
  font-size: 24px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
}
</style>
</head>














<body>
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
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-textarea-resize"></span
								><span class="mtext">Monitors </span>
							</a>
							<ul class="submenu">
								<li><a href="index.php?action=list_monitors">All Monitors</a></li>
								
								
							</ul>
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
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-table"></span
								><span class="mtext">Students </span>
							</a>
							<ul class="submenu">
								<li><a href="index.php?action=list_student">All Students </a></li>
								
							</ul>
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
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-command"></span
								><span class="mtext">Exam   </span>
							</a>
							<ul class="submenu">
								<li><a href="index.php?action=exam_list">Exam List </a></li>
								<li><a href="index.php?action=succ_students">Successful Students</a></li>
								<li><a href="index.php?action=failed_students">Failing Students</a></li>

							</ul>
						</li>
						<?php if ($_COOKIE["isowner"] == 1)
					{ echo
						'<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-pie-chart"></span
								><span class="mtext"> Vehicles </span>
							</a>
							<ul class="submenu">
								<li><a href="index.php?action=list_vehicles">All Vehicles </a></li>

							</ul>
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


		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
			<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<h2 class="text-blue h4"  >Check the students to attend this class : </h2>

				<hr>
				<div style="margin:5%;" class="row">
							<div class="col-sm-12">  
								<div class="form-group" id="students_to_add" style="display: flex;flex-direction: column;justify-items: flex-start;align-items: flex-start;">
								
								
											<?php 
							for ($i=0;$i<count($students_to_add);$i++){
								
							?>

									
									<label style="width:auto;font-size:18px;cursor:pointer;" ><input style="margin-right:10px;"  type="checkbox" name="students" value="<?php echo $students_to_add[$i]['IDS'] ;?>" id=""><?php echo $students_to_add[$i]['fname'].' '.$students_to_add[$i]['lname'] ;?></label>

							
							<?php
							}
						?>
									

									
								</div>
							</div>

							<button id="submitBtn2" style="position:relative;left:50%;width:50%;" type="submit">Add to class</button>


						</div>

			</div>
			</div>

				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4> Class</h4>
                                    
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">

                                        <?php echo $class_info[0]['name'] ; ?>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                        <?php echo $class_info[0]['Date'] ; ?>
										</li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                        <?php echo $class_info[0]['Type'] ; ?>
                                        
										</li>
									</ol>
									<p><?php echo $class_info[0]['description'] ; ?></p>
								</nav>

                               

							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a class="btn btn-primary dropdown-toggle" id="openModalLink"href="#" role="button">
									  Add Students
									</a>
								  </div>
									
								</div>
							</div>
						</div>
					</div>
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Check the class attendance </h4>
							
							
						
						</div>

						
						<div class="pb-20">
							<table id="nameTable" 
								class="table hover multiple-select-row data-table-export nowrap"
							>
							
								<thead>
									<tr>
										<th class="table-plus datatable-nosort">First Name</th>
										<th>Last Name</th>
										<th>Attendance</th>
										
									</tr>
								</thead>




								<tbody >


          <?php 
            for ($i=0;$i<count($students);$i++){
				$idstudent=$students[$i]['IDS'];
            ?>
            <tr>
										<td class="table-plus"><?php echo $students[$i]['fname'] ; ?> </td>
										<td><?php echo $students[$i]['lname'] ; ?></td>
                                        <td>
                                        <input type="checkbox" name="names[]" value="<?php echo $idstudent ; ?> " />
                                        </td>


                                        <td>
											<div class="dropdown">
												<a
													class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
													href="#"
													role="button"
													data-toggle="dropdown"
												>
													<i class="dw dw-more"></i>
												</a>
												<div
													class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
												>
													<a class="dropdown-item" href="index.php?action=student_profile&row=<?php echo $i; ?>"
														><i class="dw dw-eye"></i> View</a
													>
													<a class="dropdown-item" href="index.php?action=edit_student&idstudent=<?php echo $idstudent ?>"
														><i class="dw dw-edit2"></i> Edit</a
													>
													<a class="dropdown-item" href="#"
														><i class="dw dw-edit2"></i> Schedule </a
													>
													<a class="dropdown-item" href="index.php?action=student_delete&idstudent=<?php echo $idstudent; ?>"
														><i class="dw dw-delete-3"></i> Delete</a
													>
													
												</div>
											</div>
										</td>

			</tr>



            
            <?php
            }
          ?>
									
								</tbody>
							</table>


                           


						</div>

                        
					</div>

                    <button id="submitBtn" style="position:relative;left:50%;width:50%;" type="submit">Submit Attendace</button>
                        
					<!-- Export Datatable End -->
				</div>
				
			</div>
		</div>
		
		
 
		<!-- End Google Tag Manager (noscript) -->




		


	</body>

	<script>
		var modal = document.getElementById("myModal");
		var link = document.getElementById("openModalLink");
		var closeBtn = document.getElementsByClassName("close")[0];

		link.addEventListener("click", function() {
		modal.style.display = "block";
		});

		closeBtn.addEventListener("click", function() {
		modal.style.display = "none";
		});

		window.addEventListener("click", function(event) {
		if (event.target == modal) {
		modal.style.display = "none";
		}
		});
	</script>

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
$('#submitBtn').click(function(e) {
  e.preventDefault();

  var selectedValues = [];

  var theid = <?php echo $class_id ; ?> ;

  $('#nameTable tbody tr').each(function() {
    var checkbox = $(this).find('input[type="checkbox"]:checked');

    if (checkbox.length > 0) {
      selectedValues.push(checkbox.val());
    }
  });

  

  // Make an AJAX request to the PHP file
  $.ajax({
    url: 'lib/process.php?',
    type: 'POST',
    data: { values: selectedValues , class_id:theid  },
    success: function(response) {
      // Handle the response from the server
      console.log(response);
    },
    error: function(xhr, status, error) {
      // Handle any error during the AJAX request
      console.log('AJAX Error: ' + error);
    }
  });


  window.location.href = "index.php?action=show_calendar";
});

</script>


<script>
$('#submitBtn2').click(function(e) {
  e.preventDefault();

  var students_to_add = [];

  var theid = <?php echo $class_id ; ?> ;

  
  $('#students_to_add label').each(function() {
    var checkbox = $(this).find('input[type="checkbox"]:checked');

    if (checkbox.length > 0) {
		students_to_add.push(checkbox.val());
    }
  });

  // Make an AJAX request to the PHP file
  $.ajax({
    url: 'lib/process2.php?',
    type: 'POST',
    data: { students: students_to_add, class_id:theid  },
    success: function(response) {
      // Handle the response from the server
      console.log(response);
    },
    error: function(xhr, status, error) {
      // Handle any error during the AJAX request
      console.log('AJAX Error: ' + error);
    }
  });


  window.location.href = "index.php?action=show_calendar";
});

</script>

</html>

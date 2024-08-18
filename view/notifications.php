<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title> Drivera | notifications </title>

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
			href="view/resources/src/plugins/cropperjs/dist/cropper.css"
		/>
		<link rel="stylesheet" type="text/css" href="view/resources/vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->

		<style>
			body {
  font-family: Arial, sans-serif;
  background-color: #f1f1f1;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 100%;
  margin: 50px auto;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.notification {
  background-color: #f9f9f9;
  border-left: 6px solid #7fad39;
  padding: 15px;
  width: 85%;
  cursor: pointer;
  position: relative;
  transition: transform 0.3s ease;
  margin:0 auto 20px;
}

.notification:hover {
  transform: scale(1.05);
}

.notification h2 {
  font-size: 16px;
  margin: 0 0 10px;
  transition: color 0.3s ease;
}

.notification:hover h2 {
  color: #7fad39;
}

.notification p {
  margin: 0;
  color: #777;
  transition: color 0.3s ease;
}

.notification:hover p {
  color: #555;
}

.notification.error {
  border-left-color: #e74c3c;
}

.notification.error:hover h2 {
  color: #e74c3c;
}

.notification.error:hover p {
  color: #777;
}

.notification .actions {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
}

.notification .actions button {
  background-color: transparent;
  border: none;
  color: #777;
  font-size: 30px;
  margin-left: 10px;
  cursor: pointer;
  display: flex;
  align-items: center;
  transition: color 0.3s ease;
}

.notification .actions button:hover {
  color: #e74c3c;
}

.notification .actions button span {
  display: inline-block;
  width: 20px;
  height: 20px;
  background-color: #e74c3c;
  border-radius: 50%;
  margin-right: 5px;
  position: relative;
}

.notification .actions button span::before,
.notification .actions button span::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 60%;
  height: 2px;
  background-color: #fff;
  transform: translate(-50%, -50%);
}

.notification .actions button span::before {
  transform: translate(-50%, -50%) rotate(45deg);
}

.notification .actions button span::after {
  transform: translate(-50%, -50%) rotate(-45deg);
}

.notification .actions button:hover span {
  background-color: #ff5252;
}

.notification .actions button:hover span::before,
.notification .actions button:hover span::after {
  background-color: #fff;
}


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
		<!-- End Google Tag Manager -->
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

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Notifications </h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Dashboard</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											notifications
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="row">
						<div style="width:100%;">
							<div class="pd-20 card-box height-100-p" style="padding:0;" >
							<div class="container" style="height:100%; margin:0; padding: 5% 2%; ">

								

							<?php 
            for ($i=0;$i<count( $notifications_about_monitors);$i++){

				$NID = $notifications_about_monitors[$i]['NID'];
				$id = $notifications_about_monitors[$i]['ID'];
				$name = $notifications_about_monitors[$i]['lname']. ' '. $notifications_about_monitors[$i]['fname'];
				$type= $notifications_about_monitors[$i]['type'];
				
				if ($type == 2 ) {
					
					 $notification_title = " Expired ";
					 $notification_message = "has its monitor card expired by now .  ";
					 $error = "error";
				}
				else {
					$notification_title = " In three days  ";
					 $notification_message = " will have its monitor card expired in three days  .  ";
					 $error = "";
				}

            ?>


								<div class="notification <?php echo htmlspecialchars($error);?>">
								<h2><?php echo htmlspecialchars($notification_title);?></h2>
								<p>The monitor : <a  href="index.php?action=monitor_profile&ID=<?php echo htmlspecialchars($id);?>"><?php echo htmlspecialchars($name);?> </a><?php echo htmlspecialchars($notification_message);?></p>
								<div class="actions">
								<form action="index.php?action=delete_notification&id=<?php echo $NID ; ?> " method="post">
								<button class="delete">
								<span></span>
								</button>
								</form>


								</div>
								</div>

								
								
			<?php 
			
		} 
	
	?>


		<?php
		for ($i=0;$i<count( $notifications_about_vehicles);$i++){

	
		$NID = $notifications_about_vehicles[$i]['NID'];
		$name = $notifications_about_vehicles[$i]['Model'];
		$type= $notifications_about_vehicles[$i]['type'];
		$id= $notifications_about_vehicles[$i]['ID'];

		if ($type == 4 || $type == 6 ) {
			
			$notification_title = " Expired ";
			$error = "error";

			if ( $type == 4){
				$notification_message = "has its Insurance papers expired by now .  ";
			}
			else{
				$notification_message = "has its TechnicalInspection papers expired by now .  ";
			}
		}else{

			$notification_title = "In three days";
			$error = "";

			if ( $type == 3){
				$notification_message = "will have its Insurance papers expired in three days  .  ";
			}
			else{
				$notification_message = "will have its TechnicalInspection papers expired by now .  ";
			}
		}

		?>


						<div class="notification <?php echo htmlspecialchars($error);?>">
						<h2><?php echo htmlspecialchars($notification_title);?></h2>
						<p>The vehicle : <a  href="index.php?action=list_vehicles"> <?php echo htmlspecialchars($name);?> </a><?php echo htmlspecialchars($notification_message);?></p>
						<div class="actions">
							<form action="index.php?action=delete_notification&id=<?php echo $NID ; ?> " method="post">
							<button class="delete">
							<span></span>
							</button>
							</form>
							
						</div>
						</div>

						
						
		<?php 

		} 

	?>
							</div>


							</div>


							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
		
		<!-- js -->
		<script src="view/resources/vendors/scripts/core.js"></script>
		<script src="view/resources/vendors/scripts/script.min.js"></script>
		<script src="view/resources/vendors/scripts/process.js"></script>
		<script src="view/resources/vendors/scripts/layout-settings.js"></script>
		<script src="view/resources/src/plugins/cropperjs/dist/cropper.js"></script>
		<script>
			window.addEventListener("DOMContentLoaded", function () {
				var image = document.getElementById("image");
				var cropBoxData;
				var canvasData;
				var cropper; 

				$("#modal")
					.on("shown.bs.modal", function () {
						cropper = new Cropper(image, {
							autoCropArea: 0.5,
							dragMode: "move",
							aspectRatio: 3 / 3,
							restore: false,
							guides: false,
							center: false,
							highlight: false,
							cropBoxMovable: false,
							cropBoxResizable: false,
							toggleDragModeOnDblclick: false,
							ready: function () {
								cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
							},
						});
					})
					.on("hidden.bs.modal", function () {
						cropBoxData = cropper.getCropBoxData();
						canvasData = cropper.getCanvasData();
						cropper.destroy();
					});
			});
		</script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
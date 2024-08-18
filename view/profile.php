<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title> Drivera | Owner Profile </title>

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
								<li><a href="index3.html">Owner Dashboard </a></li>
								<li><a href="index.php?action=owner_profile"> Owner profile </a></li>
								<li><a href="DrivingInfos.html"> Driving School Information </a></li>
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
								<li><a href="index.php?action=monitor_profile_page"> Monitor profile </a></li>
								
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
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-archive"></span
								><span class="mtext"> Categories  </span>
							</a>
							<ul class="submenu">
								<li><a href="404.html">Category A </a></li>
								<li><a href="404.html"> Category B </a></li>
								<li><a href="404.html"> Category C </a></li>
								<li><a href="404.html"> Category D </a></li>
								<li><a href="404.html">Category E </a></li>
								<li><a href="404.html">Category F </a></li>
								<li><a href="404.html">Category G </a></li>
								<li><a href="404.html">Category H </a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-command"></span
								><span class="mtext">Exam   </span>
							</a>
							<ul class="submenu">
								<li><a href="404.html">Exam List </a></li>
								<li><a href="404.html">Successful Students</a></li>
								<li><a href="404.html">Failing Students</a></li>

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
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Profile</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Dashboard</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Owner Profile
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="row">
						<div style="width:100%;">
							<div class="pd-20 card-box height-100-p">
								<div class="profile-photo">
									<a
										href="modal"
										data-toggle="modal"
										data-target="#modal"
										class="edit-avatar"
										><i class="fa fa-pencil"></i
									></a>


									<img class="avatar-photo"  src="view/resources/vendors/images/photo1.jpg">
									
									
									<?php 
									/*  it is conflicting with the scripts  :(

									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "drivera";
									
									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);

									$result = $conn->query("SELECT * FROM images ORDER BY id ASC LIMIT 1");

									if ($result->num_rows > 0) {
    								$row = $result->fetch_assoc();
        							$imageData = $row['image'];
  									  }

									
										// Display image
										echo '<img class="avatar-photo"  src="data:image/jpeg;base64,' . base64_encode($imageData) . '">';
									
									
									// Close connection
									$conn->close();
									

									*/
									?>

									<div
										class="modal fade"
										id="modal"
										tabindex="-1"
										role="dialog"
										aria-labelledby="modalLabel"
										aria-hidden="true"
									>
										<div
											class="modal-dialog modal-dialog-centered"
											role="document"
										>
											<div class="modal-content">
												<div class="modal-body pd-5">
													<div class="img-container">
														<img
															id="image"
															src="view/resources/vendors/images/photo2.jpg"
															alt="Picture"
														/>
													</div>
												</div>
												<div class="modal-footer">
													<input
														type="submit"
														value="Update"
														class="btn btn-primary"
													/>
													<button
														type="button"
														class="btn btn-default"
														data-dismiss="modal"
													>
														Close
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<h5 class="text-center h5 mb-0"><?php echo htmlspecialchars($items[0]['lname']) . " 's " . htmlspecialchars($items[0]['fname']) ;?></h5>
								<p class="text-center text-muted font-14">
									the owner of this driving school 
								</p>
								<div class="profile-info">
									<h5 class="mb-20 h5 text-blue">Contact Information</h5>
									<ul>
									<li>
											<span>School Name:</span>
											<?php echo htmlspecialchars($items[0]['fname']);?>
										</li>
										<li>
											<span>Last Name:</span>
											<?php echo htmlspecialchars($items[0]['lname']);?>
										</li>

										<li>
											<span>Email Address:</span>
											<?php echo htmlspecialchars($items[0]['email']);?>
										</li>
										<li>
											<span>Phone Number:</span>
											<?php echo htmlspecialchars($items[0]['phone_num']);?>
										</li>
										<li>
											<span>State:</span>
											<?php echo htmlspecialchars($items[0]['thestate']);?>
											
										</li>
										<li>
											<span>ID number :</span>
											<?php echo htmlspecialchars($items[0]['id']);?>
										</li>
										<li>
											<span>gender :</span>
											<?php echo htmlspecialchars($items[0]['gender']);?>
										</li>
										<li>
											<span>Number of categories :</span>
											<?php echo htmlspecialchars($driving_school[0]['categories']);?>
										</li>
										
									</ul>
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

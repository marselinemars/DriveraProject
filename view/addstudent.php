<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title> Drivera | Add Student</title>

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
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Add Student </h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="view/index3.html">Dashboard </a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Add Student 
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
								
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Export List</a>
										<a class="dropdown-item" href="#">Policies</a>
										<a class="dropdown-item" href="#">View Assets</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Default Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Student Information </h4>
								<p class="mb-30">Please Enter The Student Information Carefully</p>
								<?php if (isset($vars['error_message'])){ ?> <p class="mb-30" style="color:darkred"><b><?php echo $vars['error_message'] ?></b></p> <?php } ?>

							


							</div>


						</div>
						<form  id="student_credentials" method="post" action="index.php?action=do_add_student"  >
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">First Name</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										type="text"
										placeholder="Enter the first name"
										name="fname"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Last Name </label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										placeholder="Enter the last name"
										type="search"
										name="lname"
									/>
								</div>
							</div>
							
						 
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"> Date of Birth </label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										placeholder="Date of Birth "
										type="date"
										name="bday"
										
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Place Of Birth </label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" name="PlaceOfBirth"/>
								</div>
							</div>

		                   


							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Gender </label>
								<div class="col-sm-12 col-md-10">
									<select name ="gender" form="student_credentials"class="custom-select col-12">
										<option selected="">Choose...</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
										
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Nationality </label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" name="Nationality"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									>Phone </label
								>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										
										type="tel"
										name="phone"
									/>
								</div>
							</div>

							


							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									> Address </label
								>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										
										type="text"
										name="address"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Email</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" value="email@example.com" type="text" name="email"/>
								</div>
							</div>
							
							
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" >Category </label>
								<div class="col-sm-12 col-md-10">
									<select name ="Category" form="student_credentials"class="custom-select col-12">
									<option selected="">Choose...</option>

									<?php
        							$category = $db->query('SELECT * FROM Category WHERE IsActive = 1')->fetchAll();

									// Generate options based on activated categories
									for ($i=0;$i<count($category);$i++){
										echo '<option value="' . $category[$i]['CategoryName'] . '">Category ' . $category[$i]['CategoryName'] . '</option>';
									}
									?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" >Privious License Category </label>
								<div class="col-sm-12 col-md-10">
									<select name ="PriviousLicenseCategory" form="student_credentials"class="custom-select col-12">
										<option selected="">Choose...</option>
										<option value="A1">Category A1</option>
										<option value="A2">Category A2</option>
										<option value="B">Category B</option>
										<option value="C1">Category C1</option>
										<option value="C2">Category C2</option>
										<option value="BE">Category BE</option>
										<option value="C1E">Category C1E</option>
										<option value="C2E">Category C2E</option>
										<option value="DE">Category DE</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"> Date Of Previous License</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" placeholder="PriviousLicenseDate " type="date" name="PriviousLicenseDate" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" >Blood group </label>
								<div class="col-sm-12 col-md-10">
									<select name ="bloodgroup" form="student_credentials"class="custom-select col-12">
									<option selected="">Choose...</option>
										<option value="o+">o+</option>
										<option value="o-">o-</option>
										<option value="b+">b+</option>
										<option value="b-">b-</option>
										<option value="a+">a+</option>
										<option value="a-">a-</option>
										<option value="ab+">ab+</option>
										<option value="ab-">ab-</option>
									</select>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									>The total to be paid: </label
								>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value=""
										type="text"
										name="totalpaid"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" >stage </label>
								<div class="col-sm-12 col-md-10">
									<select name ="Stage" form="student_credentials"class="custom-select col-12">
										<option selected="">Choose...</option>
										<option value="Theoretical">Theoretical</option>
										<option value="Practical Type 1">Practical Type 1</option>
										<option value="Practical Type 2">Practical Type 2</option>
										
									</select>
								</div>
							</div>
						
							
								
								
								
										
									<br>
									<br>
									<br>

									<div class="wrapper">
										<button class="" type="submit" form="student_credentials">
										  <span>add </span>
										  <div class="success">
										  <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  viewBox="0 0 29.756 29.756" style="enable-background:new 0 0 29.756 29.756;" xml:space="preserve">
											
										<path d="M29.049,5.009L28.19,4.151c-0.943-0.945-2.488-0.945-3.434,0L10.172,18.737l-5.175-5.173   c-0.943-0.944-2.489-0.944-3.432,0.001l-0.858,0.857c-0.943,0.944-0.943,2.489,0,3.433l7.744,7.752   c0.944,0.943,2.489,0.943,3.433,0L29.049,8.442C29.991,7.498,29.991,5.953,29.049,5.009z"/>
									   </svg>
											</div>
										</button>
									  </div>
							
							
						</form>
						

	
					<!-- Default Basic Forms End -->

					

					
				</div>
				
			</div>
		</div>
		
		<!-- js -->
		<script src="view/resources/vendors/scripts/core.js"></script>
		<script src="view/resources/vendors/scripts/script.min.js"></script>
		<script src="view/resources/vendors/scripts/process.js"></script>
		<script src="view/resources/vendors/scripts/layout-settings.js"></script>
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

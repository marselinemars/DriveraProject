<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Drivera | register </title>

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
			href="view/resources/src/plugins/jquery-steps/jquery.steps.css"
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
		<!-- End Google Tag Manager -->
		<style>

/* CSS style for the card */
.card {
  width: 250px;
  height: 200px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
  margin: 30px;
  display: inline-block;
  box-shadow: 0px 0px 5px #ccc;
}

/* CSS style for the card title */
.card-title {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}


/* CSS style for the select button */
.card-select-btn {
  font-size: 14px;
  padding-top: 12px;
  margin-top: 39px;
}
</style>

	</head>

	<body class="login-page">
		<div class="login-header box-shadow">
			<div class="container-fluid d-flex justify-content-between align-items-center">
				<div class="brand-logo">

					<a href="index.php?action=login">

						<img src="view/resources/logo.png" width="110" height ="290" alt=""  />
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li><a href="index.php?action=login">Login</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div
			class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div style="width:100%;">
						<img src="view/resources/vendors/images/coworking-space-3_2 (1).png" alt="" />
					</div>
					
					<div style="width:100%;" >
					
						<div style="width:100%;" class=" bg-white box-shadow border-radius-10">
							<div style="padding:20px;" >


								<form action="index.php?action=do_register" id=owner_credentials method="post" enctype="multipart/form-data">

								<?php if (isset($vars['error_message'])){ ?><br><br><b style="color:gray;"><?php echo $vars['error_message'] ?></b> <br>

<br>

<br> <?php } ?>

								


									<h5>Basic Account Credentials</h5>
									<br>
									<section >
										<div class="form-wrap max-width-600 " >
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>Email Address:*</label
												>
												<div class="col-sm-8">
													<input type="email" name ="email" class="form-control" />
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Password:*</label>
												<div class="col-sm-8">
													<input type="password" name="password" class="form-control" />
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Password confirmation:*</label>
												<div class="col-sm-8">
													<input type="password" name="confirm_password" class="form-control" />
												</div>
											</div>
											
										</div>
									</section>
									<!-- Step 2 -->
									<h5>Owner Personal Information</h5>
									<br>
									<section>
										<div class="form-wrap max-width-600 " >
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>First Name:*</label
												>
												<div class="col-sm-8">
													<input type="text" name="firstname" class="form-control" />
												</div>
											</div>
											

											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>Last Name:*</label
												>
												<div class="col-sm-8">
													<input type="text" name="lastname" class="form-control" />
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>Phone number: </label
												>
												<div class="col-sm-8">
													<input type="text" name="phone_num" class="form-control" />
												</div>
											</div>

											<div class="form-group row align-items-center">
												<label class="col-sm-4 col-form-label">Gender:*</label>
												<div class="col-sm-8">
													<div
														class="custom-control custom-radio custom-control-inline pb-0"
													>
														<input
															type="radio"
															id="male"
															name="gender"
															class="custom-control-input"
															value="male"
														/>
														<label class="custom-control-label" for="male"
															>Male</label
														>
													</div>
													<div
														class="custom-control custom-radio custom-control-inline pb-0"
													>
														<input
															type="radio"
															id="female"
															name="gender"
															class="custom-control-input"
															value="female"
														/>
														<label class="custom-control-label" for="female"
															>Female</label
														>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Willaya: </label>
												<br> <br> 
												<select
													class="selectpicker form-control form-control-lg"
													data-style="btn-outline-secondary btn-lg"
													title="Not Chosen"
													name="state"
												>
												<option value="1- Adrar">1- Adrar </option>
												<option value="2- Chlef">2- Chlef </option>
												<option value="3- Laghouat" >3- Laghouat</option>
												<option value="4- Oum-El-Bouaghi">4- Oum-El-Bouaghi</option>
												<option value="5- Batna ">5- Batna </option>
												<option value="6- Béjaïa">6- Béjaïa</option>
												<option value="7- Biskra">7- Biskra</option>
												<option value="8- Béchar">8- Béchar </option>
												<option value="9- Blida">9- Blida</option>
												<option value="10- Bouira">10- Bouira</option>
												<option value="11- Tamanrasset">11- Tamanrasset </option>
												<option value="12- Tébessa">12- Tébessa	</option>
												<option value="13- Tlemcen">13- Tlemcen </option>
												<option value="14- Tiaret">14- Tiaret</option>
												<option value="15- Tizi-Ouzou">15- Tizi-Ouzou </option>
												<option value="16- Alger ">16- Alger </option>
												<option value="17- Djelfa">17- Djelfa</option>
												<option value="18- Jijel">18- Jijel</option>
												<option value="19- Sétif">19- Sétif</option>
												<option value="20- Saïda">20- Saïda</option>
												<option value="21- Skikda">21- Skikda</option>
												<option value="22- Sidi Bel Abbès">22- Sidi Bel Abbès</option>
												<option value="23- Annaba">23- Annaba</option>
												<option value="24- Guelma">24- Guelma</option>
												<option value="25- Constantine">25- Constantine</option>
												<option value="26- Médéa">26- Médéa </option>
												<option value="27- Mostaganem">27- Mostaganem</option>
												<option value="28- M’sila ">28- M’sila </option>
												<option value="29- Mascara">29- Mascara</option>
												<option value="30- Ouargla">30- Ouargla</option>
												<option value="31- Oran">31- Oran</option>
												<option value="32- El Bayadh">32- El Bayadh</option>
												<option value="33- Illizi">33- Illizi</option>
												<option value="34- Bordj Bou Arreridj">34- Bordj Bou Arreridj</option>
												<option value="35- Boumerdès">35- Boumerdès</option>
												<option value="36- El-Tarf">36- El-Tarf</option>
												<option value="37- Tindouf">37- Tindouf </option>
												<option value="38- Tissemsilt">38- Tissemsilt </option>
												<option value="39- El-Oued" >39- El-Oued</option>
												<option value="40- Khenchela">40- Khenchela</option>
												<option value="41- Souk-Ahras">41- Souk-Ahras</option>
												<option value="42- Tipaza">42- Tipaza</option>
												<option value="43- Mila">43- Mila</option>
												<option value="44- Aïn-Defla">44- Aïn-Defla</option>
												<option value="45- Naâma">45- Naâma</option>
												<option value="46- Aïn-Témouchent">46- Aïn-Témouchent</option>
												<option value="47- Ghardaïa">47- Ghardaïa</option>
												<option value="48- Relizane">48- Relizane</option>
												<option value="49- El M'Ghair">49- El M'Ghair</option>
												<option value="50- El Meniaa">50- El Meniaa</option>
												<option value="51- Ouled Djellal">51- Ouled Djellal</option>
												<option value="52- Bordj Badji Mokhtar">52- Bordj Badji Mokhtar</option>
												<option value="53- Béni Abbès">53- Béni Abbès</option>
												<option value="54- Timimoun">54- Timimoun</option>
												<option value="55- Touggour">55- Touggourt</option>
												<option value="56- Djanet">56- Djanet</option>
												<option value="57- In Salah">57- In Salah</option>
												<option value="58- In Guezzam">58- In Guezzam</option>
												</select>
											</div>

											
										</div>
								 </div>
									</section>
								
									<!-- Step 3 -->
									
								    <h5>Driving School Information</h5>
									<br>
									<section>
										<div class="form-wrap max-width-600 ">
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>School's Name:*</label
												>
												<div class="col-sm-8">
													<input type="text" name="drivingschoolname" class="form-control" />
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>Fiscal Identification Number:*</label
												>
												<div class="col-sm-8">
													<input type="number" name="fiscalid" class="form-control" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>Owner's Name:*</label
												>
												<div class="col-sm-8">
													<input type="text" name="ownername" class="form-control" />
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Full Adress:</label>
												<div class="col-sm-8">
													<input type="text" name="address" class="form-control" />
												</div>
											</div>

										</div>
									</section>
									
									

									<br>

									<br>

									<button  for ="owner_credentials" class="form-wrap max-width-600" style=" margin-top:50px;position:relative;left:10%;" type ="submit">submit</button>


								</form>


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
		<script src="view/resources/src/plugins/jquery-steps/jquery.steps.js"></script>
		<script src="view/resources/vendors/scripts/steps-setting.js"></script>
		<!-- Google Tag Manager (noscript) -->
		
	</body>
</html>

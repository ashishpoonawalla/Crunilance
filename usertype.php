<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crunilance</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/scrollbar.css">
	<link rel="stylesheet" href="css/fontawesome/fontawesome-all.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/tipso.css">
	<link rel="stylesheet" href="css/chosen.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

			
<?php
	include('header_menu.php');
	include('authCheck.php');
?>


		
<main id="wt-main" class="wt-main wt-haslayout">


	<!--Categories Start-->
	<section class="wt-haslayaout wt-main-section " style="margin-top: -30px;">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-5 push-lg-3" >


						<?php 
						
						$msg="";
      
						if(isset($_POST['ufullname']) && isset($_POST['uemail']) && isset($_POST['upassword']) && isset($_POST['upassword2']) && isset($_POST['ucountry'])) {
						
							if( ($_POST['upassword']) != ($_POST['upassword2']) )  {
						
							 	$msg="Password not match with Confirm Pasword!";
								
							}  else {
						
								$ufullname = ($_POST['ufullname']);
								$uemail = ($_POST['uemail']);
								$upassword = ($_POST['upassword']);
								$ucountry = strtolower($_POST['ucountry']);
								// $uphone = ($_POST['uphone']);
								$verifycode = rand(10000000,99999999);
						
								$upassword = md5($upassword);
										  
								require('db.php');
								
								$sql="INSERT INTO user_info(email, password, first_name, country, verifycode) Values('$uemail','$upassword','$ufullname','$ucountry','$verifycode') " ;
								
								//$sql="INSERT INTO seller_info('username', 'password', 'store_name' ) Values('$email','$pass','$snm')" ;
								//$sql ="";
								if ($conn->query($sql) === TRUE) 
								{
									require('db.php');
									$sql1="INSERT INTO seller_info(username, full_name, country ) Values('$uemail','$ufullname','$ucountry')" ;
									//$msg = $sql1;
									$conn->query($sql1);
								 //------------ Pro image
								  $imagePath = "assets/imagesu/pro2.jpg";
								  $newPath = "assets/imagesu/";
								  $ext = '.jpg';
								  $newName  = $newPath.$uemail.$ext;
								  $copied = copy($imagePath , $newName);
						
						
								  //------------ ID Image 1
								  $imagePath = "assets/imagesu/noimg.png";
								  $newPath = "assets/imagesu/";
								  $ext = '.png';
								  $newName  = $newPath.$uemail."ID1".$ext;
								  $copied = copy($imagePath , $newName);
						
								  //------------ ID Image 2
								  $imagePath = "assets/imagesu/noimg.png";
								  $newPath = "assets/imagesu/";
								  $ext = '.png';
								  $newName  = $newPath.$uemail."ID2".$ext;
								  $copied = copy($imagePath , $newName);
								  ?>
						
								  <?php
								  //------------------ Send email ------------------------
								  //session_start();
								  $_SESSION["eml_to"] = $uemail;
								  $_SESSION["eml_sub"] = "Account created successfully.";
								  $_SESSION["eml_mes"] = "Dear $ufullname, <br><br>Your trueshipp user account created succesfully.
														  <br>Your code for verify on trueshipp: $verifycode<br>
														  <br><a href='https://trueshipp.com/ULogin.php'>Click here to login</a>";
								  $_SESSION["eml_bcc"] = "trueshipp@gmail.com";
						
								  include_once("emailsend.php");
										   $msg = "Thanks for signing with us!";

										   
										} else {
											$msg = "Some Error when creating account!, Or email already exists!";
											//echo "Error Inserting record: " . $conn->error;
										}
										$conn->close();
									
							  }
						}
							  if ($msg != ""){
								  ?>
										<div class="wt-jobalertsholder">
											<ul class="wt-jobalerts">
												<li class="alert alert-warning alert-dismissible fade show">
													<span><em>Alert:</em> <?php echo $msg; ?> </span>
													<!-- <a href="#" class="wt-alertbtn warning">Got it</a> -->
													<a href="javascript:void(0)" class="close" data-dismiss="alert"
														aria-label="Close"><i class="fa fa-close"></i></a>
												</li>
												
											</ul>
										</div>
								<?php 
							  }
						  
												
											
												
								?>
						

								

								<div class="wt-sectionhead wt-textcenter" style="background-color: #e2e8f0; border-radius: 8px; padding: 15px; ">

									<div class="" >
										<h2 style= "margin-top: 30px; 
													font-size: 20px;
													font-weight: 100;
													text-transform: none;
													margin-bottom: 2.5rem;
													color: #555;
													
													"
																>Create an Account</h2>
										
									</div>

									
                                    <div class="wt-loginformhold1" >
												<!-- <div class="wt-loginheader">
													<span>Login</span>
													<a href="javascript:;"><i class="fa fa-times"></i></a>
												</div> -->

												

												<form method="POST" action="#" class="wt-formtheme wt-loginform do-login-form" style="margin-top: -30px; ">
													<fieldset>
																
															
															
													  <div class="input-icons">
																
														
														<div class="form-group" style="margin-bottom: 20px;">
															<i class="fa fa-user icon"></i>
															<input type="text" name="ufullname" class="form-control" required
																placeholder="Name" style="background-color: #f7f7f7; color: #000; font-weight: 500;">
														</div>

                                                        <div class="form-group" style="margin-bottom: 20px;">
															<i class="fa fa-envelope icon"></i>
															<input type="email" name="uemail" class="form-control input-field"  required
																placeholder="Email as username" style=" background-color: #f7f7f7; color: #000; font-weight: 500; ">
														</div>									
													

														<div class="form-group" style="margin-bottom: 20px;">
															<i class="fa fa-unlock-alt icon"></i>
															<input type="password" name="upassword" class="form-control"  required
																placeholder="Password" style="background-color: #f7f7f7; color: #000; font-weight: 500;">
														</div>

														<div class="form-group" style="margin-bottom: 20px;">
															<i class="fa fa-unlock-alt icon"></i>
															<input type="password" name="upassword2" class="form-control"  required
																placeholder="Confirm Password" style="background-color: #f7f7f7; color: #000; font-weight: 500;">
														</div>


													<div class="form-group" style="margin-bottom: 20px; padding-bottom: 10px; ">
													<select name="ucountry" class="wt-select" style="text-transform: none; " placeholder="Select Country" required>
														<option value="">Select Country</option>
														<option value="AF">Afghanistan</option>
														<option value="AX">Aland Islands</option>
														<option value="AL">Albania</option>
														<option value="DZ">Algeria</option>
														<option value="AS">American Samoa</option>
														<option value="AD">Andorra</option>
														<option value="AO">Angola</option>
														<option value="AI">Anguilla</option>
														<option value="AQ">Antarctica</option>
														<option value="AG">Antigua and Barbuda</option>
														<option value="AR">Argentina</option>
														<option value="AM">Armenia</option>
														<option value="AW">Aruba</option>
														<option value="AU">Australia</option>
														<option value="AT">Austria</option>
														<option value="AZ">Azerbaijan</option>
														<option value="BS">Bahamas</option>
														<option value="BH">Bahrain</option>
														<option value="BD">Bangladesh</option>
														<option value="BB">Barbados</option>
														<option value="BY">Belarus</option>
														<option value="BE">Belgium</option>
														<option value="BZ">Belize</option>
														<option value="BJ">Benin</option>
														<option value="BM">Bermuda</option>
														<option value="BT">Bhutan</option>
														<option value="BO">Bolivia</option>
														<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
														<option value="BA">Bosnia and Herzegovina</option>
														<option value="BW">Botswana</option>
														<option value="BV">Bouvet Island</option>
														<option value="BR">Brazil</option>
														<option value="IO">British Indian Ocean Territory</option>
														<option value="BN">Brunei Darussalam</option>
														<option value="BG">Bulgaria</option>
														<option value="BF">Burkina Faso</option>
														<option value="BI">Burundi</option>
														<option value="KH">Cambodia</option>
														<option value="CM">Cameroon</option>
														<option value="CA">Canada</option>
														<option value="CV">Cape Verde</option>
														<option value="KY">Cayman Islands</option>
														<option value="CF">Central African Republic</option>
														<option value="TD">Chad</option>
														<option value="CL">Chile</option>
														<option value="CN">China</option>
														<option value="CX">Christmas Island</option>
														<option value="CC">Cocos (Keeling) Islands</option>
														<option value="CO">Colombia</option>
														<option value="KM">Comoros</option>
														<option value="CG">Congo</option>
														<option value="CD">Congo, Democratic Republic of the Congo</option>
														<option value="CK">Cook Islands</option>
														<option value="CR">Costa Rica</option>
														<option value="CI">Cote D'Ivoire</option>
														<option value="HR">Croatia</option>
														<option value="CU">Cuba</option>
														<option value="CW">Curacao</option>
														<option value="CY">Cyprus</option>
														<option value="CZ">Czech Republic</option>
														<option value="DK">Denmark</option>
														<option value="DJ">Djibouti</option>
														<option value="DM">Dominica</option>
														<option value="DO">Dominican Republic</option>
														<option value="EC">Ecuador</option>
														<option value="EG">Egypt</option>
														<option value="SV">El Salvador</option>
														<option value="GQ">Equatorial Guinea</option>
														<option value="ER">Eritrea</option>
														<option value="EE">Estonia</option>
														<option value="ET">Ethiopia</option>
														<option value="FK">Falkland Islands (Malvinas)</option>
														<option value="FO">Faroe Islands</option>
														<option value="FJ">Fiji</option>
														<option value="FI">Finland</option>
														<option value="FR">France</option>
														<option value="GF">French Guiana</option>
														<option value="PF">French Polynesia</option>
														<option value="TF">French Southern Territories</option>
														<option value="GA">Gabon</option>
														<option value="GM">Gambia</option>
														<option value="GE">Georgia</option>
														<option value="DE">Germany</option>
														<option value="GH">Ghana</option>
														<option value="GI">Gibraltar</option>
														<option value="GR">Greece</option>
														<option value="GL">Greenland</option>
														<option value="GD">Grenada</option>
														<option value="GP">Guadeloupe</option>
														<option value="GU">Guam</option>
														<option value="GT">Guatemala</option>
														<option value="GG">Guernsey</option>
														<option value="GN">Guinea</option>
														<option value="GW">Guinea-Bissau</option>
														<option value="GY">Guyana</option>
														<option value="HT">Haiti</option>
														<option value="HM">Heard Island and Mcdonald Islands</option>
														<option value="VA">Holy See (Vatican City State)</option>
														<option value="HN">Honduras</option>
														<option value="HK">Hong Kong</option>
														<option value="HU">Hungary</option>
														<option value="IS">Iceland</option>
														<option value="IN">India</option>
														<option value="ID">Indonesia</option>
														<option value="IR">Iran, Islamic Republic of</option>
														<option value="IQ">Iraq</option>
														<option value="IE">Ireland</option>
														<option value="IM">Isle of Man</option>
														<option value="IL">Israel</option>
														<option value="IT">Italy</option>
														<option value="JM">Jamaica</option>
														<option value="JP">Japan</option>
														<option value="JE">Jersey</option>
														<option value="JO">Jordan</option>
														<option value="KZ">Kazakhstan</option>
														<option value="KE">Kenya</option>
														<option value="KI">Kiribati</option>
														<option value="KP">Korea, Democratic People's Republic of</option>
														<option value="KR">Korea, Republic of</option>
														<option value="XK">Kosovo</option>
														<option value="KW">Kuwait</option>
														<option value="KG">Kyrgyzstan</option>
														<option value="LA">Lao People's Democratic Republic</option>
														<option value="LV">Latvia</option>
														<option value="LB">Lebanon</option>
														<option value="LS">Lesotho</option>
														<option value="LR">Liberia</option>
														<option value="LY">Libyan Arab Jamahiriya</option>
														<option value="LI">Liechtenstein</option>
														<option value="LT">Lithuania</option>
														<option value="LU">Luxembourg</option>
														<option value="MO">Macao</option>
														<option value="MK">Macedonia, the Former Yugoslav Republic of</option>
														<option value="MG">Madagascar</option>
														<option value="MW">Malawi</option>
														<option value="MY">Malaysia</option>
														<option value="MV">Maldives</option>
														<option value="ML">Mali</option>
														<option value="MT">Malta</option>
														<option value="MH">Marshall Islands</option>
														<option value="MQ">Martinique</option>
														<option value="MR">Mauritania</option>
														<option value="MU">Mauritius</option>
														<option value="YT">Mayotte</option>
														<option value="MX">Mexico</option>
														<option value="FM">Micronesia, Federated States of</option>
														<option value="MD">Moldova, Republic of</option>
														<option value="MC">Monaco</option>
														<option value="MN">Mongolia</option>
														<option value="ME">Montenegro</option>
														<option value="MS">Montserrat</option>
														<option value="MA">Morocco</option>
														<option value="MZ">Mozambique</option>
														<option value="MM">Myanmar</option>
														<option value="NA">Namibia</option>
														<option value="NR">Nauru</option>
														<option value="NP">Nepal</option>
														<option value="NL">Netherlands</option>
														<option value="AN">Netherlands Antilles</option>
														<option value="NC">New Caledonia</option>
														<option value="NZ">New Zealand</option>
														<option value="NI">Nicaragua</option>
														<option value="NE">Niger</option>
														<option value="NG">Nigeria</option>
														<option value="NU">Niue</option>
														<option value="NF">Norfolk Island</option>
														<option value="MP">Northern Mariana Islands</option>
														<option value="NO">Norway</option>
														<option value="OM">Oman</option>
														<option value="PK">Pakistan</option>
														<option value="PW">Palau</option>
														<option value="PS">Palestinian Territory, Occupied</option>
														<option value="PA">Panama</option>
														<option value="PG">Papua New Guinea</option>
														<option value="PY">Paraguay</option>
														<option value="PE">Peru</option>
														<option value="PH">Philippines</option>
														<option value="PN">Pitcairn</option>
														<option value="PL">Poland</option>
														<option value="PT">Portugal</option>
														<option value="PR">Puerto Rico</option>
														<option value="QA">Qatar</option>
														<option value="RE">Reunion</option>
														<option value="RO">Romania</option>
														<option value="RU">Russian Federation</option>
														<option value="RW">Rwanda</option>
														<option value="BL">Saint Barthelemy</option>
														<option value="SH">Saint Helena</option>
														<option value="KN">Saint Kitts and Nevis</option>
														<option value="LC">Saint Lucia</option>
														<option value="MF">Saint Martin</option>
														<option value="PM">Saint Pierre and Miquelon</option>
														<option value="VC">Saint Vincent and the Grenadines</option>
														<option value="WS">Samoa</option>
														<option value="SM">San Marino</option>
														<option value="ST">Sao Tome and Principe</option>
														<option value="SA">Saudi Arabia</option>
														<option value="SN">Senegal</option>
														<option value="RS">Serbia</option>
														<option value="CS">Serbia and Montenegro</option>
														<option value="SC">Seychelles</option>
														<option value="SL">Sierra Leone</option>
														<option value="SG">Singapore</option>
														<option value="SX">Sint Maarten</option>
														<option value="SK">Slovakia</option>
														<option value="SI">Slovenia</option>
														<option value="SB">Solomon Islands</option>
														<option value="SO">Somalia</option>
														<option value="ZA">South Africa</option>
														<option value="GS">South Georgia and the South Sandwich Islands</option>
														<option value="SS">South Sudan</option>
														<option value="ES">Spain</option>
														<option value="LK">Sri Lanka</option>
														<option value="SD">Sudan</option>
														<option value="SR">Suriname</option>
														<option value="SJ">Svalbard and Jan Mayen</option>
														<option value="SZ">Swaziland</option>
														<option value="SE">Sweden</option>
														<option value="CH">Switzerland</option>
														<option value="SY">Syrian Arab Republic</option>
														<option value="TW">Taiwan, Province of China</option>
														<option value="TJ">Tajikistan</option>
														<option value="TZ">Tanzania, United Republic of</option>
														<option value="TH">Thailand</option>
														<option value="TL">Timor-Leste</option>
														<option value="TG">Togo</option>
														<option value="TK">Tokelau</option>
														<option value="TO">Tonga</option>
														<option value="TT">Trinidad and Tobago</option>
														<option value="TN">Tunisia</option>
														<option value="TR">Turkey</option>
														<option value="TM">Turkmenistan</option>
														<option value="TC">Turks and Caicos Islands</option>
														<option value="TV">Tuvalu</option>
														<option value="UG">Uganda</option>
														<option value="UA">Ukraine</option>
														<option value="AE">United Arab Emirates</option>
														<option value="GB">United Kingdom</option>
														<option value="US">United States</option>
														<option value="UM">United States Minor Outlying Islands</option>
														<option value="UY">Uruguay</option>
														<option value="UZ">Uzbekistan</option>
														<option value="VU">Vanuatu</option>
														<option value="VE">Venezuela</option>
														<option value="VN">Viet Nam</option>
														<option value="VG">Virgin Islands, British</option>
														<option value="VI">Virgin Islands, U.s.</option>
														<option value="WF">Wallis and Futuna</option>
														<option value="EH">Western Sahara</option>
														<option value="YE">Yemen</option>
														<option value="ZM">Zambia</option>
														<option value="ZW">Zimbabwe</option>
													</select>
													</div>


														<div class="wt-logininfo" style="margin-bottom: 20px;">
															
															<span class="wt-checkbox" >
																<input id="wt-login" type="checkbox" name="rememberme" checked>
																<label for="wt-login" style="text-transform: none;" >
																I agree to 
																<a href="privacypolicy.php"  class=""><u>Privacy policy</u></a>
																and
																<a href="termsofuses.php"  class=""><u>Terms of uses</u></a>
																</label>
															</span>
															
														</div>

														<div class="wt-logininfo" style="margin-bottom: 15px;" >
														
														<input type="submit" style="width: 100%; text-transform: none; height: 40px; border: 0px; " class="wt-btn do-login-button" value="Sign Up Now">
														<!-- <a href="login_code.php" style="width: 100%; text-transform: none; height: 40px; " class="wt-btn do-login-button">Sign Up Now</a> -->
														
														</div>
														
													  </div>
													

													<div class="wt-logininfo" style="margin-bottom: 5px;">
															
																<label for="wt-login" style="text-transform: none;" >
																or continue with
																</label>														
													
													</div>

													
													<div class="wt-logininfo" style="margin-bottom: 20px;" >
														<a href="#" class="wt-btn do-login-button fb btn" style="text-transform: none; color:#111; background-color: #f7f7f7;
										 					width: 100%;
															border: 1px solid #ccc;
															font-weight: normal;
															margin-right: 10px;
															font-size: 14px;
															margin-bottom: 15px;
															">
														<i class="fa fa-facebook fa-fw" style="color:#3B82F6;"></i>&nbsp; &nbsp; &nbsp; Sign up with Facebook 
														</a>
														
														<a href="#" class="wt-btn do-login-button google btn" style="text-transform: none; color:#111; background-color: #f7f7f7;
										 					width: 100%;
															border: 1px solid #ccc;
															font-weight: normal;
															margin-right: 10px;
															font-size: 14px;
															">
														<i class="fa fa-google fa-fw" style="color:#dd4b39;"></i>&nbsp; &nbsp; &nbsp; Sign up with Google+
														</a>

														<div class="wt-logininfo" style="margin-top: 20px;">
															
															<span class="wt-checkbox" >
																
																<label for="wt-login" style="text-transform: none;" >
																<span style="font-size: 17px;">Already have an account?</span><a href="login.php"  class=""><b> Sign in now</b></a>
																</label>
																
															</span>
															
														</div>
													</div>
														
														
														
													<!-- <img src="images/soc_1.png" alt="" style="margin-bottom: 10px; width: 240px;">
													<img src="images/soc_2.png" alt="" style="margin-bottom: 10px; width: 240px;"> -->
													</fieldset>

												</form>
												
											</div>
								</div>

								
				</div>
				
			</div>
		</div>
	</section>
	<!--Categories End-->


			


				
			</main>
			<!--Main End-->


<?php 
	include('footer_menu.php'); 
?>
			<!--Footer End-->
		</div>
		<!--Content Wrapper End-->
	</div>
	<!--Wrapper End-->
	<script src="js/vendor/jquery-3.3.1.js"></script>
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/chosen.jquery.js"></script>
	<script src="js/tilt.jquery.js"></script>
	<script src="js/scrollbar.min.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/readmore.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/tipso.js"></script>
	<script src="js/jRate.js"></script>
	<script src="js/main.js"></script>
</body>


</html>
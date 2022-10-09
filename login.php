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
?>


		
			<main id="wt-main" class="wt-main wt-haslayout">


				<!--Categories Start-->
				<section class="wt-haslayaout wt-main-section "  style="margin-top: -30px;">
					<div class="container">
						<div class="row justify-content-md-center">
							<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-5 push-lg-3" >
								
							
							<?php
								if (isset($_REQUEST['msg'])){
									
									$msg = $_REQUEST['msg'];

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
								}
							?>
							
							
							
							
							
								<div class="wt-sectionhead wt-textcenter" style="background-color: #DEE2EE; border-radius: 8px; padding: 15px; ">

									<div class="" >
										<h2 style= "margin-top: 30px; 
													font-size: 20px;
													font-weight: 100;
													text-transform: none;
													margin-bottom: 2.5rem;
													color: #555;
													
													"
																>Sign in</h2>
										
									</div>

									
                                    <div class="wt-loginformhold1" >
												<!-- <div class="wt-loginheader">
													<span>Login</span>
													<a href="javascript:;"><i class="fa fa-times"></i></a>
												</div> -->
												<form method="POST" action="login_code.php" class="wt-formtheme wt-loginform do-login-form" style="margin-top: -30px; ">
													<fieldset>
																
															
															
													  <div class="input-icons">
																
														

                                                        <div class="form-group" style="margin-bottom: 20px;">
															<i class="fa fa-envelope icon"></i>
															<input type="email" name="uemail" class="form-control input-field"  required
																placeholder="name@email.com" style=" background-color: #f7f7f7; color: #000; font-weight: 500; ">
														</div>									
													

														<div class="form-group" style="margin-bottom: 20px;">
															<i class="fa fa-unlock-alt icon"></i>
															<input type="password" name="upassword" class="form-control"  required
																placeholder="Enter your password" style="background-color: #f7f7f7; color: #000; font-weight: 500;">
														</div>

														

														<div class="wt-logininfo" style="margin-bottom: 20px;">
															
															<span class="wt-checkbox" >
																<input id="wt-login" type="checkbox" name="rememberme" checked>
																<label for="wt-login" style="text-transform: none;" >
																I agree to 
																<a href="privacypolicy.php"  class=""><u>Privacy policy</u></a>
																and
																<a href="termsofuses.php"  class=""><u>Terms</u></a>
																</label>
															</span>
															
														</div>

														<div class="wt-logininfo" style="margin-bottom: 15px;" >
															<!-- <a href="login_code.php" style="width: 100%; text-transform: none; height: 40px; " class="wt-btn do-login-button">Sign in</a> -->
															<input type="submit" style="width: 100%; text-transform: none; height: 40px; border: 0px; " class="wt-btn do-login-button" value="Sign in">
														
														</div>
														
													  </div>
													

													<div class="wt-logininfo" style="margin-bottom: 5px;">
															
																<label for="wt-login" style="text-transform: none;" >
																or continue with
																</label>														
													
													</div>








													
													<div class="wt-logininfo" style="margin-bottom: 20px;" >
														

														<?php
// google auth -  client ID - 633740131029-jl8f1mkm5lfrjvvejhnqg87sjvdvv61r.apps.googleusercontent.com
//             - client Secret - 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

require_once 'vendor/autoload.php';
  
// init configuration
$clientID = '633740131029-jl8f1mkm5lfrjvvejhnqg87sjvdvv61r.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/Crunilance/login.php';
   
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
  
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
		$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
		$client->setAccessToken($token['access_token']);
		
		// get profile info
		$google_oauth = new Google_Service_Oauth2($client);
		$google_account_info = $google_oauth->userinfo->get();
		$uname = $email =  $google_account_info->email;
		$name =  $google_account_info->name;
		$picture = $google_account_info->picture;
				
		//echo "$email - $name - $picture  ";
		//echo "<img src='$picture' style='width=200px;'>";




		// now you can use this profile info to create account in your website and make user logged in.


			require('db.php');
			

			$sql="SELECT * FROM user_info WHERE email='$email' " ;
			$result = $conn->query($sql);

			if($row = $result->fetch_assoc())
			{
								
				//session_start();
				$_SESSION["verify"] = $row["emailverify"];

				

					if ($row["status1"] == "Blocked")
					{
						header('Location: login.php?msg=Your account is blocked, please contact to info.crunilance@gmail.com ');
						exit();
					}
				
					$_SESSION["username"] = $uname;							$_SESSION["uname"] = null;
					$_SESSION["first_name"] = $row["first_name"];
					$_SESSION["mobile"] = $row["mobile"];
					$_SESSION["user_id"] = $row["user_id"];
					$_SESSION["uimage"] = $row["uimage"];
					$_SESSION["country"] = $row["country"];
					$_SESSION["usertype"] = $row["usertype"];

					$_SESSION["membership"] = $row["membership"];
					$_SESSION["bidcount"] = $row["bidcount"];
					$_SESSION["membershipstart"] = $row["membershipstart"];
					$_SESSION["membershipend"] = $row["membershipend"];				
					
					require('dbcalc_rating.php');

					
			
			} else {
				//----- if user is not exists then ----------- CREATE 


				$ufullname = $name;
				$uemail = $email;
				$upassword = rand(10000000,99999999);
				$ucountry = "";
				$uphone = "";
				$verifycode = rand(10000000,99999999);
		
				$upassword = md5($upassword);
							
				require('db.php');
				
				$sql="INSERT INTO user_info(email, password, first_name, country, verifycode, emailverify) Values('$uemail','$upassword','$ufullname','$ucountry','$verifycode','Verify') " ;
				
				//$sql="INSERT INTO seller_info('username', 'password', 'store_name' ) Values('$email','$pass','$snm')" ;
				//$sql ="";
				if ($conn->query($sql) === TRUE) 
				{
					$last_id = $conn->insert_id;
	
					$sql1="INSERT INTO seller_info(username, full_name, country ) Values('$uemail','$ufullname','$ucountry')" ;
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
					
					//------------------ Send email ------------------------
					//session_start();
					$_SESSION["eml_to"] = $uemail;
					$_SESSION["eml_sub"] = "Account created successfully.";
					$_SESSION["eml_mes"] = "Dear $ufullname, <br><br>Your trueshipp user account created succesfully.
											<br>Your code for verify on trueshipp: $verifycode<br>
											<br><a href='https://trueshipp.com/ULogin.php'>Click here to login</a>";
					$_SESSION["eml_bcc"] = "trueshipp@gmail.com";
		
					include_once("emailsend.php");
					$msg = "";
	

					//-- Login as Freelancer ------------------------------------------	
					$_SESSION["username"] = $uemail;							$_SESSION["uname"] = null;
					$_SESSION["first_name"] = $ufullname;
					$_SESSION["mobile"] = "";
					$_SESSION["user_id"] = $last_id;
					$_SESSION["country"] = $ucountry;															
					$_SESSION["usertype"] = "Freelancer";
					
					ob_start();
					header ('Location: dashboard-freelancer.php');
					ob_end_flush();	
				} else {
					echo "Some Error when creating account!, Or email already exists!";
					//echo "Error Inserting record: " . $conn->error;
				}
				$conn->close();
				
				
				
				//echo "Ok";







			}



			//------------------------- Login as Freelancer OR Employer
			ob_start();
			
				if ($_SESSION["usertype"] == "Employer")
					exit(header ('Location: dashboard-employer.php'));
				else
					exit(header ('Location: dashboard-freelancer.php'));
			ob_end_flush();


} else {

	// ---------------------- login with google button
  echo "<a href='".$client->createAuthUrl()."' class='wt-btn do-login-button google btn' style='text-transform: none; color:#111; background-color: #f7f7f7;
		width: 100%;
		border: 1px solid #ccc;
		font-weight: normal;
		margin-right: 10px;
		font-size: 14px;
		margin-bottom: 15px;
		'>
  

		<i class='fa fa-google fa-fw' style='color:#dd4b39;'></i>&nbsp; &nbsp; &nbsp; Sign in with Google+


  		</a>";
  
}
?>
														
														
														
														

																	
																<label for="wt-login" style="text-transform: none; " >
																 <span style="font-size: 14px; align-content: center;">New user?</span><a href="signup.php"  class=""><b> Sign up now</b></a>
																</label>
																
																<label for="wt-login" style="text-transform: none;" >
																 <span style="font-size: 14px; align-content: center;">Password?</span><a href="passwordrecovery.php"  class=""><b> Reset it.</b></a>
																</label>
																
															
													
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
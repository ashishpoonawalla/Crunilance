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
																>Password recovery</h2>
										
									</div>

									
                                    <div class="wt-loginformhold1" >
												<!-- <div class="wt-loginheader">
													<span>Login</span>
													<a href="javascript:;"><i class="fa fa-times"></i></a>
												</div> -->
												<form method="POST" action="passwordrecovery-code.php" class="wt-formtheme wt-loginform do-login-form" style="margin-top: -30px; ">
													<fieldset>
																
															
															
													  <div class="input-icons">
																
														

                                                        <div class="form-group" style="margin-bottom: 20px;">
															<i class="fa fa-envelope icon"></i>
															<input type="email" name="uemail" class="form-control input-field"  required
																placeholder="name@email.com" style=" background-color: #f7f7f7; color: #000; font-weight: 500; ">
														</div>									
													

														
														

													
														<div class="wt-logininfo" style="margin-bottom: 15px;" >
															<!-- <a href="login_code.php" style="width: 100%; text-transform: none; height: 40px; " class="wt-btn do-login-button">Sign in</a> -->
															<input type="submit" style="width: 100%; text-transform: none; height: 40px; border: 0px; " class="wt-btn do-login-button" value="Sign in">
														
														</div>
														
													  </div>
													


																<label for="wt-login" style="text-transform: none; " >
																 <span style="font-size: 14px; align-content: center;">New user?</span><a href="signup.php"  class=""><b> Sign up now</b></a>
																</label>
																
															
																
															
													
													</div>
														
														
														
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
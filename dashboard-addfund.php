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
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/tipso.css">
	<link rel="stylesheet" href="css/chosen.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/dbresponsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<?php
	include('header_menu.php');
	include('authCheck.php');
?>

			<!--Header End-->
			<!--Main Start-->
			<main id="wt-main" class="wt-main wt-haslayout">
				<!--Sidebar Start-->
				
<?php

	include('sidebar.php');

	$uname = $_SESSION["username"];
   
	$var = "";
	if (isset($_REQUEST["var"])){
		$var = $_REQUEST["var"];
	}

    require('db.php');
    $msg= "";

    $sql="SELECT * FROM user_info WHERE email='$uname' " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
                                
        $_SESSION["verify"] = $row["emailverify"];	
            
            $account_name = $row["account_name"];
            $account_no = $row["account_no"];
            $bank_name = $row["bank_name"];
            $ifsc = $row["ifsc"];
            $branch_name = $row["branch_name"];
			$country11 = $row["country"];

			$country11 = strtoupper(	$country11 );			

			$_SESSION["membership"] = $row["membership"];
			$_SESSION["membershipstart"] = $row["membershipstart"];
			$_SESSION["membershipend"] = $row["membershipend"];			
			$_SESSION["bidcount"] = $row["bidcount"];

    } 

				

?>				

				<!--Sidebar Start-->
				<!--Register Form Start-->
				<section class="wt-haslayout wt-dbsectionspace">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-1"></div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">


						<?php
								if (isset($_REQUEST['msg'])){
									
									$msg = $_REQUEST['msg'];

									if ($msg != ""){
										?>
												<div class="wt-jobalertsholder" style="margin-top: 20px; margin-bottom: -20px;">
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







							<div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">
								<div class="wt-dashboardtabs">
									<ul class="wt-tabstitle nav navbar-nav">
										<li class="nav-item"><a class="active" data-toggle="tab" href="#wt-membership">Add Fund</a></li>
										
										<!-- <li class="nav-item"><a data-toggle="tab" href="#wt-deleteaccount">Bank Account</a></li>
										<li class="nav-item"><a data-toggle="tab" href="#wt-password">Password</a></li>
										<li class="nav-item"><a data-toggle="tab" href="#wt-emailnoti">Email Notifications</a></li>
										<li class="nav-item"><a data-toggle="tab" href="#wt-security">Security &amp; Settings</a></li> -->
										<!-- <li class="nav-item"><a data-toggle="tab" href="#wt-detailpagedesign">Detail
												Page Design</a></li> -->
										
									</ul>
								</div>
								<div class="wt-tabscontent tab-content">

									<!-- ---------------- Membership ---------------- -->
									<div class="wt-accountholder tab-pane active fade show" id="wt-membership">
										

											<?php if ( $var == ""){ ?>		
												<div class="wt-tabscontenttitle">
													<h2>Add fund to your balance.</h2>
												</div>


												
											
											  <form method="POST" action="da-cashfree-add-fund.php" class="wt-formtheme wt-userform wt-userformvtwo">

												<fieldset>
													
													
													<br>
                                                    <input type="number" class="form-control" name="orderAmount" placeholder="Enter amount here $(Ex. 100)" required>

													<?php
													$orderNum = rand(10000000,99999999);
													?>

													<input type="hidden" class="form-control" name="appId" value="1106732b3acebb281921905ce6376011" placeholder="Enter App ID here (Ex. 123456a7890bc123defg4567)"/>

													<input type="hidden" class="form-control" name="orderId" value="fund_<?php echo $orderNum; ?> " placeholder="Enter Order ID here (Ex. order00001)"/>
													
													<!-- <input type="hidden" class="form-control" name="orderAmount" value="1" placeholder="Enter Order Amount here (Ex. 100)"/> -->
												
													<input type="hidden" class="form-control" name="orderCurrency" value="INR" placeholder="Enter Currency here (Ex. INR)" />
													
													<input type="hidden" class="form-control" name="orderNote" value="Bid Buy" placeholder="Enter Order Note here (Ex. Test order)"/>
													
													<input type="hidden" class="form-control" name="customerName" value="<?php echo $_SESSION["first_name"]; ?>" placeholder="Enter your name here (Ex. John Doe)"/>
													
													<input type="hidden" class="form-control" name="customerEmail" value="<?php echo $_SESSION["username"]; ?>" placeholder="Enter your email address here (Ex. Johndoe@test.com)"/>
													
													<input type="hidden" class="form-control" name="customerPhone" value="<?php echo $_SESSION["mobile"]; ?>" placeholder="Enter your phone number here (Ex. 9999999999)"/>
													
													<input type="hidden" class="form-control" name="returnUrl" value="http://localhost/crunilance/da-cashfree-add-fund-return.php" placeholder="Enter the URL to which customer will be redirected (Ex. www.example.com)"/>
													
													<input type="hidden" class="form-control" name="notifyUrl" value="http://localhost/crunilance/da-cashfree-add-fund-notify.php" placeholder="Enter the URL to get server notificaitons (Ex. www.example.com)"/>
        

													<div class="form-group form-group-half wt-btnarea">
														<!-- <a href="#" class="wt-btn">Update Details</a> -->
                                                        <br>
														<input type="submit" style=" text-transform: none; border: 0px; " class="wt-btn wt-msgbtn" value="Add fund buy Card or UPI">
                                                        <br><br>
													</div>
													

												</fieldset>
											  </form>
											<?php } ?>
										  
									</div>

								

							
								</div>
							</div>
							<!-- <div class="wt-updatall">
								<i class="ti-announcement"></i>
								<span>Update all the latest changes made by you, by just clicking on “Save &amp;
									Continue” button.</span>
								<a class="wt-btn" href="#">Save &amp; Continue</a>
							</div> -->
						</div>
						
					</div>
				</section>
				<!--Register Form End-->
			</main>
			<!--Main End-->
		</div>
		<!--Content Wrapper End-->
	</div>

	
<?php 
	include('footer_menu.php'); 
?>




	<!--Wrapper End-->
	<script src="js/vendor/jquery-3.3.1.js"></script>
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script
		src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sortable.js"></script>
	<script src="js/chosen.jquery.js"></script>
	<script src="js/tilt.jquery.js"></script>
	<script src="js/scrollbar.min.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/readmore.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/tipso.js"></script>
	<script src="js/gmap3.js"></script>
	<script src="js/jRate.js"></script>
	<script src="js/main.js"></script>
	<script>
		const menu_icon = document.querySelector('.menu-icon');
		function addClassFunThree()
		{
			this.classList.toggle("click-menu-icon");
		}
		menu_icon.addEventListener('click', addClassFunThree);
	</script>
</body>

</html>
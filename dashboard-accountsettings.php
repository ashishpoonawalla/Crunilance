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
			$bank_verify = $row["bank_verify"];
			$country11 = $row["country"];

			$country11 = strtoupper($country11);			

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
								<div class="wt-dashboardtabs" style="border-bottom: 1px dashed grey;">
									<ul class="wt-tabstitle nav navbar-nav">
										<li class="nav-item"><a class="active" data-toggle="tab" href="#wt-membership">Membership</a></li>
										
										<li class="nav-item"><a data-toggle="tab" href="#wt-deleteaccount">Bank Account</a></li>
										<li class="nav-item"><a data-toggle="tab" href="#wt-password">Password</a></li>
										<!-- <li class="nav-item"><a data-toggle="tab" href="#wt-emailnoti">Email Notifications</a></li> -->
										<li class="nav-item"><a data-toggle="tab" href="#wt-security">Security &amp; Settings</a></li>
										<!-- <li class="nav-item"><a data-toggle="tab" href="#wt-detailpagedesign">Detail
												Page Design</a></li> -->
										
									</ul>
								</div>
								<div class="wt-tabscontent tab-content">

									<!-- ---------------- Membership ---------------- -->
									<div class="wt-accountholder tab-pane active fade show" id="wt-membership">
										<div class="wt-accountdel">
											
										
											<div class="wt-tabscontenttitle">
												<a href="dashboard-membership.php" style="float: right; "><b>Change Membership</b></a>
												<h2>Current Membership: <b><?php echo $_SESSION["membership"]; ?> Plan</b></h2>
												
											</div>

												<div class="form-group">
													<br><span style="float: right;">Bid Remain: <b><?php echo $_SESSION["bidcount"] ; ?></b></span>
												
													Membership expire on: 
													<b><?php 
													
													$dt1 = $_SESSION["membershipend"] ; 
													$dt2 = date("d-M-Y", strtotime($dt1) );
													echo $dt2;
													?></b>
													<br>
													<br><br><br>
												</div>

											<?php if ( $var != ""){ ?>
											 
												
													
													
													
												<div class="wt-tabscontenttitle">
													<h2>Upgrade to: <b><?php echo $var ; ?> Plan</b></h2>
													
												</div>
													
												
													<div class="form-group">
														<br>
														<?php 
															
															$amt = "10";
															if ($var == "Standard")
																$amt = "20";
															if ($var == "Professional")
																$amt = "50";
															
														?>
														Amount: $<?php echo $amt; ?>
														<br>
														
													</div>
													
													<div class="form-group form-group-half wt-btnarea">
														<a href="dashboard-accountsettings_paybal.php?var=<?php echo $var; ?>" class="wt-btn" onclick="return confirm('Confirm, pay from balance?');">Pay from my balance </a>

													</div>
													
													<div class="form-group form-group-half wt-btnarea">

<?Php


 $orderNum = rand(10000000,99999999);
 //$orderNum =  $orderNum."_". $_SESSION["username"];


?>

	<form id="redirectForm" method="post" action="da-cashfree-req-member.php">
        
          <input type="hidden" class="form-control" name="appId" value="1106732b3acebb281921905ce6376011" placeholder="Enter App ID here (Ex. 123456a7890bc123defg4567)"/>
       
          <input type="hidden" class="form-control" name="orderId" value="order<?php echo $orderNum; ?> " placeholder="Enter Order ID here (Ex. order00001)"/>
        
          <input type="hidden" class="form-control" name="orderAmount" value="<?php echo $amt; ?>" placeholder="Enter Order Amount here (Ex. 100)"/>
       
          <input type="hidden" class="form-control" name="orderCurrency" value="INR" placeholder="Enter Currency here (Ex. INR)"/>
        
          <input type="hidden" class="form-control" name="orderNote" value="<?php echo $var ; ?> Membership" placeholder="Enter Order Note here (Ex. Test order)"/>
        
          <input type="hidden" class="form-control" name="customerName" value="<?php echo $_SESSION["first_name"]; ?>" placeholder="Enter your name here (Ex. John Doe)"/>
        
          <input type="hidden" class="form-control" name="customerEmail" value="<?php echo $_SESSION["username"]; ?>" placeholder="Enter your email address here (Ex. Johndoe@test.com)"/>
        
          <input type="hidden" class="form-control" name="customerPhone" value="<?php echo $_SESSION["mobile"]; ?>" placeholder="Enter your phone number here (Ex. 9999999999)"/>
        
          <input type="hidden" class="form-control" name="returnUrl" value="http://localhost/crunilance/da-cashfree-req-member-return.php" placeholder="Enter the URL to which customer will be redirected (Ex. www.example.com)"/>
        
          <input type="hidden" class="form-control" name="notifyUrl" value="http://localhost/crunilance/da-cashfree-req-member-notify.php" placeholder="Enter the URL to get server notificaitons (Ex. www.example.com)"/>
        
        <button type="submit" class="wt-btn wt-msgbtn" value="Pay">Pay by Card or UPI</button>
        
      </form>



														<!-- <a href="#" class="wt-btn wt-msgbtn">Pay by Card or UPI  -->
														<!-- <i class="lnr lnr-license"></i> -->
														</a>														
													</div>


												
											 
											<?php } ?>
										</div>

											<?php if ( $var == ""){ ?>		
												<div class="wt-tabscontenttitle">
													<h2>Buy more bids.</h2>
												</div>


												
											
											  <form method="POST" action="da-cashfree-bid-buy.php" class="wt-formtheme wt-userform wt-userformvtwo">

												<fieldset>
													
													<div class="form-group">
														<span class="wt-select">
															<select name="orderAmount">

																<option value="1">10 Bids for $1</option>
																<option value="2">20 Bids for $2</option>
																<option value="3">30 Bids for $3</option>
																<option value="4">40 Bids for $4</option>
																<option value="5">50 Bids for $5</option>
																<option value="6">60 Bids for $6</option>
																<option value="7">70 Bids for $7</option>
																<option value="8">80 Bids for $8</option>

															</select>
														</span>
													</div>
													
													<!-- <div class="form-group form-group-half wt-btnarea">
														<a href="dashboard-accountsettings_paybal_bid.php?var=<?php echo $var; ?>" class="wt-btn" onclick="return confirm('Confirm, pay from balance?');">Buy from my balance </a>

													</div> -->

													<?php
													$orderNum = rand(10000000,99999999);
													?>

													<input type="hidden" class="form-control" name="appId" value="1106732b3acebb281921905ce6376011" placeholder="Enter App ID here (Ex. 123456a7890bc123defg4567)"/>

													<input type="hidden" class="form-control" name="orderId" value="bid_<?php echo $orderNum; ?> " placeholder="Enter Order ID here (Ex. order00001)"/>
													
													<!-- <input type="hidden" class="form-control" name="orderAmount" value="1" placeholder="Enter Order Amount here (Ex. 100)"/> -->
												
													<input type="hidden" class="form-control" name="orderCurrency" value="INR" placeholder="Enter Currency here (Ex. INR)"/>
													
													<input type="hidden" class="form-control" name="orderNote" value="Bid Buy" placeholder="Enter Order Note here (Ex. Test order)"/>
													
													<input type="hidden" class="form-control" name="customerName" value="<?php echo $_SESSION["first_name"]; ?>" placeholder="Enter your name here (Ex. John Doe)"/>
													
													<input type="hidden" class="form-control" name="customerEmail" value="<?php echo $_SESSION["username"]; ?>" placeholder="Enter your email address here (Ex. Johndoe@test.com)"/>
													
													<input type="hidden" class="form-control" name="customerPhone" value="<?php echo $_SESSION["mobile"]; ?>" placeholder="Enter your phone number here (Ex. 9999999999)"/>
													
													<input type="hidden" class="form-control" name="returnUrl" value="http://localhost/crunilance/da-cashfree-bid-buy-return.php" placeholder="Enter the URL to which customer will be redirected (Ex. www.example.com)"/>
													
													<input type="hidden" class="form-control" name="notifyUrl" value="http://localhost/crunilance/da-cashfree-bid-buy-notify.php" placeholder="Enter the URL to get server notificaitons (Ex. www.example.com)"/>
        

													<div class="form-group form-group-half wt-btnarea">
														<!-- <a href="#" class="wt-btn">Update Details</a> -->
														<input type="submit" style=" text-transform: none; border: 0px; " class="wt-btn wt-msgbtn" value="Buy Now">
									
													</div>
													<br><br>&nbsp;

												</fieldset>
											  </form>
											<?php } ?>
										  
									</div>

									<!-- ---------------- Bank Account ---------------- -->
									<div class="wt-accountholder tab-pane fade " id="wt-deleteaccount">
										<div class="wt-accountdel">
											<div class="wt-tabscontenttitle">
												<h2>Bank Account Details - <b><?php echo $bank_verify; ?></b></h2>
											</div>
											<form method="POST" action="dashboard-accountsettings_code.php" class="wt-formtheme wt-userform wt-userformvtwo">

												<fieldset>
													<div class="form-group">
														<input type="text" name="account_name" class="form-control"
															placeholder="Account Name" value="<?php echo $account_name ;?>"  required style="color: #000;">
													</div>
													<div class="form-group">
														<input type="text" name="account_no" class="form-control"
															placeholder="Account Number" value="<?php echo $account_no ;?>" required style="color: #111;">
													</div>
													<div class="form-group">
														<input type="text" name="bank_name" class="form-control"
															placeholder="Bank Name" value="<?php echo $bank_name ;?>" required style="color: #111;">
													</div>
													<div class="form-group">
														<input type="text" name="ifsc" class="form-control"
															placeholder="IFSC Code" value="<?php echo $ifsc ;?>" required style="color: #111;">
													</div>

													<div class="form-group">
														<input type="text" name="branch_name" class="form-control"
															placeholder="Branch" value="<?php echo $branch_name ;?>" required style="color: #111;">
													</div>
													
													<!-- <div class="form-group">
														<span class="wt-select">
															<select>
																<option value="" disabled="">Select Reason to Leave
																</option>
																<option value="">Reason</option>
																<option value="">Reason</option>
															</select>
														</span>
													</div> -->
													<!-- <div class="form-group">
														<textarea name="message" class="form-control"
															placeholder="Description (Optional)"></textarea>
													</div> -->
													<div class="form-group form-group-half float-right">
														<span class="wt-checkbox">
															<!-- <input id="termsconditions1" type="checkbox"
																name="termsconditions" value="termsconditions">
															<label for="termsconditions1"><span>Unsubscribe me from all
																	newsletter list</span></label> -->
														</span>
													</div>
													<div class="form-group form-group-half wt-btnarea">
														<!-- <a href="#" class="wt-btn">Update Details</a> -->
														<input type="submit" style=" text-transform: none; border: 0px; " class="wt-btn" value="Update">
														<br><br>&nbsp;
													</div>
												</fieldset>
											</form>
										</div>
									</div>

									<!-- ---------------- Security ---------------- -->
									<div class="wt-securityhold tab-pane fade" id="wt-security">
										<div class="wt-securitysettings wt-tabsinfo">
											<div class="wt-tabscontenttitle">
												<h2>Account Security &amp; Settings</h2>
											</div>
											<div class="wt-settingscontent">
												<div class="wt-description">
													<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
														labore et dolore magna aliqua aut enim ad minim veniamac quis
														nostrud exercitation ullamco laboris.</p>
												</div>
												<ul class="wt-accountinfo">
													<!-- <li>
														<div class="wt-on-off">
															<input type="checkbox" id="hide-on" name="contact_form" checked="">
															<label for="hide-on"><i></i></label>
														</div>
														<span>Make my profile public</span>
													</li> -->
													<!-- <li>
														<div class="wt-on-off pull-right">
															<input type="checkbox" id="hide-onone" name="contact_form">
															<label for="hide-onone"><i></i></label>
														</div>
														<span>Make my profile searchable</span>
													</li> -->
													<!-- <li>
														<div class="wt-on-off pull-right">
															<input type="checkbox" id="hide-onthree" name="contact_form"
																checked="">
															<label for="hide-onthree"><i></i></label>
														</div>
														<span>Share my profile photo</span>
													</li> -->
													<li>
														<div class="wt-on-off pull-right">
															<input type="checkbox" id="hide-onfour" name="contact_form"
																>
															<label for="hide-onfour"><i></i></label>
														</div>
														<span>Disable my account temporarily</span>
													</li>
													<!-- <li>
														<div class="wt-on-off pull-right">
															<input type="checkbox" id="hide-onfive" name="contact_form">
															<label for="hide-onfive"><i></i></label>
														</div>
														<span>Show my client feedback</span>
													</li> -->
													<!-- <li>
														<div class="wt-on-off pull-right">
															<input type="checkbox" id="hide-onsix" name="contact_form">
															<label for="hide-onsix"><i></i></label>
														</div>
														<span>Enable/ Disable</span>
													</li> -->
												</ul>
											</div>
										</div>
										<div class="wt-location wt-tabsinfo">
											<div class="wt-tabscontenttitle">
												<h2>Country </h2>
											</div>
											
													<div class="form-group form-group-half">
														<span class="wt-select">
															
															<form method="POST" action="dashboard-accountsettings-country.php" >

																
																	<div class="form-group">
															
														
																		<!-- <?php echo "$country11"; ?> -->

															
																		<select name="country" id="country">
																			<option value="">Select Country</option>
																			<?php
																				require('db.php');
																				
																				
																					$countryName1="";
																					$sql111 = "SELECT * FROM countries Order By country_name";
																					$result111 = $conn->query($sql111);
																					$ccc = 0;
																					while ($row111 = $result111->fetch_assoc()) {
																						$ccc++;
																						
																						$countryName1 =  $row111['country_name'];
																						$c_code =  $row111['c_code'];
																						$ab ="";
																						if ($country11 == $c_code){
																							$ab = "selected";
																						}

																					echo "<option value='$c_code' $ab>$countryName1</option> ";
																					}
																					
																			?>
																		
																		
																			
																			
																		</select>
																		<br><br>
																		
																		<!-- <a href="#" class="wt-btn">Update Details</a> -->
																			<input type="submit" style=" text-transform: none; border: 0px; " class="wt-btn" value="Update country">
																		<br><br>
																	</div>
																
														
															</form>
														
														</span>
													</div>
													<!-- <div class="form-group form-group-half">
														<span class="wt-select">
															<select>
																<option value="">Select Currency</option>
																<option value="">Brazilian Real</option>
																<option value="">US Dollar</option>
																<option value="">Yuan Renminbi</option>
																<option value="">Colombian Peso</option>
																<option value="">Euro</option>
																<option value="">Hong Kong Dollar</option>
															</select>
														</span>
													</div> -->
												
										</div>
										<!-- <div class="wt-tabcompanyinfo">
											<div class="wt-tabscontenttitle">
												<h2>Dashboard Color Settings</h2>
											</div>
											<div class="wt-settingscontent">
												<div class="wt-description">
													<p>Incididunt ut labore et dolore magna aliqua aut enim ad
														exercitation ullamco laboris.</p>
												</div>
												<ul class="wt-accountinfo">
													<li>
														<div class="wt-on-off">
															<input type="checkbox" id="hide-on1" name="contact_form">
															<label for="hide-on1"><i></i></label>
														</div>
														<span>Use dark version for my dashboard</span>
													</li>
												</ul>
											</div>
										</div> -->
									</div>

									<!-- ---------------- Change Password---------------- -->
									<div class="wt-passwordholder tab-pane fade" id="wt-password">
										<div class="wt-changepassword">
											<div class="wt-tabscontenttitle">
												<h2>Change Your Password</h2>
											</div>
											
											<form method="POST" action="dashboard-accountsettings_code_pass.php" class="wt-formtheme wt-userform wt-userformvtwo">

												<fieldset>
													<div class="form-group">
														<input type="password" name="old_password" class="form-control"
														placeholder="Old Password" required style="color: #000;">
													</div>
													<div class="form-group">
														<input type="password" name="new_password" class="form-control"
														placeholder="New Password" required style="color: #111;" minlength="8" maxlength="20">
													</div>
													
													<div class="form-group form-group-half wt-btnarea">
														<!-- <a href="#" class="wt-btn">Update Details</a> -->
														<input type="submit" style=" text-transform: none; border: 0px; " class="wt-btn" value="Update">
														<br><br>
													</div>
												</fieldset>
												
											</form>
											
											
											
										</div>
									</div>

									<!-- ---------------- Email Notification ---------------- -->
									<div class="wt-emailnotiholder tab-pane fade" id="wt-emailnoti">
										<div class="wt-emailnoti">
											<div class="wt-tabscontenttitle">
												<h2>Manage Email Notifications</h2>
											</div>
											<div class="wt-settingscontent">
												<div class="wt-description">
													<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
														labore et dolore magna aliqua aut enim ad minim veniamac quis
														nostrud exercitation ullamco laboris.</p>
												</div>
												<form class="wt-formtheme wt-userform">
													<fieldset>
														<div class="form-group form-disabeld">
															<input type="password" name="password" class="form-control"
																placeholder="<?php echo $uname; ?>" disabled="">
														</div>
													</fieldset>
												</form>
												<ul class="wt-accountinfo">
													<li>
														<div class="wt-on-off">
															<input type="checkbox" id="hide-onemail"
																name="contact_form">
															<label for="hide-onemail"><i></i></label>
														</div>
														<span>Send me Weekly newsletter alerts</span>
													</li>
													<li>
														<div class="wt-on-off pull-right">
															<input type="checkbox" id="hide-onemail1"
																name="contact_form">
															<label for="hide-onemail1"><i></i></label>
														</div>
														<span>Forward messages on this ID</span>
													</li>
													<li>
														<div class="wt-on-off pull-right">
															<input type="checkbox" id="hide-onemail2"
																name="contact_form" checked="">
															<label for="hide-onemail2"><i></i></label>
														</div>
														<span>Send me bonus &amp; promo alerts</span>
													</li>
													<li>
														<div class="wt-on-off pull-right">
															<input type="checkbox" id="hide-onemail3"
																name="contact_form" checked="">
															<label for="hide-onemail3"><i></i></label>
														</div>
														<span>Share latest security alerts</span>
													</li>
												</ul>
											</div>
										</div>
									</div>

									<!-- ---------------- Security & Country ---------------- -->
									<div class="wt-pagedesignholder tab-pane fade" id="wt-detailpagedesign">
										<div class="wt-selectdesignholder wt-tabsinfo">
											<div class="wt-tabscontenttitle">
												<h2>Choose Your Detail Page Design</h2>
											</div>
											<div class="wt-selectdesign">
												<ul>
													<li>
														<div class="wt-templateoption">
															<div class="wt-designtitle">
																<span>Template 01</span>
																<a href="#"
																	class="wt-btn float-right">Preview</a>
															</div>
															<div class="wt-designimg">
																<input id="demo1" type="radio" name="employees"
																	value="company" checked="">
																<label for="demo1"><img src="images/template/img-01.jpg"
																		alt=""><i class="fa fa-check"></i></label>
															</div>
														</div>
													</li>
													<li>
														<div class="wt-templateoption">
															<div class="wt-designtitle">
																<span>Template 02</span>
																<a href="#"
																	class="wt-btn float-right">Preview</a>
															</div>
															<div class="wt-designimg">
																<input id="demo2" type="radio" name="employees"
																	value="company">
																<label for="demo2"><img src="images/template/img-02.jpg"
																		alt=""><i class="fa fa-check"></i></label>
															</div>
														</div>
													</li>
													<li>
														<div class="wt-templateoption">
															<div class="wt-designtitle">
																<span>Template 03</span>
																<a href="#"
																	class="wt-btn float-right">Preview</a>
															</div>
															<div class="wt-designimg">
																<input id="demo3" type="radio" name="employees"
																	value="company">
																<label for="demo3"><img src="images/template/img-03.jpg"
																		alt=""><i class="fa fa-check"></i></label>
															</div>
														</div>
													</li>
													<li>
														<div class="wt-templateoption">
															<div class="wt-designtitle">
																<span>Template 04</span>
																<a href="#"
																	class="wt-btn float-right">Preview</a>
															</div>
															<div class="wt-designimg">
																<input id="demo4" type="radio" name="employees"
																	value="company">
																<label for="demo4"><img src="images/template/img-04.jpg"
																		alt=""><i class="fa fa-check"></i></label>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
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
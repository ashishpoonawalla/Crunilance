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
	<script src="https://cdn.jsdelivr.net/npm/@reliutg/buzz-notify/index.min.js"></script>

</head>

<?php
	include('header_menu.php');
	include('authCheck.php');
	
?>


<?php 

	$uid = $_SESSION["user_id"];

	require('db.php');
	$Query1=" Where usertype='Freelancer' ";

										
	$sql1 = "SELECT * FROM user_info where user_id=$uid";
	
	$result1 = $conn->query($sql1);

	
	if($row1 = $result1->fetch_assoc()) {
												
		$email = $row1['email'];										
		$first_name = $row1['first_name'];
		$details = $row1['details'];
		$status1 = $row1['status1'];
		$hrate = $row1['hrate'];
		$utagline = $row1['utagline'];											
		$country = $row1['country'];

		$date = $row1['date'];
		$date1 =  date("M d, Y", strtotime($date));  

				
		$Free_Work = $row1['Free_Work'];								  
		$Free_Rating = $row1['Free_Rating'];								  
			
		$Emp_Work = $row1['Emp_Work'];								  
		$Emp_Rating = $row1['Emp_Rating'];
		
		$countryName="";
		$sql11 = "SELECT * FROM countries Where c_code ='$country'";
		$result11 = $conn->query($sql11);
		if ($row11 = $result11->fetch_assoc()) {
			$countryName =  $row11['country_name'];
		}
	}
?>

			<!--Header End-->
			<!--Inner Home Banner Start-->
			<!-- <div class="wt-haslayout wt-innerbannerholder wt-innerbannerholdervtwo">
				<div class="container">
					<div class="row justify-content-md-center">
						<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
						</div>
					</div>
				</div>
			</div> -->
			<!--Inner Home End-->
			<!--Main Start-->
		
		
			<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
				<!-- User Profile Start-->
				<div class="wt-main-section wt-paddingtopnull wt-haslayout"  style="margin-top: -40px;">
					<div class="container">
						<div class="row">

							<div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left" style=" margin-bottom: -20px;">
								<div class="wt-userprofileholder" style="margin-top: 60px; padding: 0px;  ">
									<div class="wt-widget">
												
											<div class="wt-widgetcontent" style="margin-bottom: -40px;margin-top: -4px; padding: 0px;">
												<div class="wt-widgettag wt-widgettagvtwo">
													<a href="dashboard-my-jobs.php" >Ongoing Projects</a>													
													<a href="dashboard-freelancer-bids.php">Latest Bids</a>
													<a href="dashboard-saveitems.php">Saved Jobs</a>
													<a href="joblisting.php">Find Jobs</a>
													<a href="work-diary.php">Work Diary</a>													
													<a href="dashboard-overview.php">Overview</a>
													<a href="dashboard-transactions.php">Transactions</a>
													<a href="dashboard-accountsettings.php">Settings</a>
												</div>
											</div>
									</div>	
								</div>
							</div>

							<div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
								<div class="wt-userprofileholder" style="margin-top: 0px;">
									<span class="wt-featuredtag"><img src="images/featured.png" alt=""
											data-tipso="Plus Member" class="template-content tipso_style"></span>
									<div class="col-12 col-sm-12 col-md-12 col-lg-3 float-left">
										<div class="row">
											<div class="wt-userprofile">
												<figure>
												<img alt="" src="./assets/imagesu/<?php echo $email; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$email.'.jpg'); ?>" style="height: 200px; width: 200px; object-fit: cover;">
													<div class="wt-userdropdown wt-online">
													</div>
												</figure>
												<div class="wt-title">
													<h3><i class="fa fa-check-circle"></i> <?php echo $first_name; ?></h3>
													<!-- <span>5/5 <a class="#">(6 Feedback)</a> -->
														<br>Member since <?php echo $date1; ?> <br>
														<!-- <a 	href="#">@valentine20658</a>  -->
														<a href="dashboard-profile.php" class="wt-reportuser"> <i class="far fa-edit" style="font-size: 20px;"></i> Edit</a>
														</span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12 col-sm-12 col-md-12 col-lg-9 float-left">
										<div class="row">
											<div class="wt-proposalhead wt-userdetails">
												<h2><?php echo $utagline; ?></h2>
												<ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
													<li><span><i class="far fa-money-bill-alt"></i> $<?php echo $hrate; ?> / hr</span>
													</li>
													<li><span><img src="images/flags/<?php echo $country; ?>.png" alt=""  style="width: 20px;"> 
														<?php echo $countryName; ?></span></li>
													<li><a href="#" class="wt-clicksave">
														<i class="fa fa-heart"></i> Save</a></li>
												</ul>
												<div class="wt-description">
													<p><?php echo $details; ?></p>
												</div>
											</div>
											<div id="wt-statistics" class="wt-statistics wt-profilecounter">
												<div class="wt-statisticcontent wt-countercolor1">
													<span class="wt-starsvtwo">
															<i class="fa fa-star <?php if($Free_Rating>0) echo 'fill'; ?>"></i>
															<i class="fa fa-star <?php if($Free_Rating>1) echo 'fill'; ?>"></i>
															<i class="fa fa-star <?php if($Free_Rating>2) echo 'fill'; ?>"></i>
															<i class="fa fa-star <?php if($Free_Rating>3) echo 'fill'; ?>"></i>
															<i class="fa fa-star <?php if($Free_Rating>4) echo 'fill'; ?>"></i>
													</span>
													<h4><?php echo $Free_Rating; ?> / 5</h4>
												</div>
												<div class="wt-statisticcontent wt-countercolor2">
													<h2><?php echo $Free_Work; ?></h2>
													<h4>Completed <br>Projects</h4>
												</div>
												<!-- <div class="wt-statisticcontent wt-countercolor4">
													<h3 data-from="0" data-to="02" data-speed="800"
														data-refresh-interval="02">02</h3>
													<h4>Cancelled <br>Projects</h4>
												</div>
												<div class="wt-statisticcontent wt-countercolor3">
													<h3 data-from="0" data-to="25" data-speed="8000"
														data-refresh-interval="100">25</h3>
													<em>k</em>
													<h4>Served <br>Hours</h4>
												</div> -->
												<div class="wt-description">
													<!-- <p>* Adpsicing elit sed do eiusmod tempor incididunt ut labore et
														dolore.</p> -->
													<a href="#" class="wt-btn" data-toggle="modal"
														data-target="#reviewermodal">Send Offer</a>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				
					<!-- User Profile End-->
					<!-- User Listing Start-->

					<div class="container">
						<div class="row">
							<div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">



								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
									<aside id="wt-sidebar" class="wt-sidebar">

										<div id="wt-ourskill" class="wt-widget">
											<div class="wt-widgettitle">
												<a href="dashboard-profile-skill.php" class="wt-reportuser"> <i class="far fa-edit" style="font-size: 20px; float:right;"></i> </a>
												<h2>My Skills</h2>
											</div>
											<div class="wt-widgetcontent wt-skillscontent">
												
												<?php
													$email = $_SESSION["username"]; 
													require('db.php');
				
													
													$sql="SELECT * FROM user_skills WHERE email='$email' order by skill_name" ;
													$result = $conn->query($sql);
													
													while ($row = $result->fetch_assoc()) {
															
															$skill_name =  $row['skill_name'];
															$skill_rate =  $row['skill_rate'];
															
														
													?>

												<div class="wt-skillholder" data-percent="<?php echo $skill_rate; ?>%">
													<span><?php echo $skill_name; ?> <em><?php echo $skill_rate; ?>%</em></span>
													<div class="wt-skillbarholder">
														<div class="wt-skillbar"></div>
													</div>
												</div>
												
														
												<?php } ?>
												
												
												
											</div>
										</div>

										<!-- <div class="wt-widget wt-widgetarticlesholder wt-articlesuser">
											<div class="wt-widgettitle">
												<h2>Awards &amp; Certifications</h2>
											</div>
											<div class="wt-widgetcontent">
												<div class="wt-particlehold">
													<figure>
														<img src="images/thumbnail/img-07.jpg" alt="image description">
													</figure>
													<div class="wt-particlecontent">
														<h3><a href="#">Top PHP Excel Skills</a></h3>
														<span><i class="lnr lnr-calendar"></i> Jun 27, 2018</span>
													</div>
												</div>
												<div class="wt-particlehold">
													<figure>
														<img src="images/thumbnail/img-08.jpg" alt="image description">
													</figure>
													<div class="wt-particlecontent">
														<h3><a href="#">Monster Developer Award</a>
														</h3>
														<span><i class="lnr lnr-calendar"></i> Apr 27, 2018</span>
													</div>
												</div>
												<div class="wt-particlehold">
													<figure>
														<img src="images/thumbnail/img-09.jpg" alt="image description">
													</figure>
													<div class="wt-particlecontent">
														<h3><a href="#">Best Communication 2015</a>
														</h3>
														<span><i class="lnr lnr-calendar"></i> May 27, 2018</span>
													</div>
												</div>
												<div class="wt-particlehold">
													<figure>
														<img src="images/thumbnail/img-10.jpg" alt="image description">
													</figure>
													<div class="wt-particlecontent">
														<h3><a href="#">Best Logo Design Winner</a>
														</h3>
														<span><i class="lnr lnr-calendar"></i> Aug 27, 2018</span>
													</div>
												</div>
											</div>
										</div> -->

										<!-- <div class="wt-proposalsr">
											<div class="tg-authorcodescan tg-authorcodescanvtwo">
												<figure class="tg-qrcodeimg">
													<img src="images/qrcode.png" alt="">
												</figure>
												<div class="tg-qrcodedetail">
													<span class="lnr lnr-laptop-phone"></span>
													<div class="tg-qrcodefeat">
														<h3>Scan with your <span>Smart Phone </span> To Get It Handy.
														</h3>
													</div>
												</div>
											</div>
										</div> -->

										<div class="wt-widget">
											
											
											<div class="wt-widgettitle">
												<a href="dashboard-profile-exp.php" class="wt-reportuser"> <i class="far fa-edit" style="font-size: 20px; float:right;"></i> </a>
												<h2>Experience</h2>
											</div>
											<div class="wt-experience" style="margin: 0px; padding: 0px;">
											
												<?php
													$email = $_SESSION["username"]; 
													require('db.php');
				
													
													$sql="SELECT * FROM user_experience WHERE email='$email' order by id" ;
													$result = $conn->query($sql);
													
													while ($row = $result->fetch_assoc()) {
															
															$id =  $row['id'];
															$company_name =  $row['company_name'];
															$job_title =  $row['job_title'];
															$startdate =  $row['startdate'];
															$enddate =  $row['enddate'];
															$desc1 =  $row['desc1'];

															$startdate1 =  date("M Y", strtotime($startdate));  
															$enddate1 =  date("M Y", strtotime($enddate));  
															
														
													?>


													<div class="wt-experiencelisting-hold" style="margin: 0px; padding: 0px;">
														<div class="wt-experiencelisting wt-bgcolor" style="margin: 0px; padding: 0px; margin-bottom: 40px;">
															<div class="wt-title">
																<h3><?php echo $job_title; ?></h3>
															</div>
															<div class="wt-experiencecontent">
																<ul class="wt-userlisting-breadcrumb">
																	<li><span><i class="far fa-building"></i> <?php echo $company_name; ?></span>
																	</li>
																	<li><span><i class="far fa-calendar"></i> <?php echo $startdate1; ?> - <?php echo $enddate1; ?></span></li>
																</ul>
																<div class="wt-description">
																	<p>“ <?php echo $desc1; ?> ”
																	</p>
																</div>
															</div>
														</div>
														<div class="divheight"></div>
													</div>
												
												<?php } ?>
													
											</div>	

										</div>	
											
											
											
										<div class="wt-widget">	
											<div class="wt-widgettitle">
												<a href="dashboard-profile-edu.php" class="wt-reportuser"> <i class="far fa-edit" style="font-size: 20px; float:right;"></i> </a>
												<h2>Education</h2>
											</div>
											<div class="wt-experience" style="margin: 0px; padding: 0px;">
											
												<div class="wt-experiencelisting-hold" style="margin: 0px; padding: 0px;">
													
												
												<?php
													$email = $_SESSION["username"]; 
													require('db.php');
				
													
													$sql="SELECT * FROM user_education WHERE email='$email' order by id" ;
													$result = $conn->query($sql);
													
													while ($row = $result->fetch_assoc()) {
															
															$id =  $row['id'];
															$coll_name =  $row['coll_name'];
															$course =  $row['course'];
															$startdate =  $row['startdate'];
															$enddate =  $row['enddate'];
															$desc1 =  $row['desc1'];

															$startdate1 =  date("M Y", strtotime($startdate));  
															$enddate1 =  date("M Y", strtotime($enddate));  
															
														
													?>


														<div class="wt-experiencelisting-hold" style="margin: 0px; padding: 0px;">
															<div class="wt-experiencelisting wt-bgcolor" style="margin: 0px; padding: 0px; margin-bottom: 40px;">
																<div class="wt-title">
																	<h3><?php echo $course; ?></h3>
																</div>
																<div class="wt-experiencecontent">
																	<ul class="wt-userlisting-breadcrumb">
																		<li><span><i class="far fa-building"></i> <?php echo $coll_name; ?></span>
																		</li>
																		<li><span><i class="far fa-calendar"></i> <?php echo $startdate1; ?> - <?php echo $enddate1; ?></span></li>
																	</ul>
																	<div class="wt-description">
																		<p>“ <?php echo $desc1; ?> ”
																		</p>
																	</div>
																</div>
															</div>
														</div>
												
													<?php } ?>
													

												
													
													
													<div class="divheight"></div>
											
											</div>
										</div>

										<!-- <div class="wt-widget wt-sharejob">
											<div class="wt-widgettitle">
												<h2>Share This User</h2>
											</div>
											<div class="wt-widgetcontent">
												<ul class="wt-socialiconssimple">
													<li class="wt-facebook"><a href="#"><i
																class="fab fa-facebook-f"></i>Share on Facebook</a></li>
													<li class="wt-twitter"><a href="#"><i
																class="fab fa-twitter"></i>Share on Twitter</a></li>
													<li class="wt-linkedin"><a href="#"><i
																class="fab fa-linkedin-in"></i>Share on Linkedin</a>
													</li>
													<li class="wt-googleplus"><a href="#"><i
																class="fab fa-google-plus-g"></i>Share on Google
															Plus</a></li>
												</ul>
											</div>
										</div> -->

									
									</aside>
								</div>




								<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
									<div class="wt-usersingle">
										<div class="wt-clientfeedback">
											<div class="wt-usertitle wt-titlewithselect">
												<h2>Client Feedback</h2> 
												<div class="form-group">
													<!-- <a href="dashboard-profile.php" class="wt-reportuser"> <i class="far fa-edit" style="font-size: 20px; float:right;"></i> </a> -->
													<!-- <span class="wt-select">
														<select>
															<option value="Show All">Show All</option>
															<option value="One Page">One Page </option>
															<option value="Two Page">Two Page</option>
														</select>
													</span> -->
												</div>
											</div>



										<?php

											require('db.php');
											$user = $_SESSION['username']; 
											$cnt = 0;
											$sql1="SELECT * FROM projects WHERE tusername='$user' ORDER BY product_id DESC LIMIT 6 " ;
											$result1 = $conn->query($sql1);
											

											$F_rat_tot = 0;
											$F_rat_avg = 0;
											while($row1 = $result1->fetch_assoc()){
												$pid = $row1['product_id'];
												$userEmail1 = $row1['userEmail'];
												$tit1 = $row1['product_title'];
												$p_level = $row1['p_level'];
												$typepost = $row1['typepost'];
												$p_duration = $row1['p_duration'];
												$budget = $row1['product_price'];
												$product_keywords = $row1['product_keywords'];
												$product_desc = $row1['product_desc'];
												$AwardDate = $row1['AwardDate'];
												$date11 = date('d M Y',strtotime($AwardDate));

												

												$sql11 = "SELECT * FROM user_info Where email='$userEmail1'";
										
												$result11 = $conn->query($sql11);

												$cccnt = 0;
												if ($row11 = $result11->fetch_assoc()) {
													

													// $user_id = $row11['user_id'];										
													// $email = $row11['email'];										
													$first_name = $row11['first_name'];
													// $details = $row11['details'];
													// $status1 = $row11['status1'];
													// $hrate = $row11['hrate'];
													// $utagline = $row11['utagline'];											
													$country = $row11['country'];


												
													
													$countryName="";
													$sql11 = "SELECT * FROM countries Where c_code ='$country'";
													$result11 = $conn->query($sql11);
													if ($row11 = $result11->fetch_assoc()) {
														$countryName =  $row11['country_name'];
													}
												}



												$F_rat = $row1['E_rat'];
												$E_rat = $row1['F_rat'];
												$E_feedback = $row1['E_feedback'];
											
												if ($F_rat != 0){
													$cnt++;  
													$F_rat_tot = $F_rat_tot + $F_rat;
												}

										?>


											<div class="wt-userlistinghold wt-userlistingsingle wt-bgcolor">												
											
												<figure class="wt-userlistingimg">
													<!-- <img src="images/client/img-01.jpg" alt="image description"> -->
													<img alt="" src="./assets/imagesu/<?php echo $userEmail1; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$un.'.jpg'); ?>" style="height: 46px; width: 46px; border-radius:10px;  object-fit: cover;">
												</figure>
												<div class="wt-userlistingcontent">
													<div class="wt-contenthead">
														<div class="wt-title">
															<a href="#"><i
																	class="fa fa-check-circle"></i> <?php echo $first_name; ?></a>
															<h3><?php echo $tit1; ?></h3>
														</div>
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="fa fa-dollar-sign"></i> <?php echo $budget; ?> / <?php echo $typepost; ?> </span>
															</li>
															<li><span><img src="images/flags/<?php echo $country; ?>.png" alt="" style="width: 18px;">
															<?php echo $countryName; ?></span></li>
															<li><span><i class="far fa-calendar"></i> <?php echo $date11; ?> </span></li>
															
														<?php 
														if ($E_rat==0){
														?>
															<li><span><i class="fas fa-spinner fa-spin"></i> In
																	Progress</span></li>
														<?php }else{ ?>	
															<!-- <li><span class="wt-stars"><span></span></span></li> -->

															
															<li><span class="wt-starsvtwo">
																	<i class="fa fa-star <?php if($E_rat>0) echo 'fill'; ?>"></i>
																	<i class="fa fa-star <?php if($E_rat>1) echo 'fill'; ?>"></i>
																	<i class="fa fa-star <?php if($E_rat>2) echo 'fill'; ?>"></i>
																	<i class="fa fa-star <?php if($E_rat>3) echo 'fill'; ?>"></i>
																	<i class="fa fa-star <?php if($E_rat>4) echo 'fill'; ?>"></i>
																</span></i>
															<li><span ><?php echo $E_rat; ?>/5</span> </li>
															
														<?php } ?>	
														</ul>
														<div class="wt-description" style="color: red;">
															<p><?php if ($E_rat>0) echo '“'.$E_feedback.'”'; ?></p>
														</div>
													</div>
													
												</div>
												
											</div>



										<?php 
											}
										?>















											<!-- <div class="wt-userlistinghold wt-userlistingsingle">
												<figure class="wt-userlistingimg">
													<img src="images/client/img-02.jpg" alt="image description">
												</figure>
												<div class="wt-userlistingcontent">
													<div class="wt-contenthead">
														<div class="wt-title">
															<a href="#"><i
																	class="fa fa-check-circle"></i> Videohive Studio</a>
															<h3>Need help translating app stringlist from English to
																Arabic</h3>
														</div>
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="fa fa-dollar-sign"></i><i
																		class="fa fa-dollar-sign"></i>
																	Intermediate</span></li>
															<li><span><img src="images/flag/img-03.png" alt="">
																	Canada</span></li>
															<li><span><i class="far fa-calendar"></i> Jun 2017 - Jul
																	2017</span></li>
															<li><span class="wt-stars"><span></span></span></li>
														</ul>
													</div>
												</div>
												<div class="wt-description">
													<p>“ Eiusmod tempor incididunt ut labore et dolore magna quis
														nostrud exercitation ullamco laboris. ”</p>
												</div>
											</div> -->

											<!-- <div class="wt-userlistinghold wt-userlistingsingle wt-bgcolor">
												<figure class="wt-userlistingimg">
													<img src="images/client/img-03.jpg" alt="image description">
												</figure>
												<div class="wt-userlistingcontent">
													<div class="wt-contenthead">
														<div class="wt-title">
															<a href="#"><i
																	class="fa fa-check-circle"></i> Photodune
																Professionals</a>
															<h3>Blog Post Writing in English Language</h3>
														</div>
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="fa fa-dollar-sign"></i><i
																		class="fa fa-dollar-sign"></i><i
																		class="fa fa-dollar-sign"></i>
																	Professional</span></li>
															<li><span><img src="images/flag/img-02.png" alt=""> United
																	States</span></li>
															<li><span><i class="far fa-calendar"></i> Jun 2017</span>
															</li>
															<li><span class="wt-stars"><span></span></span></li>
														</ul>
													</div>
												</div>
												<div class="wt-description">
													<p>“ Consectetur adipisicing elit sed do eiusmod tempor incididunt
														ut labore et dolore magna aliquaenim ad minim veniamac quis
														nostrud exercitation ullamco laboris. ”</p>
												</div>
											</div> -->

											<!-- <div class="wt-btnarea">
												<a href="#" class="wt-btn">Load More</a>
											</div> -->
										</div>


										
										<div class="wt-craftedprojects">
											<div class="wt-usertitle">
												<a href="dashboard-profile-pro.php" class="wt-reportuser"> <i class="far fa-edit" style="font-size: 20px; float:right;"></i> </a>
												<h2>Crafted Projects</h2>
												
											</div>
											<div class="wt-projects">
											
											<?php
													$email = $_SESSION["username"]; 
													require('db.php');
				
													
													$sql="SELECT * FROM user_project WHERE email='$email' order by id" ;
													$result = $conn->query($sql);
													
													while ($row = $result->fetch_assoc()) {
															
															$id =  $row['id'];
															$title =  $row['title'];
															$weburl =  $row['weburl'];
															$imgurl =  $row['imgurl'];
															
														
													?>
											
											
												<div class="wt-project">
													<figure>
														<img src="<?php echo $imgurl; ?>" alt="">
													</figure>
													<div class="wt-projectcontent">
														<h3><?php echo $title; ?></h3>
														<a target='_blank' href="<?php echo $weburl; ?>"><?php echo $weburl; ?></a>
													</div>
												</div>
												

												<?php } ?>

												<!-- <div class="wt-btnarea">
													<a href="#" class="wt-btn">Load More</a>
												</div> -->
											</div>
										</div> 
										<!-- <div class="wt-experience">
											<div class="wt-usertitle">
												<a href="dashboard-profile.php" class="wt-reportuser"> <i class="far fa-edit" style="font-size: 20px; float:right;"></i> </a>
												<h2>Experience</h2>
												
											</div>
											<div class="wt-experiencelisting-hold">
												<div class="wt-experiencelisting wt-bgcolor">
													<div class="wt-title">
														<h3>Web &amp; Apps Project Manager</h3>
													</div>
													<div class="wt-experiencecontent">
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="far fa-building"></i> Amento Tech</span>
															</li>
															<li><span><i class="far fa-calendar"></i> Aug 2017 - Till
																	Now</span></li>
														</ul>
														<div class="wt-description">
															<p>“ Consectetur adipisicing elit sed do eiusmod tempor
																incididunt ut labore et dolore magna aliquaenim ad minim
																veniamac quis nostrud exercitation ullamco laboris. ”
															</p>
														</div>
													</div>
												</div>
												<div class="wt-experiencelisting">
													<div class="wt-title">
														<h3>Sr. PHP &amp; Laravel Developer</h3>
													</div>
													<div class="wt-experiencecontent">
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="far fa-building"></i> Amento Tech</span>
															</li>
															<li><span><i class="far fa-calendar"></i> Jun 2017 - Jul
																	2018</span></li>
														</ul>
														<div class="wt-description">
															<p>“ Consectetur adipisicing elit sed do eiusmod tempor
																incididunt ut labore et dolore magna aliquaenim ad minim
																veniamac quis nostrud exercitation ullamco laboris. ”
															</p>
														</div>
													</div>
												</div>
												<div class="wt-experiencelisting wt-bgcolor">
													<div class="wt-title">
														<h3>PHP Developer</h3>
													</div>
													<div class="wt-experiencecontent">
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="far fa-building"></i> Amento Tech</span>
															</li>
															<li><span><i class="far fa-calendar"></i> Apr 2016 - Jul
																	2017</span></li>
														</ul>
														<div class="wt-description">
															<p>“ Consectetur adipisicing elit sed do eiusmod tempor
																incididunt ut labore et dolore magna aliquaenim ad minim
																veniamac quis nostrud exercitation ullamco laboris. ”
															</p>
														</div>
													</div>
												</div>
												<div class="divheight"></div>
											</div>
										</div>
										<div class="wt-experience wt-education">
											<div class="wt-usertitle">
												<a href="dashboard-profile.php" class="wt-reportuser"> <i class="far fa-edit" style="font-size: 20px; float:right;"></i> </a>
												<h2>Education</h2>
											</div>
											<div class="wt-experiencelisting-hold">
												<div class="wt-experiencelisting wt-bgcolor">
													<div class="wt-title">
														<h3>Web &amp; Apps Project Manager</h3>
													</div>
													<div class="wt-experiencecontent">
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="far fa-building"></i> Amento Tech</span>
															</li>
															<li><span><i class="far fa-calendar"></i> Aug 2017 - Till
																	Now</span></li>
														</ul>
														<div class="wt-description">
															<p>“ Consectetur adipisicing elit sed do eiusmod tempor
																incididunt ut labore et dolore magna aliquaenim ad minim
																veniamac quis nostrud exercitation ullamco laboris. ”
															</p>
														</div>
													</div>
												</div>
												<div class="wt-experiencelisting">
													<div class="wt-title">
														<h3>Sr. PHP &amp; Laravel Developer</h3>
													</div>
													<div class="wt-experiencecontent">
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="far fa-building"></i> Amento Tech</span>
															</li>
															<li><span><i class="far fa-calendar"></i> Jun 2017 - Jul
																	2018</span></li>
														</ul>
														<div class="wt-description">
															<p>“ Consectetur adipisicing elit sed do eiusmod tempor
																incididunt ut labore et dolore magna aliquaenim ad minim
																veniamac quis nostrud exercitation ullamco laboris. ”
															</p>
														</div>
													</div>
												</div>
												<div class="wt-experiencelisting wt-bgcolor">
													<div class="wt-title">
														<h3>PHP Developer</h3>
													</div>
													<div class="wt-experiencecontent">
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="far fa-building"></i> Amento Tech</span>
															</li>
															<li><span><i class="far fa-calendar"></i> Apr 2016 - Jul
																	2017</span></li>
														</ul>
														<div class="wt-description">
															<p>“ Consectetur adipisicing elit sed do eiusmod tempor
																incididunt ut labore et dolore magna aliquaenim ad minim
																veniamac quis nostrud exercitation ullamco laboris. ”
															</p>
														</div>
													</div>
												</div>
												<div class="divheight"></div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					
					<!-- User Listing End-->
				</div>
			</main>
		
		
			<!--Main End-->

			
	<!-- Popup Start-->
	<div class="modal fade wt-offerpopup" tabindex="-1" role="dialog" id="reviewermodal">
		<div class="modal-dialog" role="document">
			<div class="wt-modalcontent modal-content">
				<div class="wt-popuptitle">
					<h2>Send a Project Offer</h2>
					<a href="javascript%3bvoid(0)%3b.php" class="wt-closebtn close"><i class="fa fa-close"
							data-dismiss="modal" aria-label="Close"></i></a>
				</div>
				<div class="modal-body">
					<div class="wt-projectdropdown-hold">
						<div class="wt-projectdropdown">
							<div class="wt-projectselect">
								<figure><img src="images/thumbnail/img-07.jpg" alt=""></figure>
								<div class="wt-projectselect-content">
									<h3>Project Title Here</h3>
									<span><i class="lnr lnr-calendar-full"></i> Project Deadline: May 27, 2019</span>
								</div>
							</div>
						</div>
						<div class="wt-projectdropdown-option">
							<div class="wt-projectselect">
								<figure><img src="images/thumbnail/img-07.jpg" alt=""></figure>
								<div class="wt-projectselect-content">
									<h3>Project Title Here</h3>
									<span><i class="lnr lnr-calendar-full"></i> Project Deadline: May 27, 2019</span>
								</div>
							</div>
						</div>
					</div>
					<form class="wt-formtheme wt-formpopup">
						<fieldset>
							<div class="form-group">
								<textarea class="form-control" placeholder="Add Description*"></textarea>
							</div>
							<div class="form-group wt-btnarea">
								<a href="#" class="wt-btn">Send offer</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Popup End-->

	
			<!--Footer Start-->
			
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


</html>s
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

		<!--Header End-->
		<!--Inner Home Banner Start-->

		<!-- <div class="wt-haslayout wt-innerbannerholder">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
						<div class="wt-innerbannercontent">
							<div class="wt-title">
								<h2>FAQ</h2>
							</div>
							<ol class="wt-breadcrumb">
								<li><a href="index-2.php">Home</a></li>
								<li class="wt-active">How It Works</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<!--Inner Home End-->
		<!--Main Start-->
		<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
			<!--Categories Start-->
			<div class="wt-haslayout wt-main-section" style="margin-top: -60px;min-height: 650px;">
				<div class="wt-contentwrappers">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-1 float-left">
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-10 float-left">
								<div class="wt-howitwork-hold wt-bgwhite wt-haslayout" style="border-radius: 8px;">
									<ul class="wt-navarticletab wt-navarticletabvtwo nav navbar-nav">
										
										<li class="nav-item">
											<a class="active"id="trading-tab" data-toggle="tab" href="#faq">Notifications</a>
										</li>
									</ul>
									<div class="tab-content wt-haslayout" style="margin-top: -30px;">
										
										<div class="wt-contentarticle tab-pane active fade show" id="faq">
											<div class="row">
												<div class="wt-starthiringhold wt-innerspace wt-haslayout">
													<div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
														<div class="wt-starthiringcontent">
															
															<ul class="wt-accordionhold accordion">

															<?php


          
														require('db.php');


														$limit = 10; 


														if (isset($_GET["page"] )) 
														{
														$page  = $_GET["page"]; 
														} 
														else 
														{
														$page=1; 
														};  

														$record_index= ($page-1) * $limit;      

														$unm11 = $_SESSION["username"];

														$Query1 = "Where ruid='$unm11'";

														$sql1="SELECT * FROM notifications $Query1 ORDER BY nid DESC Limit $record_index, $limit" ;
														//echo $sql1; 
														$result1 = $conn->query($sql1);

														$rowcnt=0;
														while($row1 = $result1->fetch_assoc())
														{
															$rowcnt++;
															$nid =$row1['nid'];
															$jobid =$row1['jobid'];
															$nmessage =$row1['nmessage'];
															$suid =$row1['suid'];
															$sfnm =$row1['sfnm'];
															$ntype =$row1['ntype'];
															$status1 =$row1['status1'];
															
														
															$date1 = $row1['date1'];             
															$theDate    = new DateTime($date1);
															$stringDate = $theDate->format('d-M-Y');  
															
															//dashboard-ongoingsingle.php?pid=139
															
															?>
																

																<a href='notifications1.php?nid=<?php echo $nid; ?>&jobid=<?php echo $jobid;?>&ntype=<?php echo $ntype; ?>' >
																<li>
																	<div class="wt-accordiontitle collapsed" style="border: 0px;"
																		id="headingOnea" >
																		<span>
																		<img src='./assets/imagesu/<?php echo $suid; ?>.jpg' style="height: 30px; border-radius: 15px;" />
																		<?php echo $nmessage; ?> - Job id#<?php echo $jobid; ?>
																		<a style="float: right; "href='notifications_del.php?nid=<?php echo $nid; ?>' onclick="return confirm('Are you sure you want to delete notification?');">
																				<img src="img/trash4.png" style="width: 22px;"/>
																		</a>
																	</span>
																	</div>
																	<!-- <div class="wt-accordiondetails collapse"
																		id="collapseOnea" aria-labelledby="headingOne">
																		<div class="wt-title">
																			<h3>Digital Marketing</h3>
																		</div>
																		<div class="wt-description">
																			<p>
																				Consectetur adipisicing elit sed
																				aeiusmisuod tempor incididunt labore
																				dolore ma alaeiqua enim ade minim veniam
																				quis nostr xecitation ullamcoaris nisi
																				ut aliquipa extaea coedmmmodo equate
																				irure dolawor in reprehenderit.
																			</p>
																		</div>
																		<div class="wt-likeunlike">
																			<span>Did you find this useful?</span>
																			<a href="#"
																				class="wt-like"><i
																					class="fa fa-thumbs-up"></i></a>
																			<a href="#"
																				class="wt-unlike"><i
																					class="fa fa-thumbs-down"></i></a>
																		</div>
																	</div> -->
																</li>
																</a>
															<?php } ?>

																<!-- <li>
																	<div class="wt-accordiontitle collapsed"
																		id="headingthree" data-toggle="collapse"
																		data-target="#collapsethreea">
																		<span>Cillum dolore eu fugiat nulla
																			pariatur?</span>
																	</div>
																	<div class="wt-accordiondetails collapse"
																		id="collapsethreea"
																		aria-labelledby="headingthree">
																		<div class="wt-title">
																			<h3>Digital Marketing</h3>
																		</div>
																		<div class="wt-description">
																			<p>
																				Consectetur adipisicing elit sed
																				aeiusmisuod tempor incididunt labore
																				dolore ma alaeiqua enim ade minim veniam
																				quis nostr xecitation ullamcoaris nisi
																				ut aliquipa extaea coedmmmodo equate
																				irure dolawor in reprehenderit.
																			</p>
																		</div>
																		<div class="wt-likeunlike">
																			<span>Did you find this useful?</span>
																			<a href="#"
																				class="wt-like"><i
																					class="fa fa-thumbs-up"></i></a>
																			<a href="#"
																				class="wt-unlike"><i
																					class="fa fa-thumbs-down"></i></a>
																		</div>
																	</div>
																</li> -->
															</ul>
														</div>
													</div>
													<div class="col-12 col-sm-12 col-md-4 col-lg-5 float-right">
														<div class="wt-howtoworkimg">
															<figure>
																<img src="images/work/img-01.jpg" alt="">
															</figure>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Limitless Experience End-->
		</main>
		<!--Main End-->
		<!--Footer Start-->
<?php 
	include('footer_menu.php'); 
?>
		<!--Footer End-->
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
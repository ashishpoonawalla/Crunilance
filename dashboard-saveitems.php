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

			<!--Main Start-->
			<main id="wt-main" class="wt-main wt-haslayout">
				<!--Sidebar Start-->
				
<?php
	include('sidebar.php');
?>				

				<!--Sidebar Start-->
				<!--Register Form Start-->
				<section class="wt-haslayout wt-dbsectionspace" style="min-height: 600px;">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-1">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-10">
							<div class="wt-dashboardbox wt-dashboardtabsholder wt-saveitemholder">
								<div class="wt-dashboardtabs">
									<ul class="wt-tabstitle nav navbar-nav">
										<li class="nav-item">
											<a class="active" data-toggle="tab" href="#wt-skills">Saved Jobs</a>
										</li>
										
									</ul>
								</div>
								<div class="wt-tabscontent tab-content tab-savecontent">
									<div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
										<div class="wt-yourdetails">
											<!-- <div class="wt-tabscontenttitle">
												<h2>Saved Jobs</h2>
											</div> -->


											<div class="wt-dashboradsaveitem">
												
												<?php 
												require('db.php');
												$user = $_SESSION['username']; 
												$cnt = 0;
												$sql1="SELECT * FROM save_job WHERE useremail='$user' " ;
												$result1 = $conn->query($sql1);
												
												while($row1 = $result1->fetch_assoc()){
													$pid = $row1['pid'];
													$cnt++;


													$sql="SELECT * FROM projects WHERE product_id=$pid " ;
													$result = $conn->query($sql);
													
													if($row = $result->fetch_assoc()){
																								
														$tit1 = $row['product_title'];
														$p_level = $row['p_level'];
														$typepost = $row['typepost'];
														$p_duration = $row['p_duration'];
														$budget = $row['product_price'];
														$product_keywords = $row['product_keywords'];
														$product_desc = $row['product_desc'];
														$country = $row['country'];
														$status1 = $row['status1'];

														$countryName="";
														$sql11 = "SELECT * FROM countries Where c_code ='$country'";
														$result11 = $conn->query($sql11);
														if ($row11 = $result11->fetch_assoc()) {
															$countryName =  $row11['country_name'];
														}
												?>

												<a href="jobsingle.php?pid=<?php echo $pid; ?>" >

													<div class="wt-userlistinghold wt-featured wt-dashboradsaveditems">
														<span class="wt-dashboardsavetag wt-featuredtag">
															<!-- <img
																src="images/featured.png" alt="" data-tipso="Plus Member"
																class="template-content tipso_style"> -->
															</span>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-dashboardsavehead">
																<div class="wt-title">
																	<!-- <a href="usersingle.php"><i
																			class="fa fa-check-circle"></i> Choosen Design
																	</a> -->
																	<h2><?php echo $tit1; ?></h2>
																</div>
																<ul
																	class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
																	<li><span class="wt-dashboraddoller"><i
																				class="fa fa-dollar-sign"></i>
																				<?php echo $budget; ?> <?php echo $typepost; ?></span></li>
																	<li><span><img alt="" style="width: 16px;" src="images/flags/<?php echo $country; ?>.png" alt="">
																			<?php echo $countryName; ?></span></li>
																	<li><a href="#"
																			class="wt-clicksavefolder"><i class="far fa-folder"></i> <?php echo $p_level; ?></a></li>

																	<li><span class="wt-dashboradclock"><i class="far fa-clock"></i> <?php echo $p_duration; ?></span></li>
																	
																</ul>
															</div>
														</div>
													</div>
												</a>


												<?php
													}
												}
												?>



											</div>
										</div>
										<!-- <nav class="wt-pagination wt-savepagination">
											<ul>
												<li class="wt-prevpage"><a href="#"><i
															class="lnr lnr-chevron-left"></i></a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">...</a></li>
												<li><a href="#">50</a></li>
												<li class="wt-nextpage"><a href="#"><i
															class="lnr lnr-chevron-right"></i></a></li>
											</ul>
										</nav> -->
									</div>
									<div class="wt-educationholder tab-pane fade" id="wt-education">
										<div class="wt-userexperience wt-followcompomy">
											<div class="wt-tabscontenttitle">
												<h2>Followed Companies</h2>
											</div>
											<div class="wt-focomponylist">
												<div class="wt-followedcompnies">
													<div class="wt-userlistinghold wt-userlistingsingle">
														<figure class="wt-userlistingimg">
															<img src="images/company/img-01.png"
																alt="image description">
														</figure>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-followcomhead">
																<div class="wt-title">
																	<a href="#"><i
																			class="fa fa-check-circle"></i> Verified
																		Company</a>
																	<h3>Angry Creative Studio</h3>
																</div>
																<ul
																	class="wt-followcompomy-breadcrumb wt-userlisting-breadcrumb">
																	<li><a href="#"> Open Jobs </a>
																	</li>
																	<li><a href="#"> Full Profile</a>
																	</li>
																	<li><a href="#"
																			class="wt-savefollow"> Following</a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="wt-followedcompnies">
													<div class="wt-userlistinghold wt-userlistingsingle">
														<figure class="wt-userlistingimg">
															<img src="images/company/img-02.png"
																alt="image description">
														</figure>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-followcomhead">
																<div class="wt-title">
																	<a href="#"><i
																			class="fa fa-check-circle"></i> Verified
																		Company</a>
																	<h3>Angry Creative Studio</h3>
																</div>
																<ul
																	class="wt-followcompomy-breadcrumb wt-userlisting-breadcrumb">
																	<li><a href="#"> Open Jobs </a>
																	</li>
																	<li><a href="#"> Full Profile</a>
																	</li>
																	<li><a href="#"
																			class="wt-savefollow"> Following</a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="wt-followedcompnies">
													<div class="wt-userlistinghold wt-userlistingsingle">
														<figure class="wt-userlistingimg">
															<img src="images/company/img-03.png"
																alt="image description">
														</figure>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-followcomhead">
																<div class="wt-title">
																	<a href="#"><i
																			class="fa fa-check-circle"></i> Verified
																		Company</a>
																	<h3>Angry Creative Studio</h3>
																</div>
																<ul
																	class="wt-followcompomy-breadcrumb wt-userlisting-breadcrumb">
																	<li><a href="#"> Open Jobs </a>
																	</li>
																	<li><a href="#"> Full Profile</a>
																	</li>
																	<li><a href="#"
																			class="wt-savefollow"> Following</a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="wt-followedcompnies">
													<div class="wt-userlistinghold wt-userlistingsingle">
														<figure class="wt-userlistingimg">
															<img src="images/company/img-04.png"
																alt="image description">
														</figure>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-followcomhead">
																<div class="wt-title">
																	<a href="#"><i
																			class="fa fa-check-circle"></i> Verified
																		Company</a>
																	<h3>Angry Creative Studio</h3>
																</div>
																<ul
																	class="wt-followcompomy-breadcrumb wt-userlisting-breadcrumb">
																	<li><a href="#"> Open Jobs </a>
																	</li>
																	<li><a href="#"> Full Profile</a>
																	</li>
																	<li><a href="#"
																			class="wt-savefollow"> Following</a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="wt-followedcompnies">
													<div class="wt-userlistinghold wt-userlistingsingle">
														<figure class="wt-userlistingimg">
															<img src="images/company/img-05.png"
																alt="image description">
														</figure>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-followcomhead">
																<div class="wt-title">
																	<a href="#"><i
																			class="fa fa-check-circle"></i> Verified
																		Company</a>
																	<h3>Angry Creative Studio</h3>
																</div>
																<ul
																	class="wt-followcompomy-breadcrumb wt-userlisting-breadcrumb">
																	<li><a href="#"> Open Jobs </a>
																	</li>
																	<li><a href="#"> Full Profile</a>
																	</li>
																	<li><a href="#"
																			class="wt-savefollow"> Following</a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="wt-followedcompnies">
													<div class="wt-userlistinghold wt-userlistingsingle">
														<figure class="wt-userlistingimg">
															<img src="images/company/img-06.png"
																alt="image description">
														</figure>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-followcomhead">
																<div class="wt-title">
																	<a href="#"><i
																			class="fa fa-check-circle"></i> Verified
																		Company</a>
																	<h3>Angry Creative Studio</h3>
																</div>
																<ul
																	class="wt-followcompomy-breadcrumb wt-userlisting-breadcrumb">
																	<li><a href="#"> Open Jobs </a>
																	</li>
																	<li><a href="#"> Full Profile</a>
																	</li>
																	<li><a href="#"
																			class="wt-savefollow"> Following</a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<nav class="wt-pagination wt-savepagination">
											<ul>
												<li class="wt-prevpage"><a href="#"><i
															class="lnr lnr-chevron-left"></i></a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">...</a></li>
												<li><a href="#">50</a></li>
												<li class="wt-nextpage"><a href="#"><i
															class="lnr lnr-chevron-right"></i></a></li>
											</ul>
										</nav>
									</div>
									<div class="wt-awardsholder tab-pane fade" id="wt-awards">
										<div class="wt-addprojectsholder wt-likefreelan">
											<div class="wt-tabscontenttitle">
												<h2>Liked Freelancers</h2>
											</div>
											<div class="wt-likedfreelancers wt-haslayout">
												<div class="wt-userlistinghold wt-featured">
													<span class="wt-featuredtag"><img src="images/featured.png" alt=""
															data-tipso="Plus Member"
															class="template-content tipso_style"></span>
													<figure class="wt-userlistingimg">
														<img src="images/user/userlisting/img-01.jpg"
															alt="image description">
													</figure>
													<div class="wt-userlistingcontent">
														<div class="wt-contenthead">
															<div class="wt-title">
																<a href="usersingle.php"><i
																		class="fa fa-check-circle"></i> Alfredo Bossard
																</a>
																<h2>Classifieds Posting, Data Entry, Typing</h2>
															</div>
															<ul class="wt-userlisting-breadcrumb">
																<li><span><i class="far fa-money-bill-alt"></i> $44.00 /
																		hr</span></li>
																<li><span><img src="images/flag/img-02.png" alt="">
																		United States</span></li>
																<li><a href="#"
																		class="wt-clicksave"><i class="fa fa-heart"></i>
																		Save</a></li>
															</ul>
														</div>
														<div class="wt-rightarea">
															<span class="wt-starsvtwo">
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
															</span>
															<span class="wt-starcontent">4.5/<sub>5</sub> <em>(860
																	Feedback)</em></span>
														</div>
													</div>
												</div>
												<div class="wt-userlistinghold wt-featured">
													<span class="wt-featuredtag wt-featuredtagcolor1"><img
															src="images/featured.png" alt="" data-tipso="Plus Member"
															class="template-content tipso_style"></span>
													<figure class="wt-userlistingimg">
														<img src="images/user/userlisting/img-02.jpg"
															alt="image description">
													</figure>
													<div class="wt-userlistingcontent">
														<div class="wt-contenthead">
															<div class="wt-title">
																<a href="usersingle.php"><i
																		class="fa fa-check-circle"></i> Marcelene
																	Westerberg</a>
																<h2>SEO/PPC Social Media Marketing Expert</h2>
															</div>
															<ul class="wt-userlisting-breadcrumb">
																<li><span><i class="far fa-money-bill-alt"></i> $44.00 /
																		hr</span></li>
																<li><span><img src="images/flag/img-05.png" alt="">
																		United Emirates</span></li>
																<li><a href="#"><i
																			class="fa fa-heart"></i> Click to Save</a>
																</li>
															</ul>
														</div>
														<div class="wt-rightarea">
															<span class="wt-starsvtwo">
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star"></i>
															</span>
															<span class="wt-starcontent">4.5/<sub>5</sub> <em>(860
																	Feedback)</em></span>
														</div>
													</div>
												</div>
												<div class="wt-userlistinghold wt-featured">
													<span class="wt-featuredtag wt-featuredtagcolor2"><img
															src="images/featured.png" alt="" data-tipso="Plus Member"
															class="template-content tipso_style"></span>
													<figure class="wt-userlistingimg">
														<img src="images/user/userlisting/img-03.jpg"
															alt="image description">
													</figure>
													<div class="wt-userlistingcontent">
														<div class="wt-contenthead">
															<div class="wt-title">
																<a href="usersingle.php"><i
																		class="fa fa-check-circle"></i>Vance
																	Applebaum</a>
																<h2>Skilled Full Stack Web Developer</h2>
															</div>
															<ul class="wt-userlisting-breadcrumb">
																<li><span><i class="far fa-money-bill-alt"></i> $44.00 /
																		hr</span></li>
																<li><span><img src="images/flag/img-01.png" alt="">
																		Australia</span></li>
																<li><a href="#"
																		class="wt-clicksave"><i class="fa fa-heart"></i>
																		Save</a></li>
															</ul>
														</div>
														<div class="wt-rightarea">
															<span class="wt-starsvtwo">
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star"></i>
															</span>
															<span class="wt-starcontent">4.5/<sub>5</sub> <em>(860
																	Feedback)</em></span>
														</div>
													</div>
												</div>
												<div class="wt-userlistinghold">
													<figure class="wt-userlistingimg">
														<img src="images/user/userlisting/img-07.jpg"
															alt="image description">
													</figure>
													<div class="wt-userlistingcontent">
														<div class="wt-contenthead">
															<div class="wt-title">
																<a href="usersingle.php"><i
																		class="fa fa-check-circle"></i> Herlinda Hundley
																</a>
																<h2>Pioneers Of eCommerce Data Entry</h2>
															</div>
															<ul class="wt-userlisting-breadcrumb">
																<li><span><i class="far fa-money-bill-alt"></i> $44.00 /
																		hr</span></li>
																<li><span><img src="images/flag/img-04.png" alt="">
																		England</span></li>
																<li><a href="#"
																		class="wt-clicksave"><i class="fa fa-heart"></i>
																		Save</a></li>
															</ul>
														</div>
														<div class="wt-rightarea">
															<span class="wt-starsvtwo">
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star"></i>
															</span>
															<span class="wt-starcontent">4.5/<sub>5</sub> <em>(860
																	Feedback)</em></span>
														</div>
													</div>
												</div>
												<div class="wt-userlistinghold">
													<figure class="wt-userlistingimg">
														<img src="images/user/userlisting/img-04.jpg"
															alt="image description">
													</figure>
													<div class="wt-userlistingcontent">
														<div class="wt-contenthead">
															<div class="wt-title">
																<a href="usersingle.php"><i
																		class="fa fa-check-circle"></i> Valentine
																	Mehring</a>
																<h2>SEO Expert &amp; Consultant</h2>
															</div>
															<ul class="wt-userlisting-breadcrumb">
																<li><span><i class="far fa-money-bill-alt"></i> $44.00 /
																		hr</span></li>
																<li><span><img src="images/flag/img-03.png" alt="">
																		Canada</span></li>
																<li><a href="#"><i
																			class="fa fa-heart"></i> Click to Save</a>
																</li>
															</ul>
														</div>
														<div class="wt-rightarea">
															<span class="wt-starsvtwo">
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star"></i>
															</span>
															<span class="wt-starcontent">4.5/<sub>5</sub> <em>(860
																	Feedback)</em></span>
														</div>
													</div>
												</div>
												<div class="wt-userlistinghold">
													<figure class="wt-userlistingimg">
														<img src="images/user/userlisting/img-05.jpg"
															alt="image description">
													</figure>
													<div class="wt-userlistingcontent">
														<div class="wt-contenthead">
															<div class="wt-title">
																<a href="usersingle.php"><i
																		class="fa fa-check-circle"></i> Herlinda
																	Hundley</a>
																<h2>Pioneers Of eCommerce Data Entry</h2>
															</div>
															<ul class="wt-userlisting-breadcrumb">
																<li><span><i class="far fa-money-bill-alt"></i> $44.00 /
																		hr</span></li>
																<li><span><img src="images/flag/img-02.png" alt="">
																		United States</span></li>
																<li><a href="#"><i
																			class="fa fa-heart"></i> Click to Save</a>
																</li>
															</ul>
														</div>
														<div class="wt-rightarea">
															<span class="wt-starsvtwo">
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</span>
															<span class="wt-starcontent">4.5/<sub>5</sub> <em>(860
																	Feedback)</em></span>
														</div>
													</div>
												</div>
												<div class="wt-userlistinghold">
													<figure class="wt-userlistingimg">
														<img src="images/user/userlisting/img-06.jpg"
															alt="image description">
													</figure>
													<div class="wt-userlistingcontent">
														<div class="wt-contenthead">
															<div class="wt-title">
																<a href="usersingle.php"><i
																		class="fa fa-check-circle"></i> Valentine
																	Mehring</a>
																<h2>SEO Expert &amp; Consultant</h2>
															</div>
															<ul class="wt-userlisting-breadcrumb">
																<li><span><i class="far fa-money-bill-alt"></i> $44.00 /
																		hr</span></li>
																<li><span><img src="images/flag/img-03.png" alt="">
																		Canada</span></li>
																<li><a href="#"><i
																			class="fa fa-heart"></i> Click to Save</a>
																</li>
															</ul>
														</div>
														<div class="wt-rightarea">
															<span class="wt-starsvtwo">
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star fill"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</span>
															<span class="wt-starcontent">4.5/<sub>5</sub> <em>(860
																	Feedback)</em></span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<nav class="wt-pagination wt-savepagination">
											<ul>
												<li class="wt-prevpage"><a href="#"><i
															class="lnr lnr-chevron-left"></i></a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">...</a></li>
												<li><a href="#">50</a></li>
												<li class="wt-nextpage"><a href="#"><i
															class="lnr lnr-chevron-right"></i></a></li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
							<aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave">
								<div class="wt-proposalsr">
									<div class="wt-proposalsrcontent">
										<figure>
											<img src="images/save-1.png" alt="image">
										</figure>
										<div class="wt-title">
											<h3><?php echo $cnt; ?></h3>
											<span>Jobs you saved</span>
										</div>
									</div>
								</div>
								
								
							</aside>
						
						</div> -->
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
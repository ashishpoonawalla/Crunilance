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
?>				

				<!--Sidebar Start-->
				<!--Register Form Start-->
				<section class="wt-haslayout wt-dbsectionspace" style="min-height: 600px;">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
							<div class="wt-dashboardbox">
								<div class="wt-dashboardboxtitle">
									<h2>Manage Jobs</h2>
								</div>
								<div class="wt-dashboardboxcontent wt-jobdetailsholder">
									<div class="wt-freelancerholder">
										<div class="wt-tabscontenttitle">
											<h2>Posted Jobs</h2>
										</div>



										<?php
										require('db.php');
										
										$user = $_SESSION['username']; 

										$Query1=" Where userEmail='$user' ";
										
										$sql1 = "SELECT * FROM projects $Query1 ORDER BY product_id DESC Limit 8";
										$result1 = $conn->query($sql1);

										$cccnt = 0;
										while ($row1 = $result1->fetch_assoc()) {
											$cccnt++;
											$pid1 = $row1['product_id'];										
											$tit1 = $row1['product_title'];
											$p_level = $row1['p_level'];
											$typepost = $row1['typepost'];
											$p_duration = $row1['p_duration'];
											$budget = $row1['product_price'];
											$product_keywords = $row1['product_keywords'];
											$product_desc = $row1['product_desc'];
											$country = $row1['country'];
											$status1 = $row1['status1'];
											$psid = $row1['psid'];								  
												
											
											$countryName="";
											$sql11 = "SELECT * FROM countries Where c_code ='$country'";
											$result11 = $conn->query($sql11);
											if ($row11 = $result11->fetch_assoc()) {
												$countryName =  $row11['country_name'];
											}

											$cnt_proposals = 0;
											$sql11 = "SELECT * FROM project_user Where product_id =$pid1";
											$result11 = $conn->query($sql11);
											while ($row11 = $result11->fetch_assoc()) {
												$cnt_proposals++;
											}
										?>




										<div class="wt-managejobcontent wt-verticalscrollbar">
											<div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
												<span class="wt-featuredtag">
													<!-- <img src="images/featured.png" alt="" data-tipso="Plus Member" class="template-content tipso_style"> -->
													</span>
												<div class="wt-userlistingcontent">
													<div class="wt-contenthead">
														<div class="wt-title">
															<!-- <a href="usersingle.php"><i class="fa fa-check-circle"></i>
																Louanne Mattioli
															</a> -->
															<h2><?php echo $tit1; ?></h2>
														</div>
														<ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
															<li><span class="wt-dashboraddoller">
																<i class="fa fa-dollar-sign"></i>
																<?php echo $budget; ?> <?php echo $typepost; ?></span></li>
															
															<li><a href="#"
																	class="wt-clicksavefolder">
																	<i class="far fa-folder"></i> <?php echo $p_level; ?></a>
															</li>
															<li><span class="wt-dashboradclock">
																	<i class="far fa-clock"></i> <?php echo $p_duration; ?></span></li>

															<li><span class="wt-dashboradclock">
																	<i class="far fa-file-alt"></i> Proposal: <?php echo $cnt_proposals; ?></span></li>
															
															<?php 		if ($psid != "1"){ 			?>
															<li><span class="wt-dashboradclock">
																	<i class="lnr lnr-checkmark-circle"></i> Awarded</span></li>
															<?php } ?>
														</ul>
													
													</div>
													<div class="wt-rightarea">
														<div class="wt-btnarea">
															<a href="dashboard-ongoingsingle.php?pid=<?php echo $pid1; ?>" class="wt-btn">VIEW DETAILS</a>
														</div>
														<div class="wt-hireduserstatus">
															<h4><?php echo $cnt_proposals; ?></h4><span>Proposals</span>
															<!-- <ul class="wt-hireduserimgs">
																<li>
																	<figure><img
																			src="images/user/userlisting/img-05.jpg"
																			alt=""></figure>
																</li>
															</ul> -->
														</div>
													</div>
												</div>
											</div>
											
										</div>


										<?php } ?>



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
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
							<?php include('dashboard-employerside.php'); ?>
							<!-- <div class="wt-companyad">
								<figure class="wt-companyadimg"><img src="images/add-img.jpg" alt=""></figure>
								<span>Advertisement 255px X 255px</span>
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
include ('footer_mobile.php');
?>


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
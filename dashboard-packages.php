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
				<section class="wt-haslayout wt-dbsectionspace">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-1 float-left">
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 float-left">
							<div class="wt-dashboardbox">
								<div class="wt-dashboardboxtitle">
									<h2>Packages</h2>
								</div>
								<div class="wt-dashboardboxcontent wt-packages">
									<div class="wt-package wt-packagedetails">
									<div class="wt-packagehead">
											<h3>Free Plan</h3>
											<span>40 Bid </span>
										</div>
										<div class="wt-packagecontent">
											<ul class="wt-packageinfo">
												<li class="wt-packageprices"><span>Price</span></li>
												<li><span>No. Of Bid To Post</span></li>
												<li><span>Membership Badges</span></li>
												<li><span>Package Duration</span></li>
												<li><span>Freelancer Search</span></li>
												<li><span>Prefered Freelancer</span></li>
												<li><span>Free 07 Days Extension</span></li>
											</ul>
										</div>
									</div>
									<div class="wt-package wt-baiscpackage">
										<div class="wt-packagehead">
											<h3>Baisc Plan</h3>
											<span>Starter Plan For Newbie</span>
										</div>
										<div class="wt-packagecontent">
											<ul class="wt-packageinfo">
												<li class="wt-packageprice"><span><sup>$</sup>10<sub>\
															Month</sub></span></li>
												<li><span>100</span></li>
												<li><span><i class="ti-na"></i></span></li>
												<li><span>30 Days</span></li>
												<li><span><i class="ti-check"></i></span></li>
												<li><span><i class="ti-na"></i></span></li>
												<li><span><i class="ti-na"></i></span></li>
											</ul>
											<a class="wt-btn" href="dashboard-membership.php?var=1"><span>Buy Now</span></a>
										</div>
									</div>
									<div class="wt-package wt-standardpackage">
										<div class="wt-packagehead">
											<span class="wt-featuredtag"><i class="fa fa-star"></i></span>
											<h3>Standard</h3>
											<span>Populor Plan For Growth</span>
											<!-- <em>24 Days Left</em> -->
										</div>
										<div class="wt-packagecontent">
											<ul class="wt-packageinfo">
												<li class="wt-packageprice"><span><sup>$</sup>20<sub>\
															Month</sub></span></li>
												<li><span>200</span></li>
												<li><span><i class="ti-check"></i></span></li>
												<li><span>30 Days</span></li>
												<li><span><i class="ti-check"></i></span></li>
												<li><span><i class="ti-na"></i></span></li>
												<li><span><i class="ti-na"></i></span></li>
											</ul>
											<a class="wt-btn" href="dashboard-membership.php?var=2"><span>Buy Now</span></a>
										</div>
									</div>
									<div class="wt-package wt-extendedpackage">
										<div class="wt-packagehead">
											<h3>Professional</h3>
											<span>Professional Plan For Managerial</span>
										</div>
										<div class="wt-packagecontent">
											<ul class="wt-packageinfo">
												<li class="wt-packageprice"><span><sup>$</sup>50<sub>\
															Month</sub></span></li>
												<li><span>500</span></li>
												<li><span><i class="ti-check"></i></span></li>
												<li><span>30 Days</span></li>
												<li><span><i class="ti-check"></i></span></li>
												<li><span><i class="ti-check"></i></span></li>
												<li><span><i class="ti-check"></i></span></li>
											</ul>
											<a class="wt-btn" href="dashboard-membership.php?var=1"><span>Buy Now</span></a>
										</div>
									</div>
								</div>
							</div>
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
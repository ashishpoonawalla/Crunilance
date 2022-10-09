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
				<!-- Alert Boxes Start -->
				<div class="wt-haslayout wt-jobalertsdashboard">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
							<div class="wt-jobalerts">
								<div class="alert alert-warning alert-dismissible fade show">
									<em>Alert:</em> <span> You’ve consumed all you points to apply new job,</span>
									<a href="javascript:void(0)" class="wt-alertbtn warning">Buy Now</a>
									<a href="javascript:void(0)" class="close" data-dismiss="alert"
										aria-label="Close"><i class="fa fa-close"></i></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
							<div class="wt-jobalerts">
								<div class="alert alert-primary alert-dismissible fade show">
									<em>info: </em> <span> You’ve no skills of “PHP” but still you can apply for this
										job.</span>
									<a href="javascript:void(0)" class="wt-alertbtn primary">View</a>
									<a href="javascript:void(0)" class="close" data-dismiss="alert"
										aria-label="Close"><i class="fa fa-close"></i></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
							<div class="wt-jobalerts">
								<div class="alert alert-success alert-dismissible fade show">
									<em>Congratulation!</em> <span> we've received payment against your selected package
										Congratulation!: “Extended Plan” and its valid till “Jun 27, 2019”</span>
									<a href="javascript:void(0)" class="wt-alertbtn success">Got It</a>
									<a href="javascript:void(0)" class="close" data-dismiss="alert"
										aria-label="Close"><i class="fa fa-close"></i></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
							<div class="wt-jobalerts">
								<div class="alert alert-danger alert-dismissible fade show">
									<em>You’re Late:</em> <span> We’re sorry but the job you want to apply is no longer
										available You’re Late: for public/freelancers anymore.</span>
									<a href="javascript:void(0)" class="wt-alertbtn danger">Got It</a>
									<a href="javascript:void(0)" class="close" data-dismiss="alert"
										aria-label="Close"><i class="fa fa-close"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Alert Boxes End -->
				<!--Register Form Start-->
				<section class="wt-haslayout wt-jobpostedholder">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
							<div class="wt-haslayout wt-dbsectionspace">
								<div class="wt-dashboardbox">
									<div class="wt-dashboardboxtitle wt-yeartag">
										<h2>Job Posted</h2>
										<div class="wt-tag wt-widgettag">
											<a href="#">2019</a>
											<a href="#">2018</a>
											<a href="#">2017</a>
										</div>
									</div>
									<div class="wt-dashboardboxcontent">
										<div id="wt-postedsilder" class="wt-postedsilder owl-carousel">
											<div class="item">
												<div class="wt-posteditem">
													<span><i class="fa fa-check-circle"></i><a
															href="#"> Louanne Mattioli</a></span>
													<h3>I want some customization</h3>
												</div>
											</div>
											<div class="item">
												<div class="wt-posteditem">
													<span><i class="fa fa-check-circle"></i><a
															href="#"> Louanne Mattioli</a></span>
													<h3>I want some customization</h3>
												</div>
											</div>
											<div class="item">
												<div class="wt-posteditem">
													<span><i class="fa fa-check-circle"></i> Louanne Mattioli</span>
													<h3>Website changes in HTML</h3>
												</div>
											</div>
										</div>
										<div class="wt-jobchartholder">
											<canvas id="wt-jobchart" class="wt-jobchart"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="wt-haslayout wt-dbsectionspace">
								<div class="wt-dashboardbox">
									<div class="wt-dashboardboxtitle">
										<h2>Current Hired Freelancers</h2>
									</div>
									<div class="wt-dashboardboxcontent wt-hiredfreelance">
										<div class="wt-userlistinghold wt-featured">
											<span class="wt-featuredtag"><img src="images/featured.png" alt=""
													data-tipso="Plus Member" class="template-content"></span>
											<figure class="wt-userlistingimg">
												<img src="images/user/userlisting/img-01.jpg" alt="image description"
													class="img description">
											</figure>
											<div class="wt-proposaldetails">
												<div class="wt-contenthead">
													<div class="wt-title">
														<h3><a href="#">Terrence
																Tynan</a><span>Project Title Goes Here</span></h3>
														<a href="javascript:void(0)" class="wt-hiredarrow"><i
																class="lnr lnr-chevron-right"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="wt-userlistinghold wt-featured">
											<figure class="wt-userlistingimg">
												<img src="images/user/userlisting/img-02.jpg" alt="image description"
													class="img description">
											</figure>
											<div class="wt-proposaldetails">
												<div class="wt-contenthead">
													<div class="wt-title">
														<h3><a href="javascript:void(0)">Aileen
																Remington</a><span>Project Title Goes Here</span></h3>
														<a href="javascript:void(0)" class="wt-hiredarrow"><i
																class="lnr lnr-chevron-right"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="wt-userlistinghold wt-featured">
											<figure class="wt-userlistingimg">
												<img src="images/user/userlisting/img-03.jpg" alt="image description"
													class="img description">
											</figure>
											<div class="wt-proposaldetails">
												<div class="wt-contenthead">
													<div class="wt-title">
														<h3><a href="javascript:void(0)">Freddie Lisi</a><span>Project
																Title Goes Here</span></h3>
														<a href="javascript:void(0)" class="wt-hiredarrow"><i
																class="lnr lnr-chevron-right"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="wt-userlistinghold wt-featured">
											<figure class="wt-userlistingimg">
												<img src="images/user/userlisting/img-07.jpg" alt="image description"
													class="img description">
											</figure>
											<div class="wt-proposaldetails">
												<div class="wt-contenthead">
													<div class="wt-title">
														<h3> <a href="javascript:void(0)">Golden
																Fellman</a><span>Project Title Goes Here</span></h3>
														<a href="javascript:void(0)" class="wt-hiredarrow"><i
																class="lnr lnr-chevron-right"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave wt-dbsectionspace">
								<div class="wt-proposalsr wt-box-shadow">
									<div class="wt-proposalsrcontent">
										<figure>
											<img src="images/thumbnail/img-17.png" alt="image">
										</figure>
										<div class="wt-title">
											<h3>150</h3>
											<span>Total Ongoing Jobs</span>
										</div>
									</div>
								</div>
								<div class="wt-proposalsr wt-box-shadow">
									<div class="wt-proposalsrcontent wt-componyfolow">
										<figure>
											<img src="images/thumbnail/img-16.png" alt="image">
										</figure>
										<div class="wt-title">
											<h3>1406</h3>
											<span>Total Completed Jobs</span>
										</div>
									</div>
								</div>
								<div class="wt-proposalsr wt-box-shadow">
									<div class="wt-proposalsrcontent  wt-freelancelike">
										<figure>
											<img src="images/thumbnail/img-15.png" alt="image">
										</figure>
										<div class="wt-title">
											<h3>2075</h3>
											<span>Total Cancelled Jobs</span>
										</div>
									</div>
								</div>
								<div class="wt-proposalsr wt-box-shadow">
									<div class="wt-proposalsrcontent wt-repostjob">
										<figure>
											<img src="images/thumbnail/img-18.png" alt="image">
										</figure>
										<div class="wt-title">
											<h3>334</h3>
											<span>Total Repost Jobs</span>
										</div>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</section>
				<!--Register Form End-->
				<!--More Details Start-->
				<section class="wt-haslayout wt-dbsectionspace wt-padding-add-top wt-moredetailsholder">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="wt-insightsitem wt-dashboardbox wt-insightnoticon">
								<figure class="wt-userlistingimg">
									<img src="images/thumbnail/img-19.png" alt="image description"
										class="mCS_img_loaded">
								</figure>
								<div class="wt-insightdetails">
									<div class="wt-title">
										<h3>New Messages</h3>
										<a href="javascript:void(0)">Click To View</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="wt-insightsitem wt-dashboardbox">
								<figure class="wt-userlistingimg">
									<img src="images/thumbnail/img-20.png" alt="image description"
										class="mCS_img_loaded">
								</figure>
								<div class="wt-insightdetails">
									<div class="wt-title">
										<h3>Latest Proposals</h3>
										<a href="javascript:void(0)">Click To View</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="wt-insightsitem wt-dashboardbox">
								<span class="wt-pakagespinner"><i class="fa fa-spinner wt-uploading"></i> D29 : H06 :
									M38 : S42</span>
								<figure class="wt-userlistingimg">
									<img src="images/thumbnail/img-21.png" alt="image description"
										class="mCS_img_loaded">
								</figure>
								<div class="wt-insightdetails">
									<div class="wt-title">
										<h3>Check Package Expiry</h3>
										<a href="javascript:void(0)">Click To View</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="wt-insightsitem wt-dashboardbox">
								<figure class="wt-userlistingimg">
									<img src="images/thumbnail/img-22.png" alt="image description"
										class="mCS_img_loaded">
								</figure>
								<div class="wt-insightdetails">
									<div class="wt-title">
										<h3>View Saved Items</h3>
										<a href="javascript:void(0)">Click To View</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--More Details End-->
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
	<script src="js/chart.js"></script>
	<script src="js/jRate.js"></script>
	<script src="js/main.js"></script>
	<script>
		const menu_icon = document.querySelector('.menu-icon');
		function addClassFunThree()
		{
			this.classList.toggle("click-menu-icon");
		}
		menu_icon.addEventListener('click', addClassFunThree);
		var ctx = document.getElementById("wt-jobchart");
		var wt_jobchart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Week 01", "Week 02", "Week 03", "Week 04"],
				datasets: [{
					label: 'Jobs Summary',
					data: [6, 8, 4, 7, 10],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
							fontSize: 12,
							fontColor: '#767676'
						}
					}]
				},
				legend: {
					labels: {
						fontSize: 14,
						fontColor: '#767676',
						FontFamily: 'Open Sans',

					}
				}
			}
		});
	</script>
</body>

</html>
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
	<link rel="stylesheet" href="css/basictable.css">
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
				<section class="wt-haslayout wt-dbsectionspace wt-insightuser" style="min-height: 600px;">
					<div class="row">

						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-1">
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">
							<!-- <div class="wt-dashboardbox">
								<div class="wt-dashboardboxtitle wt-yeartag">
									<h2>Total Earnings</h2>
									<div class="wt-tag wt-widgettag">
										<a href="#">2019</a>
										<a href="#">2018</a>
										<a href="#">2017</a>
									</div>
								</div>
								<div class="wt-dashboardboxcontent">
									<div class="wt-jobchartholder">
										<canvas id="wt-jobchart" class="wt-jobchart"></canvas>
									</div>
								</div>
							</div> -->


							<div class="wt-dashboardbox " style="min-height: 250px; margin-bottom: 20px;">
								<div class="wt-dashboardboxtitle">
									<h2>All Contracts</h2>
								</div>
								
								<div class="wt-dashboardboxcontent wt-hiredfreelance" >

								<?php 
										require('db.php');
										$user = $_SESSION['username']; 
										$cnt = 0;
										$sql1="SELECT * FROM projects WHERE tusername='$user' " ;
										$result1 = $conn->query($sql1);
										
										while($row1 = $result1->fetch_assoc()){
											$pid = $row1['product_id'];
											$cnt++;


											$sql="SELECT * FROM projects WHERE product_id=$pid " ;
											$result = $conn->query($sql);
											
											while($row = $result->fetch_assoc()){
																						
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
								
										<a href="fr-jobprogress.php?pid=<?php echo $pid; ?>">
									<div class="wt-userlistinghold wt-featured" style="margin-bottom: 10px;">
										<span class="wt-smallfeaturedtag">
											<!-- <img src="images/featured.png"
												alt="" data-tipso="Plus Member"
												class="template-content tipso_style mCS_img_loaded"> -->
											</span>
										<div class="wt-proposaldetails">
											<div class="wt-contenthead">
												<div class="wt-title">
													<h3 style="margin-bottom:5px;"><?php echo $tit1; ?></h3>
														
													<ul
																	class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
																	<li><span class="wt-dashboraddoller"><i
																			class="fa fa-dollar-sign"></i>
																			<?php echo $budget; ?></li>
																	<li><span><?php echo $typepost; ?></li>
																	<li><span><img alt="" style="width: 16px;" src="images/flags/<?php echo $country; ?>.png" alt="">
																			<?php echo $countryName; ?></li>
																	<!-- <li><a href="#"
																			class="wt-clicksavefolder"><i class="far fa-folder"></i> <?php echo $p_level; ?></a></li> -->

																	<li><span class="wt-dashboradclock"><i class="far fa-clock"></i> <?php echo $p_duration; ?></span></li>
																	<li><span class="wt-dashboradclock" style="color: orange;"><i class="far fa-check"></i> <?php echo $status1; ?></span></li>
																	
																</ul>
													
													
													<!-- <span>Louanne Mattioli</span></h3>
													<a href="javascript:void(0)" class="wt-hiredarrow"><i
															class="lnr lnr-chevron-right"></i></a> -->
												</div>
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


							<!-- <div class="wt-dashboardbox wt-earningsholder">
								<div class="wt-dashboardboxtitle wt-titlewithsearch">
									<h2>Past Earnings</h2>
									<form class="wt-formtheme wt-formsearch">
										<fieldset>
											<div class="form-group">
												<input type="text" name="Search" class="form-control"
													placeholder="Search Here">
												<a href="#" class="wt-searchgbtn"><i
														class="lnr lnr-magnifier"></i></a>
											</div>
										</fieldset>
									</form>
								</div>
								<div class="wt-dashboardboxcontent">
									<table class="wt-tablecategories">
										<thead>
											<tr>
												<th>Project Title</th>
												<th>Date</th>
												<th>Earnings</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>I want some customization and installation on wordpress</td>
												<td>February 3, 2019</td>
												<td>$19.00</td>
											</tr>
											<tr>
												<td>Develop a transportation company website</td>
												<td>January 12, 2019</td>
												<td>$350.00</td>
											</tr>
											<tr>
												<td>Change temp to Arabic and install on wordpress</td>
												<td>December 16, 2018</td>
												<td>$120.00</td>
											</tr>
											<tr>
												<td>I want some customization and installation on wordpress</td>
												<td>November 18, 2018</td>
												<td>$60.00</td>
											</tr>
											<tr>
												<td>Website changes in HTML &amp; PHP</td>
												<td>October 24, 2018</td>
												<td>$50.00</td>
											</tr>
											<tr>
												<td>I want some customization and installation on wordpress</td>
												<td>October 21, 2018</td>
												<td>$240.00</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div> -->

							
						</div>


						<!-- <div class="ccol-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
							<div class="row">
								<div class="wt-insightsitemholder">
									<div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left" >
									
										<div class="wt-insightsitem wt-dashboardbox ">
											<a href="dashboard-messages.php">
												<figure class="wt-userlistingimg">
													<img src="images/thumbnail/img-19.png" alt="image description"
														class="mCS_img_loaded">
												</figure>
												<div class="wt-insightdetails">
													<div class="wt-title">
														<h3>Messages</h3>
														
													</div>
												</div>
											</a>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left">
										<div class="wt-insightsitem wt-dashboardbox">
											<a href="dashboard-packages.php">
												
												<figure class="wt-userlistingimg">
													<img src="images/thumbnail/img-21.png" alt="image description"
														class="mCS_img_loaded">
												</figure>
												<div class="wt-insightdetails">
													<div class="wt-title">
														<h3>Membership</h3>
											
													</div>
												</div>
											</a>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left">
										<div class="wt-insightsitem wt-dashboardbox">
											<a href="dashboard-freelancer-bids.php">
												<figure class="wt-userlistingimg">
													<img src="images/thumbnail/img-20.png" alt="image description"
														class="mCS_img_loaded">
												</figure>
												<div class="wt-insightdetails">
													<div class="wt-title">
														<h3>Latest bids</h3>
									
													</div>
												</div>
											</a>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left" >
										<div class="wt-insightsitem wt-dashboardbox">
											<a href="dashboard-saveitems.php">
												<figure class="wt-userlistingimg">
													<img src="images/thumbnail/img-22.png" alt="image description"
														class="mCS_img_loaded">
												</figure>
												<div class="wt-insightdetails">
													<div class="wt-title">
														<h3>Saved Jobs</h3>
												
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
								<div class="wt-insightsongoing">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left" style="margin-bottom: 20px;">
										
									</div>
								</div>
								
							</div>
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
	<script src="js/jquery.basictable.min.js"></script>
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
				labels: ["January", "February", "March", "April"],
				datasets: [{
					label: 'Total Earnings',
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
		menu_icon.addEventListener('click', addClassFunThree);
		$('.wt-tablecategories').basictable({
			breakpoint: 720,
		});
	</script>
</body>


</html>
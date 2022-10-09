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
						<div class="ccol-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="row">
								<div class="wt-insightsitemholder">
									<div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left" >
									
										<div class="wt-dashboardbox " style="min-height: 262px; margin-bottom: 20px;">
										
										
											<div class="wt-dashboardboxcontent">
												<table class="wt-tablecategories">
													<thead>
														<tr>
															
															<th>My Employer escrew</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														

									<?php
								
									//------------------ My Employer escrew -----------------------															
								
									//session_start();				
									                         
									$unm2 = $email = $_SESSION["username"];      
															
									require('db.php');

									$msg="";
									
									$sql1="SELECT * FROM transactions WHERE username='$unm2' AND usertype='Emp' LIMIT 5" ;
									
									$result1 = $conn->query($sql1);
				
			 						while($row1 = $result1->fetch_assoc())
									{
										$tid1=$row1['tid'];
										$amt1=$row1['amount'];
										$det1=$row1['details'];
										$dt1 =$row1['date'];
										$drcr =$row1['DRCR'];
										$dt2 = date("M-d", strtotime($dt1) );

										?>

														<tr>
														
															<td><?php echo $dt2; ?> | <?php echo $det1; ?></td>
															<td>$<?php echo $amt1; ?></td>
														</tr>
													
									<?php } ?>				
													</tbody>
												</table>
											</div>
										</div>

									</div>
									<div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left">
										<div class="wt-dashboardbox " style="min-height: 262px; margin-bottom: 20px;">
											
											
											<div class="wt-dashboardboxcontent">
												<table class="wt-tablecategories">
													<thead>
														<tr>
															
															<th>My freelancer escrew</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
													<?php
								
								//------------------ My Employer escrew -----------------------															
							
								//session_start();				
														 
								$unm2 = $email = $_SESSION["username"];      
														
								require('db.php');

								$msg="";
								
								$sql1="SELECT * FROM transactions WHERE username='$unm2' AND usertype='Free' LIMIT 5" ;
								
								$result1 = $conn->query($sql1);
			
								 while($row1 = $result1->fetch_assoc())
								{
									$tid1=$row1['tid'];
									$amt1=$row1['amount'];
									$det1=$row1['details'];
									$dt1 =$row1['date'];
									$drcr =$row1['DRCR'];
									$dt2 = date("M-d", strtotime($dt1) );

									?>

													<tr>
													
														<td><?php echo $dt2; ?> | <?php echo $det1; ?></td>
														<td>$<?php echo $amt1; ?></td>
													</tr>
												
								<?php } ?>	
													
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									<div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
										<div class="wt-dashboardbox " style="min-height: 200px; margin-bottom: 20px;">
											
											
											<div class="wt-dashboardboxcontent">
												<table class="wt-tablecategories">
													<thead>
														<tr>
															
															<th>Currency</th>
															<th>Available</th>
															<th>Available for Withdrawl</th>
														</tr>
													</thead>
													<tbody>
														
													<?php
								
														//------------------ My Employer escrew -----------------------															
													
														//session_start();				
																				
														$unm2 = $email = $_SESSION["username"];      
																				
														require('db.php');

														$msg="";
														
														$sql1="SELECT * FROM transactions WHERE username='$unm2' " ;
														
														$result1 = $conn->query($sql1);
														$ttt = 0;
														while($row1 = $result1->fetch_assoc())
														{
															$tid1=$row1['tid'];
															$amt1=$row1['amount'];
															$det1=$row1['details'];
															$dt1 =$row1['date'];
															$drcr =$row1['DRCR'];
															$dt2 = date("M-d", strtotime($dt1) );

															if ($drcr == "CR")
																$ttt = $ttt + $amt1;
															else
																$ttt = $ttt - $amt1;
														} ?>	
																		
													
													
														<tr>
															
															<td>US Doller</td>
															<td>$<?php echo $ttt; ?></td>
															<td>$<?php echo $ttt; ?></td>
														</tr>
														
													
														
													</tbody>
												</table>
												<!-- <a href="dashboard-ongoingprogress-rele.php?id=<?php echo $id; ?>&pid=<?php echo $pid; ?>&psid=<?php echo $psid; ?>&mamt=<?php echo $mamount; ?>" class="wt-btn " style="width: 300px;" 
													onclick="return confirm('Are you sure to send admin withdrawl fund request for $ <?php echo $ttt; ?> ?');"
													>Withdrawl Now</a> -->

													<a href="#" class="wt-btn " style="width: 300px;" 
													onclick="return confirm('Are you sure to send admin withdrawl fund request for $ <?php echo $ttt; ?> ?');"
													>Withdrawl Now</a>
											</div>
										</div>
									</div>
									
								
								</div>
								<div class="wt-insightsongoing">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left" style="margin-bottom: 20px;">
										
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
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
									<h2>Membership</h2>
								</div>
								
								
								<div class="wt-dashboardboxcontent">
									<table class="wt-tablecategories">
										<thead>
											<tr>
												
												<th>Details</th>
												<th>Qnty</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												
												<td>Bids</td>
												<td><?php echo $_SESSION["bidcount"]; ?></td>
											</tr>
											
											<tr>
											
												<td>Membership</td>
												<td><?php echo $_SESSION["membership"]; ?></td>
											</tr>
											<tr>
												
												
												<td>Expiry</td>
												<td><?php 
												try{
													echo $_SESSION["membershipend"]; 
												}
												catch(Exception $e) {
													echo "";
												}
												
												?></td>
											</tr>
											
										</tbody>
									</table>
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
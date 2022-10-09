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
	<link rel="stylesheet" href="css/basictable.css">
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
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-1 ">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 float-right">
							<div class="wt-dashboardbox wt-dashboardinvocies">
								<div class="wt-dashboardboxtitle wt-titlewithsearch">
									<h2>Latest Bids</h2>
									<!-- <form class="wt-formtheme wt-formsearch">
										<fieldset>
											<div class="form-group">
												<input type="text" name="Search" class="form-control"
													placeholder="Search Here">
												<a href="#" class="wt-searchgbtn"><i
														class="lnr lnr-magnifier"></i></a>
											</div>
										</fieldset>
									</form> -->
								</div>
								<div class="wt-dashboardboxcontent wt-categoriescontentholder wt-categoriesholder" style="padding-left: 15px; padding-bottom: 20px; ">
									<table class="wt-tablecategories">
										<thead>
											<tr>
												
												<th>Project & Type</th>												
												<th>Duration & Budget</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>


											<?php 
												require('db.php');
												$user = $_SESSION['username']; 
												
												$sql1="SELECT * FROM project_user WHERE useremail='$user' ORDER BY PSID DESC" ;
												$result1 = $conn->query($sql1);
												
												while($row1 = $result1->fetch_assoc()){
													$pid = $row1['product_id'];
													$amount = $row1['amount'];
													$duration = $row1['duration'];
													$coverletter = $row1['coverletter'];

												
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

														if ($status1 == "Posted" || $status1 == "Pending")
														{
											?>

												<tr>
													
													<td><?php echo $tit1; ?><br><?php echo $typepost; ?></td>
													
													<td><?php echo $p_duration; ?><br>
													$ <?php echo $budget; ?></td>
													<td>
														<div class="wt-actionbtn">
															<a href="fr-ongoingjob.php?pid=<?php echo $pid; ?>"	class="wt-addinfo wt-skillsaddinfo">view</a>
															<!-- <a href="#" class="wt-deleteinfo">Print</a> -->
														</div>
													</td>
												</tr>


											<?php		}
													}
												}
											?>


											
										
											
										</tbody>
									</table>
									<!-- <nav class="wt-pagination">
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
						</div>
						<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 float-left">
							<div class="wt-dashboardboxcontent wt-offersidebar wt-dashboardbox-margin">
								<figure><img src="images/save-img-01.jpg" alt=""></figure>
								<div class="wt-offercontent">
									<h2>Save Big, Do Big</h2>
									<p>Consectetur adipisicing elitems sed dotem eiusmod tempor incune utnaem labore
										etdolore maigna aliqua enim.</p>
									<a href="#" class="wt-btn">Renew Now</a>
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
	<script
		src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="js/jquery.basictable.min.js"></script>
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
		$('.wt-tablecategories').basictable({
			breakpoint: 767,
		});
	</script>
</body>


</html>
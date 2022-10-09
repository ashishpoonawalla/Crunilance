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
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-2 float-left">
                    </div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 float-left">
							
						
							<?php
							if (isset($_REQUEST['msg'])){
								
								$msg = $_REQUEST['msg'];

								if ($msg != ""){
									?>
											<div class="wt-jobalertsholder">
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
						
						
							<div class="wt-dashboardbox">
								<div class="wt-dashboardboxtitle">
									<h2>Post a Job</h2>
								</div>
								<div class="wt-dashboardboxcontent">

									<form method="POST" action="job_post_code.php" class="wt-formtheme wt-userform wt-userformvtwo">

											<div class="wt-jobdescription wt-tabsinfo">


												<div class="wt-tabscontenttitle">
													<h2>Job Details</h2>
												</div>


												
													<fieldset>
														<div class="form-group">
															<input type="text" name="title" class="form-control" required style="color: #000;"
																placeholder="Job Title">
															<!-- <input type="text" name="title" class="form-control" required minlength="20" maxlength="200"
																placeholder="Job Title"> -->
														</div>
														<div class="form-group form-group-half wt-formwithlabel">
															<span class="wt-select">
																<label for="selectoption">Service Level:</label>
																<select name="p_level" >
																	<option value="Entry">Entry</option>
																	<option value="Intermediate">Intermediate</option>
																	<option value="Expert">Expert</option>
																</select>
															</span>
														</div>
														<div class="form-group form-group-half wt-formwithlabel">
															<span class="wt-select">
																<label for="selectoption">Job Type:</label>
																<select name="typepost" >
																	<option value="Fixed">Fixed</option>
																	<option value="Hourly">Hourly</option>
																</select>
															</span>
														</div>
														<div class="form-group form-group-half wt-formwithlabel">
															<span class="wt-select">
																<label for="selectoption">Job Duration:</label>
																<select name="p_duration" >
																	<option value="Less than 1 Week">Less than 1 Week</option>
																	<option value="1 week to 3 weeks">1 week to 3 weeks</option>
																	<option value="1 month to 3 months">1 month to 3 months</option>
																	<option value="3 months to 6 months">3 months to 6 months</option>
																	<option value="more than 6 months">more than 6 months</option>
																</select>
															</span>
														</div>
														<div class="form-group form-group-half wt-formwithlabel">
															<span class="">
																
																<input type="number" name="budget" class="form-control" required min="1" style="color: #000;"
																		
																	placeholder="Budget ($)">
																
															</span>
														</div>
													</fieldset>
												


											</div>

											<div class="wt-jobdetails wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Job Skills & Description & </h2>
												</div>
												<div class="form-group">
													<fieldset >
														<div class="form-group">
															<!-- <select class="chosen-select Skills" data-placeholder="Skills" required
																name="keywords" multiple> -->
															<select class="chosen-select Skills" data-placeholder="Skills" required 
																name="keywords[]" multiple>

																<?php
																	require('db.php');
																
																	
																	$sql111 = "SELECT * FROM skills ";
																	$result111 = $conn->query($sql111);
																	
																	while ($row111 = $result111->fetch_assoc()) {
																		
																		$skill =  $row111['skill'];
																		
																	
																?>

																	<option value="<?php echo $skill; ?>"><?php echo $skill; ?></option>
																
																<?php } ?>
																
															</select>
														</div>
														<div class="form-group">
															<textarea name="desc" class="form-control" style="margin-top: 10px;margin-bottom: 10px; color: #000;" required minlength="50" maxlength="1000" 
															placeholder="Description"></textarea>
														</div>
													</fieldset>
												</div>
											</div>


											
											

										</div>
										</div>
										<div class="wt-updatall">
											<i class="ti-announcement"></i>
											<span>Post job by just clicking -></span>
											<input type="submit" style=" text-transform: none; border: 0px; " class="wt-btn" value="Post Job Now">
																
											<!-- <a class="wt-btn" href="#">Post Job Now</a> -->
										</div>

									</form>
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
	<script src="js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci"></script>
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
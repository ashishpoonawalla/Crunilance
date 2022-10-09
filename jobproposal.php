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

			<!--Inner Home Banner Start-->
			<!-- <div class="wt-haslayout wt-innerbannerholder">
				<div class="container">
					<div class="row justify-content-md-center">
						<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
							<div class="wt-innerbannercontent">
								<div class="wt-title">
									<h2>Job Proposal</h2>
								</div>
								<ol class="wt-breadcrumb">
									<li><a href="index-2.php">Home</a></li>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Job Detail</a></li>
									<li class="wt-active">Job Proposal</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!--Inner Home End-->
			<!--Main Start-->

			<?php
			
			$pid = $_REQUEST['pid'];

				require('db.php');
				$Query1="";
				$sql1 = "SELECT * FROM projects where product_id =$pid";
				$result1 = $conn->query($sql1);

				
				if ($row1 = $result1->fetch_assoc()) {					
													
					$tit1 = $row1['product_title'];
					$p_level = $row1['p_level'];
					$typepost = $row1['typepost'];
					$p_duration = $row1['p_duration'];
					$budget = $row1['product_price'];
					$product_keywords = $row1['product_keywords'];
					$product_desc = $row1['product_desc'];
					$country = $row1['country'];
					$status1 = $row1['status1'];								  
					
					
					$countryName="";
					
					$sql11 = "SELECT * FROM countries Where c_code ='$country'";
					$result11 = $conn->query($sql11);
					if ($row11 = $result11->fetch_assoc()) {
						$countryName =  $row11['country_name'];
					}
				}
			?>


			<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
				<div class="wt-haslayout wt-main-section" style="margin-top: -30px;">
					<!-- User Listing Start-->
					<div class="container">
						<div class="row justify-content-md-center">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
								
							
							<?php
								if (isset($_REQUEST['msg'])){
									
									$msg = $_REQUEST['msg'];

									if ($msg != ""){
										?>
												<div class="wt-jobalertsholder" style="margin-top: 20px; margin-bottom: 500px;">
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
								} else {
							?>

							
								<div class="wt-proposalholder">
									<span class="wt-featuredtag">
										<!-- <img src="images/featured.png" alt=""
											data-tipso="Plus Member" class="template-content tipso_style"> -->
										</span>
									<div class="wt-proposalhead">
										<h2><?php echo $tit1; ?></h2>
										<ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
											<li><span><i class="fa fa-dollar-sign"></i><?php echo $budget; ?> &nbsp;&nbsp;<?php echo $typepost; ?></span></li>
											<li><span><img style="width: 22px;" src="images/flags/<?php echo $country; ?>.png" alt=""> <?php echo $countryName; ?></span>
											</li>
											<li><span><i class="far fa-folder"></i> <?php echo $p_level; ?> </span></li>
											<li><span><i class="far fa-clock"></i> Duration: <?php echo $p_duration; ?></span></li>
										</ul>
									</div>
								</div>

								
								<div class="wt-proposalamount-holder">
									<div class="wt-title">
										<h2>Your Proposal</h2>
									</div>
									
									<form method="POST" action="jobproposal_code.php" class="wt-formtheme wt-formproposal" style="padding: 0px; margin-top: -20px;">
										
										<fieldset>
										<input type="hidden" name="pid" value="<?php echo $pid; ?>" >
										<div class="wt-proposalamount accordion">
										<div class="form-group">
											<span>( <i class="far fa-clock"></i> )</span>
											<input type="number" name="duration" style="width: 100%;" min="1" required
												placeholder="I Can Finish This Project In .. Day">

											<!-- <a href="#" class="collapsed" id="headingOne"
												data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
												aria-controls="collapseOne"><i class="lnr lnr-chevron-up"></i></a> -->
											<em>Total amount the client will see on your proposal</em><br>
										</div>

										<div class="form-group" style="margin-bottom: 30px;">
											<span>( <i class="fa fa-dollar-sign"></i> )</span>
											<input type="number" name="amount" style="width: 100%;" min="1" required
												placeholder="Enter Your Proposal Amount">
										</div>
										<!-- <ul class="wt-totalamount collapse show" id="collapseOne"
											aria-labelledby="headingOne">
											<li>
												<h3>( <i class="fa fa-dollar-sign"></i> ) <em>- 00.00</em></h3>
												<span><strong>“ Crunilance ”</strong> Service Fee<i
														class="fa fa-exclamation-circle template-content tipso_style"
														data-tipso="Plus Member"></i></span>
											</li>
											<li>
												<h3>( <i class="fa fa-dollar-sign"></i> ) <em>- 00.00</em></h3>
												<span>Amount You’ll Recive after <strong>“ Crunilance ”</strong> Service
													Fee deduction<i
														class="fa fa-exclamation-circle template-content tipso_style"
														data-tipso="Plus Member"></i></span>
											</li>
										</ul> -->
										
										<div class="form-group">
												
											<textarea class="form-control" name="coverletter" minlength="100" maxlength="1000" required
												placeholder="Add Description*"></textarea>
										</div>
										
									
									
												<!-- <div class="wt-title">
													<h3>Upload File (Optional)</h3>
													<label for="afile">
														<span><i class="lnr lnr-link"></i> Attach File(s)</span>
														<input type="file" name="file" id="afile">
													</label>
												</div>
												<ul class="wt-attachfile">
													
													<li>
														<span>Wireframe Document.doc</span>
														<em>File size: 512 kb<a href="#"
																class="lnr lnr-trash"></a></em>
													</li>
													
												</ul> -->
												
												<div class="wt-btnarea">
													<!-- <a href="#" class="wt-btn" style="margin-top:15px;">Send Now</a> -->
													<input type="submit" style=" text-transform: none; border: 0px; margin-top: 15px;" class="wt-btn" value="Send Now">
									
												</div>
											</div>
										</fieldset>
										
									</form>
								</div>

							<?php } ?>





							</div>
						</div>
					</div>
					<!-- User Listing End-->
				</div>
			</main>
			<!--Main End-->
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


</html>
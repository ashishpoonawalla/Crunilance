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
									<h2>Job Detail</h2>
								</div>
								<ol class="wt-breadcrumb">
									<li><a href="index-2.php">Home</a></li>
									<li><a href="#">Jobs</a></li>
									<li class="wt-active">Job Detail</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div> -->

			<?php
			    $uname = $_SESSION["username"];
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
					$userEmail = $row1['userEmail'];								  
					
					
					$countryName="";
					
					$sql11 = "SELECT * FROM countries Where c_code ='$country'";
					$result11 = $conn->query($sql11);
					if ($row11 = $result11->fetch_assoc()) {
						$countryName =  $row11['country_name'];
					}


				}
			?>




			<!--Inner Home End-->
			<!--Main Start-->
			<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
				<div class="wt-haslayout wt-main-section" style="margin-top: -30px;">
					<!-- User Listing Start-->
					<div class="container" >
						<div class="row">
							<div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-left">
									<div class="wt-proposalholder">
										<span class="wt-featuredtag">
											<!-- <img src="images/featured.png" alt=""
												data-tipso="Plus Member" class="template-content tipso_style"> -->
											</span>
										<div class="wt-proposalhead">
											<h2><?php echo $tit1; ?></h2>
											<ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
												<li><span><i class="fa fa-dollar-sign"></i>
												<!-- <?php 
													if ($p_level == "Intermediate"){
														?><i class="fa fa-dollar-sign"></i>
														<?php
													}
													if ($p_level == "Expert"){
														?><i class="fa fa-dollar-sign"></i><i class="fa fa-dollar-sign"></i>
														<?php
													}
												?> -->
												<?php echo $budget; ?> &nbsp;&nbsp;<?php echo $typepost; ?></span></li>
												<li><span><img style="width: 22px;" src="images/flags/<?php echo $country; ?>.png" alt=""> <?php echo $countryName; ?></span>
												</li>
												<li><span><i class="far fa-folder"></i> <?php echo $p_level; ?> level</span></li>
												<li><span><i class="far fa-clock"></i> Duration: <?php echo $p_duration; ?></span></li>
											</ul>
										</div>
										<?php if ($userEmail != $_SESSION['username']) { 
											if ($_SESSION["bidcount"] == "0"){
												echo "<div class='wt-btnarea'><h4>No Bids remain.</h4></div>";
											}else{
											?>

										<div class="wt-btnarea"><a href="jobproposal.php?pid=<?php echo $pid; ?>" class="wt-btn">Send
												Proposal</a></div>

										<?php 
											}
										} ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
									<div class="wt-projectdetail-holder">
										<div class="wt-projectdetail">
											<div class="wt-title">
												<h3>Project Detail</h3>
											</div>
											<div class="wt-description">
												<p><?php echo $product_desc; ?></p>
											</div>
										</div>
										<div class="wt-skillsrequired">
											<div class="wt-title">
												<h3>Skills Required</h3>
											</div>
											<div class="wt-tag wt-widgettag">
												<!-- <a href="#"><?php echo $product_keywords; ?></a> -->
												
												<?php


													$tags = explode(',', $product_keywords);

													foreach($tags as $key) {
												?>

													<a href="#"><?php echo $key; ?></a>
													<!-- <a href="?skill=<?php echo $key; ?>"><?php echo $key; ?></a> -->
												
												<?php } ?>
												<!-- <a href="#">PHP</a>
												<a href="#">My SQL</a>
												<a href="#">Business</a>
												<a href="#">Website Development</a>
												<a href="#">Collaboration</a>
												<a href="#">Decent</a> -->
											</div>
										</div>
										<!-- <div class="wt-attachments">
											<div class="wt-title">
												<h3>Attachments</h3>
											</div>
											<ul class="wt-attachfile">
												<li>
													<span>Wireframe Document.doc</span>
													<em>File size: 512 kb<a href="#"><i
																class="lnr lnr-download"></i></a></em>
												</li>
												<li>
													<span>Requirments.pdf</span>
													<em>File size: 110 kb<a href="#"><i
																class="lnr lnr-download"></i></a></em>
												</li>
												<li>
													<span>Company Intro.docx</span>
													<em>File size: 224 kb<a href="#"><i
																class="lnr lnr-download"></i></a></em>
												</li>
											</ul>
										</div> -->
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
									<aside id="wt-sidebar" class="wt-sidebar">
										<div class="wt-proposalsr">
											<div class="wt-proposalsrcontent">
												<span class="wt-proposalsicon"><i class="fa fa-angle-double-down"></i><i
														class="fa fa-newspaper"></i></span>
												<div class="wt-title">
													<h3>
													<?php
													
														include 'db_model.php';
														$model = new Model();
														$bidcount = $model->bid_count($pid);
														echo $bidcount;
													
														?>
													</h3>
													<span>Proposals Received</span>
												</div>
											</div>

											<div class="wt-proposalsrcontent">
												<span class="wt-proposalsicon"><i class="fa fa-angle-double-down"></i>
												<i class="fa fa-clone"></i></span>
												<div class="wt-title">
													<h3><?php echo $_SESSION["bidcount"]; ?></h3>
													<span>Bids remain</span>
												</div>
											</div>
											<!-- <div class="tg-authorcodescan">
												<figure class="tg-qrcodeimg">
													<img src="images/qrcode.png" alt="">
												</figure>
												<div class="tg-qrcodedetail">
													<span class="lnr lnr-laptop-phone"></span>
													<div class="tg-qrcodefeat">
														<h3>Scan with your <span>Smart Phone </span> To Get It Handy.
														</h3>
													</div>
												</div>
											</div> -->

											
											<div class="wt-clicksavearea">
												<span>Job ID: <?php echo $pid; ?></span>
												
														<!-- <i class="far fa-heart"></i> -->
														
															<?php 
															require('db.php');

															$sql="SELECT * FROM save_job WHERE useremail='$uname' AND pid=$pid " ;
															$result = $conn->query($sql);
														 
															if($row = $result->fetch_assoc())
															{
																?>
																<a href="jobsingle_del.php?pid=<?php echo $pid; ?>" class="wt-clicksavebtn">
																	<i class="fas fa-heart"></i>Click to clear
																</a>
																<?php
															} else {
															 ?>
															 	<a href="jobsingle_save.php?pid=<?php echo $pid; ?>" class="wt-clicksavebtn">
																	<i class="far fa-heart"></i>Click to save
																</a>
															<?php 
															} 
															?>
														
											</div>
										</div>
										<div class="wt-widget wt-companysinfo-jobsingle">
											<div class="wt-companysdetails">
												<figure class="wt-companysimg">
													<img src="images/company/img-01.jpg" alt="">
												</figure>
												<div class="wt-companysinfo">
											
											
											<?php
												$frist_name = "A";
												//include 'db_model.php';
												//$model1 = new Model();
												$row = $model->get_employer($userEmail);
												$i = 1;
												//print_r($row);
												if(!empty($row)){
													
													$frist_name = $row['first_name'];
													$country = $row['country'];

													$Emp_Work = $row['Emp_Work'];								  
													$Emp_Rating = $row['Emp_Rating'];								  
												
													require('db.php');

													$countryName="";
													$sql11 = "SELECT * FROM countries Where c_code ='$country'";
													$result11 = $conn->query($sql11);
													if ($row11 = $result11->fetch_assoc()) {
														$countryName =  $row11['country_name'];
													}
												}
												
											?>



													<figure>
														<!-- <img src="images/company/img-01.png" alt=""> -->
														<img alt="" src="./assets/imagesu/<?php echo $userEmail; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$userEmail.'.jpg'); ?>" style="height: 100px; width: 100px; object-fit: cover;border: 2px solid #fff; border-radius: 5px;">
													</figure>
													<div class="wt-title wt-statistics ">
														<a href="#">
															<!-- <i class="fa fa-check-circle"></i>
															Verified Company</a> -->
															<!-- <?php echo $userEmail ; ?> -->

														<h2><img src="images/flags/<?php echo $country; ?>.png" alt="" style="width: 20px;"> <?php echo $frist_name; ?></h2>
													
														<p>Project Completed ( <?php echo $Emp_Work; ?> )</p>
														
													
																<p>Rating ( <?php echo $Emp_Rating; ?> / 5 )</p>
														
												
													</div>
													<ul class="wt-postarticlemeta">
														<!-- <li>
															<a href="#">
																<span>Open Jobs</span>
															</a>
														</li> -->
														<!-- <li>
															<a href="#">
																<span>Full Profile</span>
															</a>
														</li> -->
														<!-- <li class="wt-following">
															<a href="#">
																<span>Following</span>
															</a>
														</li> -->
													</ul>
												</div>
											</div>
										</div>
										<!-- <div class="wt-widget wt-sharejob">
											<div class="wt-widgettitle">
												<h2>Share This Job</h2>
											</div>
											<div class="wt-widgetcontent">
												<ul class="wt-socialiconssimple">
													<li class="wt-facebook"><a href="#"><i
																class="fab fa-facebook-f"></i>Share on Facebook</a></li>
													<li class="wt-twitter"><a href="#"><i
																class="fab fa-twitter"></i>Share on Twitter</a></li>
													<li class="wt-linkedin"><a href="#"><i
																class="fab fa-linkedin-in"></i>Share on Linkedin</a>
													</li>
													<li class="wt-googleplus"><a href="#"><i
																class="fab fa-google-plus-g"></i>Share on Google
															Plus</a></li>
												</ul>
											</div>
										</div> -->

										<!-- Report ------------------------------------- -->

										<!-- <div class="wt-widget wt-reportjob">
											<div class="wt-widgettitle">
												<h2>Report This Job</h2>
											</div>
											<div class="wt-widgetcontent">
												<form class="wt-formtheme wt-formreport">
													<fieldset>
														<div class="form-group">
															<span class="wt-select">
																<select>
																	<option value="Reason">Select Reason</option>
																	<option value="Reason1">Reason 1</option>
																	<option value="Reason2">Reason 2</option>
																</select>
															</span>
														</div>
														<div class="form-group">
															<textarea class="form-control"
																placeholder="Description"></textarea>
														</div>
														<div class="form-group wt-btnarea">
															<a href="#" class="wt-btn">Submit</a>
														</div>
													</fieldset>
												</form>
											</div>
										</div> -->
									</aside>
								</div>
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
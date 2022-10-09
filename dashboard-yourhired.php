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
									<h2>Search Result</h2>
								</div>
								<ol class="wt-breadcrumb">
									<li><a href="index-2.php">Home</a></li>
									<li class="wt-active">Freelancers</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			
			
			<!-- <div class="wt-categoriesslider-holder wt-haslayout">
				<div class="wt-title">
					<h2>Browse Top Job Categories:</h2>
				</div>
				<div id="wt-categoriesslider" class="wt-categoriesslider owl-carousel">
					<div class="wt-categoryslidercontent item">
						<figure><img src="images/categories/slider/img-01.png" alt="image description"></figure>
						<div class="wt-cattitle">
							<h3><a href="#">Graphic &amp; Design</a></h3>
							<span>Items: 523,112</span>
						</div>
					</div>
					<div class="wt-categoryslidercontent item">
						<figure><img src="images/categories/slider/img-02.png" alt="image description"></figure>
						<div class="wt-cattitle">
							<h3><a href="#">Digital Marketing</a></h3>
							<span>Items: 523,112</span>
						</div>
					</div>
					<div class="wt-categoryslidercontent item">
						<figure><img src="images/categories/slider/img-03.png" alt="image description"></figure>
						<div class="wt-cattitle">
							<h3><a href="#">Writing &amp; Translation</a></h3>
							<span>Items: 325,442</span>
						</div>
					</div>
					<div class="wt-categoryslidercontent item">
						<figure><img src="images/categories/slider/img-04.png" alt="image description"></figure>
						<div class="wt-cattitle">
							<h3><a href="#">Video &amp; Animation</a></h3>
							<span>Items: 421,305</span>
						</div>
					</div>
					<div class="wt-categoryslidercontent item">
						<figure><img src="images/categories/slider/img-05.png" alt="image description"></figure>
						<div class="wt-cattitle">
							<h3><a href="#">Music &amp; Audio</a></h3>
							<span>Items: 421,305</span>
						</div>
					</div>
					<div class="wt-categoryslidercontent item">
						<figure><img src="images/categories/slider/img-01.png" alt="image description"></figure>
						<div class="wt-cattitle">
							<h3><a href="#">Programing &amp; Tech</a></h3>
							<span>Items: 421,305</span>
						</div>
					</div>
				</div>
			</div> -->


			<!--Inner Home End-->
			<!--Main Start-->
			<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
				<div class="wt-main-section wt-haslayout" style="margin-top: -30px; min-height: 600px;">
					<!-- User Listing Start-->
					<div class="wt-haslayout">
						<div class="container">
							<div class="row">
								<div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">


									<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-2 float-left">
										
									</div>


									<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
										<div class="wt-userlistingholder wt-userlisting wt-haslayout">
											
                                        <?php 
                                                require('db.php');
                                                $user = $_SESSION['username']; 
                                                $limit = 8; 

                                                if (isset($_GET["page"] )) 
                                                    {
                                                    $page  = $_GET["page"]; 
                                                    } 
                                                else 
                                                    {
                                                    $page=1; 
                                                    };  
                                            
                                                $record_index= ($page-1) * $limit; 
                                            					

                                                //$Query1=" Where userEmail='$user' AND tusername <> null ";
                                                $Query1=" Where userEmail='$user' AND status1='Awarded' ";
                                                
                                                $sql10 = "SELECT * FROM projects $Query1 ORDER BY product_id DESC ";
                                                $result10 = $conn->query($sql10);

                                                $cccnt = 0;
                                                while ($row10 = $result10->fetch_assoc()) {
                                                    $tusername = $row10['tusername'];
                                                    $cccnt++;


                                                    $sql1 = "SELECT * FROM user_info Where email='$tusername'";                                        
                                                    //echo "<p style='color:#fff;' >$sql1</p>";
                                                    $result1 = $conn->query($sql1);
            
												
												    if($row1 = $result1->fetch_assoc()){


                                                        $user_id = $row1['user_id'];										
                                                        $email = $row1['email'];										
                                                        $first_name = $row1['first_name'];
                                                        $details = $row1['details'];
                                                        $status1 = $row1['status1'];
                                                        $hrate = $row1['hrate'];
                                                        $utagline = $row1['utagline'];											
                                                        $country = $row1['country'];                                            
                                                            
                                                        
                                                        $countryName="";
                                                        $sql11 = "SELECT * FROM countries Where c_code ='$country'";
                                                        $result11 = $conn->query($sql11);
                                                        if ($row11 = $result11->fetch_assoc()) {
                                                            $countryName =  $row11['country_name'];
                                                        }
												?>

													
											<div class="wt-userlistinghold">
												<figure class="wt-userlistingimg">
													<a href="usersingle.php?uid=<?php echo $user_id; ?>" >
														<img alt="" src="./assets/imagesu/<?php echo $email; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$email.'.jpg'); ?>" style="height: 100px; width: 100px; object-fit: cover;">
													</a>
												</figure>
												<div class="wt-userlistingcontent">
													<div class="wt-contenthead">
														<div class="wt-title">
															<a href="usersingle.php?uid=<?php echo $user_id; ?>"><i class="fa fa-check-circle"></i>
																<?php echo $first_name; ?></a>
															<h2><?php echo $utagline; ?></h2>
														</div>
														<ul class="wt-userlisting-breadcrumb">
															<li><span><i class="far fa-money-bill-alt"></i> $<?php echo $hrate; ?> /
																	hr</span></li>
															<li><span><img src="images/flags/<?php echo $country; ?>.png" alt="" style="width: 18px;">
																<?php echo $countryName; ?></span></li>
															<li><a href="#"><i
																		class="fa fa-heart"></i> Click to Save</a></li>
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
												<div class="wt-description">
													<p><?php echo substr($details, 0, 180); ?>...</p>
												</div>
												<div class="wt-tag wt-widgettag">
													<a href="#">PHP</a>
													<a href="#">HTML</a>
													<a href="#">JavaScript</a>
													<a href="#">WordPress</a>
												</div>
											</div>


										<?php }
                                        }  ?>


										<!-- <?php

										$sql = "SELECT COUNT(*) FROM user_info $Query1"; 
										$retval1 = mysqli_query($conn, $sql);  
										$row = mysqli_fetch_row($retval1);  
										$total_records = $row[0];
										$total_pages = ceil($total_records / $limit); 
										//echo "$page, $total_pages";


										if ($total_records > $limit){

											$link1 = "";
											$prev1 = "#";
											$next1 = "#";
											if ($page > 1){
											$prev1 = "userlisting.php?page=".($page-1);
											}else{

											$link1 = " disabled ";
											}

											$link2 = "";
											if ($page <  $total_pages){
											$next1 = "userlisting.php?page=".($page+1);
											}else{

											$link2 = " disabled ";
											}

										?>

										<nav class="wt-pagination">
											<ul>
												<li class="wt-prevpage <?php echo $link1; ?>">
													<a href="<?php echo $prev1; ?>"> <i class="lnr lnr-chevron-left"></i></a></li>

												<li><a href="#" style="width: 150px; "><?php echo $page.' of '.$total_pages; ?></a></li>
												
												<li class="wt-nextpage <?php echo $link2; ?>">
													<a href="<?php echo $next1; ?>"><i	class="lnr lnr-chevron-right"></i></a></li>
											</ul>
										</nav>

										<?php } ?> -->

											
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
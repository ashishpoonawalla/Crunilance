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
			<main id="wt-main" class="wt-main wt-haslayout" style="min-height: 600px;">
				<!--Sidebar Start-->
<?php
	include('sidebar.php');
?>


<?php

$pid = $_REQUEST['pid'];

require('db.php');
										
	$user = $_SESSION['username']; 

	$Query1=" Where userEmail='$user' AND product_id=$pid";
	
	$sql1 = "SELECT * FROM projects $Query1 ";
	$result1 = $conn->query($sql1);

	
	if ($row1 = $result1->fetch_assoc()) {
		
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
		

	}
?>










				<!-- ------------- Job Details --------------------- -->
				<section class="wt-haslayout wt-dbsectionspace">
					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-1">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">
							<div class="wt-dashboardbox" >
								<div class="wt-dashboardboxtitle">
									<h2>Job Details #<?php echo $pid; ?></h2>
								</div>
								<div class="wt-dashboardboxcontent wt-jobdetailsholder">



									<!-- -------------- Job Details ------------- -->
									<div class="wt-freelancerholder wt-tabsinfo">
										<!-- <div class="wt-tabscontenttitle">
											<h2>Hired Freelancer</h2>
										</div> -->
										<div class="wt-jobdetailscontent" >
											<div class="wt-userlistinghold wt-featured " >
												<span class="wt-featuredtag">
													<!-- <img src="images/featured.png" alt=""
														data-tipso="Plus Member"
														class="template-content tipso_style"> -->
													</span>
												<div class="wt-userlistingcontent" >
													<div class="wt-contenthead" >
														<div class="wt-title">
															<!-- <a href="usersingle.php"><i class="fa fa-check-circle"></i>
																Alfredo Bossard
															</a> -->
															<h2><?php echo $tit1; ?></h2>
														</div>
														<ul class="wt-userlisting-breadcrumb" style="margin-bottom:30px;  ">
															<li><span><i class="far fa-money-bill-alt"></i> 
																<?php echo $budget; ?> <?php echo $typepost; ?> Price Job</span></li>
															
															<li><i
																		class="fa fa-clock"></i> <?php echo $p_duration; ?></li>

																		<i class="far fa-file-alt"></i> Proposals: <?php echo $cnt_proposals; ?></span></li>
														</ul>
														<p><?php echo $product_desc; ?></p>
													</div>
												
												</div>
											</div>
										</div>
									</div>

									
									
								

									<!-- -------------- Hired Freelancer ------------- -->

									<?php 		if ($psid != "1"){ 			?>

									

									<div class="wt-rcvproposalholder wt-hiredfreelancer wt-tabsinfo">
										<div class="wt-tabscontenttitle">
											<h2>Hired Freelancer</h2>
										</div>


										<?php
												require('db.php');
												$sql11 = "SELECT * FROM project_user Where product_id =$pid";
												$result11 = $conn->query($sql11);
												$ctt = 0;
												if($row11 = $result11->fetch_assoc()) {
													$ctt++;
													$psid = $row11['psid'];										
													$useremail = $row11['useremail'];
													$full_name = $row11['full_name'];
													$country = $row11['country'];
													$amount = $row11['amount'];
													$duration = $row11['duration'];
													$coverletter = $row11['coverletter'];
													$status2 = $row11['status2'];
													$date1 = $row11['date1'];
													$date11 = date('d M',strtotime($date1));

													


													$countryName="";
													$sql112 = "SELECT * FROM countries Where c_code ='$country'";
													$result112 = $conn->query($sql112);
													if ($row112 = $result112->fetch_assoc()) {
														$countryName =  $row112['country_name'];
													}
												}
												?>
										
										<div class="wt-jobdetailscontent">
											<div class="wt-userlistinghold wt-featured wt-proposalitem">
												<span class="wt-featuredtag"><img src="images/featured.png" alt=""
														data-tipso="Plus Member"
														class="template-content tipso_style mCS_img_loaded"></span>
												<figure class="wt-userlistingimg">
												<img alt="" src="./assets/imagesu/<?php echo $useremail; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$useremail.'.jpg'); ?>" style="height: 60px; width: 60px; object-fit: cover;">
														
												</figure>
												<div class="wt-proposaldetails">
													<div class="wt-contenthead">
														<div class="wt-title">
															<a href="#"> <?php echo $full_name; ?></a>
														</div>
													</div>
													<div class="wt-proposalfeedback">
														<span class="wt-starsvtwo">
															<i class="fa fa-star fill"></i>
														</span>
														<span class="wt-starcontent"> 4.5/<i>5</i> <em> (10
																Feedback)</em></span>
													</div>
												</div>
												<div class="wt-rightarea wt-titlewithsearch">
													<form class="wt-formtheme wt-formsearch">
														<fieldset>
															<div class="form-group">
																<span class="wt-select">
																	<select>
																		<option value="" disabled="">Project Start
																		</option>
																		<option value="">50% Completed</option>
																		<option value="">Project Completed</option>
																	</select>
																</span>
																<a href="#" class="wt-searchgbtn"
																	data-toggle="modal"
																	data-target="#wt-projectmodalbox"><i
																		class="fa fa-check"></i></a>
															</div>
														</fieldset>
													</form>
													<div class="wt-hireduserstatus">
														<h5>&#36;<?php echo $budget; ?></h5>
														<span>In <?php echo $p_duration; ?></span>
													</div>
													<div class="wt-hireduserstatus">
														<i class="far fa-envelope"></i>
														<span>Cover Letter</span>
													</div>
													<!-- <div class="wt-hireduserstatus">
														<i class="fa fa-paperclip"></i>
														<span>03 file attached</span>
													</div> -->
												</div>
											</div>
										</div>
									</div>
									



								<!-- -------------- Proposals ------------- -->
								
									<div class="wt-projecthistory">
										<div class="wt-tabscontenttitle">
											<h2>Proposals</h2>
										</div>
										<div class="wt-historycontent">
											<ul id="accordion" class="wt-historycontentcol">
												<li class="wt-historycolhead">
													<h3><span>Freelancer</span><span>Date</span><span>Action</span>
													</h3>
												</li>


												<?php
												require('db.php');
												$sql11 = "SELECT * FROM project_user Where product_id =$pid";
												$result11 = $conn->query($sql11);
												$ctt = 0;
												while ($row11 = $result11->fetch_assoc()) {
													$ctt++;
													$psid1 = $row11['psid'];										
													$useremail = $row11['useremail'];
													$full_name = $row11['full_name'];
													$country = $row11['country'];
													$amount = $row11['amount'];
													$duration = $row11['duration'];
													$coverletter = $row11['coverletter'];
													$status2 = $row11['status2'];
													$date1 = $row11['date1'];
													$date11 = date('d M',strtotime($date1));

													


													$countryName="";
													$sql112 = "SELECT * FROM countries Where c_code ='$country'";
													$result112 = $conn->query($sql112);
													if ($row112 = $result112->fetch_assoc()) {
														$countryName =  $row112['country_name'];
													}
												
												?>


												<li class="collapsed" data-toggle="collapse" data-target="#collapse<?php echo $ctt;?>">
													<div class="wt-dateandmsg">
														<span>
														<img alt="" src="./assets/imagesu/<?php echo $useremail; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$useremail.'.jpg'); ?>" style="height: 30px; width: 30px; object-fit: cover;">
															<?php echo $full_name; ?></span>
														<span> <?php echo $date11; ?></span>
													</div>
													<div class="wt-rightarea wt-msgbtns">
														<a href="#collapse<?php echo $ctt;?>" class="wt-btn wt-attachmentbtn">
															<!-- <i class="lnr lnr-chevron-up"></i> -->
															Cover Letter
														</a>
														<a href="dashboard-messages.php" class="wt-btn wt-msgbtn">
															<i class="lnr lnr-bubble"></i>Chat
														</a>
														<!-- <a href="#collapse<?php echo $ctt;?>" class="wt-btn wt-attachmentbtn">
															<i class="lnr lnr-download"></i>Attachment
														</a> -->
														<a href="dashboard-ongoingsingle-award.php?pid=<?php echo $pid; ?>&psid=<?php echo $psid1; ?>"  onclick="return confirm('Are you sure to award this project ?');" class="wt-btn wt-msgbtn">
															<i class="lnr lnr-checkmark-circle"></i>Award
														</a>
													</div>
												</li>
												<li class="wt-historydescription collapse "
													id="collapse<?php echo $ctt;?>" data-parent="#accordion">
													<div class="wt-description">
														<textarea style="width:100%; height: 300px; color: #555;"><?php echo $coverletter; ?></textarea>
													</div>
												</li>
												

												<?php }  ?>

												
											</ul>
											<!-- <form class="wt-formtheme wt-userform">
												<fieldset>
													<div class="form-group">
														<textarea id="wt-tinymceeditor" class="wt-tinymceeditor"
															placeholder="Add Job Detail Here"></textarea>
													</div>
													<div class="form-group form-group-label">
														<div class="wt-labelgroup">
															<label for="file">
																<span class="wt-btn">Select Files</span>
																<input type="file" name="file" id="file">
															</label>
															<span>Drop files here to upload</span>
															<em class="wt-fileuploading">Uploading<i
																	class="fa fa-spinner fa-spin"></i></em>
														</div>
													</div>
													<div class="form-group">
														<ul class="wt-attachfile">
															<li class="wt-uploading">
																<span class="uploadprogressbar"></span>
																<span>Category Icon.jpg</span>
																<em>File size: 450 kb<a href="#"
																		class="lnr lnr-cross"></a></em>
															</li>
															<li>
																<span class="uploadprogressbar"></span>
																<span>requirments.pdf</span>
																<em>File size: 300 kb<a href="#"
																		class="lnr lnr-cross"></a></em>
															</li>
															<li>
																<span class="uploadprogressbar"></span>
																<span>company Intro.docx</span>
																<em>File size: 100 kb<a href="#"
																		class="lnr lnr-cross"></a></em>
															</li>
														</ul>
													</div>
													<div class="form-group wt-btnarea">
														<a href="#" class="wt-btn">Send Now</a>
													</div>
												</fieldset>
											</form> -->
										</div>
									</div>
								





									<!-- -------------- Work History ------------- -->
									<!-- <div class="wt-projecthistory">
										<div class="wt-tabscontenttitle">
											<h2>Project History</h2>
										</div>
										<div class="wt-historycontent">
											<ul id="accordion" class="wt-historycontentcol">
												<li class="wt-historycolhead">
													<h3><span>Date</span><span>Message</span><span>Attachment</span>
													</h3>
												</li>
												<li class="collapsed" data-toggle="collapse" data-target="#collapseone">
													<div class="wt-dateandmsg">
														<span><img src="images/user/ongoing/img-01.jpg" alt="">Jun 27,
															2019</span>
														<span>Consectetur adipisicing elit sed do eiusmod tempor
															incididunt ut labore et dolore magna aliqua enim sed</span>
													</div>
													<div class="wt-rightarea wt-msgbtns">
														<a href="#" class="wt-btn wt-msgbtn"><i
																class="lnr lnr-chevron-up"></i>Message</a>
														<a href="#" class="wt-btn wt-attachmentbtn"><i
																class="lnr lnr-download"></i>Attachment</a>
													</div>
												</li>
												<li class="wt-historydescription collapse active fade show"
													id="collapseone" data-parent="#accordion">
													<div class="wt-description">
														<p>Adipisicing elit sed do eiusmod tempor incididunt ut labore
															eta dolore magnam aliqua. Ut enim ad minim veniam, qu
															nostrud exercitation ullamco laboris nisi ut aliquiprex ea
															commodo consequat eta dolore magna aliqua. Duis aute irure
															dolor in reprehenderit in voluptate velit esse cillumau
															dolore eu fugiat nulla pariatur excepteur sint occaecat
															cupidatat non proident, sunt in culpa quiste officia
															deserunt mollit anim id est laborum. Sed uten perspiciatis
															unde omnis istetam natus error sit voluptatem accusantium
															doloremque laudantium.</p>
													</div>
												</li>
												<li class="collapsed" data-toggle="collapse" data-target="#collapsetwo">
													<div class="wt-dateandmsg">
														<span><img src="images/user/ongoing/img-02.jpg" alt="">Jun 27,
															2019</span>
														<span>Adipisicing elit sed do eiusmod tempor incididunt ut
															labore eta dolore eiusmod tempor incididunt ut labore eta
															dolore magnam aliqua.</span>
													</div>
													<div class="wt-rightarea wt-msgbtns">
														<a href="#" class="wt-btn wt-msgbtn"><i
																class="lnr lnr-chevron-up"></i>Message</a>
														<a href="#" class="wt-btn wt-attachmentbtn"><i
																class="lnr lnr-download"></i>Attachment</a>
													</div>
												</li>
												<li class="wt-historydescription collapse" id="collapsetwo"
													data-parent="#accordion">
													<div class="wt-description">
														<p>Adipisicing elit sed do eiusmod tempor incididunt ut labore
															eta dolore magnam aliqua. Ut enim ad minim veniam, qu
															nostrud exercitation ullamco laboris nisi ut aliquiprex ea
															commodo consequat eta dolore magna aliqua. Duis aute irure
															dolor in reprehenderit in voluptate velit esse cillumau
															dolore eu fugiat nulla pariatur excepteur sint occaecat
															cupidatat non proident, sunt in culpa quiste officia
															deserunt mollit anim id est laborum. Sed uten perspiciatis
															unde omnis istetam natus error sit voluptatem accusantium
															doloremque laudantium.</p>
													</div>
												</li>
												<li class="collapsed" data-toggle="collapse"
													data-target="#collapsethree">
													<div class="wt-dateandmsg">
														<span><img src="images/user/ongoing/img-01.jpg" alt="">Jun 27,
															2019</span>
														<span>Veniam quis nostrud exercitation ullamco laboris nisi ut
															aliquip ex ea commodo consequat aut irure dolo</span>
													</div>
													<div class="wt-rightarea wt-msgbtns">
														<a href="#" class="wt-btn wt-msgbtn"><i
																class="lnr lnr-chevron-up"></i>Message</a>
														<a href="#" class="wt-btn wt-attachmentbtn"><i
																class="lnr lnr-download"></i>Attachment</a>
													</div>
												</li>
												<li class="wt-historydescription collapse" id="collapsethree"
													data-parent="#accordion">
													<div class="wt-description">
														<p>Adipisicing elit sed do eiusmod tempor incididunt ut labore
															eta dolore magnam aliqua. Ut enim ad minim veniam, qu
															nostrud exercitation ullamco laboris nisi ut aliquiprex ea
															commodo consequat eta dolore magna aliqua. Duis aute irure
															dolor in reprehenderit in voluptate velit esse cillumau
															dolore eu fugiat nulla pariatur excepteur sint occaecat
															cupidatat non proident, sunt in culpa quiste officia
															deserunt mollit anim id est laborum. Sed uten perspiciatis
															unde omnis istetam natus error sit voluptatem accusantium
															doloremque laudantium.</p>
													</div>
												</li>
												<li class="collapsed" data-toggle="collapse"
													data-target="#collapsefour">
													<div class="wt-dateandmsg">
														<span><img src="images/user/ongoing/img-02.jpg" alt="">Jun 27,
															2019</span>
														<span>Reprehenderit in voluptate velit esse cillum dolore eu
															fugiat nulla pariatur sint occaecat cupidat nonproid</span>
													</div>
													<div class="wt-rightarea wt-msgbtns">
														<a href="#" class="wt-btn wt-msgbtn"><i
																class="lnr lnr-chevron-up"></i>Message</a>
														<a href="#" class="wt-btn wt-attachmentbtn"><i
																class="lnr lnr-download"></i>Attachment</a>
													</div>
												</li>
												<li class="wt-historydescription collapse" id="collapsefour"
													data-parent="#accordion">
													<div class="wt-description">
														<p>Adipisicing elit sed do eiusmod tempor incididunt ut labore
															eta dolore magnam aliqua. Ut enim ad minim veniam, qu
															nostrud exercitation ullamco laboris nisi ut aliquiprex ea
															commodo consequat eta dolore magna aliqua. Duis aute irure
															dolor in reprehenderit in voluptate velit esse cillumau
															dolore eu fugiat nulla pariatur excepteur sint occaecat
															cupidatat non proident, sunt in culpa quiste officia
															deserunt mollit anim id est laborum. Sed uten perspiciatis
															unde omnis istetam natus error sit voluptatem accusantium
															doloremque laudantium.</p>
													</div>
												</li>
											</ul>
											<form class="wt-formtheme wt-userform">
												<fieldset>
													<div class="form-group">
														<textarea id="wt-tinymceeditor" class="wt-tinymceeditor"
															placeholder="Add Job Detail Here"></textarea>
													</div>
													<div class="form-group form-group-label">
														<div class="wt-labelgroup">
															<label for="file">
																<span class="wt-btn">Select Files</span>
																<input type="file" name="file" id="file">
															</label>
															<span>Drop files here to upload</span>
															<em class="wt-fileuploading">Uploading<i
																	class="fa fa-spinner fa-spin"></i></em>
														</div>
													</div>
													<div class="form-group">
														<ul class="wt-attachfile">
															<li class="wt-uploading">
																<span class="uploadprogressbar"></span>
																<span>Category Icon.jpg</span>
																<em>File size: 450 kb<a href="#"
																		class="lnr lnr-cross"></a></em>
															</li>
															<li>
																<span class="uploadprogressbar"></span>
																<span>requirments.pdf</span>
																<em>File size: 300 kb<a href="#"
																		class="lnr lnr-cross"></a></em>
															</li>
															<li>
																<span class="uploadprogressbar"></span>
																<span>company Intro.docx</span>
																<em>File size: 100 kb<a href="#"
																		class="lnr lnr-cross"></a></em>
															</li>
														</ul>
													</div>
													<div class="form-group wt-btnarea">
														<a href="#" class="wt-btn">Send Now</a>
													</div>
												</fieldset>
											</form>
										</div>
									</div> -->

									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
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
	<!-- Modal Box Start -->
	<div class="wt-uploadimages modal fade" id="wt-projectmodalbox" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="wt-modaldialog modal-dialog" role="document">
			<div class="wt-modalcontent modal-content">
				<div class="wt-boxtitle">
					<h2>Project Status <i class=" wt-btncancel fa fa-times" data-dismiss="modal" aria-label="Close"></i>
					</h2>
				</div>
				<div class="wt-modalbody modal-body">
					<form class="wt-formtheme wt-formfeedback">
						<fieldset>
							<div class="form-group">
								<textarea class="form-control" placeholder="Add Your Feedback*"></textarea>
							</div>
							<div class="form-group wt-ratingholder">
								<div class="wt-ratepoints">
									<div class="counter wt-pointscounter">5.0</div>
									<div id="wt-jrate" class="wt-jrate"></div>
								</div>
								<span class="wt-ratingdescription">How was my proffesional behaviour?</span>
							</div>
							<div class="form-group wt-ratingholder">
								<div class="wt-ratepoints">
									<div class="counterone wt-pointscounter">5.0</div>
									<div id="wt-jrateone" class="wt-jrate"></div>
								</div>
								<span class="wt-ratingdescription">How was my quality of work?</span>
							</div>
							<div class="form-group wt-ratingholder">
								<div class="wt-ratepoints">
									<div class="countertwo wt-pointscounter">5.0</div>
									<div id="wt-jratetwo" class="wt-jrate"></div>
								</div>
								<span class="wt-ratingdescription">Was I focused to deadline?</span>
							</div>
							<div class="form-group wt-ratingholder">
								<div class="wt-ratepoints">
									<div class="counterthree wt-pointscounter">5.0</div>
									<div id="wt-jratethree" class="wt-jrate"></div>
								</div>
								<span class="wt-ratingdescription">Was it worth it having my services?</span>
							</div>
							<div class="form-group wt-btnarea">
								<a class="wt-btn" href="#">Send Feedback</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Box End -->
	<script src="js/vendor/jquery-3.3.1.js"></script>
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci"></script>
	<script src="js/chosen.jquery.js"></script>
	<script src="js/scrollbar.min.js"></script>
	<script src="js/tilt.jquery.js"></script>
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
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
			<main id="wt-main" class="wt-main wt-haslayout" >
				<!--Sidebar Start-->
<?php
	include('sidebar.php');
?>


<?php
							$msg="";
                            //------------------ Delete Skill -----------------------
							                          
                            if (isset($_REQUEST['id'])){

                                //session_start();				
                                $id = ($_REQUEST['id']);
								$pid = ($_REQUEST['pid']);                            
                                $psid = ($_REQUEST['psid']);                            
                                $email = $_SESSION["username"];      

                                                        
                                require('db.php');

                                $msg="";
                                
                                $sql="DELETE FROM project_mile WHERE psid='$psid' AND id=$id " ;
                                
                                if($result = $conn->query($sql))
                                {
                                    $msg="Deleted successfully";
                                } else {
                                    $msg= "Some Error when deleting!";
                                
                                    
                                }
                            }
                            //------------------ Insert Skill -----------------------
							
                                if (isset($_POST['mtitle'])){

                                    //session_start();				
                                    $mtitle = ($_POST['mtitle']);
                                    $mamount = ($_POST['mamount']);
                                    $pid = ($_POST['pid']);
                                    $psid = ($_POST['psid']);
                                    
                                    
                                    $email = $_SESSION["username"];      

                                                            
                                    require('db.php');

                                   
                                    
                                   

                                        try {
                                            $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                                            // set the PDO error mode to exception
                                            $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            

                                                $stmt = $conn1->prepare("INSERT INTO project_mile(email,  mtitle,  mamount,  pid,  psid) 
                                                                                        VALUES (:email, :mtitle, :mamount, :pid, :psid)");

                                                $stmt->bindParam(':email', $email);
                                                $stmt->bindParam(':mtitle', $mtitle);	
                                                $stmt->bindParam(':mamount', $mamount);
												$stmt->bindParam(':pid', $pid);
												$stmt->bindParam(':psid', $psid);
												
                                                
                                                if ($stmt->execute() === TRUE) {
                                                                
                                                   
                                                    $msg='Milestone added successfully';
                                                    
                                                } else {
                                                    $msg= "Some Error when adding data!";
                                                
                                                    
                                                }
                                                
                                            
                                            
                                        } catch(PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                   

									
								}

                                if ($msg != ""){
                                    ?>
                                            <!-- <div class="wt-jobalertsholder" style="margin-top: 20px; margin-bottom: -30px;">
                                                <ul class="wt-jobalerts">
                                                    <li class="alert alert-warning alert-dismissible fade show">
                                                        <span><em>Alert:</em> <?php echo $msg; ?> </span>
                                                        
                                                        <a href="javascript:void(0)" class="close" data-dismiss="alert"
                                                            aria-label="Close"><i class="fa fa-close"></i></a>
                                                    </li>
                                                    
                                                </ul>
                                            </div> -->
                                    <?php 
                                }
							?>










<?php

if (isset($_REQUEST['pid'])){
	$pid = $_REQUEST['pid'];
}

require('db.php');
										
	$user = $_SESSION['username']; 

	$Query1=" Where product_id=$pid";
	
	$sql1 = "SELECT * FROM projects $Query1 ";
	$result1 = $conn->query($sql1);

	
	if ($row1 = $result1->fetch_assoc()) {
		
		$pid = $pid1 = $row1['product_id'];										
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
		
		$F_rat = $row1['F_rat'];								  
		$E_rat = $row1['E_rat'];								  
		
		
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
							<div class="wt-dashboardbox" style="min-height: 600px;">
								<div class="wt-dashboardboxtitle wt-featured">
                                
									<h2><?php echo $tit1; ?> - <a href="fr-ongoingjob.php?pid=<?php echo $pid; ?>" style="color: #3B82F6;">Details</a>
									<a href="messagechange.php?jobid=<?php echo $pid; ?>&psid=<?php echo $psid; ?>&typ=<?php echo $typepost; ?>"  style="float: right;">
															<i class="lnr lnr-bubble"></i> Chat
														</a>
								
								</h2>
								</div>
								<div class="wt-dashboardboxcontent wt-jobdetailsholder">



									<!-- -------------- Job Details ------------- -->
									<!-- <div class="wt-freelancerholder wt-tabsinfo">
									
										<div class="wt-jobdetailscontent" >
											<div class="wt-userlistinghold wt-featured " >
												<span class="wt-featuredtag">
													
													</span>
												<div class="wt-userlistingcontent" >
													<div class="wt-contenthead" >
														<div class="wt-title">
															
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
									</div> -->

									
									
								

									

								<!-- -------------- Milestone Details ------------- -->
								
									<div class="wt-projecthistory">
										
										<div class="wt-userexperience wt-tabsinfo">
											<div class="wt-tabscontenttitle">
											<a href="#" style="float: right;"
																	data-toggle="modal"
																	data-target="#wt-projectmodalbox1"><i
																		class="fa fa-plus"></i>Add New</a>
												<h2>Milestones</h2> 
												
											</div>
												<ul class="wt-experienceaccordion accordion">
												
													<?php
														$email = $_SESSION["username"]; 
														require('db.php');
					
														
														$sql="SELECT * FROM project_mile WHERE psid='$psid' order by id" ;
														$result = $conn->query($sql);
														$aat = 0;
														$tttt = 0;
														$cntt = 0;
														while ($row = $result->fetch_assoc()) {
																$tttt++;

																$id =  $row['id'];
																$pid =  $row['pid'];
																$psid =  $row['psid'];
																$mtitle =  $row['mtitle'];
																$mamount =  $row['mamount'];
																$mdayhrs =  $row['mdayhrs'];
																$mstatus =  $row['mstatus'];
																$paystatus =  $row['paystatus'];

																// $startdate1 =  date("M Y", strtotime($startdate));  
																// $enddate1 =  date("M Y", strtotime($enddate));  
																$aat = $aat + $mamount;

																if ($paystatus == "Fund Released"){
																	$cntt++;
																}
															// echo "$cntt - $tttt";
													?>

													<li>
														<div class="wt-accordioninnertitle">
															<span id="accordioninnertitleb" data-toggle="collapse"
																data-target="#innertitleb"><span style="min-width: 400px;"><?php echo $mtitle; ?></span>
																&emsp;<em> ($<?php echo $mamount; ?>) &emsp; 
																<?php if ($paystatus=="Funded"){
																		echo "<span style='color: blue;' ><b>$paystatus</b></span>" ;
																	}else if ($paystatus=="Fund Released"){
																		echo "<span style='color: green;' ><b>$paystatus</b></span>" ;
																	}else{
																		echo "<span>$paystatus</span>" ;
																	}
																		?>
															
															</em></span>
															<div class="wt-rightarea">
																<!-- <a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	id="accordioninnertitleb" data-toggle="collapse"
																	data-target="#innertitleb" aria-expanded="true"><i
																		class="lnr lnr-pencil"></i></a> -->
																	<?php if ($paystatus == "Not Funded"){ ?>
																		<!-- <a href="#" class="wt-deleteinfo wt-msgbtn" style="width: 150px;" ><i
																		class="lnr lnr-license"></i> Fund request</a> -->
																	
																		<a href="?id=<?php echo $id; ?>&pid=<?php echo $pid; ?>&psid=<?php echo $psid; ?>" class="wt-deleteinfo"
																			onclick="return confirm('Are you sure to delete this ?');"
																		><i
																		class="lnr lnr-trash"></i></a>
																	<?php } ?>
															</div>
														</div>
														<!-- <div class="wt-collapseexp collapse hide" id="innertitleb"
															aria-labelledby="accordioninnertitleb"
															data-parent="#accordion">
															<form class="wt-formtheme wt-userform">
																<fieldset>
																	<div class="form-group form-group-half">
																		<input type="text" name="Company Title"
																			class="form-control"
																			placeholder="Company Title">
																	</div>
																	<div class="form-group form-group-half">
																		<input type="text" name="Starting Date"
																			class="form-control"
																			placeholder="Starting Date">
																	</div>
																	<div class="form-group form-group-half">
																		<input type="email" name="Ending Date"
																			class="form-control"
																			placeholder="Ending Date *">
																	</div>
																	<div class="form-group form-group-half">
																		<input type="number" name="Job Title"
																			class="form-control"
																			placeholder="Your Job Title">
																	</div>
																	<div class="form-group">
																		<textarea name="message" class="form-control"
																			placeholder="Your Job Description"></textarea>
																	</div>
																	<div class="form-group">
																		<span>* Leave ending date empty if its your
																			current job</span>
																	</div>
																</fieldset>
															</form>
														</div> -->
													</li>
													<?php } ?>
													

													<!-- <li>
														<div class="wt-accordioninnertitle" style="background-color: #eee;">
															<span id="accordioninnertitleb" data-toggle="collapse"
																data-target="#innertitleb"><span style="min-width: 400px;">Total</span>
																&emsp;<em> $<?php echo $aat; ?> </em></span>
															
														</div>
														
													</li> -->
												</ul>
												
										</div>
									</div>
								



									<!-- -----------------------------------Model for  Add New Milestone ----------------- -->

									<div class="wt-uploadimages modal fade" id="wt-projectmodalbox1" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="wt-modaldialog modal-dialog" role="document">
											<div class="wt-modalcontent modal-content">
												<div class="wt-boxtitle">
													<h2>Add New Milestone <i class=" wt-btncancel fa fa-times" data-dismiss="modal" aria-label="Close"></i>
													</h2>
												</div>
												<div class="wt-modalbody modal-body">
													<form method="POST" action="#" class="wt-formtheme wt-userform">
														<fieldset>

															<div class="form-group ">
																<input type="text" name="mtitle" class="form-control" placeholder="Describe your milestone*" required  >
															</div>
															<div class="form-group ">
																<input type="number" name="mamount" class="form-control" placeholder="Amount *" required>
																<input type="hidden" name="pid" class="form-control" value="<?php echo $pid; ?>">
																<input type="hidden" name="psid" class="form-control" value="<?php echo $psid; ?>">
															
															</div>
															
															<!-- <div class="form-group ">
																From date
																<input type="date" name="startdate" class="form-control" placeholder="Starting Date *" required>
															</div>
															
															<div class="form-group ">
																Till date
																<input type="date" name="enddate" class="form-control" placeholder="Ending Date *" required>
															</div> -->
															
															<!-- <div class="form-group">
																<textarea name="desc1" class="form-control" placeholder="Your Job Description" ></textarea>
															</div> -->
															<div class="form-group wt-btnarea">

																<input type="submit" style=" text-transform: none;  border: 0px; " class="wt-btn do-login-button" value="Add milestone">
														
															</div>
														</fieldset>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- ----------------- Modal Box End -->

<!-- -------------- Hired Freelancer ------------- -->

<?php 		if ($psid != "1"){ 			?>

									

<div class="wt-rcvproposalholder wt-hiredfreelancer wt-tabsinfo">
	<!-- <div class="wt-tabscontenttitle">
		<h2>Progress</h2>
	</div> -->


	<?php
			require('db.php');
			$sql11 = "SELECT * FROM project_user Where psid =$psid";
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
			
			<!-- <span class="wt-featuredtag"><img src="images/featured.png" alt=""
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
			</div> -->
			<div class="wt-rightarea wt-titlewithsearch">
				<form class="wt-formtheme wt-formsearch">
					<fieldset>
						<div class="form-group">
							<span class="wt-select">
								<select>
									<?php

									$per = ($cntt * 100) / $tttt;

									if ($per == 0){
										echo "<option value=''>Project Start</option>";
									}
									else if ($per == 100){
										echo "<option value=''>Project Completed</option>";
									}
									else {
										echo "<option value=''>$per% Completed</option>";
									}
									?>
									
									<!-- <option value="">Project Start</option>
									<option value="">50% Completed</option>
									<option value="">Project Completed</option> -->
								</select>
							</span>
							<?php 

							if ($per >= 100){
								
								if ($F_rat==0){
					
					?>

							<a href="#" class="wt-btn"  style="margin-top: 10px;"
								data-toggle="modal"
								data-target="#wt-projectmodalbox">My Review as Freelancer</a>

							<?php 
								}
								else {
									echo "&nbsp;<br><h5>Review already sent.</h5>";
								}
						
							}else{ ?>

								<a href="#" class="wt-searchgbtn"
								data-toggle="modal"
								data-target="#"><i
									class="fa fa-check"></i></a>

							<?php } ?>
						</div>
					</fieldset>
				</form>
				<div class="wt-hireduserstatus">
					<h5>&#36;<?php echo $budget; ?> <?php if ($typepost == "Hourly") {echo " per hour";}?></h5>
					<span>In <?php echo $p_duration; ?></span>
				</div>
				<!-- <div class="wt-hireduserstatus">
					<i class="far fa-envelope"></i>
					<span>Cover Letter</span>
				</div> -->
				<!-- <div class="wt-hireduserstatus">
					<i class="fa fa-paperclip"></i>
					<span>03 file attached</span>
				</div> -->
			</div>
		</div>
	</div>
</div>


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
					<h2>Freelancer review to Employer<i class=" wt-btncancel fa fa-times" data-dismiss="modal" aria-label="Close"></i>
					</h2>
				</div>
				<div class="wt-modalbody modal-body">
					<form class="wt-formtheme wt-formfeedback" method="post" action="fr-jobprogress_code.php">
						<fieldset>
							<div class="form-group">
								<textarea class="form-control" name="feedback" id="feedback"placeholder="Add Your Feedback*"></textarea>
							</div>
							<div class="form-group wt-ratingholder" style="flex-direction: column; background-color: #eee;">
								<!-- <div class="wt-ratepoints">
									<div class="counter wt-pointscounter">5.0</div>
									<div id="wt-jrate" class="wt-jrate"></div>
								</div> -->
								<div class="div" >
									
									<input type="hidden" id="php1_hidden" value="1">
									<img src="images/star2.png" onmouseover="change(this.id);" id="php1" class="php" style="width: 25px; height: 25px;" >
									<input type="hidden" id="php2_hidden" value="2">
									<img src="images/star2.png" onmouseover="change(this.id);" id="php2" class="php" style="width: 25px; height: 25px;" >
									<input type="hidden" id="php3_hidden" value="3">
									<img src="images/star2.png" onmouseover="change(this.id);" id="php3" class="php" style="width: 25px; height: 25px;" >
									<input type="hidden" id="php4_hidden" value="4">
									<img src="images/star2.png" onmouseover="change(this.id);" id="php4" class="php" style="width: 25px; height: 25px;" >
									<input type="hidden" id="php5_hidden" value="5">
									<img src="images/star2.png" onmouseover="change(this.id);" id="php5" class="php" style="width: 25px; height: 25px;" >
								</div>
								<span class="wt-ratingdescription">How was my proffesional behaviour?</span>
							</div>
							<div class="form-group wt-ratingholder" style="flex-direction: column; background-color: #eee;">
								<div class="div" >
									
									<input type="hidden" id="asp1_hidden" value="1">
									<img src="images/star2.png" onmouseover="change(this.id);" id="asp1" class="asp" style="width: 25px; height: 25px;" >
									<input type="hidden" id="asp2_hidden" value="2">
									<img src="images/star2.png" onmouseover="change(this.id);" id="asp2" class="asp" style="width: 25px; height: 25px;" >
									<input type="hidden" id="asp3_hidden" value="3">
									<img src="images/star2.png" onmouseover="change(this.id);" id="asp3" class="asp" style="width: 25px; height: 25px;" >
									<input type="hidden" id="asp4_hidden" value="4">
									<img src="images/star2.png" onmouseover="change(this.id);" id="asp4" class="asp" style="width: 25px; height: 25px;" >
									<input type="hidden" id="asp5_hidden" value="5">
									<img src="images/star2.png" onmouseover="change(this.id);" id="asp5" class="asp" style="width: 25px; height: 25px;" >
								</div>
								<span class="wt-ratingdescription">How was my work style?</span>
							</div>


							<div class="form-group wt-ratingholder" style="flex-direction: column; background-color: #eee;">
								<div class="div" >
									
									<input type="hidden" id="jsp1_hidden" value="1">
									<img src="images/star2.png" onmouseover="change(this.id);" id="jsp1" class="jsp" style="width: 25px; height: 25px;" >
									<input type="hidden" id="jsp2_hidden" value="2">
									<img src="images/star2.png" onmouseover="change(this.id);" id="jsp2" class="jsp" style="width: 25px; height: 25px;" >
									<input type="hidden" id="jsp3_hidden" value="3">
									<img src="images/star2.png" onmouseover="change(this.id);" id="jsp3" class="jsp" style="width: 25px; height: 25px;" >
									<input type="hidden" id="jsp4_hidden" value="4">
									<img src="images/star2.png" onmouseover="change(this.id);" id="jsp4" class="jsp" style="width: 25px; height: 25px;" >
									<input type="hidden" id="jsp5_hidden" value="5">
									<img src="images/star2.png" onmouseover="change(this.id);" id="jsp5" class="jsp" style="width: 25px; height: 25px;" >
								</div>
								<span class="wt-ratingdescription">Was I focused to deadline?</span>
							</div>


							<!-- <div class="form-group wt-ratingholder">
								<div class="wt-ratepoints">
									<div class="counterthree wt-pointscounter">5.0</div>
									<div id="wt-jratethree" class="wt-jrate"></div>
								</div>
								<span class="wt-ratingdescription">Was it worth it having my services?</span>
							</div> -->
							<input type="hidden" name="phprating" id="phprating" value="5">
							<input type="hidden" name="asprating" id="asprating" value="5">
							<input type="hidden" name="jsprating" id="jsprating" value="5">

							<input type="hidden" id="pid" name="pid" value="<?php echo $pid; ?>">

							<!-- <div class="form-group wt-btnarea">
								<a class="wt-btn" href="#">Send Feedback</a>
							</div> -->
							<input type="submit" value="Send Feedback" class="wt-btn" name="submit_rating" style="border: 0px;">
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php 
	include('footer_menu.php'); 
?>

	<script type="text/javascript">
  
		function change(id)
		{
			var cname=document.getElementById(id).className;
			var ab=document.getElementById(id+"_hidden").value;
			document.getElementById(cname+"rating").value=ab;

			for(var i=ab;i>=1;i--)
			{
				document.getElementById(cname+i).src="images/star2.png";
			}
			var id=parseInt(ab)+1;
			for(var j=id;j<=5;j++)
			{
				document.getElementById(cname+j).src="images/star1.png";
			}
		}

	</script>

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
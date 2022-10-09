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
				<section class="wt-haslayout">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
						</div>


						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">


						<?php
							$msg="";
                            //------------------ Delete Skill -----------------------
							                          
                            if (isset($_REQUEST['id'])){

                                //session_start();				
                                $id = ($_REQUEST['id']);
                            
                                $email = $_SESSION["username"];      

                                                        
                                require('db.php');

                                $msg="";
                                
                                $sql="DELETE FROM user_experience WHERE email='$email' AND id=$id " ;
                                
                                if($result = $conn->query($sql))
                                {
                                    $msg="Deleted successfully";
                                } else {
                                    $msg= "Some Error when deleting!";
                                
                                    
                                }
                            }
                            //------------------ Insert Skill -----------------------
							
                                if (isset($_POST['company_name'])){

                                    //session_start();				
                                    $company_name = ($_POST['company_name']);
                                    $job_title = ($_POST['job_title']);
                                    $startdate = ($_POST['startdate']);
                                    $enddate = ($_POST['enddate']);
                                    $desc1 = ($_POST['desc1']);
                                    
                                    $email = $_SESSION["username"];      

                                                            
                                    require('db.php');

                                   
                                    
                                    // $sql="SELECT * FROM user_skills WHERE email='$email' AND company_name='$company_name' " ;
                                    // $result = $conn->query($sql);

                                    // if($row = $result->fetch_assoc())
                                    // {
                                    //     $msg="Skill already exists";
                                    // } else {


                                        try {
                                            $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                                            // set the PDO error mode to exception
                                            $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            

                                                $stmt = $conn1->prepare("INSERT INTO user_experience(email,  company_name,  job_title,  startdate,  enddate,  desc1) 
                                                                                        VALUES (:email, :company_name, :job_title, :startdate, :enddate, :desc1)");

                                                $stmt->bindParam(':email', $email);
                                                $stmt->bindParam(':company_name', $company_name);	
                                                $stmt->bindParam(':job_title', $job_title);
												$stmt->bindParam(':startdate', $startdate);
												$stmt->bindParam(':enddate', $enddate);
												$stmt->bindParam(':desc1', $desc1);
                                               

                                                
                                                if ($stmt->execute() === TRUE) {
                                                                
                                                   
                                                    $msg='Experience added successfully';
                                                    
                                                } else {
                                                    $msg= "Some Error when adding data!";
                                                
                                                    
                                                }
                                                
                                            
                                            
                                        } catch(PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    // }

									
								}

                                if ($msg != ""){
                                    ?>
                                            <div class="wt-jobalertsholder" style="margin-top: 20px; margin-bottom: -30px;">
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
							?>



							<div class="wt-haslayout wt-dbsectionspace">
								<div class="wt-dashboardbox wt-dashboardtabsholder">
									<div class="wt-dashboardboxtitle"><a href="dashboard-freelancer.php" style="float: right;"> Back </a> 
										<h2>Edit Profile</h2> 
									</div>
						<div class="wt-dashboardtabs">
							<ul class="wt-tabstitle nav navbar-nav">
								<li class="nav-item"><a href="dashboard-profile.php">Personal Details</a></li>
								<li class="nav-item"><a href="dashboard-profile-skill.php">Skills</a></li>
								<li class="nav-item"><a class="active" href="dashboard-profile-exp.php">Work Experience</a></li>
								<li class="nav-item"><a href="dashboard-profile-edu.php">Education</a></li>
								<li class="nav-item"><a href="dashboard-profile-pro.php">Projects</a></li>
							</ul>
						</div>




						
									<div class="wt-tabscontent tab-content">
										
										<!-- -------- Work Experience Details ------------- -->
										<div class="wt-educationholder tab-pane active fade show" id="wt-experience">
											<div class="wt-userexperience wt-tabsinfo">
												<div class="wt-tabscontenttitle wt-addnew">
													<h2>Work Experience</h2>
													<!-- <a href="#">Add New</a> -->
												</div>
												<ul class="wt-experienceaccordion accordion">
												
												<?php
													$email = $_SESSION["username"]; 
													require('db.php');
				
													
													$sql="SELECT * FROM user_experience WHERE email='$email' order by id" ;
													$result = $conn->query($sql);
													
													while ($row = $result->fetch_assoc()) {
															
															$id =  $row['id'];
															$company_name =  $row['company_name'];
															$job_title =  $row['job_title'];
															$startdate =  $row['startdate'];
															$enddate =  $row['enddate'];
															$desc1 =  $row['desc1'];

															$startdate1 =  date("M Y", strtotime($startdate));  
															$enddate1 =  date("M Y", strtotime($enddate));  
															
														
												?>

												<li>
														<div class="wt-accordioninnertitle">
															<span id="accordioninnertitleb" data-toggle="collapse"
																data-target="#innertitleb"><?php echo $job_title; ?>
																<em>(<?php echo $startdate1; ?> - <?php echo $enddate1; ?>)</em></span>
															<div class="wt-rightarea">
																<!-- <a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	id="accordioninnertitleb" data-toggle="collapse"
																	data-target="#innertitleb" aria-expanded="true"><i
																		class="lnr lnr-pencil"></i></a> -->
																<a href="?id=<?php echo $id; ?>" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
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
													
												</ul>
											</div>
											
										</div>






										<!-- -------- Add Experience  ------------- -->
										<div class="wt-educationholder tab-pane active fade show" id="wt-experience">
											<div class="wt-userexperience wt-tabsinfo">
												<div class="wt-tabscontenttitle wt-addnew">
													<h2>Add Your Experience</h2>
													<!-- <a href="#">Add New</a> -->
												</div>
												<ul class="wt-experienceaccordion accordion">


												
													<li>
														<!-- ------------------ Add Experience ------------ -->
														<div class="wt-collapseexp collapse show" id="innertitle"
															aria-labelledby="accordioninnertitle"
															data-parent="#accordion" >


															<form method="POST" action="#" class="wt-formtheme wt-userform">
																<fieldset>

																	<div class="form-group ">
																		<input type="text" name="company_name" class="form-control" placeholder="Company Title *" required  >
																	</div>
																	<div class="form-group ">
																		<input type="text" name="job_title" class="form-control" placeholder="Your Job Title *" required>
																	</div>
																	
																	<div class="form-group ">
																		From date
																		<input type="date" name="startdate" class="form-control" placeholder="Starting Date *" required>
																	</div>
																	
																	<div class="form-group ">
																		Till date
																		<input type="date" name="enddate" class="form-control" placeholder="Ending Date *" required>
																	</div>
																	
																	<div class="form-group">
																		<textarea name="desc1" class="form-control" placeholder="Your Job Description" ></textarea>
																	</div>
																	<div class="form-group wt-btnarea">

																		<input type="submit" style=" text-transform: none;  border: 0px; " class="wt-btn do-login-button" value="Add Work Experience">
																
																	</div>
																</fieldset>
															</form>


														</div>
													</li>
													
													
												</ul>
											</div>
											
										</div>

									</div>
								</div>
							</div>
							<div class="wt-updatall">
								<i class="ti-announcement"></i>
								<span>Update all the latest changes made by you.
									<!-- , by just clicking on “Save &amp;	Continue” button. -->
								</span>
								<!-- <a class="wt-btn" href="#">Save &amp; Update</a> -->
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
							<div class="wt-haslayout wt-dbsectionspace wt-codescansidebar">
								<!-- <div class="tg-authorcodescan wt-codescanholder">
									<!-- <figure class="tg-qrcodeimg">
										<img src="images/qrcode.png" alt="">
									</figure>
									<div class="tg-qrcodedetail">
										<span class="lnr lnr-laptop-phone"></span>
										<div class="tg-qrcodefeat">
											<h3>Scan with your <span>Smart Phone </span> To Get It Handy.</h3>
										</div>
									</div> -->

									<!-- <div class="wt-codescanicons">
										<span>Share Your Profile</span>
										<ul class="wt-socialiconssimple">
											<li class="wt-facebook"><a href="#"><i
														class="fa fa-facebook-f"></i></a></li>
											<li class="wt-twitter"><a href="#"><i
														class="fab fa-twitter"></i></a></li>
											<li class="wt-linkedin"><a href="#"><i
														class="fab fa-linkedin-in"></i></a></li>
											<li class="wt-clone"><a href="#"><i
														class="far fa-clone"></i></a></li>
										</ul>
									</div> 
								</div> -->
								<!-- <div class="wt-companyad">
									<figure class="wt-companyadimg"><img src="images/add-img.jpg" alt=""></figure>
									<span>Advertisement 255px X 255px</span>
								</div> -->
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
include ('footer_mobile.php');
?>


	<!--Wrapper End-->
	<script src="js/vendor/jquery-3.3.1.js"></script>
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script
		src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
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
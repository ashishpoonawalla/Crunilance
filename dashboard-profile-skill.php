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
				<section class="wt-haslayout" style="min-height: 600px;">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
						</div>


						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">


							<?php
                            //------------------ Delete Skill -----------------------
                                  
                            $msg="";
                            
                            if (isset($_REQUEST['sid'])){

                                //session_start();				
                                $sid = ($_REQUEST['sid']);
                            
                                $email = $_SESSION["username"];      

                                                        
                                require('db.php');

                                $msg="";
                                
                                $sql="DELETE FROM user_skills WHERE email='$email' AND id=$sid " ;
                                
                                if($result = $conn->query($sql))
                                {
                                    $msg="Skill Deleted";
                                } else {
                                    $msg= "Some Error when deleting skill!";
                                
                                    
                                }
                            }
                            //------------------ Insert Skill -----------------------
                            
                                if (isset($_POST['skill_name'])){

                                    //session_start();				
                                    $skill_name = ($_POST['skill_name']);
                                    $skill_rate = ($_POST['skill_rate']);
                                    
                                    $email = $_SESSION["username"];      

                                                            
                                    require('db.php');

                                   
                                    
                                    $sql="SELECT * FROM user_skills WHERE email='$email' AND skill_name='$skill_name' " ;
                                    $result = $conn->query($sql);

                                    if($row = $result->fetch_assoc())
                                    {
                                        $msg="Skill already exists";
                                    } else {


                                        try {
                                            $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                                            // set the PDO error mode to exception
                                            $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            

                                                $stmt = $conn1->prepare("INSERT INTO user_skills(email,  skill_name,  skill_rate) 
                                                                                        VALUES (:email, :skill_name, :skill_rate)");

                                                $stmt->bindParam(':email', $email);
                                                $stmt->bindParam(':skill_name', $skill_name);	
                                                $stmt->bindParam(':skill_rate', $skill_rate);
                                               

                                                
                                                if ($stmt->execute() === TRUE) {
                                                                
                                                   
                                                    $msg='Skill added successfully';
                                                    
                                                } else {
                                                    $msg= "Some Error when creating skill!";
                                                
                                                    
                                                }
                                                
                                            
                                            
                                        } catch(PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    }

									
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
								<li class="nav-item"><a class="active" href="dashboard-profile-skill.php">Skills</a></li>
								<li class="nav-item"><a href="dashboard-profile-exp.php">Work Experience</a></li>
								<li class="nav-item"><a href="dashboard-profile-edu.php">Education</a></li>
								<li class="nav-item"><a href="dashboard-profile-pro.php">Projects</a></li>
							</ul>
						</div>



						
									<div class="wt-tabscontent tab-content">
										
										<!-- -------- Skill & Location Details ------------- -->

										<div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
											<div class="wt-skills">
												<div class="wt-tabscontenttitle">
													<h2>Your Skills</h2>
												</div>
												<div class="wt-skillscontent-holder">
													<form method="POST" action="#" class="wt-formtheme wt-skillsform">
														<fieldset>
															<div class="form-group">
																<div class="form-group-holder">
																	<span class="wt-select" >
                                                                        <select name='skill_name' >
                                                                    <?php
                                                                        require('db.php');
                                                                    
                                                                        $sql111 = "SELECT * FROM skills";
                                                                        $result111 = $conn->query($sql111);
                                                                        
                                                                        while ($row111 = $result111->fetch_assoc()) {
                                                                           
                                                                            $skill =  $row111['skill'];
                                                                            echo "<option value='$skill'>$skill</option>";
                                                                        }
																    ?>
                                                                    
																		</select>
																	</span>
																	<input type="number" name="skill_rate" min="0" max="100"
																		class="form-control" required
																		placeholder="Rate Your Skill (0% to 100%)">
																</div>
															</div>
															<div class="form-group wt-btnarea">

                                                                <input type="submit" style="width: 100%; text-transform: none;  border: 0px; " class="wt-btn do-login-button" value="Add Skills">
														
															</div>
														</fieldset>
													</form>
													<div class="wt-myskills">
														<ul class="sortable list">
															
                                                            <?php
                                                               $email = $_SESSION["username"]; 
                                                               require('db.php');
                           
                                                              
                                                               $sql="SELECT * FROM user_skills WHERE email='$email' order by skill_name" ;
                                                               $result = $conn->query($sql);
                                                               
                                                               while ($row = $result->fetch_assoc()) {
                                                                
                                                                $sid =  $row['id'];
                                                                $skill_name =  $row['skill_name'];
                                                                $skill_rate =  $row['skill_rate'];

                                                                    
                                                                    
                                                            ?>
                                                        
                                                        
                                                        
                                                            <li>
																<div class="wt-dragdroptool">
																	<a href="javascript:void(0)"
																		class="lnr lnr-menu"></a>
																</div>
																<span class="skill-dynamic-html"><?php echo $skill_name; ?> (<em
																		class="skill-val"><?php echo $skill_rate; ?></em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<!-- <a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a> -->
																	<a href="?sid=<?php echo $sid; ?>"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															
															<?php } ?>
															
														</ul>
													</div>
												</div>
											</div>
											
											

											


											<!-- <div class="wt-tabcompanyinfo wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Company Details</h2>
												</div>
												<div class="wt-accordiondetails">
													<div class="wt-radioboxholder">
														<div class="wt-title">
															<h4>No. of employees you have</h4>
														</div>
														<span class="wt-radio">
															<input id="wt-just" type="radio" name="employees"
																value="company" checked>
															<label for="wt-just">It's just me</label>
														</span>
														<span class="wt-radio">
															<input id="wt-employees" type="radio" name="employees"
																value="company">
															<label for="wt-employees">2 - 9 employees</label>
														</span>
														<span class="wt-radio">
															<input id="wt-employees1" type="radio" name="employees"
																value="company">
															<label for="wt-employees1">10 - 99 employees</label>
														</span>
														<span class="wt-radio">
															<input id="wt-employees2" type="radio" name="employees"
																value="company">
															<label for="wt-employees2">100 - 499 employees</label>
														</span>
														<span class="wt-radio">
															<input id="wt-employees3" type="radio" name="employees"
																value="company">
															<label for="wt-employees3">500 - 1000 employees</label>
														</span>
														<span class="wt-radio">
															<input id="wt-employees4" type="radio" name="employees"
																value="company">
															<label for="wt-employees4">More than 1000 employees</label>
														</span>
													</div>

													<div class="wt-radioboxholder">
														<div class="wt-title">
															<h4>Your Department?</h4>
														</div>
														<span class="wt-radio">
															<input id="wt-department" type="radio" name="department"
																value="department" checked>
															<label for="wt-department">Customer Service or
																Operations</label>
														</span>
														<span class="wt-radio">
															<input id="wt-department1" type="radio" name="department"
																value="department">
															<label for="wt-department1">Finance or Legal</label>
														</span>
														<span class="wt-radio">
															<input id="wt-department2" type="radio" name="department"
																value="department">
															<label for="wt-department2">Engineering or Product
																Management</label>
														</span>
														<span class="wt-radio">
															<input id="wt-department3" type="radio" name="department"
																value="department">
															<label for="wt-department3">Marketing or Sales</label>
														</span>
														<span class="wt-radio">
															<input id="wt-department4" type="radio" name="department"
																value="department">
															<label for="wt-department4">Human Resources</label>
														</span>
														<span class="wt-radio">
															<input id="wt-department5" type="radio" name="department"
																value="department">
															<label for="wt-department5">Other</label>
														</span>
													</div>
												</div>
											</div> -->


											
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
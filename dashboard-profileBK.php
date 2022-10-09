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
								if (isset($_REQUEST['msg'])){
									
									$msg = $_REQUEST['msg'];

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
								}
							?>


							<div class="wt-haslayout wt-dbsectionspace">
								<div class="wt-dashboardbox wt-dashboardtabsholder">
									<div class="wt-dashboardboxtitle"><a href="dashboard-freelancer.php" style="float: right;"> Back </a> 
										<h2>Edit Profile</h2> 
									</div>
						<div class="wt-dashboardtabs">
							<ul class="wt-tabstitle nav navbar-nav">
								<li class="nav-item">
									<a class="active" data-toggle="tab" href="#wt-personal">Personal Details</a>
								</li>
								<li class="nav-item"><a data-toggle="tab" href="#wt-skills">Skills</a></li>
								<li class="nav-item"><a data-toggle="tab" href="#wt-experience">Work Experience</a></li>
								<li class="nav-item"><a data-toggle="tab" href="#wt-education">Education</a></li>
								<li class="nav-item"><a data-toggle="tab" href="#wt-projects">Projects</a></li>
							</ul>
						</div>



<?php

				
    $uname = $_SESSION["username"] ;
                    
    require('db.php');
   
    $sql="SELECT * FROM user_info WHERE email='$uname'  " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
                   
            $first_name = $row["first_name"];
            $details = $row["details"];
            $country = $row["country"];
            $usertype = $row["usertype"];
            $hrate = $row["hrate"];
            $utagline = $row["utagline"];
        
    
			$countryName="";
			$sql11 = "SELECT * FROM countries Where c_code ='$country'";
			$result11 = $conn->query($sql11);
			if ($row11 = $result11->fetch_assoc()) {
				$countryName =  $row11['country_name'];
			}
    } 
    
?>
						
									<div class="wt-tabscontent tab-content">
										<!-- -------- Personal Details ------------- -->

										<div class="wt-personalskillshold tab-pane active fade show" id="wt-personal">
											<div class="wt-yourdetails wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Your Details</h2>
												</div>
												<form method="POST" action="dashboard-profile_update.php" class="wt-formtheme wt-userform">
													<fieldset>
														<!-- <div class="form-group form-group-half">
															<span class="wt-select">
																<select>
																	<option value="" disabled="">Select Gender</option>
																	<option value="">Male</option>
																	<option value="">Female</option>
																</select>
															</span>
														</div> -->
														<div class="form-group form-group-half">
															<input type="text" name="first_name" class="form-control" style="color: #555; "
																value="<?php echo $first_name; ?>" placeholder="first_name">
														</div>
														
														<div class="form-group form-group-half">
															<input type="number" name="hrate" class="form-control" min="1" style="color: #555; "
																value="<?php echo $hrate; ?>" placeholder="Your Service Hourly Rate ($)">
														</div>

														<div class="form-group">
															<input type="text" name="utagline" class="form-control" style="color: #555; "
																value="<?php echo $utagline; ?>" placeholder="Add Your Tagline Here">
														</div>
														<div class="form-group">
															<textarea name="details" class="form-control" style="color: #555; "
																placeholder="Description"><?php echo $details; ?></textarea>
														</div>
														<div class="form-group">
															<input type="submit" style=" text-transform: none; border: 0px; " class="wt-btn" value="Update">
														</div>
													</fieldset>

												</form>
											</div>
											
											<!-- -------- Country ------ -->
											<!-- <div class="wt-location wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Your Location</h2>
												</div>
												<form class="wt-formtheme wt-userform">
													<fieldset>
														<div class="form-group form-group-half">
															<span class="wt-select">
																<select>
																	<option value="">United States</option>
																	<option value="">China</option>
																	<option value="">India</option>
																</select>
															</span>
														</div>
														
													</fieldset>
												</form>
											</div> -->

											<div class="wt-profilephoto wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Public Profile Photo</h2>
												</div>
												<div class="wt-profilephotocontent">
													
													<form action="dashboard-profile_img.php?img_num="  method="post" enctype="multipart/form-data" class="wt-formtheme wt-formprojectinfo wt-formcategory">
														<fieldset>
															<div class="form-group form-group-label">
																
																<input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
																		
															</div>

															
															<div class="form-group">
																<ul class="wt-attachfile wt-attachfilevtwo">
																	<li
																		class="wt-uploadingholder wt-companyimg-uploading">
																		<div class="wt-uploadingbox">
																			<figure>

																			<img alt="" src="./assets/imagesu/<?php echo $uname; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$uname.'.jpg'); ?>" style="height: 200px; width: 200px; object-fit: cover;">

																			</figure>
																			
																		</div>
																	</li>
																	
																</ul>
															</div>
														</fieldset>
													</form>
													
												</div>
											</div>

											<div class="wt-profilephoto wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Identity (Aadhar/PAN/Passport) </h2>*ID is only use for verification. Hide in public profile.
												</div>
												<div class="wt-profilephotocontent">
													
													<form action="dashboard-profile_imgID.php?img_num=1"  method="post" enctype="multipart/form-data" class="wt-formtheme wt-formprojectinfo wt-formcategory">
														<fieldset>
															<div class="form-group form-group-label">
																
																<input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
																		
															</div>

															
															<div class="form-group">
																<ul class="wt-attachfile wt-attachfilevtwo">
																	<li
																		class="wt-uploadingholder wt-companyimg-uploading" style="height: 200px;  width: auto;">
																		<div class="wt-uploadingbox" style="height: 200px;  width: auto;">
																			<figure style="height: 200px;  width: auto;">

																			<img alt="" src="./assets/imagesu/<?php echo $uname; ?>1.jpg?t=<?php echo filemtime('./assets/imagesu/'.$uname.'1.jpg'); ?>" style="height: 200px;  width: auto;">

																			</figure>
																			
																		</div>
																	</li>
																	
																</ul>
															</div>
														</fieldset>
													</form>
													
												</div>
											</div>

											<div class="wt-profilephoto wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Identity 2(Aadhar/PAN/Passport) </h2>*ID is only use for verification. Hide in public profile.
												</div>
												<div class="wt-profilephotocontent">
													
													<form action="dashboard-profile_imgID.php?img_num=2"  method="post" enctype="multipart/form-data" class="wt-formtheme wt-formprojectinfo wt-formcategory">
														<fieldset>
															<div class="form-group form-group-label">
																
																<input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
																		
															</div>

															
															<div class="form-group">
																<ul class="wt-attachfile wt-attachfilevtwo">
																	<li
																		class="wt-uploadingholder wt-companyimg-uploading" style="height: 200px;  width: auto;">
																		<div class="wt-uploadingbox" style="height: 200px;  width: auto;">
																			<figure style="height: 200px;  width: auto;">

																			<img alt="" src="./assets/imagesu/<?php echo $uname; ?>2.jpg?t=<?php echo filemtime('./assets/imagesu/'.$uname.'2.jpg'); ?>" style="height: 200px;  width: auto;">

																			</figure>
																			
																		</div>
																	</li>
																	
																</ul>
															</div>
														</fieldset>
													</form>
													
												</div>
											</div>

											
											<!-- <div class="wt-bannerphoto wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Banner Photo</h2>
												</div>
												<div class="wt-profilephotocontent">
													<div class="wt-description">
														<p>Consectetur adipisicing elit, sed do eiusmod tempor
															incididunt ut labore et dolore magna aliqua aut enim ad
															minim veniamac quis nostrud exercitation ullamco laboris.
														</p>
													</div>
													<form class="wt-formtheme wt-formprojectinfo wt-formcategory">
														<fieldset>
															<div class="form-group form-group-label">
																<div class="wt-labelgroup">
																	<label for="filew">
																		<span class="wt-btn">Select Files</span>
																		<input type="file" name="file" id="filew">
																	</label>
																	<span>Drop files here to upload</span>
																	<em class="wt-fileuploading">Uploading<i
																			class="fa fa-spinner fa-spin"></i></em>
																</div>
															</div>
															<div class="form-group">
																<ul class="wt-attachfile wt-attachfilevtwo">
																	<li class="wt-uploadingholder">
																		<div class="wt-uploadingbox">
																			<div class="wt-designimg">
																				<input id="demoq" type="radio"
																					name="employees" value="company"
																					checked="">
																				<label for="demoq"><img
																						src="images/company/img-10.jpg"
																						alt=""><i
																						class="fa fa-check"></i></label>
																			</div>
																			<div class="wt-uploadingbar">
																				<span class="uploadprogressbar"></span>
																				<span>Banner Photo.jpg</span>
																				<em>File size: 300 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</div>
																		</div>
																	</li>
																</ul>
															</div>
														</fieldset>
													</form>
												</div>
											</div> -->


											<!-- <div class="wt-location wt-tabsinfo">
												<div class="wt-tabscontenttitle">
													<h2>Your Location</h2>
												</div>
												<form class="wt-formtheme wt-userform">
													<fieldset>
														<div class="form-group form-group-half">
															<span class="wt-select">
																<select>
																	<option value="">United States</option>
																	<option value="">China</option>
																	<option value="">India</option>
																</select>
															</span>
														</div>
														<div class="form-group form-group-half">
															<input type="text" name="address" class="form-control"
																placeholder="Your Address">
														</div>
														<div class="form-group wt-formmap">
															<div id="wt-locationmap" class="wt-locationmap"></div>
														</div>
														<div class="form-group form-group-half">
															<input type="text" name="text" class="form-control"
																placeholder="Enter Longitude (Optional)">
														</div>
														<div class="form-group form-group-half">
															<input type="text" name="text" class="form-control"
																placeholder="Enter Latitude (Optional)">
														</div>
													</fieldset>
												</form>
											</div> -->


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


											<!-- <div class="wt-skills">
												<div class="wt-tabscontenttitle">
													<h2>My Skills</h2>
												</div>
												<div class="wt-skillscontent-holder">
													<form class="wt-formtheme wt-skillsform">
														<fieldset>
															<div class="form-group">
																<div class="form-group-holder">
																	<span class="wt-select">
																		<select>
																			<option value="">Select Your Skill</option>
																			<option value="">HTML</option>
																			<option value="">PHP</option>
																			<option value="">JQUERY</option>
																		</select>
																	</span>
																	<input type="number" name="rate"
																		class="form-control"
																		placeholder="Rate Your Skill (0% to 100%)">
																</div>
															</div>
															<div class="form-group wt-btnarea">
																<a href="#" class="wt-btn">Add
																	Skills</a>
															</div>
														</fieldset>
													</form>
													<div class="wt-myskills">
														<ul class="sortable list">
															<li>
																<div class="wt-dragdroptool">
																	<a href="javascript:void(0)"
																		class="lnr lnr-menu"></a>
																</div>
																<span class="skill-dynamic-html">PHP (<em
																		class="skill-val">90</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Website Design (<em
																		class="skill-val">55</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">HTML 5 (<em
																		class="skill-val">90</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Graphic Design (<em
																		class="skill-val">80</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Rate Your Skill (<em
																		class="skill-val">10</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">SEO (<em
																		class="skill-val">35</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">My SQL (<em
																		class="skill-val">40</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Content Writing (<em
																		class="skill-val">80</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">CSS (<em
																		class="skill-val">80</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Jquery (<em
																		class="skill-val">75</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Bootstrap (<em
																		class="skill-val">96</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div> -->
										</div>

										<!-- -------- Skill & Location Details ------------- -->

										<div class="wt-personalskillshold tab-pane fade" id="wt-skills">
											<div class="wt-skills">
												<div class="wt-tabscontenttitle">
													<h2>Your Skills</h2>
												</div>
												<div class="wt-skillscontent-holder">
													<form class="wt-formtheme wt-skillsform">
														<fieldset>
															<div class="form-group">
																<div class="form-group-holder">
																	<span class="wt-select">
																		<select>
																			<option value="">Select Your Skill</option>
																			<option value="">HTML</option>
																			<option value="">PHP</option>
																			<option value="">JQUERY</option>
																		</select>
																	</span>
																	<input type="number" name="rate"
																		class="form-control"
																		placeholder="Rate Your Skill (0% to 100%)">
																</div>
															</div>
															<div class="form-group wt-btnarea">
																<a href="#" class="wt-btn">Add
																	Skills</a>
															</div>
														</fieldset>
													</form>
													<div class="wt-myskills">
														<ul class="sortable list">
															<li>
																<div class="wt-dragdroptool">
																	<a href="javascript:void(0)"
																		class="lnr lnr-menu"></a>
																</div>
																<span class="skill-dynamic-html">PHP (<em
																		class="skill-val">90</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Website Design (<em
																		class="skill-val">55</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">HTML 5 (<em
																		class="skill-val">90</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Graphic Design (<em
																		class="skill-val">80</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">Rate Your Skill (<em
																		class="skill-val">10</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">SEO (<em
																		class="skill-val">35</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															<li>
																<div class="wt-dragdroptool handle"><a
																		href="javascript:void(0)"
																		class="lnr lnr-menu"></a></div>
																<span class="skill-dynamic-html">My SQL (<em
																		class="skill-val">40</em>%)</span>
																<span class="skill-dynamic-field">
																	<input type="text" name="skills[1][percentage]"
																		value="90">
																</span>
																<div class="wt-rightarea">
																	<a href="#" class="wt-addinfo"><i
																			class="lnr lnr-pencil"></i></a>
																	<a href="#"
																		class="wt-deleteinfo"><i
																			class="lnr lnr-trash"></i></a>
																</div>
															</li>
															
															
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

										<!-- -------- Work Experience Details ------------- -->
										<div class="wt-educationholder tab-pane fade" id="wt-experience">
											<div class="wt-userexperience wt-tabsinfo">
												<div class="wt-tabscontenttitle wt-addnew">
													<h2>Add Your Experience</h2>
													<a href="#">Add New</a>
												</div>
												<ul class="wt-experienceaccordion accordion">
													<li>
														<div class="wt-accordioninnertitle">
															<span id="accordioninnertitle" data-toggle="collapse"
																data-target="#innertitle">Web &amp; Apps Project
																Manager<em>(Jun 2017 - Jul 2018)</em></span>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	id="accordioninnertitle" data-toggle="collapse"
																	data-target="#innertitle" aria-expanded="true"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse show" id="innertitle"
															aria-labelledby="accordioninnertitle"
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
														</div>
													</li>
													<li>
														<div class="wt-accordioninnertitle">
															<span id="accordioninnertitlea" data-toggle="collapse"
																data-target="#innertitlea">Sr. PHP &amp; Laravel
																Developer<em>(Jun 2017 - Jul 2018)</em></span>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	id="accordioninnertitlea" data-toggle="collapse"
																	data-target="#innertitlea" aria-expanded="true"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse hide" id="innertitlea"
															aria-labelledby="accordioninnertitleaa"
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
														</div>
													</li>
													<li>
														<div class="wt-accordioninnertitle">
															<span id="accordioninnertitleb" data-toggle="collapse"
																data-target="#innertitleb">PHP &amp; Laravel Developer
																<em>(Apr 2016 - Jul 2017)</em></span>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	id="accordioninnertitleb" data-toggle="collapse"
																	data-target="#innertitleb" aria-expanded="true"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse hide" id="innertitleb"
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
														</div>
													</li>
												</ul>
											</div>
											
										</div>

										<!-- -------- Educational Details ------------- -->
										<div class="wt-educationholder tab-pane fade" id="wt-education">
											
											<div class="wt-userexperience">
												<div class="wt-tabscontenttitle wt-addnew">
													<h2>Add Your Education</h2>
													<a href="#">Add New</a>
												</div>
												<ul class="wt-experienceaccordion accordion">
													<li>
														<div class="wt-accordioninnertitle">
															<span id="accordioninnertitle1" data-toggle="collapse"
																data-target="#innertitle1">Web &amp; Apps Project
																Manager<em>(Jun 2017 - Jul 2018)</em></span>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	id="accordioninnertitle1" data-toggle="collapse"
																	data-target="#innertitle1" aria-expanded="true"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse show" id="innertitle1"
															aria-labelledby="accordioninnertitle1"
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
														</div>
													</li>
													<li>
														<div class="wt-accordioninnertitle">
															<span id="accordioninnertitlea2" data-toggle="collapse"
																data-target="#innertitlea2">Sr. PHP &amp; Laravel
																Developer<em>(Jun 2017 - Jul 2018)</em></span>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	id="accordioninnertitlea2" data-toggle="collapse"
																	data-target="#innertitlea2" aria-expanded="true"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse hide" id="innertitlea2"
															aria-labelledby="accordioninnertitleaa"
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
														</div>
													</li>
													<li>
														<div class="wt-accordioninnertitle">
															<span id="accordioninnertitleb3" data-toggle="collapse"
																data-target="#innertitleb3">PHP &amp; Laravel Developer
																<em>(Apr 2016 - Jul 2017)</em></span>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	id="accordioninnertitleb" data-toggle="collapse"
																	data-target="#innertitleb" aria-expanded="true"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse hide" id="innertitleb3"
															aria-labelledby="accordioninnertitleb3"
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
														</div>
													</li>
												</ul>
											</div>
										</div>


										<!-- -------- Projects Details ------------- -->
										<div class="wt-awardsholder tab-pane fade" id="wt-projects">
											<div class="wt-addprojectsholder wt-tabsinfo">
												<div class="wt-tabscontenttitle wt-addnew">
													<h2>Add Your Projects</h2>
													<a href="#">Add New</a>
												</div>
												<ul class="wt-experienceaccordion accordion">
													<li>
														<div class="wt-accordioninnertitle">
															<div class="wt-projecttitle collapsed"
																data-toggle="collapse" data-target="#innertitleaone">
																<figure><img src="images/thumbnail/img-11.jpg" alt="">
																</figure>
																<h3>Project Title Here<span>www.themeforest.net</span>
																</h3>
															</div>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	data-toggle="collapse"
																	data-target="#innertitleaone"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse" id="innertitleaone"
															aria-labelledby="accordioninnertitle"
															data-parent="#accordion">
															<form class="wt-formtheme wt-userform wt-formprojectinfo">
																<fieldset>
																	<div class="form-group form-group-half">
																		<input type="text" name="Project Title"
																			class="form-control"
																			placeholder="Project Title">
																	</div>
																	<div class="form-group form-group-half">
																		<input type="text" name="Project URL"
																			class="form-control"
																			placeholder="Project URL">
																	</div>
																	<div
																		class="form-group form-group-label wt-infouploading">
																		<div class="wt-labelgroup">
																			<label for="filen">
																				<span class="wt-btn">Select Files</span>
																				<input type="file" name="file"
																					id="filen">
																			</label>
																			<span>Drop files here to upload</span>
																			<em class="wt-fileuploading">Uploading<i
																					class="fa fa-spinner fa-spin"></i></em>
																		</div>
																	</div>
																	<div class="form-group">
																		<ul class="wt-attachfile">
																			<li class="wt-uploading">
																				<span>Logo.jpg</span>
																				<em>File size: 300 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Wireframe Document.doc</span>
																				<em>File size: 512 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Requirments.pdf</span>
																				<em>File size: 110 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Company Intro.docx</span>
																				<em>File size: 224 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																		</ul>
																	</div>
																	<div class="form-group wt-btnarea">
																		<a href="#"
																			class="wt-btn">Save</a>
																	</div>
																</fieldset>
															</form>
														</div>
													</li>
													<li>
														<div class="wt-accordioninnertitle">
															<div class="wt-projecttitle collapsed"
																data-toggle="collapse" data-target="#innertitlebone">
																<figure><img src="images/thumbnail/img-12.jpg" alt="">
																</figure>
																<h3>Project Title Here<span>www.themeforest.net</span>
																</h3>
															</div>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	data-toggle="collapse"
																	data-target="#innertitlebone"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse show" id="innertitlebone"
															aria-labelledby="accordioninnertitle1"
															data-parent="#accordion">
															<form class="wt-formtheme wt-userform wt-formprojectinfo">
																<fieldset>
																	<div class="form-group form-group-half">
																		<input type="text" name="Project Title"
																			class="form-control"
																			placeholder="Project Title">
																	</div>
																	<div class="form-group form-group-half">
																		<input type="text" name="Project URL"
																			class="form-control"
																			placeholder="Project URL">
																	</div>
																	<div
																		class="form-group form-group-label wt-infouploading">
																		<div class="wt-labelgroup">
																			<label for="filet">
																				<span class="wt-btn">Select Files</span>
																				<input type="file" name="file"
																					id="filet">
																			</label>
																			<span>Drop files here to upload</span>
																			<em class="wt-fileuploading">Uploading<i
																					class="fa fa-spinner fa-spin"></i></em>
																		</div>
																	</div>
																	<div class="form-group">
																		<ul class="wt-attachfile">
																			<li class="wt-uploading">
																				<span>Logo.jpg</span>
																				<em>File size: 300 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Wireframe Document.doc</span>
																				<em>File size: 512 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Requirments.pdf</span>
																				<em>File size: 110 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Company Intro.docx</span>
																				<em>File size: 224 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																		</ul>
																	</div>
																	<div class="form-group wt-btnarea">
																		<a href="#"
																			class="wt-btn">Save</a>
																	</div>
																</fieldset>
															</form>
														</div>
													</li>
													<li>
														<div class="wt-accordioninnertitle">
															<div class="wt-projecttitle collapsed"
																data-toggle="collapse" data-target="#innertitlecone">
																<figure><img src="images/thumbnail/img-13.jpg" alt="">
																</figure>
																<h3>Project Title Here<span>www.themeforest.net</span>
																</h3>
															</div>
															<div class="wt-rightarea">
																<a href="#"
																	class="wt-addinfo wt-skillsaddinfo"
																	data-toggle="collapse"
																	data-target="#innertitlecone"><i
																		class="lnr lnr-pencil"></i></a>
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</div>
														<div class="wt-collapseexp collapse" id="innertitlecone"
															aria-labelledby="accordioninnertitle1"
															data-parent="#accordion">
															<form class="wt-formtheme wt-userform wt-formprojectinfo">
																<fieldset>
																	<div class="form-group form-group-half">
																		<input type="text" name="Project Title"
																			class="form-control"
																			placeholder="Project Title">
																	</div>
																	<div class="form-group form-group-half">
																		<input type="text" name="Project URL"
																			class="form-control"
																			placeholder="Project URL">
																	</div>
																	<div
																		class="form-group form-group-label wt-infouploading">
																		<div class="wt-labelgroup">
																			<label for="fileb">
																				<span class="wt-btn">Select Files</span>
																				<input type="file" name="file"
																					id="fileb">
																			</label>
																			<span>Drop files here to upload</span>
																			<em class="wt-fileuploading">Uploading<i
																					class="fa fa-spinner fa-spin"></i></em>
																		</div>
																	</div>
																	<div class="form-group">
																		<ul class="wt-attachfile">
																			<li class="wt-uploading">
																				<span>Logo.jpg</span>
																				<em>File size: 300 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Wireframe Document.doc</span>
																				<em>File size: 512 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Requirments.pdf</span>
																				<em>File size: 110 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																			<li>
																				<span>Company Intro.docx</span>
																				<em>File size: 224 kb<a
																						href="#"
																						class="lnr lnr-cross"></a></em>
																			</li>
																		</ul>
																	</div>
																	<div class="form-group wt-btnarea">
																		<a href="#"
																			class="wt-btn">Save</a>
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
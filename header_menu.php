<!-- ---------------------------- Notifications --------------------- -->
<div id="notify" ></div>

<script src="https://cdn.jsdelivr.net/npm/@reliutg/buzz-notify/index.min.js"></script>

<script>
  
  function createNotification(msg) {
    Notify({ position: 'bottom left',type: 'danger', duration: 4000, title: msg  });
  
  }
</script>
<!-- ---------------------------- Notifications End --------------------- -->

<style>

/* ------------------------------------ style for bottom menu ------------- */
.nav12 {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 50px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: #ffffff;
    display: flex;
    overflow-x: auto;
}

.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 13px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
    color: #009578;
}

.nav__icon {
    font-size: 18px;
}

@media screen and (max-width: 4000px) {
  .nav12 {display: none;position: absolute;}
  
}
@media screen and (max-width: 990px) {
    .nav12 {display: flex;position: fixed;}
  
}






/* ------------------------------------ style for bottom menu ------------- */
        .input-icons i {
            position: absolute;
			left: auto; right: 20px;
			color: #ccc;
			margin-top: 4px;
        }
          
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }
          
        .icon {
            padding: 15px;
            min-width: 40px;
        }
          
        .input-field {
            width: 100%;
            padding: 10px;
          
        }
 






</style>

<?php
ob_start(); 
$user = "";

session_start();

	


//---------------------------------------------------
if (isset($_SESSION["username"])){
	$user = "wt-login";
}

$usertype = "";
if (isset($_SESSION['usertype'])){
	$usertype = $_SESSION['usertype'];
}
//$user = "";
?>

<body class="<?php echo $user; ?>" onload="readRecords()" >
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!-- Preloader Start -->
	<!-- <div class="preloader-outer">
		<div class="loader"></div>
	</div> -->
	<!-- Preloader End -->
	<!-- Wrapper Start -->






	<div id="wt-wrapper" class="wt-wrapper wt-haslayout" >
		<!-- Content Wrapper Start -->


		<div class="wt-contentwrapper" >

    
    
          <!-- Header Start -->
			<header id="wt-header" class="wt-header wt-haslayout" 
				style="position: fixed; background-color: #FAF9F6; 
				    animation: 700ms ease-in-out 0s normal none 1 running fadeInDown;
					box-shadow: 0 8px 20px 0 rgb(0 0 0 / 5%);
					transition: all 0.3s ease 0s;
					z-index: 999;
					position: fixed;
					top: 0;
					width: 100%;
					border-radius: 0px;
					
				    
				">
				<div class="wt-navigationarea">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<strong class="wt-logo"><a href="index.php"><img src="images/logo.png"
											alt="Crunilance"></a></strong>

                                
                                <!-- ------------------------ Menu -------------------- -->

								<div class="wt-rightarea">
									<nav id="wt-nav" class="wt-nav navbar-expand-lg">
										<button class="navbar-toggler" type="button" data-toggle="collapse"
											data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
											aria-label="Toggle navigation">
											<i class="lnr lnr-menu"></i>
										</button>
										<div class="collapse navbar-collapse wt-navigation" id="navbarNav">
											
										<!-- ------------------------ Search -------------------- -->


										<form method="POST" action="joblisting.php" class="wt-formtheme wt-formbanner wt-formbannervtwo"  >
                                                <fieldset>
                                                    <div class="form-group">

                                                        <input type="text" name="search" style="min-width: 500px;"class="form-control" 	placeholder="search job">

                                                        <div class="wt-formoptions"  >
                                                            <!-- <div class="wt-dropdown" >
                                                                <span>
																	In: <em class="selected-search-type">Jobs</em>
                                                                <i class="lnr lnr-chevron-down"></i></span>
                                                            </div> -->
                                                            <div class="wt-radioholder">
                                                                <!-- <span class="wt-radio">
                                                                    <input id="wt-freelancers" data-title="Freelancers" type="radio"
                                                                        name="searchtype" value="freelancer" >
                                                                    <label for="wt-freelancers">Freelancers</label>
                                                                </span>
                                                                <span class="wt-radio">
                                                                    <input id="wt-jobs" data-title="Jobs" type="radio"
                                                                        name="searchtype" value="job" checked="">
                                                                    <label for="wt-jobs">Jobs</label>
                                                                </span> -->
                                                                <!-- <span class="wt-radio">
                                                                    <input id="wt-companies" data-title="Companies" type="radio"
                                                                        name="searchtype" value="job">
                                                                    <label for="wt-companies">Companies</label>
                                                                </span> -->
                                                            </div>


                                                            <!-- <a href="joblisting.php" class="wt-searchbtn" ><i class="lnr lnr-magnifier" ></i></a> -->
															<button  class="wt-searchbtn"><i class="lnr lnr-magnifier" ></i></button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                            &nbsp;&nbsp;&nbsp;
										
										
											<ul class="navbar-nav">
												

												<?php if ($user == "") { ?>	
													
													<li class="menu-item-has-children ">
															<a href="userlisting.php">Find Talent</a>
													</li>

													<li class="menu-item-has-children ">
															<a href="joblisting.php">Find Work</i></a>
													</li>

													<li class="menu-item-has-children ">
															<a href="faq.php">Why Crunilance</a>
													</li>

												<?php } ?>

												<?php if ($usertype != 'Freelancer' && $user != "" ) { ?>

													<li class="menu-item-has-children page_item_has_children">

														<a href="#">Jobs</a>
															<ul class="sub-menu">
																
																<li class="nav-item">
																	<a href="dashboard-employer.php">Dashboard - All Jobs</a>
																</li>	
																<li class="nav-item">
																	<a href="my-jobs.php">Ongoing jobs</a>
																</li>
																
																<li class="nav-item">
																	<a href="dashboard-completedjobs.php">Completed jobs</a>
																</li>
																
																<li class="nav-item" >
																	<a href="job_post.php">Post a job</a>
																</li>

																
															</ul>

														</a>
													</li>	
												
												
													<li class="menu-item-has-children page_item_has_children">
														<a href="#">Freelancers</a>
														<ul class="sub-menu">
																<li class="nav-item" >
																	<a href="userlisting.php">Discover</a>
																</li>
																<li class="nav-item">
																	<a href="dashboard-yourhired.php">Your hires</a>
																</li>
																<!-- <li class="nav-item">
																	<a href="#">Recently viewed</a>
																</li> -->
																<li class="nav-item">
																	<a href="dashboard-savetalents.php">Saved talent</a>
																</li>
																<!-- <li class="nav-item">
																	<a href="#">Bring your own talent</a>
																</li> -->
															
																
															</ul>
													</li>
												<?php } ?>
												
											
											

											<?php if ($usertype != 'Employer'  && $user != "") { ?>
											
												<li class="menu-item-has-children page_item_has_children">
													<a href="#">Find Work</a>
													<ul class="sub-menu">
														<li>
															<a href="joblisting.php">Latest Jobs</a>
														</li>
														<li>
															<a href="dashboard-saveitems.php">Saved Jobs</a>
														</li>
														<li>
															<a href="dashboard-freelancer-bids.php">Proposals</a>
														</li>
														<li>
															<a href="dashboard-freelancer.php">Dashboard Freelancer</a>
														</li>
														
													</ul>
												</li>

												<li class="menu-item-has-children page_item_has_children">
													<a href="#">My Jobs</a>
													<ul class="sub-menu">
														<li>
															<a href="dashboard-my-jobs.php">My Jobs</a>
														</li>
														<li>
															<a href="fr-all-contracts.php">All Contracts</a>
														</li>
														<li>
															<a href="work-diary.php">Work Diary</a>
														</li>
														<!-- <li>
															<a href="my-stats.php">My Stats</a>
														</li> -->
														
													</ul>
												</li>
												
											<?php } ?>

											<?php if ($user != "") { ?>	

												<li class="menu-item-has-children page_item_has_children">
														<a href="#">Reports</a>
														<ul class="sub-menu">
															<li>
																<a href="dashboard-overview.php">
																	<span>Overviews</span>
																</a>
															</li>	

															<li>
																<a href="dashboard-addfund.php">
																	<span>Fund Add</span>
																</a>
															</li>
															
															<li>
																<a href="dashboard-earnings.php">
																	<span>Earnings</span>
																</a>
															</li>
															<li>
																<a href="dashboard-transactions.php">Transactions</a>
															</li>
															
															
															<!-- <li>
																<a href="dashboard-invocies.php">
																	<span>Invoices</span>
																</a>
															</li> -->

															
															
															
														</ul>
													</li>

											

												<li class="menu-item-has-children page_item_has_children">
													<a href="faq.php"><i class="fa fa-question-circle-o" style="font-size: 18px; "></i></a>
													<!-- <ul class="sub-menu">
														
                                                        <li class="nav-item">
                                                            <a href="howitworks.php">How It Works</a>
                                                        </li>

														<li>
															<a href="privacypolicy.php">Privacy Policy</a>
														</li>

														<li>
															<a href="termsofuses.php">Terms of uses</a>
														</li>

														<li>
															<a href="about.php">About us</a>
														</li>
														
														<li>
															<a href="contact.php">Contact us</a>
														</li>
														
														
														
													
													</ul> -->
												</li>


												<?php 
													//------------------------------------------------------ Notification           
													$cnt112=0;
													
														$un24 = $_SESSION["username"];

														require('db.php');


														$sql112="SELECT * FROM notifications Where ruid='$un24' AND status1='N'" ;
														// $sql112="SELECT * FROM notifications Where ruid='$un24' LIMIT 5" ;

														$result112 = $conn->query($sql112);

														$cnt112=0;
														while($row112 = $result112->fetch_assoc())
														{
															$cnt112++;
															
															$nmessage = $row112['nmessage'];
															$jobid = $row112['jobid'];
															$sfnm = $row112['sfnm'];
															$ntype = $row112['ntype'];
															
															if (isset($abc)){
																echo "<script>createNotification('$sfnm : $nmessage - $ntype '); </script>";
															}
															

														}
														$colr="#767676";
														if ($cnt112>0){
															$colr="Red";
														}
														
													?>
												<li class="menu-item-has-children ">
														<a href="notifications.php"><i class="far fa-bell" style="font-size: 18px; color: <?php echo $colr; ?>; "></i></a>
												</li>


												<li class="menu-item-has-children ">
														<a href="message.php"><i class="far fa-envelope" style="font-size: 18px; "></i></a>
												</li>

												
												<!-- <li class="menu-item-has-children ">
														<a href="#"><i class="far fa-bell" style="font-size: 18px; "></i></a>
												</li> -->

											<?php } ?>

											</ul>
										

										</div>
									</nav>



                               
								    <div class="wt-loginarea" >
										<!-- <figure class="wt-userimg">
											<img src="images/user-login.png" alt="">
										</figure> -->
										<div class="wt-loginoption">
										<!-- <a href="login.php" id="wt-loginbtn" class="wt-loginbtn" style=" ">Log in</a> -->
										
										<!-- <a href="login.php" id="wt-loginbtn" class="wt-loginbtn" style=" ">Log in</a> -->
											<div class="wt-loginformhold" >
												<div class="wt-loginheader">
													<span>Login</span>
													<a href="javascript:;"><i class="fa fa-times"></i></a>
												</div>
												<form action='login_code.php' method='POST' class="wt-formtheme wt-loginform do-login-form" >
													<fieldset>
														
                                                        <div class="form-group">
															<input type="text" name="username" class="form-control"
																placeholder="Email as username">
														</div>
														<div class="form-group">
															<input type="password" name="password" class="form-control"
																placeholder="Password">
														</div>
														<div class="wt-logininfo">
															<button type="submit" class="wt-btn do-login-button">Login</button>
															<span class="wt-checkbox">
																<input id="wt-login" type="checkbox" name="rememberme">
																<label for="wt-login">Keep me logged in</label>
															</span>
														</div>
													</fieldset>
													<img src="images/soc_1.png" alt="" style="margin-bottom: 10px; margin-left: 3px; width: 170px;">
													<img src="images/soc_2.png" alt="" style="margin-bottom: 10px; width: 170px;">
													
													<div class="wt-loginfooterinfo">
														<a href="passwordrecovery.php" class="wt-forgot-password">Forgot
															password?</a>
														<a href="signup.php">Create account</a>
													</div>
												</form>
												<form
													class="wt-formtheme wt-loginform do-forgot-password-form wt-hide-form">
													<fieldset>
														<div class="form-group">
															<input type="email" name="email"
																class="form-control get_password" placeholder="Email">
														</div>

														<div class="wt-logininfo">
															<a href="javascript:;" class="wt-btn do-get-password">Get
																Pasword</a>
														</div>
													</fieldset>
													<div class="wt-loginfooterinfo">
														<a href="#" class="wt-show-login">Login</a>
														<a href="register.php">Create account</a>
													</div>
												</form>
											</div>
										</div>
										<a href="login.php" class="wt-btn" style="text-transform: capitalize; color:#3B82F6; background-color: #fff;
										 
										 border: 1px solid #eee;
										 font-weight: normal;
										 margin-right: 0px;
										  ">
										Login</a>
										<a href="signup.php" class="wt-btn" style="text-transform: capitalize; font-weight: normal; ">Sign</a>
									</div>


                                

									<div class="wt-userlogedin" >
										<figure class="wt-userimg">
											<!-- <img src="images/user-img.jpg" alt="image description"> -->
											<?php
											$un = "";
											if (isset($_SESSION["username"])){
												$un = $_SESSION["username"];
											}
											?>
											<img alt="" src="./assets/imagesu/<?php echo $un; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$un.'.jpg'); ?>" style="height: 36px; width: 36px; border-radius:30px;  object-fit: cover;">&nbsp;
                  
										</figure>
										<div class="wt-username">
											<!-- <h3>Pooja</h3> -->
											<!-- <span>Amento Tech</span> -->
										</div>
										<nav class="wt-usernav">
											<ul>
												<!-- <li>
												<?php 
													if ($_SESSION["usertype"] == "Employer"){
														?>
														<a href="dashboard-employer.php">
															<span>Employer Dashboard</span>
														</a>
														<?php
													} else {
														?>
														<a href="dashboard-freelancer.php">
															<span>Freelancer Dashboard</span>
														</a>
														<?php
													}	
												?>
													
												</li> -->
												<li class="menu-item-has-children">
													<a href="#">
														<span>Work as</span>
													</a>
													<ul class="sub-menu">
													
														<li><a href="<?php if ($_SESSION['usertype'] != 'Employer'){ echo 'changetype1.php'; } else { echo '#'; } ?>">Employer 
															<?php 
															if ($_SESSION["usertype"] == "Employer"){
																?><i class="fa fa-check-circle"></i></a></li><?php
															}	
															?>
														<li><a href="<?php if ($_SESSION['usertype'] != 'Freelancer'){ echo 'changetype2.php'; } else { echo '#'; } ?>">Freelancer
															<?php 
															if ($_SESSION["usertype"] == "Freelancer"){
																?><i class="fa fa-check-circle"></i></a></li><?php
															}	
															?>
														</a>
														</li>
													</ul>
												</li>
												<!-- <li class="menu-item-has-children page_item_has_children">
												<a href="dashboard-freelancer.php">Insights User</a>
													<a href="#">
														<span>Insights</span>
													</a>
													<ul class="sub-menu children">
														<li><a href="dashboard-insights.php">Insights</a></li>
														<li><a href="dashboard-freelancer.php">Insights User</a></li>
													</ul>
												</li> -->
												<!-- <li>
													<a href="my-profile.php">
														<span>My Profile</span>
													</a>
												</li> -->
												<!-- <li class="menu-item-has-children">
													<a href="#">
														<span>All Jobs</span>
													</a>
													<ul class="sub-menu">
														<li><a href="dashboard-completejobs.php">Completed Jobs</a>
														</li>
														
														<li><a href="dashboard-ongoingjob.php">Ongoing Jobs</a></li>
														<li><a href="dashboard-ongoingsingle.php">Single Job</a>
														</li>
													</ul>
												</li> -->
												<!-- <li>
													<a href="dashboard-employer.php">
														<span>Manage Jobs</span>
													</a>
												</li> -->
												<!-- <li>
													<a href="dashboard-messages.php">
														<span>Messages</span>
													</a>
												</li> -->
												<!-- <li class="wt-notificationicon menu-item-has-children">
													<a href="#">
														<span>Messages</span>
													</a>
													<ul class="sub-menu">
														<li><a href="message.php">Messages</a></li>
														<li><a href="message.php">Messages V 2</a></li>
													</ul>
												</li> -->

												<!-- <li>
													<a href="dashboard-saveitems.php">
														<span>My Saved Items</span>
													</a>
												</li> -->
												<!-- <li>
													<a href="dashboard-invocies.php">
														<span>Invoices</span>
													</a>
												</li>
												<li>
													<a href="dashboard-earnings.php">
														<span>Earnings</span>
													</a>
												</li> -->
												<!-- <li>
													<a href="dashboard-category.php">
														<span>Category</span>
													</a>
												</li> -->
												<!-- <li>
													<a href="dashboard-packages.php">
														<span>Membership</span>
													</a>
												</li> -->
												<!-- <li>
													<a href="dashboard-proposals.php">
														<span>Proposals</span>
													</a>
												</li> -->
												<li>
													<a href="dashboard-membership.php">
														<span>Membership</span>
													</a>
												</li>
												<li>
													<a href="dashboard-accountsettings.php">
														<span>Settings</span>
													</a>
												</li>
												
												<!-- <li>
													<a href="dashboard-helpsupport.php">
														<span>Help &amp; Support</span>
													</a>
												</li> -->
												<li>
													<a href="logout.php">
														<span>Logout</span>
													</a>
												</li>
											</ul>
										</nav>
									</div>
                                   
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div style="height: 60px;">
			</div>
		  <!--Header End-->

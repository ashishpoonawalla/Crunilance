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
$user = "";

session_start();
if (isset($_SESSION["username"])){
	$user = "wt-login";
}

//$user = "";
?>

<body class="<?php echo $user; ?>" >
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
				style="position: fixed; background-color: #fff; 
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
											<ul class="navbar-nav">
												<li class="menu-item-has-children page_item_has_children">
													<a href="#">Main</a>
													<ul class="sub-menu">
														<li class="nav-item">
                                                            <a href="index.php">Home 1</a>
                                                        </li>
														<li class="nav-item">
                                                            <a href="index2.php">Home 2</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="howitworks.php">How It Works</a>
                                                        </li>


														<!-- <li class="menu-item-has-children page_item_has_children wt-notificationicon">
															<span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
															<a href="#">Home</a>
															<ul class="sub-menu">
																<li><a href="index-2.php">Home v1</a></li>
																<li class="wt-newnoti"><a href="indexvtwo.php">Home v2<em>without login</em></a></li>
															</ul>
														</li> -->


														<!-- <li class="menu-item-has-children page_item_has_children"><span
																class="wt-dropdowarrow"><i
																	class="lnr lnr-chevron-right"></i></span>
															<a href="#">Article</a>
															<ul class="sub-menu">
																<li><a href="articlelist.php">Article List</a></li>
																<li><a href="articlegrid.php">Article Grid</a></li>
																<li><a href="articlesingle.php">Article Single</a></li>
																<li><a href="articleclassic.php">Article Classic</a>
																</li>
															</ul>
														</li> -->


														<!-- <li class="menu-item-has-children page_item_has_children"><span
																class="wt-dropdowarrow"><i
																	class="lnr lnr-chevron-right"></i></span>
															<a href="#">Company</a>
															<ul class="sub-menu">
																<li><a href="companygrid.php">Company Grid</a></li>
																<li><a href="companysigle.php">Company Sigle</a></li>
															</ul>
														</li> -->

														
														<li>
															<a href="about.php">About us</a>
														</li>
														
														<li>
															<a href="contact.php">Contact us</a>
														</li>
														

														<li>
															<a href="privacypolicy.php">Privacy Policy</a>
														</li>

														<li>
															<a href="termsofuses.php">Terms of uses</a>
														</li>
														
														<li>
															<a href="faq.php">FAQ</a>
														</li>
														
													
													</ul>
												</li>
												
												<li class="menu-item-has-children page_item_has_children">
													<a href="#">Browse Jobs</a>
													<ul class="sub-menu">
														<li>
															<a href="joblisting.php">Job Listing</a>
														</li>
														<li class="current-menu-item">
															<a href="jobsingle.php">Job Single</a>
														</li>
														<li>
															<a href="jobproposal.php">Job Proposal</a>
														</li>
													</ul>
												</li>
												<li class="menu-item-has-children page_item_has_children">
													<a href="#">View Freelancers</a>
													<ul class="sub-menu">
														<li>
															<a href="userlisting.php">User Listing</a>
														</li>
														<li class="current-menu-item">
															<a href="usersingle.php">User Single</a>
														</li>
													</ul>
												</li>
											</ul>
										<!-- ------------------------ Search -------------------- -->


                                            <form class="wt-formtheme wt-formbanner wt-formbannervtwo"  >
                                                <fieldset>
                                                    <div class="form-group">

                                                        <input type="text" name="job" style="min-width: 500px;"class="form-control" 	placeholder="search job">

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
                                                            <a href="joblisting.php" class="wt-searchbtn" ><i class="lnr lnr-magnifier" ></i></a>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                            &nbsp;&nbsp;&nbsp;

										</div>
									</nav>



                               
								<div class="wt-loginarea">
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
										 margin-right: 10px;
										  ">
										Log in</a>
										<a href="signup.php" class="wt-btn" style="text-transform: capitalize; font-weight: normal; ">Sign Up</a>
									</div>


                                

									<div class="wt-userlogedin">
										<figure class="wt-userimg">
											<img src="images/user-img.jpg" alt="image description">
										</figure>
										<div class="wt-username">
											<!-- <h3>Pooja</h3> -->
											<!-- <span>Amento Tech</span> -->
										</div>
										<nav class="wt-usernav">
											<ul>
												<li>
													<a href="dashboard-freelancer.php">
														<span>Dashboard</span>
													</a>
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
												<li>
													<a href="dashboard-profile.php">
														<span>My Profile</span>
													</a>
												</li>
												<li class="menu-item-has-children">
													<a href="#">
														<span>All Jobs</span>
													</a>
													<ul class="sub-menu">
														<li><a href="dashboard-completejobs.php">Completed Jobs</a>
														</li>
														<!-- <li><a href="dashboard-canceljobs.php">Cancelled Jobs</a></li> -->
														<li><a href="dashboard-ongoingjob.php">Ongoing Jobs</a></li>
														<li><a href="dashboard-ongoingsingle.php">Single Job</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="dashboard-employer.php">
														<span>Manage Jobs</span>
													</a>
												</li>
												<li>
													<a href="dashboard-messages.php">
														<span>Messages</span>
													</a>
												</li>
												<!-- <li class="wt-notificationicon menu-item-has-children">
													<a href="#">
														<span>Messages</span>
													</a>
													<ul class="sub-menu">
														<li><a href="dashboard-messages.php">Messages</a></li>
														<li><a href="dashboard-messages2.php">Messages V 2</a></li>
													</ul>
												</li> -->

												<!-- <li>
													<a href="dashboard-saveitems.php">
														<span>My Saved Items</span>
													</a>
												</li> -->
												<li>
													<a href="dashboard-invocies.php">
														<span>Invoices</span>
													</a>
												</li>
												<!-- <li>
													<a href="dashboard-category.php">
														<span>Category</span>
													</a>
												</li> -->
												<li>
													<a href="dashboard-packages.php">
														<span>Packages</span>
													</a>
												</li>
												<!-- <li>
													<a href="dashboard-proposals.php">
														<span>Proposals</span>
													</a>
												</li> -->
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

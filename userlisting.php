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

	
$Query1=" Where usertype='Freelancer' " ;


//---------------------  Skills
	
$skillFr = array("any");

if (isset($_SESSION['skillFr'])){
	$skillFr = $_SESSION['skillFr'];
}

if (isset($_POST['skill'])){
	$skillFr = $_POST['skill'];
	$_SESSION['skillFr'] = $skillFr;
}


$kw_s = "";
$qqq="";
$jj=0;
foreach ($skillFr as $a1){

	if ($a1 == "any"){
		$jj=1;
		break;
	}


	if ($kw_s==""){
		$kw_s=$a1;
		$qqq=" product_keywords LIKE '%$a1%' ";
	}else{
		$kw_s=$kw_s.",".$a1;
		$qqq=$qqq." OR product_keywords LIKE '%$a1%' ";
	}

}

if ($jj==0){
	//$Query1=$Query1." AND ( $qqq ) ";
}

//echo "<br><br>".$kw_s;


//------------------------------ Search Box
	$search = "";

	if (isset($_SESSION['search'])){
		$search = $_SESSION['search'];
	}

	if (isset($_POST['search'])){
		$search = $_POST['search'];
		$_SESSION['search'] = $search;
	}

	if ($search != "" ){
		
		//$Query1 = $Query1." AND (utagline LIKE '%$search%' OR product_keywords LIKE '%$search%') ";
		$Query1 = $Query1." AND (utagline LIKE '%$search%') ";
	}




//--------------------- Country -------------------
	
	//----------anylenght
	$countryFr = array("any");

	if (isset($_SESSION['countryFr'])){
		$countryFr = $_SESSION['countryFr'];
	}

	if (isset($_POST['country'])){
		$countryFr = $_POST['country'];
		//print_r($countryFr);
		$_SESSION['countryFr'] = $countryFr;
	}


	$kw_c = "";
	$qqq="";
	$jj=0;
	foreach ($countryFr as $a1){

		$a1 = strtolower($a1);
		if ($a1 == "any"){
			$jj=1;
			break;
		}

		if ($kw_c==""){
			$kw_c=$a1;
			$qqq=" country='$a1' ";
		}else{
			$kw_c=$kw_c.",".$a1;
			$qqq=$qqq." OR country='$a1' ";
		}

	}
	if ($jj==0){
		$Query1=$Query1." AND ($qqq) ";
	}
	//echo "<br><br>".$kw_c;

//---------------------- End Fliter	
?>


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
									<li class="wt-active">Job</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!--Inner Home End-->
			<!--Main Start-->
			<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor" >
				<div class="wt-haslayout wt-main-section"  style="margin-top: -30px;">
					<!-- User Listing Start-->
					<div class="wt-haslayout" style="background-color: linear-gradient(red, yellow);">
						<div class="container">
							<div class="row" >
								<div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">

                                    <!--LEFT FILTER ------------------------------------------ -->
								    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
										<div class="wt-usersidebaricon">
											<span class="fa fa-cog wt-usersidebardown">
												<i></i>
											</span>
										</div>
									  <form method="POST" action="#" class="wt-formtheme wt-formsearch">
														

										<aside id="wt-sidebar" class="wt-sidebar wt-usersidebar">

											<!-- ---- Category -------------------------------------- -->
											<div class="wt-widget wt-effectiveholder">
												<div class="wt-widgettitle">
													<h2>Categories</h2>
												</div>
												<div class="wt-widgetcontent">
													<fieldset>
															<!-- <div class="form-group">
																<input type="text" name="Search" class="form-control"
																	placeholder="Search Category">
																<a href="#" class="wt-searchgbtn"><i
																		class="lnr lnr-magnifier"></i></a>
															</div> -->
														
															<div class="wt-checkboxholder wt-verticalscrollbar">
																
																<span class="wt-checkbox">
																	<input id="wt-description" type="checkbox"
																		name="skill[]" value="any" 
																		<?php
																		if ($kw_s == ""){
																				echo "checked";
																		}
																		?>
																	>
																	<label for="wt-description"> 
																		Any Skill</label>
																</span>

																
																<?php
																require('db.php');
																
																	$sql111 = "SELECT * FROM skills ";
																	$result111 = $conn->query($sql111);
																	$ccc = 0;
																	while ($row111 = $result111->fetch_assoc()) {

																		$ccc++;
																		$skill =  $row111['skill'];
																		
																	
																?>

																<span class="wt-checkbox">
																	<input id="wt-description<?php echo $ccc; ?>" type="checkbox" name="skill[]" 
																	value="<?php echo $skill; ?>"  
																	
																	<?php
																	if (strpos(" ".$kw_s,$skill) > 0){
																			echo "checked";
																	}
																	?>
																	><label for="wt-description<?php echo $ccc; ?>" style=" margin-top: -2px;">
																		<?php echo $skill; ?>
																	</label>
																</span>
																
																<?php } ?>
																
															</div>
													</fieldset>	
												</div>
											</div>

											
											

											<!-- ---- Location -------------------------------------- -->
											<div class="wt-widget wt-effectiveholder">
												<div class="wt-widgettitle">
													<h2>Location</h2>
												</div>
												<div class="wt-widgetcontent">
													
														<!-- <fieldset>
															<div class="form-group">
																<input type="text" name="fullname" class="form-control"
																	placeholder="Search Location">
																<a href="#" class="wt-searchgbtn"><i
																		class="lnr lnr-magnifier"></i></a>
															</div>
														</fieldset> -->
														<fieldset>
															<div class="wt-checkboxholder wt-verticalscrollbar">
																<span class="wt-checkbox">
																	<input id="wt-des" type="checkbox"
																		name="country[]" value="any" 
																		<?php if ($kw_c=="") {echo "checked";} ?>
																	
																		>
																	<label for="wt-des"> 
																		Any Country</label>
																</span>

																
																<?php
																require('db.php');
																
																	
																	$countryName1="";
																	$sql111 = "SELECT * FROM countries Order By country_name";
																	$result111 = $conn->query($sql111);
																	$ccc = 0;
																	while ($row111 = $result111->fetch_assoc()) {
																		$ccc++;
																		$countryName1 =  $row111['country_name'];
																		$c_code =  $row111['c_code'];
																	
																?>

																<span class="wt-checkbox" >
																	<input id="wt-descr<?php echo $ccc; ?>" type="checkbox" name="country[]" 	
																	value="<?php echo $c_code; ?>" 
																	
																	<?php if (strpos(" ".$kw_c, $c_code) > 0 ) {echo "checked";} ?>
																	
																	
																	>		
																	<label for="wt-descr<?php echo $ccc; ?>" style=" margin-top: -2px;">
																		<img style="width: 15px; " src="images/flags/<?php echo $c_code; ?>.png" alt=""> 
																		<?php echo $countryName1; ?>
																	</label>
																</span>
																
																<?php } ?>
																
															</div>
														</fieldset>
													
												</div>
											</div>


											<!-- <div class="wt-widget wt-effectiveholder">
												<div class="wt-widgettitle">
													<h2>Hourly Rate</h2>
												</div>
												<div class="wt-widgetcontent">
													<form class="wt-formtheme wt-formsearch">
														<fieldset>
															<div class="wt-checkboxholder wt-verticalscrollbar">
																<span class="wt-checkbox">
																	<input id="rate1" type="checkbox" name="description"
																		value="company" checked>
																	<label for="rate1">$10 and below</label>
																</span>
																<span class="wt-checkbox">
																	<input id="rate2" type="checkbox" name="description"
																		value="company">
																	<label for="rate2"> $10 - $30</label>
																</span>
																<span class="wt-checkbox">
																	<input id="rate3" type="checkbox" name="description"
																		value="company">
																	<label for="rate3"> $30 - $60</label>
																</span>
																<span class="wt-checkbox">
																	<input id="rate4" type="checkbox" name="description"
																		value="company">
																	<label for="rate4"> $60 - $90</label>
																</span>
																<span class="wt-checkbox">
																	<input id="rate5" type="checkbox" name="description"
																		value="company">
																	<label for="rate5"> $90 &amp;above</label>
																</span>
																<span class="wt-checkbox">
																	<input id="rate2v" type="checkbox"
																		name="description" value="company">
																	<label for="rate2v">$10 and below</label>
																</span>
																<span class="wt-checkbox">
																	<input id="rate3v" type="checkbox"
																		name="description" value="company">
																	<label for="rate3v"> $10 - $30</label>
																</span>
															</div>
														</fieldset>
													</form>
												</div>
											</div> -->

											<!-- <div class="wt-widget wt-effectiveholder">
												<div class="wt-widgettitle">
													<h2>Freelancer Type</h2>
												</div>
												<div class="wt-widgetcontent">
													<form class="wt-formtheme wt-formsearch">
														<fieldset>
															<div class="wt-checkboxholder">
																<span class="wt-checkbox">
																	<input id="proindependent" type="checkbox"
																		name="description" value="company" checked>
																	<label for="proindependent">Pro Independent
																		Freelancers</label>
																</span>
																<span class="wt-checkbox">
																	<input id="proagency" type="checkbox"
																		name="description" value="company">
																	<label for="proagency"> Pro Agency
																		Freelancers</label>
																</span>
																<span class="wt-checkbox">
																	<input id="independent" type="checkbox"
																		name="description" value="company">
																	<label for="independent"> Independent
																		Freelancers</label>
																</span>
																<span class="wt-checkbox">
																	<input id="agency" type="checkbox"
																		name="description" value="company">
																	<label for="agency">Agency Freelancers</label>
																</span>
																<span class="wt-checkbox">
																	<input id="rising" type="checkbox"
																		name="description" value="company">
																	<label for="rising"> New Rising Talent</label>
																</span>
															</div>
														</fieldset>
													</form>
												</div>
											</div> -->

											<!-- <div class="wt-widget wt-effectiveholder">
												<div class="wt-widgettitle">
													<h2>English level</h2>
												</div>
												<div class="wt-widgetcontent">
													<form class="wt-formtheme wt-formsearch">
														<fieldset>
															<div class="wt-checkboxholder">
																<span class="wt-checkbox">
																	<input id="basic" type="checkbox" name="description"
																		value="company" checked>
																	<label for="basic">Basic</label>
																</span>
																<span class="wt-checkbox">
																	<input id="conversational" type="checkbox"
																		name="description" value="company">
																	<label for="conversational"> Conversational</label>
																</span>
																<span class="wt-checkbox">
																	<input id="fluent" type="checkbox"
																		name="description" value="company">
																	<label for="fluent"> Fluent</label>
																</span>
																<span class="wt-checkbox">
																	<input id="native" type="checkbox"
																		name="description" value="company">
																	<label for="native"> Native or bilingual</label>
																</span>
																<span class="wt-checkbox">
																	<input id="professional" type="checkbox"
																		name="description" value="company">
																	<label for="professional"> Professional</label>
																</span>
															</div>
														</fieldset>
													</form>
												</div>
											</div> -->

											<!-- <div class="wt-widget wt-effectiveholder">
												<div class="wt-widgettitle">
													<h2>Languages</h2>
												</div>
												<div class="wt-widgetcontent">
													<form class="wt-formtheme wt-formsearch">
														<fieldset>
															<div class="form-group">
																<input type="text" name="fullname" class="form-control"
																	placeholder="Search Language">
																<a href="#" class="wt-searchgbtn"><i
																		class="lnr lnr-magnifier"></i></a>
															</div>
														</fieldset>
														<fieldset>
															<div class="wt-checkboxholder wt-verticalscrollbar">
																<span class="wt-checkbox">
																	<input id="chinese" type="checkbox"
																		name="description" value="company" checked>
																	<label for="chinese">Chinese</label>
																</span>
																<span class="wt-checkbox">
																	<input id="spanish" type="checkbox"
																		name="description" value="company">
																	<label for="spanish">Spanish</label>
																</span>
																<span class="wt-checkbox">
																	<input id="english" type="checkbox"
																		name="description" value="company">
																	<label for="english">English</label>
																</span>
																<span class="wt-checkbox">
																	<input id="arabic" type="checkbox"
																		name="description" value="company">
																	<label for="arabic">Arabic</label>
																</span>
																<span class="wt-checkbox">
																	<input id="russian" type="checkbox"
																		name="description" value="company">
																	<label for="russian">Russian</label>
																</span>
																<span class="wt-checkbox">
																	<input id="chinese1" type="checkbox"
																		name="description" value="company">
																	<label for="chinese1">Chinese</label>
																</span>
																<span class="wt-checkbox">
																	<input id="spanish1" type="checkbox"
																		name="description" value="company">
																	<label for="spanish1">Spanish</label>
																</span>
															</div>
														</fieldset>
													</form>
												</div>
											</div> -->

											<div class="wt-widget wt-applyfilters-holder">
												<div class="wt-widgetcontent">
													<div class="wt-applyfilters">
														<span>Click ???Apply Filter??? to apply latest<br> changes made by
															you.</span>
														<!-- <a href="#" class="wt-btn">Apply Filters</a> -->
														<input type="submit" style=" height: 45px; border: 0px; " class="wt-btn" value="Apply Filter">
														
													</div>
												</div>
											</div>
										</aside>
										
									  </form>
									</div>

									<!--RIGHT SEARCH---------------------------------------- -->
									<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
										<div class="wt-userlistingholder wt-haslayout">

										<form method="POST" action="#" class="wt-formtheme wt-formbanner wt-formbannervtwo" style="width: 100%; margin-left: 0px; margin-top: 0px; margin-bottom: 25px; ">
											<fieldset>
												<div class="form-group">

													<input type="text" name="search" class="form-control" value="<?php echo $search; ?>"	placeholder="Search">

													<div class="wt-formoptions"  >
														<!-- <div class="wt-dropdown" >
															<span>
																In: <em class="selected-search-type">Freelancers </em>
															<i class="lnr lnr-chevron-down"></i></span>
														</div> -->
														<div class="wt-radioholder">
															<span class="wt-radio">
																<input id="wt-freelancers" data-title="Freelancers" type="radio"
																	name="searchtype" value="freelancer" checked="">
																<label for="wt-freelancers">Freelancers</label>
															</span>
															<span class="wt-radio">
																<input id="wt-jobs" data-title="Jobs" type="radio"
																	name="searchtype" value="job">
																<label for="wt-jobs">Jobs</label>
															</span>
															<!-- <span class="wt-radio">
																<input id="wt-companies" data-title="Companies" type="radio"
																	name="searchtype" value="job">
																<label for="wt-companies">Companies</label>
															</span> -->
														</div>
														
														<button  class="wt-searchbtn"><i class="lnr lnr-magnifier" ></i></button>
													</div>
												</div>
											</fieldset>
										</form>


											<!-- <div class="wt-userlistingtitle">
												<span>01 - 48 of 57143 results for <em>"PHP Developer"</em></span>
											</div> -->

										    <!-- <div class="wt-filterholder">
												<ul class="wt-filtertag">
													<li class="wt-filtertagclear">
														<a href="javascrip:void(0)"><i class="fa fa-times"></i>
															<span>Clear All Filter</span></a>
													</li>
													<li class="alert alert-dismissable fade in">
														<a href="javascrip:void(0)"><i class="fa fa-times close"
																data-dismiss="alert" aria-label="close"></i>
															<span>Graphic Design</span></a>
													</li>
													<li class="alert alert-dismissable fade in">
														<a href="javascrip:void(0)"><i class="fa fa-times close"
																data-dismiss="alert" aria-label="close"></i> <span>Any
																Hourly Rate</span></a>
													</li>
													<li class="alert alert-dismissable fade in">
														<a href="javascrip:void(0)"><i class="fa fa-times close"
																data-dismiss="alert" aria-label="close"></i> <span>Any
																Freelancer Type</span></a>
													</li>
													<li class="alert alert-dismissable fade in">
														<a href="javascrip:void(0)"><i class="fa fa-times close"
																data-dismiss="alert" aria-label="close"></i>
															<span>Chinese</span></a>
													</li>
													<li class="alert alert-dismissable fade in">
														<a href="javascrip:void(0)"><i class="fa fa-times close"
																data-dismiss="alert" aria-label="close"></i>
															<span>English</span></a>
													</li>
												</ul>
											</div> 											 -->

											<!-- featured											
											<div class="wt-userlistinghold wt-featured wt-userlistingholdvtwo">
												<span class="wt-featuredtag">
													<img src="images/featured.png" alt=""
														data-tipso="Plus Member"
														class="template-content tipso_style">
													</span>
												<div class="wt-userlistingcontent" >
													<div class="wt-contenthead" >
														<div class="wt-title">
															<a href="usersingle.php"><i class="fa fa-check-circle"></i>
																Light Bulb Association</a>
															<h2>I want some customization and installation</h2>
														</div>
														<div class="wt-description">
															<p>Nisi ut aliquip ex ea commodo consequat duis aute irure
																dolor in reprehenderit inati voluptate velit esse cillum
																dolore eutates fugiat nulla pariatur sunt in culpa
																asequi officia deserunt mollit anim id est laborum ut
																perspiciatis...</p>
														</div>
														<div class="wt-tag wt-widgettag">
															<a href="#">PHP</a>
															<a href="#">HTML</a>
															<a href="#">JQuery</a>
														</div>
													</div>
													
													
													<div class="wt-viewjobholder" style="margin-left: ">
														<ul>
															<li><span><i
																		class="fa fa-dollar-sign wt-viewjobdollar"></i>Professional</span>
															</li>
															<li><span><em><img src="images/flag/img-04.png"
																			alt=""></em>England</span></li>
															<li><span><i
																		class="far fa-folder wt-viewjobfolder"></i>Type:
																	Per Hour</span></li>
															<li><span><i
																		class="far fa-clock wt-viewjobclock"></i>Duration:
																	03 Months</span></li>
															<li><span><i class="fa fa-tag wt-viewjobtag"></i>Job ID:
																	gy3yV2Vm5u</span></li>
															<li><a href="#"
																	class="wt-clicklike wt-clicksave"><i
																		class="fa fa-heart"></i> Save</a></li>
															<li class="wt-btnarea"><a href="jobsingle.php"
																	class="wt-btn">View Job</a></li>
														</ul>
													</div>
												</div>
											</div> -->





									<?php
										require('db.php');
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

										//$Query1=" Where usertype='Freelancer' ";


																			
										$sql1 = "SELECT * FROM user_info $Query1 ORDER BY user_id DESC Limit $record_index, $limit";
										
										$result1 = $conn->query($sql1);

										$cccnt = 0;
										while ($row1 = $result1->fetch_assoc()) {
											$cccnt++;

											$user_id = $row1['user_id'];										
											$email = $row1['email'];										
											$first_name = $row1['first_name'];
											$details = $row1['details'];
											$status1 = $row1['status1'];
											$hrate = $row1['hrate'];
											$utagline = $row1['utagline'];											
											$country = $row1['country'];


											$Free_Work = $row1['Free_Work'];								  
											$Free_Rating = $row1['Free_Rating'];								  
												
											$Emp_Work = $row1['Emp_Work'];								  
											$Emp_Rating = $row1['Emp_Rating'];								  
												
											
											$countryName="";
											$sql11 = "SELECT * FROM countries Where c_code ='$country'";
											$result11 = $conn->query($sql11);
											if ($row11 = $result11->fetch_assoc()) {
												$countryName =  $row11['country_name'];
											}
										?>

											
											

											<div class="wt-userlistinghold">
												<figure class="wt-userlistingimg">
												<?php if(!isset($_SESSION['username'])){
															?>
													<a href="login.php" onClick="alert('Login to view details');" >
														<img alt="" src="./assets/imagesu/<?php echo $email; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$email.'.jpg'); ?>" style="height: 100px; width: 100px; object-fit: cover;">
													</a>
												<?php } else { ?>
													<a href="usersingle.php?uid=<?php echo $user_id; ?>" >
														<img alt="" src="./assets/imagesu/<?php echo $email; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$email.'.jpg'); ?>" style="height: 100px; width: 100px; object-fit: cover;">
													</a>
												<?php } ?>
														
												</figure>
												<div class="wt-userlistingcontent">
													<div class="wt-contenthead">
														
													
													<?php if(!isset($_SESSION['username'])){
															?>

													    <div class="wt-title">
															<a href="login.php" onClick="alert('Login to view details');"><i class="fa fa-check-circle"></i>
																<?php echo $first_name; ?></a>
															<h2><?php echo $utagline; ?></h2>
														</div>

													<?php } else { ?>

														<div class="wt-title">
															<a href="usersingle.php?uid=<?php echo $user_id; ?>"><i class="fa fa-check-circle"></i>
																<?php echo $first_name; ?></a>
															<h2><?php echo $utagline; ?></h2>
														</div>

													<?php } ?>	


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
															<i class="fa fa-star <?php if($Free_Rating>0) echo 'fill'; ?>"></i>
															<i class="fa fa-star <?php if($Free_Rating>1) echo 'fill'; ?>"></i>
															<i class="fa fa-star <?php if($Free_Rating>2) echo 'fill'; ?>"></i>
															<i class="fa fa-star <?php if($Free_Rating>3) echo 'fill'; ?>"></i>
															<i class="fa fa-star <?php if($Free_Rating>4) echo 'fill'; ?>"></i>
														</span>
														<span class="wt-starcontent"><?php echo $Free_Rating; ?>/<sub>5</sub> <em>(<?php echo $Free_Work; ?>
																Feedback)</em></span>
													</div>
												</div>
												<div class="wt-description">
													<p><?php echo substr($details, 0, 180); ?>...</p>
												</div>
												<div class="wt-tag wt-widgettag">
													
													<?php
													
													require('db.php');				
													
													$sql="SELECT * FROM user_skills WHERE email='$email' order by skill_name" ;
													$result = $conn->query($sql);
													
													while ($row = $result->fetch_assoc()) {
															
															$skill_name =  $row['skill_name'];
															$skill_rate =  $row['skill_rate'];
															
														
													?>
														<!-- <a href="#"><?php echo $skill_name; ?></a> -->
													<?php } ?>
												</div>
											</div>


										<?php }  ?>


										<?php

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

								<?php } ?>

								<!-- <nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">

									<li class="page-item <?php echo $link1; ?>">
										<a class="page-link" href="<?php echo $prev1; ?><?php echo $Q11; ?>" tabindex="-1">Prev</a>
									</li>
									
									<li class="page-item disabled"><a class="page-link" href="#"><?php echo $page.' of '.$total_pages; ?></a></li> 

									<li class="page-item <?php echo $link2; ?>">
										<a class="page-link" href="<?php echo $next1; ?><?php echo $Q11; ?>">Next</a>
									</li>
									

									</ul>
								</nav> -->


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
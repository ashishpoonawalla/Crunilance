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
				<section class="wt-haslayout wt-dbsectionspace">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-6 float-left">
							<div class="wt-dashboardbox">
								<div class="wt-dashboardboxtitle">
									<h2>Post a Job</h2>
								</div>
								<div class="wt-dashboardboxcontent">
									<div class="wt-jobdescription wt-tabsinfo">
										<div class="wt-tabscontenttitle">
											<h2>Job Description</h2>
										</div>
										<form class="wt-formtheme wt-userform wt-userformvtwo">
											<fieldset>
												<div class="form-group">
													<input type="text" name="title" class="form-control"
														placeholder="Job Title">
												</div>
												<div class="form-group form-group-half wt-formwithlabel">
													<span class="wt-select">
														<label for="selectoption">Service Level:</label>
														<select>
															<option value="">Professional</option>
															<option value="">Professional</option>
														</select>
													</span>
												</div>
												<div class="form-group form-group-half wt-formwithlabel">
													<span class="wt-select">
														<label for="selectoption">Job Type:</label>
														<select>
															<option value="">Fixed</option>
															<option value="">Fixed</option>
														</select>
													</span>
												</div>
												<div class="form-group form-group-half wt-formwithlabel">
													<span class="wt-select">
														<label for="selectoption">Job Duration:</label>
														<select>
															<option value="">02 Weeks</option>
															<option value="">03 Weeks</option>
														</select>
													</span>
												</div>
												<div class="form-group form-group-half wt-formwithlabel">
													<span class="wt-select">
														<label for="selectoption">Featured Job:</label>
														<select id="selectoption">
															<option value="">Yes</option>
															<option value="">No</option>
														</select>
													</span>
												</div>
											</fieldset>
										</form>
									</div>
									<div class="wt-jobdetails wt-tabsinfo">
										<div class="wt-tabscontenttitle">
											<h2>Job Details</h2>
										</div>
										<form class="wt-formtheme wt-userform wt-userformvtwo">
											<fieldset>
												<div class="form-group">
													<textarea id="wt-tinymceeditor" class="wt-tinymceeditor"
														placeholder="Add Job Detail Here"></textarea>
												</div>
											</fieldset>
										</form>
									</div>
									<div class="wt-jobskills wt-tabsinfo">
										<div class="wt-tabscontenttitle">
											<h2>Skills Required</h2>
										</div>
										<form class="wt-formtheme wt-userform wt-userformvtwo">
											<fieldset>
												<div class="form-group">
													<select class="chosen-select Skills" data-placeholder="Skills"
														name="Skills" multiple>
														<option value="Website Design">Website Design</option>
														<option value="PHP">PHP</option>
														<option value="HTML 5">HTML 5</option>
														<option value="Graphic Design">Graphic Design</option>
														<option value="SEO">SEO</option>
														<option value="Bootstrap">Bootstrap</option>
													</select>
												</div>
												<div class="form-group wt-btnarea">
													<a href="#" class="wt-btn">Add Skills</a>
												</div>
												<div class="form-group wt-myskills">
													<ul class="">
														<li>
															<div class="wt-dragdroptool">
																<a href="javascript:void(0)" class="lnr lnr-menu"></a>
															</div>
															<span class="skill-dynamic-html">PHP (<em
																	class="skill-val">90</em>%)</span>
															<span class="skill-dynamic-field">
																<input type="text" name="skills[1][percentage]"
																	value="90">
															</span>
															<div class="wt-rightarea">
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</li>
														<li class="">
															<div class="wt-dragdroptool"><a href="javascript:void(0)"
																	class="lnr lnr-menu"></a></div>
															<span class="skill-dynamic-html">Website Design (<em
																	class="skill-val">90</em>%)</span>
															<span class="skill-dynamic-field">
																<input type="text" name="skills[1][percentage]"
																	value="90">
															</span>
															<div class="wt-rightarea">
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</li>
														<li>
															<div class="wt-dragdroptool handle"><a
																	href="javascript:void(0)" class="lnr lnr-menu"></a>
															</div>
															<span class="skill-dynamic-html">HTML 5 (<em
																	class="skill-val">90</em>%)</span>
															<span class="skill-dynamic-field">
																<input type="text" name="skills[1][percentage]"
																	value="90">
															</span>
															<div class="wt-rightarea">
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</li>
														<li>
															<div class="wt-dragdroptool handle"><a
																	href="javascript:void(0)" class="lnr lnr-menu"></a>
															</div>
															<span class="skill-dynamic-html">Graphic Design (<em
																	class="skill-val">80</em>%)</span>
															<span class="skill-dynamic-field">
																<input type="text" name="skills[1][percentage]"
																	value="90">
															</span>
															<div class="wt-rightarea">
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</li>
														<li>
															<div class="wt-dragdroptool handle"><a
																	href="javascript:void(0)" class="lnr lnr-menu"></a>
															</div>
															<span class="skill-dynamic-html">Rate Your Skill (<em
																	class="skill-val">10</em>%)</span>
															<span class="skill-dynamic-field">
																<input type="text" name="skills[1][percentage]"
																	value="90">
															</span>
															<div class="wt-rightarea">
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</li>
														<li>
															<div class="wt-dragdroptool handle"><a
																	href="javascript:void(0)" class="lnr lnr-menu"></a>
															</div>
															<span class="skill-dynamic-html">SEO (<em
																	class="skill-val">35</em>%)</span>
															<span class="skill-dynamic-field">
																<input type="text" name="skills[1][percentage]"
																	value="90">
															</span>
															<div class="wt-rightarea">
																<a href="#" class="wt-deleteinfo"><i
																		class="lnr lnr-trash"></i></a>
															</div>
														</li>
													</ul>
												</div>
											</fieldset>
										</form>
									</div>
									<div class="wt-attachmentsholder">
										<div class="wt-tabscontenttitle">
											<h2>Attachments</h2>
											<div class="wt-rightarea">
												<span>Show “Attachments” after hiring</span>
												<div class="wt-on-off float-right">
													<input type="checkbox" id="hide-on" name="contact_form">
													<label for="hide-on"><i></i></label>
												</div>
											</div>
										</div>
										<form class="wt-formtheme wt-formprojectinfo wt-formcategory">
											<fieldset>
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
															<span>Wireframe Document.doc</span>
															<em>File size: 512 kb<a href="#"
																	class="lnr lnr-cross"></a></em>
														</li>
														<li>
															<span class="uploadprogressbar"></span>
															<span>Requirments.pdf</span>
															<em>File size: 110 kb<a href="#"
																	class="lnr lnr-cross"></a></em>
														</li>
														<li class="wt-uploaded">
															<span class="uploadprogressbar"></span>
															<span>Company Intro.docx</span>
															<em>File size: 224 kb<a href="#"
																	class="lnr lnr-cross"></a></em>
														</li>
													</ul>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
							<div class="wt-updatall">
								<i class="ti-announcement"></i>
								<span>Post job by just clicking on “Post Job Now” button.</span>
								<a class="wt-btn" href="#">Post Job Now</a>
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
	<script src="js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci"></script>
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
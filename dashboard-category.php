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
	<link rel="stylesheet" href="css/basictable.css">
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
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 float-left">
							<div class="wt-dashboardbox">
								<div class="wt-dashboardboxtitle">
									<h2>Add New Category</h2>
								</div>
								<div class="wt-dashboardboxcontent">
									<form class="wt-formtheme wt-formprojectinfo wt-formcategory">
										<fieldset>
											<div class="form-group">
												<input type="text" name="Name" class="form-control" placeholder="Name">
												<span class="form-group-description">Dolore magna aliqua enim
													adminim</span>
											</div>
											<div class="form-group">
												<span class="wt-select">
													<select>
														<option value="" disabled="">Select parent Category</option>
														<option value="">Category 1</option>
														<option value="">Category 2</option>
													</select>
												</span>
												<span class="form-group-description">Elit sed do eiusmod tempor
													incididunt ut labore</span>
											</div>
											<div class="form-group">
												<textarea name="message" class="form-control"
													placeholder="Description"></textarea>
												<span class="form-group-description">Veniam quis nostrud
													exercitation</span>
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
														<em>File size: 300 kb<a href="#"
																class="lnr lnr-cross"></a></em>
													</li>
												</ul>
											</div>
											<div class="form-group wt-btnarea">
												<a href="#" class="wt-btn">Add New Category</a>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 float-right">
							<div class="wt-dashboardbox wt-categorys">
								<div class="wt-dashboardboxtitle wt-titlewithsearch">
									<h2>Category</h2>
									<form class="wt-formtheme wt-formsearch">
										<fieldset>
											<div class="form-group">
												<input type="text" name="category" class="form-control"
													placeholder="Search Category">
												<a href="#" class="wt-searchgbtn"><i
														class="lnr lnr-magnifier"></i></a>
											</div>
										</fieldset>
									</form>
								</div>
								<div class="wt-dashboardboxcontent wt-categoriescontentholder">
									<table class="wt-tablecategories">
										<thead>
											<tr>
												<th>
													<span class="wt-checkbox">
														<input id="wt-name" type="checkbox" name="head">
														<label for="wt-name"></label>
													</span>
												</th>
												<th>Icon</th>
												<th>Name</th>
												<th>Slug</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-namea" type="checkbox" name="head">
														<label for="wt-namea"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td>Advertising Director</td>
												<td>Advertising Director</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name1" type="checkbox" name="categories">
														<label for="wt-name1"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-10.png" alt=""></figure>
												</td>
												<td class="wt-subcategories wt-child-2">Advertising Executive</td>
												<td>Advertising Executive</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name2" type="checkbox" name="categories">
														<label for="wt-name2"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td class="wt-subcategories wt-child-3">Advertising Manager</td>
												<td>Advertising Manager</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name3" type="checkbox" name="categories">
														<label for="wt-name3"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td class="wt-subcategories wt-child-4">Classified Advertising Manager
												</td>
												<td>Classified Advertising Manager</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name4" type="checkbox" name="categories">
														<label for="wt-name4"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-10.png" alt=""></figure>
												</td>
												<td>Promotion Manager</td>
												<td>Promotion Manager</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name5" type="checkbox" name="categories">
														<label for="wt-name5"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-10.png" alt=""></figure>
												</td>
												<td>Promotions Director</td>
												<td>Promotions Director</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name6" type="checkbox" name="categories">
														<label for="wt-name6"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td>VP Advertising</td>
												<td>VP Advertising</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name7" type="checkbox" name="categories">
														<label for="wt-name7"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td>VP Promotions</td>
												<td>VP Promotions</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name8" type="checkbox" name="categories">
														<label for="wt-name8"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td>Public Information Relations Manager</td>
												<td>Public Information Relations Manager</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name9" type="checkbox" name="categories">
														<label for="wt-name9"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td>Public Information Director</td>
												<td>Public Information Director</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name10" type="checkbox" name="categories">
														<label for="wt-name10"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-10.png" alt=""></figure>
												</td>
												<td>Public Relations Manager</td>
												<td>Public Relations Manager</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name12" type="checkbox" name="categories">
														<label for="wt-name12"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td>Communication Manager</td>
												<td>Communication Manager</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name13" type="checkbox" name="categories">
														<label for="wt-name13"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-10.png" alt=""></figure>
												</td>
												<td>Management Information Systems Director</td>
												<td>Management Information Systems Director</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<span class="wt-checkbox">
														<input id="wt-name14" type="checkbox" name="categories">
														<label for="wt-name14"></label>
													</span>
												</td>
												<td>
													<figure><img src="images/categories/img-09.png" alt=""></figure>
												</td>
												<td>Information Technology Systems Director</td>
												<td>Information Technology Systems Director</td>
												<td>
													<div class="wt-actionbtn">
														<a href="#"
															class="wt-addinfo wt-skillsaddinfo"><i
																class="lnr lnr-pencil"></i></a>
														<a href="#" class="wt-deleteinfo"><i
																class="lnr lnr-trash"></i></a>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<nav class="wt-pagination">
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
									</nav>
								</div>
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
	<script src="js/jquery.basictable.min.js"></script>
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
		$('.wt-tablecategories').basictable({
			breakpoint: 640,
		});
	</script>
</body>


</html>
<?php
	require('db.php');
	
	$ongoing = 0;
	$completed = 0;
	$canceled = 0;
	
$user = $_SESSION['username']; 

//-------------- ongoing jobs
$sql1 = "SELECT * FROM projects Where userEmail='$user' AND Status1='Awarded' ORDER BY product_id DESC Limit 8";
$result1 = $conn->query($sql1);

while ($row1 = $result1->fetch_assoc()) {
	$ongoing++;
}

//-------------- ongoing jobs
$sql1 = "SELECT * FROM projects Where userEmail='$user' AND Status1='Completed' ORDER BY product_id DESC Limit 8";
$result1 = $conn->query($sql1);

while ($row1 = $result1->fetch_assoc()) {
	$completed++;
}

//-------------- ongoing jobs
$sql1 = "SELECT * FROM projects Where userEmail='$user' AND Status1='Canceled' ORDER BY product_id DESC Limit 8";
$result1 = $conn->query($sql1);

while ($row1 = $result1->fetch_assoc()) {
	$canceled++;
}
?>

<aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave">
								<div class="wt-proposalsr">
									<a href="dashboard-awardedjobs.php"  class="">
									<div class="wt-proposalsrcontent">
										<figure>
											<img src="images/thumbnail/img-17.png" alt="image">
										</figure>
										<div class="wt-title">
											<h3><?php echo $ongoing; ?></h3>
											<span>Ongoing Jobs</span>
										</div>
									</div>
									</a>
								</div>
								<div class="wt-proposalsr">
									<a href="dashboard-completedjobs.php"  class="">	
									<div class="wt-proposalsrcontent wt-componyfolow">
										<figure>
											<img src="images/thumbnail/img-16.png" alt="image">
										</figure>
										<div class="wt-title">
											<h3><?php echo $completed; ?></h3>
											<span>Completed Jobs</span>
										</div>
									</div>
									</a>
								</div>
								<div class="wt-proposalsr">
									<a href="dashboard-canceledjobs.php"  class="">
									<div class="wt-proposalsrcontent  wt-freelancelike">
										<figure>
											<img src="images/thumbnail/img-15.png" alt="image">
										</figure>
										<div class="wt-title">
											<h3><?php echo $canceled; ?></h3>
											<span>Cancelled Jobs</span>
										</div>
									</div>
									</a>
								</div>
							</aside>
<?php 
session_start();				
        $product_title = ($_POST['title']);
        $p_level = ($_POST['p_level']);
        $typepost = ($_POST['typepost']);
        $p_duration = ($_POST['p_duration']);
        $budget = ($_POST['budget']);
        $keywords = ($_POST['keywords']);
        $desc = ($_POST['desc']);
        //$cat = ($_POST['category']);
        
        $userID = $_SESSION["user_id"];
        $userEmail = $_SESSION["username"];      
        $country =  $_SESSION["country"];
								
	require('db.php');

	$kw = "";
	foreach ($keywords as $a){
		if ($kw=="")
			$kw=$a;
		else
			$kw=$kw.",".$a;
		
	}
	//echo $kw;


//prepare and bind


try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

	$stmt = $conn1->prepare("INSERT INTO projects(product_title,  userID,  userEmail,  p_level,  typepost,  p_duration,  product_price,  product_keywords,  product_desc,  country) 
                                         VALUES (:product_title, :userID, :userEmail, :p_level, :typepost, :p_duration, :product_price, :product_keywords, :product_desc, :country )");

    $stmt->bindParam(':product_title', $product_title);
	$stmt->bindParam(':userID', $userID);	
	$stmt->bindParam(':userEmail', $userEmail);
	$stmt->bindParam(':p_level', $p_level);

	$stmt->bindParam(':typepost', $typepost);
	$stmt->bindParam(':p_duration', $p_duration);  
	$stmt->bindParam(':product_price', $budget);  
	$stmt->bindParam(':product_keywords', $kw);

    $stmt->bindParam(':product_desc', $desc);
	$stmt->bindParam(':country', $country);  

	
	if ($stmt->execute() === TRUE) {
					
		$last_id = $conn1->lastInsertId();
		//session_start();
		$_SESSION["pidIMG"] = $last_id ;
		
		$msg='Job posted successfully';
		
	} else {
	 	$msg= "Some Error when creating jobs!";
	
		
	}
	
	
	//$stmt->close();
	 
	
  } catch(PDOException $e) {
	$msg= "Error: " . $e->getMessage();
  }
  $conn1 = null;

  //echo $msg;
header ('Location: dashboard-employer.php?msg='.$msg);

				
						
						?>
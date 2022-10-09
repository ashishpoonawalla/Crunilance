<?php 
$pid2=0;
session_start();				
        $product_title = ($_POST['title']);
        $p_level = ($_POST['p_level']);
        $typepost = ($_POST['typepost']);
        $p_duration = ($_POST['p_duration']);
        $budget = ($_POST['budget']);
        $keywords = ($_POST['keywords']);
        $desc = ($_POST['desc']);
        //$cat = ($_POST['category']);
        $status1 = "Awarded";

        echo " $product_title , $p_level , $typepost , $p_duration , $budget , $desc ";
      

        $userID = $_SESSION["user_id"];
        $userEmail = $_SESSION["username"];      
        $country =  $_SESSION["country"];
								
        //$AwardDate = new DateTime();




echo "<br>$AwardDate<br>";
	require('db.php');

	$kw = "";
	foreach ($keywords as $a){
		if ($kw=="")
			$kw=$a;
		else
			$kw=$kw.",".$a;
		
	}
	//echo $kw;
        
    
        
        $duration = $p_duration;
        $amount = $budget ; 
        $coverletter = "Project awarded by employer";

        $user_id1 = $_SESSION["user_id1"];
        $useremail1 = $_SESSION["username1"]; 
        $full_name1 = $_SESSION["first_name1"];      
        $country1 =  $_SESSION["country1"];

//prepare and bind


try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

	$stmt = $conn1->prepare("INSERT INTO projects ( product_title,  userID,  userEmail,  p_level,  typepost,  p_duration,  product_price,  product_keywords,  product_desc,  country,  status1,  tusername,  tname,  tprice ) 
                                         VALUES (:product_title, :userID, :userEmail, :p_level, :typepost, :p_duration, :product_price, :product_keywords, :product_desc, :country, :status1, :tusername, :tname, :tprice )");

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
  $stmt->bindParam(':status1', $status1);  

  $stmt->bindParam(':tusername', $useremail1);
	$stmt->bindParam(':tname', $full_name1); 
  $stmt->bindParam(':tprice', $budget); 

  //$stmt->bindParam(':AwardDate', $AwardDate);  

	

	if ($stmt->execute() === TRUE) {
					
		$last_id = $conn1->lastInsertId();
		//session_start();
		$_SESSION["pidIMG"] = $last_id ;
    echo $last_id;
        //---------------------------- Add to project_user table ----------------------

        $pid2 = $pid = $pid1= $last_id ;
        $duration = $p_duration;
        $amount = $budget ; 
        $coverletter = "Project awarded by freelancer";

       
		
        require('db.php');

        try {
            $conn11 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        
            $conn11->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        
            $stmt1 = $conn11->prepare("INSERT INTO project_user (product_id,  user_id,   useremail,  full_name,  country,  amount,  duration,  coverletter) 
                                                 VALUES        (:product_id, :user_id,  :useremail, :full_name, :country, :amount, :duration, :coverletter)");
        
            $stmt1->bindParam(':product_id', $pid);
            $stmt1->bindParam(':user_id', $user_id1);	
            $stmt1->bindParam(':useremail', $useremail1);
            $stmt1->bindParam(':full_name', $full_name1);
        
            $stmt1->bindParam(':country', $country1);
            $stmt1->bindParam(':duration', $duration);  
            $stmt1->bindParam(':amount', $amount);  
            $stmt1->bindParam(':coverletter', $coverletter);
            
        
            if ($stmt1->execute() === TRUE){

              $psid_id = $conn11->lastInsertId();

              require('db.php'); 
              $comm = "UPDATE projects SET psid='$psid_id' Where Product_id=$pid ";
              echo "<br>".$comm;

              $insert=mysqli_query($connect, $comm);


            }

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
          $conn11 = null;


        //------------------------------------------------
		$msg='Job posted successfully';
		
	} else {
	 	$msg= "Some Error when creating jobs!";
         
		
	}
	
	
	//$stmt->close();
	 
	
  } catch(PDOException $e) {
	$msg= "Error: " . $e->getMessage();
  }
  $conn1 = null;

  echo $msg;
header ('Location: dashboard-ongoingsingle.php?pid='.$_SESSION["pidIMG"]);

				
						
						?>
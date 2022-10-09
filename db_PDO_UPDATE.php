<?php 
session_start();				
        $first_name = ($_POST['first_name']);
        $hrate = ($_POST['hrate']);
        $utagline = ($_POST['utagline']);
        $details = ($_POST['details']) ;       
        
        $email = $_SESSION["username"];      

								
	require('db.php');

$msg="";
// prepare and bind

try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	// set the PDO error mode to exception
	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	


    $data = [
        'first_name' => $first_name,
        'hrate' => $hrate,
        'utagline' => $utagline,
        'details' => $details,
        'email' => $email,       

    

    ];


    $sql = "UPDATE user_info SET first_name=:first_name, hrate=:hrate, utagline=:utagline,
    details=:details WHERE email=:email ";
    $stmt= $conn1->prepare($sql);
  


//----------------------------------------------------


	if ( $stmt->execute($data) === TRUE) {
					
		
	
		$msg="Profile updated.";
		
	} else {
		$msg="Some Error when updating!";
		
	}
	

	
  } catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
  }
  $conn1 = null;

  header('Location: dashboard-profile.php?msg='.$msg);
						
						?>
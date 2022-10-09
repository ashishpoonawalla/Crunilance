<?php




//------------------------------------------------




    $uname = ($_POST['uemail']);
    $pass = ($_POST['upassword']);
    
    $pass = md5($pass )	;			
                    
    require('db.php');
    $msg= "";

    $sql="SELECT * FROM user_info WHERE email='$uname' AND password='$pass' " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
                        
        session_start();
        $_SESSION["verify"] = $row["emailverify"];

        // if($row["emailverify"] == "Verify"){

        	if ($row["status1"] == "Blocked")
        	{
        		header('Location: login.php?msg=Your account is blocked, please contact to info.crunilance@gmail.com ');
        		exit();
        	}
        //-- Login as Employer	
            $_SESSION["username"] = $uname;							$_SESSION["uname"] = null;
            $_SESSION["first_name"] = $row["first_name"];
            $_SESSION["mobile"] = $row["mobile"];
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["uimage"] = $row["uimage"];
            $_SESSION["country"] = $row["country"];
            $_SESSION["usertype"] = $row["usertype"];

            $_SESSION["membership"] = $row["membership"];
            $_SESSION["bidcount"] = $row["bidcount"];
            $_SESSION["membershipstart"] = $row["membershipstart"];
            $_SESSION["membershipend"] = $row["membershipend"];

            
            
            require('dbcalc_rating.php');

            //setcookie("USER", $uname, time() + (86400 * 7), "/"); // 86400 = 1 day
                            
            //$conn->close();
            
           
                                
        // } else {
        // 	$_SESSION["vusername"] = $uname;
        // 	$_SESSION["verifycode"] = $row["verifycode"];
        // 	$_SESSION["first_name1"] = $row["first_name"];
        // 	$_SESSION["mobile1"] = $row["mobile"];
        // 	$_SESSION["user_id1"] = $row["user_id"];
        // 	$_SESSION["uimage1"] = $row["uimage"];

        // 	header('Location: Uverify.php');
        // }


    
    } else {
        //$conn->close();
        $msg="Invalid username or password";
    }

            
    $conn->close();
				
if ($msg == "")
    if ($_SESSION["usertype"] == "Employer")
        header ('Location: dashboard-employer.php');
    else
        header ('Location: dashboard-freelancer.php');
else
    header ('Location: login.php?msg='.$msg);
?>
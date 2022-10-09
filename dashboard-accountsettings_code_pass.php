<?php 
session_start();				
        $old_password = ($_POST['old_password']);
        $new_password = ($_POST['new_password']);
        
        $userID = $_SESSION["user_id"];
        $email = $_SESSION["username"];      
        $country =  $_SESSION["country"];
								
		 
        $pass = md5($old_password )	;			
        $new_pass =  md5($new_password) ;  
        
        
        require('db.php');
        $msg= "";
    
        $sql="SELECT * FROM user_info WHERE email='$email' AND password='$pass' " ;
        $result = $conn->query($sql);
    
        if($row = $result->fetch_assoc())
        {


            try {
                $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                // set the PDO error mode to exception
                $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                


                $data = [
                    'password' => $new_pass,                          
                    'email' => $email,      
                ];


                $sql = "UPDATE user_info SET password=:password WHERE email=:email ";
                $stmt= $conn1->prepare($sql);
            


            //----------------------------------------------------


                if ( $stmt->execute($data) === TRUE) {

                    $msg="Password updated.";
                    
                } else {
                    $msg="Some Error when updating!";
                    
                }
                

                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            } 
        }else {
            $msg="Some Error when updating!";
        
        }

  header('Location: dashboard-accountsettings.php?msg='.$msg);
						
?>
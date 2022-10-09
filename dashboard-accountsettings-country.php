<?php 
session_start();				
        $country = $_POST['country'];
        $country = strtolower($country);
        echo $country;
        // $userID = $_SESSION["user_id"];
        $email = $_SESSION["username"];      
     
		
        require('db.php');
        $msg= "";
    
       

            try {
                $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                // set the PDO error mode to exception
                $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                


                $data = [
                    'country' => $country,                          
                    'email' => $email,      
                ];


                $sql = "UPDATE user_info SET country=:country WHERE email=:email ";
                $stmt= $conn1->prepare($sql);
            


            //----------------------------------------------------


                if ( $stmt->execute($data) === TRUE) {

                    $msg=" Country info updated.";
                    
                } else {
                    $msg=" Some Error when updating!";
                    
                }
                

                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            } 
        

  header('Location: dashboard-accountsettings.php?msg='.$msg);
						
?>
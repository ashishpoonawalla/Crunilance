<?php 
session_start();				
        $pid = $pid1= ($_POST['pid']);
        $duration = ($_POST['duration']);
        $amount = ($_POST['amount']);
        $coverletter = ($_POST['coverletter']);
       
        $user_id = $_SESSION["user_id"];
        $useremail = $_SESSION["username"]; 
        $full_name = $_SESSION["first_name"];      
        $country =  $_SESSION["country"];
	
        

    require('db.php');

        try {
            $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        
            $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        
            $stmt = $conn1->prepare("INSERT INTO project_user (product_id,  user_id,  useremail,  full_name,  country,  amount,  duration,  coverletter) 
                                                 VALUES      (:product_id, :user_id, :useremail, :full_name, :country, :amount, :duration, :coverletter)");
        
            $stmt->bindParam(':product_id', $pid);
            $stmt->bindParam(':user_id', $user_id);	
            $stmt->bindParam(':useremail', $useremail);
            $stmt->bindParam(':full_name', $full_name);
        
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':duration', $duration);  
            $stmt->bindParam(':amount', $amount);  
            $stmt->bindParam(':coverletter', $coverletter);
    
            
        
        
        
        
            if ($stmt->execute() === TRUE) {
                            
                // $last_id = $conn1->lastInsertId();
                // session_start();
                // $_SESSION["pidIMG"] = $last_id ;
                // // header('Location: post_jobImg.php');
                // header ('Location: dashboard-freelancer.php');


              //------------------------- Update bidcount ----------------------

              $sql300="SELECT * FROM user_info WHERE email='".$_SESSION["username"]."'" ;
              $result300 = $conn->query($sql300);

              if($row300 = $result300->fetch_assoc())
              {
                $bidcount = $row300["bidcount"];
                $bidcount = $bidcount - 1;                
                
                $_SESSION["bidcount"] = $bidcount;

                require('db.php');
		    
                $sql301="UPDATE user_info SET bidcount='$bidcount' Where email='".$_SESSION["username"]."'" ;                
                $conn->query($sql301);

              }
              //------------------------- Send Notification --------------------

              $sql81="SELECT * FROM projects Where product_id='$pid' " ;
            
              $result81 = $conn->query($sql81);
            
              if($row81 = $result81->fetch_assoc())
              {
                
                $uem =$row81['userEmail'];
                  



                $sql80="SELECT * FROM user_info Where email='$uem' " ;
                //echo $sql1; 
                $result80 = $conn->query($sql80);
                
                if($row80 = $result80->fetch_assoc())
                  {
                    $name80 =$row80['full_name'];
                    $email80 =$uem;
                  }


                  $uname80 = $_SESSION["username"] ; 	
                  $fname80 = $_SESSION["first_name"];

                    //------------------ Send notifications ------------------------      
                    $ntype = "job";   
                    $nmessage = "New bid on your job";
                    $stmt12 = $conn1->prepare("INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
                    VALUES (:nmessage, :jobid, :suid, :sfnm, :ruid, :rfnm, :ntype) ");

                    $stmt12->bindParam(':nmessage', $nmessage);
                    $stmt12->bindParam(':jobid', $pid1);
                    $stmt12->bindParam(':suid', $_SESSION["username"]);
                    $stmt12->bindParam(':sfnm', $_SESSION["first_name"]);
                    $stmt12->bindParam(':ruid', $email80);                
                    $stmt12->bindParam(':rfnm', $name80);
                    $stmt12->bindParam(':ntype', $ntype);
                    $stmt12->execute();


                    echo '<script>alert("You have bid successfully on this job.")</script>';


              }


               // echo "success!";
                
            } else {
                echo "Some Error when creating jobs!";
            
                    
                echo "Error Inserting record: " . $conn1->error;
            }
            
            
            //$stmt->close();
             
            echo "New records created successfully";
          } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
          $conn1 = null;
        
header ('Location: jobproposal.php?pid='.$pid.'&msg=Proposal send successfully');
?>        
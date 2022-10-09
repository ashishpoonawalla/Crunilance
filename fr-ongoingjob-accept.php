<?php


session_start();    
$pid = $_REQUEST["pid"];
$psid = $_REQUEST['psid'];
$sts = $_REQUEST['sts'];

    require('db.php');
    $sql11 = "SELECT * FROM projects Where product_id=$pid";
    $result11 = $conn->query($sql11);
    
    if ($row11 = $result11->fetch_assoc()) {
       
    									
        $useremail = $row11['userEmail'];
        $full_name = "";
        //$amount = $row11['amount'];
        
       
    }

    require('db.php');
    
   
    $sql="Update projects SET status1='Awarded' Where product_id=$pid " ;
    if ($sts == "reject"){
        $sql="Update projects SET tusername='null', tname='null', tprice=0, status1='Poested', psid='1' Where product_id=$pid " ;
    }
    
    //$sql="Update products SET tusername='$sid2', tname='$fnm2', tprice=$rat2, status1='Awarded' Where product_id=$pid2 " ;



    if ($conn->query($sql) === TRUE){
        
        
            //------------------------- Send Notification --------------------

            
            require('db.php');

            try {
                $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            
                $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            
                $email80 = $useremail ;
                $name80 = $full_name;
                


                $uname80 = $_SESSION["username"] ; 	
                $fname80 = $_SESSION["first_name"];

                //------------------ Send notifications ------------------------      
                $ntype = "job";   
                $nmessage = "Project $sts !";
                $stmt12 = $conn1->prepare("INSERT INTO notifications (nmessage, jobid,  suid,  sfnm,  ruid,  rfnm,  ntype) 
                                                            VALUES (:nmessage, :jobid, :suid, :sfnm, :ruid, :rfnm, :ntype) ");

                $stmt12->bindParam(':nmessage', $nmessage);
                $stmt12->bindParam(':jobid', $pid);
                $stmt12->bindParam(':suid', $uname80);
                $stmt12->bindParam(':sfnm', $fname80);
                $stmt12->bindParam(':ruid', $email80);                
                $stmt12->bindParam(':rfnm', $name80);
                $stmt12->bindParam(':ntype', $ntype);
                $stmt12->execute();


                //echo '<script>alert("You have awarded job successfully.")</script>';


            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn1 = null;





    }else{
        echo $sql;
    }

    header ('Location: fr-ongoingjob.php?pid='. $pid);


?>
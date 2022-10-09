<?php 
			
$msg="";						

    if(isset($_POST['ufullname']) && isset($_POST['uemail']) && isset($_POST['upassword']) && isset($_POST['upassword2']) && isset($_POST['ucountry'])) {
    
        if( ($_POST['upassword']) != ($_POST['upassword2']) )  {
    
            $msg="Password not match with Confirm Pasword!";
            
        }  else {
            
    
            $ufullname = ($_POST['ufullname']);
            $uemail = ($_POST['uemail']);
            $upassword = ($_POST['upassword']);
            $ucountry = strtolower($_POST['ucountry']);
            // $uphone = ($_POST['uphone']);
            $verifycode = rand(10000000,99999999);
    
            $upassword = md5($upassword);
                        
            require('db.php');
            
            $sql="INSERT INTO user_info(email, password, first_name, country, verifycode) Values('$uemail','$upassword','$ufullname','$ucountry','$verifycode') " ;
            
            //$sql="INSERT INTO seller_info('username', 'password', 'store_name' ) Values('$email','$pass','$snm')" ;
            //$sql ="";
            if ($conn->query($sql) === TRUE) 
            {
                $last_id = $conn->insert_id;

                $sql1="INSERT INTO seller_info(username, full_name, country ) Values('$uemail','$ufullname','$ucountry')" ;
                $conn->query($sql1);


                //------------ Pro image
                $imagePath = "assets/imagesu/pro2.jpg";
                $newPath = "assets/imagesu/";
                $ext = '.jpg';
                $newName  = $newPath.$uemail.$ext;
                $copied = copy($imagePath , $newName);
    
    
                //------------ ID Image 1
                $imagePath = "assets/imagesu/noimg.png";
                $newPath = "assets/imagesu/";
                $ext = '.png';
                $newName  = $newPath.$uemail."ID1".$ext;
                $copied = copy($imagePath , $newName);

    
                //------------ ID Image 2
                $imagePath = "assets/imagesu/noimg.png";
                $newPath = "assets/imagesu/";
                $ext = '.png';
                $newName  = $newPath.$uemail."ID2".$ext;
                $copied = copy($imagePath , $newName);
                
                //------------------ Send email ------------------------
                session_start();
                $_SESSION["eml_to"] = $uemail;
                $_SESSION["eml_sub"] = "Account created successfully.";
                $_SESSION["eml_mes"] = "Dear $ufullname, <br><br>Your trueshipp user account created succesfully.
                                        <br>Your code for verify on trueshipp: $verifycode<br>
                                        <br><a href='https://trueshipp.com/ULogin.php'>Click here to login</a>";
                $_SESSION["eml_bcc"] = "trueshipp@gmail.com";
    
                include_once("emailsend.php");
                        $msg = "";

                        
            } else {
                $msg = "Some Error when creating account!, Or email already exists!";
                //echo "Error Inserting record: " . $conn->error;
            }
            $conn->close();
            
            
            //-- Login as Employer		
            $_SESSION["username"] = $uemail;							$_SESSION["uname"] = null;
            $_SESSION["first_name"] = $ufullname;
            $_SESSION["mobile"] = "";
            $_SESSION["user_id"] = $last_id;
            $_SESSION["country"] = $ucountry;															
            $_SESSION["usertype"] = "Employer";

            //header ('Location: dashboard-freelancer.php');
            echo "Ok";
        }
    }

if ($msg == "")
    header ('Location: signup-next.php');
else
    header ('Location: signup.php?msg='.$msg);
echo ",Ok 1";
?>
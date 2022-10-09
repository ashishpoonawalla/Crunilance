<?php

				
	    		$uname = ($_POST['email']);
        		$pass = ($_POST['password']);
				$pass1 = md5($pass);
								
								
				require('db.php');
		
				$sql="SELECT * FROM user_info WHERE email='$uname' AND password='$pass1' AND usertype='Admin' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  					
					session_start();
					$_SESSION["auname"] = $uname;	
					$_SESSION["usertype"] = "ADMIN";					
					
							
					//$conn->close();
				    header('Location: admin_home.php');
				
				} else {
					//$conn->close();
					header('Location: Admin_Dash.php?var=Invalid Username or Password');
				}

						
				$conn->close();

				

?>
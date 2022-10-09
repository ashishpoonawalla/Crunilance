<?php
if(isset($_POST['submit_rating']))
{
  session_start();
  // $host="localhost";
  // $username="root";
  // $password="";
  // $databasename="crunilance";

  // $connect=mysqli_connect($host,$username,$password);
  // $db=mysqli_select_db($connect,$databasename);

  require('db.php');
  
  $pid=$_POST['pid'];
  $feedback=$_POST['feedback'];
  $php_rating=$_POST['phprating'];
  $asp_rating=$_POST['asprating'];
  $jsp_rating=$_POST['jsprating'];

  $tot = $php_rating  + $asp_rating + $jsp_rating;
  $tot = $tot / 3;

  $comm = "UPDATE projects SET E_feedback='$feedback', status1='Completed', E_rat=$tot, E_rat1=$php_rating, E_rat2=$asp_rating, E_rat3=$jsp_rating  Where Product_id=$pid ";
  echo $comm;

  $insert=mysqli_query($connect, $comm);

  require('dbcalc_rating.php');

  header ('Location: dashboard-ongoingprogress.php?pid='. $pid);
}
?>


<?php 





// session_start();				
//         $feedback = ($_POST['feedback']);
//         $pid = ($_POST['pid']);
//         $behaviour = ($_POST['behaviour']);
//         $qua_work = ($_POST['qua_work']);
//         $deadline = ($_POST['deadline']);
//         $services = ($_POST['services']);
   
//      echo "$feedback ,  $pid , $behaviour , $qua_work , $deadline , $services";
// 		require('db.php');

// $msg="";
// // prepare and bind

// try {
// 	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
// 	// set the PDO error mode to exception
// 	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	


//     $data = [
//         // 'account_name' => $account_name,
//         // 'account_no' => $account_no,
//         // 'bank_name' => $bank_name,
//         // 'ifsc' => $ifsc,
//         // 'branch_name' => $branch_name,       
//         // 'email' => $email,       

    

//     ];


//     $sql = "UPDATE user_info SET account_name=:account_name, account_no=:account_no, bank_name=:bank_name,
//     ifsc=:ifsc, branch_name=:branch_name WHERE email=:email ";
//    // $stmt= $conn1->prepare($sql);
  


// //----------------------------------------------------


// 	if ( $stmt->execute($data) === TRUE) {
					
		
	
// 		$msg="Profile updated.";


		
// 	} else {
// 		$msg="Some Error when updating!";
		
// 	}
	

	
//   } catch(PDOException $e) {
// 	echo "Error: " . $e->getMessage();
//   }
//   $conn1 = null;


//header('Location: dashboard-accountsettings.php?msg='.$msg);
						
						?>
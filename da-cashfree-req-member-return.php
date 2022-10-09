
<?php  

		 $secretkey = "8e24e9431f4c215f380c595be1e0d778979ddd8c";
		 $orderId = $_POST["orderId"];
		 $orderAmount = $_POST["orderAmount"];
		 $referenceId = $_POST["referenceId"];
		 $txStatus = $_POST["txStatus"];
		 $paymentMode = $_POST["paymentMode"];
		 $txMsg = $_POST["txMsg"];
		 $txTime = $_POST["txTime"];
		 $signature = $_POST["signature"];
		 $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
		 $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
		 $computedSignature = base64_encode($hash_hmac);

session_start();
$_SESSION["orderId"] = $orderId;
$_SESSION["orderAmount"] = $orderAmount;
$_SESSION["referenceId"] = $referenceId;
$_SESSION["txStatus"] = $txStatus;
$_SESSION["paymentMode"] = $paymentMode;
$_SESSION["txMsg"] = $txMsg;
$_SESSION["txTime"] = $txTime;


$_SESSION["signature"] = "NO";

if ($signature == $computedSignature) {
	$_SESSION["signature"] = "YES";
	

	// order_id, amount, currency, c_name, c_email
	require('db.php');
    $uname = $msg= "";

    $sql="SELECT * FROM tmp_order WHERE order_id='$orderId' " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
		$uname = $row["c_email"];
		$amount = $row["amount"];
	}

	// -------------------------------------- Get user Data
    require('db.php');
   
    $sql="SELECT * FROM user_info WHERE email='$uname' " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
              
		$_SESSION["username"] = $uname;						
		$_SESSION["first_name"] = $row["first_name"];
		$_SESSION["mobile"] = $row["mobile"];
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["uimage"] = $row["uimage"];
		$_SESSION["country"] = $row["country"];
		$_SESSION["usertype"] = $row["usertype"];

		$_SESSION["membership"] = $row["membership"];
		$_SESSION["bidcount"] = $row["bidcount"];
        
			
		// -------------------------------------- Update Membership if SUCCESS
		if ($txStatus == "SUCCESS")
		{
				//------------------------- Update bidcount ----------------------
				$date1 = date('Y-m-d'); 
				$date2 = date("Y-m-d", strtotime("+1 month"));

				
				

				$var = "Basic"; 
				$newbid = 100;
				if ($amount == 20){
					$var = "Standard";
					$newbid = 200;
				}
				if ($amount == 50){
					$var = "Professional";
					$newbid = 500;
				}

				$unm2 = $_SESSION["username"];

				$sql300="SELECT * FROM user_info WHERE email='$unm2'" ;
				$result300 = $conn->query($sql300);

				if($row300 = $result300->fetch_assoc())
				{
					$bidcount = $row300["bidcount"];
					$bidcount = $bidcount + $newbid;                
					
					$_SESSION["bidcount"] = $bidcount;
					$_SESSION["membership"] = $var;
					$_SESSION["membershipstart"] = $date1;
					$_SESSION["membershipend"] = $date2;

					require('db.php');

					$sql301="UPDATE user_info SET bidcount='$bidcount', membership='$var', membershipstart='$date1', membershipend='$date2' Where email='$unm2'" ;                
				

					if($conn->query($sql301))
					{
						$msg="Membership changed successfully";


						//------------------------------- insert to transaction ----------------------------

						$dtl = "Membership change: $var Plan";
						
						$sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id, usertype ) Values('$unm2',0,'$dtl','DR','$amt - Pay by Card ',0, 'Free')" ;
						$conn->query($sql2) ;

						//-------------------------------

					} else{
						$msg="Error Membership changing";
					}
				}
		}
		//---------------------------------------

			// $_SESSION["membership"] = $var;
			// $_SESSION["membershipstart"] = $date1;
			// $_SESSION["membershipend"] = $date2;			
			

    } 
}

header ('Location: da-cashfree-req-member-return-1.php');
?>

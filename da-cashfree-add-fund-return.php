
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
echo "h0. ";
// -------------------------------------- Get user Data
require('db.php');

$sql="SELECT * FROM user_info WHERE email='$uname' " ;
$result = $conn->query($sql);

if($row = $result->fetch_assoc())
{
     echo "h1. ";
    $_SESSION["username"] = $uname;						
    $_SESSION["first_name"] = $row["first_name"];
    $_SESSION["mobile"] = $row["mobile"];
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["uimage"] = $row["uimage"];
    $_SESSION["country"] = $row["country"];
    $_SESSION["usertype"] = $row["usertype"];

    $_SESSION["membership"] = $row["membership"];
    $_SESSION["bidcount"] = $row["bidcount"];

    
    // -------------------------------------- Add Fund if SUCCESS
    if ($txStatus == "SUCCESS")
    {
       //------------------------- Add Fund ----------------------

       $unm2 = $_SESSION["username"];

        require('db.php');
        $msg="Fund added successfully";
        echo "h2. ";
        //------------------------------- insert to transaction ----------------------------
        $amt = $orderAmount;
        $dtl = "Deposit to wallet";        
        $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id, usertype ) Values('$unm2',$amt,'$dtl','CR','$amt - Add Fund',0, 'Free')" ;
        $conn->query($sql2) ;
        echo "h3. ";
       
    }


    } 
}

header ('Location: da-cashfree-add-fund-return-1.php');
?>

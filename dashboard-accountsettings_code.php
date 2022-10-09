<?php 
session_start();				
        $account_name = ($_POST['account_name']);
        $account_no = ($_POST['account_no']);
        $bank_name = ($_POST['bank_name']);
        $ifsc = ($_POST['ifsc']);
        $branch_name = ($_POST['branch_name']);
       
        $userID = $_SESSION["user_id"];
        $email = $_SESSION["username"];      
        $country =  $_SESSION["country"];
								
		require('db.php');

$msg="";
// prepare and bind

try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	// set the PDO error mode to exception
	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	


    $data = [
        'account_name' => $account_name,
        'account_no' => $account_no,
        'bank_name' => $bank_name,
        'ifsc' => $ifsc,
        'branch_name' => $branch_name,       
        'email' => $email,       

    

    ];


    $sql = "UPDATE user_info SET account_name=:account_name, account_no=:account_no, bank_name=:bank_name,
    ifsc=:ifsc, branch_name=:branch_name WHERE email=:email ";
    $stmt= $conn1->prepare($sql);
  


//----------------------------------------------------


	if ( $stmt->execute($data) === TRUE) {
					
		
	
		$msg="Profile updated.";


		
	} else {
		$msg="Some Error when updating!";
		
	}
	

	
  } catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
  }
  $conn1 = null;


//----------------- Bank Verification Cashfree Start-----------------------------
/*
Below is an integration flow on how to use Cashfree's bank validation.
Please go through the payout docs here: https://dev.cashfree.com/payouts
The following script contains the following functionalities :
    1.getToken() -> to get auth token to be used in all following calls.
    2.verifyBankAccount() -> to verify bank account.
All the data used by the script can be found in the config.ini file. This includes the clientId, clientSecret, bankDetails section.
You can change keep changing the values in the config file and running the script.
Please enter your clientId and clientSecret, along with the appropriate enviornment and bank details
*/




/*

#default parameters
$clientId = '1106732b3acebb281921905ce6376011';
$clientSecret = '8e24e9431f4c215f380c595be1e0d778979ddd8c';
$env = 'test';

#config objs
$baseUrls = array(
    'prod' => 'https://payout-api.cashfree.com',
    'test' => 'https://payout-gamma.cashfree.com',
);
$urls = array(
    'auth' => '/payout/v1/authorize',
    'bankValidation' => '/payout/v1/validation/bankDetails',
);
$bankDetails = array(
    'name' => $account_name,
    'phone' => '7276116725',
    'bankAccount' => $account_no,
    'ifsc' => $ifsc,
);
$header = array(
    'X-Client-Id: '.$clientId,
    'X-Client-Secret: '.$clientSecret, 
    'Content-Type: application/json',
);

$baseurl = $baseUrls[$env];


function create_header($token){
    global $header;
    $headers = $header;
    if(!is_null($token)){
        array_push($headers, 'Authorization: Bearer '.$token);
    }
    echo "h8. ";
    return $headers;
}

function post_helper($action, $data, $token){
  echo "h6. ";
    global $baseurl, $urls;
    $finalUrl = $baseurl.$urls[$action];
    $headers = create_header($token);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $finalUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
    if(!is_null($data)) curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    
    $r = curl_exec($ch);
    
    if(curl_errno($ch)){
        print('error in posting');
        print(curl_error($ch));
        die();
    }
    curl_close($ch);
    $rObj = json_decode($r, true);    
    echo "h7. ";
    if($rObj['status'] != 'SUCCESS' || $rObj['subCode'] != '200') throw new Exception('incorrect response: '.$rObj['message']);
    return $rObj;
}

function get_helper($finalUrl, $token){
    $headers = create_header($token);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $finalUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
    
    $r = curl_exec($ch);
    
    if(curl_errno($ch)){
        print('error in posting');
        print(curl_error($ch));
        die();
    }
    curl_close($ch);

    $rObj = json_decode($r, true);    
    if($rObj['status'] != 'SUCCESS' || $rObj['subCode'] != '200') throw new Exception('incorrect response: '.$rObj['message']);
    return $rObj;
}

#get auth token
function getToken(){
    try{
      echo "h4. ";
       $response = post_helper('auth', null, null);
       return $response['data']['token'];
    }
    catch(Exception $ex){
      echo "h5. ";
        error_log('error in getting token');
        error_log($ex->getMessage());
        echo $ex->getMessage();
        die();
    }

}

function verifyBankAccount($token){
    try{
       echo "h2. ";
        global $bankDetails, $baseurl, $urls;
        $query_string = "?";

        foreach($bankDetails as $key => $value){
            $query_string = $query_string.$key.'='.$value.'&';
        }

        $finalUrl = $baseurl.$urls['bankValidation'].substr($query_string, 0, -1);
        $response = get_helper($finalUrl, $token);
        error_log(json_encode($response));
        
    }
    catch(Exception $ex){
        echo "h3. ";
        error_log('error in verifying bank account');
        error_log($ex->getMessage());
        die();

    }
}




#main execution
$token = getToken();
verifyBankAccount($token);

*/
//----------------- Bank Verification Cashfree End-----------------------------

header('Location: dashboard-accountsettings.php?msg='.$msg);
						
?>
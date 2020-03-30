<!DOCTYPE html>
<html lang="en-US">
<head>
<title>MOBILE OTP VERIFICATION</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<style>
.success{fontsize:16px; color:#3BA956;}
.error{font-size: 16px; color:#E44439}
</style>
</head>
<body bgcolor="#2d545e" text="#FFFFFF" marginwidth="45">
<div class="container">
 <div class="wrapper">
   <br><center><b><u><font face="calibri" color="red" size=8>STRAVENGERS TEAM </font><font face="calibri" size ="8" color="blue">LOGIN SYSTEM</font></u></b></center>
   <br><center><b><u><font face="calibri" color="white" size=6>SMS VERIFICATION</font></u></b></center>
   <hr color="#BB0000">
   <div class="otp-frm">
<?php
session_start();
/* function sendSMS($senderID, $recipient_no, $message){
// Account details
$apiKey = urlencode(‘waAuoxtEWPE-NIZqlgyk8pO6Sip4VtDpxn7mFgBLYT’);
// Message details
$numbers = array($receipient_no);
$sender = urlencode($senderID);
$message = rawurlencode($message);
 
$numbers = implode(‘,’, $numbers);
 
// Prepare data for POST request
$data = array(‘apikey’ => $apiKey, ‘numbers’ => $numbers, “sender” => $sender, “message” => $message);
// Send the POST request with cURL
$ch = curl_init(‘https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
// Process your response here
//echo $response;
    
    // Return curl response
    return $response;
 }*/

// Load and initialize database class
require_once 'DB.class.php';
$db = new DB();
        
$statusMsg = $receipient_no = '';
$otpDisplay = $verified = 0;

$va=!empty($_SESSION['phone']);
// If mobile number submitted by the user
if(isset($_POST['submit_mobile']) && $_SESSION['logged']){
    if($va){
        // Recipient mobile number
        $recipient_no = $_SESSION['phone'];
        
        // Generate random verification code
        $rand_no = rand(10000, 99999);
        $_SESSION['otp']=$rand_no;
        // Check previous entry
        $conditions = array(
            'mobile_number' => $recipient_no,
        );
        $checkPrev = $db->checkRow($conditions);
        
        // Insert or update otp in the database
        if($checkPrev){
            $otpData = array(
                'verification_code' => $rand_no
            );
            $insert = $db->update($otpData, $conditions);
        }else{
            $otpData = array(
                'mobile_number' => $recipient_no,
                'verification_code' => $rand_no,
                'verified' => 0
            );
            $insert = $db->insert($otpData);
        }
        
        if($insert){
            // Send otp to user via SMS
            $message = 'Dear User, OTP for mobile number verification is '.$rand_no.'. Thanks CodexWorld';
            $send = true;  //sendSMS('STRAVENGERS', $recipient_no, $message);
			//if the commented part is taken then api has to work through the wan network
            
            if($send){
                $otpDisplay = 1;
            }else{
                $statusMsg = array(
                    'status' => 'error',
                    'msg' => "We're facing some issue on sending SMS, please try again."
                );
            }
			
        }else{ 
            $statusMsg = array(
                'status' => 'error',
                'msg' => 'Some problem occurred, please try again.'
            );
        } 
    }else{
        $statusMsg = array(
            'status' => 'error',
            'msg' => 'Please enter your mobile number.'
        );
    } 
    
// If verification code submitted by the user
}elseif(isset($_POST['submit_otp']) && !empty($_POST['otp_code'])){
    $otpDisplay = 1;
    $recipient_no = $_SESSION['phone']; //POST['mobile_no'];
    if(!empty($_POST['otp_code'])){
        $otp_code = $_POST['otp_code'];
        
        // Verify otp code
        $conditions = array(
            'mobile_number' => $recipient_no,
            'verification_code' => $otp_code
        );
        $check = $db->checkRow($conditions);
        
        if($check){
            $otpData = array(
                'verified' => 1
            );
            $update = $db->update($otpData, $conditions);
            
            $statusMsg = array(
                'status' => 'success',
                'msg' => 'Thank you! Your phone number has been verified.'
            );
            
            $verified = 1;
        }else{
            $statusMsg = array(
                'status' => 'error',
                'msg' => 'Verification code incorrect, please try again.'
            );
        }
    }
}
elseif($_SESSION['logged']==FALSE){
	$statusMsg = array(
            'status' => 'error',
            'msg' => 'Please enter the registered mobile number.'
        );
		echo '<a href="index.php">click to go back</a>';
}
?>
   <!-- Display status message -->
   <?php echo !empty($statusMsg)?'<p class="'.$statusMsg['status'].'">'.$statusMsg['msg'].'</p>':''; ?>

   <?php if($verified == 1){ ?>
       <p>Mobile No: <?php echo $recipient_no; ?></p>
       <p>Verification Status: <b>Verified</b></p>
	   <a href="layer1_login.php"><font color="red">Click here to proceed with Graphical Login</a>
   <?php }else{ ?>

<!-- OTP Verification form -->
<form method="post">
    <label>Registered Mobile No</label> 
    <input type="text" name="mobile_no" value="<?php echo $_SESSION['phone']; ?>" <?php echo 'readonly';?>/>
    <?php if($otpDisplay == 1){ ?>
	<br>
    <label>Enter OTP</label>
    <input type="text" name="otp_code"/>
    <a href="javascript:void(0);" class="resend">Resend OTP</a>
    <?php } ?>
    <input type="submit" name="<?php echo ($otpDisplay == 1)?'submit_otp':'submit_mobile'; ?>" value="VERIFY"/>
</form>
   <?php } ?>
     </div>
    </div>
   </div>
</body>
</html>
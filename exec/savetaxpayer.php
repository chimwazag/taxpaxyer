<?php
//Include auth
include '../auth.php';
//Include api connection 
require_once('apiconnect.php');

if(isset($_POST['submit'])){
    // assign post values from form to variables
    $tpin = trim(htmlspecialchars($_POST['tpin']));
    $bc = trim(htmlspecialchars($_POST['bc']));	
    $tn = trim(htmlspecialchars($_POST['tn']));
    $regdate = trim(htmlspecialchars($_POST['regdate']));
    $mobile = trim(htmlspecialchars($_POST['mobile']));
    $address = trim(htmlspecialchars($_POST['address']));
    $email = trim(htmlspecialchars($_POST['email']));
    $username = trim(htmlspecialchars($_POST['username']));
    //Assigning values to apiconnect function parameters//
    $post_fields = sprintf('TPIN=%s&BusinessCertificateNumber=%s&TradingName=%s&BusinessRegistrationDate=%s&MobileNumber=%s&Email=%s&PhysicalLocation=%s&Username=%s', $tpin, $bc, $tn, $regdate, $mobile, $address, $email, $username);
    $action = "POST"; 
    $pageurl = "programming/challenge/webservice/Taxpayers/add";
    //Include apiconnection call function
    $data = apiscript($action,$post_fields,$pageurl);
    
    // check if execution is success
    if($data){
        // assign error messages to session
        if($data['Remark']=='Taxpayer already Exists'){
            $_SESSION['msg'] = "Taxpayer already Exists";
        }elseif($data['Remark']=='Username specified does not exist!'){
           $_SESSION['msg'] = "Username specified does not exist!";
        }else{
            $_SESSION['msg'] = "Successfully Registered";
        }
        //Redirect to addtaxpayer page
        header('location: ../addtaxpayer.php');
    }else{
        // assign error messages to session
        $_SESSION['msg'] = "Internal Server Error";
        //Redirect to addtaxpayer page
        header('location: ../addtaxpayer.php');
    }
}

?>

<?php
//Include auth
include '../auth.php';
//Include api Connnection
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
    $post_fields = sprintf('TPIN=%s&BusinessCertificateNumber=%s&TradingName=%s&BusinessRegistrationDate=%s&MobileNumber=%s&Email=%s&PhysicalLocation=%s&Username=%s', $tpin, $bc, $tn, $regdate, $mobile, $email, $address, $username);
    $action = "POST";
    $pageurl = "programming/challenge/webservice/Taxpayers/edit";
    //Include apiconnection call function
    $data = apiscript($action,$post_fields,$pageurl);
    //Include encrpting TPIN
    $entpin = base64_encode($tpin);
    
    if($data){
        if($data['Remark']=='Username specified does not exist!'){
           $_SESSION['msg'] = "Username specified does not exist!";
        }else{
        //assign error messages to session
        $_SESSION['msg'] = "Taxpayer editted successful";
        }
        //Redirect to edittaxpayer page
        header("location: ../edittaxpayer.php?id=$entpin");
    }else{
        //assign error messages to session
        $_SESSION['msg'] = "Error";
        //Redirect to edittaxpayer page
        header("location: ../edittaxpayer.php?id=$entpin");
    }
}

?>

<?php 
session_start();
//Require api connection 
require_once('apiconnect.php');
//Assigning values to apiconnect function parameters//
$post_fields = sprintf('email=%s&', $_SESSION['SESS_EMAIL']);
$pageurl = "programming/challenge/webservice/auth/logout";
$action = "POST";

// apiconnection call function
$data = apiscript($action,$post_fields,$pageurl);

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header('location: ../index.php');

?>
<?php
//Include auth
include '../auth.php';
//Include api connection 
require_once('apiconnect.php');

if(isset($_GET['tpin'])){
    //Assigning values to apiconnect function parameters//
    $post_fields = sprintf('TPIN=%s', $_GET['tpin']);
    $action = "POST";  
    $pageurl = "programming/challenge/webservice/Taxpayers/delete";
    //Include apiconnection call function
    $data = apiscript($action,$post_fields,$pageurl);
    
      header('location: ../taxpayersView.php');  
}
?>
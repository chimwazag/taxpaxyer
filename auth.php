<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_EMAIL is present or not
	if(!isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) == '')) {
		header("location: index.php");
		exit();
	}
        
        //Check whether passed value to a page is not manipulated
        function checkgetdata($data){
            if($data!==$_SESSION['SS_TPIN']){
                $realID=$_SESSION['SS_TPIN'];
                header("location: edittaxpayer.php?id=$realID");
            }
        }
?>
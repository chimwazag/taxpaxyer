<?php
//Start session
session_start();
//Require api connection 
require_once('apiconnect.php');
//Array to store validation errors
$errmsg_arr = array();
 
//Validation error flag
$errflag = false;
 
if(isset($_POST['submit'])){ 
	//Sanitize the POST values
	$username = trim(htmlspecialchars($_POST['username']));
	$password = trim(htmlspecialchars($_POST['password']));
        
        //Replacing @ with special character %40 
	if (strpos($username, '@')) {
		$username = str_replace('@', '%40', $username);
	}
        //Replacing @ with special character %40 
	if (strpos($password, '@')) {
		$password = str_replace('@', '%40', $password);
	}

        //Assigning values to apiconnect function parameters//
	$post_fields = sprintf('email=%s&password=%s', $username, $password);
        $pageurl = "programming/challenge/webservice/auth/login";
        $action = "POST";
        // apiconnection call function
        $data = apiscript($action,$post_fields,$pageurl);
        
	echo $authenticated = (int) $data['Authenticated'];
        
	if ($authenticated > 0) {
            // setting session for user login
                $_SESSION['SESS_EMAIL'] = $data['UserDetails']['email'];
                $_SESSION['Fname'] = $data['UserDetails']['FirstName'];
                $_SESSION['Lname'] = $data['UserDetails']['LastName'];
                
		header('location:../taxpayersView.php');
		exit();
	} else {
                //assigning error message to variable
		$errmsg_arr = 'user name or password not found';
		$errflag = true;
		if($errflag) {
                    //Include setting session for error message
			$_SESSION['msg'] = $errmsg_arr;
			session_write_close();
                        // redirecting to index
			header("location: ../index.php");
			exit();
		}
	}

	echo '</pre>';
	

}
?>
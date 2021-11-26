<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="Taxpayer Details" />
<meta name="author" content="George Chimwaza" />
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" href="logo.png">
<title>Taxpayers</title>
<!-- CSS -->
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">	

</head>
<?php $username=$_SESSION['SESS_EMAIL']; ?>
<body style="background: #1abc9c;">
<nav class="navbar navbar-default panel-success" >
	
    <div class="container"> 
        <ul class="nav navbar-nav navbar-right">  
            <li><a href=""> <i class="glyphicon glyphicon-user"></i> User: <?php echo $username; ?></a></li>  
            <li><a href="exec/logout.php" class="btn btn-danger"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
        </ul>
    </div>

</nav>
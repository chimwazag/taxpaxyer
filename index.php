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
    <title>Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" >
</head>
<body style="background: #1abc9c;">
<div class="container">
    
    <div class="page-header" style="text-align: center;">	
        <div class="row horizontal">
            <div class="col-md-5 col-md-offset-4">
            <?php
            session_start();
            session_destroy(); 
            //display error message when login fail

                //Display error message
                    if(isset($_SESSION['msg'])){
                        echo '<div id="msg" class="alert alert-warning">'.$_SESSION['msg'].'</div>';
                    }
                ?>
            </div>
            <div class="col-md-5 col-md-offset-4">
                <!-- /panel -->
                <div class="">
                    <div class="panel-heading">
                         <h1 class="col-md-10 panel-title">LOGIN</h1>
                    </div>
                     <!-- panel-body -->
                    <div class="panel-body">
                        <form class="form-horizontal" action="exec/login.php" method="post">
                          <div class="form-group">
                            <i class="glyphicon glyphicon-user"></i>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="username" name="username" placeholder="Email Address" autocomplete="off" required />
                            </div>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-lock"></i>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required />
                                </div>
                            </div>								
                            <div class="form-group">
                                <div class="col-sm-10">
                                  <input type="submit" name="submit" value="Sign in" class="btn btn-success"> 
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- panel-body -->
            </div>
                    <!-- /panel -->
        </div>
    </div>
    <!-- /row -->
    </div>
<center><label class="form-control">Welcome To Taxpayers System </label></center>
</div>
	<!-- footer -->
<?php include 'layout/footer.php'; ?>
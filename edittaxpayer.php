<?php 
//Require auth 
require_once('auth.php');
//Require api connection 
require_once('exec/apiconnect.php');
//Assigning values to apiconnect function parameters//
checkgetdata($_GET['id']);
$tpin = base64_decode($_GET['id']);
$action = "GET";
$field = "";
$pageurl="programming/challenge/webservice/Taxpayers/getAll";
//Include apiconnection call function
$datas = apiscript($action,$field,$pageurl);

//Include header
include 'layout/header.php';
?>

<div class="container">
<div class="row">
    <div class="col-sm-8" style="margin-left:100px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h3 class="panel-title">ADD TAXPAYER</h3>
            </div>
            <div class="panel-body">

                <form class="form-horizontal" action="exec/updatetaxpayer.php" method="post" id="register">
                    <fieldset>
                        <div class="col-md-12 form-group">
                            <?php 
                            //Display error message
                                if(isset($_SESSION['msg'])){
                                    echo '<div id="msg" class="alert alert-success">'.$_SESSION['msg'].'</div>';
                                }
                            ?>
                        </div>
                        
                        <?php 
                        // Loop through record set
                        foreach($datas as $data){ 
                            // Comparing selected TPIN against found in the recordset
                            if($tpin==$data['TPIN']){ ?>
                        
                        <div class="col-md-12 form-group">
                            <input  type="hidden" name="id" class="form-control" value="<?php echo $data["id"]; ?>">
                            <input readonly name="tpin" type="text" class="form-control" value='<?php echo $data["TPIN"]; ?>' placeholder="TPIN" required >
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <input name="bc" type="text" class="form-control" value='<?php echo $data["BusinessCertificateNumber"]; ?>' placeholder="Business Certificate" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="tn" type="text" class="form-control" value="<?php echo $data['TradingName']; ?>" placeholder="Trading Name" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="regdate" type="date" class="form-control" value="<?php echo $data["BusinessRegistrationDate"]; ?>" placeholder="Business Registration Date" required>
                        </div>

                         <div class="col-md-12 form-group">
                             <input name="mobile" type="text" class="form-control" value='<?php echo $data["MobileNumber"]; ?>'placeholder="Mobile Phone" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="email" type="text" class="form-control" value='<?php echo $data["Email"]; ?>' placeholder="Email Address" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="address" type="text" class="form-control" value='<?php echo $data["PhysicalLocation"]; ?>' placeholder="Physical Location" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="username" type="text" class="form-control" value='<?php echo $data["Username"]; ?>' placeholder="Username" required>
                        </div>
                        <?php } } ?>
                        <div class="form-group">
                        <div class="col-sm-offset-2 col-md-4">
                            <i class="glyphicon glyphicon-save"></i><input type="submit" name="submit" value="Update" class="btn btn-success"> 
                            <a href="taxpayersView.php" class="btn btn-danger">Cancel</a> 
                        </div>
                        </div>
                        
                        
                    </fieldset>
                </form>
            </div>
            <!-- panel-body -->
    </div>
        <!-- /panel -->
</div>
<!-- /col-md-4 -->
</div>
<!-- /row -->

</div><!-- container -->
	<!-- footer -->
<?php include 'layout/footer.php'; ?>






	
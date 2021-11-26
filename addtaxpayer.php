<?php
//Start session
require_once('auth.php');
//include page header
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

                <form class="form-horizontal" action="exec/savetaxpayer.php" method="post" id="register">
                    <fieldset>
                        <div class="col-md-12 form-group">
                            <?php 
                                if(isset($_SESSION['msg'])){
                                    echo '<div id="msg" class="alert alert-success">'.$_SESSION['msg'].'</div>';
                                }
                            ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input name="tpin" type="text" class="form-control" placeholder="TPIN" required >
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <input name="bc" type="text" class="form-control" placeholder="Business Certificate" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="tn" type="text" class="form-control" placeholder="Trading Name" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="regdate" type="date" class="form-control" placeholder="Business Registration Date" required>
                        </div>


                         <div class="col-md-12 form-group">
                             <input name="mobile" type="numeric" class="form-control" placeholder="Mobile Phone" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email Address" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="address" type="text" class="form-control" placeholder="Physical Location" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input name="username" type="text" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                        <div class="col-sm-offset-2 col-md-4">
                            <i class="glyphicon glyphicon-save"></i><input type="submit" name="submit" value="Save" class="btn btn-success"> 
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

</div>
	<!-- container -->
<?php include 'layout/footer.php'; ?>





	
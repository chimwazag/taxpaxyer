<?php
//Include auth
require_once('auth.php');
//Include api connection 
require_once('exec/apiconnect.php');
unset($_SESSION['msg']);unset($_SESSION['SS_TPIN']);
//Assigning values to apiconnect function parameters//
$pageurl = "programming/challenge/webservice/Taxpayers/getAll";
$action = "GET";
$field = "";
//Include apiconnection call function      
$datas = apiscript($action,$field,$pageurl);
    
// Include heeader
include 'layout/header.php';
?>
<div class="container">
 <div class="row">
   <div class="col-md-16">
    <div class="panel panel-primary">
        <div class="panel-heading">
                <div class="page-heading"> Taxpayers </div>
        </div> <!-- /panel-heading -->
        <div class="panel-body">
           <fieldset>
              <div class="form-group">
                <div class="col-sm-5">
                     <a href="addtaxpayer.php" class="btn btn-primary">Add Taxpayer</a>
                </div>
              </div>
              </br></br>	
              <table class="table table-bordered table-hover table-condensed" id="taxView">
                <thead>
                    <tr class="success">
                        <th>TPIN</th>
                        <th>Business Certificate</th>
                        <th>Trading Name </th>
                        <th width='20%'>Business Registration Date</th>
                        <th width='10%'>Action</th>
                    </tr>
                    </thead>
                    <tbody>	
                    <?php 
                    // Loop through the record set
                         foreach($datas as $data){
                    ?>				 
                    <tr>
                        <td><?php echo $data['TPIN']; ?></td>
                            <td><?php echo $data['BusinessCertificateNumber']; ?></td>
                            <td><?php echo $data['TradingName']; ?></td>
                            <td><?php echo $data['BusinessRegistrationDate']; ?></td>
                            <td><a href="edittaxpayer.php?id=<?php $_SESSION['SS_TPIN']=base64_encode($data['TPIN']); echo base64_encode($data['TPIN']); ?>" class="btn btn-success glyphicon glyphicon-edit"></a>
                                <!-- Button to Open the Modal -->
                                <a href="#" data-toggle="modal" data-target="#myModal<?php echo $id=$data['TPIN']; ?>" title="Delete Taxpayer" class="btn btn-danger glyphicon glyphicon-trash"></a>
                     </tr>
                     <!-- The Modal -->
                    <div class="modal" id="myModal<?php echo $id; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Are You Sure?</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            You are about to delete Taxpayer - <?php echo $data['TPIN']; ?>
                          </div>

                          <!-- Modal footer -->
                          <div class="modal-footer">
                              <a href="exec/deletetaxpayer.php?tpin=<?php echo $data['TPIN']; ?>" class="btn btn-success"> Yes </a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  <?php } ?>
                 </tbody>
                </tr>
                </table>
             </div>
         </fieldset>
        </div>
   </div>
 </div> 
</div>    

 <!--Include footer
<?php include 'layout/footer.php'; ?>

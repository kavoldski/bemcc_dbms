<?php
include('includes/checklogin.php');
check_login();
?>
<script >
  function getSubcat(val) {
    $.ajax({
      type: "POST",
      url: "get_subcat.php",
      data:'cat_id='+val,
      success: function(data){
        $("#subcategory").html(data);
      }
    });
  }
</script>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    
    <?php @include("includes/header.php");?>
    
    <div class="container-fluid page-body-wrapper">
      
      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Promised Money</h5>    
                  <div class="card-tools" style="float: right;">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit" ><i class="fas fa-plus" ></i> New Promise
                    </button>
                  </div>    
                </div>
                
                <div class="modal fade" id="deposit">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Register New Promise</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                        <?php @include("newloan-form.php");?>
                      </div>
                      
                    </div>
                    
                  </div>
                  
                </div>
                
                <div id="editData" class="modal fade">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Promised Payment Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update">
                        
                        <?php @include("loanpayment.php");?>
                      </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        
                      </div>
                      
                    </div>
                    
                  </div>
                  
                </div>
                <div class="card-body table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                   <thead>
                    <tr>
                      <th class="text-center">Promised Date</th>
                      <th class="text-center">Member Name</th>
                     
                      <th class="text-center">Currency</th>
                      <th class="text-center">Promised Amount</th>
                      <th class="text-center">Paid Amount</th>
                      <th class="text-center">Balance</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="SELECT * from tblloans";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);

                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                        {  ?>
                         <tr>
                          <td class="text-center" ><?php  echo htmlentities(date("d-m-Y", strtotime($row->date)));?></td>
                          <td><?php  echo htmlentities($row->bankname);?></td>
                         
                          <td class="text-center"><?php  echo htmlentities($row->currency);?></td> 
                          <td class="text-right"><?php echo htmlentities(number_format($row->promisedamount, 0, '.', ','));?></td>
                          <td class="text-right"><?php echo htmlentities(number_format(($row->promisedamount)-($row->loanamount), 0, '.', ','));?></td>
                          <td class="text-right"><?php echo htmlentities(number_format($row->loanamount, 0, '.', ','));?></td>
                          <td class="text-center"><button class="btn btn-primary btn-xs edit_data" id="<?php echo  ($row->id); ?>">Payment</button></td>
                          <?php 
                        }
                      } ?>
                    </tr>
                  </tbody>                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <?php @include("includes/footer.php");?>
      
    </div>
    
  </div>
  
</div>

<?php @include("includes/foot.php");?>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.edit_data',function(){
      var edit_id=$(this).attr('id');
      $.ajax({
        url:"loanpayment.php",
        type:"post",
        data:{edit_id:edit_id},
        success:function(data){
          $("#info_update").html(data);
          $("#editData").modal('show');
        }
      });
    });
  });
</script>
</body>
</html>

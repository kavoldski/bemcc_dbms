<?php
include('includes/checklogin.php');
check_login();
?>
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
                  <h5 class="modal-title" style="float: left;">Petty cash</h5> 
                </div>
                

                <div class="card-body table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                   <thead>
                    <tr>
                      <th class="text-center">Date</th>
                      <th class="text-center">Details</th>
                      <th class="text-center">method</th>
                      <th class="text-center">Amount</th>
                      <th class="text-center">Withdrawn By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="SELECT * from petty_cash  group by id desc";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                      { 
                        ?>
                        <tr>
                          <td  class="text-center align-middle"><?php  echo htmlentities(date("d-m-Y", strtotime($row->date)));?></td>
                          <td  class="text-left align-middle"><?php  echo htmlentities($row->details);?></td>
                          <td  class="text-left align-middle"><?php  echo htmlentities($row->method);?></td>
                          <td  class="text-right align-middle"><?php echo htmlentities(number_format($row->amount, 0, '.', ','));?></td>
                          <td  class="text-center align-middle"><?php  echo htmlentities($row->initiatedby);?></td>
                        </tr>
                        <?php 
                      }
                    }?>
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

</body>
</html>

<?php
include('includes/checklogin.php');
check_login();
//session_destroy($_SESSION['pdf']);
//session_unset($_SESSION['pdf']);
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
                <div class="modal-header ">
                  <div class="col-md-6">
                    <form method="post" >
                      <div class="input-group col-md-12">
                        <input type="text" class="form-control col-md-12" name="search2" placeholder="search by expense"  required>
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-secondary" type="submit" name="search" >Search</button>
                        </div>
                      </div>
                    </form>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
                  </div>
                  <div class="col-md-6">
                    <span style="float: right;">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addsector" ><i class="fas fa-plus" ></i> Generate pdf
                    </button>
                   </span>  
                 </div>                 
               </div>
               <div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->

                <div class="table-responsive"  id="examp">

                  <table class="table align-items-center table-hover" >
                    <thead>
                      <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Expense Category</th>
                        <th class="text-center">Expense</th>
                        <th class="text-center">Reason</th>
                        <th class="text-right">Amount Spent</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(empty($_POST['search2'])){
                        $sql ="SELECT expence.*,expensecategory.* from expence join expensecategory on expence.category=expensecategory.id ORDER BY expence.id DESC";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        if($query->rowCount() > 0)
                        {
                          foreach($results as $row)
                          {          
                            ?>
                            <tr>
                              <td class=""><?php  echo htmlentities(date("d-m-Y", strtotime($row->date)));?></td>
                              <td class=""><?php  echo htmlentities($row->categoryname);?></td>
                              <td class=""><?php  echo htmlentities($row->expense);?></td>
                              <td class=""><?php  echo htmlentities($row->resoan);?></td>
                              <td class="text-right"><?php echo htmlentities(number_format($row->amount, 0, '.', ','));?></td>
                            </tr>
                            <?php 
                          }
                        }
                      } 
                      if(isset($_POST['search'])&& !empty($_POST['search2'])){
                        $search2 = $_POST['search2'];  
                        $sql ="SELECT expence.*,expensecategory.* from expence join expensecategory on expence.category=expensecategory.id where expence.expense='$search2'   ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        if($query->rowCount() > 0)
                        {
                          foreach($results as $row)
                          {          
                            ?>
                            <tr>
                              <td class=""><?php  echo htmlentities(date("d-m-Y", strtotime($row->date)));?></td>
                              <td class=""><?php  echo htmlentities($row->categoryname);?></td>
                              <td class=""><?php  echo htmlentities($row->expense);?></td>
                              <td class=""><?php  echo htmlentities($row->resoan);?></td>
                              <td class="text-right"><?php echo htmlentities(number_format($row->amount, 0, '.', ','));?></td>
                            </tr>
                            <?php 
                          }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
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
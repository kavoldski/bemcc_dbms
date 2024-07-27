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
                  <h5 class="modal-title">Expense reports</h5> 
                  <span style="float: right;">
                    <button type="button"  class="btn btn-sm btn-outline-info btn-icon-text" data-toggle="modal" data-target="#addsector" ><i class="fas fa-plus" ></i> Generate pdf
                    </button>
                  </span>

                </div>
                <div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
                 <div class=""  id="exampl">

                  <?php
                  $fdate=$_POST['fromdate'];
                  $tdate=$_POST['todate'];

                  ?>
                  <h5 align="center" style="color:brown">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
                  <table  class="table table-bordered" id="example2" width="100%" >
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
                    $sql="SELECT expence.*,expensecategory.* from expence join expensecategory on expence.category=expensecategory.id where date(expence.CreationDate) between '$fdate' and '$tdate'  ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
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
                        <?php $cnt=$cnt+1;
                      }
                    } ?>
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

    
   <script>
    function CallPrint(strid) {
      var prtContent = document.getElementById("exampl");
      var WinPrint = window.open('', '', 'left=0,top=0,width=1000,height=900,toolbar=0,scrollbars=0,status=0');
      WinPrint.document.write(prtContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
    }
  </script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>
</html>
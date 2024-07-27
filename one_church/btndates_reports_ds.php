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
                              <h5 class="modal-title">Bid reports</h5>
                           </div>
                           <div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
                              <div class="card">
                                 <div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
                                    <h4 class="card-title">Between dates reports:</h4>
                                    <form class="forms-sample"  method="post" name="bwdatesreport"  action="btndates_reports.php" enctype="multipart/form-data">
                                       <div class="form-group row col-md-6">
                                          <label for="fromdate" class="col-sm-3 col-form-label">From Date</label>
                                          <div class="col-sm-9">
                                             <input type="date" class="form-control" name="fromdate"  id="fromdate" value="" required='true' >
                                          </div>
                                       </div>
                                       <div class="form-group row col-md-6">
                                          <label for="fromdate" class="col-sm-3 col-form-label">To Date</label>
                                          <div class="col-sm-9">
                                             <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>
                                          </div>
                                       </div>
                                       <button type="submit" name="submit" class="btn btn-info mr-2">Submit</button>
                                    </form>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php @include("includes/footer.php");?>
            <?php @include("includes/foot.php");?>
         </div>
      </div>
      </div>
   </body>
</html>
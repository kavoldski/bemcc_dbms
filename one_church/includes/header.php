 <div id="loading"></div>
<div id="page"></div>
 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top " >
 <!--  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <?php
    // $sql="SELECT * from  tblcompany";
    // $query = $dbh -> prepare($sql);
    // $query->bindParam(':aid',$companyname,PDO::PARAM_STR);
    // $query->execute();
    // $results=$query->fetchAll(PDO::FETCH_OBJ);
    // $cnt=1;
    // if($query->rowCount() > 0)
    // {
    //   foreach($results as $row)
    //   {  
    //     if($row->companylogo=="avatar15.jpg")
    //     { 
          ?>
          <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar"  src="assets/img/avatars/avatar15.jpg" alt=""></a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img  src="assets/img/avatars/avatar15.jpg" alt="logo" /></a>
          <?php 
        // } else { ?>
          <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar" src="assets/img/companyimages/<?php // echo $row->companylogo;?>" alt=""></a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img  src="assets/img/companyimages/<?php // echo $row->companylogo;?>" alt="logo" /></a>
          <?php 
        // } ?>
        <?php
      // }
    // }
    ?>
  </div> -->
  <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between w-100">
  <!--   <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
     -->
    <ul class="navbar-nav navbar-nav-left">
       <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
               
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="churchprofile.php">
               
                <span class="menu-title">Church Details</span>
            </a>
        </li>

    

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Membership</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="newchristian.php">Add Member</a>
              <a class="dropdown-item" href="registerchristian.php">Manage members</a>
              
             
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="attendancy.php">
               
                <span class="menu-title">Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="store.php">
               
                <span class="menu-title">Inventory</span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Expense</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
            
              <a class="dropdown-item" href="add_expense.php">Expenses</a>
              <a class="dropdown-item" href="manage_expense.php">Expense Category</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Finance management</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="bankdeposit.php">Bank Deposit</a>
              <a class="dropdown-item" href="bankwithdraw.php">Bank Withdraw</a>
              <a class="dropdown-item" href="promises.php">Promises</a>
          
            </div>
          </li>
       <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User management</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="userregister.php">Register user </a>
              <?php
                                $aid=$_SESSION['odmsaid'];
                                $sql="SELECT * from  tbladmin where ID=:aid";
                                $query = $dbh -> prepare($sql);
                                $query->bindParam(':aid',$aid,PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {  
                                    foreach($results as $row)
                                    { 
                                        if($row->AdminName=="Admin" )
                                        { 
                                            ?>
                                            <a class="dropdown-item" href="user_permission.php"> User permissions</a>

                                            <?php 
                                        } 
                                    }
                                } ?> 
              
             
            </div>
          </li>
      
  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="generalledger.php">General Ledger</a>
             <a class="dropdown-item" href="petty_cash.php">Bank Ledger</a> 
               <a class="dropdown-item" href="expense_reports.php">Expense reports</a>
                <a class="dropdown-item" href="btndates_reports_ds.php">Btn dates reports</a>
            </div>
          </li>

<li class="nav-item">
            <a class="nav-link" target="_blank" href="https://api.whatsapp.com/send?phone=919423979339&text=Hi%20Nikhil,%20I%20saw%20your%20Project%20named%20as%20One%20Church.%20I%20need%20your%20help%20for%20the%20same.
">
               
                <span class="menu-title">Contact Author</span>
            </a>
        </li>
  <!--     <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="logout.php">
          <i class="mdi mdi-power"></i>
        </a>
      </li> -->
    </ul>
   
       <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <?php 
        $companyname=$_SESSION['companyname'];
        $sql ="SELECT * from tblnotification where status='on'  ORDER BY id DESC ";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $totalnewbooking=$query->rowCount();
        $cnt=1;
        ?>
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-bell-outline"></i>
          <span class="count-symbol "><h5 class="badge2 blue"><?php echo htmlentities($totalnewbooking);?></h5></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0">You have <?php echo htmlentities($totalnewbooking);?> new notification</h6>
          <div class="dropdown-divider"></div>
          <?php 
          $sql ="SELECT * from tblnotification  where status='on'  ORDER BY ID DESC LIMIT 3";
          $query = $dbh -> prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $totalnewbooking=$query->rowCount();
          $cnt=1;

          ?>
          <?php if($query->rowCount() > 0)
          {
            foreach($results as $row)
            {              
              ?>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>

                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1"> You bank account was <?php  echo $row->nature;?> with <?php echo htmlentities(number_format($row->amount, 0, '.', ','));?></h6>
                  <p class="text-gray ellipsis mb-0"> on <?php  echo $row->creationdate;?> </p>
                </div>
              </a>
              <?php 
            }
          } else {?>
            <a class="dropdown-item" href="#">No New notification Received</a>
            <?php
          } ?>
          <div class="dropdown-divider"></div>
          <h6 class="p-3 mb-0 text-center"> <a href="notifications.php">See all new notification</a></h6>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where ID=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $row)
          { 
            ?>
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <?php 
                if($row->Photo=="avatar15.jpg")
                { 
                  ?>
                  <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                  <?php 
                } else { 
                  ?>
                  <img class="img-avatar" src="assets/images/profileimages/<?php  echo $row->Photo;?>" alt=""> 
                  <?php 
                } ?>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-white"><?php  echo $row->FirstName;?> <?php  echo $row->LastName;?></p>
              </div>
            </a>
            <?php
          }
        } ?>

        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="profile.php">
            <i class="mdi mdi-account mr-2 text-success"></i> Profile 
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="change_password.php"><i class="mdi mdi-settings mr-2 text-success"></i> Change Password 
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">
            <i class="mdi mdi-logout mr-2 text-primary"></i> Logout 
          </a>
        </div>
      </li>
    </ul>
  <!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  -->
  </div>
</nav>





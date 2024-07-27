<?php 
include('includes/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
	<div class="container-scroller">
		
		<?php include("includes/header.php");?>
		
		<div class="container-fluid page-body-wrapper">
			
			<?php //@include("/sidebar.php");?>
			
			<div class="main-panel">
				
				<div class="content-wrapper">  
					<strong style="color: red; background-color: white;">
                        Selamat Datang Ke Portal Rasmi BEM CENTRAL CITY</strong>
                        <br><br>
					<div class="row">
						<div class="col-md-6">
						<div class="row">
						<div class="col-md-6 stretch-card grid-margin">
							<div class="card bg-gradient-info card-img-holder text-white"style="height: 150px;">
								<div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
									
									<h4 class="font-weight-normal mb-3">Weekly bankings <i class="mdi mdi-chart-line mdi-24px float-right"></i>
									</h4>
									<?php
                                    //Last Sevendays Sale
									$query8=mysqli_query($conn,"select *
										from banks  where date(transaction_date)>=(DATE(NOW()) - INTERVAL 7 DAY);");
									while($row8=mysqli_fetch_array($query8))
									{
										$sevendays_sale=$row8['transaction_amount'];
										$tseven+=$sevendays_sale;

									}
									?>
									<h2 class="mb-5">
										<?php
										$pop2=0;
										if (strlen($tseven==0)) {
											echo $pop2;
										} else{ 
											echo htmlentities(number_format($tseven, 0, '.', ','));
										}
										?> </h2>
									</div>
								</div>
							</div>
							<div class="col-md-6 stretch-card grid-margin">
								<div class="card bg-gradient-danger card-img-holder text-white"style="height: 150px;">
									<div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
										
										<h4 class="font-weight-normal mb-3">Petty Cash Balance <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
										</h4>
										<?php
                                        //petty cash balance
										$query3=mysqli_query($conn,"select *
											from petty_balance ");
										while($row3=mysqli_fetch_array($query3))
										{
											$petty_balance=$row3['balance'];
											$pettycash+=$petty_balance;

										}
										?>
										<h2 class="mb-5"><?php echo htmlentities(number_format($pettycash, 0, '.', ','));?></h2>
									</div>
								</div>
							</div>
							<div class="col-md-6 stretch-card grid-margin">
								<div class="card bg-gradient-success card-img-holder text-white"style="height: 150px;">
									<div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
										
										<h4 class="font-weight-normal mb-3">Total bank amount <i class="mdi mdi-diamond mdi-24px float-right"></i>
										</h4>
										<?php
                                        //Total Sale
										$query9=mysqli_query($conn,"select *
											from banks ");
										while($row9=mysqli_fetch_array($query9))
										{
											$total_sale=$row9['transaction_amount'];
											$totalsale+=$total_sale;

										}
										?>
										<h2 class="mb-5"><?php echo htmlentities(number_format($totalsale, 0, '.', ','));?></h2>
									</div>
								</div>
							</div>
				
						
							<div class="col-md-6 stretch-card grid-margin">
								<div class="card bg-gradient-purple card-img-holder text-white"style="height: 150px;">
									<div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
										
										<h4 class="font-weight-normal mb-3">Total Male Members <i class="mdi mdi-chart-line mdi-24px float-right"></i>
										</h4>
										<?php $query4=mysqli_query($conn,"Select * from tblchristian where Sex='Male'");
										$totalmale=mysqli_num_rows($query4);
										?>
										<h2 class="mb-5"> <?php echo $totalmale;?></h2>
									</div>
								</div>
							</div>
							<div class="col-md-6 stretch-card grid-margin">
								<div class="card bg-gradient-info card-img-holder text-white"style="height: 150px;">
									<div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
										
										<h4 class="font-weight-normal mb-3">Total Female Members <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
										</h4>
										<?php $query5=mysqli_query($conn,"Select * from tblchristian where Sex='Female'");
										$totalfemale=mysqli_num_rows($query5);
										?>
										<h2 class="mb-5"><?php echo $totalfemale;?></h2>
									</div>
								</div>
							</div>
							<div class="col-md-6 stretch-card grid-margin">
								<div class="card bg-gradient-danger card-img-holder text-white"style="height: 150px;">
									<div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
										
										<h4 class="font-weight-normal mb-3">Total Members <i class="mdi mdi-diamond mdi-24px float-right"></i>
										</h4>
										<?php $query6=mysqli_query($conn,"Select * from tblchristian");
										$totalchristians=mysqli_num_rows($query6);
										?>
										<h2 class="mb-5"><?php echo $totalchristians;?></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="text-center navbar-brand-wrapper">
    <?php
	// echo $companynamel;
    $sql="SELECT * from  tblcompany";
    $query = $dbh -> prepare($sql);
    // $query->bindParam(':aid',$companyname,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      {  
        if($row->companylogo=="avatar15.jpg")
        { 
          ?>
          <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar"  src="assets/img/avatars/avatar15.jpg" alt=""></a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img  src="assets/img/avatars/avatar15.jpg" alt="logos" /></a>
          <?php 
        } else { ?>
          <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar" src="assets/img/companyimages/<?php  echo $row->companylogo;?>" alt="" width="200px"></a>
          
          <?php 
        } ?>
        <?php
      }
    }
    ?>
  </div>
						<div id="piechart" style="width: 100%; height: 500px;"></div>
					</div>
						</div>
					
					</div>
						<div class="row">
							<div class="col-12 grid-margin">
								<div class="card">
									<div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
										<h4 class="card-title">Recent Promises</h4>
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th> Assignee </th>
														<th> Promised Amount </th>
														<th> Paid Amount</th>
														<th> Balance</th>
														<th> Status</th>
														<th> Last Update </th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> Tom Grey
														</td>
														<td> 800,000</td>
														<td> 800,000</td>
														<td> 0</td>
														<td>
															<label class="badge badge-gradient-success">DONE</label>
														</td>
														<td>May 15, 2021 </td>
													</tr>
													<tr>
														<td>
															<img src="assets/images/faces/face2.jpg" class="mr-2" alt="image"> Stella Mercy 
														</td>
														<td> 500,000</td>
														<td> 300,000</td>
														<td> 200,000</td>
														<td>
															<label class="badge badge-gradient-warning">PROGRESS</label>
														</td>
														<td> May 15, 2021</td>
													</tr>
													<tr>
														<td>
															<img src="assets/images/faces/face3.jpg" class="mr-2" alt="image"> Morgan Michel
														</td>
														<td> 1,000,000</td>
														<td> 600,000</td>
														<td>400,000 </td>
														<td>
															<label class="badge badge-gradient-info">PROGRESS</label>
														</td>
														<td>May 8, 2021</td>
													</tr>
													<tr>
														<td>
															<img src="assets/images/faces/face4.jpg" class="mr-2" alt="image"> Joel Doe 
														</td>
														<td> 400,000</td>
														<td> 400,000</td>
														<td> 0</td>
														<td>
															<label class="badge badge-gradient-danger">COMPLETE</label>
														</td>
														<td> May 3, 2021 </td>
													</tr>
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
		<script >

			$(document).ready(function () {
				showGraph2();
			});
			function showGraph2()
			{
				{
					$.post("data.php",
						function (data)
						{
							console.log(data);
							var name = [];
							var marks = [];

							for (var i in data) {
								name.push(data[i].Sex);
								marks.push(data[i].total);
							}

							var chartdata = {
								labels: name,
								datasets: [
								{
									label: 'Student Marks',
									backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            // borderColor: '#46d5f1',
            hoverBackgroundColor: '#CCCCCC',
            hoverBorderColor: '#666666',
            data: marks
        }
        ]
    };

    var graphTarget = $("#graphCanvas2");

    var pieChart = new Chart(graphTarget, {
    	type: 'pie',
    	data: chartdata
    });
});
				}
			}
			$(document).ready(function(){
				$.ajax({
					url: "data1.php",
					method: "GET",
					success: function(data1){
						console.log(data1);
						var name = [];
						var marks = [];

						for (var i in data1){
							name.push(data1[i].expense);

							marks.push(data1[i].amount);
						}
						var chartdata = {
							labels: name,
							datasets: [{
								label: 'Expenses',
								backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
								borderColor: 'rgba(134, 159, 152, 1)',
								hoverBackgroundColor: 'rgba(230, 236, 235, 0.75)',
								hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
								data: marks

							}]
						};
						var graphTarget = $("#graphCanvas4");
						var barGraph = new Chart(graphTarget, {
							type: 'bar',
							data: chartdata,
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								}
							}
						});
					},
					error: function(data) {
						console.log(data);
					}

				});
			});
		</script>
		<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Expenses', 'Hours per Day'],
          ['Female',     11],
          ['Male',      10]
        ]);

        var options = {
          title: 'Total Members'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	</body>
	</html>



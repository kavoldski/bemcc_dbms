<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['deposit-submit']))
{
  $depositedby= $_SESSION['names'];
  $amount=$_POST['amount'];
  $number=$_POST['number'];
  $date=$_POST['date'];
  $description=$_POST['description'];
  $method=$_POST['method'];
  $currency=$_POST['currency'];
  $sql="insert into banks(currency,description,transaction_amount,transaction_ref,transaction_date,transaction_method,deposited_by)values(:currency,:description,:amount,:number,:date,:method,:depositedby)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':amount',$amount,PDO::PARAM_STR);
  $query->bindParam(':number',$number,PDO::PARAM_STR);
  $query->bindParam(':method',$method,PDO::PARAM_STR);
  $query->bindParam(':date',$date,PDO::PARAM_STR);
  $query->bindParam(':description',$description,PDO::PARAM_STR);
  $query->bindParam(':currency',$currency,PDO::PARAM_STR);
  $query->bindParam(':depositedby',$depositedby,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
    $desc=$_POST['description'];
    $amount = $_POST['amount'];
    $refnumber = mt_rand(100000000, 999999999);
    $sql2="insert into general_jaunal(description,credit,ref_no)values(:desc,:amount,:ref)";
    $query=$dbh->prepare($sql2);
    $query->bindParam(':desc',$desc,PDO::PARAM_STR);
    $query->bindParam(':ref',$refnumber,PDO::PARAM_STR);
    $query->bindParam(':amount',$amount,PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("deposited successfully.")</script>';
    echo "<script>window.location.href ='bankdeposit.php'</script>";
    $currency=$_POST['currency'];
    $sql ="select amount as spent from deposit where  currency = '$currency' ";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    foreach($results as $row)
    { 
      $originalaccount = ($row->spent);
      $currency=$_POST['currency'];
      $amount=$_POST['amount'];
      $newaccount = ($originalaccount+$amount);
      $sql="update  deposit set amount = '$newaccount' where  currency = '$currency'";
      $query=$dbh->prepare($sql);
      $query->execute();
    }
  }
  else
  {
   echo '<script>alert("Something Went Wrong. Please try again")</script>';
 }
}
?>

<form role="form" id=" " method="post" enctype="multipart/form-data">
  <div class="card-body">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
    <div class="row">
      <div class=" col-md-4">
        <div class="form-group">
          <label>Currency</label>
          <select class="form-control select2" name="currency" style="width: 100%;">
            <option value="USD"selected="selected">USD</option>
                        <option value="INR">INR</option>
              <option value="AFN">AFN</option>
  <option value="ALL">ALL</option>
  <option value="DZD">DZD</option>
  <option value="USD">USD</option>
  <option value="EUR">EUR</option>
  <option value="AOA">AOA</option>
  <option value="XCD">XCD</option>
  <option value="ARS">ARS</option>
  <option value="AMD">AMD</option>
  <option value="AWG">AWG</option>
  <option value="AUD">AUD</option>
  <option value="AZN">AZN</option>
  <option value="BSD">BSD</option>
  <option value="BHD">BHD</option>
  <option value="BDT">BDT</option>
  <option value="BBD">BBD</option>
  <option value="BYR">BYR</option>
  <option value="BZD">BZD</option>
  <option value="XOF">XOF</option>
  <option value="BMD">BMD</option>
  <option value="BTN">BTN</option>
  <option value="BOB">BOB</option>
  <option value="BAM">BAM</option>
  <option value="BWP">BWP</option>
  <option value="NOK">NOK</option>
  <option value="BRL">BRL</option>
  <option value="BND">BND</option>
  <option value="BGN">BGN</option>
  <option value="BIF">BIF</option>
  <option value="CVE">CVE</option>
  <option value="KHR">KHR</option>
  <option value="XAF">XAF</option>
  <option value="CAD">CAD</option>
  <option value="KYD">KYD</option>
  <option value="CLP">CLP</option>
  <option value="CNY">CNY</option>
  <option value="COP">COP</option>
  <option value="KMF">KMF</option>
  <option value="CDF">CDF</option>
  <option value="NZD">NZD</option>
  <option value="CRC">CRC</option>
  <option value="HRK">HRK</option>
  <option value="CUP">CUP</option>
  <option value="ANG">ANG</option>
  <option value="CZK">CZK</option>
  <option value="DKK">DKK</option>
  <option value="DJF">DJF</option>
  <option value="DOP">DOP</option>
  <option value="ECS">ECS</option>
  <option value="EGP">EGP</option>
  <option value="SVC">SVC</option>
  <option value="ERN">ERN</option>
  <option value="SZL">SZL</option>
  <option value="ETB">ETB</option>
  <option value="FKP">FKP</option>
  <option value="FJD">FJD</option>
  <option value="XPF">XPF</option>
  <option value="GMD">GMD</option>
  <option value="GEL">GEL</option>
  <option value="GHS">GHS</option>
  <option value="GIP">GIP</option>
  <option value="QTQ">QTQ</option>
  <option value="GGP">GGP</option>
  <option value="GNF">GNF</option>
  <option value="GWP">GWP</option>
  <option value="GYD">GYD</option>
  <option value="HTG">HTG</option>
  <option value="HNL">HNL</option>
  <option value="HKD">HKD</option>
  <option value="HUF">HUF</option>
  <option value="ISK">ISK</option>
  <option value="INR">INR</option>
  <option value="IDR">IDR</option>
  <option value="IRR">IRR</option>
  <option value="IQD">IQD</option>
  <option value="GBP">GBP</option>
  <option value="ILS">ILS</option>
  <option value="JMD">JMD</option>
  <option value="JPY">JPY</option>
  <option value="JOD">JOD</option>
  <option value="KZT">KZT</option>
  <option value="KES">KES</option>
  <option value="KPW">KPW</option>
  <option value="KRW">KRW</option>
  <option value="KWD">KWD</option>
  <option value="KGS">KGS</option>
  <option value="LAK">LAK</option>
  <option value="LVL">LVL</option>
  <option value="LBP">LBP</option>
  <option value="LSL">LSL</option>
  <option value="LRD">LRD</option>
  <option value="LYD">LYD</option>
  <option value="CHF">CHF</option>
  <option value="LTL">LTL</option>
  <option value="MOP">MOP</option>
  <option value="MGF">MGF</option>
  <option value="MWK">MWK</option>
  <option value="MYR">MYR</option>
  <option value="MVR">MVR</option>
  <option value="MRO">MRO</option>
  <option value="MUR">MUR</option>
  <option value="MXN">MXN</option>
  <option value="MDL">MDL</option>
  <option value="MNT">MNT</option>
  <option value="MAD">MAD</option>
  <option value="MZN">MZN</option>
  <option value="MMK">MMK</option>
  <option value="NAD">NAD</option>
  <option value="NPR">NPR</option>
  <option value="NIO">NIO</option>
  <option value="NGN">NGN</option>
  <option value="MKD">MKD</option>
  <option value="OMR">OMR</option>
  <option value="PKR">PKR</option>
  <option value="PAB">PAB</option>
  <option value="PGK">PGK</option>
  <option value="PYG">PYG</option>
  <option value="PEN">PEN</option>
  <option value="PHP">PHP</option>
  <option value="PLN">PLN</option>
  <option value="QAR">QAR</option>
  <option value="RON">RON</option>
  <option value="RUB">RUB</option>
  <option value="RWF">RWF</option>
  <option value="SHP">SHP</option>
  <option value="WST">WST</option>
  <option value="STD">STD</option>
  <option value="SAR">SAR</option>
  <option value="RSD">RSD</option>
  <option value="SCR">SCR</option>
  <option value="SLL">SLL</option>
  <option value="SGD">SGD</option>
  <option value="SBD">SBD</option>
  <option value="SOS">SOS</option>
  <option value="ZAR">ZAR</option>
  <option value="SSP">SSP</option>
  <option value="LKR">LKR</option>
  <option value="SDG">SDG</option>
  <option value="SRD">SRD</option>
  <option value="SEK">SEK</option>
  <option value="SYP">SYP</option>
  <option value="TWD">TWD</option>
  <option value="TJS">TJS</option>
  <option value="TZS">TZS</option>
  <option value="THB">THB</option>
  <option value="TOP">TOP</option>
  <option value="TTD">TTD</option>
  <option value="TND">TND</option>
  <option value="TRY">TRY</option>
  <option value="TMT">TMT</option>
  <option value="UGX">UGX</option>
  <option value="UAH">UAH</option>
  <option value="AED">AED</option>
  <option value="UYU">UYU</option>
  <option value="UZS">UZS</option>
  <option value="VUV">VUV</option>
  <option value="VEF">VEF</option>
  <option value="VND">VND</option>
  <option value="YER">YER</option>
  <option value="ZMW">ZMW</option>
  <option value="ZWD">ZWD</option>  
            
            
          </select>
        </div>
        
      </div>
      
      <div class="col-md-4">
        <div class="form-group">
          <label>Transaction Date</label>
          <input type="date" name="date" class="form-control " />
        </div>       
      </div>
      
      <div class="col-md-4 col-xs-4">
        <div class="form-group">
          <label>Transaction Method</label>
          <select class="form-control select2" name="method" style="width: 100%;">
            <option value="Cash" selected="selected">Cash</option>
            <option value="Cheque">Cheque</option>
          </select>
        </div>
        
      </div>
    </div>
    <div class="row">
      <div class="offset-md-4 col-md-4 col-xs-8">
        <div class="form-group">
          <label for="branch">Reference Number</label>
          <input name="number" type="text" class="form-control" id="ref" placeholder="Enter Reference No" required>
        </div>        
      </div>
      
      <div class="col-md-4">
        <div class="form-group">
          <label>Transaction Amount</label>
          <input class="form-control" type="text" name="amount" placeholder="Enter transaction Amount" required>
        </div>        
      </div>
      
    </div>
    <div class="row">
      <div class="form-group col-md-12 col-sm-12">
        <label for="feDescription">Description</label>
        <textarea class="form-control" name="description" rows="5" required></textarea>
      </div>
    </div>
    
    <div class="modal-footer text-right">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" name="deposit-submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
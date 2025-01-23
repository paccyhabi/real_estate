<!DOCTYPE html>
<html lang="en">
<?php
include 'conn.php';
if (isset($_GET['token'])) {
  $token=$_GET['token'];
  $user=$conn->query("SELECT * FROM `users`, orders_info WHERE  orders_info.user_id=users.user_id and  orders_info.token='$token' and  orders_info.payment_status='pending'");
  $ro=mysqli_fetch_array($user);
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <title>Payment Confrimation</title>
  <link href="assets/img/idbklogo.png" rel="icon">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login">
        <h2 class="form-login-heading">Payment Order</h2>
        
        <div class="login-wrap" style="font-size:16px">
          <p>Dear: <?php echo $ro['fname'];?> <?php echo $ro['lname'];?></b> You are going to pay amount this amount <b><?php echo number_format($ro['total_paid'],1);?> rwf</b> of Your Submitted Ordering at Real Estate<br> Please Click on Pay now to terminate your Payment.</p>
        </form>

  <form action="" method="post" id="">  
<input type="hidden" name="amount" value="<?php echo $ro['total_paid'];?>">
<input type="hidden" name="currency" value="RWF" >
<input type="hidden" name="comment" value="Real Estate">
<input type="hidden" name="client_token" value="<?php echo $ro['token'];?>">

<input type="hidden" name="return_url" value="http://localhost/real_estate/return">
<input type="hidden" name="app_id" value="6fa4680e9ceb1f2f4d4b5a29c471dea6">
<input type="hidden" name="app_secret" value="JDJ5JDEwJGovclhP">
  <button class="btn btn-theme btn-block" onclick="document.index.submit();"><i class="fa fa-dolar"></i>
    <script>
    window.alert("Thank for buying/renting")
    window.location.href='index'
  </script>

   Proceed </a>Payment</button>
</form>
          <hr>
            </span>
          </div>
          </div>
        </div> 
      </form>
    </div>
  </div>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
<?php 
}
else{
  ?><script>
    window.alert("invalid Url")
    window.location.href='index'
  </script>
  <?php
}

?>

</body>

</html>

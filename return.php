<!DOCTYPE html>
<html lang="en">
<?php 
if (isset($_GET) && isset($_GET['status'])=='success') {
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
        <h2 class="form-login-heading">Payment Initialization</h2>
        
        <div class="login-wrap" style="font-size:16px">
        <b>Dear Customer</b> Check Payment message to your Mobile Phone and confrim your Payment by Dial <b>1</b> to your Mobile Phone or if payment message not initiated</p>
                  <p>Dial <b>*182*7*1#</b> then Press <b>Yes Button</b> to follow information</p>

                  <p>If you finished to pay Click to the button Bellow to login into to your Account</p>
                  <a href="admin/"><button class="btn btn-theme btn-block"><i class="fa fa-dolar"></i> Continue to Your Account</button></a>
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
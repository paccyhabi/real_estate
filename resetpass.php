
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <title>Password Reset</title>
  <link href="img/favicon.png" rel="icon">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<style type="text/css">
  #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
}

#message p {
  padding: 10px 35px;
  font-size: 12px;
}
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>

<body>
  <div id="login-page">
    <div class="container">
    <?php
    $error=NULL;
include('conn.php');
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($conn,"
SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link from the email, 
or you have already used the key in which case it is deactivated.</p>';
  }
  else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
      
        <form class="form-login" action="" method="POST" name="update">
          <h2 class="form-login-heading">Resetting Password</h2>
          <input type="hidden" name="action" value="update" />
        <div class="login-wrap">
          <label>Enter new Password</label>
          <input type="password" class="form-control" id="psw" name="pass1" placeholder="Password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >

        <div id="message">
  <h5>Password must contain the following:</h5>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>

          <br>
          <label>Comfirm your Password</label>
          <input type="password" class="form-control" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"

           placeholder="Confrim Password"><br>
           <input type="hidden" name="email" value="<?php echo $email;?>"/>
          <button class="btn btn-theme btn-block"  name="generate" type="submit"><i class="fa fa-sign-in"></i> Reset</button>
          <hr>
          </div></form>
<?php
}
else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which as valid only 30 minutes.<br />Please request new link from Forgot Password? password<br /></p>";
        }
    }
if($error!=""){
  ?>
<script>
    window.alert('The link is expired. You are trying to use the expired link which as valid only 30 minutes,Please request new link from Forgot Password? password')
    window.location.href='https://www.mobileschool.xyz/login'
  </script>";
  <?php
  }     
} 


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
    ?>
    <script>
    window.alert('Password do not match, both password should be same'?>)
    window.history.back()
  </script>";
    <?php
    }
    else{

$pass1 = md5($pass1);
mysqli_query($conn,
"UPDATE `users` SET `password`='".$pass1."', `vkey`='".$curDate."' WHERE `email`='".$email."';"); 

mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
?>
<script>
  window.alert('Congratulations! Your password has been updated successfully. You may login to your Account')
  window.location.href='https://www.mobileschool.xyz/login'
</script>
<?php   
    }   
}
?>
</div></div></body></html>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}
myInput.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  if(myInput.value.length >=8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>








</body>

</html>

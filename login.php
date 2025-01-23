<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <title>_Login</title>
  <link href="assets/img/idbklogo.png" rel="icon"> 
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>
<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="post">
        <h2 class="form-login-heading">Sign in</h2>
        
        <div class="login-wrap">
          <label>Email</label>
          <input type="text" class="form-control" name="email" placeholder="email here..." id="email">
          <br>
          <label>Password</label>
          <input type="password" class="form-control" name="password" id="check" placeholder="Password"><br>
          <span><p> <input type="checkbox" onclick="view()"> Show Password</p></span>
          <center><div class="message_box" style="margin:10px 0px;">
          </div></center>
          
          <button class="btn btn-theme btn-block" id="login"  type="submit"><i class="fa fa-sign-in"></i> Login</button>
          <hr>
          <p>If you don't have an Account Please  <a data-toggle="modal" href="login#sign_up">Sign up</a></p>
          <span>
            <a data-toggle="modal" href="login#myModal" class="text-center" style="font-size: 18px;text-align: center;"> Forgot Password?</a>
            </span>
          </div>
          </div>
        </div>
      </form>
<?php include 'conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$error=NULL;
$check=NULL;
session_start();
if (isset($_POST['reset'])) {
$emails=$_POST['email'];
$emails=$conn->real_escape_string($emails);
if (empty($emails)) {
  ?>
  <script>
    window.alert("Please your email can not be empty")
    window.history.back()
  </script>
  <?php
}
else{
$sel=$conn->query("SELECT * FROM users where email='$emails'");
$check=mysqli_num_rows($sel);
if ($check) {
$expFormat = mktime(date("H"), date("i")+30, date("s"), date("m")  , date("d"), date("Y"));
  $expDate = date("Y-m-d H:i:s",$expFormat);
  $key = md5(time().$emails);
  $addKey = substr(md5(uniqid(rand(),1)),3,10);
  $key = $key . $addKey;
mysqli_query($conn,
"INSERT INTO `password_reset_temp` (`email`, `vkey`, `expDate`)
VALUES ('".$emails."', '".$key."', '".$expDate."');");
  $rowname=mysqli_fetch_array($sel);
  $name=$rowname['fname'];
  $lname=$rowname['lname'];
  $_SESSION['name']=$name." ".$lname;
  $_SESSION['email']=$emails;
  require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$output='<p>Dear '.$name.' '.$lname.' ,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://www.mobileschool.xyz/resetpass?key='.$key.'&email='.$emails.'&action=reset" target="_blank">https://www.mobileschool.xyz/resetpass?key='.$key.'&email='.$emails.'&action=reset</a></p>';    
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 30 minutes for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';    
$output.='<p>Thanks,</p>';
$output.='<p>IDBK Adminstration Team</p>';
$body = $output;
try {                
  $mail->isSMTP(true);                      
  $mail->Host  = 'premium180.web-hosting.com';         
  $mail->SMTPAuth = true;             
  $mail->Username = 'noreplay@mobileschool.xyz';        
  $mail->Password = 'Cyabingo12@';            
  $mail->SMTPSecure = 'tls';              
  $mail->Port  = 587;
  $mail->setFrom('noreplay@mobileschool.xyz', 'IDBK');    
  $mail->addAddress($emails);
  $mail->isHTML(true);                
  $mail->Subject = 'IDBK-Password Recovery';
  $mail->Body = $body;
  $mail->AltBody = 'Body in plain text for non-HTML mail clients';
  $mail->send();
  ?>
  <script>
    window.location.href='thank2'
  </script>
  <?php
  }
  catch (Exception $e) {
  ?>
  <script>
    window.alert("OOPS! Something Went Wrong. Please check your Connection")
    window.history.bak()
  </script>
  <?php
}
}
else{
  ?>
  <script>
    window.alert("Please your email not Found")
    window.history.bak()
  </script>
  <?php
}

}
}
 ?>

        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sign_up" data-backdrop="false" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create Account</h4>
                 <p style="color: white;">Registration form for new Users/Customers.</p>
              </div>
              <form method="POST" action="sign_up">
              <div class="modal-body">

                <p>First name.</p>
                <span class="alert-danger" style="margin-bottom: 10px;"></span>
                <input type="text" id="fname" name="fname" placeholder="first name" autocomplete="off" class="form-control placeholder-no-fix" required>


                <p>Last name.</p>
                <span class="alert-danger" style="margin-bottom: 10px;"></span>
                <input type="text" id="lname" name="lname" placeholder="last name" autocomplete="off" class="form-control placeholder-no-fix" required>

                <p>phone number.</p>
                <span class="alert-danger" style="margin-bottom: 10px;"></span>
                <input type="text" id="phone" name="phone" placeholder="phone" autocomplete="off" class="form-control placeholder-no-fix" required>

                <p>Email.</p>
                <span class="alert-danger" style="margin-bottom: 10px;"></span>
                <input type="email" id="sign_up_email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                <p>Create Password.</p>
                <span class="alert-danger" style="margin-bottom: 10px;"></span>
                <input type="password" id="password" name="password" placeholder="password" autocomplete="off" class="form-control placeholder-no-fix" required>


                <p>Confrim Password.</p>
                <span class="alert-danger" style="margin-bottom: 10px;"></span>
                <input type="password" id="cpass" name="cpass" placeholder="password" autocomplete="off" class="form-control placeholder-no-fix" required>


              </div>
              <center><div class="message_error" style="margin:10px 0px;">
          </div></center>
              <div class="modal-footer">
                <button class="btn btn-theme" type="submit" name="sign_up" id="tsign_up">Submit</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                

              </div>
            </form>
            </div>
          </div>
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" data-backdrop="false" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <form method="POST" action="">
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <span class="alert-danger" style="margin-bottom: 10px;"><?php echo $error;?></span>
                <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="submit" name="reset">Submit</button>

              </div>
            </form>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
function view() {
  var x = document.getElementById("check");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    $.backstretch("img/banner1.jpg", {
      speed: 500
    });
  </script>

  <script>
$(document).ready(function() {
  var delay = 2000;
  $('#login').click(function(e){
    e.preventDefault();
    
    var email = $('#email').val();
        if(email == ''){
      $('.message_box').html(
      '<span style="color:red;">Enter Email Address!</span>'
      );
      $('#email').focus();
            return false;
      }
    if( $("#email").val()!='' ){
      if( !isValidEmailAddress( $("#email").val() ) ){
      $('.message_box').html(
      '<span style="color:red;">Provided email address is incorrect!</span>'
      );
      $('#email').focus();
      return false;
      }
      }
      
    var password = $('#check').val();
        if(password == ''){
      $('.message_box').html(
      '<span style="color:red;">Enter Your Your Password!</span>'
      );
      $('#message').focus();
            return false;
      } 
          
      $.ajax
      ({
       type: "POST",
       url: "stu_lo.php",
             data: "password="+password+"&email="+email,
       beforeSend: function() {
       $('.message_box').html(
       '<p style="color:green;font-size:16px"> Please wait... </p>'
       );
       },    
             success: function(data)
       {
         setTimeout(function() {
                    $('.message_box').html(data);
                }, delay);
      
             }
       });
  });
      
});

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
</script>
</body>

</html>

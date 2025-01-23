<?php
 include 'conn.php';
 session_start();
 if (isset($_FILES["file-input"]["tmp_name"])) {
if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_FILES["file-input"]["tmp_name"]) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['program'])) {
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $program=$_POST['program'];

    $lname=mysqli_real_escape_string($conn,$lname);
    $fname=mysqli_real_escape_string($conn,$fname);
    $email=mysqli_real_escape_string($conn,$email);
    $program=mysqli_real_escape_string($conn,$program);
    $_SESSION['name']=$fname." ".$lname;
    $_SESSION['cls']=$program;

    if (strlen($phone)!=10) {
         echo' <div class="alert alert-danger">
    <strong>Sorry!</strong> Please Phone number must be 10 Digits.
  </div>';
    }
    else{
        $nphone='+25'.$phone;
$sele=$conn->query("SELECT * FROM  students where fname='$fname' and lname='$lname' and phone='$nphone'");
if (mysqli_num_rows($sele)>0) {
    echo' <div class="alert alert-danger">
    <strong>Try Again!</strong> Please Your Application Already Exist. Wait for feedback to your Application
  </div>';
        }
        else{        
$fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $allowed_image_extension = array(
        "pdf","jpg","jpeg"
    );

    $file_extension =strtolower(pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION));
    

    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        echo' <div class="alert alert-warning">
    <strong>Sorry!</strong> Please Choose an file.
  </div>';
    }    
    else if (! in_array($file_extension, $allowed_image_extension)) {
        echo' <div class="alert alert-warning">
    <strong>Sorry!</strong> Only JPG, JPEG & PDF files are allowed..
  </div>';
    }    
    else if (($_FILES["file-input"]["size"] > 5000000)) {
       echo' <div class="alert alert-warning">
    <strong>Sorry!</strong> Please Your file size exceeds 5MB! Try Again.
  </div>';
    }    
     else {
        $target = "attachements/" .rand()." ".$fname." ".date('d-m-Y')." ".$_FILES["file-input"]["name"];
        $location=$target;
        $date=date('d-m-Y');
        $location=mysqli_real_escape_string($conn,$location);
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {

        	$insert=$conn->query("INSERT INTO `students`(`roll`, `fname`, `lname`, `photo`, `email`, `phone`, `reg_date`, `program`,status) VALUES (NULL,'$fname','$lname','$location','$email','$nphone','$date','$program','Pending')");

        	if ($insert) {

$output='<p>Dear '.$fname.' '.$lname.' ,</p>';
$output.='<p>Thank you for submitting your request to IDBK.</p>';
$output.='<p>-------------------------------------------------------------</p>'; 
$output.='<p>Your request has been received, please be patient while your Application is being reviewed by our team .</p>';  
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>and you will receive another message informing you of the status of your Application .</p>';
$output.='<p>If you have a problem, do not hesitate to contact us</p>';    
$output.='<p>Thank you,</p>';
$output.='<p>IDBK Adminstration Staff</p>';
$body = $output;
ltg::notify_email($email,'Application Received',$body,'IDBK Application Received');

echo '<div class="alert alert-success">
    <strong>Success!</strong> Registraion has been Received Successifully.
  </div>;
  <script>
  	window.location.href="thank"
  </script>';

        	}
            else{
            echo '<div class="alert alert-danger">
    <strong>Success!</strong>'.$conn->error.'
  </div>';
            }
        }
    }
}
}
}
else{
	echo '<div class="alert alert-warning">
    <strong>Sorry!</strong> All Filed must be contain data.
  </div>';
}
}

if (isset($_POST['sendemail'])) {
    $output=NULL;
    $send=NULL;
    $name=$_POST['fname'];
    $phone =$_POST['phone'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $message=mysqli_real_escape_string($conn,$message);
    $subject=mysqli_real_escape_string($conn,$subject);

 $output.='<p>New message From IDBK Website on Contact</p>';
    $output.='<p> '.$subject.' </p>';    
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>My name: '.$name. ' </p>';
$output.='<p>My Mobile number is: '.$phone.' </p>';
$output.='<p>'.$message.'</p>';    
$output.='<p>Thanks You,</p>';
$output.='<p>'.$name.'</p>';
$send=ltg::contact_us('gilbertishimwe2020@gmail.com',$email,$output,$name,$subject);
   if ($send !=NULL) {
    echo '<div class="alert alert-success">
    <strong>Success!</strong> Your email was Received by IDBK Staff members<br> We are reply to your email as soon as possible.
  </div>';


}
else{
    echo '<div class="alert alert-success">
    <strong>Success!</strong> Your email was Received by IDBK Staff members<br> We are reply to your email as soon as possible.
  </div>
<script>
window.location.href="index"
</script>';

}   
}

?>

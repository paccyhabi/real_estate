    <?php
    include 'session.php';
  if (isset($_POST['send'])) {
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone'] && !empty($_POST['email']) && !empty($_POST['position']))) {
      $insert='';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email=$_POST['email'];
        $position=$_POST['position'];
        $selt=$conn->query("SELECT * from teams where position='$position'");
        if (mysqli_num_rows($selt)>0) {
          ?>
    <script>
      window.alert("Please This Position Already exits")
      window.history.back()
    </script>
          <?php
        }
        else{
       $pname=rand(1000,10000).'lt'.$_FILES['file']['name'];
        $temp=$_FILES['file']['tmp_name'];
      if ($_FILES['file']['size'] > 500000) {
    echo "Sorry, your file is too large.";

   }
   else{
    $dir ='../attachements/';
    $path = $dir.$pname;
  move_uploaded_file($temp, $dir."/".$pname);
$insert=$conn->query("INSERT INTO `teams`(`team_id`, `fname`, `lname`, `photo`, `position`, `email`, `phone`) VALUES (NULL,'$fname','$lname','$path','$position','$email','$phone')");
}
  if ($insert) {
    ?>
    <script>
      window.alert("Thank you for your Upload")
      window.location.href='users'
    </script>
    <?php
  }
else{
  echo "Ivalid Data";
}
}
}
}
if (isset($_POST['send_message'])) {
  if (!empty($_POST['msg']) && !empty($_POST['subject']) && !empty($_POST['email'])) {

    $email=$_POST['email'];
    $message=$_POST['msg'];
    $message=mysqli_real_escape_string($conn,$message);
    $subj=$_POST['subject'];
    $send=ltg::send_email($email,$subj,$message,'gilbertishimwe2020@gmail.com');
  }
  
}
?>


    
<?php
	include('conn.php');
	session_start();
	if (isset($_POST['email']) && isset($_POST['password'])){
		if (!empty($_POST['email']) && !empty($_POST['password'])) {
			$email=$_POST['email'];
			$password=$_POST['password'];
			$email=mysqli_real_escape_string($conn,$email);
			$password=mysqli_real_escape_string($conn,$password);

	 $sel=$conn->query("SELECT * FROM `users` WHERE  `user_email`='$email' and `user_password`='$password'");
			 $num=mysqli_num_rows($sel);
			 if ($num) {
			 	$sel=mysqli_fetch_array($sel);
			 	$_SESSION['id']=$sel['user_id'];
			 	$_SESSION['name']=$sel['lname'];
			 	$_SESSION['role']=$sel['access'];
               echo"
               <span style='color:green; font-weight:bold;font-size:14px'>
	              Success Login.
	              </span>
				<script>
					window.location.href='admin/';
				</script>";
			}
			else{
				echo"<span style='color:red; font-weight:bold;font-size:14px'>
	              Sorry! Your Account not Found.
	              </span>".$conn->error;
				
			}
		}
		else{
			echo"<span style='color:red; font-weight:bold;font-size:14px'>
	              Sorry! Fill out All data.
	              </span>";

			}
		}
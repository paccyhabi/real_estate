<?php include 'conn.php';
if (isset($_POST['sign_up'])) {
	if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpass'])) {
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$phone=$_POST['phone'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$cpass=$_POST['cpass'];
				$fname=mysqli_real_escape_string($conn,$fname);
				$lname=mysqli_real_escape_string($conn,$lname);
				$email=mysqli_real_escape_string($conn,$email);
				if (!ctype_alnum($phone)) {
					?>
					<script>
						window.alert("Please phone number must be Digits")
						window.history.back()
					</script>
					<?php
				}
				else if (strlen($phone)<10) {
					?>
					<script>
						window.alert("Please phone number must be 10 Digits")
						window.history.back()
					</script>
					<?php
				}
				elseif($password != $cpass){
					?><script>
						window.alert("Please Pasword is not match")
						window.history.back()
					</script>
					<?php
				}
				else{
					$selee=$conn->query("SELECT * from users where user_email='$email'");
					

					if (mysqli_num_rows($selee)>0) {
						?>
						<script>
						window.alert("Please Email already Exist try another email address")
						window.history.back()
					</script>
						<?php
					}
					else{
						$insert=$conn->query("INSERT INTO `users`(`user_id`, `fname`, `lname`, `user_phone`, `user_email`, `user_password`) VALUES (NULL,'$fname','$lname','$phone','$email','$password')");

						if ($insert) {
							?>
							<script>
						window.alert("WEll done! Success")
						window.location.href='login'
					</script>
							<?php
						}
						else{
							echo $conn->error;

						}

					}





				}
				
				
			}
			else{
				?><script>
					window.alert("Please Fill out all inputs")
					window.history.back()
				</script>
				<?php
			}

		}
?>
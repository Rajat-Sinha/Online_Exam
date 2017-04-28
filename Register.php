<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online Web Quiz-Register</title>

		<!-- CSS -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
		<link rel="stylesheet" href="assets/css/style.css">

	</head>

	<body>

		<!-- Top content -->
		<div class="top-content">
			
			<div class="inner-bg">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2 text">
                             <h1><a href="index.php"><strong>Online</strong> Web Quiz</a></h1>
                            <!--<div class="description">
                            	<p>
	                            	COol
                            	</p>
                            </div>-->
                        </div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3 form-box">
							<div class="form-top">
								<div class="form-top-left">
									<h3>Register Here to Take Quiz</h3>
								</div>
								<div class="form-top-right">
									<i class="fa fa-lock"></i>
								</div>
							</div>
							<div class="form-bottom">
								<form role="form" action="<?php $current_file?>" method="POST" class="login-form">
									<div class="form-group">
										<label class="sr-only" for="name">Name</label>
										<input type="text" name="name" placeholder="Name..." class="form-username form-control" id="form-username">
									</div>
									<div class="form-group">
										<label class="sr-only" for="username">Username</label>
										<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
									</div>
									<div class="form-group">
										<label class="sr-only" for="email">Email</label>
										<input type="text" name="email" placeholder="Email..." class="form-username form-control" id="form-username">
									</div>
									<div class="form-group">
										<label class="sr-only" for="password">Password</label>
										<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
									</div>
									<div class="form-group">
										<label class="sr-only" for="repassword">Re-type Password</label>
										<input type="password" name="repassword" placeholder="Re-Type Password..." class="form-password form-control" id="form-password">
									</div>
									<button type="submit" class="btn">Register!</button>
								</form>
							</div>
						</div>
					</div>
					<!--<div class="row">
						<div class="col-sm-6 col-sm-offset-3 social-login">
							<h3>...or login with:</h3>
							<div class="social-login-buttons">
								<a class="btn btn-link-2" href="#">
									<i class="fa fa-facebook"></i> Facebook
								</a>
								<a class="btn btn-link-2" href="#">
									<i class="fa fa-twitter"></i> Twitter
								</a>
								<a class="btn btn-link-2" href="#">
									<i class="fa fa-google-plus"></i> Google Plus
								</a>
							</div>
						</div>
					</div>-->
				</div>
			</div>
			
		</div>


		<!-- Javascript -->
		<script src="assets/js/jquery-1.11.1.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.backstretch.min.js"></script>
		<script src="assets/js/scripts.js"></script>
		
		<!--[if lt IE 10]>
			<script src="assets/js/placeholder.js"></script>
		<![endif]-->

	</body>

</html>
<?php
@require('Core.inc.php');
@require('Connect.inc.php');
$name=@$_POST['name'];
$username=@$_POST['username'];
$email=@$_POST['email'];
$pass=@$_POST['password'];
$repass=@$_POST['repassword'];
if(isset($name) && isset($username) && isset($email) && isset($pass) && isset($repass)){
	if(!empty($name) && !empty($username) && !empty($email) && !empty($pass) && !empty($repass)){
		if(strlen($name)>20 || strlen($username)>20 || strlen($email)>30 || strlen($pass)>30){
			echo 'Please ahear to maxlength of fields.';
		}else{
			if($pass==$repass){
				$query="SELECT `username` FROM `register` WHERE `username`='$username'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0){
					echo $username.' Already Exists';
				}else{
					$query="INSERT INTO `register` (`id`, `name`, `username`, `email`, `password`) VALUES (NULL, '$name', '$username', '$email', '$pass');";
					if($query_run=mysqli_query($con,$query)){
						
						header('Location:index.php');
					}else{
						echo  'Could Not Be Register';
					}
				}
		    }else{
				echo 'Password Doesn\'t Match';
			}
		}

	}
}
?>
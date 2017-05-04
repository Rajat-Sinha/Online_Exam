<?php 
ob_start();
?>
<?php
@require('AdminCore.inc.php');
@require('AdminConnect.php');
$query="SELECT `Name` FROM `admin` WHERE `id`='".$_SESSION['admin_id']."'";
$query_run=mysqli_query($con,$query);
if($query_run){
		$fetch_data=mysqli_fetch_assoc($query_run);
}
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
				<title>Admin</title>
	<link href="https://fonts.googleapis.com/css?family=Exo+2:300,400" rel="stylesheet">
	<!-- required --> 
	<link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../css/stellarnav.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- required -->
<style>
/* styles for this sample only */
*{ margin: 0; padding: 0; }
body { height: 100%; height: 100%; font-size: 16px; font-family: 'Exo 2', sans-serif; background: #efefef; font-weight: 300; }
.header { text-align: center; }
.header a { padding: 50px 0; display: block; font-size: 48px; text-decoration: none; color: #555; }
@media only screen and (max-width : 1000px) {
	.stellarnav > ul > li > a { padding: 20px 23px; }
}
</style>

</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<div class="header">
		<a href="#"><strong>Student</strong> Login Database</a>
	</div>
	<div id="main-nav" class="stellarnav">
		<ul>
			 <li><a href="admin.php">Home</a></li>
				<li><a href="Student.php">Student's Database</a></li>
				<li><a href="InsertQuestion.php">Inserting Questions</a></li>
				<li><a href="#">Start New Quiz</a></li>
				<li class="drop-left"><a href="">Welcome <?php echo " ".$fetch_data['Name'];?></a>
					<ul>
						<li><a href="#">My Account</a></li>
						<li><a href="LogOut.php">Log Out</a></li>
					</ul>
				</li>
		</ul>
	</div>
	<div class="container">
		<h2 style="text-align:center">HTML:</h2>
		<form class="form-horizontal" role="form" action="<?php $current_file?>" method="post" style="margin-left:00px;">
					<div class="form-group">
						<div class="col-sm-12" style="padding-top:20px;"> 
							<input type="text" name="html_ques" class="form-control" id="html_ques" placeholder="Enter Question">
						</div>
						<div class="col-sm-6" style="padding-top:20px;"> 
							<input type="text" name="html_op_1" class="form-control" id="html_op_1" placeholder="Enter First Options">
						</div>
						<div class="col-sm-6" style="padding-top:20px;"> 
							<input type="text" name="html_op_2" class="form-control" id="html_op_2" placeholder="Enter Second Options">
						</div>
						<div class="col-sm-6" style="padding-top:20px;"> 
							<input type="text" name="html_op_3" class="form-control" id="html_op_3" placeholder="Enter Third Options">
						</div>
						<div class="col-sm-6" style="padding-top:20px;"> 
							<input type="text" name="html_op_4" class="form-control" id="html_op_4" placeholder="Enter Fourth Options">
						</div>
					</div><br>
					<div class="form-group"> 
						<div class="col-sm-3"></div>
						<div class="col-sm-offset-2 col-sm-3">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
						<div class="col-sm-6"></div>
					</div>
				</form>
				<?php
					 if(isset($_POST['html_ques']) && isset($_POST['html_op_1']) && isset($_POST['html_op_2']) && isset($_POST['html_op_3']) && isset($_POST['html_op_4'])){
							if(!empty($_POST['html_ques']) && !empty($_POST['html_op_1']) && !empty($_POST['html_op_2']) && !empty($_POST['html_op_3']) &&!empty($_POST['html_op_4'])){
								$html_ques=$_POST['html_ques'];
								$html_op_1=$_POST['html_op_1'];
								$html_op_2=$_POST['html_op_2'];
								$html_op_3=$_POST['html_op_3'];
								$html_op_4=$_POST['html_op_4'];
								$query="SELECT `Question` FROM `html` WHERE `Question`='$html_ques'";
								$query_run=mysqli_query($con,$query);
								if(mysqli_num_rows($query_run)>0){
									 echo $html_ques.' questions already exists';
								}else{
									$query="INSERT INTO  `html` (`id`, `Question`, `Option1`, `Option2`, `Option3`,`Option4`) VALUES (NULL, '$html_ques', '$html_op_1', '$html_op_2', '$html_op_3','$html_op_4');";
									if(mysqli_query($con,$query)){
										echo 'Question Inserted';
									}else{
										echo 'Error Occured..';
									}
								}
							}
					 }
				?>
	</div>
	<div class="container">
		<h2 style="text-align:center">CSS:</h2>
		<form class="form-horizontal" role="form" action="<?php $current_file?>" method="post" style="margin-left:00px;">
					<div class="form-group">
						<div class="col-sm-12" style="padding-top:20px;"> 
							<input type="text" name="css_ques" class="form-control" id="css_ques" placeholder="Enter Question">
						</div>
						<div class="col-sm-6" style="padding-top:20px;"> 
							<input type="text" name="css_op_1" class="form-control" id="css_op_1" placeholder="Enter First Options">
						</div>
						<div class="col-sm-6" style="padding-top:20px;"> 
							<input type="text" name="css_op_2" class="form-control" id="css_op_2" placeholder="Enter Second Options">
						</div>
						<div class="col-sm-6" style="padding-top:20px;"> 
							<input type="text" name="css_op_3" class="form-control" id="css_op_3" placeholder="Enter Third Options">
						</div>
						<div class="col-sm-6" style="padding-top:20px;"> 
							<input type="text" name="css_op_4" class="form-control" id="css_op_4" placeholder="Enter Fourth Options">
						</div>
					</div><br>
					<div class="form-group"> 
						<div class="col-sm-3"></div>
						<div class="col-sm-offset-2 col-sm-3">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
						<div class="col-sm-6"></div>
					</div>
				</form>
				<?php
					 if(isset($_POST['css_ques']) && isset($_POST['css_op_1']) && isset($_POST['css_op_2']) && isset($_POST['css_op_3']) && isset($_POST['css_op_4'])){
							if(!empty($_POST['css_ques']) && !empty($_POST['css_op_1']) && !empty($_POST['css_op_2']) && !empty($_POST['css_op_3']) &&!empty($_POST['css_op_4'])){
								$css_ques=$_POST['css_ques'];
								$css_op_1=$_POST['css_op_1'];
								$css_op_2=$_POST['css_op_2'];
								$css_op_3=$_POST['css_op_3'];
								$css_op_4=$_POST['css_op_4'];
								$query="SELECT `Question` FROM `css` WHERE `Question`='$css_ques'";
								$query_run=mysqli_query($con,$query);
								if(mysqli_num_rows($query_run)>0){
									 echo $css.' questions already exists';
								}else{
									$query="INSERT INTO  `css` (`id`, `Question`, `Option1`, `Option2`, `Option3`,`Option4`) VALUES (NULL, '$css_ques', '$css_op_1', '$css_op_2', '$css_op_3','$css_op_4');";
									if(mysqli_query($con,$query)){
										echo 'Question Inserted';
									}else{
										echo 'Error Occured..';
									}
								}
							}
					 }
				?>
	</div>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
	<script type="text/javascript" src="../js/stellarnav.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery('.stellarnav').stellarNav({
				theme: 'light'
			});
		});
	</script>
</body>
</html>
<?php
@require("Core.inc.php");
@require("Connect.inc.php");

$query="SELECT * FROM `register` WHERE `id`='$_SESSION[user_id]'";
$query_run=mysqli_query($con,$query);
if($query_run){
  $fetch_data=mysqli_fetch_assoc($query_run);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Online Web Quiz</title>
  <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400" rel="stylesheet">
  <!-- required --> 
  <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/stellarnav.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="js/bootstrap.min.js"></script>
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
  <div id="main-nav" class="stellarnav">
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="">Quiz Results</a></li>
        <li><a href="">Start New Quiz</a></li>
        <li class="drop-left"><a href="">Welcome <?php echo " ".$fetch_data['name'];?></a>
          <ul>
            <li><a href="Account.php">My Account</a></li>
            <li><a href="#">Log Out</a></li>
          </ul>
        </li>
    </ul>
  </div><!-- .stellar-nav -->
  <div class="header">
    <a href="#"><strong>My </strong> Account</a>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
       <div class="row">
          <p><label class="col-md-5">Name:</label><label class="col-md-7"><?php echo $fetch_data['name'];?></label></p>
       </div><br>
       <div class="row">
          <p><label class="col-md-5">UserName:</label><label class="col-md-7"><?php echo $fetch_data['username'];?></label></p>
       </div><br>
       <div class="row">
          <p><label class="col-md-5">Email:</label><label class="col-md-7"><?php echo $fetch_data['email'];?></label></p>
       </div><br>
       <form class="form-horizontal" role="form" action="<?php $current_file?>" method="post" style="margin-left:00px;">
          <div class="form-group">
            <label class="control-label col-sm-5" for="pwd">Current Password:</label>
            <div class="col-sm-7"> 
              <input type="password" name="current_pass" class="form-control" id="pwd" placeholder="Enter password">
            </div>
          </div><br>
          <div class="form-group">
            <label class="control-label col-sm-5" for="pwd">New Password:</label>
            <div class="col-sm-7"> 
              <input type="password" name="new_pass" class="form-control" id="pwd" placeholder="Enter password">
            </div>
          </div><br>
          <div class="form-group">
            <label class="control-label col-sm-5" for="pwd">Confirm Password:</label>
            <div class="col-sm-7"> 
              <input type="password" name="confirm_pass" class="form-control" id="pwd" placeholder="Enter password">
            </div>
          </div><br>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Change Password</button>
            </div>
          </div>
        </form>
    </div>
    <div class="col-md-4"></div>
  </div>
  <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script type="text/javascript" src="js/stellarnav.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      jQuery('.stellarnav').stellarNav({
        theme: 'light'
      });
    });
  </script>
</body>
</html>
<?php
$pass=$fetch_data['password'];
if(isset($_POST['current_pass']) && isset($_POST['new_pass']) && isset($_POST['confirm_pass'])){
  if(!empty($_POST['current_pass']) && !empty($_POST['new_pass']) && !empty($_POST['confirm_pass'])){
      $current_pass=$_POST['current_pass'];
      $new_pass=$_POST['new_pass'];
      $confirm_pass=$_POST['confirm_pass'];
      if($current_pass==$pass){
        if($new_pass==$confirm_pass){
          $query="UPDATE `register` SET `password`='$new_pass' WHERE `id`='$_SESSION[user_id]'";
          $query_run=mysqli_query($con,$query);
          if($query_run){
            echo 'Password SuccessFully Changed';
          }
        }else{
          echo 'New Password Doesn\'t match';
        }
      }else{
        echo 'Please Enter the Correct Current Password!...';
      }
  }
}
?>
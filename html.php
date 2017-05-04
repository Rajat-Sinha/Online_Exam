<?php 
ob_start();
?>
<?php
@require("Core.inc.php");
@require("Connect.inc.php");

$query="SELECT `name` FROM `register` WHERE `id`='".$_SESSION['user_id']."'";
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
        <title>Admin</title>
  <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400" rel="stylesheet">
  <!-- required --> 
  <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/stellarnav.min.css">
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
    <a href="#"><strong>HTML</strong>Quiz</a>
  </div>
  <div id="main-nav" class="stellarnav">
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Quiz Results</a></li>
        <li><a href="Start_quiz.php">Start New Quiz</a></li>
        <li class="drop-left"><a href="">Welcome <?php echo " ".$fetch_data['name'];?></a>
          <ul>
            <li><a href="Account.php">My Account</a></li>
            <li><a href="LogOut.php">Log Out</a></li>
          </ul>
        </li>
    </ul>
  </div><!-- .stellar-nav -->
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender==$data['Option1']) echo "checked";?> value=".$data['Option1'].">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <?php
    $query="SELECT * FROM `html`";
    $query_run=mysqli_query($con,$query);
  ?>
  <div class="row">
    <form role="form" action="<?php $current_file?>" method="post" class="login-form">
      <?php
      while($data=mysqli_fetch_assoc($query_run)){
        echo 
          " <div class='container' style='padding-top:20px;'>
              <div class='col-md-12' style='font-size:30px;'>".$data['id'].")\t".$data['Question']."</div>
              <div>
                  <div class='col-md-6' style='padding-top:20px;'><input type='radio' name='option' value=".$data['Option1'].">".$data['Option1']."</div>
                  <div class='col-md-6' style='padding-top:20px;'><input type='radio' name='option' value=".$data['Option2'].">".$data['Option2']."</div>
              </div>
              <div style='padding-top:20px;'>
                <div class='col-md-6' style='padding-top:20px;'><input type='radio' name='option' value=".$data['Option3'].">".$data['Option3']."</div>
                <div class='col-md-6' style='padding-top:20px;'><input type='radio' name='option' value=".$data['Option4'].">".$data['Option4']."</div>
              </div>
            </div>
          ";
      }
     ?>
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
      <div class="col-md-4" style="padding-top:20px;">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
   </form> 
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
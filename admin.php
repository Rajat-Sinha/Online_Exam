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
    <a href="#"><strong>Admin</strong> Page</a>
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
  </div><!-- .stellar-nav -->
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
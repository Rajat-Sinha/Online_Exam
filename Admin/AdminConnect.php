<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='online_exam';
$conn_error="Could not connect";
$con=@mysqli_connect($mysql_host,$mysql_user,$mysql_pass);
if(!@mysqli_connect($mysql_host,$mysql_user,$mysql_pass) || !@mysqli_select_db($con,$mysql_db)){
	die($conn_error);
}
?>
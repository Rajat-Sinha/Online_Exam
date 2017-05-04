<?php
@session_start();
$current_file=$_SERVER['SCRIPT_NAME'];//Returns the path of the current script
if(isset($_SERVER['HTTP_REFERER'])  && !empty($_SERVER['HTTP_REFERER'])){
	$current_url=$_SERVER['HTTP_REFERER'];//Returns the complete URL of the current page 
}
?>
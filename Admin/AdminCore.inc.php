<?php
@session_start();
$current_file=$_SERVER['SCRIPT_NAME'];//Returns the path of the current script
if(isset($_SERVER['HTTP_REFERER'])  && !empty($_SERVER['HTTP_REFERER'])){
	$current_url=$_SERVER['HTTP_REFERER'];//Returns the complete URL of the current page 
} 
function mysqli_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();
 
    return $data[$field];
}
function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		return true;
	}else{
		return false;
	}
}
?>
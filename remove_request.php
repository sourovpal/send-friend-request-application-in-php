<?php 
// remove_request.php

include('db.php');
session_start();
$current_user_id = $_SESSION['user_id'];
if(isset($_POST['to_user_id']))
{
	$to_user_id = $_POST['to_user_id'];

	mysqli_query($con, "DELETE FROM `request` WHERE (to_user_id='$to_user_id' AND form_user_id = '$current_user_id') OR (to_user_id='$current_user_id' AND form_user_id = '$to_user_id')");
}





 ?>
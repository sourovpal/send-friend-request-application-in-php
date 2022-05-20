<?php 
// add_friend.php

include('db.php');
session_start();
$current_user_id = $_SESSION['user_id'];
if(isset($_POST['to_user_id']))
{
	$to_user_id = $_POST['to_user_id'];

	mysqli_query($con, "INSERT INTO `request`(`form_user_id`, `to_user_id`) VALUES ('$current_user_id', '$to_user_id')");
}






 ?>
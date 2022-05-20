<?php 
// show_my_friend.php
include('db.php');
session_start();
$current_user_id = $_SESSION['user_id'];

function get_user_name($con, $user_id)
{
	$result = mysqli_query($con, "SELECT * FROM `user_info` WHERE user_id = '$user_id'");
	while ($name = mysqli_fetch_array($result))
	{
		return $name['user_name'];
	}
}


$output_1 = '';
$result_1 = mysqli_query($con, "SELECT * FROM `friends` WHERE form_user_id = '$current_user_id' OR to_user_id='$current_user_id'");
$output_1 .= '
		<table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>My Friend</th>
                </tr>
            </thead>
            <tbody>
';
while ($row = mysqli_fetch_array($result_1))
{
	if($row['form_user_id'] == $current_user_id)
	{

		$output_1 .='
			<tr>
    	        <td class="d-flex justify-content-between px-4"><strong>'.get_user_name($con, $row["to_user_id"]).'</strong><button class="btn btn-sm btn-secondary remove_friend" id="'.$row["to_user_id"].'">Delete Friend</button></td>
    	    </tr>
		';
	}
	else
	{
		$output_1 .='
			<tr>
    	        <td class="d-flex justify-content-between px-4"><strong>'.get_user_name($con, $row["form_user_id"]).'</strong><button class="btn btn-sm btn-secondary remove_friend" id="'.$row["form_user_id"].'">Delete Friend</button></td>
    	    </tr>
		';
	}
}

$output_1 .='
	    </tbody>
    </table>
';

echo $output_1;



 ?>



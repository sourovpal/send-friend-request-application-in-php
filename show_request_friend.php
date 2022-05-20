
<?php 
// show_request_friend.php

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

function get_my_friend($con, $to_user_id, $current_user_id)
{
    $result = mysqli_query($con, "SELECT * FROM `friends` WHERE to_user_id='$to_user_id' AND form_user_id='$current_user_id'");

	return mysqli_num_rows($result);

}

// function get_request_friend($con, $to_user_id, $current_user_id)
// {
//     $result = mysqli_query($con, "SELECT * FROM `request` WHERE (to_user_id='$to_user_id' AND form_user_id='$current_user_id') OR (to_user_id='$current_user_id' AND form_user_id='$to_user_id')");

// 	return mysqli_num_rows($result);

// }






$output = '';
$result = mysqli_query($con, "SELECT * FROM `request` WHERE to_user_id='$current_user_id'");
$output .= '
		<table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Friend Requset</th>
                </tr>
            </thead>
            <tbody>
';
while ($row = mysqli_fetch_array($result))
{
	 $my_friend = get_my_friend($con, $row["form_user_id"], $current_user_id);
	 if($my_friend == 1)
	 {

	 }
	 else
	 {
		$output .='
			<tr>
    	        <td class="d-flex justify-content-between px-4"><strong>'.get_user_name($con, $row["form_user_id"]).'</strong><div><button class="btn btn-sm btn-info confirm" id="'.$row["form_user_id"].'">Confirm</button><button class="ml-2 btn btn-sm btn-danger remove_request" id="'.$row["form_user_id"].'">Remove</button></div></td>
    	    </tr>
		';

	 }
}

$output .='
	    </tbody>
    </table>
';

echo $output;




 ?>
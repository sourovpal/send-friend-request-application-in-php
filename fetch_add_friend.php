<?php 
// fetch_all_friend.php
include('db.php');
session_start();
$current_user_id = $_SESSION['user_id'];


function get_friend_request($con, $to_user_id, $current_user_id)
{
    $result = mysqli_query($con, "SELECT * FROM `request` WHERE (to_user_id='$to_user_id' AND form_user_id = '$current_user_id')");
    return mysqli_num_rows($result);

}

function get_friend_request_confirm($con, $to_user_id, $current_user_id)
{
    $result = mysqli_query($con, "SELECT * FROM `request` WHERE (to_user_id='$current_user_id' AND form_user_id = '$to_user_id')");
    return mysqli_num_rows($result);

}

function get_my_friend($con, $to_user_id, $current_user_id)
{
    $result = mysqli_query($con, "SELECT * FROM `friends` WHERE (to_user_id='$to_user_id' AND form_user_id = '$current_user_id') OR (to_user_id='$current_user_id' AND form_user_id = '$to_user_id')");

return mysqli_num_rows($result);

}









$output = '';
$result = mysqli_query($con, "SELECT * FROM `user_info`");
$output .= '
		<table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Add Friend</th>
                </tr>
            </thead>
            <tbody>
';
while ($row = mysqli_fetch_array($result))
{
    $confirm_friend = get_friend_request($con, $row["user_id"], $current_user_id);
    $confirm_friend_confirm = get_friend_request_confirm($con, $row["user_id"], $current_user_id);
    $my_friend = get_my_friend($con, $row["user_id"], $current_user_id);
	if($current_user_id == $row["user_id"])
	{

	}
    else if($confirm_friend == 1)
    {
        $output .='
            <tr>
                <td class="d-flex justify-content-between px-4"><strong>'.$row["user_name"].'</strong><button class="btn btn-sm btn-danger remove_request" id="'.$row["user_id"].'" >Remove</button></td>
            </tr>
        ';
    }
    else if($my_friend == 1)
    {

    }
     else if($confirm_friend_confirm == 1)
    {
         $output .='
            <tr>
                <td class="d-flex justify-content-between px-4"><strong>'.$row["user_name"].'</strong><button class="btn btn-sm btn-info confirm" id="'.$row["user_id"].'" >Confirm</button></td>
            </tr>
        ';
    }
    else
    {
		$output .='
			<tr>
    	        <td class="d-flex justify-content-between px-4"><strong>'.$row["user_name"].'</strong><button class="btn btn-sm btn-primary add_friend" id="'.$row["user_id"].'" >Add Friend</button></td>
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






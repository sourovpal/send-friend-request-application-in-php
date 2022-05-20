<?php 

session_start();
if(!isset($_SESSION['user_name'], $_SESSION['user_id']))
{
    header('location:logout.php');
}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <style>
        body
            {
            }
        </body>
        .main
        {
            width:320px;
            background:#fff;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <br>
        <div align="center" class="display-4 font-weight-bold">Add Friends</div>
        <div class="" align="right">
            <strong>Hi - </strong><small><?php echo $_SESSION['user_name']; ?> - </small><a href="logout.php">Logout</a>
        </div>
        <br>
        <div class="row">
            <div id="show_add_friend" class="col-md-4">
            
            </div>
            <div id="show_my_friend" class="col-md-4">
            2
            </div>
             <div id="show_request_friend" class="col-md-4">
            1
            </div>
        </div>
    </div>
</body>
</html>
<script>


$(document).ready(function(){



    fetch_all_friend();
    function fetch_all_friend()
    {
        $.ajax({
            url:'fetch_add_friend.php',
            method:'post',
            success:function(data)
            {
                $('#show_add_friend').html(data);
            }
        });

        $.ajax({
            url:'show_my_friend.php',
            method:'post',
            success:function(data1)
            {
                $('#show_my_friend').html(data1);
            }
        });
        $.ajax({
            url:'show_request_friend.php',
            method:'post',
            success:function(data2)
            {
                $('#show_request_friend').html(data2);
            }
        });
    }


$(document).on('click', '.add_friend', function(){
    var to_user_id = $(this).attr('id');
    $.ajax({
            url:'add_friend.php',
            method:'post',
            data:{to_user_id:to_user_id},
            success:function(data)
            {
              fetch_all_friend();
            }
        });
});



$(document).on('click', '.confirm', function(){
    var to_user_id = $(this).attr('id');
    $.ajax({
            url:'confirm_friend.php',
            method:'post',
            data:{to_user_id:to_user_id},
            success:function(data)
            {
              fetch_all_friend();
            }
        });
});



$(document).on('click', '.remove_request', function(){
    var to_user_id = $(this).attr('id');
    $.ajax({
            url:'remove_request.php',
            method:'post',
            data:{to_user_id:to_user_id},
            success:function(data)
            {
              fetch_all_friend();
            }
        });
});


$(document).on('click', '.remove_friend', function(){
    var to_user_id = $(this).attr('id');
    if(confirm('Are you sure delete your friend ?'))
    {
    $.ajax({
            url:'remove_friend.php',
            method:'post',
            data:{to_user_id:to_user_id},
            success:function(data)
            {
              fetch_all_friend();
            }
        });
    }
    else
    {
        return false;
    }
});




setInterval(function(){
      fetch_all_friend();
},5000);


















});















</script>



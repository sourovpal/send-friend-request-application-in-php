<?php 
session_start();
if(isset($_SESSION['user_name'], $_SESSION['user_id']))
{
    header('location:index.php');
}


include('db.php');
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($con, "SELECT * FROM `user_info` WHERE email = '$email'");
    if(mysqli_num_rows($result) >0)
    {
       while ($row = mysqli_fetch_array($result))
       {
          if(password_verify($password, $row['password']))
          {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            header('location:index.php');
          }
          else
          {
            $className = 'animation-alert';
            $message = 'Password Not Match !';
          }
       }
    }
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
    	.none
    	{
    		outline:none !important;
    		box-shadow:none !important;
    	}
        body
        {
            background:#dede00;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            width:100%;
            overflow:hidden;

        }
        .main
        {
            width:320px;
            background:#f4f8ff;
            margin:0px auto;
            padding:15px;
            border-radius:10px;
            border: 1px solid #afccff;
        }
        .form-title
        {
        	font-size:25px;
        	text-align:center;
        	font-weight:bold;
        	margin-bottom:9px;
        	color:#dede00;

        }
        #login
        {
        	background:#dede00;
        	color:#656565;
        	font-weight:bold;
        	letter-spacing: 0.8px;
        }
       	.custom-alert
        {
        	position:absolute;
        	top:5px;
        	right:5px;
        	transform:translateX(150%);
        	width:300px;
        	height:40px;
        	background:#ffbb54;
        	border-left:5px solid #fb9803;
        	border-radius:3px;
        	transition:1s;
        }
        .alert-body
        {
        	display:flex;
        	justify-content:space-between;
        	align-items:center;
        }
        .custom-alert .alert-icon
        {
        	width:40px;
        	/*background:rgba(140, 140, 140, 0.25);*/
        	height:40px;
        	justify-content:center;
        	align-items:center;
        	display: flex;
        	border-top-left-radius:3px;
        	border-bottom-left-radius:3px;
        }
        .custom-alert .alert-icon .fa
        {
        	color:#ef4d00;
        }
        .custom-alert .alert-close
        {
        	width:40px;
        	background:rgba(140, 140, 140, 0.25);
        	height:40px;
        	display:flex;
        	justify-content:center;
        	align-items:center;
        	border-top-right-radius:3px;
        	border-bottom-right-radius:3px;
        }
        .custom-alert .alert-close .close
        {
        	line-height:40px;
        	margin-top:-5px;
        }
        .animation-alert
        {
        	transform:translate(-0%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main shadow">
        	<div class="form-title">User Login</div>
        	<form id="login_form" method="post">
        		<div class="form-group">
        			<input id="email" class="form-control none form-control-sm" type="email" name="email" placeholder="Enter your email address">
        		</div>
        		<div class="form-group">
        			<input id="password" class="form-control form-control-sm none" type="password" name="password" placeholder="Enter your password">
        		</div>
        		<div class="form-group">
        			<button name="login" type="submit" id="login" class="btn btn-sm btn-block none">Login</button>
        		</div>
        	</form>
        </div>
    </div>

    <div id="alert" class="custom-alert <?php if(isset($className)){echo $className;} ?>">
    	<div class="alert-body">
    		<span class="alert-icon"><i class="fa fa-warning"></i></span>
    		<span class="alert-text-area"><strong>Alert : </strong><small style="color:#ff3535;" id="alert_text"><?php if(isset($message)){echo $message;} ?></small></span>
    		<span class="alert-close"><button class="close none">&times;</button></span>
    	</div>
    </div>


</body>
</html>
<script>


$(document).ready(function(){

        $('#login').click(function(e){
        if($('#email').val() == '')
        {
             $('#alert').addClass('animation-alert');
             $('#alert_text').html('Email Field is Required !');
             return false;
        }
        else if($('#password').val() == '')
        {
             $('#alert').addClass('animation-alert');
             $('#alert_text').html('Password Field is Required !');
             return false;
        }
        else
        {
            return true;
        }
    });
    $('.alert-close').click(function(){
        $('#alert').removeClass('animation-alert');
    });
    setInterval(function(){
        $('#alert').removeClass('animation-alert');
    },10000);

});



</script>
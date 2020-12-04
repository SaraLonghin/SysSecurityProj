<!DOCTYPE html>
<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<title>Change Password</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style2.css">
</head>
    <style>
        body {
            overflow-x: hidden;
        }
        .main-content{
            width: 50%;
            height: 40%;
            margin: 10px auto;
            background color: #fff;
            border:2px solid black;
            padding: 40px 50px;
        }
        .header{
            border: none;
            margin-bottom: 5px;
        }
        #signup{
            width: 60%;
            border-radius: 30px;
        }
    
    </style>
<body>
<div class="row">
</div>
    <div class='row'>
    <div class='col-sm-12'>
        <div class='main-content'>
        <div class='header'>
        <h3 class='text-info' style='text-align:center;'><strong>Change Password</strong></h3><hr>    
        </div>
            <div class='l_pass'>
            <form action="" method="get">
                <div class='input-group'>
                <span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>
                    <input class='form-control' type='password' name='pass' placeholder='Enter new Password' required id='password'>
                
                </div><br><br>
                
                <div class='input-group'>
                <span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>
                     <input type='password' name='pass1' class='form-control' placeholder='Re-enter new Password' required id='password'>
                </div><br>
                <center><button id='signup' class='btn btn-info btn-lg' name='change'>Save Changes</button></center></form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_GET['change'])){
    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email = '$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);
    
    $user_id = $row['user_id'];
    
    $pass = $_GET['pass'];
     $pass1 =  $_GET['pass1'];
    
    if($pass == $pass1){
        if(strlen($pass) >= 9 && strlen($pass) <= 60){
            $update = "update users set user_pass='$newpass' where user_id='$user_id'";
            
            $run = mysqli_query($con, $update);
            echo "<script>alert('Your Password has been changed!')</script>";
            echo "<script>window.open('home.php','_self')</script>";
        }
        else {
             echo "<script>alert('Your Password should be greater than 9 letters')</script>";
        }
    } else {
         echo "<script>alert('Your Passwords did not match, please try again!')</script>";
            echo "<script>window.open('change_password.php','_self')</script>";
    }
}

?>

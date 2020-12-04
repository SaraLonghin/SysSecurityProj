<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
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
        <h3 class='text-info' style='text-align:center;'><strong>Forgot Password</strong></h3><hr>    
        </div>
            <div class='l_pass'>
            <form action="" method="post">
                <div class='input-group'>
                <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
                    <input class='form-control' type='email' name='email' placeholder='Enter your Email' required id='email'>
                
                </div><br><br>
                <pre class='text'>Enter your first pet's name down below:</pre>
                <div class='input-group'>
                <span class='input-group-addon'><i class='glyphicon glyphicon-pencil'></i></span>
                     <input type='text' name='recover_account' class='form-control' placeholder='Someone' required id='msg'>
                </div><br>
                <a style='text-decoration: none; float: right;' href='signin.php' data-toggle='tooltip' title='Signin'>Back to Login</a><br><br>
                <center><button id='signup' class='btn btn-info btn-lg' name='submit'>Submit</button></center></form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['submit'])) {

		$email =  $_POST['email'];
		$recover_account =  $_POST['recover_account'];

		$select_user = "select * from users where user_email='$email' AND recovery_account='$recover_account'";
		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['user_email'] = $email;

			echo "<script>window.open('change_password.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or Answer is incorrect')</script>";
		}
	}
?>
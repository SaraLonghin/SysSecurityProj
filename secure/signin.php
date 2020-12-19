<!DOCTYPE html>
<html>
<head>
	<title>Signin</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body{
		overflow-x: hidden;
        background: #f4f7fa;
        height: 100vh;
        font-family: "Lato", sans-serif;
	-webkit-font-smoothing: antialiased;
	font-smoothing: antialiased;
	}
   
	.main-content{
		width: 50%;
		height: 40%;
		margin: 10px auto;
		background-color: #20509e;
		padding: 40px 50px;
        border-radius: 20px;
	}
    
    .gradient-bg {
	
	background: -webkit-gradient(linear, left top, right top, from(#3e2bce), color-stop(100%, #2dd3aa), color-stop(100%, #2dd3aa), to(#2dd3aa));
	background: -o-linear-gradient(left, #3e2bce 0%, #2dd3aa 100%, #2dd3aa 100%, #2dd3aa 100%);
	background: linear-gradient(to right, #3e2bce 0%, #2dd3aa 100%, #2dd3aa 100%, #2dd3aa 100%);
	
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3e2bce', endColorstr='#2dd3aa', GradientType=1);
	
}
    
	.header{
		border: 0px solid #000;
		margin-bottom: 5px;
	}
	
	#signin{
		width: 60%;
		border-radius: 30px;
	}
	.overlap-text{
		position: relative;
	}
	.overlap-text a{
		position: absolute;
		top: 8px;
		right: 10px;
		font-size: 14px;
		text-decoration: none;
		letter-spacing: -1px;

	}
    span {
        color: #00CED1;
    }
</style>
<body>
<div class="row">
	<div class="col-sm-12">
            <center><h1 style="color: #20509e;">Face<span>Hook</span></h1></center>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="main-content gradient-bg">
			<div class="header">
				<h3 style="text-align: center;color: white;"><strong>Login to your Account</strong></h3>
			</div>
			<div class="l-part">
				<form action="" method="post">
					<input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
					<div class="overlap-text">
						<input type="password" name="pass" placeholder="Password" required="required" class="form-control input-md"><br>
						<a style="text-decoration:none;float: right;color: #00CED1;" data-toggle="tooltip" title="Reset Password" href="forgot_password.php">Forgot?</a>
					</div>
					<a style="text-decoration: none;float: right;color: white;" data-toggle="tooltip" title="Create Account!" href="signup.php">Don't have an account?</a><br><br>

					<center><button id="signin" class="btn btn-info btn-lg" name="login">Login</button></center>
					<?php include("login.php"); ?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
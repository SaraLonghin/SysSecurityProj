<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
        font-family: "Lato", sans-serif;
	-webkit-font-smoothing: antialiased;
	font-smoothing: antialiased;
	}
	.main-content{
		width: 50%;
		height: 40%;
		margin: 10px auto;
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
	
	#signup{
		width: 60%;
		border-radius: 30px;
	}
    span {
        color: #5bd0c6;
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
				<h3 style="text-align: center;color: white;"><strong>Create your Account</strong></h3>
			</div>
			<div class="l-part">
				<form action="" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="First Name" name="first_name" required="required">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="First Name" name="last_name" required="required">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" placeholder="Password" name="u_pass" required="required">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" type="email" class="form-control" placeholder="Email" name="u_email" required="required">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control" name="u_country" required="required">
							<option disabled>Select your Country</option>
							<option>Italy</option>
							<option>United States of America</option>
							<option>India</option>
							<option>Japan</option>
							<option>UK</option>
							<option>France</option>
							<option>Germany</option>
						</select>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control input-md" name="u_gender" required="required">
							<option disabled>Select your Gender</option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="date" class="form-control input-md" placeholder="Birth date" name="u_birthday" required="required">
					</div><br>
					<a style="text-decoration: none;float: right;color: white;" data-toggle="tooltip" title="Signin" href="signin.php">Already have an account?</a><br><br>

					<center><button id="signup" class="btn btn-info btn-lg" name="sign_up">Signup</button></center>
					<?php include("insert_user.php"); ?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
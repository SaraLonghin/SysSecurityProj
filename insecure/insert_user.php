<?php
include("includes/connection.php");

	if(isset($_POST['sign_up'])){

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$pass = $_POST['u_pass'];
		$email = $_POST['u_email'];
		$country = $_POST['u_country'];
		$gender = $_POST['u_gender'];
		$birthday = $_POST['u_birthday'];
		$status = "verified";
		$posts = "no";
		$newgid = sprintf('%05d', rand(0, 999999));

		$username = strtolower($first_name . "_" . $last_name . "_" . $newgid);
		$check_username_query = "select user_name from users where user_email='$email'";
		$run_username = mysqli_query($con,$check_username_query);

		if(strlen($pass) <9 ){
			echo"<script>alert('Password should be minimum 9 characters!')</script>";
			exit();
		}

		$check_email = "select * from users where user_email='$email'";
		$run_email = mysqli_query($check_email);

		$check = mysqli_num_rows($run_email);

		if($check == 1){
			echo "<script>alert('Email already exist, Please try using another email')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		$rand = rand(1, 3); //Random number between 1 and 3

			if($rand == 1)
				$profile_pic = "head_red.jpg";
			else if($rand == 2)
				$profile_pic = "head_sun_flower.png";
			else if($rand == 3)
				$profile_pic = "head_turqoise.jpg";

		$insert = "insert into users (f_name,l_name,user_name,describe_user,Relationship,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account)
		values('$first_name','$last_name','$username','Still thinking about it!','Unavailable','$pass','$email','$country','$gender','$birthday','$profile_pic','default_cover.jpg',NOW(),'$status','$posts','Nobody')";
		
		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert('Well Done $first_name, you are good to go.')</script>";
			echo "<script>window.open('signin.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
		}
	}
?>
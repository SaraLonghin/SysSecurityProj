<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['login'])) {

		$email =  $_POST['email'];
		$pass =  $_POST['pass'];
		$select_user = "select * from users where user_email='$email' AND user_pass='$pass' AND status='verified'";
		$query= mysqli_query($con, $select_user);
		$rows= mysqli_num_rows($query);

		if($rows){
			$_SESSION['user_email'] = $email;

			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or Password is incorrect')</script>";
		}
	}
?>
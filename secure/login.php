<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['login'])) {

		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));

		$select_user = "select user_pass from users where user_email='$email' AND status='verified'";
		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);

		if($check_user == 1){
            if(password_verify($pass, $data['user_pass'])){
                $_SESSION['user_email'] = $email;
                echo "<script>window.open('home.php', '_self')</script>";
            } else
            echo"<script>alert('Your Email or Password is incorrect')</script>";
		}else{
			echo"<script>alert('Oops, seems like your email is not registered!)</script>";
		}
	}
?>
<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?>'s Account</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style2.css">
</head>
<body>
    
    
    
    
    
    
    <div class="row">
	<div class="col-sm-12">
		<div class="main-content gradient-bg">
			<div class="header">
				<h3 style="text-align: center;color: white;"><strong>Edit your Account</strong></h3>
			</div>
			<div class="l-part">
				<form action='' method='post' enctype='multipart/form-data'>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <input class='form-control' type='text' name='f_name' required value="<?php echo $first_name; ?>">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input class='form-control' type='text' name='l_name' required value="<?php echo $last_name; ?>">
					</div><br>
                    <div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						 <input class='form-control' type='text' name='u_name' required value="<?php echo $user_name; ?>">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input class='form-control input-md' type='email' name='u_email' required value="<?php echo $user_email; ?>">
					</div><br>
                    <div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input class='form-control' type='text' name='describe_user' required value="<?php echo $describe_user; ?>">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control" name="u_country">
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
						  <select class='form-control' name='Relationship'>
                    <option><?php echo $Relationship_status; ?></option>
                    <option>Engaged</option>
                    <option>Married</option>
                    <option>Available</option>
                    <option>Unavailable</option>
                    <option>It's complicated ..</option>
                    </select>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control input-md" name="u_gender">
							<option disabled>Select your Gender</option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input class='form-control input-md' type='date' name='u_birthday' required value="<?php echo $user_birthday; ?>">
					</div><br>
                    
                     <center><h4 style='font-weight: bold; color: white;'>Recovery Question</h4><center>
       <center> <button type='button' style='margin-bottom: 25px;' class='btn site-btn grn-btn' data-toggle='modal' data-target='#myModal'>Set Answer</button><center>
                    <div id='myModal' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            <h2 class='modal-title text-blu'>Recovery Question</h2>
                              </div>
                        <div class='modal-body'>
                        <form action='recovery.php?id=<?php echo $user_id; ?>' method='post' id='f'>
                            <h3><strong class='text-blu'>What was your first pet's name?</strong></h3>
                            <p>We will use this information to verify your identity.</p>
                            <textarea class='form-control com-textarea mod'  cols='83' rows='4' name='content' placeholder='Please provide us with a valid answer and be careful by choosing something you will remember.'></textarea><br>
                            <input class='btn site-btn blu-btn' type='submit' name='sub' value='Submit' style='width: 100px;'><br><br>
                            </form>
                            <?php
                            if(isset($_POST['sub'])){
                                $btn = htmlentities($_POST['content']);
                                if($btn == ''){
                                    echo "<script>alert('Please enter something')</script>";
                                    echo "<script>window.open('edit_profile.php?u_id$user_id', '_self')</script>";
                                    exit();
                                } else {
                                    $update = "update users set recovery_account='$btn' where user_id='$user_id'";
                                    $run = mysqli_query($con, $update);
                                    if($run){
                                        echo "<script>alert('Answer updated!')</script>";
                                        echo "<script>window.open('edit_profile.php?u_id$user_id', '_self')</script>";
                                    } else {
                                        echo "<script>alert('Something went wrong, please try again!')</script>";
                                        echo "<script>window.open('edit_profile.php?u_id$user_id', '_self')</script>";
                                    }
                                }
                            }
                            
                            ?>
                        </div>
                        <div class='modal-footer'>
                        <button type='button' class='btn site-btn blu-btn' data-dismiss='modal'>Close</button>
                               </div>
                           </div>
                        </div>
                    </div>
        
					

                    <center><input type='submit' class='btn site-btn grn-btn' name='update' style='width:250px;' value='Update'></center>
					
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['update'])){
    $f_name = htmlentities($_POST['f_name']);
    $l_name = htmlentities($_POST['l_name']);
    $u_name = htmlentities($_POST['u_name']);
    $describe_user = htmlentities($_POST['describe_user']);
    $Relationship_status = htmlentities($_POST['Relationship']);
    $u_email = htmlentities($_POST['u_email']);
    $u_country = htmlentities($_POST['u_country']);
    $u_gender = htmlentities($_POST['u_gender']);
    $u_birthday = htmlentities($_POST['u_birthday']);
    
    
    $update = "update users set f_name='$f_name', l_name='$l_name', user_name='$u_name', describe_user='$describe_user', Relationship='$Relationship_status', user_email='$u_email', user_country='$u_country', user_gender='$u_gender', user_birthday='$u_birthday' where user_id='$user_id'"; 
    
    $run = mysqli_query($con, $update);
    
    if($run){
         echo "<script>alert('Profile updated! Please login again.')</script>";
        echo "<script>window.open('signin.php?u_id$user_id', '_self')</script>";
    } 

}


?>
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
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet"  type="text/css" href="style2.css">
    <link rel="stylesheet" type="text/css" href="../style2.css"/>
</head>
<style>
	#cover-img{
		height: 400px;
		width: 100%;
	}#profile-img{
		position: absolute;
		top: 160px;
		left: 30px;
	}
</style>
<body>
<div class="row">
	<div class="col-sm-1">	
	</div>
	<div class="col-sm-10">
		<?php
			echo"
			<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$user_cover' onerror='this.onerror=null;this.src=\"../cover/$user_cover\";'></div>
				<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

				<ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
					<li class='dropdown'>
						<button class='dropdown-toggle btn site-btn sb-gradients' data-toggle='dropdown'>Change Cover</button>
						<div class='dropdown-menu'>
							<center>
							<p>Click <strong>Select Cover</strong> and then click the <br> <strong>Update Cover</strong></p>
							<label class='btn site-btn grn-btn'> Select Cover
							<input type='file' name='u_cover' size='60' />
							</label><br><br>
							<button name='submit' class='btn site-btn blu-btn'>Update Cover</button>
							</center>
						</div>
					</li>
				</ul>

				</form>
                
			</div>
			<div id='profile-img'>
				<img src='users/$user_image' onerror='this.onerror=null;this.src=\"../users/$user_image\";' class='img-circle' width='150px' height='150px'><br><br>
				<form action='profile.php?u_id='$user_id' method='post' enctype='multipart/form-data'>
                
                <label class='btn site-btn sb-gradients' id='update_profile'> Select Picture
							<input type='file' name='u_cover' size='40' />
							</label>
                
				<button id='button_profile' name='update' class='btn site-btn sb-gradients'>Update Picture</button>
				</form>
			</div><br>
			";
		?>
		<?php

			if(isset($_POST['submit'])){

				$u_cover = $_FILES['u_cover']['name'];
				$image_tmp = $_FILES['u_cover']['tmp_name'];
				$random_number = rand(1,100);

				if($u_cover==''){
					echo "<script>alert('Please Select Cover Image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "cover/$u_cover.$random_number");
					$update = "update users set user_cover='$u_cover.$random_number' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Cover Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}

		?>
	</div>


	<?php
		if(isset($_POST['update'])){

				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				$random_number = rand(1,100);

				if($u_image==''){
					echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "users/$u_image.$random_number");
					$update = "update users set user_image='$u_image.$random_number' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Profile Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}
	?>
	<div class="col-sm-1">
	</div>
</div>
<div class="row">
	<div class="col-sm-1">
	</div>
	<div class="col-sm-2" style="background-color: white;text-align: center;left: 0.9%;border-radius: 5px;">
		<?php
		echo"
			<center><h2 class='text-blu'><strong>About</strong></h2></center>
			<center><h4 class='text-blu'><strong>$first_name $last_name</strong></h4></center>
			<p><strong><i style='color:grey;'>$describe_user</i></strong></p><br>
			<p><strong>Relationship Status: </strong> $Relationship_status</p><br>
			<p><strong>Lives In: </strong> $user_country</p><br>
			<p><strong>Member Since: </strong> $register_date</p><br>
			<p><strong>Gender: </strong> $user_gender</p><br>
			<p><strong>Date of Birth: </strong> $user_birthday</p><br>
		";
		?>
	</div>
    
    <div class="col-sm-9">
        <?php
        global $con;
        if(isset($_GET['u_id'])){
            $u_id = $_GET['u_id'];
        
        $get_posts = "select * from posts where user_id='$u_id' order by 1 desc limit 5";
        $run_posts= mysqli_query($con, $get_posts); }
        
        while ( $row_posts = mysqli_fetch_array($run_posts)){
            $post_id = $row_posts['post_id'];
            $user_id = $row_posts['user_id'];
            $content = $row_posts['post_content'];
            $upload_image = $row_posts['upload_image'];
            $post_date = $row_posts['post_date'];
            
            $user = "select * from users where user_id = '$user_id' AND posts='yes'";
            $run_user = mysqli_query($con, $user);
            $row_user = mysqli_fetch_array($run_user);
            
            $user_name = $row_user['user_name'];
            $user_image = $row_user['user_image'];
            
            if (strlen($content) >= 1 && strlen($upload_image) >= 1){
                echo "
                <div id='own_posts'>
                 <div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' onerror='this.onerror=null;this.src=\"../users/$user_image\";' class='img-circle' width='80px' height='80px'></p>
						</div>
						<div class='col-sm-4'>
							<h3><a style='text-decoration:none; cursor:pointer;color: #20509e;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h5><small style='color:black;'>Updated a post on $post_date</small></h5>
						</div>
						<div class='col-sm-6'>
						</div>
					</div>
                <div class='row'>
                <div class='col-sm-12'>
                <p style='color: white;'>$content</p>
                <img id='posts-img' src='imagepost/$upload_image' onerror='this.onerror=null;this.src=\"../imagepost/$upload_image\";'>
                </div>
                </div><br>
                <a href='single.php?post_id=$post_id' style='float:right;padding-left:20px;'><button class='btn site-btn grn-btn'>View</button></a>
                <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn site-btn blu-btn'>Delete</button></a><br>
                </div><br><br>
                ";
            } 
            else if ($content== '' && strlen($upload_image) >= 1) {
                $content = "";
               echo "
                <div id='own_posts'>
               <div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' onerror='this.onerror=null;this.src=\"../users/$user_image\";' class='img-circle' width='80px' height='80px'></p>
						</div>
						<div class='col-sm-4'>
							<h3><a style='text-decoration:none; cursor:pointer;color: #20509e;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h5><small style='color:black;'>Updated a post on $post_date</small></h5>
						</div>
						<div class='col-sm-6'>
						</div>
					</div>
               
                <div class='row'>
                <div class='col-sm-12'>
                <img id='posts-img' src='imagepost/$upload_image' onerror='this.onerror=null;this.src=\"../imagepost/$upload_image\";'>
                </div>
                </div><br>
                <a href='single.php?post_id=$post_id' style='float:right; padding-left:20px;'><button class='btn site-btn grn-btn'>View</button></a>
                <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn site-btn blu-btn'>Delete</button></a><br>
                </div><br><br>
                ";
            }
            include("functions/delete_post.php");
            
        }
        global $con;
                if(isset($_GET['u_id'])){
                    $u_id = $_GET['u_id'];
                
                
                $get_posts = "select user_email from users where user_id = '$u_id'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);
                
                $user_email = $row['user_email'];
                
                $user = $_SESSION['user_email'];
                $get_user = "select * from user where user_email='$user'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);
                
                $user_id = $row['user_id'];
                $u_email = $row['user_email'];
                
                if($u_email != $user_email){
                    echo "<script>window.open('profile.php','_self')</script>";
                  }
                }
        ?>
    </div>
    <div class='col-sm-1'></div>
</div>
</body>
</html>
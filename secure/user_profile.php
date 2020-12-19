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
	<title><?php echo "$user_name"; ?>'s Search</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="row">
    <?php
    if(isset($_GET['u_id'])){
        $u_id = $_GET['u_id'];
    }
    if($u_id < 0 || $u_id == ''){
        echo "<script>window.open('home.php','_self')</script>";
    } else {
         ?>
    <div class="col-sm-12">
        <?php 
        if(isset($_GET['u_id'])){
            global $con;
            $user_id = $_GET['u_id'];
            $select = "select * from users where user_id = '$user_id'";
            $run = mysqli_query($con, $select);
            $row = mysqli_fetch_array($run);
            
            $name = $row['user_name'];
            
        } ?>
        
        <?php
        if(isset($_GET['u_id'])){
            global $con;
            $user_id = $_GET['u_id'];
            $select = "select * from users where user_id = '$user_id'";
            $run = mysqli_query($con, $select);
            $row = mysqli_fetch_array($run);
            
            $id = $row['user_id'];
            $image = $row['user_image'];
            $name = $row['user_name'];
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];
            $describe_user = $row['describe_user'];
            $country = $row['user_country'];
            $gender = $row['user_gender'];
            $b_date = $row['user_birthday'];
            
            
            
            echo"
            <div class='row>
            <div class='col-sm-1'></div>
            <center>
            <div class='col-sm-3'>
            <h2 class='text-blu'>About</h2>
            <img class='img-circle' src='users/$image' width='150px' height='150px'><br><br>
             <center><h4 class='text-blu'><strong>$f_name $l_name</strong></h4></center>
			<p><strong><i style='color:grey;'>$describe_user</i></strong></p><br>
            <p><strong>Gender: </strong> $gender</p><br>
			<p><strong>Lives In: </strong> $country</p><br>
			<p><strong>Date of birth: </strong> $b_date</p><br>
            
            ";
            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email = '$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);
            
            $userown_id = $row['user_id'];
            if($user_id == $userown_id){
                echo "<a href='edit_profile.php?u_id=$userown_id' class='btn site-btn grn-btn'/> Edit Profile</a><br><br><br>";
            }
            
            echo "
            </div>
            </center>
            ";
        }
        ?>
        <div class="col-sm-8">
        <center><h1 class='text-grn'><strong class='text-blu'><?php echo "$f_name"; ?></strong>'s Posts</h1></center>
        <?php 
            global $con;
            if(isset($_GET['u_id'])){
                $u_id = $_GET['u_id'];
            }
        
        $get_post = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
        
        $run_posts = mysqli_query($con, $get_post);
        while($row_posts = mysqli_fetch_array($run_posts)){
        $post_id = $row_posts['post_id'];
            $user_id = $row_posts['user_id'];
            $content = $row_posts['post_content'];
            $upload_image = $row_posts['upload_image'];
            $post_date = $row_posts['post_date'];
            
            $user = "select * from users where user_id = '$user_id' AND posts='yes'";
            
            $run_user = mysqli_query($con, $user);
            $row_user = mysqli_fetch_array($run_user);
            
            $user_name = $row_user['user_name'];
            $f_name = $row_user['f_name'];
            $l_name = $row_user['l_name'];
            $user_image = $row_user['user_image'];
            
            if($content == '' && strlen($upload_image) >= 1){
                echo "
                 <div id='own_posts'>
                <div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='80px' height='80px'></p>
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
                <img id='posts-img' src='imagepost/$upload_image''>
                </div>
                </div><br>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn site-btn grn-btn'>Comment</button></a>
                </div><br>
                ";
            } else if (strlen($content) >= 1 && strlen($upload_image) >= 1){
                 echo "<div id='own_posts'>
               <div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='80px' height='80px'></p>
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
                <img id='posts-img' src='imagepost/$upload_image''>
                </div>
                </div><br>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn site-btn grn-btn'>Comment</button></a>
                </div><br>
                ";
            } 
        }
            
            ?>
        </div>
    </div>
    </div>
    <?php } ?>
</body>
</html>
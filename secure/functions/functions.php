<?php

$con = mysqli_connect("localhost","root","","securefacehook") or die("Connection was not established");

//function for inserting post

function insertPost(){
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;

		$content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

		if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
						$insert = "insert into posts (user_id,post_content,upload_image,post_date) values ('$user_id','','$upload_image.$random_number',NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					  }
					}
				}
			}
		}
	}


function get_posts(){
	global $con;
	$per_page = 4;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0,40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select *from users where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		//now displaying posts from database

		if($content=="" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-2'>
				</div>
				<div id='posts' class='col-sm-8'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='80px' height='80px' onerror='this.onerror=null;this.src=\"../users/$user_image\";'></p>
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
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn site-btn grn-btn'>Comment</button></a>
				</div>
				<div class='col-sm-2'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-2'>
				</div>
				<div id='posts' class='col-sm-8'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='80px' height='80px' onerror='this.onerror=null;this.src=\"../users/$user_image\";'></p>
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
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' onerror='this.onerror=null;this.src=\"../imagepost/$upload_image\";'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn site-btn grn-btn'>Comment</button></a>
				</div>
				<div class='col-sm-2'>
				</div>
			</div><br><br>
			";
		}
	}

	include("pagination.php");
}

function single_post(){
    if(isset($_GET['post_id'])){
        global $con;
        $get_id = $_GET['post_id'];
        $get_posts = "select * from posts where post_id = '$get_id'";
        $run_posts = mysqli_query($con, $get_posts);
        $row_posts = mysqli_fetch_array($run_posts);
        
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $content = $row_posts['post_content'];
        $upload_image = $row_posts['upload_image'];
        $post_date = $row_posts['post_date'];
        
        $user = "select * from users where user_id= '$user_id' AND posts='yes'";
        
        $run_user = mysqli_query($con, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_image'];
        
        $user_com = $_SESSION['user_email'];
        $get_com = "Select * from users where user_email='$user_com'";
        
        $run_com = mysqli_query($con, $get_com);
        $row_com = mysqli_fetch_array($run_com);
        
        $user_com_id = $row_com['user_id'];
        $user_com_name = $row_com['user_name'];
        
        if(isset($_GET['post_id'])){
            $post_id = $_GET['post_id'];
        }
        
        $get_posts = "select post_id from users where post_id = '$post_id'";
        $run_user = mysqli_query($con, $get_posts);
        $post_id = $_GET['post_id'];
        $post = $_GET['post_id'];
        $get_user = "select * from posts where post_id='$post'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);
        
        $p_id = $row['post_id'];
        
        if($p_id != $post_id){
            echo "<script>alert('Something went wrong!')</script>";
            echo "<script>window.open('home.php', '_self')</script>";
        } else {
            if($content=="" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-2'>
				</div>
				<div id='posts' class='col-sm-8'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image'  onerror='this.onerror=null;this.src=\"../users/$user_image\";' class='img-circle' width='80px' height='80px'></p>
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
				</div>
				<div class='col-sm-2'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-2'>
				</div>
				<div id='posts' class='col-sm-8'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='80px' height='80px' onerror='this.onerror=null;this.src=\"../users/$user_image\";'></p>
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
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' onerror='this.onerror=null;this.src=\"../imagepost/$upload_image\";'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-2'>
				</div>
			</div><br><br>
			";
		}
            
            include('comments.php');
            
            echo "<div class='row'>
            <div class='col-md-8 col-md-offset-2'>
            <div class='panel'>
            <div class='panel-body'>
            <form action='' method='post' class='form-inline'>
            <textarea placeholder='Write your comment here!' class='com-textarea' name='comment'></textarea>
            <button class='btn site-btn grn-btn' name='reply'>Comment</button>
            </form>
            </div></div>
            </div>
            </div>
            ";
            
            if(isset($_POST['reply'])){
            $comment = htmlentities($_POST['comment']);
                if($comment == ""){
                    echo "<script>alert('Please enter your comment!)</script>";
                    echo "<script>window.open('single.php?post_id=$post_id', '_self')</script>";
                } else {
                    $insert = "Insert into comments (post_id, user_id, comment, comment_author, date) values ('$post_id', '$user_id','$comment','$user_com_name', NOW())";
                    
                    $run = mysqli_query($con, $insert);
                    
                    echo "<script>window.open('single.php?post_id=$post_id', '_self')</script>";
                }
            }
        }
    }
}

function search_user(){
	 global $con;

	 if (isset($_GET['search_user_btn'])){
		 $search = htmlentities($_GET['search_user']);
		 $get_user = "select * from users where f_name like '%$search%' 
		 OR l_name like '%$search%' OR user_name like '%$search%'";
	 }
	 else {
		 $get_user = "select * from users";
	 }
	 $run_user = mysqli_query($con,$get_user);

	 while ($row_user = mysqli_fetch_array($run_user)){

		 $user_id = $row_user['user_id'];
		 $username = $row_user['user_name'];
		 $user_image= $row_user['user_image'];
		 $f_name= $row_user['f_name'];
		 $l_name= $row_user['l_name'];

		 echo"
		 <div class='row'>
		 <div class ='col-sm-4'>
		 </div>
		 <div class ='col-sm-5'>
		 <div class='row' id ='find_people'>
		 <div class ='col-sm-4'>
		 <a href='user_profile.php?u_id=$user_id'>
		 <img src='users/$user_image' width='140px' height ='120px' title='$username' 
		 style='float:left; margin-top: 30px;' onerror='this.onerror=null;this.src=\"../users/$user_image\";'/></a>
		 </div><br><br>
		 <div class='col-sm-5'>
		 <a style ='text-decoration:none; cursor:pointer; color:#20509e;' 
		 href='user_profile.php?u_id=$user_id'>
		 <strong> <h2>$f_name $l_name</h2></strong>
		 </a>
		 </div>
		 <div class='col-sm-4'>
		 </div>
		 </div>
		 </div>
		 <div class='col-sm-4'>
		 </div>
		 </div><br>

		 ";
	 }
 }

function user_posts(){
	 global $con;

	 if (isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
	 }
		 $get_posts = "select * from posts where user_id='$u_id' order by 1 desc limit 5";
	 $run_posts = mysqli_query($con,$get_posts);

	 while ($row_posts = mysqli_fetch_array($run_posts)){

		 $post_id = $row_posts['post_id'];
		 $user_id = $row_posts['user_id'];
		 $content= $row_posts['post_content'];
		 $upload_image= $row_posts['upload_image'];
		 $post_date= $row_posts['post_date'];
         
         $user = "select * from users where user_id='$user_id' and posts='yes'";
         
         $run_user = mysqli_query($con, $user);
         $row_user = mysqli_fetch_array($run_user);
         
     $user_name = $row_user['user_name'];
         $user_image = $row_user['user_image'];
         
         if(isset($_GET['u_id'])){
             $u_id = $_GET['u_id'];
         }
         
         $getuser = "select user_email from users where user_id = '$u_id'";
         $run_user = mysqli_query($con, $getuser);
         $row = mysqli_fetch_array($run_user);
         
         $user_email = $row['user_email'];
         $user = $_SESSION['user_email'];
         $get_user = "select * from users where user_email='$user'";
         
         $run_user = mysqli_query($con, $get_user);
         $row = mysqli_fetch_array($run_user);
         
         $user_id = $row['user_id'];
         $u_email = $row['user_email'];
         
         if($u_email != $user_email){
             echo "<script>window.open('my_post.php?u_id=$user_id', '_self')</script>";
         } else {
              if($content=="" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-2'>
				</div>
				<div id='posts' class='col-sm-8'>
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
				</div>
				<div class='col-sm-2'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-2'>
				</div>
				<div id='posts' class='col-sm-8'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image'  onerror='this.onerror=null;this.src=\"../users/$user_image\";' class='img-circle' width='80px' height='80px'></p>
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
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' onerror='this.onerror=null;this.src=\"../imagepost/$upload_image\";'>
						</div>
					</div><br>
					 <a href='single.php?post_id=$post_id' style='float:right; padding-left:20px;'><button class='btn site-btn grn-btn'>View</button></a>
				</div>
				<div class='col-sm-2'>
				</div>
			</div><br><br>
			";
		}
             
         }
	 }
 }

function results(){
	 global $con;

	 if (isset($_GET['search'])){
		$search_query = htmlentities($_GET['user_query']);
	 }
		 $get_posts = "select * from posts where post_content like '%$search_query%' or upload_image like '%$search_query%'";
	 $run_posts = mysqli_query($con,$get_posts);

	 while ($row_posts = mysqli_fetch_array($run_posts)){

		 $post_id = $row_posts['post_id'];
		 $user_id = $row_posts['user_id'];
		 $content= $row_posts['post_content'];
		 $upload_image= $row_posts['upload_image'];
		 $post_date= $row_posts['post_date'];
         
         $user = "select * from users where user_id='$user_id' and posts='yes'";
         
         $run_user = mysqli_query($con, $user);
         $row_user = mysqli_fetch_array($run_user);
         
     $user_name = $row_user['user_name'];
         $first_name = $row_user['f_name'];
         $last_name = $row_user['l_name'];
         $user_image = $row_user['user_image'];
         
              if($content=="" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-3'>
						<p><img src='users/$user_image' onerror='this.onerror=null;this.src=\"../users/$user_image\";' class='img-circle' width='80px' height='80px'></p>
						</div>
						<div class='col-sm-5'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' onerror='this.onerror=null;this.src=\"../imagepost/$upload_image\";' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-3'>
						<p><img src='users/$user_image' onerror='this.onerror=null;this.src=\"../users/$user_image\";' class='img-circle' width='80px' height='80px'></p>
						</div>
						<div class='col-sm-5'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' onerror='this.onerror=null;this.src=\"../imagepost/$upload_image\";' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
 }}
?>
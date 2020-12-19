<?php

$con = mysqli_connect("localhost","root","","securefacehook") or die("Connection was not established");

//function for deleting post
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    
    $delete_post = "Delete from posts where post_id='$post_id'";
    
    $run_delete = mysqli_query($con, $delete_post);
    
    if($run_delete){
        echo "<script>alert('Post deleted!')</script>";
        echo "<script>window.open('../profile.php','_self')</script>";
    }
}
?>
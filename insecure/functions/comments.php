<?php

$get_id = $_GET['post_id'];

$get_com = "select * from comments where post_id='$get_id' ORDER by 1 desc";

$run_com = mysqli_query($con, $get_com);

while($row = mysqli_fetch_array($run_com)){
    $com = $row['comment'];
    $com_name = $row['comment_author'];
    $date = $row['date'];
    
    echo "
    <div class='row'>
    <div class='col-md-8 col-md-offset-2'>
            <div class='panel'>
            <div class='panel-body'>
              <div><h4><strong class='text-blu'>$com_name</strong> <small>commented on $date </small></h4>
              <p style='font-size:20px;'>$com</p></div>
            </form>
            </div></div>
            </div>
    </div>";
}

?>
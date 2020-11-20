<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Facehook</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header>
    <div class="container text-center">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
          <h1>Face<span>Hook</span></h1>
          <p>
              Get <span>hooked</span> and find out what your friends are talking about!
          </p>
             <form method="post" action="">
                            <button id="signup" name="signup" class="btn px-5 py-2 primary-btn" type="submit">Sign Up</button>
                            <?php
      if(isset($_POST['signup'])){
         echo "<script>window.open('signup.php','_self')</script>";
      }
      ?>
                            <button id="login" name="login" class="btn px-5 py-2 primary-btn whitened" type="submit">Login</button>
                             <?php
      if(isset($_POST['login'])){
         echo "<script>window.open('signin.php','_self')</script>";
      }
      ?>
                        </form>
        </div>
        <div class="col-md-5 col-sm-12">
          <img class="boy" src="assets/header-img.png" alt="FaceHook Image" />
        </div>
      </div>
    </div>
  </header>
  <footer>
    <div class="container-fluid p-0">
      <div class="row text-left">
        <div class="col-md-5 col-sm-5">
          <h4 class="text-light">About us</h4>
          <p class="text-muted"><span>FaceHook is a personal university project by two students.</span></p>
          <p class="pt-4 text-muted">Copyright ©2020 All rights reserved 
          </p>
        </div>
        </div>
      </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Facehook - Get Hooked!</title>
	<meta charset="UTF-8">
	<meta name="description" content="Cryptocurrency Landing Page Template">
	<meta name="keywords" content="cryptocurrency, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FaceHook</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css"/>
</head>
<body>

	<!-- Hero section -->
	<section class="hero-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 hero-text">
                    <h2>Face<span>Hook</span></h2>
					<h4>Share your experiences through pictures.</h4>
					
                        <form class="hero-subscribe-from" method="post" action="">
                            <button class="site-btn sb-gradients" id="signup" name="signup" type="submit">Sign Up</button>
                            <?php
      if(isset($_POST['signup'])){
         echo "<script>window.open('signup.php','_self')</script>";
      }
      ?>
                            <button class="site-btn sb-gradients" id="login" name="login" type="submit">Login</button>
                             <?php
      if(isset($_POST['login'])){
         echo "<script>window.open('signin.php','_self')</script>";
      }
      ?>
					</form>
				</div>
				<div class="col-md-6">
					<img src="includes/laptop.png" class="laptop-image" onerror="this.onerror=null; this.src='../includes/laptop.png'">
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h2>What is Face<span>Hook</span>?</h2>
					<h5>It is a social network designed for you and your friends.</h5>
					<p>FaceHook allows you to share amazing snapshots of your daily adventures and publish them on the public dashboard for the world to see.</p>
				</div>
			</div>
			<div class="about-img">
				<img src="includes/about-img.png" alt="" onerror="this.onerror=null; this.src='../includes/about-img.png'">
			</div>
		</div>
	</section>
	<!-- About section end -->


	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="row spad">
				<div class="col-md-6 col-lg-3 footer-widget">
					<h2>About Us</h2>
					<p>FaceHook is a private project realized by two university students in Bolzano, Italy.</p>
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; 2020 All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
		</div>
        </div>
    </footer>
</body>
</html>

<!doctype html>
<?php
if(isset($_REQUEST['submit'])){
  $conn=mysqli_connect("localhost","root","root","gamestore");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  else{
    $email = $_REQUEST['email'];
	  $pass = $_REQUEST['password'];
    $emailquery="SELECT * FROM persons WHERE email='$email'";
    $emailsql = mysqli_query($conn, $emailquery);
		$emailcount = mysqli_num_rows($emailsql);
    if ($emailcount>0) {
      $db_row=mysqli_fetch_assoc($emailsql);
      $db_pass = $db_row['Password'];
      if ($db_pass === $pass) {
        header("Location: http://localhost/game");
        // echo "<script type='text/javascript'>alert('congratulations');</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Incorrect password');</script>";
      }
    }
  }
}

?>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
		<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
<link rel="stylesheet" href="css/style_login.css">
	<title>Rezo Gaming League</title>
	<style media="screen">
	.textWithBlurredBg{
	width:300px;
	height:auto;
	display:inline-block;
	position:relative;
	transition:.3s;
	margin:4px;
}

.textWithBlurredBg img{
	width:100%;
	height:100%;
	transition:.3s;
	border-radius:4px;
}

.textWithBlurredBg:hover img{
	filter:blur(2px) brightness(60%);
	box-shadow:0 0 16px cyan;
}

.textWithBlurredBg :not(img){
	position:absolute;
	z-index:1;
	top:30%;
	width:100%;
	text-align:center;
	color:#fff;
	opacity:0;
	transition:.3s;
}

.textWithBlurredBg h3{
	top:50%
}

.textWithBlurredBg:hover :not(img){
	opacity:1;
}
a
{
	font-family: verdana;
	font-size: 25px;
}

body
{
	background-color: black;
}
.inside
{
	 background-color: white;
  color: white;
  margin: 50px;
  padding: 20px;
  border-radius: 35px;
}
.insidebox
{
  background-color: white;
  color: white;
  padding: 20px;
  border-radius: 35px;
}
#logo
{
	height: 70px;
}
.carousel-inner
{
	border-radius: 50px;
}

</style>
</head>
<body>

	<main class="cd-main-content">
		

  
<section id="nav-bar">
	<nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="index.html"><img src="logo2.jpg" alt="logo" id="logo" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.html"><b><pre><font color="white">Home	</pre></font></b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login_1.php"><b><pre><font color="white">Login 	</font></pre></b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index_regi.php"><b><pre><font color="white">SignUp 	</font></pre></b></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#ABout Us"><b><pre><font color="white">About Us</font></pre></b></a>
      </li>
     
    </ul>
  </div>
</nav>
	</section>
 <div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login</div>
      <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <form action="login_1.php" method="post" class="form">
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <input type="submit" name="submit" id="submit" value="submit">
      </form>
    </div>
  </div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js'></script>
  <script  src="js/index_login.js"></script>
</body>

</html>

<?php
include("config.php");
if(isset($_SESSION['userid'])){
  $userid = $_SESSION['userid'];
}else{
  $userid = '';
}
$total =mysqli_query($connection, "SELECT userid, count(cartid) as totalitem  from cart where userid = '$userid'");
if(mysqli_num_rows($total) > 0){
  $cart_items = mysqli_fetch_array($total);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <li class="nav-item cart"><a href="cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span>
            <?php
            if(isset($_SESSION['userid'])){
              if($_SESSION['userid'] == $cart_items['userid']){

              
            ?>
            <sup class="badge bg-success" style="padding-top:5px"><?php echo $cart_items['totalitem'] ?></sup></a>
            <?php 
            }
          }else{
            ?>
           <sup class="badge bg-success" style="padding-top:5px"></sup></a>
           <?php
          }}
          if(!isset($_SESSION['useremail'])){
          ?>
              

            
			  <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
			  <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>

        <?php }else{
          
          ?>
          </ul>
			  <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['username']?>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="userprofile.php">Profile</a></li>
          <li><a class="dropdown-item" href="#">Edit Profile</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
<?php }?>
	      </div>
		</div>
	  </nav>

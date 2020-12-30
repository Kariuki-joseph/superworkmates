<!DOCTYPE html>
<html lang="eng">
  
 <head>
    <title> Superworkmates: You Don't Have To Work Alone! </title>
    <link rel="stylesheet" href="css/mainstyles.css">
    

</head>

<body>
<?php
include_once 'parts/header.php';
// include_once 'home.html';
?>
      

<!--Part 2-->
    <div class="sehemu2">
      <div class="a" style="background-image:url(images/flower1.jpg);">
        <h2>Welcome</h2>
        <h2>To</h2>
        <h2>Superworkmates</h2>
        <h3>You Don't Have To Work Alone!</h3>
      </div>
<!--log in-->
      <div class="b">
          <div class="b-image">
            <img src="./images/slogo.png" alt="Superworkmates">
          </div>

<?php

  if (isset ($_SESSION ['username'])) {
    include_once 'loggedin.php';
    
  }
  else {
   include_once 'loginorsignup.php';
  }
  ?>
      </div>
    </div>


<!--Part 3-->
<div class="part3"> 
  <div class="p3a">
    <h2>Contact Us</h2> 
    <div class="p3atext">
      <p>Reach us on WhatsApp on +254 729 515 273 Or +254 758 826 552.</p>
      <p>Email us at <a href="mailto: support@superworkmates.com">support@superworkmates.com.</a> </p>
      <p>Visit us at Climax Electronics and Cyber, Ngorika.</p>
      </div>
  </div>

  <div class="p3b">
    <h2>About Us</h2>
    <div class="p3btext">
      <p>We believe that each of our expertise, knowledge and daily experiences put together productively are the builders of a better tomorrow.</p>
      <a href="about.php"> <button class="btn btn-warning">Read More <i class="fa fa-caret-right"></i><i class="fa fa-caret-right"></i></button> </a>
    </div>
  </div>
  
</div>

<!--Part 4-->
<div class="part4">
  <div class="p4head">
      <h2>Trends</h2>
  </div>
<div class="carousel slide" data-ride="carousel" id="carousel_trends">
  <div class="carousel-inner">
  <div class="carousel-item active">
  <img src="images/flower1.jpg" alt="Image missing" class="d-block w-100">
  <div class="carousel-caption">
  <h3>Trend 1</h3>
  <p>Start Now. The future has began!</p>
  </div>
  </div>
  <div class="carousel-item">
  <img src="images/lights.jpg" alt="Image missing" class="d-block w-100">
  <div class="carousel-caption">
  <h3>Trend 2</h3>
  <p>For guidance on personal, business and social projects - Superworkmates is the place!</p>
  </div>
  </div>
  <div class="carousel-item">
  <img src="images/flower.jpg" alt="Image missing" class="d-block w-100">
  <div class="carousel-caption">
  <h3>Trend 3</h3>
  <p>Stronger Together!</p>
  </div>
  </div>
<!--carousel controls-->
<a href="#carousel_trends" class="carousel-control-next" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
<a href="#carousel_trends" class="carousel-control-prev" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
</div>

</div>

</div>

<!--footer-->

<?php
include_once 'parts/footer.php';
?>

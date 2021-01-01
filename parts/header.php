<?php
session_start();
?>
<!DOCTYPE html>
<html lang="eng">
  
  <head>
      
       
  <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
<link rel="manifest" href="icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
      
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
    <meta name= "description" content="This website provides methods of doing personal, business and social projects">
    <meta name="keywords" content="social projects, personal projects, business projects,how to, method, methods, workmates, superworkmates, collaborations on projects">
   <!-- <title>Superworkmates: You Don't Have To Work Alone! </title> -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/mainstyles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
  </head>

  <body>
    <!--top of page - Part 1-->
    <div class="pagetop">
      
      <div class = "topbar">
        <div class = "top">
          <div class = "greeting">
            <h1 class="greeting-name">Superworkmates</h1>
          </div>
        </div>
    </div>
    
<!--navbar-->    
      <div class = "navbar">
              <a href="index.php"> <div class = "sehemu1"><i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">home</i> Home </div> </a>
              <a href="myOffice.php"> <div class = "sehemu1"><i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">work</i> My Office </div> </a>
              <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">build</i> Projects </div> </a> 
              <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">groups</i> Workmates </div> </a>
              <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">construction</i> Equipment </div> </a>
              <a href="pricelist.php"> <div class = "sehemu1">  <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">local_offer</i> Price List </div> </a>
              <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">forum</i> Forums </div> </a>
             <!-- <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">class</i> Learn </div> </a> -->
              <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">tour</i> Places </div> </a>
              <a href="trends.php"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">timeline</i> Trends </div> </a>
              <a href="#" data-toggle="dropdown" >
              <i class="fa fa-user" ></i> My Account
              <div class="dropdown">
                <ul class="dropdown-menu">
                  <li class="dropdown-item" onclick="login()">Login</li>
                  <li class="dropdown-divider"></li>
                  <li class="dropdown-item" onclick="register()">Register</li>
                </ul>
              </div>
              </a>
              <a href="#" style="font-size:20px; color:rgba(255, 0, 102, 1);> <div class = "sehemu1"> &#9776 </div> </a>
              
          </div>
    </div>
    <div class="modal fade" id="modal_login" role="modal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
          <h3 class="text-center"></h3>
          </div>
          <div class="modal-body">
          <div class="row">
            <div class="container">
              <form action="" method="POST">
                <div class="form-group">
                 <label>Phone/Email</label>
                  <input type="text" name="email_phone" placeholder="Email/Phone" class="form-control">
                </div>
                <div class="form-group">
                 <label>Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="login"><i class="fa fa-sign-in"></i> Login</button>
                </div>
              </form>
            </div>
          </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_register">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    

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
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/mainstyles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>

  <body>
    <!--getting user profile image-->
    <?php
if (isset ($_SESSION ['username']) || isset($_SESSION['userid'])) {
        $uid = $_SESSION['userid'];
        require_once 'connections/dbconnect.php';
        
        $getprofpic = "SELECT profpic FROM theusers WHERE id = '$uid'";
        $query = mysqli_query ($connect, $getprofpic);
        $result = mysqli_fetch_array($query);
        $imagename=$result['profpic'];
}
        ?>
       
<!--Top of page (header) -->
    <div class="pagetop">
      
      <div class = "topbar">
          <div class = "top1">
              <div class = "logo">
                <a href="index.php"> <img src="Superworkmates Logo.png" alt="Logo Not Found"> </a>
              </div>
            </div>

            <div class = "top2">
              <div class = "greeting">
                <h1 class="greeting-name"><strong>Superworkmates</strong></h1>
                <h4 class="greeting-name"><?php  if (isset ($_SESSION ['username'])) {echo $_SESSION ['username'] ."," ." ";}?>You Don't Have to Work Alone!</h4>
              </div>
            </div>

            <div class = "top3">
              <div class = "user-image">
                <a href="<?php if (isset ($_SESSION ['username'])) {echo 'office.php';} else {echo 'index.php';}?>"><img src="<?php if (isset ($_SESSION ['username'])) {echo $imagename;} else {echo 'Superworkmates Logo.png';}?>" alt ="No Image Found"> </a>
              </div>
            </div>
      </div>

<!--phone-menu nav-->
<div class="phone-nav-bar">

      <div class="phone-menu"> <div class="phone-nav-label">&#9776 Menu</div>
            <div class="phone-menu-nav">
                <div class="phone-menu-nav-items">
                      <div class="phone-nav-item"> <a href="index.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">home</i> Home </div> </a> </div>
                      <div class="phone-nav-item"> <a href="myOffice.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">work</i> My Office </div> </a> </div>
                      <div class="phone-nav-item"> <a href="liveChat.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">chat</i> Live Chat </div> </a> </div>
                      <div class="phone-nav-item"> <a href="pricelist.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">local_offer</i> Price List </div> </a> </div>
                      <div class="phone-nav-item"> <a href="equipments.php"> <div class = "phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">construction</i> Equipment </div> </a> </div>
                      <div class="phone-nav-item"> <a href="trends.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">timeline</i> Trends & Tech </div> </a> </div>
                      <div class="phone-nav-item"> <a href="about.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">contact_page</i> About Us </div> </a> </div>
                      <div class="phone-nav-item"> <?php if (isset ($_SESSION ['username'])) {echo '<a href="logout.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">account_circle</i> Log Out </div> </a>';}
                      else {echo '<a href="signup.php"> <div class="phone-menu-item"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">account_circle</i> My Account </div> </a>';}?> </div>
                </div>
            </div>
      </div>

      <div class="phone-user-image-title">
        <div class="icon-and-name">
          
          <a href="<?php if (isset ($_SESSION ['username'])) {echo 'office.php';} else {echo 'index.php';}?>">
          <div class="user-title">
              <?php if (isset ($_SESSION ['username'])) {echo $_SESSION ['username'];}
              else {echo 'Check In';}?>
          </div>
          </a>
          
          <div class="image-icon">
            <a href="office.php"> <img src="<?php if (isset ($_SESSION ['username'])) {echo $imagename;} else {echo 'Superworkmates Logo.png';}?>" alt ="No Image Found"> </a>
          </div>

        </div>
      </div>

</div>
<!--navbar-->    
      <div class = "navbar">
              <a href="index.php"> <div class = "sehemu1"><i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">home</i> Home </div> </a>
              <a href="myOffice.php"> <div class = "sehemu1"><i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">work</i> My Office </div> </a>
              <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">build</i> Projects </div> </a> 
              <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">groups</i> Workmates </div> </a>
              <a href="equipments.php"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">construction</i> Equipment </div> </a>
             <!-- <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">build</i> Projects </div> </a> -->
             <!-- <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">groups</i> Workmates </div> </a> -->
              <a href="liveChat.php"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">chat</i> Live Chat </div> </a>
              <a href="pricelist.php"> <div class = "sehemu1">  <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">local_offer</i> Price List </div> </a>
              <a href="equipments.php"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">construction</i> Equipment </div> </a>
             <!-- <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">forum</i> Forums </div> </a> -->
             <!-- <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">class</i> Learn </div> </a> -->
              <a href="#"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">tour</i> Places </div> </a>
              <a href="trends.php"> <div class = "sehemu1"> <i class="material-icons" style="font-size:20px; color:rgba(255, 0, 102, 1);">timeline</i> Trends $ Tech </div> </a>
              <a href="#" data-toggle="dropdown" style="cursor: pointer;">
              <i class="fa fa-user" ></i> My Account
              <div class="dropdown">
                <ul class="dropdown-menu">
                <?php if (!isset($_SESSION['userid'])) { ?>
                  <li class="dropdown-item" onclick="login()">Login <i class="fa fa-sign-in"></i></li>
                  <li class="dropdown-divider"></li>
                  <li class="dropdown-item" onclick="goTo('signup.php')">Register <i class="fa fa-user-plus"></i></li>
                  <?php }else{ ?>
                    <li class="dropdown-item" onclick="goTo('my-account.php')">Manage My Account <i class="fa fa-edit"></i></li>
                    <li class="dropdown-item" onclick="logout()">Logout <i class="fa fa-sign-out"></i></li>
                    <?php }?>
                </ul>
              </div>
              </a>
              
          </div>
    </div>
    <div class="modal fade" id="modal_login" role="modal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
          <h3 class="text-center">Login to Superworkmates</h3>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="container">
                <form action="" method="POST" id="formLogin">
                <div class="login-success bg-success text-center"></div>
                  <div class="form-group">
                  <label>Phone/Email</label>
                    <input type="text" name="email_phone" id="email_phone" placeholder="Email/Phone" class="form-control">
                    <div style="color: red;"><!--displays email errors--></div>
                  </div>
                  <div class="form-group">
                  <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    <div style="color: red;"><!--displays password erroes--></div>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="btnLogin" name="login" class="btn-login"><i class="fa fa-sign-in"></i> Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          <a href="resetPassword.php">Forgot password?</a>
          <a href="signup.php" style="cursor: pointer;">Don't have an account? Register here</a>
          <script>
          //login
      function login(title = 'Login to Superworkmates'){
        $('#modal_login div.modal-header > h3').text(title);
        $('#modal_login').modal('show');
      }
      //redirect
      function goTo(targetPage){
        return window.location.href=targetPage;
      }
    document.querySelector('form#formLogin').addEventListener('submit',(e)=>{
      e.preventDefault();
      let btnLogin = document.querySelector('form#formLogin button#btnLogin');
      //capture details
      let email_phone = document.querySelector('form#formLogin input#email_phone');
      let password = document.querySelector('#formLogin input#password');
      //validate if empty
    if(email_phone.value == ''){
      email_phone.nextElementSibling.innerText='Email cannot be empty. ';
      return;
      }else if(password.value == ''){
        password.nextElementSibling.innerText='Password cannot be empty.';
        return;
      }
      let loginDetails = new FormData();
      loginDetails.append('email_phone', email_phone.value);
      loginDetails.append('password', password.value);
      loginDetails.append('submit','true');

      btnLogin.innerHTML='<i>Signing in... Please wait..</i>';
      fetch('connections/processLogin.php',{
        method : 'POST',
        body : loginDetails
      }).then(response=>response.json())
        .then(response=>{
          switch(response.status){
            case 'fail':
            if(response.error.type == 'emailError'){
            email_phone.nextElementSibling.innerText=response.error.msg;
            btnLogin.innerHTML='<i class="fa fa-sign-in"></i> Login';
            }else{
            password.nextElementSibling.innerText=response.error.msg;
            btnLogin.innerHTML='<i class="fa fa-sign-in"></i> Login';
            }
            break;
            case 'success':
            document.querySelector('div.login-success').innerText="Login successful...Redirecting";
            document.querySelector('div.login-success').style.display='block';
            btnLogin.innerHTML='<i class="fa fa-sign-in"></i> Login';
            //redirect to index.php
            window.location.href = 'index.php';
          }
        }).catch(err=>console.log(err))
    });
    //hide the errors when user is modifing
    function hideErrorsOnFocus(){
      email_phone.addEventListener('focus',()=>email_phone.nextElementSibling.innerText='');
      password.addEventListener('focus',()=>password.nextElementSibling.innerText='');
    }
    hideErrorsOnFocus();
    //handling logout
    function logout(){
      return window.location.href='logout.php';
    }
              </script>
          </div>
        </div>
      </div>
    </div>

    

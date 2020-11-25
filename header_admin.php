<?php
//start session
session_start();

if (!isset($_SESSION['admin'])) {
$_SESSION['error']='You must be logged in to access the requested page';
header('Location:admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Superworkmates: You Don't Have to Work Alone</title>
  <link rel="stylesheet" href="css/masterstyle.css">
   <link rel="stylesheet" href="css/trendsstyle.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<style type="text/css">
  *{
    box-sizing: border-box;
  }
body{
  background-color: rgba(0,255,255,0.3);
}

p{
  line-height: 40px;
  font-size: 20px;
}

.container{
  border-radius: 8px;
}

.inputForm{
  margin: 10px auto;
  width: 600px;
  max-width: 70%;

}
/*textarea{
	width: 100%;
	border-radius: 5px;
	flex-wrap: wrap;
	border-color: lightgrey;
}*/

.trends-wrapper{
  display: flex;
  position: relative;
  width: 900px;
  max-width: 80%;
  margin: 20px auto;
}
.navlink a{
  text-decoration: none;
  font-size: 15px;
  border-bottom: 3px solid transparent;
  transition: border-bottom 1s linear;
}
.navlink a:hover{
  border-bottom: 3px solid grey;
}

/*another styles*/
.navbar{
  display: flex;
  justify-content: space-between;
  background-color: rgba(0,255,0,0.9);
}

.part1{
  display: flex;
  flex-wrap: wrap;
  padding: 10px;
}
.part1 .item1{
  width: 25%;
  box-shadow: 8px 8px 20px rgba(0,0,0,0.5);
  padding: 10px;
  transition: 0.7s ease-in-out;
}
.part1 .item1:hover{
box-shadow: 20px 20px 20px rgba(0,0,0,0.5);
z-index: 5;
font-weight: bold;
size: 18px;
}
.part1 .item1 .text, .know{
text-align: center;
size: 16px;
}

.projects-wrapper{
  position: relative;
  margin: auto;
  width: 80%;
  height: auto;
  border:2px solid black;
  border-radius: 5px;
  margin-top: 8px;
}

.project-title{
border: 1px solid black;
height: auto;
margin:5px;
}

.project-aim{
border: 1px solid black;
height: auto;
margin:5px;
}
.project-image{
border: 1px solid black;
height: auto;
margin:5px;
position: relative;
}
.project-timeline{
border: 1px solid black;
height: auto;
position: absolute;
bottom: 3px;
left: 30%;
}
.project-requirements, .project-description{
border: 1px solid black;
height: auto;
margin: 5px;
}
.project-hr{
border: 1px solid black;
height: auto;
margin:5px;
}
.project-image img{
  width:100%;
  height: 100%;
}
.p-field{
border: 1px solid black;
height: auto;
margin:5px;
}

.profile-wrapper{
  display: flex;
  margin-top: 8px;
  margin-left: 10px;
  margin-right: 10px;
}

.profile-wrapper>div{
  border:1px solid black
}
.profile-wrapper .profile,.personal,.work,.business{
flex:3;
text-align: center;
}
.flex{
  display: flex;
  justify-content: space-between;
}
.hide{
  display: none;
}
.show{
  display: block;
}
.oy-scroll{
  overflow-y: scroll;
}

.max-h{
  max-height: 300px;
}
.rounded{
  border-radius: 80%;
}
.float-r{
float: right;
}
.float-l{
  float: left;
}
.relative{
  position: relative;
}
.absolute{
  position: absolute;
}

.left-1{
  left: 1px;
}

.left-2{
  left: 2px;
}

.left-3{
  left: 3px;
}

.left-4{
  left: 4px;
}

.left-5{
  left: 5px;
}

.right-1{
  right: 1px;
}

.right-2{
  right: 2px;
}
.right-3{
  right: 3px;
}
.right-4{
  right: 4px;
}
.right-5{
  right: 5px;
}
.block{
  display: block;
}
.inline{
  display: inline-block;
}
.border-black{
  border: 1px solid black;
}

.flex-1{
  flex:1;
}

.flex-2{
  flex:2;
}
.flex-3{
  flex:3;
}
.flex-4{
  flex:4;
}
.flex-5{
  flex:5;
}
.center{
  text-align: center;
}

</style>
</head>
<body>
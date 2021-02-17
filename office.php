<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Office</title>
    <link rel="stylesheet" type="text/css" href="css/officestyles.css">
</head>
<body>

<?php
include_once 'parts/header.php';
?>

<div class="body">
<div class="office-dashboard">
    <div class="part1-profile">
        <div class="profile">Profile

        </div>
        <div class="personal">Personal

        </div>
        <div class="work">Work

        </div>
    </div>

    <div class="part2-projects">
        <div class="projects">Projects

        </div>
        <div class="in-progress">In Progress

        </div>
        <div class="done-projects">Done Projects

        </div>

    </div>

    <div class="part3-start-something">
        <div class="start-something-top">
            <div class="start-something-title">
                <h4>Start a Project</h4>
            </div>
            <div class="start-something-search">
                search
            </div>

        </div>
        <div class="start-something-categories">
            <div class="start-something-personal">
                <h4>Personal Projects</h4>
            </div>
            <div class="start-something-business">
                <h4>Business Projects</h4>
            </div>
            <div class="start-something-social">
                <h4>Social Projects</h4>
            </div>
        </div>

    </div>
</div>

<?php
include_once 'loginorsignup.php';
?>

</div> <!--closes body-->

<?php
include_once 'parts/footer.php';
?>

</body>
</html>
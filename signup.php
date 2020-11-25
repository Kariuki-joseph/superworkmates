<?php
include_once 'parts/header.php';

//dbconnect
 require_once 'connections/dbconnect.php';

 
 ?>
 

<h2>Sign Up Here:</h2>
 <!--sign-up-error messages-->
<div class="errortab">
<?php

if (isset ($_GET['error'])) {
   // if ($_GET['error'] == "") 
        if ($_GET['error'] == "emptyfields") {
       echo '<p class="signuperror">Please fill in all fields.</p>';
    }
    elseif ($_GET['error'] == "invalidemailandusername") {
        echo '<p class="signuperror">Please enter a valid <strong>name</strong> and <strong>email</strong>.</br>Names can nly contain letters and numbers</p>';
    }
    elseif ($_GET['error'] == "invalidusername") {
        echo '<p class="signuperror">Please enter a valid <strong>username</strong>.</p>';
    }
    elseif ($_GET['error'] == "passesnotmatching") {
        echo '<p class="signuperror"><strong>Passwords do not match</strong>.</p>';
    }
    elseif ($_GET['error'] == "emailtaken") {
        echo '<p class="signuperror">A user with that <strong>email</strong> already <strong>exists</strong>.</p>';
    }
    elseif ($_GET['error'] == "sqlerror") {
        echo '<p class="sqlsignuperror">Sorry, something wen wrong.</p>';
    }
    elseif ($_GET['error'] == "sqlregerror") {
        echo '<p class="sqlsignuperror">Sorry, something wen wrong.</p>';
    }
    elseif ($_GET['error'] == "none") {
        echo '<p class="signupsucess"> <strong>You Have Successfully Registered.</br>Welcome</strong></p>';
        }
}
//page css
include 'signup.html';
?>

<!--Fetching From Database-->
<?php
/*
$sql = "SELECT * FROM theusers";
$result = mysqli_query($connect,$sql);
$rowCount = mysqli_num_rows($result);

if ($rowCount > 0) { while ($row = mysqli_fetch_assoc($result)) {
    echo $row ['phone'];
}
   
} else {
    echo "Nothing Found";
}

*/
?>


<?php
include_once 'parts/footer.php';
?>
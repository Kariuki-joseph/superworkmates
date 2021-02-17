<!--https://stackoverflow.com/questions/11497611/php-auto-refreshing-page/11497617-->
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "3";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
        echo "Watch the page reload itself in 3 seconds!";

        $num1 = 1 + 1;
        $num2 = 2;

        if ($num1 > $num2) {
            echo 'wrong';
            echo 'bad math computing';

        }
        elseif ($num1 <= $num2){
           echo 'correct';
           echo 'good math computing';
        }
        else {
            echo 'I do not know';
        }
    ?>
    </body>
</html>
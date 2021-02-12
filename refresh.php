<!--https://stackoverflow.com/questions/11497611/php-auto-refreshing-page/11497617-->
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
        echo "Watch the page reload itself in 10 seconds!";
    ?>
    </body>
</html>
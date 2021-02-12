<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <title>Receiver Auto Load</title>
</head>
<body>
    <p>Received Message is here</p>

        <?php
        require 'connections/dbconnect.php';
            $ask = "SELECT * FROM ifalive";
            $result = mysqli_query($connect,$ask);
            $rowCount = mysqli_num_rows($result);
    
            if ($rowCount > 0) { while ($row = mysqli_fetch_array($result)) {
              echo "<tr class='table-row'> 
                      <td>" .$row["checkmessage"] ."</td> 
                  <tr>";
            }
            
            } else {
              echo "Nothing Found";
            }

        ?>

</body>
</html>
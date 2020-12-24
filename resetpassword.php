<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
        <form action="ProcessResetPassword.php" name="resetpassword" method="post">
            <h3>Please enter your email here:</h3>
            <label for="email">
                <input type="text" name="email" placeholder = "Your email here">
            </label>
            <button type="submit" name="submit-email">Next</button>
        </form>
</body>
</html>
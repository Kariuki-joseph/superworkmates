<?php
if (isset ($_POST ["submit"])) {

    require_once '../classes/db.php';
    $emailphone =  mysqli_real_escape_string($connect, $_POST['email_phone']);
    $password =  mysqli_real_escape_string($connect, $_POST['password']);

    if (empty($emailphone)) {
        echo json_encode(array(
            'status'=>'fail',
            'error'=>array(
                'type'=>'emailError',
                'msg'=>'Email cannot be empty'
             )
        ));
        exit();
    }elseif(empty($password)){
        echo json_encode(array(
            'status'=>'fail',
            'error'=>array(
                'type'=>'passwordError',
                'msg'=>'Password cannot be empty'
             )
        ));
        exit();
    }
    else {
        $sqlenquery = "SELECT * FROM theusers WHERE phone = ? OR email = ?;";
        $stmt = mysqli_stmt_init ($connect);
        if (!mysqli_stmt_prepare( $stmt, $sqlenquery)) {
            echo json_encode(array(
                'status'=>'fail',
                'error'=>array(
                    'type'=>'emailError',
                    'msg'=>'An error ocurred while preparing your query. Please try again'
                 )
            ));
            exit();
        }
        else {
            mysqli_stmt_bind_param ($stmt, "is", $emailphone, $emailphone);
            mysqli_stmt_execute ($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify ($password, $row['hashedpassword']);
                if ($passCheck == false) {
                    echo json_encode(array(
                        'status'=>'fail',
                        'error'=>array(
                            'type'=>'passwordError',
                            'msg'=>'Invalid login details. Verify then try again'
                         )
                    ));
                    exit();
                }
                elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userid'] = $row['id'];

                    echo json_encode(array(
                        'status'=>'success',
                        'msg'=>'Login successful. Redirecting to home'
                    ));
                    exit();

                }
            }
            else {
                echo json_encode(array(
                    'status'=>'fail',
                    'error'=>array(
                        'type'=>'emailError',
                        'msg'=>'No user with this email was found. Please verify then try again.'
                     )
                ));
                exit();
            }
        }

    }
}
else {
    echo json_encode(array(
        'status'=>'fail',
        'error'=>array(
            'type'=>'unverifiedAccess',
            'msg'=>'Not allowed to access the requested page.'
         )
    ));
    exit();
}
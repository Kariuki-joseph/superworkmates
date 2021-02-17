<?php
require_once 'classes/db.php';
require_once 'classes/dbh.php';

//capture form
$username = mysqli_real_escape_string(MainUsers::conn(),$_POST['username']);
$email = mysqli_real_escape_string(MainUsers::conn(),$_POST['email']);
$phone = mysqli_real_escape_string(MainUsers::conn(),$_POST['phone']);

$dbh = new DBH();
$update = $dbh->getTable('theusers')->update([
    'username'=>$username,
    'email'=>$email,
    'phone'=>$phone
]);

if($update->excecute()){
    echo json_encode(array(
        'status'=>'success',
        'msg'=>'Sucess. Your information was successfully updated.'
    ));
}else{
    echo json_encode(array(
        'status'=>'fail',
        'msg'=>'Unable to update your information at the moment. Please try again later.'
    ));
}
?>
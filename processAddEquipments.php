<?php
if(isset($_POST['submit'])){
    session_start();
    require_once 'classes/db.php';
    require_once 'classes/equipments.php';
    require_once 'classes/user.php';
    //get values
    $title = mysqli_real_escape_string(MainUsers::conn(), $_POST['title']);
    $description = mysqli_real_escape_string(MainUsers::conn(), $_POST['description']);
    $pricing = mysqli_real_escape_string(MainUsers::conn(), $_POST['pricing']);
    $location = mysqli_real_escape_string(MainUsers::conn(), $_POST['location']);
    //get logged in user id as the owner id 
    $user = new User($_SESSION['userid']);
    $ownerID = $user->getId();

    $equipment = new Equipment();
    if($equipment->add($title,$description,$pricing,$location,$ownerID)){
        //success
        $resp = array(
            'status'=>'success',
            'msg'=>'Success. Your item was successfully added for hire. Keep following to know when it is requested. '
        );
        echo json_encode($resp);
        exit();
    }else{
        //an error excecuting the query
        $resp = array(
            'status'=>'fail',
            'msg'=>'Seems like an error ocurred while trying to add your item. Please try again as the developers look at this problem. Thanks.'
        );
        echo json_encode($resp);
        exit();
    }
}else{
    echo json_encode(array(
        'status'=>'fail',
        'msg'=>'Illegal access'
    ));
}
?>
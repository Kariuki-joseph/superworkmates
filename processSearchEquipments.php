<?php
if(isset($_GET['search'])){
    //db connection
    require_once 'classes/db.php';
    require_once 'classes/equipments.php';

    $q = htmlentities($_GET['search']);
    $equipment = new Equipment();
    $results = $equipment->search($q);

    if (mysqli_num_rows($results) == 0) {
        //no results found
        $resp = array(
            'status'=>'fail',
            'msg'=>'No results were found for '
        );
        echo json_encode($resp);
        exit();
    }else{
        $data = [];
        while($row = mysqli_fetch_array($results)){
            array_push($data,array(
                'title'=>$row['title']
            ));
        }
        $resp = array(
            'status'=>'success',
            'data'=>$data
        );

        echo json_encode($resp);
        exit();
    }

}
?>
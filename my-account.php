<?php
require_once 'parts/header.php';
require_once 'classes/db.php';
require_once 'classes/dbh.php';
require_once 'classes/user.php';
require_once 'classes/items.php';
?>
<?php
$user = new User($_SESSION['userid']);
?>
<h3 class="text-center">Welcome <?=$user->get('username');?></h3>
<div class="container">
    <?php
    if (isset($_SESSION['error'])) {
    ?>
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
    <?php 
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
        </div>

    <?php
    }elseif(isset($_SESSION['success'])){
    ?>
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
    <?php
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    ?>
        </div>
    <?php
    }
    ?>
</div>
<!-- update item details modal -->
<div id="divUpdatePricelistModal"></div>
<!--/ update item details modal -->
<!-- toast -->
<?php require_once 'modals/toasts.php';?>
<!--/ toast -->
<?php
$DBItems = new DBH();
$items = $DBItems->getTable('theproducts')->getAll(['seller_id'=>$user->get('id')])->excecute();
$numRows = mysqli_num_rows($items);
?>
<div class="row">
    <div class="col-sm-6">
    <h4><?=($numRows > 0) ? "Manange Your pricelist items" : "You do not have any items yet.To post one, <i><a href='pricelist.php'>Click here.</a></i> ";?></h4>
    </div>
    <div class="col-sm-6"></div>
</div>
<!-- load all items of a perticular person -->
<h3 class="text-center"></h3>
<div id="toastUpdateDetails1"></div>
<div class="row">
    <?php
        while($row = mysqli_fetch_array($items)){
            $item = new Item($row['id']);
    ?>
    <div class="col-sm-4 my-1">
        <div class="card">
            <div class="card-header bg-super-5"><?=$item->get('item');?></div>
            <div class="card-body"><?=$item->get('description');?></div>
            <div class="card-footer bg-super-4">
            <button class="btn btn-danger" onclick="deleteItem(<?=$item->get('id')?>)">Delete <i class="fa fa-ban"></i></button>
            <button class="btn btn-warning" id="btnEditItem" onclick="editItem(<?=$item->get('id')?>)">Edit <i class="fa fa-edit"></i></button>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<!--/ load all items of a perticular person -->

<!-- update account details -->
<div class="row">
    <div class="col-sm-4 mt-3">
        <h2 class="text-center">Update Account Details</h2>
    </div>
    <div class="col-sm-8 mt-3">
    <div id="toastUpdateDetails"></div>
        <form action="" id="formUpdateAccInfo">
            <div class="form-group">
            <label for="username">Username</label>
                <input type="text" name="username" id="" class="form-control" value="<?=$user->get('username');?>">
            </div>
            <div class="form-group">
            <label for="email">Email</label>
                <input type="email" name="email" id="" class="form-control" value="<?=$user->get('email');?>">
            </div>
            <div class="form-group">
            <label for="phone">Phone</label>
                <input type="tel" name="phone" id="" class="form-control" value="<?=$user->get('phone');?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn bg-super-5" id="btnUpdateAccInfo">Update <i class="fa fa-paper-plane"></i></button>
                <button type="reset" name="reset" class="btn btn-warning">Cancel <i class="fa fa-close"></i></button>
            </div>
        </form>
    </div>
</div>
<!--/ update account details -->
<?php require_once 'general-scripts-sources.php';?>
<script src="js/myAccount.js"></script>
<?php
require_once 'parts/footer.php';
?>
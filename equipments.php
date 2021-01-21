<?php
include_once 'parts/header.php';
?>
<div class="modal fade" id="modalEquipmentsPost">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Post your equipment for hire and earn!</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="container">
                    <div class="post-equipment-response"></div>
                        <form action="" id="formPostEquipment">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" id="" placeholder="Title of your equipment/property" class="form-control">
                                <div class="error-msgs" style="color: red;"></div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="" placeholder="Enter a brief description about the item here..." class="form-control" cols="30" rows="4"></textarea>
                                <div class="error-msgs" style="color: red;"></div>
                            </div>
                            <div class="form-group">
                                <label>Pricing</label>
                                <input type="text" name="pricing" id="" placeholder="Let us know how you charge for your item e.g. Ksh. 500 per day" class="form-control">
                                <div class="error-msgs" style="color: red;"></div>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="location" id="" placeholder="Let us know where we can find you" class="form-control">
                                <div class="error-msgs" style="color: red;"></div>
                            </div>
                            <div class="form-group">
                                <label>Atleast choose an image of the equipment/item</label>
                                <input type="file" name="images" id="" class="form-control">
                            </div>
                           <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="submit"  value="submit" id="btnSubmit">Post <i class="fa fa-paper-plane"></i></button>
                            <button class="btn btn-warning" type="reset" id="btnCancel">Cancel <i class="fa fa-cancel"></i></button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
<p class="welcome-msg-equipments">Welcome to superworkmates equipments. Listed below are items on hire.
    Mind to take a look at them and their pricing. You also have a property you may wish to <strong>hire out</strong>? You are in
    the right place.<button class="btn btn-post-equipment" id="<?php echo (isset($_SESSION['userid'])) ? "btnPostLogg" : "btnPost";?>">Post yours today <i class="fa fa-arrow-right"></i></button> at no cost.
</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-7 my-1">
            <input type="search" name="equipmentSearch" id="equipmentSearch" class="form-control" placeholder="Search for equipments here...">
            <ul class="equipments-search-results">
            </ul>
        </div>
        <div class="col-sm-3 my-1">
        <select name="location" id="location" class="form-control pl-2">
                    <option value="any">Any</option>
                    <option value="nairobi">Nairobi</option>
                    <option value="nairobi">Nakuru</option>
                    <option value="nairobi">Eldoret</option>
                    <option value="nairobi">Kisumu</option>
                </select>
        </div>
        <div class="col-sm-2 my-1">
            <button class="btn bg-super">Search <i class="fa fa-search"></i></button>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row pb-3">
    <?php  
    //get available equipments
    require_once 'classes/db.php';
    require_once 'classes/equipments.php';
    $equipment = new Equipment();
    $allEquipments = $equipment->getAvailable();
    while($row = mysqli_fetch_array($allEquipments)){
    ?>
        <div class="col__xsm__6 col-sm-6 col-md-4 col-lg-3 pt-2">
            <div class="card">
                <div class="card-header p-1 bg-super-9"><?= $row['title'];?></i></div>
                <div class="card-body p-1 bg-super-2 product-description">
                    <p><?= $row['description'];?></p>
                    <p>Pricing: <?= $row['pricing'];?></p>
                    <p>Location: <?= $row['location'];?></p>
                </div>
                <div class="card-footer bg-super-6 p-0 d-flex align-content-end"></div>
            </div>
        </div>
        <?php
        }
        ?>   
    </div>
</div>
<?php require_once 'general-scripts-sources.php';?>
<script src="js/equipments.js"></script>
<?php
include_once 'parts/footer.php';
?>
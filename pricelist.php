<!DOCTYPE html>
<html lang="eng">
  
<head>      
<link rel="stylesheet" href="css/priceliststyles.css">
<title>Price List | Anything Anywhere </title>
<script src="https://cdn.tiny.cloud/1/xblvkgkykovpyemtrb2qyxjg7048tcugw1vv0ewykk46kv57/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>

<?php
include_once 'parts/header.php';
include_once 'config.php';
require_once 'classes/db.php';
require_once 'classes/dbh.php';
?>

<div class="d-flex justify-content-between">
<!--login to post on pricelist-->
<?php if(isset($_SESSION['userid']) || isset($_SESSION['username'])){?>
<button class="btn btn-primary m-1 btn-lg" id="btnPostOnPricelist"><h5>Post on pricelist</h5></button>
<?php
}else{
?>
<button class="btn btn-primary m-1 btn-lg" onclick="login('Login to post on superworkmates pricelist')"><h5>Post on pricelist</h5></button>
<?php
}

if (isset($_SESSION['userid']) || isset($_SESSION['username'])) {
?>
<button id="btnOpenFilters" class="btn btn-secondary mt-1 mr-2">More Filters <i class="fa fa-caret-right"></i> <i class="fa fa-caret-right"></i></button>
<?php
}
?>
<!--login to post on pricelist-->
</div>

<div class="row">
<div class="container-fluid">
  <form id="form_search_items">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search for something...">
  </form>
</div>
</div>

<div class="row">
  <div class="container-fluid" style="position: absolute;">
    <ul id="search_results" class="list-unstyled ml-2 mr-2 search-results">
    </ul>
  </div>
</div>

<!--filters-->
<div class="filters">
<div class="container pb-5">
  <a href="#" class="close">&times;</a>
  <h2 class="header-responsive">Select filters to apply</h2>

  <div class="bg-white pb-5 pl-2 pt-1">
    <button class="btn btn-info" data-toggle="collapse" aria-expanded="true" data-target="#categories">Categories</button>
    <div class="collapse m-2" id="categories">
      <form id="filterFormCategories">
        <div class="form-group">
          <label>
          <input type="checkbox" name="categories[]" value="any"> Any
          </label>
        </div>
        <div class="form-group">
          <label><input type="checkbox" name="categories[]" value="Education">  Education
          </label>
        </div>
        <div class="form-group">
         <label> <input type="checkbox" name="categories[]" value="Fashion and clothing"> Fashion and clothing
         </label>
        </div>
      </form>
    </div>
    <button class="btn btn-info" data-toggle="collapse" aria-expanded="true" data-target="#location">Location</button>
    <div class="collapse" id="location">
    <form id="filterFormLocation">
      <div class="form-group m-2">
        <label>
        <input type="checkbox" name="location[]" value="any"> Any
      </label>
      </div>
      <div class="form-group">
        <label>
        <input type="checkbox" name="categories[]" value="Nakuru"> Nakuru
        </label> 
      </div>
      <div class="form-group">
        <label>
          <input type="checkbox" name="categories[]" value="Nairobi"> Nairobi
        </label> 
      </div>
      <div class="form-group">
        <label>
          <input type="checkbox" name="categories[]" value="Eldoret"> Eldoret 
        </label>
      </div>
    </form>
  </div>
</div>
</div>
<div class="container-fluid pb-2 d-flex justify-content-end">
  <button id="btnApplyFilters" class="btn btn-success">APPLY</button>
  
  <button id="btnResetFilters" class="btn btn-warning">Reset</button>
</div>
</div>
<!--filters-->

<!-- post on pricelist modal-->
<div class="modal fade" id="modalAddToPricelist" role="modal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add your item to superwokmates' pricelist</h3>
      </div>
      <div class="modal-body">
        <!--input form-->
        <div class="container">
        <form action="connections/pricelistpost.php" method="post" id="formAddPricelistEntry" enctype="multipart/form-data">
          <div class="form-group">
            <label for="category">Select category</label>
              <select name="category" id="category" class="form-control">
                <option value="nil"> *Please Choose One* </option>
                <?php 
                //fetch categories
                $dbh = new DBH();
                $categories = $dbh->getTable('product_categories')->getAll()->excecute();
                while ($cat = mysqli_fetch_array($categories)) {
                  ?>
                <option><?php echo $cat['name'];?> </option>
                <?php
              }
                ?>
              </select>
          </div>
          <div class="form-group">
            <label for="item">Item</label>
            <input type="text" name="item" id="item" class="form-control" placeholder="e.g. iPhone 6" value="">
          </div>
          <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" placeholder="e.g. 20000" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity:</label>
              <input type="number" step="0.01" name="quantity" id="quantity" placeholder="e.g. 1" class="form-control">
          </div>
          <div class="form-group">
            <label for="unitlabel">For each? (Name of a single piece/unit of the item):</label>
              <input type="text" name="unitlabel" id="unitlabel" placeholder="e.g. tv/jacket/car/loaf/litre " class="form-control">
          </div>
          <div class="form-group">
            <label for="quality">Quality:</label>
              <select name="quality" id="quality" class="form-control">
                <option value="nil"> *Please Choose One* </option>
                <option> Excellent </option>
                <option> Very Good </option>
                <option> Standard </option>
                <option> Very Basic </option>
                <option> Poor </option>
                <option> Not Sure </option>
              </select>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
              <textarea name="" id="description" placeholder="Describe the features of the product here..." rows="4" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="uses">Uses:</label>
              <textarea name="" id="uses" placeholder="What are the uses of the product?" rows="4" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="itemImg">Select Photos</label>
            <input type="file" name="images" id="itemImg" class="form-control" multiple accept="image/*">
            <div class="photos-preview">
    <!--preview photos appear here-->
            </div>
          </div>
          <div class="form-group">
            <label for="place">Location:</label>
              <input type="text" name="place" id="location" placeholder="e.g. Ruaka" class="form-control">
          </div>
          <div class="form-group">
            <label for="seller">Seller:</label>
              <input type="text" name="seller" id="seller" placeholder="e.g. Climax Electronics" class="form-control">
          </div>
          <div class="form-group">
          <button type="submit" name="sendData" class="btn btn-primary" id="sendPricelistEntry">Confirm and Send <i class="fa fa-paper-plane"></i></button> <button type="reset" name="reset" class="btn btn-warning">Reset <i class="fa fa-undo"></i></button>
          </div>
        </form>
        </div>
        <!--/ input form-->
      </div>
      <div class="modal-footer">
         <button class="btn btn-warning" id="btnCancel" data-dismiss="modal" class="close">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>
<!--/ post on pricelist modal-->

<!--response view modal-->
<div class="modal fade" id="modalResponse" role="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Server response</h5>
      </div>
      <div class="modal-body" id="response_body">
          <i>Processing request..Please wait...</i>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" data-dismiss="modal" class="close">Close</button>
      </div>
    </div>
   </div>
</div>
<!--/response view modal-->
<!--images view modal-->
<div class="modal fade" id="modalImageView" role="modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modalImageViewHeader"></div>
      <div class="modal-body">

        <!--carousel images-->
        <div class="carousel slide" id="carouselImageView" data-ride="carousel">
          <!--indicators-->
          <ol class="carousel-indicators" id="carouselImageViewIndicators">
            <!--dynamically added by javascript-->

            <li data-target="#carouselImageView" data-slide-to="0"></li>
            <li data-target="#carouselImageView" data-slide-to="1"></li>
            <li data-target="#carouselImageView" data-slide-to="3"></li>
          </ol>
          <!--/indicators-->

          <!--slides-->
          <div class="carousel-inner" role="listbox" id="carouselImageViewInner">
            <!--dynamically added by javascript-->

            <div class="carousel-item active">
              <div class="view">
                <img src="images/slogo.png" class="d-block w-100" alt="Item Image">
                <div class="mask rgba-black-light"></div>
              </div>
              <div class="carousel-caption">
                <h3 class="h3-responsive">Superworkmates Price List</h3>
                
                <p>Welcome to the new superworkmates price list.Get conversant with the prices of various items.</p>
              </div>
            </div>
          </div>
          <!--/slides-->


          <!--controls-->
          <a class="carousel-control-prev" href="#carouselImageView" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselImageView" data-slide="next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!--/controls-->

        </div>
        <!--/carousel images-->

      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" class="close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--/images view modal-->
<?php
//auto-fill credentials in a form for logged in users
if(isset($_SESSION['userid'])){
require_once 'classes/db.php';
require_once 'classes/user.php';
$user = new User($_SESSION['userid']);
}
?>
<!--buy item modal-->
<div class="modal fade" id="modal_buy_product">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Buy ${item} from ${seller} as</div>
      <div class="modal-body">
        <form id="formBuyItem">
          <div class="form-group row">
            <div class=" form-group container">
              <label for="username">Name</label>
              <input type="text" name="username" id="" value="<?php echo (isset($_SESSION['userid'])) ? $user->get('username') : '';?>" class="form-control" placeholder = "Enter your desired name">
            </div>
            <div class="form-group container">
            <label for="username">Phone</label>
              <input type="text" name="phone" id="" value="<?php echo (isset($_SESSION['userid'])) ? $user->get('phone') : '';?>" class="form-control" placeholder = "Enter phone contact">
            </div>
            <div class="form-group container">
            <label for="message">Brief message to the seller</label>
              <textarea name="" id="message" cols="30" rows="4" class="form-control">Is this still available?</textarea>
            </div>
          </div>
        </form>
        <p id="buy_response" style="display: none;"></p>
        <div class="d-flex justify-content-around" id="btnWrappers">
          <button class="btn btn-warning" id="btn_cancel_buy" class="close" data-dismiss="modal">Cancel <i class="fa fa-close"></i></button>
          <button class="btn btn-info" id="btn_send_buy">Buy <i class="fa fa-paper-plane"></i></button>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--buy item modal-->
<div style="overflow-x:auto;">
<div style="overflow-y:auto;">

<table  class="pricelistable">
  <caption><h2>Price List &copy; Bizvick Venturez</h2></caption>
      <tr class="table-header"> 
          <div class="thead">
            <th>Item ID</th>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Quality</th>
            <th>Description</th>
            <th>Seller</th>
            <th>Place</th>
            <th>Uses</th>
            <th>Date and Time</th>
            <th>Buy</th>
          </div>
        </tr>
    
        <?php
        require 'connections/dbconnect.php';

        $sql = "SELECT * FROM theproducts";
        $result = mysqli_query($connect,$sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
           while ($row = mysqli_fetch_array($result)) {
          ?>
            <tr class='table-row'> 
                  <td data-view-image-onclick="true" data-content="id"><?php echo $row["id"];?></td> 
                  <td data-view-image-onclick="true" id='itemName' class="item-name"><?php echo $row["item"];?></td>
                  <td data-view-image-onclick="true">KSh. <?php echo number_format($row["price"],2); ?></td>
                  <td data-view-image-onclick="true"><?php echo number_format($row["quantity"],1)?></td>
                  <td data-view-image-onclick="true">KSh. <?php echo number_format($row["unit_price"],2)." per ".$row["unit"];?></td>
                  <td data-view-image-onclick="true"><?php echo $row["quality"];?></td>
                  <td data-view-image-onclick="true"><?php echo $row["description"];?></td>
                  <td id="td_seller"><?php echo $row["seller"];?></td>
                  <td data-view-image-onclick = "true"><?php echo $row["place"];?></td>
                  <td data-view-image-onclick = "true"><?php echo $row["uses"];?></td>
                  <td data-view-image-onclick = "true"><?php echo $row["datetime"];?></td>
                  <td><button class='buy-button' 
                  data-seller_id="<?php echo $row['seller_id'];?>"
                  data-item="<?=$row["item"];?>"
                  data-seller="<?=$row["seller"];?>">Buy</button></td>
                  
              <tr>
        <?php
        }
       } else {
          echo "Nothing Found";
        }
        ?>
</table>
</div>
</div>

</br>
</br>
</br>




<!--footer-->
<?php require_once 'general-scripts-sources.php';?>
<script src="scripts.js"></script>
<?php
include_once 'parts/footer.php';
?>
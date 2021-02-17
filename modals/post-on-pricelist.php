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
  //   tinymce.init({
  //     selector: 'textarea',
  //     plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
  //     toolbar_mode: 'floating',
  //  });
  </script>
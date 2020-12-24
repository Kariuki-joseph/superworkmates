<?php
include ('dbConnect.php');
include ('header_admin.php');
include('config.php');

$trends=$trends->getAllTrends();

?>
<center><h3>Add a trend post</h3></center>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-3">
      <?php
                    if(isset($_SESSION['error'])){
               ?>
                    <div class="alert alert-danger">
                         <a href="#" class="close" data-dismiss="alert">  &times</a>
                         <?php echo $_SESSION['error'];
                         unset($_SESSION['error']);?>
                    </div>
               <?php
            }elseif (isset($_SESSION['success'])) {
               ?>
               <div class="alert alert-success">
                         <a href="#" class="close" data-dismiss="alert">  &times</a>
                         <?php echo $_SESSION['success'];
                         unset($_SESSION['success']);?>
                    </div>
               <?php
           }
               ?>
  </div>
  <div class="col-sm-3"></div>
</div>
<div class="inputForm">
<form method="POST" action="processPosts.php" enctype="multipart/form-data">
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" placeholder="Type your name" class="form-control">
  </div>
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" placeholder="Title" class="form-control">
  </div>

  <div class="form-group">
    <select name="category" class="form-control">
      <?php
      $category = new Category();
      $categories = $category->getAll();
      while ($cat = mysqli_fetch_array($categories)) {
      ?>
      <option><?php echo $cat['name'];?></option>
      <?php
    }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label>Message content</label>
    <textarea placeholder="Type your content here..." class="form-control" name="body"></textarea>
  </div>

    <label>Upload a photo</label><br>
    <input type="file" name="image"><br><br>
    <input type="file" name="image2"><br><br>
  <input type="submit" name="submit" value="POST" class="btn btn-success">
</form>
</div>
<br>
<br>
<br>
<!--end of adding a trend post-->

<!--adding categories to database-->
<div class="row">
  <div class="container">
    <form method="POST" action="processPosts.php">

      <div class="form-group">
        <input type="text" name="categoryName" placeholder="Enter to add a category" class="form-control">
      </div>
      
      <div class="form-group">
        <input type="submit" name="add_category" value="Add Category" class="btn btn-primary">&nbsp<input type="reset" name="reset" value="Reset" class="btn btn-warning">
      </div>
    </form>
  </div>
</div>
<!--/adding categories to database-->

<!--mananging trend posts-->
<center><h3>Manage your trend posts</h3></center>
<div class="row">
  <?php
 while ($trend=mysqli_fetch_array($trends)) {
  ?>

	<div class="col-sm-3">
      <!--display card-->
 <div class="card trends-wrapper oy-scroll max-h">
  <div id="<?php echo $trend['id'];?>">
<h6>Created by <small><?php echo $trend['author'];?></small>
 on <small><?php echo $trend['time'];?></small></h6>

   <div class="card-header"><?php echo $trend['title'];?></div>

<img src="<?php echo $trend['image'];?>" height="120px" width="100%" alt="trend image">
</div>

<button value="<?php echo $trend['id'];?>" class="btn btn-warning" onclick="updateTrends(this.value)">Edit</button>

 </div>
  <!--display card-->
  </div>

<?php
}
?>

  <div class="col-sm-3"></div>
  <div class="col-sm-3"></div>
  <div class="col-sm-3"></div>
</div>


<script src="scripts.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
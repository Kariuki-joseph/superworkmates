<?php
include('parts/header.php');
include('config.php');
include('dbConnect.php');
?>
<!--filtering trends based on category-->
<div class="relative float-r pr-5 mb-3" style="width: 20%;">
	<div class="absolute">
		<select name="categories" class="form-control" onchange="getByCategory(this.value)">
			<?php
			$select_category = new Category();
			$select_categories = $select_category->getAll();

			while ($cat = mysqli_fetch_array($select_categories)) {
			?>
<option value="<?php echo $cat['name']; ?>"><?php echo $cat['name']; ?></option>
			<?php
		}
			?>

		</select>
	</div>
</div>
<!--filtering trends based on category-->

<!--trends-->
<?php

$retrieve=mysqli_query($connect,"SELECT * FROM trends ORDER BY time DESC");

 ?>
<div id="myWrapper">
 <div class="row">
  <?php
  while ($row=mysqli_fetch_array($retrieve)) {
    ?>

 <div class="col-sm-4">
 <!--display card-->
 <div class="card trends-wrapper">
<h6>Created by <small><?php echo $row['author'];?></small>
 on <small><?php echo $row['time'];?></small></h6>

   <div class="card-header"><?php echo $row['title'];?></div>

<img src="<?php echo $row['image'];?>" height="100%" width="100%" alt="html 5 icon">

   <div class="card-body"><?php echo substr($row['body'],0,100)."..."; ?></div>
   <a href="viewTrends.php?trend=<?php echo $row['title'];?>&trendId=<?php echo $row['id'];?>">Read More</a>
 </div>
  <!--display card-->
  </div>
  <?php
}
?>

	</div>
</div>
<!--trends-->
<script>
	
	function getByCategory(categoryName) {

		var myWrapper = document.querySelector('#myWrapper');
		myWrapper.innerHTML="<center><h3><i>Loading...</i></h3></center>"
		var xmlHttp = new XMLHttpRequest();

	xmlHttp.open("GET", "fetchTrends.php?category="+categoryName, true);
	xmlHttp.onreadystatechange=function() {

		if (this.readyState==4 && this.status==200) {

		myWrapper.innerHTML = this.responseText;

	}
	
	}
	xmlHttp.send();
		
	}
</script>
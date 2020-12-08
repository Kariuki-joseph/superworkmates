<?php
include 'config.php';
$itemId = $_GET['id'];
//new instance of item
$item = new Item($itemId);

$imgArr = explode(',', $item->getImages());
//make a full path of the images
$fullPathArr = [];
foreach ($imgArr as $key => $value) {
	array_push($fullPathArr, "item-images/".$value);
}

//add to carousel images
$counter = 0;
foreach($fullPathArr as $key => $value){
	$counter++;
	$isActive = ($counter == 1)? "active":"";
?>
<div class="carousel-item <?php echo $isActive;?>">
  <div class="view">
    <img src="<?php echo $value; ?>" class="d-block w-100 img-responsive" alt="Image seems to be missing">
    <div class="mask rgba-black-light"></div>
  </div>
  <div class="carousel-caption">
    <h3 class="h3-responsive"></h3>
    <p></p>
  </div>
</div>
<?php
}
?>
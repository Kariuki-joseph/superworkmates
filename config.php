<?php
class DB
{

public $connect;
function __construct(){
	// $this->connect=mysqli_connect('host31','superwor_joel','5 Potatoes1','superwor_superworkmates');
	$this->connect=mysqli_connect('localhost','root','','superworkmates');

	if (!$this->connect) {
		echo "Unable to connect to the server".mysqli_connect_error();
	}
}
public static function conn(){
	return mysqli_connect('localhost','root','','superworkmates');
}
public static function connMainUsers(){
	return mysqli_connect('localhost','root','','mainusers');
}
}
class MainUsers{
	static function conn(){
		return mysqli_connect('localhost','root','','mainusers');;
	}
}
//trends
class Trends extends DB{
function getAllTrends(){
	$sql="SELECT * FROM trends ORDER BY time DESC";
	$query=mysqli_query($this->connect,$sql);
	return $query;
}

function getById($id){
$sql="SELECT * FROM trends WHERE id='$id'";
	$query=mysqli_query($this->connect,$sql);
	return $query;
}
function getByCategory($categoryName){

	$sql="SELECT * FROM trends WHERE category='$categoryName'";
	$query=mysqli_query($this->connect,$sql);
	
	return $query;
}

//getting related trends
function getRelated($currentTrendId,$title,$categoryName){
	$sql = "SELECT * FROM trends WHERE (title LIKE '%title%' OR category LIKE '$categoryName') AND id!='$currentTrendId'";
	$query = mysqli_query($this->connect, $sql);
	return $query;
}

}


//categories

class Category extends DB{

function add($categoryName){
	$sql="INSERT INTO categories(name) VALUES('$categoryName')";
	$query = mysqli_query($this->connect,$sql);

	if ($query) {
		return true;
	}else{
		return false;
	}
}

function getAll(){
	$sql="SELECT * FROM categories";
	$query = mysqli_query($this->connect,$sql);
	
	return $query;
}
}


//////////////////////////////class for items////////////
class Item extends DB{
	function __construct($id){
		$sql = "SELECT * FROM theproducts WHERE id='$id'";
		$query = mysqli_query(MainUsers::conn(),$sql);
		if ($query) {
			if (mysqli_num_rows($query)>0) {
				$row = mysqli_fetch_array($query);
				//set values
				$this->id = $row['id'];
				$this->itemName = $row['item'];
				$this->category = $row['category'];
				$this->price = $row['price'];
				$this->quantity = $row['quantity'];
				$this->unit_price = $row['unit_price'];
				$this->unit = $row['unit'];
				$this->quality = $row['quality'];
				$this->description = $row['description'];
				$this->images = $row['images'];
				$this->location = $row['place'];
				$this->seller = $row['seller'];
				$this->time = $row['datetime'];
				
			}else{
				echo "OOPS! No matching item was found.";
			}
		}else{
			echo "Unable to excecute your query. Please consult the system administrator for more information";
		}
	}

	//getters
	function getId(){
		return $this->id;
	}
	function getName(){
		return $this->itemName;
	}
	function getCategory(){
		return $this->category;
	}
	function getPrice(){
		return $this->price;
	}
	function getQuantity(){
		return $this->quantity;
	}
	function getUnitPrice(){
		return $this->unit_price;
	}
	function getUnit(){
		return $this->unit;
	}
	function getQuality(){
		return $this->quality;
	}
	function getDescription(){
		return $this->description;
	}
	function getImages(){
		return $this->images;
	}
	function getLocation(){
		return $this->location;
	}
	function getSeller(){
		return $this->seller;
	}
	function getTime(){
		return $this->time;
	}	
}

//////////////////////////searching//////////////////
class Search{
	function __construct($sql){
	$query = mysqli_query(DB::connMainUsers(),$sql);
	$this->searchResults = $query;
	// die(mysqli_num_rows($query));
	}
	//prints search results
	function printResults($search){
		if (mysqli_num_rows($this->searchResults)>0) {
		while ($row = mysqli_fetch_array($this->searchResults)) {
			$itemName = (strlen($row['item'])>20)? substr($row['item']."...",0,20):$row['item'];
			?>
<li data-id="<?php echo $row['id']; ?>">
	<?php echo $itemName; ?>
</li>
			<?php
		}
	}else{
		?>
<li class="bg-danger">
	<i>No records for '<b><?php echo $search; ?></b>' were found. Please refine your search and try again.</i>
</li>
		<?php
	}
	}


}

//////////////////////////instances/////////////////////////////
//instance of trends//
$trends = new Trends();

?>
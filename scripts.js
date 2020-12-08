$('[data-toggle="popover"]').popover();
///////////////////////functions//////////////
//selector function
function _(elem){
	return document.querySelector(elem);
}
//selector All
function _A(elem){
	return document.querySelectorAll(elem);
}
function getTrendsHtml(id){
xmlHttp = new XMLHttpRequest();
	xmlHttp.open("GET","formUpdateTrends.html",true);
	xmlHttp.onreadystatechange=function(){
		if (this.readyState==4 && this.status==200 || this.status==304) {
     document.getElementById(id).innerHTML=this.responseText;
     }
	}
	xmlHttp.send();
}
//editing trends details
function setFormDetails(response){

	var trends=JSON.parse(response);
	//initialize and get the id's of the elements
		var author,title,message,deleteId;
		author=document.getElementById('author');
		title=document.getElementById('title');
		message=document.getElementById('message');
		deleteId=document.getElementById('deleteId');

		//set the values of the onput fields
		author.value=trends.author;
		title.value=trends.title;
		message.innerText=trends.body;
		deleteId.value=trends.id;
}

function getTrendsData(id){
 xmlHttp = new XMLHttpRequest();
	xmlHttp.open("GET","trendsContent.php?id="+id ,true);
	xmlHttp.onreadystatechange=function(){
		if (this.readyState==4 && this.status==200) {
			setFormDetails(this.responseText);
		}
	}

xmlHttp.send();
}


function updateTrends(id) {
	//html form
	getTrendsHtml(id);
	//data to be fed into the html form
	getTrendsData(id);


}
//adds a preview image
function addToPreview(imgUrl) {
	let div = _('.photos-preview');
	let img = document.createElement('img');
		img.classList.add('height-width-200');
	const reader = new FileReader();
		reader.addEventListener('load',e=>{
		img.setAttribute('src',reader.result);
	});
	reader.readAsDataURL(imgUrl);
	//add to the div
	div.appendChild(img);
}
//check a checkbox
function click(checkbox){
checkbox.click();
}

//remove an item from an array
function arrayRemove(array,value){
let index = array.indexOf(value);
	//check availability in the array
	if (index > -1) {
		array.splice(index,1);
	}
}

//add an item to an array
function arrayAdd(array,value) {
	
}

//display carousel with images
function displayCarouselOnItemClick(){
	let rows = document.querySelectorAll('.table-row');
for(let i=0; i<rows.length; i++){
	rows[i].addEventListener('click',(e)=>{
		let itemId = rows[i].childNodes[1].innerText;
		//name of the item at nodelist 5
		let itemName = rows[i].childNodes[5].innerText;
		//fetch images
		let imageUrl = 'fetchImages.php?id='+itemId;
		fetch(imageUrl).then(response=>response.text())
		.then(response=>{
			 
			//carousel items
			_('#carouselImageViewInner').innerHTML=response;
		})
		.catch(err=>console.log(err));
		
		//open modal
		_('#btnModalImageView').click();
		_('#btnModalImageViewHeader').innerHTML=itemName;

	});
}
}

//load row items
function loadAllRowItems() {
	fetch('search.php?loadAll=true').then(response=>response.text())
	.then(response=>{
	_('.pricelistable').innerHTML=response;
	}).catch(err=>console.log(err));
}
//////////////////////////////funtions/////////////
//upload image
const images=[];
_('#itemImg').addEventListener('change',()=>{
	let selImg = _('#itemImg').files[0];
		images.push(selImg.name);
		addToPreview(selImg);
		
let formData = new FormData(_('#formAddPricelistEntry'));
let url = 'image-uploader.php';
let options = {
	method:'POST',
	body:formData
}
//fetch
fetch(url,options)
.then(response=>response.text())
.then(text=>{

})
.catch(err=>{
	console.log(err);
});
});

//send a pricelist item
_('#formAddPricelistEntry').addEventListener('submit',(e)=>{
	e.preventDefault();

	//capture form data 
	const formData = new FormData(_('#formAddPricelistEntry'));
	formData.append("images",images.toString());
	//send data
	let postDataURL = "connections/pricelistpost.php";
	let options = {
		method:'POST',
		body:formData
	}
	//hide the modal
	_('#btnCancel').click();
	//open response modal
	$('#modalResponse').modal('show');

	fetch(postDataURL,options)
	.then(response=>response.text())
	.then(text=>{
	$('#response_body').html(text);
	//close after 5 seconds
	setTimeout(function(){
		$('#modalResponse').modal('hide');
	},4000);
	//reset the form
	_('#formAddPricelistEntry').reset.click();
	}).catch(err=>{
		console.log(err);
	});
});

//click event to row items
displayCarouselOnItemClick();

//location and categories filters
let locationFilters=[];
$('#filterFormLocation input').on('change',(e)=>{
	let checkbox = e.target;
	switch(checkbox.checked){
		case true:
		//add if it didn't exist
		if (!locationFilters.includes(checkbox.value) && checkbox.value != 'any') {
			locationFilters.push(checkbox.value);
		}
		break;
		case false:
		//remove if it exists
		if (locationFilters.includes(checkbox.value)) {
			let index = locationFilters.indexOf(checkbox.value);
			locationFilters.splice(index,1);
		}
		//uncheck the any checkbox
		document.querySelectorAll('#filterFormLocation input')[0].checked=false;
		break;
	}
});
let categoriesFilters=[];
$('#filterFormCategories input').on('change',(e)=>{
let checkbox = e.target;
	switch(checkbox.checked){
		case true:
		//add if it didn't exist
		if (!categoriesFilters.includes(checkbox.value) && checkbox.value != 'any') {
			categoriesFilters.push(checkbox.value);
		}
		break;
		case false:
		//remove if it exists
		if (categoriesFilters.includes(checkbox.value)) {
			arrayRemove(categoriesFilters,checkbox.value);
		}
		//uncheck the any checkbox
		document.querySelectorAll('#filterFormCategories input')[0].checked=false;
		break;
	}

});

//opening more filters
$('#btnOpenFilters,.filters .close,#btnApplyFilters,#btlnResetFilters').on('click',()=>{
	$('.filters').toggleClass('filters-open');
});
//reseting filters
//fill or remove array values on clicking any
let chkboxCat = $('#filterFormCategories input');
let chkboxLoc = $('#filterFormLocation input');
chkboxCat[0].addEventListener('click',()=>{
switch(chkboxCat[0].checked){
	case true:
	//check all others
	categoriesFilters = [];
	for(let x=1; x<chkboxCat.length; x++){
	chkboxCat[x].checked=true;
	//add items to array
	categoriesFilters.push(chkboxCat[x].value);
	}
	break;
	case false:
	//uncheck all others
	for(let x=0; x<chkboxCat.length; x++){
	let index = categoriesFilters.indexOf(chkboxCat[x].value);
	//check availability in the array
	if (index > -1) {
		categoriesFilters.splice(index,1);
	}
	chkboxCat[x].checked=false;
	}
	break;
}
});

chkboxLoc[0].addEventListener('click',()=>{
switch(chkboxLoc[0].checked){
	case true:
	//check all others
	locationFilters = [];
	for(let x=1; x<chkboxLoc.length; x++){
	locationFilters.push(chkboxLoc[x].value);
	chkboxLoc[x].checked=true;
	}
	break;
	case false:
	//uncheck all others
	for(let x=0; x<chkboxLoc.length; x++){
	arrayRemove(locationFilters,chkboxLoc[x].value);
	click(chkboxLoc[x]);
	}
	break;
}
});

//items searching
$('#search').on('keypress keydown keyup',(e)=>{
	let searchStr = _('#search').value;
if (searchStr.length == 0 || searchStr == ' ') {
	$('#search_results').html('');
	if (e.key == 'Backspace' && searchStr.length == 0) {
		loadAllRowItems();
 }
	return;
}

//get filters
let searchParams={};
searchParams.search=$('#search').val();
searchParams.location=locationFilters;
searchParams.categories=categoriesFilters;

//fetch
let SEARCH_URL = "search.php?params="+JSON.stringify(searchParams);
fetch(SEARCH_URL).then(response=>response.text())
.then(response=>{
//display
$('#search_results').html(response);
//click for each result item
let results = _A('#search_results li');
for(let x=0; x<results.length; x++){
results[x].addEventListener('click',(e)=>{
$('#search_results').empty();
let itemId = e.target.getAttribute('data-id');
//fetch
let SEARCH_URL = "search.php?id="+itemId;
fetch(SEARCH_URL).then(response=>response.text())
.then(response=>{
//display filtered data
_('.pricelistable').innerHTML=response;
displayCarouselOnItemClick();
}).catch(err=>console.log(err));
});
}
}).catch(err=>console.log(err));
});

//check any by default
// click($('#filterFormCategories input')[0]);




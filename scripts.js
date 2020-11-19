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


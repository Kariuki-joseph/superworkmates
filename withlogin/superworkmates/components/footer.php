
<script type="text/javascript">
<!--

//document.write ("Mission: To do away with joblessness!");
//-->

var showMore=document.querySelectorAll(".showMore");
//loop through the elements
for(x=0; x<showMore.length; x++){
showMore[x].addEventListener("click",function(e){
var text=e.target.innerText;
var nextSibling=e.target.nextSibling;
nextSibling.classList.toggle("open");
});
}

</script>      
<script src="bootstrap/js/bootstrap.min.js"></script>
 
</body>
</html>
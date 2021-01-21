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

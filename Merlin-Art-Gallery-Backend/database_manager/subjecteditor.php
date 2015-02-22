<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit subjects</title>
	<link type="text/css" rel="stylesheet" href="layout-default-latest.CSS" />
	<script src="javascript/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="javascript/jquery-ui-latest.js" type="text/javascript"></script>
	<script src="javascript/jquery_layout.js" type="text/javascript"></script>
    <script>
		var currentfield = -1;
		function removefield(){
			if (typeof document.getElementById("currentpkey").value==='undefined'){
					
			}
			else{
				var currentpkey = document.getElementById("currentpkey").value;
				if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
					xhr = new XMLHttpRequest();  
				}
				else if (window.ActiveXObject) { // IE 8 and older  
					xhr = new ActiveXObject("Microsoft.XMLHTTP");  
				} 
				var data="pkey="+currentpkey;
				xhr.open("POST", "editorscript/subject/deletefield.php", true);   
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
				xhr.send(data);  
			}
			var delay=setTimeout(searchsbjby, 50);
		}
		function create(){
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				xhr = new XMLHttpRequest();  
			}
			else if (window.ActiveXObject) { // IE 8 and older  
				xhr = new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			xhr.open("POST", "editorscript/subject/createfield.php", true);   
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
			xhr.send(); 
				
			var delay=setTimeout(searchsbjby, 50);
		}
		
		
		function save(pkey){
			var newname = document.getElementById("nname").value;
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				xhr = new XMLHttpRequest();  
			}
			else if (window.ActiveXObject) { // IE 8 and older  
				xhr = new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			var data="nname="+newname+"&pkey="+pkey;
			xhr.open("POST", "editorscript/subject/save.php", true);   
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
			xhr.send(data);
			/*
			xhr.onreadystatechange = display_data; 
			function display_data() {  
     			if (xhr.readyState == 4) {  
      				if (xhr.status == 200) { 
       					document.getElementById("debug").innerHTML = xhr.responseText;  
      				} 
					else {  
        				alert('There was a problem with the request.');  
      				}  
				}
				else{
					document.getElementById("debug").innerHTML="test";
				}
			}
			*/
			var delay=setTimeout(searchsbjby, 50);
			var delay1=setTimeout(function(){editfield(pkey)}, 50);
			
			
		}
		
		
		function editfield(a){
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				sexhr = new XMLHttpRequest();  
			}
			else if (window.ActiveXObject) { // IE 8 and older  
				sexhr = new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			var data ="pkey="+a;
			sexhr.open("POST", "editorscript/subject/editfield.php", true);   
			sexhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
			sexhr.send(data);  
			sexhr.onreadystatechange = display_data; 
			function display_data() {  
     			if (sexhr.readyState == 4) {  
      				if (sexhr.status == 200) {  
       					document.getElementById("editarea").innerHTML = sexhr.responseText;  
      				} 
					else {  
        				alert('There was a problem with the request.');  
      				}  
     			}  
  			} 
		}
		
		function searchsbjby(){
			
			var subjectsearch = document.getElementById("subjectsearch").value;
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				sdxhr = new XMLHttpRequest();  
			}
			else if (window.ActiveXObject) { // IE 8 and older  
				sdxhr = new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			var data = "namesearch="+subjectsearch+"&type=subject";
			sdxhr.open("POST", "editorscript/subject/search.php", true);   
			sdxhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
			sdxhr.send(data);  
			sdxhr.onreadystatechange = display_data; 
			function display_data() {  
     			if (sdxhr.readyState == 4) {  
      				if (sdxhr.status == 200) {  
       					document.getElementById("searcharea").innerHTML = sdxhr.responseText;  
      				} 
					else {  
        				alert('There was a problem with the request.');  
      				}  
     			}  
  			} 
		}
		function shade (row){
			if (currentfield != -1){
				if (typeof document.getElementById("currentpkey").value==='undefined'){
						
				}
				else{
					currentfield.style.backgroundColor="#FFFFFF";
					currentfield = row;
					row.style.backgroundColor="#6EA498";
				}
			}
			else{
					
				currentfield = row;
				row.style.backgroundColor="#6EA498";
			}
				
		}
		$(document).ready (
			
			
			function (){
				searchsbjby();
				var myLayout = $('body').layout({
				resizable:				true
				,	east__size:				200
				,	north__spacing_open:	0
				,	slidable: false
			});


			}
		);
	</script>
</head>

<body>

	<div class="ui-layout-north">
    	<input type="button" onMouseUp="create()" value="New Subject">
        <input type="button" onMouseUp="removefield()" value="Delete">
    </div>
    
    <div class="ui-layout-center">
   		<table border=1 width = "200">
        	<tr>
            	<th>Name</th>
            </tr>
            <tr>
                <td><center><input type = 'search' style="width:90%;" results = '5' name = 'subjectsearch' placeholder = 'Search' id='subjectsearch' onKeyUp="searchsbjby()"></center></td>
            </tr>
        </table>
    	<div id="searcharea">
        
        </div>
    
    </div>
    
    <div class="ui-layout-east" id="editarea">
    </div>
    

</body>
</html>

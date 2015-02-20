<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Database Manager</title>
        
        <link type="text/css" rel="stylesheet" href="layout-default-latest.CSS" />
        <script src="jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="jquery-ui-latest.js" type="text/javascript"></script>
        <script src="jquery_layout.js" type="text/javascript"></script>
        
        <script>
			$(document).ready (
				function (){
					var myLayout = $('body').layout({
					resizable:				true
					,	east__size:				Math.floor(screen.availWidth * .30) // 50% screen width
					,	north__spacing_open:	0
					,	slidable: false
				});


				}
			);
			
			function editfield(a){
				
			}
			
			function searchby(){
				var idsearch = document.getElementById("idsearch").value; 
				var namesearch = document.getElementById("namesearch").value; 
				var artistsearch = document.getElementById("artistsearch").value;
				var yearsearch = document.getElementById("yearsearch").value;  
				var nationsearch = document.getElementById("nationsearch").value;  
				var genresearch = document.getElementById("genresearch").value;  
				var pricesearch = document.getElementById("pricesearch").value;  
				var heightsearch = document.getElementById("heightsearch").value;  
				var widthsearch = document.getElementById("widthsearch").value; 
				var biosearch = document.getElementById("biosearch").value;   
				var othersearch = document.getElementById("othersearch").value;
				var soldsearch = document.getElementById("soldsearch").value;
				var locsearch = document.getElementById("locsearch").value;
				if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
					xhr = new XMLHttpRequest();  
				}
				else if (window.ActiveXObject) { // IE 8 and older  
					xhr = new ActiveXObject("Microsoft.XMLHTTP");  
				} 
				var data = "idsearch=" + idsearch + "&namesearch=" + namesearch + "&artistsearch=" + artistsearch + "&yearsearch=" + yearsearch + "&nationsearch=" + nationsearch + "&genresearch=" + genresearch + "&pricesearch=" + pricesearch + "&heightsearch=" + heightsearch + "&widthsearch=" + widthsearch + "&biosearch=" + biosearch + "&othersearch=" + othersearch + "&soldsearch="+soldsearch + "&locsearch="+locsearch;
				xhr.open("POST", "search.php", true);   
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
				xhr.send(data);  
				xhr.onreadystatechange = display_data; 
				function display_data() {  
     				if (xhr.readyState == 4) {  
      					if (xhr.status == 200) {  
       						document.getElementById("searchpic").innerHTML = xhr.responseText;  
      					} 
						else {  
        					alert('There was a problem with the request.');  
      					}  
     				}  
  				} 
			}
		</script>
        
        
        
        <style type="text/css">
			.ui-layout-resizer-east {
				border-top:		1px solid #BBB;
				}

		</style>
	</head>

	<body>
	
    <div class="ui-layout-north">
    	<input type="button" onMouseUp="" value="New Entry">
        <input type="button" onMouseUp="" value="Delete">
    </div>
    <div class="ui-layout-center" style="overflow:auto;">
   		<div>
    		<table border=1 width = "2340">
        		<tr>
                	<th width="100">Image</th>
            		<th width="100">ID</th>
               		<th width="150">Name</th>
                	<th width="200">Artist</th>
                    <th width="50">sold</th>
                	<th width="100"> DOB (year) </th>
                	<th width="150"> Nationality </th>
                	<th width="140"> Genre </th>
                    <th width="140"> Media </th>
                    <th width="100"> Painted year </th>
                	<th width="120"> Price </th>
                	<th width="120"> Height (cm) </th>
                	<th width="120"> Width (cm) </th>
                    <th width="200"> Painting Location</th>
                	<th width="300"> Biography </th>
                	<th> Other Info </th>
            	</tr>
            	<tr>
                	<td></td>
            		<td><center><input type = 'search' style="width:90%;" results = '5' name = 'idsearch' placeholder = 'Search' id='idsearch' onKeyUp="searchby()"></td>
                	<td><center><input type = 'search' style="width:90%;" results = '5' name = 'namesearch' placeholder = 'Search' id='namesearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search' style="width:90%;" results = '5' name = 'artistsearch' placeholder = 'Search' id = 'artistsearch' onKeyUp="searchby()"></center></td>
                    <td><center><input type = 'text' style="width:90%;" name = 'soldsearch' id = 'soldsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search' style="width:90%;" results = '5' name = 'yearsearch' placeholder = 'YYYY' id='yearsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search' style="width:90%;" results = '5' name = 'nationsearch' placeholder = 'Search' id='nationsearch' onKeyUp="searchby()"></center></td>

                	<td><center><input type = 'search' style="width:90%;" results = '5' name = 'genresearch' placeholder = 'Search' id='genresearch' onKeyUp="searchby()"></center></td>
                    <td><center><input type = 'search' style="width:90%;" results = '5' name = 'mediasearch' placeholder = 'Search' id='mediasearch' onKeyUp="searchby()"></center></td>
                    <td><center><input type = 'search' style="width:90%;" results = '5' name = 'pyearsearch' placeholder = 'YYYY' id='pyearsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'text' style="width:90%;" size='5' name = 'pricesearch' id='pricesearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'text' style="width:90%;" size='5' name = 'heightsearch' id='heightsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'text' style="width:90%;" size='5' name = 'widthsearch' id='widthsearch' onKeyUp="searchby()"></center></td>
                    <td><center><input type = 'search' style="width:90%;" results = '5' name = 'locsearch' placeholder = 'Search' id='locsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search' style="width:90%;" results = '5' name = 'biosearch' placeholder = 'Search' id='biosearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search' style="width:90%;" results = '5' name = 'othersearch' placeholder = 'Search' id='othersearch' onKeyUp="searchby()"></center></td>
            	</tr>
        	</table>
        </div>
        
        <div id="searchpic">
        
        </div>
        
    </div>
    
    <div class ="ui-layout-east">
            <h3> Image Properties </h3> 

        <form>

        <label for = 'something'>ID </label>
        <input type = "text" id = "something">

        <label for = 'something'>Title </label>
        <input type = "text" id = "something">

        <label for = 'something'>Artist Name</label>
        <input type = "text" id = "something">

        <label for = 'something'>Artist's DOB </label>
        <input type = "text" id = "something">

        <label for = 'something'>Nationality </label>
        <input type = "text" id = "something">

        <label for = 'something'>Genre </label>
        <input type = "text" id = "something">

        <label for = 'something'>Price </label>
        <input type = "number" id = "something">

        <label for = 'something'>Height </label>
        <input type = "number" id = "something">

        <label for = 'something'>Width </label>
        <input type = "number" id = "something">

        <label for = 'biography'>Biography</label>
        <input type = "text" id = "biography">

        </form>
    </div>
	</body>
</html>
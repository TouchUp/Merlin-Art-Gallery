
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Database Manager</title>
        
        <link rel="stylesheet" href="./font-awesome-4.3.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="layout-default-latest.CSS" />
        <link type="text/css" rel="stylesheet" href="style.css" />
        <link type="text/css" rel="stylesheet" href="icons.css" />
        <link type="text/css" rel="stylesheet" href="painting_info.css" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <script src="javascript/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="javascript/jquery-ui-latest.js" type="text/javascript"></script>
        <script src="javascript/jquery_layout.js" type="text/javascript"></script>
        
        <script>
		
			var currentfield = -1;
			
			function subjectmanage(){
				newwindow=window.open('subjecteditor.php','name','height=400,width=450');
				if (window.focus) {newwindow.focus()}
			}
			function mediamanage(){
				newwindow=window.open('mediaeditor.php','name','height=400,width=450');
				if (window.focus) {newwindow.focus()}
			}
			
			function wconvert(){
				var temp = document.getElementById("ncmwidth").value;
				if(document.getElementById("wtype").value =="cm"){
					temp = Math.round((temp*2.54)*100);
					temp = temp/100;	
					document.getElementById("ncmwidth").value = temp;
				}
				else{
					temp = Math.round((temp/2.54)*100);
					temp = temp/100;
					document.getElementById("ncmwidth").value = temp;
				}
			}
			function hconvert(){
				var temp = document.getElementById("ncmheight").value;
				if(document.getElementById("htype").value =="cm"){
					temp = Math.round((temp*2.54)*100);
					temp = temp/100;	
					document.getElementById("ncmheight").value = temp;
				}
				else{
					temp = Math.round((temp/2.54)*100);
					temp = temp/100;
					document.getElementById("ncmheight").value = temp;
				}
			}
			
			function editfield(a){
				if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
					exhr = new XMLHttpRequest();  
				}
				else if (window.ActiveXObject) { // IE 8 and older  
					exhr = new ActiveXObject("Microsoft.XMLHTTP");  
				} 
				var data ="pkey="+a;
				exhr.open("POST", "phpscript/editfield.php", true);   
				exhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
				exhr.send(data);  
				exhr.onreadystatechange = display_data; 
				function display_data() {  
     				if (exhr.readyState == 4) {  
      					if (exhr.status == 200) {  
       						document.getElementById("editinfo").innerHTML = exhr.responseText;  
      					} 
						else {  
        					alert('There was a problem with the request.');  
      					}  
     				}  
  				} 
			}
			function create(){
				if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
					xhr = new XMLHttpRequest();  
				}
				else if (window.ActiveXObject) { // IE 8 and older  
					xhr = new ActiveXObject("Microsoft.XMLHTTP");  
				} 
				xhr.open("POST", "phpscript/createfield.php", true);   
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
				xhr.send(); 
				
				var delay=setTimeout(searchby, 50); 
			}
			
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
					xhr.open("POST", "phpscript/deletefield.php", true);   
					xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
					xhr.send(data);  
				}
				var delay=setTimeout(searchby, 50);
			}
			
			function save(a){
				var newid = document.getElementById("ncode").value;
				var newname = document.getElementById("nname").value;
				var newartist = document.getElementById("nartist").value;
				var newdobyear = document.getElementById("ndoby").value;
				var newdobmonth = document.getElementById("ndobm").value;
				var newdobday = document.getElementById("ndobd").value;
				var newsold = document.getElementById("nsold").value;
				var newcountry = document.getElementById("ncountry").value;
				var newsubject = document.getElementById("nsubject").value;
				var newmedia = document.getElementById("nmedia").value;
				var newpyear = document.getElementById("npyear").value;
				var newprice = document.getElementById("nprice").value;
				var newheight = document.getElementById("ncmheight").value;
				var newwidth = document.getElementById("ncmwidth").value;
				var newplocation = document.getElementById("nplocation").value;
				var newbio = document.getElementById("nbio").value;
				var newothers = document.getElementById("nothers").value;
				if(document.getElementById("htype").value =="in"){
					newheight = Math.round((newheight*2.54)*100);
					newheight = newheight/100;	
				}
				if(document.getElementById("wtype").value =="in"){
					newwidth = Math.round((newwidth*2.54)*100);
					newwidth = newwidth/100;	
				}
				if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
					xhr = new XMLHttpRequest();  
				}
				else if (window.ActiveXObject) { // IE 8 and older  
					xhr = new ActiveXObject("Microsoft.XMLHTTP");  
				} 
				var data = "nid="+newid+"&nname="+newname+"&nartist="+newartist+"&ndoby="+newdobyear+"&ndobm="+newdobmonth+"&ndobd="+newdobday+"&nsold="+newsold+"&ncountry="+newcountry+"&nsubject="+newsubject+"&nmedia="+newmedia+"&npyear="+newpyear+"&nprice="+newprice+"&nheight="+newheight+"&nwidth="+newwidth+"&nplocation="+newplocation+"&nbio="+newbio+"&nothers="+newothers+"&pkey="+a;
				xhr.open("POST", "phpscript/save.php", true);   
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
				xhr.send(data);
				var delay=setTimeout(searchby, 50);
				var delay1=setTimeout(function(){editfield(a)}, 50);
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
					dxhr = new XMLHttpRequest();  
				}
				else if (window.ActiveXObject) { // IE 8 and older  
					dxhr = new ActiveXObject("Microsoft.XMLHTTP");  
				} 
				var data = "idsearch=" + idsearch + "&namesearch=" + namesearch + "&artistsearch=" + artistsearch + "&yearsearch=" + yearsearch + "&nationsearch=" + nationsearch + "&genresearch=" + genresearch + "&pricesearch=" + pricesearch + "&heightsearch=" + heightsearch + "&widthsearch=" + widthsearch + "&biosearch=" + biosearch + "&othersearch=" + othersearch + "&soldsearch="+soldsearch + "&locsearch="+locsearch;
				dxhr.open("POST", "phpscript/search.php", true);   
				dxhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
				dxhr.send(data);  
				dxhr.onreadystatechange = display_data; 
				function display_data() {  
     				if (dxhr.readyState == 4) {  
      					if (dxhr.status == 200) {  
       						document.getElementById("searchpic").innerHTML = dxhr.responseText;  
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
						row.style.backgroundColor="rgb(180,180,180)";
						//Not working row.style.color="red";
					}
				}
				else{
					
					currentfield = row;
					row.style.backgroundColor="rgb(180,180,180)";
					//Not Working row.style.color="red";
				}
				
			}
			
			function uploadfile(pkey){
				event.stopPropagation();
   				event.preventDefault();
				var fileSelect = document.getElementById('newimage');
				document.getElementById("uploadbutton").value="Uploading...";
				var files = fileSelect.files;
				var formData = new FormData();
				var file = files[0];
				if (!file.type.match('image.*')) {
    				
  				}
				else{
					formData.append('image', file, file.name);	
					formData.append('pkey', pkey);
					if (window.XMLHttpRequest) { 
						var uxhr = new XMLHttpRequest();  
					}
					else if (window.ActiveXObject) {
						var uxhr = new ActiveXObject("Microsoft.XMLHTTP");  
					} 
					uxhr.open('POST', 'phpscript/upload.php', true);
					uxhr.onload = function () {
  						if (uxhr.status === 200) {
   							document.getElementById("uploadbutton").value="Upload";
  						}
						else {
    						alert('An error occurred!');
							document.getElementById("uploadbutton").value="Upload";
  						}
					};
					uxhr.send(formData);
					/*
					function display_data() {  
     					if (uxhr.readyState == 4) { 
							
      						if (uxhr.status == 200) {  
       							document.getElementById("debug").innerHTML = uxhr.responseText;  
      						} 
							else {  
        						alert('There was a problem with the request.');  
      						}  
     					}  
  					} 
					*/
					var delay=setTimeout(searchby, 50);
					var delay1=setTimeout(function(){editfield(pkey)}, 50);
				}
				
				
				
				
			}
			
			$(document).ready (
				function (){
					searchby();
					
					var myLayout = $('body').layout({
					resizable:				true
					,	east__size:				Math.floor(screen.availWidth * .30) // 50% screen width
					,	north__spacing_open:	0
					,	slidable: false
				});


				}
			);
		</script>

	</head>

	<body>

	
    <div class="ui-layout-north" >
    	<h1>Painting Database </h1>
    	<i class = "fa fa-plus-square fa-3x" onMouseUp="create()" value="New Entry"></i>
        <i class = "fa fa-minus-square fa-3x" onMouseUp="removefield()" value="Delete"></i>

        	<ul>
        		<li><input type="button" value="Manage Subjects" onClick="subjectmanage()"></li>
        		<li><input type="button" value="Manage Media" onClick="mediamanage()"></li>
        	</ul>



    </div>
    <div class="ui-layout-center" >
   		<div>
    		<table width = "2340">
        		<tr>
                	<th width="100">Image</th>
            		<th width="100">ID</th>
               		<th width="150">Name</th>
                	<th width="200">Artist</th>
                    <th width="50">Sold</th>
                	<th width="100"> DOB (year) </th>
                	<th width="150"> Nationality </th>
                	<th width="140"> Subject </th>
                    <th width="140"> Media </th>
                    <th width="100"> Year Painted </th>
                	<th width="120"> Price </th>
                	<th width="120"> Height (cm) </th>
                	<th width="120"> Width (cm) </th>
                    <th width="200"> Painting Location</th>
                	<th width="300"> Biography </th>
                	<th> Other Info </th>
            	</tr>
            	<tr>
                	<td></td>
            		<td><center><input type = 'search' results = '5' name = 'idsearch' placeholder = 'Search' id='idsearch' onKeyUp="searchby()"></td>
                	<td><center><input type = 'search'  results = '5' name = 'namesearch' placeholder = 'Search' id='namesearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search' results = '5' name = 'artistsearch' placeholder = 'Search' id = 'artistsearch' onKeyUp="searchby()"></center></td>
                    <td><center><input type = 'search'  name = 'soldsearch' id = 'soldsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search'  results = '5' name = 'yearsearch' placeholder = 'YYYY' id='yearsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search'  results = '5' name = 'nationsearch' placeholder = 'Search' id='nationsearch' onKeyUp="searchby()"></center></td>

                	<td><center><input type = 'search'  results = '5' name = 'genresearch' placeholder = 'Search' id='genresearch' onKeyUp="searchby()"></center></td>
                    <td><center><input type = 'search'  results = '5' name = 'mediasearch' placeholder = 'Search' id='mediasearch' onKeyUp="searchby()"></center></td>
                    <td><center><input type = 'search'  results = '5' name = 'pyearsearch' placeholder = 'YYYY' id='pyearsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'text'  size='5' name = 'pricesearch' id='pricesearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'text'  size='5' name = 'heightsearch' id='heightsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'text'  size='5' name = 'widthsearch' id='widthsearch' onKeyUp="searchby()"></center></td>
                    <td><center><input type = 'search'  results = '5' name = 'locsearch' placeholder = 'Search' id='locsearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search'  results = '5' name = 'biosearch' placeholder = 'Search' id='biosearch' onKeyUp="searchby()"></center></td>
                	<td><center><input type = 'search'  results = '5' name = 'othersearch' placeholder = 'Search' id='othersearch' onKeyUp="searchby()"></center></td>
            	</tr>
        	</table>
        </div>
        
        <div id="searchpic">
        
        </div>
        
    </div>
    
    <div class ="ui-layout-east" id="editinfo">
    		<h2>Painting Information </h2>
            Select field to edit
    </div>
	</body>
</html>
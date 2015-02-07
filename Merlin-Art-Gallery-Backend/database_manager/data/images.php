<?php
require("../codebase/connector/grid_connector.php");//adds the connector engine
$res=mysql_connect("localhost","root","");//connects to server with  db
mysql_select_db("imageserver");//connects to db with name "dhtmlx_tutorial"  
 
$conn = new GridConnector($res,"MySQL");             //initializes the connector object
$conn->render_table("images","pkey","code,name,artist,price,height,width,bio,sold,others,flocation,fname");  //loads data
//the method takes: the table's name, the id field, a list of fields to load


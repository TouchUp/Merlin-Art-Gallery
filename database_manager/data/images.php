<?php
require("../codebase/connector/grid_connector.php");//adds the connector engine
$res=mysql_connect("localhost","root","");//connects to server with  db
mysql_select_db("artgallery");//connects to db with name "dhtmlx_tutorial"  
 
$conn = new GridConnector($res,"MySQL");             //initializes the connector object
$conn->render_table("images","PRIMARY_ID","code,name,artist,price,bio,sold,others,cmheight,cmwidth,inheight,inwidth");  //loads data
//the method takes: the table's name, the id field, a list of fields to load


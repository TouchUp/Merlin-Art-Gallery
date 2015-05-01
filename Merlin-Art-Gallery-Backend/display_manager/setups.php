<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	if (isset($_POST['idsearch'])){
		
		$setupsearch = $_POST['setupsearch'];
		$setupsearch = mysql_real_escape_string($setupsearch);
		
	}
	else{
		$setupsearch = "";
	}
	
	$sql = 'SELECT * FROM setups WHERE 
	(name LIKE "'.$setupsearch.'%") 
	';
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	echo '<table>
	<tr> 	
        <th>Setup Name</th>
		<th>Options</th>
        </tr>
	
	
	
	';
	
	while($row=$result->fetch_array()){ 
		$pkey = $row['pkey'];
		$name = $row['name'];
		echo '<tr>';
		echo '<td>'.$name.'</td>';
		echo '<td><form method="post" action="display_manager_large.php"><input type="hidden" value="('.$pkey.')" name="pkey"/><input type="submit" value="Load" /> </form><input type="button" value="Delete" onMouseUp="removesetup('.$pkey.')" /></td>';
		echo '</tr>';
		}
	echo '</table>';
	$result->free();
	$mysqli->close();
	
?>
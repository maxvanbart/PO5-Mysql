<?php
//including the database connection file
include_once("includes/db_connect.php");
?>
 
<html>
<head>    
    <title>Film</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
 
<body>
	<?php include "includes/menu.php" ?>
	<h2>Zoekmachine</h2>
	    <form id="gegevens" action="zoek.php" method="post">
			<input type="text" name="zoek"></td>
			<input type="submit" name="Submit" value="zoek"></td>
    </form>
</body>
</html>
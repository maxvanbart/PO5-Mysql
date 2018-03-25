<?php
//including the database connection file
include_once("includes/db_connect.php");
?>

<html>
<head>
    <title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
 
<body>
    <a href="gegevens.php">Home</a>
    <br/><br/>
 
    <form id="gegevens" action="addregisseur2.php" method="post" name="form1">
        <table id="gegevens">
            <tr> 
                <td>Voornaam regisseur</td>
                <td><input type="text" name="regisseurvoornaam"></td>
            </tr>
            <tr> 
                <td>Achternaam regisseur</td>
                <td><input type="text" name="regisseurachternaam"></td>
            </tr>
			<tr> 
                <td>Film</td>
                <td><input type="text" name="film"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

</body>
</html>


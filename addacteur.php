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
 
    <form id="gegevens" action="addacteur2.php" method="post" name="form1">
        <table id="gegevens">
            <tr> 
                <td>Voornaam acteur</td>
                <td><input type="text" name="acteurvoornaam"></td>
            </tr>
            <tr> 
                <td>Achternaam acteur</td>
                <td><input type="text" name="acteurachternaam"></td>
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


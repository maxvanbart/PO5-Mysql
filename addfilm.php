<?php
//including the database connection file
include_once("includes/db_connect.php");
$result1 = mysqli_query($mysqli, "SELECT * FROM leeftijdscategorie");
$result2 = mysqli_query($mysqli, "SELECT * FROM waarschuwing");
?>

<html>
<head>
    <title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
 
<body>
    <a href="gegevens.php">Home</a>
    <br/><br/>
 
    <form id="gegevens" action="addfilm2.php" method="post" name="form1">
        <table id="gegevens">
            <tr> 
                <td>Titel</td>
                <td><input type="text" name="titel"></td>
            </tr>
			<tr>
				<td>Leeftijdscategorie</td>
				<td><input name="leeftijdscategorienummer" type="radio" value="1">Alle leeftijden</td>
				<td><input name="leeftijdscategorienummer" type="radio" value="2">Vanaf 6 jaar</td>
				<td><input name="leeftijdscategorienummer" type="radio" value="3">Vanaf 9 jaar</td>
				<td><input name="leeftijdscategorienummer" type="radio" value="4">Vanaf 12 jaar</td>
				<td><input name="leeftijdscategorienummer" type="radio" value="5">Vanaf 16 jaar</td>
			</tr>
            <tr> 
                <td>imdblink</td>
                <td><input type="text" name="imdblink"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

	<table id="leeftijd">
	<tbody>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res1 = mysqli_fetch_array($result1)) {         
            echo "<td>";?> <img src="<?php echo $res1['afbeelding']; ?>"> <?php "</td>";
            echo "<td>".$res1['leeftijdscategorie']."</td>";          
        }
        ?>
	</tbody>
    </table>
	<table id="waarschuwing">
	<tbody>
        <?php  
        while($res2 = mysqli_fetch_array($result2)) {         
			echo "<td>";?> <img src="<?php echo $res2['afbeelding']; ?>"> <?php "</td>";
            echo "<td>".$res2['waarschuwing']."</td>";       
        }
        ?>
	</tbody>
    </table>
	
	
</body>
</html>

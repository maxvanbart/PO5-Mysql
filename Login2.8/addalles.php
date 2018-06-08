<?php
//including the database connection file
include_once("includes/db_connect.php");
include_once 'includes/functions.php';
sec_session_start();

$result1 = mysqli_query($mysqli, "SELECT * FROM leeftijdscategorie");
$result2 = mysqli_query($mysqli, "SELECT * FROM waarschuwing");
?>

<html>
<head>
    <title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
 
<body>
<?php if (login_check($mysqli) == true) : ?>
    <a href="gegevens.php">Home</a>
    <br/><br/>
 
    <form id="gegevens" action="addalles2.php" method="post" name="form1" enctype="multipart/form-data">
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
                <td>Voornaam acteur</td>
                <td><input type="text" name="acteurvoornaam"></td>
            </tr>
			<tr> 
                <td>Achternaam acteur</td>
                <td><input type="text" name="acteurachternaam"></td>
            </tr>
			<tr> 
                <td>Voornaam regisseur</td>
                <td><input type="text" name="regisseurvoornaam"></td>
            </tr>
			<tr> 
                <td>Achternaam regisseur</td>
                <td><input type="text" name="regisseurachternaam"></td>
            </tr>
			<tr> 
                <td>Genre</td>
                <td><input type="text" name="genrenaam"></td>
            </tr>
			<tr>
				<td>Waarschuwing</td>
				<td><input type="checkbox" name="waarschuwingsnummer" value="1">Geweld<br></td>
				<td><input type="checkbox" name="waarschuwingsnummer" value="2">Angst<br></td>
				<td><input type="checkbox" name="waarschuwingsnummer" value="3">Seks<br></td>
				<td><input type="checkbox" name="waarschuwingsnummer" value="4">Grof taalgebruik<br></td>
				<td><input type="checkbox" name="waarschuwingsnummer" value="5">Drugs- en/of alcoholgebruik<br></td>
				<td><input type="checkbox" name="waarschuwingsnummer" value="6">Discriminatie</td>
            </tr>
			<tr>
				  <td><input type="file" name="image" enctype="multipart/form-data"></td>
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
        while($res1 = mysqli_fetch_array($result1)) {         
            ////echo "<tr>";
			echo "<td>";?> <img src="<?php echo $res1['afbeelding']; ?>"> <?php "</td>";
            echo "<td>".$res1['leeftijdscategorie']."</td>";
			//echo "</tr>";          
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
	
<?php else : ?>
    <p>
      <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>
</body>
</html>

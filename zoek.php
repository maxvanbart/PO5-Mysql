<html>
<head>
    <title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
 
<body>
	<?php include "includes/menu.php" ?>
	<h2>Zoekmachine</h2>
	    <form id="gegevens" action="zoek.php" method="post">
			<input type="text" name="zoek" value="<?php echo  $_POST['zoek']; ?>"></td>
			<input type="submit" name="Submit" value="zoek"></td>
    </form>
	</ hr>
<?php
include_once("includes/db_connect.php");
 
if(isset($_POST['Submit'])) {    
    $zoek = $_POST['zoek'];
        
    // checking empty fields
    if(empty($zoek)) {                
        if(empty($zoek)) {
            echo "<font color='red'>Search field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
		
		$result1 = mysqli_query($mysqli,"SELECT id FROM film WHERE titel LIKE '$zoek'");
   		$controllerow = mysqli_num_rows($result1);
   		$result2 = mysqli_query($mysqli,"SELECT acteurnummer FROM acteur WHERE acteurvoornaam LIKE '%".$zoek."%' OR acteurachternaam LIKE '%".$zoek."%'");
   		$controllerow2 = mysqli_num_rows($result2);
   		$result3 = mysqli_query($mysqli,"SELECT regisseurnummer FROM regisseur WHERE regisseurvoornaam LIKE '$zoek'");
   		$controllerow3 = mysqli_num_rows($result3);
		if($controllerow>0){
			$zoek = $_POST['zoek'];
			$result1 = mysqli_query($mysqli,"SELECT DISTINCT f.* , fa.*, a.* FROM film f, acteur a, filmacteur fa WHERE titel LIKE '%".$zoek."%' AND f.id = fa.filmnummer AND fa.acteurnummer = a.acteurnummer");	
				while($res2 = mysqli_fetch_array($result2)) {         
		            echo "<table>";
					echo "<tr>";
		            echo "<td>".$res2['titel']."</td>";
		            echo "<td>".$res2['leeftijdscategorienummer']."</td>";
		            echo "<td><a href=".$res2['imdblink'].">imdb</a></td>";
					echo "<td>".$res2['acteurvoornaam']."</td>";
					echo "<td>".$res2['acteurachternaam']."</td>";
					echo "</table>";        
		        }
			
		}else if ($controllerow2>0){
			//voornaam zoeken gaat fout laat alle films zien, achternaam gaat goed.
			$zoek = $_POST['zoek'];
			$result2 = mysqli_query($mysqli,"SELECT DISTINCT f.* , fa.*, a.* FROM film f, acteur a, filmacteur fa WHERE a.acteurvoornaam LIKE '%".$zoek."%' OR a.acteurachternaam LIKE '%".$zoek."%' AND f.id = fa.filmnummer AND fa.acteurnummer = a.acteurnummer GROUP BY a.acteurnummer");	
				while($res2 = mysqli_fetch_array($result2)) {         
		            echo "<table>";
					echo "<tr>";
		            echo "<td>".$res2['titel']."</td>";
		            echo "<td>".$res2['leeftijdscategorienummer']."</td>";
		            echo "<td><a href=".$res2['imdblink'].">imdb</a></td>";
					echo "<td>".$res2['acteurvoornaam']."</td>";
					echo "<td>".$res2['acteurachternaam']."</td>";
					echo "<td>".$res2['acteurnummer']."</td>";
					echo "</table>";        
		        }
				echo $controllerow2;
		}else {
			echo "doet het niet ";
			echo $result2." ";
			echo $zoek;
		}	
			
			

    	
        echo "<br/><a href='gegevens.php'>Terug naar homepage</a>";	
    }
}
?>
</body>
</html>
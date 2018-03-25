<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
include_once("includes/db_connect.php");
 
if(isset($_POST['Submit'])) {    
    $titel = $_POST['titel'];
    $ln = $_POST['leeftijdscategorienummer'];
	//$lc = $_POST['leeftijdscategorie'];
	$link = $_POST['imdblink'];
	$aa = $_POST['acteurachternaam'];
	$av = $_POST['acteurvoornaam'];
	$ra = $_POST['regisseurachternaam'];
	$rv = $_POST['regisseurvoornaam'];
	$genren = $_POST['genrenaam'];
	$waarschuwing = $_POST['waarschuwingsnummer'];
      
    // checking empty fields
    if(empty($titel) || empty($ln)/* || empty($lc)*/ || empty($link) || empty($aa) || empty($av) || empty($ra) || empty($rv) || empty($genren)) {                
        if(empty($titel)) {
            echo "<font color='red'>Titel field is empty.</font><br/>";
        }
        if(empty($ln)) {
            echo "<font color='red'>Leeftijdscategorienummer field is empty.</font><br/>";
        }
		/*if(empty($lc)) {
			echo "<font color='red'>Leeftijdscategorie field is empty.</font><br/>";
		}*/
		if(empty($link)) {
            echo "<font color='red'>imdblink field is empty.</font><br/>";
        }
		if(empty($aa)) {
            echo "<font color='red'>Achternaam Acteur field is empty.</font><br/>";
        }
		if(empty($av)) {
            echo "<font color='red'>Voornaam Acteur field is empty.</font><br/>";
        }
		if(empty($ra)) {
            echo "<font color='red'>Achternaam regisseur field is empty.</font><br/>";
        }
		if(empty($rv)) {
            echo "<font color='red'>Voornaam regisseur field is empty.</font><br/>";
        }
		if(empty($genren)) {
            echo "<font color='red'>Genre field is empty.</font><br/>";
        }
		/*if(empty($waarschuwing)) {
            echo "<font color='red'>Waarschuwing field is empty.</font><br/>";
        }*/
	
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		 
		$controlle=mysqli_query($mysqli,"select * from film where titel='$titel'");
    	$controllerows=mysqli_num_rows($controlle);
		
		if($controllerows>0) {
      		echo "film exists";
   		} else {
 
        	$a = mysqli_query($mysqli, "INSERT IGNORE INTO film(titel,leeftijdscategorienummer,imdblink) VALUES('$titel','$ln','$link')");
			//printf ("New Record has id %d.\n", $mysqli->insert_id);
			$idfilm = $mysqli->insert_id;
			echo "film" .$idfilm;
   		}
   		    
		$controlle=mysqli_query($mysqli,"select * from acteur where acteurachternaam='$aa' and acteurvoornaam='$av'");
    	$controllerows=mysqli_num_rows($controlle);
		
		if($controllerows>0) {
      		echo "acteur exists";
   		} else {
			$b = mysqli_query($mysqli, "INSERT IGNORE INTO acteur(acteurvoornaam,acteurachternaam) VALUES('$av','$aa')");
			//printf ("New Record has id %d.\n", $mysqli->insert_id);		
			$idacteur = $mysqli->insert_id;
			echo "acteur " .$idacteur;	
   		}		
   		
		$controlle=mysqli_query($mysqli,"select * from regisseur where regisseurachternaam='$ra' and regisseurvoornaam='$rv'");
    	$controllerows=mysqli_num_rows($controlle);
		
		if($controllerows>0) {
      		echo "regisseur exists";
   		} else {
        	$c = mysqli_query($mysqli, "INSERT INTO regisseur(regisseurvoornaam,regisseurachternaam) VALUES('$rv','$ra')");
			//printf ("New Record has id %d.\n", $mysqli->insert_id);	
			$idregisseur = $mysqli->insert_id;
			echo "regisseur " .$idregisseur;
   		}
   			
		$controlle=mysqli_query($mysqli,"select * from genre where genrenaam='$genren'");
    	$controllerows=mysqli_num_rows($controlle);
		
		if($controllerows>0) {
      		echo "genre exists";
   		} else {
			$d = mysqli_query($mysqli, "INSERT INTO genre(genrenaam) VALUES('$genren')");
			printf ("New Record has id %d.\n", $mysqli->insert_id);
			$idgenre = $mysqli->insert_id;
			echo "genre " .$idgenre;
   		}
   			
   		$controlle=mysqli_query($mysqli,"select * from filmgenre where filmnummer='$idfilm' and genrenummer='$idgenre'");
    	$controllerows=mysqli_num_rows($controlle);
		
   		if($controllerows>0) {
      		echo "genre exists";
   		} else {
			$e = mysqli_query($mysqli, "INSERT INTO filmwaarschuwing(waarschuwingsnummer,filmnummer) VALUES('$waarschuwing','$idfilm')");		
			printf ("New Record has id %d.\n", $mysqli->insert_id);
   		}
   		
   		$controlle=mysqli_query($mysqli,"select * from filmacteur where filmnummer='$idfilm' and acteurnummer='$idacteur'");
    	$controllerows=mysqli_num_rows($controlle);
		
   		if($controllerows>0) {
      		echo "genre exists";
   		} else {
			$f = mysqli_query($mysqli, "INSERT INTO filmacteur(filmnummer,acteurnummer) VALUES('$idfilm','$idacteur')");
			printf ("New Record has id %d.\n", $mysqli->insert_id);
   		}
   		
   		$controlle=mysqli_query($mysqli,"select * from filmregisseur where filmnummer='$idfilm' and regisseurnummer='$idregisseur'");
    	$controllerows=mysqli_num_rows($controlle);
		
   		if($controllerows>0) {
      		echo "genre exists";
   		} else {
			$g = mysqli_query($mysqli, "INSERT INTO filmregisseur(filmnummer,regisseurnummer) VALUES('$idfilm','$idregisseur')");
			printf ("New Record has id %d.\n", $mysqli->insert_id);
   		}
   		
     	$controlle=mysqli_query($mysqli,"select * from filmgenre where filmnummer='$idfilm' and genrenummer='$idgenre'");
    	$controllerows=mysqli_num_rows($controlle);
		
   		if($controllerows>0) {
      		echo "genre exists";
   		} else {
			$h = mysqli_query($mysqli, "INSERT INTO filmgenre(filmnummer,genrenummer) VALUES('$idfilm','$idgenre')");
			printf ("New Record has id %d.\n", $mysqli->insert_id);
   		}
   		

			
		//display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='gegevens.php'>View Result</a>";
    }
}
?>
</body>
</html>
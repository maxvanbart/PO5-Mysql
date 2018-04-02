<?php
include_once("includes/db_connect.php");
include_once 'includes/functions.php';
sec_session_start();
?>

<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php if (login_check($mysqli) == true) : ?>
<?php
 
if(isset($_POST['Submit'])) {    
    $titel = $_POST['titel'];
    $ln = $_POST['leeftijdscategorienummer'];
	$link = $_POST['imdblink'];
	
        
    // checking empty fields
    if(empty($titel) || empty($ln) || empty($link)) {                
        if(empty($titel)) {
            echo "<font color='red'>Titel field is empty.</font><br/>";
        }
        
        if(empty($ln)) {
            echo "<font color='red'>Leeftijdscategorienummer field is empty.</font><br/>";
        }
        if(empty($link)) {
            echo "<font color='red'>imdblink field is empty.</font><br/>";
        }
		
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
		$controlle=mysqli_query($mysqli,"select * from film where titel='$titel'");
    	$controllerows=mysqli_num_rows($controlle);
		
		if($controllerows>0) {
      		echo "film exists";
   		} else {
        	$a = mysqli_query($mysqli, "INSERT INTO film(titel,leeftijdscategorienummer,imdblink) VALUES('$titel','$ln','$link')");
			//display success message
	        echo "<font color='green'>Data added successfully.";
			echo "<br/><a href='gegevens.php'>View Result</a>";
			//printf ("New Record has id %d.\n", $mysqli->insert_id);
			$idnummer = $mysqli->insert_id;
			echo $idnummer;
			
   		}		


    }
}
?>
<?php else : ?>
     <p>
         <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
     </p>
<?php endif; ?>
</body>
</html>
<?php
// including the database connection file
include_once("includes/db_connect.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $titel=$_POST['titel'];
    $lc=$_POST['leeftijdscategorienummer'];
	$link=$_POST['imdblink'];    
    
    // checking empty fields
    if(empty($titel) || empty($lc) || empty($link)) {            
        if(empty($titel)) {
            echo "<font color='red'>Titel field is empty.</font><br/>";
        }
   
        if(empty($lc)) {
            echo "<font color='red'>Leeftijdscategorienummer field is empty.</font><br/>";
        }
        if(empty($link)) {
            echo "<font color='red'>imdblink field is empty.</font><br/>";
        }            
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE film SET titel = '$titel', leeftijdscategorienummer = '$lc', imdblink = '$link' WHERE id = ".$id);
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../gegevens.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM film WHERE id = $id");
 
while($res = mysqli_fetch_array($result))
{
    $titel = $res['titel'];
    $lc = $res['leeftijdscategorienummer'];
	$link = $res['imdblink'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../gegevens.php">Home</a>
    <br/><br/>
	
    <form name="form1" method="post" action="filmedit.php">
        <table border="0">
            <tr> 
                <td>Titel</td>
                <td><input type="text" name="titel" value="<?php echo $titel;?>"></td>
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
                <td><input type="text" name="imdblink" value="<?php echo $link;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
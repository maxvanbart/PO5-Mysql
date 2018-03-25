<?php
// including the database connection file
include_once("includes/db_connect.php");
 
if(isset($_POST['update']))
{    
    $gn = $_POST['genrenummer'];
    
    $ge=$_POST['genre'];
    
    // checking empty fields
    if(empty($ge)) {            
        if(empty($ge)) {
            echo "<font color='red'>Genre field is empty.</font><br/>";
        }
        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE genre SET genre='$ge' WHERE genrenummer=$gn");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: gegevens.php");
    }
}
?>
<?php
//getting id from url
$gn = $_GET['gn'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM genre WHERE genrenummer=$gn");
 
while($res = mysqli_fetch_array($result))
{
    $ge = $res['genre'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="gegevens.php">Home</a>
    <br/><br/>
	
	
    <form name="form1" method="post" action="genreedit.php">
        <table border="0">
            <tr> 
                <td>Genre</td>
                <td><input type="text" name="genre" value="<?php echo $ge;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="genrenummer" value=<?php echo $_GET['gn'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
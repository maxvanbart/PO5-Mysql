<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Homepage</title>
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
        <link rel="stylesheet" type="text/css" href="css/supreme.css" />
    </head>
    <body>
		<?php include "includes/header.php"?>
		<?php include "includes/menu.php"?>
			<!--<img class="center" src="Image/image-1.png" alt="picture"/>-->

        <?php if (login_check($mysqli) == true) : ?>
            <div id="main_M">
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
			<br>
			<br>
			<?php
			if ($result = $mysqli->query("SELECT titel FROM film")) {
			
			    /* determine number of rows result set */
			    $row_cnt = $result->num_rows;
			
			    printf("film heeft %d bestanden.\n", $row_cnt);
			
			    /* close result set */
			    $result->close();
			}
			?>
			<br>
			<?php
			if ($result = $mysqli->query("SELECT acteurnummer FROM acteur")) {
			
			    /* determine number of rows result set */
			    $row_cnt = $result->num_rows;
			
			    printf("acteur heeft %d bestanden.\n", $row_cnt);
			
			    /* close result set */
			    $result->close();
			}
			?>
			<br>
			<?php
			if ($result = $mysqli->query("SELECT regisseurnummer FROM regisseur")) {
			
			    /* determine number of rows result set */
			    $row_cnt = $result->num_rows;
			
			    printf("regisseur heeft %d bestanden.\n", $row_cnt);
			
			    /* close result set */
			    $result->close();
			}
			?>
			<br>
			<?php
			if ($result = $mysqli->query("SELECT genrenummer FROM genre")) {
			
			    /* determine number of rows result set */
			    $row_cnt = $result->num_rows;
			
			    printf("genre heeft %d bestanden.\n", $row_cnt);
			
			    /* close result set */
			    $result->close();
			}
			?>
			<br>
			<br>
			<br>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
        </div>
    </body>
</html>
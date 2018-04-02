<ul class="menu">
 <li><a href="homepage.php"><span>Home</span></a></li>
 <li><a href="gegevens.php"><span>Gegevens</span></a></li>
 <li><a href="zoekmachine.php"><span>Zoekmachine</span></a></li>
 <?php if ($row10 > 0): ?>
	<li><a href="gebruikers.php"><span>Gebruikers</span></a></li>
 <?php else : ?>
	<p></p>
 <?php endif; ?>
 <li style="float:right"><a href="includes/logout.php"><span>Log out</span></a></li>
</ul>
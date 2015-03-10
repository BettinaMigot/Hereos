<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Heroes</title>
	<link href="view/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    	<header>
	    	<nav>
				<a href='index.php'>Heroes</a> 		
	    	</nav>
	    	<div id="session">
		    	<?php
		    		if (isset($_SESSION['login']) ) {
						echo '<p>Bonjour '.$_SESSION['login'].' ! <a href="?action=disconnect">(se déconnecter)</a></p>';
		    		}
		    	?>
	    	</div>
	    	
    	</header>
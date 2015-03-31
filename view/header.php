<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Heroes</title>
		<link href="view/style.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Sigmar+One|Chewy' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/foundation.css" />
    	<script src="js/vendor/modernizr.js"></script>

		<!--SCRIPTS-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
		<!--Slider-in icons-->
		<script type="text/javascript">
			$(document).ready(function() {
				$(".username").focus(function() {
				$(".user-icon").css("left","-48px");
				});
				$(".username").blur(function() {
				$(".user-icon").css("left","0px");
				});

				$(".password").focus(function() {
				$(".pass-icon").css("left","-48px");
				});
				$(".password").blur(function() {
				$(".pass-icon").css("left","0px");
				});
			});
		</script>
    </head>
        
    <body>
    	<header>
	    	<nav>
				<a href='index.php'>HeroeS</a> 		
	    	</nav>
	    	<div id="session">
		    	<?php
		    		if (isset($_SESSION['login']) ) {
						echo '<p>Bonjour '.$_SESSION['login'].' ! <a href="?action=disconnect">(se déconnecter)</a></p>';
		    		}
		    	?>
	    	</div>
	    	
    	</header>
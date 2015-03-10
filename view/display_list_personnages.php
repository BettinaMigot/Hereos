<?php 

	global $persos;
	$persos = get_personnages();
?>

<div class="liste_personnages">
<h2>Liste des personnages</h2>

<?php 
	foreach($persos as $cle => $perso)
	{	
		echo "<div class='affichage_perso'>";
		foreach($perso as $cle2 => $perso2)
		{	
			echo $cle2." : ".$perso2."<br />";
		}
		echo "</div>";	
	}
 ?>
	
</div>
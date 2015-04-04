<?php 

	global $persos;
	$persos = get_personnages_claasement_xp();
?>

<div class="liste_personnages">
<h3>Classement par xp</h3>

<?php 
	$num=1;
	foreach($persos as $cle => $perso)
	{	
			echo $num.") " ;
			
			echo $perso['name']. " : "  ;
			echo $perso['xp']. " xp" ;
			$num=$num+1;
		echo  "<br />";	
	}
 ?>
	
</div>
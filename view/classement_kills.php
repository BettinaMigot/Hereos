<?php 

	global $persos;
	$persos = get_personnages_claasement_kill();
?>

<div class="liste_personnages">
<h3>Classement par kill</h3>

<?php 
	$num=1;
	foreach($persos as $cle => $perso)
	{	
			echo $num.") " ;
			
			echo $perso['name']. " : "  ;
			echo $perso['kills']. "kills" ;
			$num=$num+1;
		echo  "<br />";	
	}
 ?>
	
</div>
</div>
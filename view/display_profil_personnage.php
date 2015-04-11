<?php 
echo "<div class='row'>";
echo "<h2>Bienvenue sur la page de profil de ton personnage !</h2>";

echo "<hr>"; /******************************************/

echo "<p>Nom de ton perso : ".$monPerso['name']."</p>";
echo "<p>Ton niveau : ".$monPerso['lvl']."</p>";
echo "<p>Ton xp : ".$monPerso['xp']."</p>";
echo "<a href='index.php?action=remove_pers'>Supprimer personnage</a>";

echo "<hr>"; /******************************************/

echo "<h3>Tes pouvoirs</h3>";
echo "<ul>";
foreach ($mesPouvoirs as $cle => $pouvoir) {
	echo "<li>"
	.$pouvoir['nom_pouvoir']
	." air(".$pouvoir['air'].") "
	." feu(".$pouvoir['feu'].") "
	." terre(".$pouvoir['terre'].") "
	." foudre(".$pouvoir['foudre'].") "
	." eau(".$pouvoir['eau'].") "
	."</li>";
}
echo "</ul>";

echo "<hr>"; /******************************************/

echo "<h3>Personnages que tu peux attaquer (même level)</h3>";
echo "<ul>";
foreach ($mesEnnemis as $cle => $ennemi) {
            // On affiche l'ennemi que si ce n'est pas notre propre perso.
            if ($ennemi['id_personnage'] != $monPerso['id_personnage']) {
               if ($ennemi['farm'] == 0) {               
                echo "<li>".$cle." : ".$ennemi['name']." <i> - \"".$ennemi['description']."\"</i></li>";
                echo"<a href='index.php?action=combat&amp;enemie=".$ennemi['user_id_user']."'>combat </a>";
                }
                else
                {
                	incremente_farm($ennemi['user_id_user']);
                	if ($ennemi['farm'] >= 3) {
                	reinitialise_farm($ennemi['user_id_user']);	
                	}
                }	
                
            }            
        }
echo "</ul>";

echo "<hr>"; /******************************************/

echo "<h3>Tes quêtes</h3>";

echo "<ul>";

	
if($monPerso['quete_id_quete'] != NULL && $diff_date <  $currentQuest[0]["temps"]) {
	$temps_restant = $currentQuest[0]["temps"] - $diff_date;
	echo "Vous êtes en train de faire la quête <b> \" " .$currentQuest[0]["nom"] . 
	    " \"</b>, vous pourrez effectuer une autre quête dans " . $temps_restant . " minutes.";
}


else {
	foreach ($mesQuests as $cle => $quete) {
		echo "<li>"
		."<a href='index.php?action=do_quest&id_quete=".$quete['id_quete']."'> <b>".$quete['nom']." - </b> </a>"
		." XP:".$quete['xp']
		." - Description : ".$quete['description']
		."</li>";
	}
}
echo "</ul>";

echo "<hr>"; /******************************************/

/**Classement par xp **/
?>
	<div class="liste_personnages">
		<h3>Classement par xp</h3>

		<?php 
			foreach($ennemisXpRank as $cle => $perso)
			{	
				echo ($cle+1).") " ;					
				echo $perso['name']. " : "  ;
				echo $perso['xp']. " xp" ;
				echo  "<br />";	
			}
		 ?>			
	</div>
<?php 

echo "<hr>"; /******************************************/

/**Classement par kill **/
?>
	<div class="liste_personnages">
		<h3>Classement par kill</h3>
		<?php 
			foreach($ennemisKillsRank as $cle => $perso)
			{	
				echo ($cle+1).") " ;					
				echo $perso['name']. " : "  ;
				echo $perso['kills']. "kills" ;
				echo  "<br />";	
			}
		 ?>
	</div>
<?php 
echo "<hr>"; /******************************************/

echo "</div>";


?>
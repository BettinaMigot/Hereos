<?php 


echo "<h2>Bienvenue sur la page de profil de ton personnage !</h2>";

echo "<hr>"; /******************************************/

echo "<p>Nom de ton perso : ".$monPerso['name']."</p>";
echo "<p>Ton niveau : ".$monPerso['lvl']."</p>";


echo "<hr>"; /******************************************/

echo "<h3>Liste de tes pouvoirs</h3>";
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

echo "<h3>Liste des personnages que tu peux attaquer : (même level)</h3>";
echo "<ul>";
foreach ($mesEnnemis as $cle => $ennemi) {
            // On affiche l'ennemi que si ce n'est pas notre propre perso.
            if ($ennemi['id_personnage'] != $monPerso['id_personnage'] ) {
                echo "<a href='index.php?action=combat;enemie=".$ennemi['id_personnage']."'> <li>".$cle." : ".$ennemi['name']." <i>".$ennemi['description']."</i></a></li>";
                
            }            
        }
echo "</ul>";

echo "<hr>"; /******************************************/

echo "<ul>";
foreach ($mesQuests as $cle => $quete) {
	echo "<li>"
	."<b>".$quete['nom']." - </b>"
	." XP:".$quete['xp']
	." - Description : ".$quete['description']
	."</li>";
}
echo "</ul>";

echo "<hr>"; /******************************************/

?>
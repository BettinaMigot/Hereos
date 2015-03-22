<?php 


echo "<h2>Bienvenue sur la page de profil de ton personnage !</h2>";

echo "<hr>"; /******************************************/

echo "<p>Nom de ton perso : ".$monPerso['name']."</p>";
echo "<p>Ton niveau : ".$monPerso['lvl']."</p>";
echo "<a href='index.php?action=remove_pers'>Supprimer personnage</a>";

echo "<hr>"; /******************************************/

echo "<h3>Liste des personnages que tu peux attaquer : (même level)</h3>";
echo "<ul>";
foreach ($mesEnnemis as $cle => $ennemi) {
            // On affiche l'ennemi que si ce n'est pas notre propre perso.
            if ($ennemi['id_personnage'] != $monPerso['id_personnage'] ) {
                echo "<li>".$cle." : ".$ennemi['name']." <i>".$ennemi['description']."</i></li>";    
            }            
        }
echo "</ul>";

echo "<hr>"; /******************************************/

?>
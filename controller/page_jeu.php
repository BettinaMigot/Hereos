<?php

include_once('model/personnages.php');
include_once('model/pouvoirs.php');
include_once('model/quests.php');
include_once('model/combat.php');
if (isset($_GET['action'])) {$action = $_GET['action'];}
else{$action = null;}
if (isset($_GET['id'])) {$id = $_GET['id'];}
else{$id = null;}

switch ($action) {
    
    case'create_pers':
    	creation_personnage();
    	break;
	case'remove_pers':
        remove_personnage($_SESSION['id']);
        header('Location: index.php');
        break;
    case'create_pouvoir':
    	$success = creation_pouvoir();
        if ($success==1) {
        header('Location: index.php');
        }
        else{echo "Vous n'avez pas mis 15 points par pouvoirs.";}
    	break;
    case 'disconnect':
    	include_once('model/users.php');
    	disconnect_user();
    	break; 
    case 'combat':
        combat_jcj();
        break;     
    case null:
        
        break;
}


 
include_once('view/header.php');

charger_personnage();

//include_once('view/display_list_personnages.php');

include_once('view/footer.php');

//Si l'user à déja un personnage et des pouvoirs : on affiche son profil
//Sinon affiche le formulaire de création de perso ou de création de pouvoirs
function charger_personnage(){
	$monPerso = get_personnages_by_userID($_SESSION['id']);
	if ( !empty($monPerso) )
    {
		$monPerso=$monPerso[0];
        $mesPouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($_SESSION['id'])) ;
        if (sizeof($mesPouvoirs)>=3)
        {   
            $mesEnnemis = get_personnages_by_lvl($monPerso['lvl']);        
            $mesQuests = get_quests();
            var_dump($mesQuests);
            include_once('view/display_profil_personnage.php');
           
        }
        else
        {
            include_once('view/creation_pouvoir.php');
        }
	}	
	else
    {
        include_once('view/creation_personnage.php');
    }

}
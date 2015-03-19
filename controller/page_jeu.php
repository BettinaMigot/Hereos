<?php

include_once('model/personnages.php');
include_once('model/pouvoirs.php');
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
    case null:
        
        break;
}



include_once('view/header.php');

charger_personnage();
//include_once('view/display_list_personnages.php');

include_once('view/footer.php');

//Si l'user à déja un personnage: affiche le profil
//sinon affiche le formulaire de création de perso
function charger_personnage(){
	$monPerso = get_personnages_by_userID($_SESSION['id']);
	//var_dump($monPerso);
	if ( !empty($monPerso) ) {
		echo "Ton personnage s'appelle : ".$monPerso[0]['name'];
		echo "<br><a href='index.php?action=remove_pers'>Supprimer personnage</a>";
        
        $mesPouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($_SESSION['id'])) ;
        if (sizeof($mesPouvoirs)==3) {
            echo "Il faudra afficher les pouvoirs ici";
        }
        else{
            include_once('view/creation_pouvoir.php');
        }

	}	
	else{ include_once('view/creation_personnage.php');	}

}
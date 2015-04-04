<?php

include_once('model/personnages.php');
include_once('model/pouvoirs.php');
include_once('model/quests.php');
if (isset($_GET['action'])) {$action = $_GET['action'];}
else{$action = null;}
if (isset($_GET['id'])) {$id = $_GET['id'];}
else{$id = null;}
if (isset($_GET['id_quete'])) {$id_quete = $_GET['id_quete'];}
else{$id_quete = null;}


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

    case 'do_quest':
        do_quest($id_quete);
        header('Location: index.php');
        break;
    case 'combat':
        if (isset($_GET['enemie'])) {$ennemi = $_GET['enemie'];}
        else{$ennemi = null;}
        combat_jcj($_SESSION['id'],$ennemi);
        /*header('Location: index.php');*/
        
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
    $diff_date = -1;

	$monPerso = get_personnages_by_userID($_SESSION['id']);
	if ( !empty($monPerso) )
    {
		$monPerso=$monPerso[0];
        $mesPouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($_SESSION['id'])) ;
        if (sizeof($mesPouvoirs)>=3)
        {   
            $mesEnnemis = get_personnages_by_lvl($monPerso['lvl']);        
            $mesQuests = get_quests();

            $currentQuest = get_current_quest($monPerso['quete_id_quete']); 

            if ($monPerso['quete_id_quete'] != NULL) {
                $current_date = date('Y-m-d h:i:s a', time());
                $beggining_quest = date('Y-m-d h:i:s a',$monPerso['beggining_quest']);

                $to_time = strtotime($current_date);
                $from_time = strtotime($beggining_quest);
                $diff_date =  round(abs($to_time - $from_time) / 60,2);

                if($diff_date >=  $currentQuest[0]["temps"]) {
                    update_quest($monPerso,$currentQuest);
                }
            }
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
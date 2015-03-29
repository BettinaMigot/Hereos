<?php 

function get_quests(){
	global $bdd;

    $req = $bdd->prepare("SELECT * FROM (
    						SELECT * FROM quete WHERE xp = 100 ORDER BY RAND() LIMIT 1
    					) T1
    					UNION
    					SELECT * FROM (
    						SELECT * FROM quete WHERE xp = 5 ORDER BY RAND() LIMIT 1
    					) T2
   						UNION
    					SELECT * FROM (
    						SELECT * FROM quete WHERE xp = 50 ORDER BY RAND() LIMIT 1
    					) T3
    			
    					");
    $req->execute();

    $return = $req->fetchAll(PDO::FETCH_ASSOC);
    return $return;
}

function get_current_quest($id_current_quest){
	global $bdd;

    $req = $bdd->prepare("SELECT * FROM quete WHERE id_quete = " . $id_current_quest);
    $req->execute();

    $return = $req->fetchAll(PDO::FETCH_ASSOC);
 	
    return $return;
}

function do_quest($id_quete){
	global $bdd;

    $req = $bdd->prepare("SELECT * FROM personnage WHERE user_id_user = ".$_SESSION['id']);
	$req->execute();

    $perso = $req->fetchAll(PDO::FETCH_ASSOC);

	$req = $bdd->prepare("UPDATE personnage SET quete_id_quete = $id_quete, beggining_quest = ". time() . " WHERE id_personnage = ". $perso[0]["id_personnage"]);
	$req->execute();
}


function update_quest($monPerso,$currentQuest) {
	global $bdd;

	print_r($currentQuest);


	$req = $bdd->prepare("UPDATE personnage SET quete_id_quete = NULL, beggining_quest = NULL, xp = xp + " . $currentQuest[0]['xp']." WHERE id_personnage = ". $monPerso["id_personnage"]);
	$req->execute();

}	


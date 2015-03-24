<?php 

function get_quests(){
	global $bdd;

    $req = $bdd->prepare('SELECT * FROM quete ');
    $req->execute();

    $return = $req->fetchAll(PDO::FETCH_ASSOC);
 	
    return $return;
}

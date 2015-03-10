<?php


function add_personnage( $nom, $description, $air, $feu, $terre, $eau, $foudre, $id_user){
	global $bdd;

	$req = $bdd->prepare('INSERT INTO personnage (name, xp, lvl, description, resist_Air, resist_Feu,
    resist_Terre, resist_Eau, resist_Foudre, status, quete_id_quete, user_id_user, event_id_event)
 	VALUES ( :nom, 0, 0, :description, :air, :feu, :terre, :eau, :foudre, "Gentil", NULL, :id_user, NULL)');
    $req->bindParam(':nom', $nom, PDO::PARAM_STR);
    $req->bindParam(':description', $descirption, PDO::PARAM_STR);
    $req->bindParam(':air', $air, PDO::PARAM_INT);
    $req->bindParam(':feu', $feu, PDO::PARAM_INT);
    $req->bindParam(':terre', $terre, PDO::PARAM_INT);
    $req->bindParam(':eau', $eau, PDO::PARAM_INT);
    $req->bindParam(':foudre', $foudre, PDO::PARAM_INT);
    $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $req->execute();
    $return = $req->fetchAll();
    return $return;
}

// Recupere tout les personnages
function get_personnages(){
	global $bdd;

    $req = $bdd->prepare('SELECT * FROM personnage');
    $req->execute();
    $return = $req->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function get_personnages_by_userID($id){
	global $bdd;
    $id = (int) $id;

    $req = $bdd->prepare('SELECT * FROM personnage WHERE user_id_user= :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $return = $req->fetchAll(PDO::FETCH_ASSOC);
    
    return $return;
}

//Supprime un par son id_user associé
function remove_personnage($id_user)
{
    global $bdd;

    $req = $bdd->prepare('DELETE FROM personnage WHERE user_id_user=:id_user');
    $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $req->execute();
    $return = $req->fetchAll();
    
    return $return;
}

function creation_personnage(){
	
	if (!empty($_POST["nom"])) {
		$air=0;$feu=0;$terre=0;$eau=0;$foudre=0;		
		switch ($_POST['resist1']) {
			case 'air':
				$air++;
				break;
			case 'feu':
				$feu++;
				break;
			case 'terre':
				$terre++;
				break;
			case 'eau':
				$eau++;
				break;
			case 'foudre':
				$foudre++;
				break;			
		}
		switch ($_POST['resist2']) {
			case 'air':
				$air++;
				break;
			case 'feu':
				$feu++;
				break;
			case 'terre':
				$terre++;
				break;
			case 'eau':
				$eau++;
				break;
			case 'foudre':
				$foudre++;
				break;			
		}
		switch ($_POST['resist3']) {
			case 'air':
				$air++;
				break;
			case 'feu':
				$feu++;
				break;
			case 'terre':
				$terre++;
				break;
			case 'eau':
				$eau++;
				break;
			case 'foudre':
				$foudre++;
				break;			
		}
		add_personnage( $_POST["nom"], $_POST['description'], $air, $feu, $terre, $eau, $foudre, $_SESSION['id']);
		header('Location: index.php');
	}
	else{
		echo "Veuillez remplir le formulaire.";
	}
}


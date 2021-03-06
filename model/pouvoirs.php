<?php


function add_pouvoir( $nom, $air, $feu, $terre, $eau, $foudre, $id_user){
	global $bdd;

	$req = $bdd->prepare('INSERT INTO pouvoir (nom_pouvoir, air, feu, terre, foudre, eau, personnage_id_personnage)
 	VALUES ( :nom, :air, :feu, :terre, :foudre, :eau, :id_user)');
    $req->bindParam(':nom', $nom, PDO::PARAM_STR);
    $req->bindParam(':air', $air, PDO::PARAM_INT);
    $req->bindParam(':feu', $feu, PDO::PARAM_INT);
    $req->bindParam(':terre', $terre, PDO::PARAM_INT);
    $req->bindParam(':foudre', $foudre, PDO::PARAM_INT);
    $req->bindParam(':eau', $eau, PDO::PARAM_INT);
    $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $req->execute();
    
    $return = $req->fetchAll();
    return $return;
}

function creation_pouvoir(){
    $sum1= $_POST["air1"]+$_POST["feu1"]+$_POST["terre1"]+$_POST["eau1"]+$_POST["foudre1"];
    $sum2= $_POST["air2"]+$_POST["feu2"]+$_POST["terre2"]+$_POST["eau2"]+$_POST["foudre2"];
    $sum3= $_POST["air3"]+$_POST["feu3"]+$_POST["terre3"]+$_POST["eau3"]+$_POST["foudre3"];
    $perso_id = get_personnageID_by_userID($_SESSION['id']);
    if ( ($sum1==15)&&($sum2==15)&&($sum3==15) ) {
        add_pouvoir( $_POST["nom1"], $_POST["air1"], $_POST["feu1"], $_POST["terre1"], $_POST["eau1"], $_POST["foudre1"], $perso_id );
        add_pouvoir( $_POST["nom2"], $_POST["air2"], $_POST["feu2"], $_POST["terre2"], $_POST["eau2"], $_POST["foudre2"], $perso_id );
        add_pouvoir( $_POST["nom3"], $_POST["air3"], $_POST["feu3"], $_POST["terre3"], $_POST["eau3"], $_POST["foudre3"], $perso_id );
        echo $sum1, $sum2, $sum3;
        return 1;
    }
    
    return 0;
}


function get_pouvoirs_by_PersoID($id){
    global $bdd;
    $id = (int) $id;

    $req = $bdd->prepare('SELECT * FROM pouvoir WHERE personnage_id_personnage = :id ');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    $return = $req->fetchAll(PDO::FETCH_ASSOC);
    return $return;
}

function remove_pouvoirs_by_PersoID($id)
{
    global $bdd;
    $id = (int) $id;

    $req = $bdd->prepare('DELETE FROM pouvoir WHERE personnage_id_personnage = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $return = $req->fetchAll();
    var_dump($req);
    return $return;
}

function combat_jcj($id,$ennemie){
    global $bdd;
    $id = (int) $id;
    $ennemie = (int) $ennemie;

    
    $mesPouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($id));
    $sesPouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($ennemie));
    $monPerso = get_personnages_by_userID($id);
    $sonPerso = get_personnages_by_userID($ennemie);


    if( !empty($sesPouvoirs) && !empty($mesPouvoirs) && !empty($monPerso) && !empty($sonPerso) ){
        $monScore=$mesPouvoirs[0]['feu']*$sonPerso[0]['resist_Feu']+$mesPouvoirs[0]['air']*$sonPerso[0]['resist_Air']+$mesPouvoirs[0]['terre']*$sonPerso[0]['resist_Terre']+$mesPouvoirs[0]['foudre']*$sonPerso[0]['resist_Foudre']+$mesPouvoirs[0]['eau']*$sonPerso[0]['resist_Eau'];
        $sonScore=$sesPouvoirs[0]['feu']*$monPerso[0]['resist_Feu']+$sesPouvoirs[0]['air']*$monPerso[0]['resist_Air']+$sesPouvoirs[0]['terre']*$monPerso[0]['resist_Terre']+$sesPouvoirs[0]['foudre']*$monPerso[0]['resist_Foudre']+$sesPouvoirs[0]['eau']*$monPerso[0]['resist_Eau'];

        if($monScore<=$sonScore){
            $req = $bdd->prepare("UPDATE personnage SET xp = xp + 10, kills= kills + 1  WHERE user_id_user = :id ");
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $req2 = $bdd->prepare("UPDATE personnage SET farm = farm +1  WHERE user_id_user = :ennemie ");
            $req2->bindParam(':ennemie', $ennemie, PDO::PARAM_INT);
            $req2->execute();
            echo "<script> alert('Gagné !') </script>";
            return 1;     
        }
        else{
            echo "<script> alert('Perdu !') </script>";
        }
    }
    else{
        echo "<script> alert('Tu ne peux pas attaquer ce perso !') </script>";
    }

    return 0;

}
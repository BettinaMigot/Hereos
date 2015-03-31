<?php

function combat_jcj($id,$ennemie){
    global $bdd;
    $id = (int) $id;
    $ennemie = (int) $ennemie;

    
    $mesPouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($id));
    $sesPouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($ennemie));
    $monPerso = get_personnages_by_userID($id);
    $sonPerso = get_personnages_by_userID($ennemie);

    $monScore=$mesPouvoirs[0]['feu']*$sonPerso[0]['resist_Feu']+$mesPouvoirs[0]['air']*$sonPerso[0]['resist_Air']+$mesPouvoirs[0]['terre']*$sonPerso[0]['resist_Terre']+$mesPouvoirs[0]['foudre']*$sonPerso[0]['resist_Foudre']+$mesPouvoirs[0]['eau']*$sonPerso[0]['resist_Eau'];
    $sonScore=$sesPouvoirs[0]['feu']*$monPerso[0]['resist_Feu']+$sesPouvoirs[0]['air']*$monPerso[0]['resist_Air']+$sesPouvoirs[0]['terre']*$monPerso[0]['resist_Terre']+$sesPouvoirs[0]['foudre']*$monPerso[0]['resist_Foudre']+$sesPouvoirs[0]['eau']*$monPerso[0]['resist_Eau'];

    
    if($monScore<=$sonScore){
        
        $req = $bdd->prepare("UPDATE personnage SET xp = xp + 10 WHERE user_id_user = :id ");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        echo '<script language="Javascript"> alert ("Vous avez gagné le combat :)") </script>';
        
    }else{
        $req = $bdd->prepare("UPDATE personnage SET xp = xp - 5 WHERE user_id_user = :id" );
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        echo '<script language="Javascript"> if(alert ("Vous avez perdu le combat :(")){
            document.location.href = localhost/Hereos_Jerome/index.php;
         } </script>';
    }




    /*
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $return = $req->fetchAll();*/
    


  
  /*  return $return ;*/
}


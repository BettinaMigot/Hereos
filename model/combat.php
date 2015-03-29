<?php

function combat_jcj(){
    $mesPouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($_SESSION['id'])) ;
    $enemiePouvoirs = get_pouvoirs_by_PersoID(get_personnageID_by_userID($_GET['enemie'])) ;
    $id=$_SESSION['id'];
    $test=$mesPouvoirs['air'] - $enemiePouvoirs['air'];
    if($test<0){
        
        $sql ="UPDATE personnage SET xp = 5 WHERE user_id_user=$id ";
    }else{
        $sql ="UPDATE personnage SET xp = 20 WHERE user_id_user=$id ";
    }
    if($test=0){
        $sql ="UPDATE personnage SET xp = 10 WHERE user_id_user=$id ";
    }
    return $test;

}


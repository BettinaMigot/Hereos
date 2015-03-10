<?php

include_once('model/users.php');
if (isset($_GET['action'])) {$action = $_GET['action'];}
else{$action = null;}

switch ($action) {

    case 'connect':
    	connect_user();
        break;
    case 'register':
    	register_user();
    	break;   
    case null:        
        break;
}


include_once('view/header.php');
include_once('view/connexion_form.php');
include_once('view/register_form.php');
display_users();
include_once('view/footer.php');







function display_users(){
	global $users;
	$users = get_users();

	foreach($users as $cle => $user)
	{	
	    $users[$cle]['id'] = htmlspecialchars($user['id_user']);
	    $users[$cle]['nom'] = htmlspecialchars($user['userName']);
	    $users[$cle]['pass'] = htmlspecialchars($user['password']);
	    $users[$cle]['level'] = htmlspecialchars($user['level']);
	}
	include_once('view/liste_user.php');
}
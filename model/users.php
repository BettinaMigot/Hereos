<?php



//Ajoute un utilisateur grâce à un nomn un mdp, et un lvl.
function add_user($login, $pass, $level)
{
    global $bdd;

    $req = $bdd->prepare('INSERT INTO user (userName, password, level) VALUES (:login, :pass, :level ) ');
    $req->bindParam(':login', $login, PDO::PARAM_STR);
    $req->bindParam(':pass', sha1($pass), PDO::PARAM_STR);
    $req->bindParam(':level', $level, PDO::PARAM_INT);
    $req->execute();
    $return = $req->fetchAll();
    
    return $return;
}

//Récupère un utilisateur par son ID
function get_user_by_id($id)
{
    global $bdd;
    $id = (int) $id;

    $req = $bdd->prepare('SELECT id_user, userName, password, level FROM user WHERE id_user= :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $return = $req->fetchAll();
    
    return $return;
}

//Récupère un utilisateur par son nom
function get_user_by_name($login)
{
    global $bdd;

    $req = $bdd->prepare('SELECT id_user, userName, password, level FROM user WHERE userName= :login');
    $req->bindParam(':login', $login, PDO::PARAM_STR);
    $req->execute();
    $return = $req->fetchAll();
    
    return $return;
}

//Récupère un utilisateur par son nom et son pass
function get_user($login, $pass)
{
    global $bdd;
    
    $req = $bdd->prepare('SELECT id_user, userName, password, level FROM user WHERE userName= :login AND password= :pass ');
    $req->bindParam(':login', $login, PDO::PARAM_STR);
    $req->bindParam(':pass', sha1($pass), PDO::PARAM_STR);
    $req->execute();
    $return = $req->fetchAll();
    
    return $return;
}

//Récupere tout les utilisateurs
function get_users()
{
    global $bdd;

    $req = $bdd->prepare('SELECT id_user, userName, password, level FROM user');
    $req->execute();
    $return = $req->fetchAll();

    return $return;

}


//Supprime un utilisateur par son id
function remove_user($id)  //NE MARCHE PAS
{
    global $bdd;

	$req = $bdd->prepare('DELETE FROM user WHERE id_user=:id');
	$req->bindParam(':id', $id, PDO::PARAM_INT);
	$req->execute();
	$return = $req->fetchAll();

	return $return;
}

//Supprime un utilisateur par son nom
function remove_user_by_name($login)
{
    global $bdd;

    $req = $bdd->prepare('DELETE FROM user WHERE userName=:login');
    $req->bindParam(':login', $login, PDO::PARAM_STR);
    $req->execute();
    $return = $req->fetchAll();
    
    return $return;
}

//On verifie si le login et le mdp ne sont pas null, et si le login n'est pas déja pris.
function register_user(){
	if ( !empty($_POST['login']) && !empty($_POST['pass']) ) {
		$test=get_user_by_name($_POST['login']) ;
        if (empty($test)){
			add_user($_POST['login'],$_POST['pass'],0);
			header('Location: index.php');
		}
		else{
			echo "Ce nom est déja pris";
		}
	}
	else{ echo "Veuillez entrer un nom et un mdp.";}
}


function connect_user(){
	if ( !empty($_POST['login']) && !empty($_POST['pass']) ) {	
		$user = get_user($_POST['login'],$_POST['pass']);
		if (!empty($user)) {
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['pass'] = $_POST['pass'];
			$_SESSION['id'] = $user[0]['id_user'];
			$_SESSION['logged'] = true;
			header('Location: index.php');
		}
		else{
			echo "utilisateur non reconnu";
		}		
	}
	else{echo "Veuillez entrer un nom et un mdp.";};
}


function disconnect_user(){
	// Suppression des variables de session et de la session
	$_SESSION = array();
	session_destroy();
	// Suppression des cookies de connexion automatique
	setcookie('login', '');
	setcookie('pass_hache', '');
	header('Location: index.php');
}
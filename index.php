<?php
session_start();
include_once('model/connexion_sql.php');

if ( isset($_SESSION['logged']) && $_SESSION['logged']==true )
{
	include_once('controller/page_jeu.php');
}
else{ include_once('controller/page_connexion.php'); }
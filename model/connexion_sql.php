<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=heroes2;charset=utf8', 'root', 'firetoon');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

<?php
$DB_serveur = '192.168.1.4:1530'; // Nom du serveur
$DB_utilisateur = 'u_movie2'; // Nom de l'utilisateur de la base
$DB_motdepasse = 'y2ML5k7i'; // Mot de passe pour accèder à la base
$DB_base = 'd_movie2'; // Nom de la base

$connection = mysql_connect($DB_serveur, $DB_utilisateur, $DB_motdepasse) // On se connecte au serveur
or die (mysql_error().' sur la ligne '.__LINE__);

mysql_select_db($DB_base, $connection) // On se connecte à la BDD
or die (mysql_error().' sur la ligne '.__LINE__);
?>
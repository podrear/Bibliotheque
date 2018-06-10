<?php
$user="root";
$pass="root";
try{
	$dbh = new PDO('mysql:host=localhost;port=8897;dbname=bibliotheque', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
 catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}



?>
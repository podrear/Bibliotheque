<?php
$user="root";
$pass="root";
try{
	$dbh = new PDO('mysql:host=localhost;port:8897;dbname=bibliotheque', 'root', 'root');


}
 catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>
<?php
function erreur($err='')
{
   $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
   
	exit('<div id="error"><p>'.$mess.'</p>
   <p>Cliquez <a href="Garde.php">ici</a> pour revenir à la page d\'accueil</p></div></div></body></html>');
}
?>
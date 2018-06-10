<?php 
include("bdh.php");
include("debut.php");


$var1 = "https://www.googleapis.com/books/v1/volumes?q=";
$var2 = urlencode($_POST['recherche']);
$str = str_replace(" ", "+", $var2);
$request= $var1.$str;

$response = file_get_contents($request);
$results = json_decode($response);

if($results->totalItems > 0){
	$i=0;
	$j=0;
	for($j=0;$j<15;$j++){
		for ($i=0;$i<11;$i++){
			$book = $results->items[$i];
			$infos['titre'] = $book->volumeInfo->title;
			$infos['auteur'] = $book->volumeInfo->authors[$j];
			$infos['publication'] = $book->volumeInfo->publishedDate;
			$infos['description'] =$book->volumeInfo->description;
			 $titre=$infos['titre'];
			$auteur=$infos['auteur'];
			$publication=$infos['publication'];
			$description=$infos['description'];
			if( isset($book->volumeInfo->imageLinks) ){
				$infos['image'] = str_replace('&edge=curl', '', $book->volumeInfo->imageLinks->smallThumbnail);
			}
			echo "<img src='" .$infos['image']."'/><br>";
			if ($titre==null){
				echo"<h2>Titre du livre : inconnu</h2>";
			}
			else{ 
				echo"<h2>Titre du livre : ".$infos['titre']."</h2><br>";
			}
			if ($auteur==null){
				echo"<h5>Auteur(s) du livre : inconnu</h5>";
			}
			else{
				echo"<h5>Auteur(s) du livre : ".$infos['auteur']."</h5><br>";
			}
			if($publication==null){
				echo"<h5>Date de publication : inconnue </h5>";
			}
			else{
				echo"<h5>Date de publication : ".$infos['publication']."</h5><br>";
			}
			if ($description==null){
				echo" <h5>Description :aucune description </h5>";
			}
			else{
				echo"<h5>Description : ".$infos['description']."</h5><br>";
			}
		}
	}
}
else{
   echo 'Livre introuvable';
}


?>
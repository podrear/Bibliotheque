<!DOCTYPE html>
<?php




include("bdh.php");
include("debut.php");

echo '<h1>Connexion</h1>';
//if ($id!=0) erreur(ERR_IS_CO);
if (!isset($_POST['pseudo'])) //On est dans la page de formulaire
{
  echo' <html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	</head>

	<body>
		<div class="col-4 text-center">
			<a class="blog-header-logo text-dark" href="#">Bibliotheque </a>
		</div>

	

		<form class="form-signin"  method="POST" Action="acceuil.php">
			<div class="text-center mb-4">
				<img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
			</div>
			<div class="from-label-group">
				<input type="text" name="pseudo" class="form-control" placeholder="pseudo" required autofocus>
				<label for="pseudo">Pseudo</label>
			</div>
			<div class="from-label-group">
				<input type="password" name="mdp" class="form-control" placeholder="Password" required>
				<label for="inputPassword">Password</label>
			</div>
			<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me">" Remember me"
				</label>
			</div>
			<button class="btn btn-lg btn-warning btn-block" type="submit">Se connecter</button>
		</form>



		<form class="form-signup">
			<a href="register.php"><button class="btn btn-lg btn-warning btn-block">S\'inscrire</button></a>
		</form>

		
					<a href="#" class="btn btn-warning">En savoir plus !</a>
				</div>
			</div>
		</div>
	</body>
</html>

';}
else
{ //$id=$_SESSION['id'];
    //$message='';
//echo $_POST['pseudo'];
	session_start();
    if (!isset ($_POST['mdp'])){ 
         $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="Garde.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
     if ($data=isconnect($_POST['mdp'],$_POST['pseudo'],$dbh)){
	    $_SESSION['pseudo'] = $data['pseudo'];
	    $message = '<p>Bienvenue '.$data['pseudo'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez 
			pour revenir à la page d accueil</p>';  
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="Garde.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="Garde.php">ici</a> 
	    pour revenir à la page d accueil</p>';
	}
    
    
    echo $message.'</div></body></html>';
}
}
function isconnect($mdp,$pseudo,$dbh){
	$back=false;
	$query=$dbh->prepare('SELECT pseudo,mail,mdp
    FROM utilisateur WHERE pseudo = :pseudo');
    $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
    $query->execute();
    $data=$query->fetch();
	if ($data['mdp'] == md5($mdp)){ // Acces OK !
		$back= $data;
	}
	else {
		$back=false; 
	}
	$query->CloseCursor();
	return $back;
}


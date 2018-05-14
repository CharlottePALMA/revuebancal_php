<?php

//on cree une focntion qui prend en parametre une date au format informatique, et qui nous donne la date au format européen
//si la date est vide elle nous donne 'n.c.'
//on eut lui donner un deuxieme parametre (qui vaudra vrai) si on souhaite avoir l'heure en plus de la date

//Exemple : dateEU('2014-02-15') -> 15/02/2015
//Exemple : dateEU('2014-02-15 08:00:30') -> 15/02/2014
//Exemple : dateEU('2014-02-15 08:00:30', true) -> 15/02/2014 08:00
function dateEU($input, $hour = false){
	//si la date est vide on retourne n.c.
	if(empty($input)){
		return 'n.c.';
	}else{
		//on cree un objet de temps
		$time = new DateTime($input);

		//si on souhaite avoir l'heure
		if ($hour) {
			return $time->format('d/m/Y h:i');
		}else{
			//on retourne n=un format qui nous intéresse (regardé doc php)
			return $time->format('d/m/Y');
		}
	}
}


//on cree une fonction qui redirige l'utilisateur et arrete l'execution de la page
function redirect($page){
	//redirection
	header('Location: '.$page);
	//on bloque le reste des executions
	exit();
}



//on cree une fonction qui crypte une chaine de caractères
function cryptPassword($string){
	//on crypte une premiere fois avec le mode SHA512
	$first = hash('sha512', $string);

	//on ajoute un salt 
	$first = $first.'VJG256VE';

	//On recrypte
	$final = hash('sha512', $first);

	return	$final;
}

/* on crree une fonction qui permet d'enregistrer un message en memoire, elle prend deux paramètre : 
$types qui correspond au type de message : ex : 'error' u 'success'
$message, le message a écrire */
function flash_in($type, $message){
	//si la case du type n'existe pas, on la cree
	if(empty( $_SESSION['message'][$type]))
		$_SESSION['message'][$type] = [];
	//on met le message dans la case à la suite des autres
	array_push($_SESSION['message'][$type], $message);
}

/*flash_out ecrit tous les messages en attente, puis les efface de la mémoire */
function flash_out(){
	if(!empty($_SESSION['message']))
		foreach ($_SESSION['message'] as $key => $value) {
			foreach ($value as $message) {
				echo '<p class="alert alert-'.$key.'">'.$message.'</p>';
			}
		}

	$_SESSION['message'] = [];
}



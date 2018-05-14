<?php 

//on importe le fichier setting
include('../config/settings.php');

//si on n'a pas reçu de formulaire 
if(empty($_POST))
	//on redirige vers l'index
	redirect('../back/login.php');
//sinon (on a reçu des donnes)
else{
	
$error = false;

	//si le email est vide
	if(empty($_POST['email'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'email est obligatoire");
		}
    
    //fin de si
    }


	//si on a vu au moins une erreur
	if($error)
		//on redirige vers le formulaire
		redirect('../index.php');
	//sinon 
	else{
        
       	//on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO newsletter (created, email) VALUES (NOW(), :e)');

		//on ajoute les données du formulaire
		$add->bindParam(':e', $_POST['email'], PDO::PARAM_STR);
        
		//on execute la requete
		$add->execute();	
        

		//on redirige vers la page de confirmation d'inscription
		redirect('../form_envoyeN.php');
	
    //fin du sinon
	}

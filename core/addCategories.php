<?php 

//on importe le fichier setting
include('../config/settings.php');

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('../back/login.php');
}

//si on n'a pas reçu de formulaire 
if(empty($_POST))
	//on redirige vers le formulire
	redirect('../back/nouvel_categorie.php');
//sinon (on a reçu des donnés)
else{
	
$error = false;

	//si le nom de la categorie est vide
	if(empty($_POST['nom_categorie'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le nom de la categorie est obligatoire');
	}

	
    //fin de si
    }
    

	//si on a vu au moins une erreur
	if($error)
		//on redirige vers le formulaire
		redirect('../back/nouvel_categorie.php');
	//sinon 
	else{ 
                
        
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO categories (created, updated, nom_categorie) VALUES (NOW(), NOW(), :n)');

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom_categorie'], PDO::PARAM_STR);
		      
		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "La categorie a été ajouté");

		//on redirige vers la page liste des categories
		redirect('../back/page_liste_categories.php');
	
    //fin du sinon
	}

<?php 

//on importe le fichier setting
include('../config/settings.php');

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('../back/login.php');
}

//si on n'a pas reçu de formulaire 
if(empty($_POST) || (empty($_POST['id'])))
	//on redirige vers le formulire
	redirect('../back/index.php');
//sinon (on a reçu des donnes)
else{
$error = false;


    //on enleve tous les espaces au début ou a la fin des champs
	$_POST = array_map("trim", $_POST);


	//si le titre est vide
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
		redirect('../back/updateCategories.php?id='.$_POST['id']);
	//sinon 
	else{
            
    
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('UPDATE categories SET updated = NOW(), nom_categorie = :n WHERE id_categorie = :i');

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom_categorie'], PDO::PARAM_STR);
		$add->bindParam(':i', $_POST['id'], PDO::PARAM_INT);
		
        
		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "Le nom de la catégorie a été modifié");

		//on redirige vers la liste des catégories
		redirect('../back/page_liste_categories.php');
	
    //fin du sinon
	}

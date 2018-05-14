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
	redirect('../back/social.php');
//sinon (on a reçu des donnes)
else{
$error = false;


    //on enleve tous les espaces au début ou a la fin des champs
    //ou : permet d'appliquer la fontion a tous les champs
	$_POST = array_map("trim", $_POST);


	//si le titre est vide
	if(empty($_POST['network'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le nom du réseau est obligatoire');
	}

	//si le contenu est vide
	if(empty($_POST['link'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le lien est obligatoire');
		}
    
    
    
    //fin de si
    }
    
    
	//si on a vu au moins une erreur
	if($error)
		//on redirige vers le formulaire
		redirect('../back/nouveau_reseau.php');
	//sinon 
	else{
        
       
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('UPDATE social SET updated = NOW(), network = :n, link = :l WHERE id = :i');

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['network'], PDO::PARAM_STR);
		$add->bindParam(':l', $_POST['link'], PDO::PARAM_STR);
		$add->bindParam(':i', $_POST['id'], PDO::PARAM_INT);


        
		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "Le réseau social a été modifié");

		//on redirige vers le reseaux social modifié
		redirect('../back/updateSocial.php?id='.$_POST['id']);
	
    //fin du sinon
	}

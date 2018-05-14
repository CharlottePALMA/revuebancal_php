<?php 

//on importe le fichier setting
include('../config/settings.php');

//si on n'a pas reçu de formulaire 
if(empty($_POST))
	//on redirige vers le formulire
	redirect('../article.php?id='.$_POST['id_article']);
//sinon (on a reçu des donnes)
else{
	
$error = false;
    
    //on enleve tous les espaces au début ou a la fin des champs
	$_POST = array_map("trim", $_POST);

	//si le nom est vide
	if(empty($_POST['nom'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le nom est obligatoire');
	}

	//si le email est vide
	if(empty($_POST['email'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'email est obligatoire");
		}
    
    
    $faux = 'false';
    
    //si l'email n'est pas dans un format email
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
        //on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'email n'est pas au bon format");
    }
    
    
    //si le commentaire est vide
	if(empty($_POST['commentaire'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "Le commentaire est obligatoire");
		}
    
    //si l'id de l'article est vide
	if(empty($_POST['id_article'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'id de l'article est obligatoire");
		}
	
	
    //fin de si
    }


	//si on a vu au moins une erreur
	if($error)
		//on redirige vers le formulaire
		redirect('../article.php?id='.$_POST['id_article']);
	//sinon 
	else{
        
       	//on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO commentaire (created, nom, email, commentaire, id_article) VALUES (NOW(), :n, :e, :c, :i)');

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom'], PDO::PARAM_STR);
		$add->bindParam(':e', $_POST['email'], PDO::PARAM_STR);
		$add->bindParam(':c', $_POST['commentaire'], PDO::PARAM_STR);
		$add->bindParam(':i', $_POST['id_article'], PDO::PARAM_INT);
        
		//on execute la requete
		$add->execute();	
        
        //on crée un messsage de validation
		flash_in('success', "Le formulaire a bien été envoyé");

		//on redirige vers l'article
		redirect('../article.php?id='.$_POST['id_article'].'#com');
	
    //fin du sinon
	}

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
	redirect('../back/nouvel_content.php');
//sinon (on a reçu des donnes)
else{
	
$error = false;

	//si le titre est vide
	if(empty($_POST['page'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'La page est obligatoire');
	}
    
    
        //si on a recu un fichier
    if(!empty($_FILES['image']['name'])){
        //si il y a eu une erreur pour le fichier
        if($_FILES['image']['error'] !=0){
            //on déclenche une erreur
            $error = true;
            //on crée un message d'erreur
            flash_in('error', 'Fichier invalide, veuillez en essayer un autre.');
		}
        
        //si le fichier ne dépasse pas la taille maximale
        if($_FILES['image']['size'] > $maxFileSize){
            //on déclenche une erreur
            $error = true;
            //on crée un message d'erreur
            flash_in('error', 'Fichier trop grand, taille maximale 1Mo');
        }
        
        //on va vérfier l'extension
        $extensionsValides = ['png', 'jpg', 'jpeg', 'gif'];
        $nomMinuscule = strtolower($_FILES['image']['name']);
        $array = explode('.', $nomMinuscule);
        $extensionFichier = array_pop($array);
        //si l'extension du fichier n'est pas une extension valide
        if(!in_array($extensionFichier, $extensionsValides)){
            //on déclenche une erreur
            $error = true;
            //on crée un message d'erreur
            flash_in('error', "L'extension de votre fichier n'est pas valide.");
        }
        
    }
    
    //fin de si
    }
    

	//si on a vu au moins une erreur
	if($error)
		//on redirige vers le formulaire
		redirect('../back/nouvel_content.php');
	//sinon 
	else{
        
        $img = null;

        if($_FILES['image']['name']){
            //on crée un nom pour se fichier
            $img = 'content-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['image']['tmp_name'], '../data/contenu/'.$img);
        }
        
        
        //on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO content (created, updated, titre, page, content, image, lien) VALUES (NOW(), NOW(), :t, :p, :c, :img, :l)');
        
        //on vérifie les vide sur les champs non-obligatoire
		if(empty($_POST['titre']))
			$_POST['titre'] = null;
        
        if(empty($_POST['lien']))
			$_POST['lien'] = null;

		if(empty($_POST['contenu']))
			$_POST['contenu'] = null;

		//on ajoute les données du formulaire
		$add->bindParam(':t', $_POST['titre'], PDO::PARAM_STR);
		$add->bindParam(':p', $_POST['page'], PDO::PARAM_STR);
        $add->bindParam(':c', $_POST['contenu'], PDO::PARAM_STR);
        $add->bindParam(':img', $img, PDO::PARAM_STR);
        $add->bindParam(':l', $_POST['lien'], PDO::PARAM_STR);

		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "Le contenu a été ajouté");

		//on redirige vers la liste de contenu
		redirect('../back/page_liste_content.php');
	
    //fin du sinon
	}

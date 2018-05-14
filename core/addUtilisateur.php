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
	redirect('../back/nouvel_editeur.php');
//sinon (on a reçu des donnes)
else{
	
$error = false;

	//si le titre est vide
	if(empty($_POST['nom'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le nom est obligatoire');
	}

	//si le contenu est vide
	if(empty($_POST['prenom'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le prénom est obligatoire');
		}
    
    //si l'accroche est vide
	if(empty($_POST['email'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'email est obligatoire");
		}
	
	//si la categorie est vide
	if(empty($_POST['description'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'La description est obligatoire');
		}

    //si la categorie est vide
	if(empty($_POST['password'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le mot de passe est obligatoire');
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
		redirect('../back/nouvel_editeur.php');
	//sinon 
	else{
        
        $img = null;
        
        
        if($_FILES['image']['name']){
            //on crée un nom pour se fichier
            $img = 'user-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['image']['tmp_name'], '../data/user/'.$img);
        }
        
        
        $pass = cryptPassword($_POST['password']);
        
        
        //on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO user (created, updated, nom, prenom, email, password, photo, description) VALUES (NOW(), NOW(), :n, :p, :e, :pass, :img, :d)');

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom'], PDO::PARAM_STR);
		$add->bindParam(':p', $_POST['prenom'], PDO::PARAM_STR);
		$add->bindParam(':e', $_POST['email'], PDO::PARAM_STR);
        $add->bindParam(':pass', $pass, PDO::PARAM_STR);
        $add->bindParam(':img', $img, PDO::PARAM_STR);
        $add->bindParam(':d', $_POST['description'], PDO::PARAM_STR);
        
        
		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "L'article a été ajouté");

		//on redirige vers la liste des editeurs
		redirect('../back/page_liste_editeur.php');
	
    //fin du sinon
	}

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


	//si le nom est vide
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
		flash_in('error', 'Le prenom est obligatoire');
		}
    
    //si l'accroche est vide
	if(empty($_POST['email'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'email est obligatoire");
		}
	
	//si la description est vide
	if(empty($_POST['description'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'La description est obligatoire');
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
		redirect('../back/updateEditeur.php?='.$_POST['id']);
	//sinon 
	else{
        
        
        //on recupere les infos de l'ancienne cover
        $bancal = $db->prepare('SELECT * FROM user WHERE id = :i');
        $bancal->bindParam(':i', $_POST['id'], PDO::PARAM_INT);
        $bancal->execute();
        $data = $bancal->fetch(PDO::FETCH_ASSOC);

        $img = null;
        if(!empty($data['photo'])){
            $img = $data['photo'];
        }
        
        if($_FILES['image']['name']){
            //s'il a une image
            if(!empty($data['photo'])){
                //on supprime la fichier cover
                unlink('../data/user/'.$data['photo']);
            }
            
            //on crée un nom pour se fichier
            $img = 'user-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['image']['tmp_name'], '../data/user/'.$img);
        }
        if(isset($_POST['password'])){
            $pass = cryptPassword($_POST['password']); 
        }else{
            $pass = $_POST['apassword'];
        }
        
        
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('UPDATE user SET updated = NOW(), nom = :n, prenom = :pr, email = :e, description = :d, photo = :ph, password = :pass WHERE id = :i');
        
		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom'], PDO::PARAM_STR);
		$add->bindParam(':pr', $_POST['prenom'], PDO::PARAM_STR);
		$add->bindParam(':e', $_POST['email'], PDO::PARAM_STR);
        $add->bindParam(':d', $_POST['description'], PDO::PARAM_STR);
		$add->bindParam(':i', $_POST['id'], PDO::PARAM_INT);
		$add->bindParam(':ph', $img, PDO::PARAM_STR);
		$add->bindParam(':pass', $pass, PDO::PARAM_STR);

        
		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "L'éditeur a été modifié");

		//on redirige vers la liste d'editeurs
		redirect('../back/page_liste_editeur.php');
	
    //fin du sinon
	}
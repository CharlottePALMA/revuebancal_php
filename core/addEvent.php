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
	redirect('../back/nouvel_evenement.php');
//sinon (on a reçu des donnes)
else{
	
$error = false;

	//si le titre est vide
	if(empty($_POST['titre'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le titre est obligatoire');
	}
    
    //si le lien est vide
	if(empty($_POST['lien'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "Le lien est obligatoire");
		}
	
    //fin de si
    }
    

	//si on a vu au moins une erreur
	if($error)
		//on redirige vers le formulaire
		redirect('../back/nouvel_evenement.php');
	//sinon 
	else{
        
        if(isset($_POST['expiration'])){
            $expiration = "1";
        }else{
            $expiration = "2";
        }
        
        
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO event (created, updated, titre, date_debut, date_fin, lieu, lien, editeur_event, event_expiration, etat) VALUES (NOW(), NOW(), :t, :dd, :df, :lieu, :lien, :e, :ee, :etat)');
        
        if(empty($_POST['date_fin']))
			$_POST['date_fin'] = null;

		//on ajoute les données du formulaire
		$add->bindParam(':t', $_POST['titre'], PDO::PARAM_STR);
		$add->bindParam(':dd', $_POST['date_debut'], PDO::PARAM_STR);
		$add->bindParam(':df', $_POST['date_fin'], PDO::PARAM_STR);
        $add->bindParam(':lieu', $_POST['lieu'], PDO::PARAM_STR);
        $add->bindParam(':lien', $_POST['lien'], PDO::PARAM_STR);
        $add->bindParam(':e', $_SESSION["bancal_user_nom"], PDO::PARAM_STR);
        $add->bindParam(':ee', $expiration, PDO::PARAM_INT);
        $add->bindParam(':etat', $_POST['brouillon'], PDO::PARAM_INT);

		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "L'évènement a été ajouté");

		//on redirige vers la liste des evenements
		redirect('../back/page_liste_evenement.php');

	
    //fin du sinon
	}

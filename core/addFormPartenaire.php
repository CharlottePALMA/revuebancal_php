<?php 

//on importe le fichier setting
include('../config/settings.php');

//si on n'a pas reçu de formulaire 
if(empty($_POST))
	//on redirige vers le formulire
	redirect('../form_partenariat.php');
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
    
    //si l'email est vide
	if(empty($_POST['email'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'email est obligatoire");
		}
    
    //si l'email n'est pas dans un format email
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
        //on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'email n'est pas au bon format");
    }
    
    //fin de si
    }


	//si on a vu au moins une erreur
	if($error)
		//on redirige vers le formulaire
		redirect('../form_partenariat.php');
	//sinon 
	else{
        
      $motcle = "";
        for($i=1; $i<= 12; $i++) {
            if(isset($_POST['c'.$i])){
            $motcle .= $_POST['c'.$i].';';
            };
        }
        
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO form_partenaire (created, nom, fonction, commentaires, email) VALUES (NOW(), :n, :f, :c, :e)');

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom'], PDO::PARAM_STR);
        $add->bindParam(':e', $_POST['email'], PDO::PARAM_STR);
		$add->bindParam(':c', $_POST['commentaire'], PDO::PARAM_STR);
		$add->bindParam(':f', $motcle, PDO::PARAM_STR);

        
		//on execute la requete
		$add->execute();	
        
        
		//on redirige vers la page qui indique la validation de l'envoi
		redirect('../form_envoyer.php');
	
    //fin du sinon
	}

<?php 

//on importe le fichier setting
include('../config/settings.php');

//si on n'a pas reçu de formulaire 
if(empty($_POST))
	//on redirige vers le formulire
	redirect('../form_commande.php');
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

	//si le prenom est vide
	if(empty($_POST['prenom'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le prénom est obligatoire');
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
	
	//si l'adresse est vide
	if(empty($_POST['adresse'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'adresse est obligatoire");
		}
    
    //si le code postal est vide
	if(empty($_POST['post_code'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "Le code postal est obligatoire");
		}
    
    //si la ville est vide
	if(empty($_POST['ville'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "La ville est obligatoire");
		}
    
    //si le pays est vide
	if(empty($_POST['pays'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "Le pays est obligatoire");
		}
    
    //si le nom de l'ouvrage est vide
	if(empty($_POST['nom_ouvrage'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "Le nom de l'ouvrage est obligatoire");
		}
    
    //si le nombre d'exemplaires est vide
	if(empty($_POST['exemplaire'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "Le nombre d'exemplaires est obligatoire");
		}
    
    //fin de si
    }


	//si on a vu au moins une erreur
	if($error)
		//on redirige vers le formulaire
		redirect('../form_commande.php');
	//sinon 
	else{
        
        $motcle = "";
        for($i=1; $i<= 2; $i++) {
            if(isset($_POST['c'.$i])){
            $motcle .= $_POST['c'.$i].';';
            };
        }
          
        
    
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO form_commande (created, nom, prenom, email, adresse, code_postal, ville, pays, nom_ouvrage, nb_exemplaire, commentaires, format) VALUES (NOW(), :n, :p, :e, :a, :c, :v, :pays, :no, :nb, :coms, :for)');

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom'], PDO::PARAM_STR);
		$add->bindParam(':p', $_POST['prenom'], PDO::PARAM_STR);
		$add->bindParam(':e', $_POST['email'], PDO::PARAM_STR);
		$add->bindParam(':a', $_POST['adresse'], PDO::PARAM_STR);
		$add->bindParam(':c', $_POST['post_code'], PDO::PARAM_INT);
		$add->bindParam(':v', $_POST['ville'], PDO::PARAM_STR);
		$add->bindParam(':pays', $_POST['pays'], PDO::PARAM_STR);
		$add->bindParam(':no', $_POST['nom_ouvrage'], PDO::PARAM_STR);
		$add->bindParam(':nb', $_POST['exemplaire'], PDO::PARAM_INT);
		$add->bindParam(':coms', $_POST['commentaire'], PDO::PARAM_STR);
		$add->bindParam(':for', $motcle, PDO::PARAM_STR);

        
		//on execute la requete
		$add->execute();	
        

		//on redirige vers la page de validation d'envoi
		redirect('../form_envoyer.php');
	
    //fin du sinon
	}

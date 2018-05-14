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
	if(empty($_POST['titre'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le titre est obligatoire');
	}
    
    //si l'auteur est vide
	if(empty($_POST['auteur'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'auteur est obligatoire");
	}

	//si le contenu est vide
	if(empty($_POST['contenus'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le contenu est obligatoire');
		}
    
    //si l'accroche est vide
	if(empty($_POST['accroche'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', "L'accroche est obligatoire");
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
    
    
    //si on a recu un fichier
    if(!empty($_FILES['img_slider']['name'])){
        //si il y a eu une erreur pour le fichier
        if($_FILES['img_slider']['error'] !=0){
            //on déclenche une erreur
            $error = true;
            //on crée un message d'erreur
            flash_in('error', 'Fichier invalide, veuillez en essayer un autre.');
		}
        
        //si le fichier ne dépasse pas la taille maximale
        if($_FILES['img_slider']['size'] > $maxFileSize){
            //on déclenche une erreur
            $error = true;
            //on crée un message d'erreur
            flash_in('error', 'Fichier trop grand, taille maximale 1Mo');
        }
        
        //on va vérfier l'extension
        $extensionsValides = ['png', 'jpg', 'jpeg', 'gif'];
        $nomMinuscule = strtolower($_FILES['img_slider']['name']);
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
		redirect('../back/nouvel_ouvrage.php');
	//sinon 
	else{
        
        
        $img_slider = null;
        
        //on recupere les infos de l'ancienne cover
        $bancal = $db->prepare('SELECT * FROM ouvrages WHERE id = :i');
        $bancal->bindParam(':i', $_POST['id'], PDO::PARAM_INT);
        $bancal->execute();
        $data = $bancal->fetch(PDO::FETCH_ASSOC);
        if(!empty($data['image_slider'])){
            $img_slider = $data['image_slider'];
        }
        
        if($_FILES['img_slider']['name']){
            //s'il a une image
            if(!empty($data['image_slider'])){
                //on supprime la fichier cover
                unlink('../data/slider/'.$data['image_slider']);
            }
            
            //on crée un nom pour se fichier
            $img_slider = 'slider-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['img_slider']['tmp_name'], '../data/slider/'.$img_slider);
        }
        
        $img = null;
        if(!empty($data['couverture'])){
            $img = $data['couverture'];
        }
        
        if($_FILES['image']['name']){
            //s'il a une image
            if(!empty($data['image_avant'])){
                //on supprime la fichier cover
                unlink('../data/ouvrage/couv/'.$data['couverture']);
            }
            
            //on crée un nom pour se fichier
            $img = 'ouvrage-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['image']['tmp_name'], '../data/ouvrage/couv/'.$img);
        }
        
         
        if(isset($_POST['slider'])){
            $slider = "1";
        }else{
            $slider = "2";
        }
        
        
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('UPDATE ouvrages SET updated =NOW(), titre = :t, auteur = :au, accroche = :a, contenu = :c, prix_broche = :pb, prix_epub = :pe, lien = :l, couverture = :couv, slider = :sli, image_slider = :imgsli, etat = :e WHERE id = :i');

		//on ajoute les données du formulaire
		$add->bindParam(':t', $_POST['titre'], PDO::PARAM_STR);
		$add->bindParam(':au', $_POST['auteur'], PDO::PARAM_STR);
		$add->bindParam(':a', $_POST['accroche'], PDO::PARAM_STR);
        $add->bindParam(':c', $_POST['contenus'], PDO::PARAM_STR);
        $add->bindParam(':pb', $_POST['broche'], PDO::PARAM_STR);
        $add->bindParam(':pe', $_POST['epub'], PDO::PARAM_STR);
        $add->bindParam(':l', $_POST['lien'], PDO::PARAM_STR);
		$add->bindParam(':i', $_POST['id'], PDO::PARAM_STR);
		$add->bindParam(':couv', $img, PDO::PARAM_INT);
		$add->bindParam(':sli', $slider, PDO::PARAM_STR);
		$add->bindParam(':imgsli', $img_slider, PDO::PARAM_INT);
		$add->bindParam(':e', $_POST['brouillon']$brouillon, PDO::PARAM_INT);

        
		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "L'ouvrage a été modifié");

		//on redirige vers l'ouvrage
		redirect('../back/updateOuvrage.php?id='.$_POST['id']);
	
    //fin du sinon
	}
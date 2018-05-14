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
	redirect('../back/nouveau_partenaire.php');
//sinon (on a reçu des donnes)
else{
	
$error = false;

	//si le nom est vide
	if(empty($_POST['nom'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'Le nom est obligatoire');
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
		redirect('../back/nouveau_partenaire.php');
	//sinon 
	else{
        
         $img = null;
         $img_slider = null;
        
         if($_FILES['img_slider']['name']){
            //on crée un nom pour se fichier
            $img_slider = 'slider-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['img_slider']['tmp_name'], '../data/slider/'.$img_slider);
         }
        
        
        
        if($_FILES['image']['name']){
            //on crée un nom pour se fichier
            $img = 'partenaire-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['image']['tmp_name'], '../data/partenaire/en_avant/'.$img);
        }
            
          
        if(isset($_POST['slider'])){
            $slider = "1";
        }else{
            $slider = "2";
        }
        
        
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO partenaire (created, updated, name, accroche, contenus_bio, contenus_actu, contenus_projet, lien_facebook, lien_twitter, lien_instagram, lien_youtube, lien_soundcloud, lien_email, metier, 	image_avant, etat, slider, editeur_partenaire, image_slider) VALUES (NOW(), NOW(), :n, :a, :cb, :ca, :cp, :lf, :lt, :li, :ly, :ls, :le, :m, :img, :e, :sli, :ed, :imgsli)');

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom'], PDO::PARAM_STR);
		$add->bindParam(':a', $_POST['accroche'], PDO::PARAM_STR);
		$add->bindParam(':cb', $_POST['contenus_bio'], PDO::PARAM_STR);
        $add->bindParam(':ca', $_POST['contenus_actu'], PDO::PARAM_STR);
        $add->bindParam(':cp', $_POST['contenus_projet'], PDO::PARAM_INT);
        $add->bindParam(':lf', $_POST['facebook'], PDO::PARAM_STR);
        $add->bindParam(':lt', $_POST['twitter'], PDO::PARAM_STR);
        $add->bindParam(':li', $_POST['instagram'], PDO::PARAM_STR);
        $add->bindParam(':ly', $_POST['youtube'], PDO::PARAM_STR);
        $add->bindParam(':ls', $_POST['soundcloud'], PDO::PARAM_STR);
        $add->bindParam(':le', $_POST['email'], PDO::PARAM_STR);
        $add->bindParam(':m', $_POST['metier'], PDO::PARAM_STR);
        $add->bindParam(':img', $img, PDO::PARAM_STR);
        $add->bindParam(':e', $_POST['brouillon'], PDO::PARAM_STR);
        $add->bindParam(':sli', $slider, PDO::PARAM_INT);
        $add->bindParam(':ed', $_SESSION["bancal_user_nom"], PDO::PARAM_STR);
        $add->bindParam(':imgsli', $img_slider, PDO::PARAM_STR);

		//on execute la requete
		$add->execute();
        
        
		//on crée un messsage de validation
		flash_in('success', "Le partenaire a été ajouté");
        
		//on redirige vers la liste des partenariats
		redirect('../back/page_liste_partenaire.php');
	
    //fin du sinon
	}

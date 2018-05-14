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
    //ou : permet d'appliquer la fontion a tous les champs
	$_POST = array_map("trim", $_POST);

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
		redirect('../back/nouvel_partenaire.php');
	//sinon 
	else{
        
         $img_slider = null;
        
        //on recupere les infos de l'ancienne cover
        $bancal = $db->prepare('SELECT * FROM partenaire WHERE id = :i');
        $bancal->bindParam(':i', $_POST['id'], PDO::PARAM_INT);
        $bancal->execute();
        $data = $bancal->fetch(PDO::FETCH_ASSOC);
        if(!empty($data['image_slider'])){
            $img_slider = $data['image_slider'];
        }
        
        if($_FILES['img_slider']['name']){
            //s'il a une image
            if(!empty($data['image_slider'])){
                //on supprime le fichier cover
                unlink('../data/slider/'.$data['image_slider']);
            }
            
            //on crée un nom pour se fichier
            $img_slider = 'slider-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['img_slider']['tmp_name'], '../data/slider/'.$img_slider);
        }
        
        $img = null;
        if(!empty($data['image_avant'])){
            $img = $data['image_avant'];
        }
        
        if($_FILES['image']['name']){
            //s'il a une image
            if(!empty($data['image_avant'])){
                //on supprime la fichier cover
                unlink('../data/article/en_avant/'.$data['image_avant']);
            }
            
            //on crée un nom pour se fichier
            $img = 'article-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['image']['tmp_name'], '../data/partenaire/en_avant/'.$img);
        }
          
        
         if(isset($_POST['slider'])){
            $slider = "1";
        }else{
            $slider = "2";
        }
        
        
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('UPDATE partenaire SET updated = NOW(), name = :n, accroche = :a, contenus_bio = :cb, contenus_actu = :ca, contenus_projet = :cp, lien_facebook = :lf, lien_twitter = :lt, lien_instagram = :li, lien_youtube = :ly, lien_soundcloud = :ls, lien_email = :le, metier = :m, image_avant = :imgav, image_slider = :imgsli, etat = :e, slider = :sli WHERE id = :i');

        //on vérifie les vide sur les champs non-obligatoire
        if(empty($_POST['facebook']))
            $_POST['facebook'] = null;
        
        if(empty($_POST['twitter']))
            $_POST['twitter'] = null;

        if(empty($_POST['instagram']))
            $_POST['instagram'] = null;

        if(empty($_POST['youtube']))
            $_POST['youtube'] = null;
        
        if(empty($_POST['soundcloud']))
            $_POST['soundcloud'] = null;

        if(empty($_POST['metier']))
            $_POST['metier'] = null;

        if(empty($_POST['contenus_bio']))
            $_POST['contenus_bio'] = null;
        
        if(empty($_POST['contenus_actu']))
            $_POST['contenus_actu'] = null;

        if(empty($_POST['contenus_projet']))
            $_POST['contenus_projet'] = null;

		//on ajoute les données du formulaire
		$add->bindParam(':n', $_POST['nom'], PDO::PARAM_STR);
		$add->bindParam(':a', $_POST['accroche'], PDO::PARAM_STR);
		$add->bindParam(':cb', $_POST['contenus_bio'], PDO::PARAM_STR);
        $add->bindParam(':ca', $_POST['contenus_actu'], PDO::PARAM_STR);
        $add->bindParam(':cp', $_POST['contenus_projet'], PDO::PARAM_STR);
        $add->bindParam(':lf', $_POST['facebook'], PDO::PARAM_STR);
        $add->bindParam(':lt', $_POST['twitter'], PDO::PARAM_STR);
        $add->bindParam(':li', $_POST['instagram'], PDO::PARAM_STR);
        $add->bindParam(':ly', $_POST['youtube'], PDO::PARAM_STR);
        $add->bindParam(':ls', $_POST['soundcloud'], PDO::PARAM_STR);
        $add->bindParam(':le', $_POST['email'], PDO::PARAM_STR);
        $add->bindParam(':m', $_POST['metier'], PDO::PARAM_STR);
		$add->bindParam(':i', $_POST['id'], PDO::PARAM_INT);
		$add->bindParam(':imgav', $img, PDO::PARAM_STR);
		$add->bindParam(':imgsli', $img_slider, PDO::PARAM_STR);
		$add->bindParam(':e', $_POST['brouillon'], PDO::PARAM_INT);
		$add->bindParam(':sli', $slider, PDO::PARAM_INT);
        
		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "Le partenaire a été modifié");
        //var_dump($add, $_POST, $_FILES, $img, $img_slider, $brouillon, $slider);
		//on redirige vers le partenaire
		redirect('../back/updatePartenaire.php?id='.$_POST['id']);
	
    //fin du sinon
	}
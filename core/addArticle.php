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
	redirect('../back/nouvel_article.php');
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

	//si le contenu est vide
	if(empty($_POST['contenu'])){
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
	
	//si la categorie est vide
	if(empty($_POST['categorie'])){
		//on déclenche une erreur
		$error = true;
		//on crée un message d'erreur
		flash_in('error', 'La catégorie est obligatoire');
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
		redirect('../back/nouvel_article.php');
	//sinon 
	else{
        
        $img = null;
        $img_slider = null;
        
        if($_FILES['img_slider']['name']){
            //on crée un nom pour ce fichier
            $img_slider = 'slider-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['img_slider']['tmp_name'], '../data/slider/'.$img_slider);
        }
        
        
        if($_FILES['image']['name']){
            //on crée un nom pour ce fichier
            $img = 'article-'.time().'.'.$extensionFichier;
            
            //on déplace le fichier de la memoire temporaire vers le dossier qui nous interesse
            move_uploaded_file($_FILES['image']['tmp_name'], '../data/article/en_avant/'.$img);
        }
        
        if(isset($_POST['une'])){
            $alaune = "1";
        }else{
            $alaune = "2";
        }
        
        if(isset($_POST['slider'])){
            $slider = "1";
        }else{
            $slider = "2";
        }
          
        
		//on crée une requete qui ajoute dans la base
		$add = $db->prepare('INSERT INTO article (created, updated, titre, contenu, accroche, image_avant, mots_cles, category_id, editeur_article, etat, a_la_une, slider, image_slider, article_associe1, article_associe2) VALUES (NOW(), NOW(), :t, :c, :a, :img, :m, :cid, :e, :etat, :u, :s, :imgsli, :as1, :as2)');
        
        //on vérifie les vide sur les champs non-obligatoire
		if(empty($_POST['mots']))
			$_POST['mots'] = null;
        
        if(empty($_POST['as1']))
			$_POST['as1'] = null;

		if(empty($_POST['as2']))
			$_POST['as2'] = null;
        
		//on ajoute les données du formulaire
		$add->bindParam(':t', $_POST['titre'], PDO::PARAM_STR);
		$add->bindParam(':c', $_POST['contenu'], PDO::PARAM_STR);
		$add->bindParam(':a', $_POST['accroche'], PDO::PARAM_STR);
        $add->bindParam(':img', $img, PDO::PARAM_STR);
        $add->bindParam(':cid', $_POST['categorie'], PDO::PARAM_INT);
        $add->bindParam(':m', $_POST['mots'], PDO::PARAM_STR);
        $add->bindParam(':e', $_SESSION["bancal_user_nom"], PDO::PARAM_STR);
        $add->bindParam(':etat', $_POST['brouillon'], PDO::PARAM_INT);
        $add->bindParam(':u', $alaune, PDO::PARAM_INT);
        $add->bindParam(':s', $slider, PDO::PARAM_INT);
        $add->bindParam(':imgsli', $img_slider, PDO::PARAM_STR);
        $add->bindParam(':as1', $_POST['as1'], PDO::PARAM_INT);
        $add->bindParam(':as2', $_POST['as2'], PDO::PARAM_INT);

        
		//on execute la requete
		$add->execute();	
        
        
		//on crée un messsage de validation
		flash_in('success', "L'article a été ajouté");

		//on redirige vers la page détail du dvd nouvellement crée
		redirect('../back/page_liste_articles.php');
	
    //fin du sinon
	}

<?php 

//on importe le fichier setting
include('../config/settings.php');

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('../back/login.php');
}


//si on n'a pas d'id dans l'adresse 
if(empty($_GET['id'])){
	//on redirige vers la page d'accueil
	redirect('../back/page_liste_newsletter.php');
}


//on crée une requete qui ajoute dans la base
$suppr = $db->prepare('DELETE FROM newsletter WHERE id = :i');

//on ajoute les données du formulaire
$suppr->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
		
//on execute la requete
$suppr->execute();		
    
         
        
//on crée un messsage de validation
flash_in('success', "L'abonné a été supprimé");

//on redirige vers la liste de la newsletter
redirect('../back/page_liste_newsletter.php');
	

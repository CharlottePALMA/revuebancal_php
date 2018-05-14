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
	redirect('../back/categories.php');
}

//mettre le nom de la cover du dvd qui a un id = :i
$bancal = $db->prepare('SELECT * FROM categories WHERE id_categorie = :i');
$data = $bancal->fetch(PDO::FETCH_ASSOC);

//on crée une requete qui ajoute dans la base
$suppr = $db->prepare('DELETE FROM categories WHERE id_categorie = :i');

//on ajoute les données du formulaire
$suppr->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
		
//on execute la requete
$suppr->execute();		

//on crée un messsage de validation
flash_in('success', "La catégorie a été supprimé");

//on redirige vers la page liste d'articles
redirect('../back/page_liste_categories.php');

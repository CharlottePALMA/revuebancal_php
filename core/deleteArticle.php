<?php //fichier core/deleteDvd.php
include('../config/settings.php');

if(empty($_SESSION['bancal_user']))
	redirect('../back/login.php');

if(empty($_GET['id']))
	redirect('../back/articles.php');

//on recupere l'article
$bancal = $db->prepare('SELECT * FROM article WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

//si on ne trouve pas l'artivle
if($bancal->rowCount() == 0)
	//on va sur l'accueil
	redirect('../back/articles.php');

//on lit les donnees
$data = $bancal->fetch(PDO::FETCH_ASSOC);

//s'il a une image
if(!empty($data['image_avant'])){
    //on supprime la fichier image en avant
    unlink('../data/article/en_avant/'.$data['image_avant']);
}

//s'il a une image
if(!empty($data['image_slider'])){
    //on supprime la fichier image du slider
    unlink('../data/slider/'.$data['image_slider']);
}

//on crée une requete pour supprimer la ligne de la base
$deleteDvd = $db->prepare('DELETE FROM article WHERE id = :i');
$deleteDvd->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$deleteDvd->execute();

//on crée un message de validation
flash_in('success', "L'article a bien été supprimé.");
//on redirige vers la liste d'articles
redirect('../back/page_liste_articles.php');


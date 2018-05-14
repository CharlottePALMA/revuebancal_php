<?php //fichier core/deleteDvd.php
include('../config/settings.php');

if(empty($_SESSION['bancal_user']))
	redirect('../back/login.php');

if(empty($_GET['id']))
	redirect('../back/content.php');

//on recupere le contenu
$bancal = $db->prepare('SELECT * FROM content WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

//si on ne trouve pas le contenu
if($bancal->rowCount() == 0)
	//on va sur l'accueil
	redirect('../back/content.php');

//on lit les donnees
$data = $bancal->fetch(PDO::FETCH_ASSOC);

//s'il a une image
if(!empty($data['image'])){
    //on supprime la fichier image en avant
    unlink('../data/content/'.$data['image']);
}


//on crée une requete pour supprimer la ligne de la base
$deleteDvd = $db->prepare('DELETE FROM content WHERE id = :i');
$deleteDvd->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$deleteDvd->execute();

//on crée un message de validation
flash_in('success', "Le contenu a bien été supprimé.");
//on redirige vers la liste des contenus
redirect('../back/page_liste_content.php');


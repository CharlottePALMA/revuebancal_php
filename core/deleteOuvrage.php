<?php //fichier core/deleteDvd.php
include('../config/settings.php');

if(empty($_SESSION['bancal_user']))
	redirect('../back/login.php');

if(empty($_GET['id']))
	redirect('../back/ouvrages.php');

//on recupere l'ouvrage
$bancal = $db->prepare('SELECT * FROM ouvrages WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

//si on ne trouve pas l'ouvrage
if($bancal->rowCount() == 0)
	//on va sur l'accueil
	redirect('../back/ouvrages.php');

//on lit les donnees
$data = $bancal->fetch(PDO::FETCH_ASSOC);

//s'il a une image
if(!empty($data['couverture'])){
    //on supprime la fichier image en avant
    unlink('../data/ouvrage/couv/'.$data['couverture']);
}

//s'il a une image
if(!empty($data['image_slider'])){
    //on supprime la fichier image du slider
    unlink('../data/slider/'.$data['image_slider']);
}

//on crée une requete pour supprimer la ligne de la base
$deleteDvd = $db->prepare('DELETE FROM ouvrages WHERE id = :i');
$deleteDvd->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$deleteDvd->execute();

//on crée un message de validation
flash_in('success', "L'ouvrage a bien été supprimé.");
//on redirige vers la liste d'ouvrages
redirect('../back/page_liste_ouvrages.php');


<?php //fichier core/deleteDvd.php
include('../config/settings.php');

if(empty($_SESSION['bancal_user']))
	redirect('../back/login.php');

if(empty($_GET['id']))
	redirect('../back/partenaires.php');

//on recupere le partenaire
$bancal = $db->prepare('SELECT * FROM partenaire WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

//si on ne trouve pas le partenaire
if($bancal->rowCount() == 0)
	//on va sur l'accueil
	redirect('../back/partenaires.php');

//on lit les donnees
$data = $bancal->fetch(PDO::FETCH_ASSOC);

//s'il a une image
if(!empty($data['image_avant'])){
    //on supprime la fichier image en avant
    unlink('../data/partenaire/en_avant/'.$data['image_avant']);
}

//s'il a une image
if(!empty($data['image_slider'])){
    //on supprime la fichier image du slider
    unlink('../data/slider/'.$data['image_slider']);
}

//on crée une requete pour supprimer la ligne de la base
$deleteDvd = $db->prepare('DELETE FROM partenaire WHERE id = :i');
$deleteDvd->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$deleteDvd->execute();

//on crée un message de validation
flash_in('success', "Le partenaire a bien été supprimé.");
//on redirige vers la liste de partenaires
redirect('../back/page_liste_partenaire.php');


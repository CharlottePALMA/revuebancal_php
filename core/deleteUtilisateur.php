<?php //fichier core/deleteDvd.php
include('../config/settings.php');

if(empty($_SESSION['bancal_user']))
	redirect('../back/login.php');

if(empty($_GET['id']))
	redirect('../back/page_liste_editeur.php');

//on recupere l'utilisateur
$bancal = $db->prepare('SELECT * FROM user WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

//si on ne trouve pas l'utilisateur
if($bancal->rowCount() == 0)
	//on va sur l'accueil
	redirect('../back/page_liste_editeur.php');

//on lit les donnees
$data = $bancal->fetch(PDO::FETCH_ASSOC);

//s'il a une image
if(!empty($data['photo'])){
    //on supprime la fichier image en avant
    unlink('../data/user/'.$data['photo']);
}


//on crée une requete pour supprimer la ligne de la base
$deleteDvd = $db->prepare('DELETE FROM user WHERE id = :i');
$deleteDvd->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$deleteDvd->execute();

//on crée un message de validation
flash_in('success', "L'utilisateur a bien été supprimé.");
//on redirige vers la liste d'editeurs
redirect('../back/page_liste_editeur.php');


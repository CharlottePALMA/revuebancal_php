<?php //fichier core/deleteDvd.php
include('../config/settings.php');

if(empty($_SESSION['bancal_user']))
	redirect('../back/login.php');

if(empty($_GET['id']))
	redirect('../back/page_liste_social.php');


//on crée une requete pour supprimer la ligne de la base
$deleteDvd = $db->prepare('DELETE FROM social WHERE id = :i');
$deleteDvd->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$deleteDvd->execute();

//on crée un message de validation
flash_in('success', "Le réseau social a bien été supprimé.");
//on redirige vers la liste des reseaux sociaux
redirect('../back/page_liste_social.php');


<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}

?><!DOCTYPE html>
<html>
<head>
    <title>Autre</title>
    <?php include('../includes/head_back.php'); ?>
</head>
<body>
    <?php include('../includes/header_back.php'); ?>

	 <div class="wrapper">
   <div class="bloc-page liste-page">
	 <section class="entete-page">
	  <div class="row">
		  <h1 class="titre-page">Autre</h1>
	 </div>
	</section>
	<section class="bloc-page">
	
<div class="wrapper">
	<div class="marg-1 col-12">
		<div class="row">
 		 <a href="page_liste_articlemoment.php" class="button-page">Articles du moment</a>
		</div>
		<div class="row">
		<a href="page_liste_slider.php" class="button-page">Slider</a>
		</div>
        <div class="row">
		<a href="page_liste_eventexp.php" class="button-page">Evènements à expiration</a>
		</div>
		<div class="row">
		<a href="page_liste_commentaires.php" class="button-page">Commentaires</a>
		</div>
        <div class="row">
		<a href="page_liste_social.php" class="button-page">Réseaux sociaux</a>
		</div>
		<div class="row">
		<a href="page_liste_newsletter.php" class="button-page">Newsletter</a>
		</div>
  </div>
</div>
    </section>
   </div>
   	</div>
</body>
</html>
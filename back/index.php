<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}

?><!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <?php include('../includes/head_back.php'); ?>
</head>
<body>
    <?php include('../includes/header_back.php'); ?>

	 <div class="wrapper">
   <div class="bloc-page liste-page">
	 <section class="entete-page">
	  <div class="row">
		  <h1 class="titre-page">Accueil</h1>
	 </div>
	</section>
	<section class="bloc-page">
	
<div class="wrapper">
	<div class="marg-1 col-12">
		<div class="row">
 		 <a href="nouvel_article.php" class="button-page">Ajouter un article</a>
		</div>
		<div class="row">
		<a href="nouveau_partenaire.php" class="button-page">Ajouter un partenaire</a>
		</div>
		<div class="row">
		<a href="nouvel_ouvrage.php" class="button-page">Ajouter un ouvrage</a>
		</div>
		<div class="row">
		<a href="nouvel_evenement.php" class="button-page">Ajouter un évènement</a>
		</div>
  </div>
</div>
    </section>
   </div>
   	</div>
</body>
</html>
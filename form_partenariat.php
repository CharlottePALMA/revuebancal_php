<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>BANCAL - CULTURES PENCHEES ET PENCHANTS CULTUREL</title>
		<?php include('includes/head.php'); ?>
    </head>
<body>
    
    <?php include('includes/header.php'); ?>
    
    <div class="fond-pattern liste-article">
        <div class="wrapper">
            <?php flash_out(); ?>
            <h1 class="titre-page">Formulaire de partenariat</h1>
            <hr class="half-rule">
            <section class="page-form">
                <div class="row">
                    <section class="col-8 marg-2 marg-mobile col-12-m">
                            <article class="commande">
                            <form action="core/addFormPartenaire.php" method="post">
                            <div class="row no-padding wrap">
                                <div class="col-12">
                                    <p class="form_label">  
                                        <label for="nom">Nom</label>
                                    </p>
                                    <p>
                                        <input type="text" name="nom" id="nom" required>
                                    </p>
                                </div>
                            </div>
                            <div class="row no-padding">
                                <div class="col-12">
							         <p class="form_label">    
                                        <label for="email">E-mail</label>
                                    </p>
                                    <p>
                                        <input type="text" name="email" size="50" id="email" required>
                                    </p>
                                </div>
                            </div>
                            
                            
                                <p class="form_label">
                                        <label>Disciplines artistiques</label>
                                    </p>
                                <div class="row wrap">
                                <div class="col-3 col-12-t col-12-m">
                                    
                                    <p>                                    
                                        <input type="checkbox" name="c1" id="litterature" value="litterature">
                                        <label for="litterature">Littérature</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="c2" id="musique" value="musique">
                                        <label for="musique">Musique</label> 
                                    </p>
                                    <p>
                                        <input type="checkbox" name="c3" id="cinema" value="cinema">
                                        <label for="cinema">Cinéma</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="c4" id="peinture" value="peinture">
                                        <label for="peinture">Peinture</label>
                                    </p>
                                    
                                </div>
                                <div class="col-3 col-12-t col-12-m">
                                    <p>                                    
                                        <input type="checkbox" name="c5" id="scultpure" value="scultpure">
                                        <label for="scultpure">Sculpture</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="c6" id="theatre" value="theatre">
                                        <label for="theatre">Théâtre</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="c7" id="danse" value="danse">
                                        <label for="danse">Danse</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="c8" id="mode" value="mode">
                                        <label for="mode">Mode</label>
                                    </p>
                                </div>
                                <div class="col-3 col-12-t col-12-m">
                                    <p>                                    
                                        <input type="checkbox" name="c9" id="architecture" value="architecture">
                                        <label for="architecture">Architecture</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="c10" id="autre" value="autre">
                                        <label for="autre">Autre</label>
                                    </p>
                                </div>
                            </div>
                            <div class="row wrap">
                                <div class="col-12">
                                    <p class="form_label">
						   	          <label for="commentaire">Commentaire</label>
                                    </p>
                                    <p>
						   	          <textarea class="textarea" rows ="10" name="commentaire" id="commentaire" ></textarea>
                                    </p>
                                </div>
                                </div>
                                
                            <div class="row no-padding">
                                <div class="col-12">
                                    <p class="champs-ob">
                                        Les champs marqués d'un * sont obligatoires.
                                    </p>
                                </div>
                            </div>
							   <button class="button-footer droite"><a href="">Envoyer</a></button>
                            </form>
                        </article>
                    </section>
                </div>
            </section>
        </div>
    </div>
        
    <?php include('includes/footer.php'); ?>

        
        
        
</body>
</html>
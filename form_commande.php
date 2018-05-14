<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Formulaire de commande - Revue Bancal</title>
		<?php include('includes/head.php'); ?>
    </head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="fond-pattern liste-article">
        <div class="wrapper">
        <?php flash_out(); ?>
            <h1 class="titre-page">Formulaire de commande</h1>
            <hr class="half-rule">
            <section class="page-form">
                <div class="row">
                    <section class="col-8 marg-2 marg-mobile col-12-m">    
                        <article class="commande">
                            <form action="core/addCommande.php" method="post">
                            <div class="row no-padding wrap">
                                <div class="col-6 col-12-m">
                                    <p class="form_label">  
                                        <label for="nom">Nom *</label>
                                    </p>
                                    <p>
                                        <input type="text"  name="nom" id="nom" required>
                                    </p>
                                </div>
                                <div class="col-6 col-12-m">
                                    <p class="form_label">
                                        <label for="prenom">Prénom *</label>
                                    </p>
                                    <p>
                                        <input type="text" name="prenom" id="prenom" required>
                                    </p>
                                </div>
                            </div>
                            <div class="row no-padding">
                                <div class="col-12">
							         <p class="form_label">    
                                        <label for="email">E-mail *</label>
                                    </p>
                                    <p>
                                        <input type="text" name="email" size="50" id="email" required>
                                    </p>
                                </div>
                            </div>
                            <div class="row no-padding">
                                <div class="col-12">
                                    <p class="form_label">
                                        <label for="adresse">Adresse *</label>
                                    </p>
                                    <p>
                                        <input type="text" name="adresse" id="adresse" required>
                                    </p>
                                </div>
                            </div>
                            <div class="row no-padding wrap">
                                <div class="col-3 col-6-t col-12-m">
                                    <p class="form_label">
                                        <label for="post_code">Code postal *</label>
                                    </p>
                                    <p>
                                        <input type="text" name="post_code" id="post_code" required>
                                    </p>
                                </div>
                                <div class="col-7 col-6-t col-12-m">
                                    <p class="form_label">
                                        <label for="ville">Ville *</label>
                                    </p>
                                    <p>
                                        <input type="text" name="ville" id="ville" required>
                                    </p>
                                </div>
                                <div class="col-2 col-12-t col-12-m">
                                    <p class="form_label">
                                        <label for="pays">Pays *</label>
                                    </p>
                                    <p>
                                        <input type="text" name="pays" id="pays" required>
                                    </p>
                                </div>
                            </div>
                            <div class="row no-padding">
                                <div class="col-12">
                                    <p class="form_label">
                                        <label for="nom_ouvrage">Nom de l'ouvrage *</label>
                                    </p>
                                    <p>
                                        <input type="text" name="nom_ouvrage" id="nom_ouvrage" required>
                                    </p>
                                </div>
                            </div>
                            <div class="row no-padding wrap">
                                <div class="col-6 col-12-m">
                                    <p class="form_label">
                                        <label>Format</label>
                                    </p>
                                    <p>                                    
                                        <input type="checkbox" name="c1" id="papier" value="papier"><label for="papier">Papier</label>
                                        <input type="checkbox" name="c2" id="epub" value="epub"><label for="epub">E-pub</label>
                                    </p>
                                </div>
                                <div class="col-6 col-12-m">
                                    <p class="form_label">
					   	               <label for="exemplaire">Nombre d'exemplaire souhaités *</label>
                                    </p>
                                    <p>
                                       <input type="text" name="exemplaire" id="exemplaire" >
                                    </p>
                                </div>
                            </div>
                            <div class="row no-padding wrap">
                                <div class="col-12">
                                    <p class="form_label">
						   	          <label for="commentaire">Commentaire</label>
                                    </p>
                                    <p>
						   	          <textarea class="textarea-commande" name="commentaire" id="commentaire"></textarea>
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
							   <button class="button-footer droite">Envoyer</button>
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
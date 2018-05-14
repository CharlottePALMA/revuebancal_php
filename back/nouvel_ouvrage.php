<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/head_back.php'); ?>
        <title>Nouvel ouvrage</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Nouvel ouvrage</h1>
            </section>
            <section class="col-9 marg-1">
                <form action="../core/addOuvrage.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                    <p>
                        <label for="titre">Titre *</label>
                        <input type="text" placeholder="Saisissez votre titre" size="100" name="titre" id="titre" required>
                    </p>
                    <p>
                        <label for="auteur">Auteur *</label>
                        <input type="text" size="100" name="auteur" id="auteur" required>
                    </p>
                     <p>
                        <label for="accroche">Accroche *</label>
                    </p>
                    <p>
                        <textarea rows="10" cols="50" name="accroche" id="accroche" required class="textarea"></textarea>
                    </p>
                    <p>
                     	<label for="contenus">Contenus *</label>
                        <textarea rows="10" cols="50" name="contenus" id="contenus" class="tynimce" required></textarea>
                    </p>
                   
                    <p>
                        <label for="date_ouvrage">Date</label>
                        <input type="date" name="date_ouvrage" id="date_ouvrage">
                    </p>
                    <p>
                        <label for="broche">Prix broché</label>
                        <input type="text" size="100" name="broche" id="broche">
                    </p>
                    <p>
                        <label for="epub">Prix ePub</label>
                        <input type="text" size="100" name="epub" id="epub">
                    </p>
                    <p>
                        <label for="lien">Lien</label>
                        <input type="text" size="100" name="lien" id="lien">
                    </p>
                    <p>Image en avant * (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                    <p>
                        <input type="file" name="image">
                    </p>
                    
                    <p>
                        <input type="checkbox" name="slider" id="slider"><label for="slider">Mettre dans le slider</label>
                    </p>
                    <p>Image de la mise en avant dans le slider (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                    <p>
                        <input type="file" name="img_slider">
                    </p>
                    <p class="champs-ob">
                    Les champs marqués d'un * sont obligatoires.
                    </p>
                    <section class="fond-gris">
                    <div class="row">
                        <h1 class="sous-titre">Publication</h1>
                    </div>
                    <div class="row">
                            <input type="text" name="brouillon" id="brouillon">
                            <label for="brouillon" class="button-pub-blanc" id="mettreB">Enregistrer en brouillon</label>
                            <p class="button-publication" id="mettreP">Publier</p>
                    </div>
                </section>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
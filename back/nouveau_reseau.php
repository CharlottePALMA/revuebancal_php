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
        <title>Nouveau réseau social</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Nouveau réseau social</h1>
            </section>
            <section class="col-9 marg-1"> 
            <form action="../core/addSocial.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                <p>
                    <label for="network">Nom du réseau *</label>
                    <input type="text" size="100" name="network" id="network" required>
                </p>
                <p>
                    <label for="link">Lien *</label>
                    <input type="text" size="100" name="link" id="link" required>
                </p>
                
                <p>Image en avant * (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                <p>
                    <input type="file" name="image">
                </p>
                <p class="champs-ob">
                    Les champs marqués d'un * sont obligatoires.
                </p>
               <section class="fond-gris">
                    <div class="row">
                        <h1 class="sous-titre">Publication</h1>
                    </div>
                    <div class="row">
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
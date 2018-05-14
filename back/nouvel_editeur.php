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
        <title>Nouvel éditeur</title>
         
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
 <div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Nouvel éditeur</h1>
            </section>
            <section class="col-9 marg-1"> 
            <form action="../core/addUtilisateur.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                <p>
                    <label for="nom">Nom *</label>
                    <input type="text" size="100" name="nom" id="nom" required>
                </p>
                <p>
                    <label for="prenom">Prénom *</label>
                    <input type="text" size="100" name="prenom" id="prenom" required>
                </p>
                <p>
                    <label for="email">Email *</label>
                    <input type="text" size="100" name="email" id="email" required>
                </p>
                <p>
                    <label for="password">Mot de passe *</label>
                    <input type="text" size="100" name="password" id="password" required>
                </p>
                <p>
                    <label for="description">Description *</label>
                    <textarea rows="10" cols="50" name="description" id="description" class="textarea" required></textarea>
                </p>
                <p>Photo (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
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
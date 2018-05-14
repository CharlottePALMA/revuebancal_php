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
    <title>Nouveau contenu</title>
</head>
<body>
    <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Nouveau contenu</h1>
            </section>
            <section class="col-9 marg-1">
                <form action="../core/addContent.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                    <p>
                        <label for="page">Page *</label>
                        <input type="text" placeholder="Saisissez votre titre" size="100" name="page" id="page">
                    </p>
                    <p>
                        <label for="titre">Titre</label>
                        <input type="text" placeholder="Saisissez votre titre" size="100" name="titre" id="titre">
                    </p>
                    <p>
                        <label for="contenu">Contenu</label>
                        <textarea name="contenu" id="contenu" class="tynimce"></textarea>          
                    </p>
                    <p>
                        <label for="lien">Lien</label>
                        <input type="text" placeholder="Saisissez votre lien" size="100" name="lien" id="lien">
                    </p>
                    <p>Image (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
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
                            <input type="text" name="brouillon" id="brouillon">
                            <label for="brouillon" class="button-pub-blanc" id="mettreB">Enregistrer en brouillon</label>                                       <p class="button-publication" id="mettreP">Publier</p>
                        </div>
                    </section>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
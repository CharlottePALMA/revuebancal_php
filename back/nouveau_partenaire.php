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
        <title>Nouveau partenaire</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Nouveau partenaire</h1>
            </section>
            <section class="col-9 marg-1">
                <form action="../core/addPartenaire.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                <p>
                    <label for="nom">Nom *</label>
                    <input type="text" size="100" name="nom" id="nom">
                </p>
                <p>
                    <label for="accroche">Accroche *</label>
                </p>
                <p>
                    <textarea rows="10" cols="50" name="accroche" id="accroche" class="textarea"></textarea>
                </p>
                <p>
                    <label for="contenus_bio">Contenus biographiques</label>
                    <textarea rows="10" cols="50" name="contenus_bio" id="contenus_bio" class="tynimce"></textarea>
                </p>
                <p>
                    <label for="contenus_actu">Contenus actuels</label>
                    <textarea rows="10" cols="50" name="contenus_actu" id="contenus_actu" class="tynimce"></textarea>
                </p>
                <p>
                    <label for="contenus_projet">Contenus projets et oeuvres</label>
                    <textarea rows="10" cols="50" name="contenus_projet" id="contenus_projet" class="tynimce"></textarea>
                </p>
                
                <p>
                    <label>Ses contacts</label>
                    <p>
                        <label for="facebook">Facebook</label>
                        <input type="text" placeholder="Saisissez le lien facebook" name="facebook" id="facebook">
                    </p>
                    <p>
                        <label for="twitter">Twitter</label>
                        <input type="text" placeholder="Saisissez le lien twitter" name="twitter" id="twitter">
                    </p>
                    <p>
                        <label for="instagram">Instagram</label>
                        <input type="text" placeholder="Saisissez le lien instagram" name="instagram" id="instagram">
                    </p>
                    <p>
                        <label for="youtube">Youtube</label>
                        <input type="text" placeholder="Saisissez le lien youtube" name="youtube" id="youtube">
                    </p>
                    <p>
                        <label for="soundcloud">Soundcloud</label>
                        <input type="text" placeholder="Saisissez le lien soundcloud" name="soundcloud" id="soundcloud">
                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input type="text" placeholder="Saisissez l'email" name="email" id="email">
                    </p>
                    <p>
                        <label for="metier">Métiers (Séparer les métiers par des point-virgules)</label>
                        <input type="text" name="metier" id="metier">
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
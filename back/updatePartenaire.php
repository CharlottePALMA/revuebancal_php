<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}

//si on n'a pas d'id dans l'adresse 
if(empty($_GET['id'])){
	//on redirige vers la page d'accueil
	redirect('index.php');
}

$bancal = $db->prepare('SELECT * FROM partenaire WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/head_back.php'); ?>
        <title>Modification partenaire</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Modification Partenaire</h1>
            </section>
            <section class="col-9 marg-1">
                <form action="../core/updatePartenaire.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                <p>
                    <label for="nom">Nom *</label>
                    <input type="text" size="100" name="nom" id="nom" value="<?php echo $data['name'] ?>">
                </p>
                <p>
                    <label for="accroche">Accroche *</label>
                </p>
                <p>
                    <textarea rows="10" cols="50" name="accroche" id="accroche" class="textarea"><?php echo $data['accroche'] ?></textarea>
                </p>
                <p>
                    <label for="contenus_bio">Contenus biographiques</label>
                    <textarea rows="10" cols="50" name="contenus_bio" id="contenus_bio" class="tynimce"><?php echo $data['contenus_bio'] ?></textarea>
                </p>
                <p>
                    <label for="contenus_actu">Contenus actuels</label>
                    <textarea rows="10" cols="50" name="contenus_actu" id="contenus_actu" class="tynimce"><?php echo $data['contenus_actu'] ?></textarea>
                </p>
                <p>
                    <label for="contenus_projet">Contenus projets et oeuvres</label>
                    <textarea rows="10" cols="50" name="contenus_projet" id="contenus_projet" class="tynimce"><?php echo $data['contenus_projet'] ?></textarea>
                </p>
                
                <p>
                    <label>Ses contacts</label>
                    <p>
                        <label for="facebook">Facebook</label>
                        <input type="text" placeholder="Saisissez le lien facebook" name="facebook" id="facebook" value="<?php echo $data['lien_facebook'] ?>">
                    </p>
                    <p>
                        <label for="twitter">Twitter</label>
                        <input type="text" placeholder="Saisissez le lien twitter" name="twitter" id="twitter" value="<?php echo $data['lien_twitter'] ?>">
                    </p>
                    <p>
                        <label for="instagram">Instagram</label>
                        <input type="text" placeholder="Saisissez le lien instagram" name="instagram" id="instagram" value="<?php echo $data['lien_instagram'] ?>">
                    </p>
                    <p>
                        <label for="youtube">Youtube</label>
                        <input type="text" placeholder="Saisissez le lien youtube" name="youtube" id="youtube" value="<?php echo $data['lien_youtube'] ?>">
                    </p>
                    <p>
                        <label for="soundcloud">Soundcloud</label>
                        <input type="text" placeholder="Saisissez le lien soundcloud" name="soundcloud" id="soundcloud" value="<?php echo $data['lien_soundcloud'] ?>">
                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input type="text" placeholder="Saisissez l'email" name="email" id="email" value="<?php echo $data['lien_email'] ?>">
                    </p>
                    <p>
                        <label for="metier">Métiers (Séparer les métiers par des point-virgules)</label>
                        <input type="text" name="metier" id="metier" value="<?php echo $data['metier'] ?>">
                    </p>

                   <p>Image en avant * (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                    <figure><img src="../data/partenaire/en_avant/<?php echo $data["image_avant"] ?>"/> </figure>
                    <p>
                    <input type="file" name="image">
                </p>
                    <p>
                        <input type="checkbox" name="slider" id="slider"
                               <?php 
                                if($data['slider']=="1"){
                                    echo 'checked';
                                }
                            ?> 
                        ><label for="slider">Mettre dans le slider</label>
                    </p>
                    <p>Image de la mise en avant dans le slider (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                    <figure><img src="../data/slider/<?php echo $data["image_slider"] ?>"/> </figure>
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
                        <p>Etat : <?php
                                    if($data['etat'] == 1){
                                         echo 'Brouillon';
                                    }else{
                                        echo 'Publié';
                                    }
                                    ?></p>
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
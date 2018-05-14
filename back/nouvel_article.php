<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}

$categories = $db->prepare('SELECT * FROM categories ORDER BY nom_categorie');
$categories->execute();

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/head_back.php'); ?>
        <title>Nouvel Article</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Nouvel Article</h1>
            </section>
            <section class="col-9 marg-1">                
            <form action="../core/addArticle.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">

                <p>
                    <label for="titre">Titre *</label>
                    <input type="text" size="100" name="titre" id="titre" required>
                </p>
                <p><label for="accroche">Catégories *</label></p>
                <p>
                    <?php 
                        //on boucle sur les categories
                        while($categ = $categories->fetch(PDO::FETCH_ASSOC)){ ?>
                            <input required type="radio" name="categorie" value="<?php echo $categ['id_categorie']; ?>" id="c_<?php echo $categ['id_categorie']; ?>">
                            <label for="c_<?php echo $categ['id_categorie']; ?>"><?php echo $categ['nom_categorie']; ?></label>
                    <?php } ?>
                </p>
                <p>
                    <label for="accroche">Accroche *</label>
                </p>
                <p>
                    <textarea rows="10" cols="50" name="accroche" id="accroche" required class="textarea"></textarea>
                </p>
                <p>
                    <label for="contenu">Contenus *</label>
                    <textarea rows="10" cols="50"  name="contenu" id="contenu" class="tynimce" required></textarea>
                </p>
                
                
                <p>
                    <label for="mots">Mots-clés (Séparer les mots-clés par des point-virgules)</label>
                    <input type="text" name="mots" id="mots">
                </p>
                <p>
                    <label for="as1">Id de l'article associé 1 : </label>
                    <input name="as1" id="as1" type="text">
                </p>
                <p>
                    <label for="as2">Id de l'article associé 2 : </label>
                    <input name="as2" id="as2" type="text">
                </p>
                <p>Image en avant * (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                <p>
                    <input type="file" name="image">
                </p>
                <p>
                    <input type="checkbox" name="une" id="une"><label for="une">Mettre l'article à la une</label>
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
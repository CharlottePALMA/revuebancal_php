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

$bancal = $db->prepare('SELECT * FROM article WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);

$categories = $db->prepare('SELECT * FROM categories ORDER BY nom_categorie');
$categories->execute();


?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/head_back.php'); ?>
        <title>Modifier l'article</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Modifier l'article</h1>
            </section>
            <section class="col-9 marg-1">                 
            <form action="../core/updateArticle.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>"></input>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                <p>
                    <label for="titre">Titre *</label>
                    <input type="text" placeholder="Saisissez votre titre" size="100" name="titre" id="titre" required value="<?php echo $data['titre'] ?>">
                </p>
                <p><label for="accroche">Catégories *</label></p>
                <p>   
                    <?php 
                        //on boucle sur les categories
                        while($categ = $categories->fetch(PDO::FETCH_ASSOC)){ ?>
                            <input required type="radio" name="categorie" value="<?php echo $categ['id_categorie']; ?>" id="c_<?php echo $categ['id_categorie']; ?>"
                                <?php if($categ['id_categorie'] == $data['category_id']){ 
				                    echo 'checked';
			                     } ?>   
                            >
                            <label for="c_<?php echo $categ['id_categorie']; ?>"><?php echo $categ['nom_categorie']; ?></label>
                    <?php } ?>
                </p>
                <p>
                    <label for="accroche">Accroche *</label>
                </p>
                <p>
                    <textarea rows="10" cols="50" name="accroche" id="accroche" class="textarea" required><?php echo $data['accroche'] ?></textarea>
                </p>
                <p>
                    <label for="contenu">Contenus *</label>
                    <textarea rows="10" cols="50"  name="contenu" id="contenu" class="tynimce" required><?php echo $data['contenu'] ?></textarea>
                </p>
                
                
                <p>
                    <label for="mots_cles">Mots-clés (Séparer les mots-clés par des point-virgules)</label>
                    <input type="text" name="mots_cles" id="mots_cles" value="<?php echo $data['mots_cles'] ?>">
                </p>
                <p>
                    <label for="as1">Id de l'article associé 1 : </label>
                    <input name="as1" id="as1" type="text" value="<?php echo $data['article_associe1'] ?>">
                </p>
                <p>
                    <label for="as2">Id de l'article associé 2 : </label>
                    <input name="as2" id="as2" type="text" value="<?php echo $data['article_associe2'] ?>">
                </p>
                <p>Image en avant * (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                <figure><img src="../data/article/en_avant/<?php echo $data["image_avant"] ?>"/> </figure>
                <p>
                    <input type="file" name="image">
                </p>
                <p>
                    <input type="checkbox" name="une" id="une" 
                           <?php 
                                if($data['a_la_une']=="1"){
                                    echo 'checked';
                                }
                            ?>
                    ><label for="une">Mettre l'article à la une</label>
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
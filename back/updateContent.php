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

$bancal = $db->prepare('SELECT * FROM content WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/head_back.php'); ?>
        <title>Modifier le contenu</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Modifier le contenu</h1>
            </section>
            <section class="col-9 marg-1">         
            <form action="../core/updateContent.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>"></input>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                <p>
                    <label for="page">Page *</label>
                    <input type="text" size="100" name="page" id="page" value="<?php echo $data['page'] ?>" required>
                </p>
                <p>
                    <label for="titre">Titre</label>
                    <input type="text" size="100" name="titre" id="titre" value="<?php echo $data['titre'] ?>">
                </p>
                <p>
                    <label for="lien">Lien</label>
                    <input type="text" placeholder="Saisissez votre lien" size="100" name="lien" id="lien" value="<?php echo $data['lien'] ?>">
                </p>
                <p>
                    <label for="contenu">Contenus</label>
                    <textarea rows="10" cols="50"  name="contenu" id="contenu" required class="tynimce"><?php echo $data['content'] ?></textarea>
                </p>
                <p>Image (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                <figure><img src="../data/contenu/<?php echo $data["image"] ?>"/> </figure>
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
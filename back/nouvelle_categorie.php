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
        <title>Nouvelle Catégorie</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
 <div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Nouvelle catégorie</h1>
            </section>
            <section class="col-9 marg-1">
                    <form action="../core/addCategories.php" method="post">
                    <p>
                        <label for="nom_categorie">Titre</label>
                        <input type="text" size="100" name="nom_categorie" id="nom_categorie" required>
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
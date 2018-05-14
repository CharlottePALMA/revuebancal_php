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

$bancal = $db->prepare('SELECT * FROM categories WHERE id_categorie = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/head_back.php'); ?>
        <title>Modifier la categorie</title>
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
                <form action="../core/updateCategories.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $data['id_categorie'] ?>"></input>
                    <p>
                        <label for="nom_categorie">Nom de la catégorie</label>
                        <input type="text" size="100" name="nom_categorie" id="nom_categorie" required value="<?php echo $data['nom_categorie'] ?>">
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
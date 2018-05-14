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

$bancal = $db->prepare('SELECT * FROM user WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/head_back.php'); ?>
        <title>Modifier l'éditeur</title>
    </head>
    <body>
        <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Modifier l'éditeur</h1>
            </section>
            <section class="col-9 marg-1"> 
            <form action="../core/updateUtilisateur.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>"></input>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $maxFileSize ?>">
                <p>
                    <label for="nom">Nom *</label>
                    <input type="text" size="100" name="nom" id="nom" required value="<?php echo $data['nom'] ?>">
                </p>
                <p>
                    <label for="prenom">Prénom *</label>
                    <input type="text" size="100" name="prenom" id="prenom" required value="<?php echo $data['prenom'] ?>">
                </p>
                <p>
                    <label for="email">Email *</label>
                    <input type="text" size="100" name="email" id="email" required value="<?php echo $data['email'] ?>">
                </p>
                <p>
                    <label for="password">Mot de passe</label>
                    <input type="text" size="100" name="password" id="password" required>
                    <input type="hidden" name="apassword" id="apassword" value="<?php echo $data['password'] ?>">
                </p>
                <p>
                    <label for="description">Description *</label>
                    <textarea rows="10" cols="50" name="description" id="description" required class="textarea"><?php echo $data['description'] ?></textarea>
                </p>
                <p>Photo (Fichier au format png, jpg ou gif. Taille maximale 1Mo)</p>
                <figure><img src="../data/user/<?php echo $data["photo"] ?>"/> </figure>
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
                        <p>Etat : <?php
                                    if($data['etat'] == 1){
                                         echo 'Brouillon';
                                    }else{
                                        echo 'Publié';
                                    }
                                    ?></p>
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
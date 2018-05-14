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
    <title>Nouvel Evenement</title>
    <?php include('../includes/head_back.php'); ?>
</head>
<body>
    <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Nouvel Evenement</h1>
            </section>
            <section class="col-9 marg-1">
                <form action="../core/addEvent.php" method="post">
                <p>
                    <label for="titre">Titre *</label>
                    <input type="text" placeholder="Saisissez votre titre" size="100" name="titre" id="titre">
                </p>
                <p>
                    <label for="date_debut">Date de début *</label>
                    <input type="date" name="date_debut" id="date_debut">
                </p>
                <p>
                    <label for="date_fin">Date de fin</label>
                    <input type="date" name="date_fin" id="date_fin">
                </p>
                <p>
                    <label for="lieu">Lieu</label>
                    <input type="text" placeholder="Saisissez le lieu" name="lieu" id="lieu">
                </p>
                <p>
                    <label for="lien">Lien *</label>
                    <input type="text" placeholder="Saisissez le lien" name="lien" id="lien">
                </p>
                <p>
                    <input type="checkbox" name="expiration" id="expiration">
                    <label for="expiration">Evenement à expiration</label>
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
<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}


//on cherche dans la base le commentaire correspondant a cet id 
$bancal = $db->prepare('SELECT * FROM commentaire WHERE id = :i');
//on lit la pseudo variable  l'id de l'adresse
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
//on execute la requete
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Commentaires</title>
    <?php include('../includes/head_back.php'); ?>
</head>
<body>
    <?php include('../includes/header_back.php'); ?>
<div class="wrapper">
    <div class="bloc-page liste-page">
        <div class="wrapper">
            <section class="entete-page">
                <h1 class="titre-page">Commentaires</h1>
            </section>
            <section class="col-9 marg-1">
                <p>Id de l'article : <?= $data['id_article']; ?></p>
                <p>Nom : <?= $data['nom']; ?></p>
                <p>Email : <?= $data['email']; ?></p>
                <p>Commentaire : <br><?= $data['commentaire']; ?></p>        
            </section>
        </div>
    </div>
</div>
</body>
</html>

<?php
//on importe le setting
include('../config/settings.php');

include('../includes/debutPhp.php');

$count = 1;

$bancal = $db->prepare('SELECT * FROM ouvrages WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Liste des ouvrages - Revue Bancal</title>
		<?php include('../includes/head2.php'); ?>
	</head>
<body>
    
    <?php include('../includes/header2.php'); ?>      
        
    <div class="fond-pattern liste-article">
        <div class="wrapper">
            <h1 class="titre-page">Ouvrages</h1>
            <hr class="half-rule">
        </div>
    </div>
    <div class="wrapper liste-ouvrage">
        <?php 
        $i=1;
        while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ ?>
            <section class="ouvrage row">
                <div class="ouvrage-gauche col-2 marg-1">
                    <figure><img src="../data/ouvrage/couv/<?= $data['couverture'] ?>"/></figure>
                    <p class="prix">Prix broché : <?= $data['prix_broche'] ?></p>
                    <?php if(isset($data['prix_epub'] )){?>
                    <p class="prix">Prix epub : <?= $data['prix_epub'] ?></p>
                    <?php } ?>
                </div>
                <div class="info-ouvrage col-8">
                    <h2><?= $data['titre'] ?></h2>
                    <p class="ouvrage-auteur"><?= $data['auteur'] ?></p>
                    <p class="ouvrage-date"><?= dateEU($data['date_ouvrage']) ?></p>
                    <p class="ouvrage-accroche"><?= $data['accroche'] ?></p>
                    <p class="ouvrage-contenu"><?= $data['contenu'] ?></p>
                    <button class="button-footer"><a href="form_commande.php">Acheter</a></button>
                </div>
            </section>
            <?php if($i!=$count){?>
            <hr class="hr-ouvrage">
            <?php } ?>
         <?php $i++;
        } ?>
    </div>
        
<?php include('../includes/footer.php'); ?>    
        
</body>
</html>
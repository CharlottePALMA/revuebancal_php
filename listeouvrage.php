<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php');

$nbElement = $db->prepare('SELECT * FROM ouvrages');
$nbElement->execute();

$count = $nbElement->rowCount();

$bancal = $db->prepare('SELECT * FROM ouvrages ORDER BY created DESC');
$bancal->execute();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Liste des ouvrages - Revue Bancal</title>
		<?php include('includes/head.php'); ?>
	</head>
<body>
    
    <?php include('includes/header.php'); ?>      
        
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
            <section class="ouvrage row wrapp">
                <div class="ouvrage-gauche col-2 marg-1 col-2-t col-12-m marg-mobile marg-0-t">
                    <div class="row wrap">
                        <div class="col-12">
                            <figure><img src="data/ouvrage/couv/<?= $data['couverture'] ?>" alt="<?= $data['titre'] ?>"/></figure>  
                        </div>
                        <div class="col-12 catcache-m">
                            <p class="prix">Prix broché : <?= $data['prix_broche'] ?></p>
                            <?php if(isset($data['prix_epub'] )){?>
                            <p class="prix">Prix epub : <?= $data['prix_epub'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="info-ouvrage col-8 col-10-t col-12-m">
                    <h2><?= $data['titre'] ?></h2>
                    <p class="ouvrage-auteur"><?= $data['auteur'] ?></p>
                    <p class="ouvrage-date"><?= dateEU($data['date_ouvrage']) ?></p>
                    <p class="ouvrage-accroche"><?= $data['accroche'] ?></p>
                    <p class="ouvrage-contenu"><?= $data['contenu'] ?></p>
                    <div class="col-12 catcache-cache catcache-block">
                        <p class="prix">Prix broché : <?= $data['prix_broche'] ?></p>
                            <?php if(isset($data['prix_epub'] )){?>
                        <p class="prix">Prix epub : <?= $data['prix_epub'] ?></p>
                            <?php } ?>
                    </div>
                    <p class="right">
                        <a href="
                            <?php if(isset($data['lien'])){
                                echo $data['lien'];
                            }else{?>
                                 form_commande.php
                            <?php } ?>" class="button-footer">Acheter</a>
                    </p>
                </div>
            </section>
            <?php if($i!=$count){?>
            <hr class="hr-ouvrage">
            <?php } ?>
         <?php $i++;
        } ?>
    </div>
        
<?php include('includes/footer.php'); ?>         
</body>
</html>
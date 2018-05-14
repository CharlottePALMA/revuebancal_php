<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

if(!isset($_GET['page'])){
    redirect('listepartenaire.php?page=1');
}

$nbElementPage = 9;
$un = 1;
$debutElementPage = ($_GET['page'] - $un) * $nbElementPage;

$nbElement = $db->prepare('SELECT * FROM partenaire');
$nbElement->execute();

$count = $nbElement->rowCount();

$nbPage = ceil($count / $nbElementPage);

$bancal = $db->prepare('SELECT * FROM partenaire ORDER BY created DESC LIMIT :p, :n');
$bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
$bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);

$bancal->execute();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Listes partenaires - Revue Bancal</title>
		<?php include('includes/head.php'); ?>
	</head>
<body>
    
    <?php include('includes/header.php'); ?>      
    
    <div class="fond-pattern liste-article">
        <div class="wrapper">
            <h1 class="titre-page">Partenariats</h1>
            <hr class="half-rule">    
            <div class="row">
                    <section class="col-10 col-12-t marg-1 marg-mobile">
                        <div class="row marge-bas row-wrapp wrap">
                        <?php

                        while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ ?>
                        
                            <article class="bloc-article col-4">
                                <a href="partenaire.php?id=<?= $data['id'] ?>">
                                    <figure><img class="redimension" src="data/partenaire/en_avant/<?= $data['image_avant'] ?>" alt="<?= $data['name'] ?>" /></figure>
                                    <div class="contenu-article">
                                        <p class="nom-partenaire"><?= $data['name'] ?></p>
                                        <p><?php 
                                            if(isset($data['metier'])){
                                                $mot = explode(";", $data['metier']);
                                                $nbmot = count($mot);
                                                for($i=0; $i<$nbmot; $i++){?>
                                                    <span class="mot-cle"><?php echo $mot[$i]; ?></span>
                                        <?php } 
                                        }?>  </p>
                                    </div>
                                </a>
                            </article>
                            <?php } ?>
                        </div>
                    </section>
                </div>
                <?php if($nbPage>1){?>
                <div class="pagination pagination-centrer">
                <?php if($_GET['page'] != 1){?>
                <a href="listepartenaire.php?page=1"><img src="img/fleche-gauche-02-gris.png" alt="première page" ></a>
                <a href="listepartenaire.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page - 1;
                    echo $page;
                         ?>"><img src="img/fleche-gauche-01-gris.png" alt="page avant" ></a>   
                <?php } 
                for($i=1; $i <= $nbPage; $i++){?>
                    <a href="listepartenaire.php?page=<?= $i ?>"
                       <?php if($i == $_GET['page']){ ?> class="active"<?php } ?> ><?= $i ?></a>
                <?php } 
                if($_GET['page'] != $nbPage){?>
                <a href="listepartenaire.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page + 1;
                    echo $page;
                         ?>"><img src="img/fleche-droite-01-gris.png" alt="page après" ></a>
                <a href="listepartenaire.php?page=<?= $nbPage ?>"><img src="img/fleche-droite-02-gris.png" alt="dernière page" ></a>
                <?php } ?>
            </div>
            <?php } ?>
            <section class="formulaire-partenaire">
                <div class="contour">
                    <h1 class="titre-page titre-danspage">Vous êtes partenaire ?</h1>
                    <p class="text-form-partenaire">Si vous souhaitez que votre profil soit mis en avant, vous pouvez remplir notre petit formulaire.</p>
                    <div class="centre">
                        <p class="bouton_part">
                            <a href="form_partenariat.php" class="a-part">accéder au formulaire</a>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
        
    <?php include('includes/footer.php'); ?>       
        
        
</body>
</html>
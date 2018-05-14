<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

$bancal = $db->prepare('SELECT * FROM partenaire WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Partenaire - Revue Bancal</title>
		<?php include('includes/head.php'); ?>
	</head>
<body>
    
    <?php include('includes/header.php'); ?>
    
    <div class="fond-noir-partenaire">  
        <div class="fond-partenaire">
            <div class="wrapper row no-padding">
                <div class="marg-1 col-10 haut-partenaire col-12-t marg-0-t">
                    <figure><img src="data/partenaire/en_avant/<?php echo $data['image_avant'] ?>" alt="<?php echo $data['name'] ?>" /></figure>
                    <div class="info-partenaire">
                        <h1><?php echo $data['name'] ?></h1>
                        <p class="partenaire-accroche"><?php echo $data['accroche'] ?></p>
                        <p><?php 
                            if(isset($data['metier'])){
                                $mot = explode(";", $data['metier']);
                                $nbmot = count($mot);
                                for($i=0; $i<$nbmot; $i++){?>
                                    <span class="mot-cle"><?php echo $mot[$i]; ?></span>
                            <?php }
                            }?>  </p>
                    </div>
                    <?php if(!isset($data['lien_facebook']) AND !isset($data['lien_twitter']) AND !isset($data['lien_instagram']) AND !isset($data['lien_soundcloud']) AND !isset($data['lien_youtube']) AND !isset($data['lien_email'])){
                    }else{ ?>
                    <div class="artiste-reseau widget">
                        <p>Retrouvez l'artiste sur :</p>
                        <ul>
                            <?php if(isset($data['lien_facebook'])){?>
                            <li><a href="<?php echo $data['lien_facebook'] ?>">Facebook</a></li>
                            <?php } ?>
                            <?php if(isset($data['lien_twitter'])){?>
                            <li><a href="<?php echo $data['lien_twitter'] ?>">Twitter</a></li>
                            <?php } ?>
                            <?php if(isset($data['lien_instagram'])){?>
                            <li><a href="<?php echo $data['lien_instagram'] ?>">Instagram</a></li>
                            <?php } ?>
                            <?php if(isset($data['lien_soundcloud'])){?>
                            <li><a href="<?php echo $data['lien_soundcloud'] ?>">Soundcloud</a></li>
                            <?php } ?>
                            <?php if(isset($data['lien_youtube'])){?>
                            <li><a href="<?php echo $data['lien_youtube'] ?>">Youtube</a></li>
                            <?php } ?>
                            <?php if(isset($data['lien_email'])){?>
                            <li><a href="mailto:<?php echo $data['lien_email'] ?>" class="rs mail">Mail</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="fond-pattern">
        <div class="wrapper row">
            <section class="marg-1 col-10 marg-mobile col-12-m">
                <div class="fond-blanc padding-partenaire">
                <div class="article-contenu">
                    <p>
                        <?php if(isset($data['contenus_bio'])){ ?>
                            <h2>Biographie</h2>
                            <?php echo $data['contenus_bio'];
                        } ?>
                        <?php if(isset($data['contenus_actu'])){ ?>
                            <h2>Actu</h2>
                            <?php echo $data['contenus_actu'];
                         } ?>
                        <?php if(isset($data['contenus_projet'])){ ?>
                            <h2>Projet</h2>
                            <?php echo $data['contenus_projet'];
                        } ?>
                    </p>
                </div>
                </div>    
            </section>
        </div>
        <div class="wrapper">
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
<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

//on recherche les deux derniers articles inserés dans la base
$bancal = $db->prepare('SELECT * FROM article LEFT JOIN categories ON categories.id_categorie = category_id ORDER BY article.created DESC LIMIT 2');
//on execute la requete
$bancal->execute();

$content1 = "partenariats";
$content2 = "edition";
$content3 = "a_propos";

//on recherche le le contenu editable de la partie partenaire
$partenaire = $db->prepare('SELECT * FROM content WHERE page = :p');
$partenaire->bindParam(':p', $content1, PDO::PARAM_INT);
$partenaire->execute();
$dataPart = $partenaire->fetch(PDO::FETCH_ASSOC);

//on recherche le le contenu editable de la partie edition
$edition = $db->prepare('SELECT * FROM content WHERE page = :p');
$edition->bindParam(':p', $content2, PDO::PARAM_INT);
$edition->execute();
$edition->execute();
$dataEd = $edition->fetch(PDO::FETCH_ASSOC);

//on recherche le le contenu editable de la partie a propos
$apropos = $db->prepare('SELECT * FROM content WHERE page = :p');
$apropos->bindParam(':p', $content3, PDO::PARAM_INT);
$apropos->execute();
$dataAprop = $apropos->fetch(PDO::FETCH_ASSOC);

//on recherche le images du slider
$sli = '1';
$slider = $db->prepare('
SELECT id, created, slider, image_slider, category_id, NULL as name, NULL as auteur, titre
FROM article 
WHERE slider = :s

UNION

SELECT id, created, slider, image_slider, NULL as category_id, name, NULL as auteur, NULL as titre
FROM partenaire
WHERE slider = :s

UNION

SELECT id, created, slider, image_slider, NULL as category_id, NULL as name, auteur, titre 
FROM ouvrages 
WHERE slider = :s

ORDER BY created
LIMIT 5');



$slider->bindParam(':s', $sli, PDO::PARAM_INT);
$slider->execute();



?>
<!DOCTYPE html>
<html lang="fr">
	<head>
        <?php include('includes/head.php'); ?>
		<title>Revue Bancal</title>
        <link href="css/jquery.bxslider.css" rel="stylesheet">
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
		<script type="text/javascript">
            $(document).ready(function(){ 
                $('.bxslider').bxSlider({
                    auto: true,
                    controls: false,
                    default: 1000,
                    nextSelector: '#slider-next',
                    prevSelector: '#slider-prev',
                    nextText: 'Onward →',
                    prevText: '← Go back'
                }); 
            });
		</script> 
	</head>
<body>
    
    <?php include('includes/header.php'); ?>
    <?php include('includes/categories.php'); ?>   
    
    <div class="fond-pattern">
        <div class="wrapper">
        <?php flash_out(); ?>
            <div class="col-12">
                <section class="slider">
                    <ul class="bxslider">
                    <?php while($dataSlider = $slider->fetch(PDO::FETCH_ASSOC)){ 
                        if(isset($dataSlider['category_id'])){ ?>
  				          <li><a href="article.php?id=<?= $dataSlider['id'] ?>"><img src="data/slider/<?= $dataSlider['image_slider'] ?>" alt="<?= $dataSlider['titre'] ?>" /></a></li>
                        <?php }
                        if(isset($dataSlider['name'])){ ?>
                            <li><a href="partenaire.php?id=<?= $dataSlider['id'] ?>" alt="<?= $dataSlider['name'] ?>"><img src="data/slider/<?= $dataSlider['image_slider'] ?>" /></a></li>
                        <?php }
                        if(isset($dataSlider['auteur'])){ ?>
                            <li><a href="listeouvrage.php"><img src="data/slider/<?= $dataSlider['image_slider'] ?>" alt="<?= $dataSlider['titre'] ?>"/></a></li>
                        <?php } 
                    }?>
				    </ul>
        		</section>
            </div>
            <section class="derniers-articles">
                <h1 class="titre-page">Derniers articles</h1>
                <hr class="half-rule">
                <div class="row wrapp">
                    <?php 
                    $a=0;
                    //on crée une boucle qui lit tous les réultats trouvés par la requete
                    while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ ?>
                        <article class="bloc-article col-4 col-5-t col-12-m 
                            <?php if(is_int(($a)/2)){ ?> marg-2 marg-1-t marg-mobile mar marg-bas<?php } ?>">
                            <a href="article.php?id=<?php echo $data['id'] ?>">
                            <p class="categorie"><?php echo $data['nom_categorie'] ?></p>
                            <figure><img src="data/article/en_avant/<?php echo $data['image_avant'] ?>" alt="<?php echo $data['titre'] ?>"/></figure>
                            <div class="contenu-article">
                                <p class="date-article"><?php echo dateEU($data['created']) ?></p>
                                <p class="titre-article"><?php echo $data['titre'] ?></p>
                                <p class="accroche-article">
                                    <?php 
                                        $max = 195;
                                        $chaine = $data['accroche'];
                                        if(strlen($chaine) > $max){
                                            $chaine = substr($data['accroche'],0,$max);
                                            $espace = strrpos($chaine," ");
                                            $chaine = substr($data['accroche'],0,$espace)."...";
                                        
                                        }
                                        echo $chaine;
                                    ?>
                                </p>
                                <p>
                                <?php 
                                    if(isset($data['mots_cles'])){
                                        $mot = explode(";", $data['mots_cles']);
                                        $nbmot = count($mot);
                                        for($i=0; $i<$nbmot; $i++){?>
                                            <span class="mot-cle"><?php echo $mot[$i]; ?></span>
                                <?php } 
                                }?> 
                                </p>
                            </div>
                            </a>
                        </article>
                    <?php $a++; } ?>
                </div>
                <p class="pbtn"><a href="listearticle.php" class="button">Plus d'article</a></p>
            </section>
        </div>
    </div>
    <div class="fond-newsletter">
        <div class="wrapper">
            <section class="newsletter">
                <form action="core/addNewsletter.php" method="post">
                    <h1 class="titre-page-news">Newsletter</h1>
                    <hr class="half-rule">
                    <p>Inscrivez-vous à notre newsletter et recevez des actualités toutes les semaines</p>
                    <input type="text" placeholder="Entrez votre mail ici..." name="email" id="email">
                    <button class="button">s'abonner</button>
                </form>
            </section>
        </div>
    </div>
    
    <div class="wrapper"> 
        <section class="presentation row wrap">
            <div class="col-4 col-12-m pres">
                <a href="<?= $dataPart['lien'] ?>">
                    <figure><img src="data/contenu/<?= $dataPart['image'] ?>" alt="<?= $dataPart['titre'] ?>"></figure>
                    <h2><?= $dataPart['titre'] ?></h2>
                    <p><?= $dataPart['content'] ?></p>
                </a>
            </div>
            <div class="col-4 col-12-m pres">
                <a href="<?= $dataEd['lien'] ?>">
                    <figure><img src="data/contenu/<?= $dataEd['image'] ?>" alt="<?= $dataEd['titre'] ?>"></figure>
                    <h2><?= $dataEd['titre'] ?></h2>
                    <p><?= $dataEd['content'] ?></p>
                </a>
            </div>
            <div class="col-4 col-12-m pres">
                <a href="<?= $dataAprop['lien'] ?>">
                    <figure><img src="data/contenu/<?= $dataAprop['image'] ?>" alt="<?= $dataAprop['content'] ?>"></figure>
                    <h2><?= $dataAprop['titre'] ?></h2>
                    <p><?= $dataAprop['content'] ?></p>
                </a>
            </div>
        </section>
    </div>
    
    <?php include('includes/footer.php'); ?>
        
        
</body>
</html>
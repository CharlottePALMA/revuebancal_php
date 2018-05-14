<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

if(!isset($_GET['page'])){
    redirect('categorie.php?nom_categorie='.$_GET['nom_categorie'].'&page=1');
}


$categoriepage = $db->prepare('SELECT * FROM categories WHERE nom_categorie = :nc');
$categoriepage->bindParam(':nc', $_GET['nom_categorie'], PDO::PARAM_INT);
$categoriepage->execute();
$dataCategoriePage = $categoriepage->fetch(PDO::FETCH_ASSOC);

$nbElementPage = 8;
$un = 1;
$debutElementPage = ($_GET['page'] - $un) * $nbElementPage;

$nbElement = $db->prepare('SELECT * FROM article WHERE category_id = :c');
$nbElement->bindParam(':c', $dataCategoriePage['id_categorie'], PDO::PARAM_INT);
$nbElement->execute();

$count = $nbElement->rowCount();

$nbPage = ceil($count / $nbElementPage);

$enune = "1";
$une = $db->prepare('SELECT * FROM article WHERE a_la_une = :u');
$une->bindParam(':u', $enune, PDO::PARAM_INT);
$une->execute();

$bancal = $db->prepare('
SELECT * 
FROM article 
WHERE category_id = :c
ORDER BY article.created DESC 
LIMIT :p, :n');
$bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
$bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);
$bancal->bindParam(':c', $dataCategoriePage['id_categorie'], PDO::PARAM_INT);

//on execute la requete
$bancal->execute();
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Article - Revue Bancal</title>
        <?php include('includes/head.php'); ?>
	</head>
<body>
    
    <?php include('includes/header.php'); ?>  
    <?php include('includes/categories.php'); ?>
    
    
    <div class="fond-pattern liste-article">
        <div class="wrapper">
        <?php flash_out(); ?>
            <section class="derniers-articles">
                <h1 class="titre-page"><?= $dataCategoriePage['nom_categorie'] ?></h1>
                <hr class="half-rule">
                <div class="row">
                    <section class="col-7 col-12-t marg-1 marg-mobile">
                        <div class="row marge-bas row-wrap wrap">
                        <?php
                        while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ ?>
                        
                            <article class="bloc-article">
                                <a href="article.php?id=<?= $data['id'] ?>">
                                    <p class="categorie"><?= $dataCategoriePage['nom_categorie'] ?></p>
                                    <figure><img src="data/article/en_avant/<?= $data['image_avant'] ?>" alt="<?= $data['titre'] ?>" /></figure>
                                    <div class="contenu-article">
                                        <p class="date-article"><?= dateEU($data['created']) ?></p>
                                        <p class="titre-article"><?= $data['titre'] ?></p>
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
                                    ?></p>
                                        <p> <?php 
                                            if(isset($data['mots_cles'])){
                                            $mot = explode(";", $data['mots_cles']);
                                            $nbmot = count($mot);
                                            for($i=0; $i<$nbmot; $i++){?>
                                                <span class="mot-cle"><?php echo $mot[$i]; ?></span>
                                            <?php }
                                            }?> </p>
                                    </div>
                                </a>
                            </article>
                        <?php 
                        } ?>
                        </div>
                    </section>
                    <section class="col-3 bloc-droite widget">
                        <section class="dernier-article bloc-liste">
				            <h2>Derniers articles</h2>
				            <?php 
                            //on crée une boucle qui lit tous les réultats trouvés par la requete
                            while($dataUne = $une->fetch(PDO::FETCH_ASSOC)){ ?>
                                <p><a href="article.php?id=<?= $dataUne['id'] ?>" class="bloc-derniers-articles"><?= $dataUne['titre'] ?></a></p>
                            <?php } ?>
					   </section>
					   <section class="bloc-newsletter">
                           <h2>Newsletter</h2>
                           <p class="description-news">Inscrivez-vous à notre newsletter et recevez des actualités toutes les semaines.</p>
                           <form action="core/addNewsletter.php" method="post">
                               <p>
                                   <input type="text" name="email" id="name">
                               </p>
                               <p>
                                   <button class="button">S'abonner</button>
                               </p>
                           </form>
                        </section>
					   <section class="bloc-facebook">
                           <h2>Facebook</h2>
                           <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Frevuebancal&tabs=timeline&width=264&height=70&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="264" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					   </section>
                    </section>
                </div>
                <?php if($nbPage>1){?>
                <div class="pagination pagination-centrer">
                <?php if($_GET['page'] != 1){?>
                <a href="listearticle.php?page=1"><img src="img/fleche-gauche-02-gris.png" alt="première page" ></a>
                <a href="listearticle.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page - 1;
                    echo $page;
                         ?>"><img src="img/fleche-gauche-01-gris.png" alt="page avant" ></a>   
                <?php } 
                for($i=1; $i <= $nbPage; $i++){?>
                    <a href="listearticle.php?page=<?= $i ?>"
                       <?php if($i == $_GET['page']){ ?> class="active"<?php } ?> ><?= $i ?></a>
                <?php } 
                if($_GET['page'] != $nbPage){?>
                <a href="listearticle.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page + 1;
                    echo $page;
                         ?>"><img src="img/fleche-droite-01-gris.png" alt="page après" ></a>
                <a href="listearticle.php?page=<?= $nbPage ?>"><img src="img/fleche-droite-02-gris.png" alt="dernière page" ></a>
                <?php } ?>
            </div>
            <?php } ?>
            </section>
        </div>
    </div>
    
    <?php include('includes/footer.php'); ?>
        
        
</body>
</html>
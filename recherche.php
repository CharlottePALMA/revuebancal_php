<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 
//var_dump($_POST);
    $nbElementPage = 8;
    $un = 1;

    if(isset($_POST['page'])&&!empty($_POST['page'])){
        $debutElementPage = ($_POST['page'] - $un) * $nbElementPage;
    }else{
        $debutElementPage = 0;
    }
    
    $nbElementO = $db->prepare('SELECT * FROM ouvrages');
    $nbElementO->execute();
    $countO = $nbElementO->rowCount();
    
    $nbElementA = $db->prepare('SELECT * FROM article');
    $nbElementA->execute();
    $countA = $nbElementA->rowCount();
    
    $nbElementP = $db->prepare('SELECT * FROM partenaire');
    $nbElementP->execute();
    $countP = $nbElementP->rowCount();
    
    $count = $countP + $countA + $countO;
    
    $nbPage = ceil($count / $nbElementPage);
//
    if(empty($_POST['s'])){
        //var_dump($_POST);
        $queryArray = array();
        if(!empty($_POST['c1'])){
            $queryArray[] = "SELECT id, created, titre, NULL as name, accroche, image_avant, mots_cles, NULL as metier, category_id, NULL as couverture, NULL as auteur, NULL as date_ouvrage, NULL as prix_broche, NULL as prix_epub 
            FROM article ";
        } 
        if(!empty($_POST['c2'])){
            $queryArray[] = "SELECT id, created, NULL as titre, name, accroche, image_avant, NULL as mots_cles, metier, NULL as category_id, NULL as couverture, NULL as auteur, NULL as date_ouvrage, NULL as prix_broche, NULL as prix_epub 
            FROM partenaire";
        }    
        if(!empty($_POST['c3'])){
            $queryArray[] = "SELECT id, created, titre, NULL as name, accroche, NULL as image_avant, NULL as mots_cles, NULL as    metier, NULL as category_id, couverture, auteur, date_ouvrage, prix_broche, prix_epub 
            FROM ouvrages";
        }

        $queryString = implode(' UNION ', $queryArray);
        
        $bancal = $db->prepare($queryString .'
        ORDER BY created DESC
        LIMIT :p, :n
        ');
        $bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
        $bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);


//echo $queryString;

//si il y a quelque chose dns le get 
}else{

	$bancal = $db->prepare('
SELECT id, created, titre, NULL as name, accroche, image_avant, mots_cles, NULL as metier, category_id, NULL as couverture, NULL as auteur, NULL as date_ouvrage, NULL as prix_broche, NULL as prix_epub 
FROM article 
WHERE titre LIKE :t1 OR accroche LIKE :t1 OR mots_cles LIKE :t1

UNION

SELECT id, created, NULL as titre, name, accroche, image_avant, NULL as mots_cles, metier, NULL as category_id, NULL as couverture, NULL as auteur, NULL as date_ouvrage, NULL as prix_broche, NULL as prix_epub 
FROM partenaire 
WHERE name LIKE :t2 OR accroche LIKE :t2 OR metier LIKE :t2

UNION

SELECT id, created, titre, NULL as name, accroche, NULL as image_avant, NULL as mots_cles, NULL as metier, NULL as category_id, couverture, auteur, date_ouvrage, prix_broche, prix_epub 
FROM ouvrages 
WHERE titre LIKE :t3 OR accroche LIKE :t3 OR auteur LIKE :t3

ORDER BY created DESC
LIMIT :p, :n
');
    
    
	//on crée une variable car bindparam aime pas les operations (les % servent a dire qu'on cherche s avec peut-être quelque chose avant ou après (on ne cherche pas s strict))
	$recherche = '%'.$_POST['s'].'%';    
    
	
    //on ajoute le paramètres de requetes (= mot correspondant) (STR = sting = chaine caractere)
	if(isset($_POST['c1'])){
        $bancal->bindParam(':t1', $recherche, PDO::PARAM_STR);
    }else{
        $bancal->bindParam(':t1', $nul, PDO::PARAM_STR);
    }
    if(isset($_POST['c2'])){
        $bancal->bindParam(':t2', $recherche, PDO::PARAM_STR);
    }else{
        $bancal->bindParam(':t2', $nul, PDO::PARAM_STR);    
    }
    if(isset($_POST['c3'])){
        $bancal->bindParam(':t3', $recherche, PDO::PARAM_STR);
    }else{
        $bancal->bindParam(':t3', $nul, PDO::PARAM_STR);
    }
    $bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
    $bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);
    
    
//fin si
}

$bancal->execute();



$cat = $db->prepare('SELECT * FROM categories');
$cat->execute();

$count = $cat->rowCount();



$enune = "1";

$une = $db->prepare('SELECT * FROM article WHERE a_la_une = :u');
$une->bindParam(':u', $enune, PDO::PARAM_INT);
$une->execute();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Recherche - Revue Bancal</title>
		<?php include('includes/head.php'); ?>
	</head>
<body>
    
    <?php include('includes/header.php'); ?>       
    <?php include('includes/categories.php'); ?>   
    
    <div class="fond-pattern liste-article">
        <div class="wrapper">
        <?php flash_out(); ?>
            <section class="derniers-articles">
                <h1 class="titre-page">Recherche</h1>
                <hr class="half-rule">

                <form action="recherche.php" method="post">
                    <div class="row">
                        <div class="col-6 marg-3 marge-bas2 col-12-t marg-0-t" >
                            <p>
                                <input name="s" type="text" class="fond" placeholder="Votre recherche" id="search" value="<?php 
			//si $_POST['s'] n'est pas vide on l'affiche
			if(!empty($_POST['s']))
				echo $_POST['s'] ?>">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 marg-2 col-12-t marg-0-t">
                            <div class="row align-vertical centre wrap" >
                                <div class="col-3 col-4-t col-12-m">
                                <input type="checkbox" name="c1" id="article" value="article"
                                    <?php if(isset($_POST['c1'])){?>
                               checked        
                                    <?php } ?>
                                    <?php if(!isset($_POST['s']) and !isset($_POST['c1']) and !isset($_POST['c2']) and !isset($_POST['c3'])){?>
                               checked        
                                    <?php } ?>
                                       ><label class="pad-droite" for="article">Article</label>
                                </div>
                                <div class="col-3 col-4-t col-12-m">
                                <input type="checkbox" name="c2" id="partenaire" value="partenaire"
                                    <?php if(isset($_POST['c2'])){?>
                               checked        
                                    <?php } ?>
                                    <?php if(!isset($_POST['s']) and !isset($_POST['c1']) and !isset($_POST['c2']) and !isset($_POST['c3'])){?>
                               checked        
                                    <?php } ?>><label class="pad-droite" for="partenaire">Partenariat</label>
                                </div>
                                <div class="col-3 col-4-t col-12-m">
                                <input type="checkbox" name="c3" id="ouvrage" value="ouvrage"
                                    <?php if(isset($_POST['c3'])){?>
                               checked        
                                    <?php } ?>
                                    <?php if(!isset($_POST['s']) and !isset($_POST['c1']) and !isset($_POST['c2']) and !isset($_POST['c3'])){?>
                               checked     
                                    <?php } ?>><label class="pad-droite" for="ouvrage">Ouvrages</label>
                                    
                                </div>
                            
                                <div class="col-3 col-12-t">
                                    <button class="button droite button-recherche">Rechercher</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="page" id="page" value="0">
                </form>
                    <div class="row" id="resultats">
                        <section class="col-7 col-12-t marg-1 marg-0-t marg-mobile">
                        <div class="row marge-bas row-wrap wrap">
                        <?php
                        while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ 
                            if(isset($data['category_id'])){?>
                            <article class="bloc-article col-4">
                                <a href="article.php?id=<?= $data['id'] ?>">
                                    <p class="categorie">
                                        <?php 
                                            $cate = $db->prepare('SELECT * FROM categories WHERE id_categorie = :i');
                                            $cate->bindParam(':i', $data['category_id'], PDO::PARAM_INT);
                                            $cate->execute();
                                            $dataCat = $cate->fetch(PDO::FETCH_ASSOC);      
                                        echo $dataCat['nom_categorie']; ?></p>
                                    <figure><img src="data/article/en_avant/<?= $data['image_avant'] ?>" alt="<?= $data['titre'] ?>" /></figure>
                                    <div class="contenu-article">
                                        <p class="date-article"><?= dateEU($data['created']) ?></p>
                                        <p class="titre-article"><?= $data['titre'] ?></p>
                                        <p class="accroche-article"><?php 
                                        $max = 195;
                                         $chaine = $data['accroche'];
                                        if(strlen($chaine) > $max){
                                            $chaine = substr($data['accroche'],0,$max);
                                            $espace = strrpos($chaine," ");
                                            $chaine = substr($data['accroche'],0,$espace)."...";
                                        }
                                        echo $chaine;
                                    ?></p>
                                        <p><?php 
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
                            }
                        if(isset($data['name'])){?>
                            <article class="bloc-article col-4">
                                <a href="partenaire.php?id=<?= $data['id'] ?>">
                                    <figure>
                                        <img class="redimension" src="data/partenaire/en_avant/<?= $data['image_avant'] ?>" alt="<?= $data['name'] ?>" /></figure>
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
                        <?php 
                            } 
                        
                        if(isset($data['auteur'])){?>
                            <article class="bloc-article col-4 contenu-ouvrage">
                                <a href="listeouvrage.php">
                                <figure class="align-bloc">
                                    <img class="img-bloc-image" src="data/ouvrage/couv/<?= $data['couverture'] ?>" alt="<?= $data['titre'] ?>" />
                                </figure>
                                <div class="align-bloc decal-droite">
                                    <h1 class="titre-article titre-blocouvrage"><?= $data['titre'] ?></h1>
                                    <p class="auteur-ouvrage"><?= $data['auteur'] ?></p>
                                    <p class="date-article"><?= dateEU($data['date_ouvrage']) ?></p>
                                    <p class="prix">Broché : <?= $data['prix_broche']; 
                                        if(isset($data['epub'])){?>
                                            <br>E-Pub : '<?= $data['prix_epub']; } ?></p>
                                </div>
                                <div>
                                    <p class="accroche-article"><?php 
                                        $max = 320;
                                        $chaine = $data['accroche'];
                                        if(strlen($chaine) > $max){
                                            $chaine = substr($data['accroche'],0,$max);
                                            $espace = strrpos($chaine," ");
                                            $chaine = substr($data['accroche'],0,$espace)."...";
                                        }
                                        echo $chaine;
                                    ?></p>
                                </div>
                                </a>
                            </article>
                        
                        <?php 
                            }
                            
                        if(!isset($data['auteur']) && !isset($data['category_id']) && !isset($data['name'])){?>
                            <article class="col-12">
                                <p>Il n'y a pas de résutats pour cette recherche.</p>
                            </article>
                        
                        <?php 
                            }
                        
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
                        <?php if(isset($_POST['page'])){
                                $getpage = $_POST['page'];
                            }else{
                                $getpage = 1;
                        } ?>      
                        <?php if($getpage != 1){?>
                            <a href="#resultats" data-page="1"><img src="img/fleche-gauche-02-gris.png" alt="première page" ></a>
                            <a href="#resultats" data-page="<?php
                            $page = $getpage;
                            $page = $page - 1;
                                echo $page;
                            ?>"><img src="img/fleche-gauche-01-gris.png" alt="page avant" ></a>   
                            <?php } 
                            for($i=1; $i <= $nbPage; $i++){?>
                            <a href="#resultats" data-page="<?= $i ?>"
                            <?php if($i == $getpage){ ?> class="active"<?php } ?> ><?= $i ?></a>
                            <?php } 
                                if($getpage != $nbPage){?>
                            <a href="#resultats" data-page="<?php
                            $page = $getpage;
                            $page = $page + 1;
                            echo $page;
                            ?>"><img src="img/fleche-droite-01-gris.png" alt="page après" ></a>
                            <a href="#resultats" data-page="<?= $nbPage ?>"><img src="img/fleche-droite-02-gris.png" alt="dernière page" ></a>                        
                    </div>
                    <?php } 
                    
                    }?>
                
            </section>
        </div>
    </div>
        
    <?php include('includes/footer.php'); ?>
        
</body>
</html>
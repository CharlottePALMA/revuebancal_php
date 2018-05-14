<?php include('config/settings.php'); 

include('includes/debutPhp.php'); 

$bancal = $db->prepare('SELECT * FROM article WHERE id = :i');
$bancal->bindParam(':i', $_GET['id'], PDO::PARAM_INT);
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);

$auteur = $db->prepare('SELECT * FROM user WHERE nom = :n');
$auteur->bindParam(':n', $data['editeur_article'], PDO::PARAM_INT);
$auteur->execute();

$dataAuteur = $auteur->fetch(PDO::FETCH_ASSOC);

$commentaire = $db->prepare('SELECT * FROM commentaire WHERE id_article = :a');
$commentaire->bindParam(':a', $data['id'], PDO::PARAM_INT);
$commentaire->execute();

$enune = "1";

$une = $db->prepare('SELECT * FROM article WHERE a_la_une = :u');
$une->bindParam(':u', $enune, PDO::PARAM_INT);
$une->execute();

?><!DOCTYPE html>
<html lang="fr">
	<head>
        <?php include('includes/head.php'); ?>
		<title>Article - Revue Bancal</title>
        <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
	</head>
<body>
    <?php include('includes/header.php'); ?>
    <?php include('includes/categories.php'); ?>
    <?php flash_out(); ?>
   
    <div class="fond-pattern">
       <div class="wrapper article-image">
           <figure><img src="data/article/en_avant/<?php echo $data['image_avant'] ?>" alt="<?php echo $data['titre'] ?>"/></figure>
           <div class="marg-1 col-10 col-12-t">
               <div class="infos-partenaire">
                   <h1><?php echo $data['titre'] ?></h1>
                   <p class="article-auteur"><?php echo $dataAuteur['prenom'] ?> <?php echo $dataAuteur['nom'] ?></p>
                   <p class="article-date"><?php echo dateEU($data['updated']); ?></p>
                   <p class="article-accroche"><?php echo $data['accroche'] ?></p>
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
           </div>
       </div>
        <div class="wrapper row wrap">
            <section class="marg-1 col-7 col-10-t col-12-m marg-mobile">
                <div class="fond-blanc">
                <div class="article-contenu">
                    <p><?php echo $data['contenu'] ?></p>
                </div>
                <div class="informations-complementaires">
                    <ul class="partage">
                        <li><a href="http://www.facebook.com/sharer.php?u=http://www.revue-bancal.fr/article.php?id=<?php echo $data['id'] ?>/&t=<?php echo $data['titre'] ?>" target="_blank" class="facebook gauche">Facebook</a></li>
                        <li><a href="https://twitter.com/share?url=http://www.revue-bancal.fr/article.php?id=<?php echo $data['id'] ?>/&text=<?php echo $data['titre'] ?>" target="_blank" class="twitter gauche">Twitter</a></li>
                        <li><a href="mailto:?subject=Article de la Revue Bancal&body=<?= $data['titre'] ?>" class="mail gauche">Mail</a></li>                
                        <li class="droite"><a href="#">Télécharger le pdf</a></li>
                    </ul>
                    
                    
                    <div class="bloc-auteur">
                        <figure><img src=
                            <?php if(isset($dataAuteur['photo'])){?>
                            "data/user/<?php echo $dataAuteur['photo'] ?>"
                            <?php }else{ ?>
                            "data/user/profil.png" <?php } ?>
                            alt="auteur"></figure>
                        <div class="auteur">
                            <p class="infos-auteur"><?php echo $dataAuteur['prenom'] ?> <?php echo $dataAuteur['nom'] ?> <span>- Auteur</span></p>
                            <p class="desciption-auteur"><?php echo $dataAuteur['description'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="commentaires">
                    <h1 class="titre-page titre-danspage" id="com">Commentaires</h1>
                    <hr class="half-rule">
                    <?php 
			            //on crée une boucle qui lit tous les réultats trouvés par la requete
			            while($dataCommentaire = $commentaire->fetch(PDO::FETCH_ASSOC)){ ?>
                            <div class="commentaires-poste">
                                <p class="commentaire-nom"><?= $dataCommentaire['nom'] ?></p>
                                <p class="commentaire-date"><?= dateEU($dataCommentaire['created']) ?></p>
                                <p class="commentaire-commentaire"><?= $dataCommentaire['commentaire'] ?></p>
                            </div>
			                 <?php } ?>
                    <div class="commentaire-poster">
                        <form action="core/addCommentaire.php" method="post">
                            <input type="text" name="id_article" id="id_article" hidden value="<?php echo $data['id'] ?>" >
                            <p>
                                <label for="commentaire">Commentaire *</label>
                            </p>
                            <p>
                                <textarea class="com" name="commentaire" id="commentaire"></textarea>
                            </p>
                            <div class="row no-padding wrap">
                                <div class="col-6 col-12-t">
                                    <p class="form_label">  
                                        <label for="nom">Nom *</label>
                                    </p>
                                    <p>
                                        <input type="text"  name="nom" id="nom">
                                    </p>
                                </div>
                                <div class="col-6 col-12-t">
                                    <p class="form_label">
                                        <label for="email">Email *</label>
                                    </p>
                                    <p>
                                        <input type="text" name="email" id="email">
                                    </p>
                                </div>
                            </div>
                            <div class="row no-padding wrap">
                                <div class="col-12">
                                    <p class="champs-ob">
                                        Les champs marqués d'un * sont obligatoires.
                                    </p>
                                </div>
                            </div>
                            <button class="button-footer"><a href="">Envoyer</a></button>
                        </form>
                        
                    </div>
                </div>
                </div>
                <?php if(isset($data['article_associe1']) or isset($data['article_associe2'])){
                        ?> <div class="article-associe">
                            <h1 class="titre-page titre-danspage">Article Associés</h1>
                            <hr class="half-rule">
                            <div class="row"><?php
                        if(isset($data['article_associe1'])){
                            $article_associe1 = $db->prepare('SELECT * FROM article LEFT JOIN categories ON article.category_id = categories.id_categorie WHERE id = :e ');
                            $article_associe1->bindParam(':e',$data['article_associe1'], PDO::PARAM_INT);
                            $article_associe1->execute();
                            $dataArticle1 = $article_associe1->fetch(PDO::FETCH_ASSOC);
                ?>
                            <article class="bloc-article col-6 col-12-m">
                                <a href="article.php?id=<?= $dataArticle1['id'] ?>">
                                <p class="categorie"><?= $dataArticle1['nom_categorie'] ?></p>
                                <figure><img src="data/article/en_avant/<?= $dataArticle1['image_avant'] ?>" alt="<?= $dataArticle1['titre'] ?>"/></figure>
                                <div class="contenu-article">
                                    <p class="date-article"><?= dateEU($dataArticle1['created']) ?></p>
                                    <p class="titre-article"><?= $dataArticle1['titre'] ?></p>
                                    <p class="accroche-article"><?php 
                                        $max = 195;
                                        if(strlen($dataArticle1['accroche']) > $max){
                                            $chaine = substr($dataArticle1['accroche'],0,$max);
                                            $espace = strrpos($chaine," ");
                                            $chaine = substr($dataArticle1['accroche'],0,$espace)."...";
                                        }
                                        echo $chaine;
                                    ?></p>
                                    <p><?php 
                                            $mot = explode(";", $dataArticle1['mots_cles']);
                                            $nbmot = count($mot);
                                            for($i=0; $i<$nbmot; $i++){?>
                                                <span class="mot-cle"><?php echo $mot[$i]; ?></span>
                                            <?php } ?></p>
                                </div>
                            </a>
                        </article>
                <?php } 
                    if(isset($data['article_associe2'])){
                    $article_associe2 = $db->prepare('SELECT * FROM article LEFT JOIN categories ON article.category_id = categories.id_categorie WHERE id = :e ');
                    $article_associe2->bindParam(':e',$data['article_associe2'], PDO::PARAM_INT);
                    $article_associe2->execute();
                    $dataArticle2 = $article_associe2->fetch(PDO::FETCH_ASSOC);
                        
                ?>
                        <article class="bloc-article col-6 col-12-m">
                                <a href="article.php?id=<?= $dataArticle2['id'] ?>">
                                <p class="categorie"><?= $dataArticle2['nom_categorie'] ?></p>
                                <figure><img src="data/article/en_avant/<?= $dataArticle2['image_avant'] ?>" alt="<?= $dataArticle2['titre'] ?>"/></figure>
                                <div class="contenu-article">
                                    <p class="date-article"><?= dateEU($dataArticle2['created']) ?></p>
                                    <p class="titre-article"><?= $dataArticle2['titre'] ?></p>
                                    <p class="accroche-article"><?php 
                                        $max = 195;
                                        if(strlen($dataArticle2['accroche']) > $max){
                                            $chaine = substr($dataArticle2['accroche'],0,$max);
                                            $espace = strrpos($chaine," ");
                                            $chaine = substr($dataArticle2['accroche'],0,$espace)."...";
                                        }
                                        echo $chaine;
                                    ?></p>
                                    <p><?php 
                                            $mot = explode(";", $dataArticle2['mots_cles']);
                                            $nbmot = count($mot);
                                            for($i=0; $i<$nbmot; $i++){?>
                                                <span class="mot-cle"><?php echo $mot[$i]; ?></span>
                                            <?php } ?></p>
                                </div>
                            </a>
                        </article>
                    <?php } ?>
                    </div>
                </div>
            <?php   }    ?>
            </section>
            
            
            <section class="col-3 bloc-droite widget">
                <section class="dernier-article">
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
                              <input type="text" name="email" id="email">
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
    </div>
    
  
    <?php include('includes/footer.php'); ?>
        
        
        
</body>
</html>
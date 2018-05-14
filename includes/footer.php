<?php

$derniersEvent = $db->prepare('SELECT * FROM event ORDER BY date_debut DESC LIMIT 5');
//on execute la requete
$derniersEvent->execute();

$reseaux = $db->prepare('SELECT * FROM social');
//on execute la requete
$reseaux->execute();

?>
<div class="fond-footer">
        <div class="wrapper">
            <footer class="row wrap">
                <section class="liens-footer col-2 col-5-t col-12-m fm">
                    <ul>
                        <li><a <?php 
			     if($filename == 'listearticle.php' || $filename == 'article.php')
				    echo 'class="active"';
			     ?> href="listearticle.php">Revue</a></li>
                        <li><a <?php 
			     if($filename == 'listeouvrage.php')
				    echo 'class="active"';
			     ?> href="listeouvrage.php">édition</a></li>
                        <li><a <?php 
			     if($filename == 'listepartenaire.php' || $filename == 'partenaire.php')
				    echo 'class="active"';
			     ?> href="listepartenaire.php">partenariat</a></li>
                        <li><a <?php 
			     if($filename == 'apropos.php')
				    echo 'class="active"';
			     ?> href="apropos.php">à propos</a></li>
                        <li><a <?php 
			     if($filename == 'mentions.php')
				    echo 'class="active"';
			     ?> href="mentions.php">Mentions légales</a></li>
                    </ul>
                </section>
                <section class="footer-newsletter col-6 col-12-t col-12-m fm fnews ft">
                    <form action="core/addNewsletter.php" method="post">
                        <p>Inscrivez-vous à notre newsletter et recevez<br> des actualités toutes les semaines</p>
                        <p><input type="text" placeholder="Entrez votre mail ici..." name="email" id="email">
                        <button class="button-footer">s'abonner</button></p>
                    </form>                        
                </section>
                <section class="reseaux-sociaux-footer col-4 col-7-t col-12-m fm">
                    <p>Retrouvez nous sur les réseaux sociaux</p>
                    <?php
                    while($dataReseau = $reseaux->fetch(PDO::FETCH_ASSOC)){ ?>
                        <a href="<?php echo $dataReseau['link'] ?>" target="_blank" class="<?php echo $dataReseau['network'] ?>">
                            <?php echo $dataReseau['network'] ?>
                        </a>
                    <?php } ?>
                </section>
            </footer>
        </div>
    </div>
<?php

$filepath = $_SERVER['PHP_SELF'];
$filepath = explode('/', $filepath);
$filename = array_pop($filepath);

?><header>
	 <div class="container-menu">
   		<div class="wrapper">
		  <nav class="menu">
              <ul>
                  <li><a <?php 
			     if($filename == 'index.php')
				    echo 'class="active"';
			     ?> href="index.php">Accueil</a></li>
                  
                  <li><a <?php 
			     if($filename == 'page_liste_articles.php' || $filename == 'nouvel_article.php' || $filename == 'updateArticle.php')
				    echo 'class="active"';
			     ?> href="page_liste_articles.php">Articles</a></li>
                  
                  <li><a <?php 
			     if($filename == 'page_liste_partenaire.php' || $filename == 'nouveau_partenaire.php' || $filename == 'updatePartenaire.php')
				    echo 'class="active"';
			     ?> href="page_liste_partenaire.php">Partenaires</a></li>
                  
                  <li><a <?php 
			     if($filename == 'page_liste_ouvrages.php' || $filename == 'nouvel_ouvrage.php' || $filename == 'updateOuvrage.php')
				    echo 'class="active"';
			     ?> href="page_liste_ouvrages.php">Ouvrages</a></li>
                  
                  <li><a <?php 
			     if($filename == 'page_liste_evenement.php' || $filename == 'nouvel_evenement.php' || $filename == 'updateEvent.php')
				    echo 'class="active"';
			     ?> href="page_liste_evenement.php">Evenements</a></li>
                                   
                  <li><a <?php 
			     if($filename == 'page_liste_editeur.php' || $filename == 'nouvel_editeur.php' || $filename == 'updateEditeur.php')
				    echo 'class="active"';
			     ?> href="page_liste_editeur.php">Editeurs</a></li>
                 
                  <li><a <?php 
			     if($filename == 'page_liste_content.php' || $filename == 'nouveau_content.php' || $filename == 'updateContent.php')
				    echo 'class="active"';
			     ?> href="page_liste_content.php">Contenu</a></li>
                  
                  <li><a <?php 
			     if($filename == 'page_liste_slider.php' || $filename == 'page_liste_articlemoment.php' || $filename == 'page_liste_commentaires.php' || $filename == 'page_liste_newsletter.php' || $filename == 'autre.php' || $filename == 'pageCommentaire.php' || $filename == 'page_liste_social.php' || $filename == 'nouveau_reseau.php' || $filename == 'updateSocial.php')
				    echo 'class="active"';
			     ?> href="autre.php">Autres</a></li>
                  <li class="droite"><a href="../core/logout.php" id="deconnection" >Se déconnecter </a></li>
              </ul>
            </nav>
         </div> 
	</div>
</header>

<?php flash_out(); ?>
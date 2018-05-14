<div class="wrapper categories catcache">
        <ul>
            <?php 
                //on crée une boucle qui lit tous les réultats trouvés par la requete
                foreach($datacategoriesH as $datacategories){  ?>
                    <li><a <?php 
                    
			     if(isset($_GET['nom_categorie']) && $_GET['nom_categorie'] == $datacategories['nom_categorie'])
				    echo 'class="active"';
			     ?> href="categorie.php?nom_categorie=<?php echo $datacategories['nom_categorie'] ?>"><?php echo $datacategories['nom_categorie'] ?></a></li>
            <?php } ?>
            <li class="droite li-agenda">
                <a href="agenda.php" id="agenda">Agenda</a>
                <ul class="ul_agenda">
					<?php 
                    //on crée une boucle qui lit tous les réultats trouvés par la requete
                    while($dataDernierEvent2 = $derniersEvent2->fetch(PDO::FETCH_ASSOC)){ ?>
                        <li>
                            <a href="<?php echo $dataDernierEvent2['lien'] ?>" target="_blank">
                                <div class="ouvert"><p><?php echo dateEU($dataDernierEvent2['date_debut']) ?></p></div>
                                <div class="ouvert">
                                    <p><?php echo $dataDernierEvent2['titre'] ?></p>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
	           </ul>
            </li>
        </ul>
    </div>
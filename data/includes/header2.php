<header class="header-top-revu">
        <div class="wrapper">
            <ul>
                <li><a <?php 
			     if($filename == 'listearticle.php' || $filename == 'article.php')
				    echo 'class="active"';
			     ?> href="listearticle.php">Revue</a></li>
                <li><a <?php 
			     if($filename == 'listeouvrage.php')
				    echo 'class="active"';
			     ?> href="listeouvrage.php">éditions</a></li>
                <li><a <?php 
			     if($filename == 'listepartenaire.php' || $filename == 'partenaire.php')
				    echo 'class="active"';
			     ?> href="listepartenaire.php">Partenariat</a></li>
                <li><a <?php 
			     if($filename == 'apropos.php')
				    echo 'class="active"';
			     ?> href="apropos.php">à propos</a></li>
                <li class="cacher">
                    <a <?php 
			         if($filename == 'agenda.php')
				        echo 'class="active"';
			         ?>href="agenda.php">Agenda</a>
                    <ul>
                    <?php 
                    //on crée une boucle qui lit tous les réultats trouvés par la requete
                    while($dataDernierEvent = $derniersEvent->fetch(PDO::FETCH_ASSOC)){ ?>
                        <li>
                            <a href="<?php echo $dataDernierEvent['lien'] ?>">
                                <div class="date-event-moment agenda-ouvert"><p><?php echo dateEU($dataDernierEvent['date_debut']) ?></p></div>
                                <div class="infos-event-moment agenda-ouvert"><p><?php echo $dataDernierEvent['titre'] ?></p></div>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </li>
            </ul>
            <ul>
                <form action="recherche.php" method="post">
                    <?php
                    while($dataReseau = $reseaux->fetch(PDO::FETCH_ASSOC)){ ?>
                    <li class="droite">
                        <a href="<?php echo $dataReseau['link'] ?>" target="_blank" class="icone <?php echo $dataReseau['network'] ?>">
                            <?php echo $dataReseau['network'] ?>
                        </a>
                    </li>
                    <?php } ?>
                    <li class="droite"><a href="#" class="icone visible" id="recherche">Recherche</a></li>
                    <li class="droite cache valider">
                        <button class="icone" id="recherche2">Recherche</button>
                    </li>
                    <li class="droite">
                        <input id="rechercher" class="rechercher cache" type="text" name="s" placeholder="Votre recherche">
                    </li>
                    <input type="checkbox" name="c1" value="article" checked hidden>
                    <input type="checkbox" name="c2" value="partenaire" checked hidden>
                    <input type="checkbox" name="c3" value="ouvrage" checked hidden>
                    
                </form>
            </ul>
            <h1><a href="index.php"><img src="../img/bancal.png" alt="logo" /></a></h1>
        </div>
    </header>
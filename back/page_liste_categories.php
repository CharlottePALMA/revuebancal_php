<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}

if(isset($_GET['page'])){
        $debutElementPage = ($_GET['page'] - $un) * $nbElementPage;
    }else{
        $debutElementPage = 0;
    }

$nbElementPage = 15;
$un = 1;

$nbElement = $db->prepare('SELECT * FROM categories');
$nbElement->execute();

$count = $nbElement->rowCount();

$nbPage = ceil($count / $nbElementPage);


$bancal = $db->prepare('SELECT * FROM categories ORDER BY nom_categorie DESC LIMIT :p, :n');

$bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
$bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);

//on execute la requete
$bancal->execute();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Categories - Back Office</title>
        <?php include('../includes/head_back.php'); ?>
    </head>
<body>
    <?php include('../includes/header_back.php'); ?>
    <div class="wrapper">
        <div class="bloc-page liste-page">
            <section class="entete-page">
                <div class="row">
                        <h1 class="titre-page">Catégories</h1>
                        <a href="nouvelle_categorie.php" class="button-page">Nouvelle catégorie</a>
                </div>
            </section>
            <section class="module-recherche">
                <div class="wrapper">
                    <div class="row">
                        <div class= "col-10 marg-1">
                            <table class="table-box">
                                <tr class="table-row">
                                    <td>Nom</td>
                                    <td>Suppression</td>
                                </tr>
                                <?php 
			                     //on cree une boucle qui lit tous les résultats trouvés par la requete
			                     while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ ?>
				                <tr>
					               <td><a href="updateCategories.php?id=<?= $data['id_categorie'] ?>">
						              <?= $data['nom_categorie']; ?>
					                   </a></td>
                                    <td><a href="../core/deleteCategories.php?id=<?= $data['id_categorie'] ?>">Supprimer</a></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <?php if($nbPage>1){?>
            <div class="pagination pagination-centrer">
                <?php if($_GET['page'] != 1){?>
                <a href="page_liste_categories.php?page=1"><img src="../img/fleche-gauche-02-gris.png" alt="première page" ></a>
                <a href="page_liste_categories.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page - 1;
                    echo $page;
                         ?>"><img src="../img/fleche-gauche-01-gris.png" alt="page avant" ></a>   
                <?php } 
                for($i=1; $i <= $nbPage; $i++){?>
                    <a href="page_liste_categories.php?page=<?= $i ?>"
                       <?php if($i == $_GET['page']){ ?> class="active"<?php } ?> ><?= $i ?></a>
                <?php } 
                if($_GET['page'] != $nbPage){?>
                <a href="page_liste_categories.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page + 1;
                    echo $page;
                         ?>"><img src="../img/fleche-droite-01-gris.png" alt="page après" ></a>
                <a href="page_liste_categories.php?page=<?= $nbPage ?>"><img src="../img/fleche-droite-02-gris.png" alt="dernière page" ></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>

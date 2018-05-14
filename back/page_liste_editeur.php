<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}

$nbElementPage = 15;
$un = 1;

if(isset($_GET['page'])){
        $debutElementPage = ($_GET['page'] - $un) * $nbElementPage;
    }else{
        $debutElementPage = 0;
    }

if(empty($_POST['s'])){
    $nbElement = $db->prepare('SELECT * FROM user');
}else{
    $nbElement = $db->prepare('SELECT * FROM user WHERE nom LIKE :t OR email LIKE :t');
    $recherche = '%'.$_POST['s'].'%'; 
    $nbElement->bindParam(':t', $recherche, PDO::PARAM_STR);
}

$nbElement->execute();

$count = $nbElement->rowCount();

$nbPage = ceil($count / $nbElementPage);

if(empty($_POST['s'])){
    $bancal = $db->prepare('SELECT * FROM user ORDER BY created DESC LIMIT :p, :n');
    $bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
    $bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);

}else{
   $bancal = $db->prepare('
   SELECT * 
   FROM user 
   WHERE nom LIKE :t OR email LIKE :t
   ORDER BY created DESC 
   LIMIT :p, :n');
 
    $recherche = '%'.$_POST['s'].'%'; 
    $bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
    $bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);
    $bancal->bindParam(':t', $recherche, PDO::PARAM_STR);
}

//on execute la requete
$bancal->execute();


?><!DOCTYPE html>
<html>
<head>
    <title>Liste des éditeurs</title>
    <?php include('../includes/head_back.php'); ?>
</head>

<body>
<?php include('../includes/header_back.php'); ?>

<div class="wrapper">
    <div class="bloc-page liste-page">
    <form action="page_liste_editeur.php" method="post">
        <section class="entete-page">
            <div class="row">
                <h1 class="titre-page">Editeurs</h1>
                <a href="nouvel_editeur.php" class="button-page">Nouvel éditeur</a>
            </div>
        </section>
        <section class ="module-recherche">
            <div class="wrapper">
                <div class="row">
                    <div class="input-group">
                        <input name="s" type="text" placeholder="rechercher un article" <?php 
			                         //si $_POST['s'] n'est pas vide on l'affiche
                                    if(!empty($_POST['s'])){?>
                                        value="<?= $_POST['s'] ?>"
                                    <?php } ?>>
                        <button class="input-group-addon">RECHERCHER &gt;</button>
                    </div>
                </div>
                <div class="row">
                    <div class= "col-10 marg-1">
                        <table class="table-box">
                            <tr class="table-row">
                                <td>Nom</td>
                                <td>Email</td>
                                <td>Suppression</td>
                            </tr>
                            <?php 
                                    //on cree une boucle qui lit tous les réultats trouvés par la requete
                                    while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ ?>
                                    <tr>
                                        <td><a href="updateEditeur.php?id=<?= $data['id'] ?>">
						              <?= $data['prenom']; ?> <?= $data['nom']; ?>
					                   </a></td>
                                        <td><?= $data['email']; ?></td>
                                        <td><a href="../core/deleteUtilisateur.php?id=<?= $data['id'] ?>">Supprimer</a></td>
                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php 
            if(!isset($_GET['page'])){
                $_GET['page'] = 1;
            }
            if($nbPage>1){?>
            <div class="pagination pagination-centrer">
                <?php if($_GET['page'] != 1){?>
                <a href="page_liste_editeur.php?page=1"><img src="../img/fleche-gauche-02-gris.png" alt="première page" ></a>
                <a href="page_liste_editeur.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page - 1;
                    echo $page;
                         ?>"><img src="../img/fleche-gauche-01-gris.png" alt="page avant" ></a>   
                <?php } 
                for($i=1; $i <= $nbPage; $i++){?>
                    <a href="page_liste_editeur.php?page=<?= $i ?>"
                       <?php if($i == $_GET['page']){ ?> class="active"<?php } ?> ><?= $i ?></a>
                <?php } 
                if($_GET['page'] != $nbPage){?>
                <a href="page_liste_editeur.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page + 1;
                    echo $page;
                         ?>"><img src="../img/fleche-droite-01-gris.png" alt="page après" ></a>
                <a href="page_liste_editeur.php?page=<?= $nbPage ?>"><img src="../img/fleche-droite-02-gris.png" alt="dernière page" ></a>
                <?php } ?>
            </div>
            <?php } ?>
        </form>
    </div>
</div>

</body>
</html>
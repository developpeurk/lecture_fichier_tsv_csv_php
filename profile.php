<?php 
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter'):
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() -10);
endif;
if (!empty($_COOKIE['utilisateur'])):
   $nom = $_COOKIE['utilisateur'];
endif;

if (!empty($_POST['nom'])):
   setcookie('utilisateur', $_POST['nom']);
endif;

$title= "profile";
require 'elements/header.php';
?>

<?php if ($nom) : ?>
    <h1>Bonjour <?= htmlentities($nom) ?></h1>
    <a href="profile.php?action=deconnecter">Se déconnecter</a>
    <?php else: ?>
        <form action="" method="post">
    <div class="form-group">
    <input class="form-control" type="text" name="nom" placeholder="Entrez vote nom">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php endif; ?>




<?php require 'elements/footer.php'; ?>
<?php
$erreur = null;
$password = '$2y$12$Yo3HaFNsFvAGC6Tu4ok0A.BXaCiXYOPPgWuBjBkxrLhrliD5MqfoW';
if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    if ($_POST['pseudo'] === 'John' && password_verify($_POST['password'], $password)) {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /dashboard.php');
        exit();
    }else {
        $erreur = 'Identifiants incorrects';
    }
}


require_once 'functions/auth.php';
if (est_connecte()) {
    header('Location: /dashboard.php');
    exit();
}

require_once 'elements/header.php'
?>
<?php if($erreur): ?>
    <div class="alert alert-danger">
        <?= $erreur; ?>
    </div>
<?php endif; ?>

<form action="" method="post">
    <div class="form-group">
        <label for="pseudo">username</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="password">
    </div>
    <button type="submit" class="btn btn-primary">login</button>
</form>


<?php
require_once 'elements/footer.php'
?>
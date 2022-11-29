<?php
session_start();
$title = "Nous contacter";
require_once __DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'config.php';
require_once 'functions.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N')-1);
$crenaux = CRENAUX[$jour];
$ouvert = in_crenaux($heure,$crenaux);
$color = $ouvert ?  'green': 'red';;



require __DIR__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php';
?>

<div class="row">
    <div class="col-md-8">
        <h2>Debug</h2>
        <pre>
            <?php var_dump($_SESSION); ?>
        </pre>
      <h2>nous contacter</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium delectus dignissimos fugit possimus sequi suscipit vitae. Ad aliquam aperiam consequatur eligendi facilis fugit itaque molestias nemo odio, officia quae quos saepe sed. Doloribus facilis illum labore! Asperiores commodi fugit illo itaque quae quidem sit voluptates? Dicta facilis illo officia pariatur.</p>
    </div>
    <div class="col-md-4">
        <h2>Horaire d'ouvertures</h2>
        <?php if ($ouvert): ?>
        <div class="alert alert-success">
            Le magasin sera ouvert
        </div>
        <?php else : ?>
        <div class="alert alert-danger">
            Le magasin sera Fermé
        </div>
       <?php endif; ?>
        <form action="" method="GET">
            <div class="form-group">
                <?= select('jour', $jour, JOURS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value=<?= $heure ?>>
            </div>
            <button class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
        </form>
       
        <?= date('N'); ?>
        <ul>
            <?php foreach(JOURS as $k => $jour): ?>
              <li><strong><?= $jour ?></strong>
                 <?= crenaux_html(CRENAUX[$k]); ?>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

<?php require __DIR__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php' ?>
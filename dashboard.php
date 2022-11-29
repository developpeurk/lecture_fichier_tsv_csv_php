<?php
require_once 'functions/auth.php';
forcer_utilisateur_connecte();
require_once 'functions/compteur.php';

$annee = (int)date('Y');
$month = (int)date('m');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : (int)$_GET['mois'];
if ($annee_selection && $mois_selection):
    $total = nombre_vues_mois($annee_selection, $mois_selection );
    $details = nombre_vues_details_mois($annee_selection, $mois_selection);
else:
    $total = nombre_vues();
endif;

$mois = [
    '01' => 'Janvier',
    '02' => 'Féverier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre',
];
require_once 'elements/header.php';?>
<style>
    .activeMonth{
        background-color:darkmagenta;
        color:white;
    }
    a:hover.activeMonth {
        background-color:darkmagenta;
        color:white;
    }
    
</style>
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for($i=0;$i<5;$i++): ?>  
                <a class="list-group-item <?= $annee - $i === $annee_selection ?  'active' : ''?> " href="dashboard.php?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a>
                <?php if ($annee - $i === $annee_selection) :?>
                   <div class="list-group">
                   <?php foreach ($mois as $numero=>$nom) : ?>
                         <a href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $numero ?>" class="list-group-item <?= (int)$numero === $mois_selection ?  'activeMonth' : ''?>">
                            <?= $nom ?>
                         </a>
                    <?php endforeach; ?>
                   </div>
               <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong style="font-size:3em;"><?= $total?></strong><br/>
                Visite<?= $total > 1 ? 's' : '' ?> total
            </div>
        </div>
        <?php if(isset($details)): ?>
            <h2 class="mt-4">Détails des visites pour le mois</h2>
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>Année</th>
                        <th>Mois</th>
                        <th>Jour</th>
                        <th>Nbre de visite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($details as $detail):?>
                    <tr>
                        <td><?= $detail['annee'] ?></td>
                        <td><?= $detail['mois'] ?></td>
                        <td><?= $detail['jour'] ?></td>
                        <td><?= $detail['visites'] ?> visite<?= $detail['visites'] > 1 ? 's': '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        <?php endif; ?>
    </div>
</div>
<?php require_once 'elements/footer.php'; ?>



<?php 

$age = null;
if (!empty($_POST['birthday'])) :
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = (int)$_POST['birthday'];
endif;


if (!empty($_POST['birthday'])) :
   $birthday = (int)($_POST['birthday']);
   $age = (int)date('Y') - $birthday;
endif;





require 'elements/header.php'; ?>

<?php if ($age && $age > 18): ?> 
    <h1>Du contenu réservé aux adultes</h1>

<?php elseif ($age !==  null): ?>
  <div class="alert alert-danger">
    Vous n'avez pas l'age requis pour voir le contenu
  </div>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="birthday">Section réservée pour les adultes, entrer votre année de naissance: </label>
                <select id="birthday" name="birthday" class="form-control">
                    <?php for ($i= 2010; $i>1919; $i--) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor ?>
                </select>
        </div>
        <button type="submit">Envoyer</button>
    </form>
<?php endif; ?>


<?php require 'elements/footer.php'; ?>
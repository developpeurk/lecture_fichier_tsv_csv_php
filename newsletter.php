<?php
$error =  null;
$success =  null;
$email = null;

    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
        if($curPageName === 'newsletter.php'):
            echo '<style>.formulaire{display:none;}</style>';
        endif;
  


if(!empty($_POST['email'])):
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)):
        $file = __DIR__ . DIRECTORY_SEPARATOR .'emails'. DIRECTORY_SEPARATOR.date('Y-m-d');
        file_put_contents($file, $email.PHP_EOL, FILE_APPEND);
        $success = "Votre email a bien été enregistré";
        $email = null;
    else:
        $error = "Email invalide";
    endif;

endif;

require 'elements/header.php' ;
?>
<h1>S'inscrire à la newsletter</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel hic animi odit itaque dolores culpa velit aut? Nesciunt officia possimus maxime, ex ipsa sunt quisquam eos? Magnam commodi sunt itaque vitae ipsum nisi ad quis, illum ab provident officia quae voluptatem exercitationem neque nemo temporibus veniam repudiandae quas impedit velit.</p>
<?php if ($error): ?>
   <div class="alert alert-danger">
     <?= $error; ?>
   </div>
<?php endif; ?>
<?php if ($success): ?>
   <div class="alert alert-success">
     <?= $success; ?>
   </div>
<?php endif; ?>
<form action="/newsletter.php" method="post" class="form-inline">
    <div class="form-group">
        <input type="email" name="email" required class="form-control" value = "<?= htmlentities($email); ?>">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
<?php require 'elements/footer.php'; ?>
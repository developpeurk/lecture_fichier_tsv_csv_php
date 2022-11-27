<?php 
require 'header.php';

?>

<form action="/jeuCheckbox.php" method="GET">
<div class="form-group">
        <input type="checkbox" class="form-control" name="parfum[]" value="Fraise">Fraise<br>
        <input type="checkbox" class="form-control" name="parfum[]" value="Vanille">Vanille<br>
        <input type="checkbox" class="form-control" name="parfum[]" value="Chocolat">Chocolat<br>

    </div>
    <button type="submit" class="btn btn-info">Deviner</button>
</form>

<h2>GET</h2>
<pre>
    <?php var_dump($_GET); ?>
</pre>

<h2>POST</h2>
<pre>
    <?php var_dump($_POST); ?>
</pre>


<?php require 'footer.php'; ?>


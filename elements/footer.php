
</main><!-- /.container -->

<footer>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <?php
            require_once dirname(__DIR__) .DIRECTORY_SEPARATOR .'functions' . DIRECTORY_SEPARATOR. 'compteur.php';
                ajouter_vue();
                $vues = nombre_vues();
            ?>
            Il y'a <?= $vues ?> visite<?php if ($vues > 1): ?>s<?php endif; ?>  sur le site
        </div>
<div class="col-md-4">
    <h5>Newsletter</h5>
    <form class="formulaire form-inline" action="/newsletter.php" method="post">
          <div class="form-group">
              <input type="email" name="email" required class="form-control" placeholder="Entrez votre email">
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>          
         
        </form>
    </div>
    <div class="col-md-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
            <?= nav_menu(); ?>
        </ul>
    </div>
</div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="//getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="//getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

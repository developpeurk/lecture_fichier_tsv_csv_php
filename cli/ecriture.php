<?php
//$fichier = dirname(__DIR__,4). DIRECTORY_SEPARATOR .'demo.txt';

// partie écriture

$fichier = __DIR__. DIRECTORY_SEPARATOR .'demo.txt';
$size = @file_put_contents($fichier, 'salut', FILE_APPEND);
if ($size === false):
    echo 'Impossible d\'ecrire dans le fichier';
else:
    echo 'Ecriture réussie';
endif;
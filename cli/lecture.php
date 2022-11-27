<?php
//$fichier = dirname(__DIR__,4). DIRECTORY_SEPARATOR .'demo.txt';

// partie lecture

//$fichier = __DIR__. DIRECTORY_SEPARATOR .'demo.txt';
//echo file_get_contents($fichier);
//echo file_get_contents('http://jsonplaceholder.typicode.com/posts');
//$lignes = file($fichier);
//echo $lignes[0];

$fichier = __DIR__. DIRECTORY_SEPARATOR .'transactions.csv';
//$resource = fopen($fichier,'r'); // => en lecture seule
$resource = fopen($fichier,'r+'); // => en lecture et ecriture

//echo fread($resource,2);
//var_dump(fstat($resource));
$k = 0;
while ($line = fgets($resource)):
    $k++;
    if($k == 1):
        fwrite($resource, 'Salut les gens');
        break;
    endif;
endwhile;

fclose($resource);
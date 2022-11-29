<?php

function ajouter_vue(): void {
    $fichier =  dirname(__DIR__). DIRECTORY_SEPARATOR. 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' .date('Y-m-d');
    incementer_compteur($fichier);
    incementer_compteur($fichier_journalier);
}


function incementer_compteur(string $fichier): void {
    $compteur = 1;
    if(file_exists($fichier)):
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    endif;
    file_put_contents($fichier, $compteur);
}



function nombre_vues (): string {
    $fichier =  dirname(__DIR__). DIRECTORY_SEPARATOR. 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);

}


function nombre_vues_mois (int $year, int $month): int {

    $mois = str_pad($month, 2, '0', STR_PAD_LEFT);
    $fichier =  dirname(__DIR__). DIRECTORY_SEPARATOR. 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $year .'-'.$mois .'-'. '*';
    $files = glob($fichier);
    $total = 0;
    foreach ($files as $key => $file) {
       $total += (int)file_get_contents($file);
    }
    return $total;
   

}



function nombre_vues_details_mois (int $year, int $month): array {

    $mois = str_pad($month, 2, '0', STR_PAD_LEFT);
    $fichier =  dirname(__DIR__). DIRECTORY_SEPARATOR. 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $year .'-'.$mois .'-'. '*';
    $files = glob($fichier);
    $views = [];
    foreach ($files as $key => $file) {
        $parties = explode('-', basename($file));
        $views[] = [
            'annee' => $parties[1],
            'mois' => $parties[2],
            'jour' => $parties[3],
            'visites' => file_get_contents($file)
        ];
    }
    return $views;
   

}
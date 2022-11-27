<?php
        function nav_item(string $lien, string $title, string $linkClass = ''): string
        {
            $classe = 'nav-item';
            if ($_SERVER['SCRIPT_NAME'] === $lien) {
                $classe .= ' active';
            }
            return <<<HTML
        <li class="$classe">
            <a class="$linkClass" href="$lien">$title</a>
        </li>
HTML;

}

function nav_menu (string $linkClass = '') : string {
  return
      nav_item('/index.php', 'Accueil', $linkClass) .
      nav_item('/jeu3.php', 'Jeu', $linkClass) .
      nav_item('/menu.php', 'Menu', $linkClass) .
      nav_item('/contact.php', 'Contact', $linkClass);
}

function checkbox (string $name, string $value, array $data): string {

    $attributes = '';

    if(isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= 'checked';
    } 
    return <<<HTML
     <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
}


function radio (string $name, string $value, array $data): string {

    $attributes = '';

    if(isset($data[$name]) && $value === $data[$name]) {
        $attributes .= 'checked';
    } 
    return <<<HTML
     <input type="radio" name="$name" value="$value" $attributes>
HTML;
}


function dump($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}


function crenaux_html(array $crenaux) {
    if (empty($crenaux)):
        return 'Fermé';
    endif;
    $phrases = [];
    foreach($crenaux as $crenau):
        $phrases[] = "de <strong>{$crenau[0]}h</strong> à <strong>{$crenau[1]}h</strong>";
    endforeach;
    return 'Ouvert ' . implode(' et ', $phrases);
}


function in_crenaux (int $heure, array $crenaux):bool{
    foreach($crenaux as $crenau):
        $debut  = $crenau[0];
        $fin = $crenau[1];
        if ($heure >= $debut && $heure < $fin):
            return true;
        endif;
    endforeach;
    return false;
}

function select(string $name,$value, array $options): string {
    $html_options = [];
    foreach ($options as $k => $option) {
       $attributes = $k == $value? 'selected': '';
       $html_options[] = "<option value='$k' $attributes>$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) . "</select>";
   
}
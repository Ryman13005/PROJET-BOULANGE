<?php ob_start()?>
<p>Contenu page d'accueil<p>

<img src= "ordi.jpg"/>
<?php
    $content=ob_get_clean();
    $titre = "Page d'accueil";
    require "template.php";
?>
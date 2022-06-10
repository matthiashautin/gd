<?php
header("Content-type: image/png");
$image=@ImageCreate (200, 100) or die ("Erreur lors de la création de l'image");
$couleur_fond=ImageColorAllocate ($image, 255, 0, 0);
ImagePng($image);
?>

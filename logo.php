<?php
//Création du header pour placer notre image
header ("Content-type: image/png");
$x = 600; //largeur en pixels 
$y = 600; //hauteur en pixels

//Définir ou se place notre image
$image = imagecreatetruecolor($x,$y);

//Créer les différentes couleurs
$grey = imagecolorallocate($image, 128, 128, 128);
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0 );
$color1 = imagecolorallocate($image,  4, 3, 127 );
$color2 = imagecolorallocate($image, 244, 159, 28 );
//$color1 = imagecolorallocate($image,    39, 222, 208  );
//$color2 = imagecolorallocate($image, 33, 0, 112 );

//Créer les 2 demis cercles pleins
imagefilledarc($image,300,330,110,100,0,180,$grey ,IMG_ARC_PIE);
imagefilledarc($image,300,275,110,100,180,0,$grey ,IMG_ARC_PIE);

imagesetthickness($image, 4);//Permet de mettre une bordur de 4px
//Position arc de cercle (milieu)
imagearc($image, 300, 300, 225, 225,  0, 45, $color1);
imagearc($image, 300, 300, 200, 200,  45, 90, $color2);
imagearc($image, 300, 300, 225, 225,  90, 135, $color1);
imagearc($image, 300, 300, 200, 200,  135, 180, $color2);
imagearc($image, 300, 300, 225, 225,  180, 225, $color1);
imagearc($image, 300, 300, 200, 200,  225, 270, $color2);
imagearc($image, 300, 300, 225, 225,  270, 315, $color1);
imagearc($image, 300, 300, 200, 200,  315, 360, $color2);

//Position arc de cercle (grand)
imagearc($image, 300, 300, 475, 475,  15, 30, $color1);
imagearc($image, 300, 300, 500, 500,  60, 75, $color2);
imagearc($image, 300, 300, 475, 475,  105, 120, $color1);
imagearc($image, 300, 300, 500, 500,  150, 165, $color2);
imagearc($image, 300, 300, 475, 475,  195, 210, $color1);
imagearc($image, 300, 300, 500, 500,  240, 255, $color2);
imagearc($image, 300, 300, 475, 475,  285, 300, $color1);
imagearc($image, 300, 300, 500, 500,  330, 345, $color2);

//Position arc de cercle (moyen)
imagearc($image, 300, 300, 437.5, 437.5,  17, 28, $color2);
imagearc($image, 300, 300, 462.5, 462.5,  62, 73, $color1);
imagearc($image, 300, 300, 437.5, 437.5,  107, 118, $color2);
imagearc($image, 300, 300, 462.5, 462.5,  152, 163, $color1);
imagearc($image, 300, 300, 437.5, 437.5,  197, 208, $color2);
imagearc($image, 300, 300, 462.5, 462.5,  242, 253, $color1);
imagearc($image, 300, 300, 437.5, 437.5,  287, 298, $color2);
imagearc($image, 300, 300, 462.5, 462.5,  332, 343, $color1);

//Position arc de cercle (petit)
imagearc($image, 300, 300, 400, 400,  19, 26, $color1);
imagearc($image, 300, 300, 425, 425,  64, 71, $color2);
imagearc($image, 300, 300, 400, 400,  109, 116, $color1);
imagearc($image, 300, 300, 425, 425,  154, 161, $color2);
imagearc($image, 300, 300, 400, 400,  199, 206, $color1);
imagearc($image, 300, 300, 425, 425,  244, 251, $color2);
imagearc($image, 300, 300, 400, 400,  289, 296, $color1);
imagearc($image, 300, 300, 425, 425,  334, 341, $color2);

//Création des cercles entiers 
imageellipse($image,300,275,300,300,$color2);
imageellipse($image,300,325,300,300,$color2);
//imageellipse($image,250,250,300,300,$green);
imageellipse($image,325,300,300,300,$color1);
imageellipse($image,275,300,300,300,$color1);
//imageellipse($image,200,250,300,300,$jaune);

//Permet d'écrire le HM au milieu du logo
$text = 'HM';
$font = './fonts/04B_30__.TTF';
imagettftext($image, 40, 0, 252, 325, $white, $font, $text);

//Création des variables pour les conners
$hautgauche = array(
    0,  320,  // Point 1 (x, y)
    0,  320, // Point 2 (x, y)
    60,  60,  // Point 3 (x, y)
    320, 0,  // Point 4 (x, y)
    0,  0,  // Point 5 (x, y)
    );

$hautdroit = array(
    600,  0,  
    600,  320, 
    540,  60,  
    280, 0,  
    600,  0,  
    );

$basgauche = array(
    320,  600, 
    320,  600, 
    60,  540,  
    0, 280,  
    0,  600,  
    );       

$basdroit= array(
    600,  320, 
    600,  280, 
    540,  540,  
    280, 600,  
    600,  600,  
    );    

//Pour placer les polygones des conners hautgauche, hautdroit, basgauche, basdroit
imagefilledpolygon($image, $hautgauche, 5, $color2);
imagefilledpolygon($image, $basgauche, 5, $color1);
imagefilledpolygon($image, $hautdroit, 5, $color1);
imagefilledpolygon($image, $basdroit, 5, $color2);

//Création des petit polygones à l'intèrieur des grands  
$petithautgauche = array(
    60,  60,  // Point 1 (x, y)
    200,  30, // Point 2 (x, y)
    30,  200,  // Point 3 (x, y)
    60, 60,  // Point 4 (x, y)
    );

$petithautdroit = array(
    540,  60,  
    400,  30, 
    570,  200,  
    540, 60,  
    );

$petitbasgauche = array(
    60,  540, 
    30,  400, 
    200,  570,  
    60, 540,  
    );

$petitbasdroit= array(
    540,  540, 
    570,  400, 
    400,  570,  
    540, 540,  
    );    

//Pacer les petits polygones petithautgauche, petithautdroit, petitbasgauche, petitbasdroit
imagefilledpolygon($image, $petithautgauche, 4, $color1);
imagefilledpolygon($image, $petithautdroit, 4, $color2);
imagefilledpolygon($image, $petitbasgauche, 4, $color2);
imagefilledpolygon($image, $petitbasdroit, 4, $color1);

imagepng($image); //renvoie une image sous format png //on crée un cercle //renvoie une image sous format png
imagedestroy($image); //détruit l'image, libérant ainsi de la mémoire

?>  
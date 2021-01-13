<!DOCTYPE html>
<html>
    <head>
        <title>POO-GestMob2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

<?php
    /**
     * Projet GestMob, SLAM4 BTS SIO
     *
     * @author      Nicolas Defaÿ
     * @date        2020
     * @see         Chaise.class
     * @version     2.1
     *
     * Tests simples de la classe Chaise
     *
     *
     */
    require 'Chaise.class_v1.2.php';

    $chaise1 = new Chaise('rouge', '', 50);
    $chaise2 = new Chaise('verte', '', 40);
	$chaise3 = new Chaise('jaune', '', 40);

    echo "<hr>";
    echo $chaise1;
    $chaise1->dessiner();	
    echo "<hr>";
    echo $chaise2->getCouleur();
    $chaise2->dessiner();
    unset($chaise2);
    echo "<hr>"; 
    echo $chaise3->getImage();
    $chaise3->dessiner();	
echo "<hr>";	
?>

    </body>        
</html>
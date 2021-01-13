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
     * @version     1.1
     *
     * Tests simples de la classe Chaise
     *
     *
     */
    require 'Chaise.class_v1.2.php';

    $chaise1 = new Chaise('rouge', 'chaise_rouge.jpg', 50);
    $chaise2 = new Chaise('verte', 'chaise_verte.jpg', 40);

    echo "<hr>";
    $chaise1->afficher();
    $chaise1->dessiner();	
    echo "<hr>";
    echo $chaise2->getCouleur();
    $chaise2->dessiner();
    echo "<hr>"; 
?>

    </body>        
</html>
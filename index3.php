<!DOCTYPE html>
<html>
    <head>
        <title>POO-GestMob3</title>
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
     * Tests simples de la classe ChaiseBureau
     *
     *
     */
    require 'ChaiseBureau.class.php';

    $chaiseSimple1 = new Chaise('rouge', '', 50);
    $chaiseBureau1 = new ChaiseBureau('bleue', '', 34, 30, 60);

    echo "<hr>";
    echo $chaiseSimple1;
    $chaiseSimple1->dessiner();	
    echo "<hr>";    
    
    echo $chaiseBureau1;
    echo "<hr>";
    
    $nbIterations = 8;
    $i = 1;
    while ($i <= $nbIterations + 1) {
        $chaiseBureau1->dessiner();	
        if ($i <= $nbIterations / 2) {
            $chaiseBureau1->monter();
        } else {
            $chaiseBureau1->descendre();
        }
        $i++;
    }
    
    echo "<hr>";
    echo "<h2>Gestion des erreurs</h2>";
    try {
        $chaiseTest = new ChaiseBureau('rose', '', 28, 30, 60);
    } catch (Exception $ex) {
        echo $ex->getMessage() . '<br>';
    }
    
    try {
        $chaiseTest = new ChaiseBureau('rose', '', 28, 60, 20);
    } catch (Exception $ex) {
        echo $ex->getMessage(). '<br>';
    }
    
    $chaiseTest = new ChaiseBureau('rose', '', 20, 20, 60);
    try {
       $chaiseTest->descendre();
    } catch (Exception $ex) {
        echo $ex->getMessage(). '<br>';
    }
    
    $chaiseTest = new ChaiseBureau('rose', '', 60, 20, 60);
    try {
       $chaiseTest->monter();
    } catch (Exception $ex) {
        echo $ex->getMessage(). '<br>';
    }
?>
    </body>        
</html>
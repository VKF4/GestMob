<?php
// A mettre avant le DocBlock pour une bonne
// génération de la documentation

require_once('Chaise.class_v1.2.php');

/**
 * Projet GestMob, SLAM4 BTS SIO
 * La classe ChaiseBureau (correction TP2)
 * 
 * @author      Nicolas Defaÿ
 * @date        2020
 * @version     1.1
 * @see        Chaise
 * 
 */


class ChaiseBureau extends Chaise {

	/**
	 * Butée basse du réglage de hauteur
         * 
	 * @var 
	 * @access private
	 */
	private  $hauteuxMin;

	/**
	 * Butée haute du réglage de hauteur
         * 
	 * @var 
	 * @access private
	 */
	private  $hauteurMax;


	/**
         * Création d'une instance
         * 
	 * @access public
	 * @param  $uneCouleur 
	 * @param  $uneImage 
	 * @param  $uneHauteur 
	 * @param  $uneHauteurMin 
	 * @param  $uneHauteurMax 
	 */

	public  function __construct($uneCouleur, $uneImage, $uneHauteur, $uneHauteurMin, $uneHauteurMax) {

            if ($uneHauteur < $uneHauteurMin || $uneHauteur > $uneHauteurMax || $uneHauteurMax <= $uneHauteurMin) {
                throw new Exception('Création impossible, hauteurs non valides !');              
            }
            
            parent::__construct($uneCouleur, $uneImage, $uneHauteur);
            $this->hauteurMax = $uneHauteurMax;
            $this->hauteurMin = $uneHauteurMin;
        }


	/**
	 * Retourne la butée basse du réglage de hauteur
         * 
         * @access public
         * @return int
	 */

	public final  function getHauteurMin() {
            return $this->hauteuxMin;
	}


	/**
	 * Retourne la butée haute du réglage de hauteur
         * 
         * @access public
         * @return  int
	 */

	public final  function getHauteurMax() {
            return $this->hauteurMax;
	}


	/**
         * Retourne une chaîne contenant les caractéristiques d'une chaise de bureau
         * 
	 * @access public
         * @return string Description
	 */

	public  function __toString() {
            return parent::__toString() . " ($this->hauteurMin, $this->hauteurMax)";
	}


	/**
	 * Monte la chaise d'une unité par défaut.
         * Génère une erreur si la butée haute est atteinte.
         * 
         * @access public
         * @param  $valCran int
	 */

	public final  function monter($valCran = 4) {
            if ($this->hauteur + $valCran <= $this->hauteurMax) {
		$this->hauteur+= $valCran;
            } else {
                throw new Exception('Attention, butée haute atteinte !');            
            }
	}


	/**
         * Descend la chaise d'une unité par défaut.
         * Génère une erreur si la butée basse est atteinte.
         * 
	 * @access public
         * @param  $valCran int
	 */

	public final  function descendre($valCran = 4) {
            if ($this->hauteur - $valCran >= $this->hauteurMin) {
		$this->hauteur-= $valCran;
            } else {
                throw new Exception('Attention, butée basse atteinte !');                        
            }
	}
}

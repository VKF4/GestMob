<?php

require_once('ChaiseBureau.class.php');

/**
 * Projet GestMob, SLAM4 BTS SIO
 * La classe Salle (correction TP3)
 * 
 * @author      Nicolas Defaÿ
 * @date        2020
 * @version     1.1
 * @see         Chaise,ChaiseBureau
 * 
 */

class Salle {

	/**
	 * Nom de la salle
	 * @var string
	 * @access private
	 */
	private  $nomSalle;

	/**
	 * Capacité de la salle (nombre de chaises qu'elle peut contenir)
	 * @var int
	 * @access private
	 */
	private  $capaciteSalle;

	/**
	 * Collection des chaises de la salle
	 * @var Collection de Chaise
	 * @access private
	 */
	private  $mesChaises;        
	

	/**
	 * Constructeur. Création d'une salle à partir d'un nom et d'une capacité
	 * @access public
	 * @param string $unNom Nom de la salle
	 * @param int $uneCapacite Capacité de la salle
	 */

	public  function __construct($unNom, $uneCapacite) {
            $this->nomSalle = $unNom;
            $this->capaciteSalle = $uneCapacite;
            $this->mesChaises = new ArrayObject();
	}


	/**
	 * Retourne le nom de la salle
	 * @access public
	 * @return string
	 */

	public final  function getNom() {
            return $this->nomSalle;
	}


	/**
	 * Retourne la capacité de la salle
	 * @access public
	 * @return int
	 */

	public final  function getCapacite() {
            return $this->capaciteSalle;
	}


	/**
	 * Retourne le nombre de chaises présentes dans la salle
	 * @access public
	 * @return int
	 */

	public final  function getNbChaise() {
            return $this->mesChaises->count();
	}

	public final  function getNbChaiseBureau() {
            $nbBureau = 0;
            foreach ($this->mesChaises as $uneChaise) {
                if (get_class($uneChaise) == 'ChaiseBureau') {
                    $nbBureau++;
                }
            }
            return $nbBureau;
        }        

        
	/**
	 * Retourne le nombre de chaises simples présentes dans la salle
	 * @access public
	 * @return int
	 */

	public final  function getNbChaiseSimple() {
            $nbSimple = 0;
            foreach ($this->mesChaises as $uneChaise) {
                if (get_class($uneChaise) == 'Chaise') {
                    $nbSimple++;
                }
            }
            return $nbSimple;
        }
	
        
	/**
	 * Retourne la chaise présente à la position unIndexChaise dans la collection
	 * @access public
	 * @param int $unIndexChaise Position de la chaise dans la collection
	 * @return Chaise
	 */

	public final  function getChaiseAt($unIndexChaise) {
            if ($this->mesChaises->offsetExists($unIndexChaise)) {
                return $this->mesChaises->offsetGet($unIndexChaise);
            } else {
                throw new Exception('Cet index n\'est pas valide !'); 
            }			
	}

        
	/**
	 * Retourne la chaise présente à la position $unePosition dans la collection
         * La position ne correspond pas à l'index. La première chaise est à la position 1.
         * 
	 * @access public
	 * @param int $unePosition Position de la chaise dans la collection
	 * @return Chaise
	 */        
        
	public final  function getChaiseAtPos($unePosition) {

            if ($unePosition >= 1 && $unePosition <= $this->getNbChaise()) {
                $pos = 0;
                foreach ($this->mesChaises as $uneChaise) {
                    $pos++;
                    if ($pos == $unePosition) {
                        // ======================================
                        return $uneChaise;  // ! ! ! SORTIE ! ! !
                        // ======================================
                    }
                }
            } else {
                throw new Exception('Cette position n\'est pas valide !'); 
            }
	}         

	/**
	 * Affiche les images de toutes les chaises présentes dans la salle
	 * @access public
	 */

	public final  function dessiner() {
            foreach ($this->mesChaises as $uneChaise) {
                $uneChaise->dessiner();
            }
	}


	/**
	 * Ajoute une chaise dans la salle
	 * @access public
	 * @param Chaise $uneChaise Objet Chaise à ajouter dans la salle
	 */

	public final  function ajouter($uneChaise) {
            $this->mesChaises->append($uneChaise);
	}


	/**
	 * Enlève une chaise de la salle à partir de son index.
	 * @access public
	 * @param int $unIndexChaise Position de la chaise dans la collection
	 */

	public final  function enlever($unIndexChaise) {
            $this->mesChaises->offsetUnset($unIndexChaise);
	}


	/**
	 * Retourne une chaîne contenant les caractéristiques de la salle
	 * @access public
	 * @return string
	 */

	public final  function __toString() {
            return "Salle " . $this->nomSalle . ", capacité " . $this->capaciteSalle .
                    " (" . $this->getNbChaise() . " chaise(s) présente(s))" ;
	}


}
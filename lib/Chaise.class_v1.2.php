<?php
/**
 * Projet GestMob, SLAM4 BTS SIO
 * La classe Chaise (correction TP2)
 * 
 * @author      Nicolas Defaÿ
 * @date        2020
 * @version     1.3 
 * 
 */
class Chaise {

    /**
     * Dossier contenant les images des chaises
     * 
     * @var    string  
     * @access public
     * @since Version 1.2
     */
    
    
    const IMG_DIR = 'img/';
    
    
    /**
     * Couleur de la chaise
     *
     * @var    string  
     * @access private
     */
    private $couleur;

    /**
     * Fichier image associé à la chaise
     *
     * @var    string    
     * @access private
     */
    private $image;

    /**
     * Hauteur de la chaise
     *
     * @var    int
     * @access protected
     * @internal Passée protégée pour pouvoir être utilisée dans ChaiseBureau
     */
    protected $hauteur;

    // Operations
	
    /**
     * Création d'une instance
     * 
     * @param   $uneCouleur string
     * @param   $uneImage string
     * @param   $uneHauteur int
     * @access  public
     * 
     */
    public function __construct($uneCouleur, $uneImage, $uneHauteur) {
        $this->couleur = $uneCouleur;
        
        // Si le fichier image n'est pas renseigné
        // on construit le nom du fichier à partir de la couleur et de la classe
        //  d'appartenance
        
        if (get_class($this) == "ChaiseBureau") {
            $prefixe = "chaise-bureau_";
        } else {
            $prefixe = "chaise_";
        }
        
        if ($uneImage == '') {
            $uneImage = $prefixe . $uneCouleur . '.jpg';
        }
	// Si le fichier image n'est pas trouvé
        // on affecte l'image par défaut
        if (!file_exists(self::IMG_DIR.$uneImage)) {
            $uneImage = 'chaise_indeterminee.jpg';
        }
        
        $this->image   = $uneImage;
        $this->hauteur = $uneHauteur;
    }
	
    /**
     * Destructeur
     * 
     * @access public
     */
    public function __destruct() {
        // echo "Une chaise $this->couleur meurt...<br/>";
    }
	
	
    /**
     * Retourne la couleur
     * 
     * @access public
     * @return string
     */
    public final function getCouleur() {
        return $this->couleur;
    }

    /**
     * Retourne le nom du fichier image
     * 
     * @access public
     * @return string
     */
    public final function getImage() {
        return $this->image;
    }

    /**
     * Retourne la hauteur de la chaise
     * 
     * @access public
     * @return int
     */
    public final function getHauteur(){
        return $this->hauteur;
    }

	
    /**
     * Retourne une chaîne contenant les caractéristiques d'une chaise
     * 
     * @access public
     * @return string
     */
    public function __toString() {
        return get_class($this) . " $this->couleur ($this->image) H=$this->hauteur";	
    }
      

    /**
     * Affiche une chaîne HTML avec la balise d'affichage de l'image
     * 
     * @access public
     * @final
     */
    public final function dessiner() {
	echo "<img src='".self::IMG_DIR."$this->image' height='". $this->hauteur * 2 ."' />";
    }	

    
    /**
     * Affiche les caractéristiques d'une chaise
     * Conservé pour des raisons de compatibilité descendante,
     * utiliser __toString de préférence
     * 
     * @access public
     * @return void
     */
    public function afficher() {
        echo "Chaise $this->couleur ($this->image) H=$this->hauteur<br/>";	
    }     
    
}


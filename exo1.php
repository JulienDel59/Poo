<?php

    class Chien {
        public $nom;
        public $race;
    
        // Constructeur
        public function __construct($nom, $race) {
            $this->nom = $nom;
            $this->race= $race;
        }

        // Méthode aboyer
        public function aboyer() {
            echo "Woof! Je suis " . $this->nom ;
        }
    }

    $chien1 = new Chien("Rex", "Berger Allemand");
    echo "Nom : " . $chien1->nom . "<br>";
    echo "Race : " . $chien1->race . "<br>";

    $chien1->nom ="Max";

    $chien1->aboyer();

    
?>
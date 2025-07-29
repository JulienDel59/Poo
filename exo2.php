<?php

    class Humain {
        public $nom ;
        public $age;

        public function __construct($nom, $age) {
            $this->nom = $nom;
            $this->age = $age; 
        }
        
        public function parler() {
            echo "Bonjour, je m'appelle " . $this->nom . " et j'ai " . $this->age . " ans.<br>";
        }
        
    }

    class Homme extends Humain {
        public function __construct($nom, $age) {
            $this->nom = "Jean";
            $this->age = "20";

        }
       
        
            
        
    }

    $humain1 = new Humain ("Alice", 30);

    $humain1->parler();

?>
<?php

    class Personnage {
        public $nom;
        public $vie;
        public $force;

         public function __construct($nom, $vie, $force) {
            $this->nom = $nom;
            $this->vie= $vie;
            $this->force =$force;
        }
    }

      class Guerrier extends Personnage {
        public function __construct() {
            $this->nom = "Guerrier";
            $this->vie= 120;
            $this->force = 15;
        }
    }

     class Voleur extends Personnage {
        public function __construct() {
            $this->nom = "Voleur";
            $this->vie= 100;
            $this->force = 12;
        }
    }

    class Magicien extends Personnage {
        public function __construct() {
            $this->nom = "Magicien";
            $this->vie= 90;
            $this->force = 8;
        }
    }


?>
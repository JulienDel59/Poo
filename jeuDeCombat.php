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
         public function PresentatotionPerso() {
        echo "je suis " . $this->nom . ", j'ai " . $this->vie . " points de vie et ma force est de " . $this->force . ".<br>";
        }
      }

     class Voleur extends Personnage {
        public function __construct() {
            $this->nom = "Voleur";
            $this->vie= 100;
            $this->force = 12;
        }
         public function PresentatotionPerso() {
        echo "je suis " . $this->nom . ", j'ai " . $this->vie . " points de vie et ma force est de " . $this->force . ".<br>";
        }
    }

    class Magicien extends Personnage {
        public function __construct() {
            $this->nom = "Magicien";
            $this->vie= 90;
            $this->force = 8;
        }
         public function PresentatotionPerso() {
        echo "je suis " . $this->nom . ", j'ai " . $this->vie . " points de vie et ma force est de " . $this->force . ".<br>";
        }
    }



    $guerrier = new Guerrier();
    $voleur = new Voleur();
    $magicien = new Magicien();

    $guerrier->PresentatotionPerso();
    $voleur->PresentatotionPerso(); 
    $magicien->PresentatotionPerso();  

    echo "<br>";
    echo "<from>
            <label> Choisisser votre personnage :</label>
            <select name='choixPerso'>
             <option value='guerrier'>Guerrier</option>
             <option value='voleur'>Voleur</option>
             <option value='magicien'>Magicien</option>
            </select>
            <input type='submit' value='Valider'>
         </form>";

    
?>
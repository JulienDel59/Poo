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


    echo "<form method='get'>
            <label> Choisisser votre personnage :</label>
            <select name='choixPerso'>
             <option value='guerrier'>Guerrier</option>
             <option value='voleur'>Voleur</option>
             <option value='magicien'>Magicien</option>
            </select>
            <input type='submit' value='Valider'>
         </form>";

    if (isset($_GET['choixPerso'])) {
        $choixPerso = $_GET['choixPerso'];
        echo "Vous avez choisi : $choixPerso<br>";

    }
?> 
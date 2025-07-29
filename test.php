<?php

class Personnage {
    public $nom;
    public $vie;
    public $force;

    public function __construct($nom, $vie, $force) {
        $this->nom = $nom;
        $this->vie = $vie;
        $this->force = $force;
    }

    public function attaquer(Personnage $adversaire) {
        echo "{$this->nom} attaque {$adversaire->nom} et inflige {$this->force} dégâts.<br>";
        $adversaire->recevoirDegats($this->force);
    }

    public function recevoirDegats(int $degats) {
        $this->vie -= $degats;
        if ($this->vie < 0) {
            $this->vie = 0;
        }
    }

    public function afficherEtat() {
        echo "{$this->nom} a {$this->vie} points de vie restants.<br>";
    }
}

class Guerrier extends Personnage {
    public function __construct() {
        parent::__construct("Guerrier", 120, 15);
    }
    // Pas besoin de modifier attaquer, dégâts constants
}

class Voleur extends Personnage {
    public function __construct() {
        parent::__construct("Voleur", 100, 12);
    }

    public function recevoirDegats(int $degats) {
        // 30% de chance d’esquiver (ne pas subir de dégâts)
        $chance = rand(1, 100);
        if ($chance <= 30) {
            echo "{$this->nom} esquive l'attaque !<br>";
            return; // pas de dégâts subis
        }
        parent::recevoirDegats($degats);
    }
}

class Magicien extends Personnage {
    public function __construct() {
        parent::__construct("Magicien", 90, 8);
    }

    public function attaquer(Personnage $adversaire) {
        $chanceSort = rand(1, 100);
        $degatsInfliges = $this->force;

        if ($chanceSort <= 50) {
            $degatsInfliges *= 2;
            echo "{$this->nom} lance un sort spécial et inflige {$degatsInfliges} dégâts à {$adversaire->nom}!<br>";
        } else {
            echo "{$this->nom} attaque {$adversaire->nom} et inflige {$degatsInfliges} dégâts.<br>";
        }

        $adversaire->recevoirDegats($degatsInfliges);
    }
}

// === le reste du code (formulaire, sélection, combat) ===
// Identique au code précédent avec la boucle de combat

// --- Affichage formulaire et combat ---

$classes = ['guerrier', 'voleur', 'magicien'];

echo "<form method='get'>
        <label>Choisissez votre personnage :</label>
        <select name='choixPerso'>
            <option value='guerrier'>Guerrier</option>
            <option value='voleur'>Voleur</option>
            <option value='magicien'>Magicien</option>
        </select>
        <input type='submit' value='Valider'>
      </form><br>";

if (isset($_GET['choixPerso'])) {
    $choixJoueur1 = strtolower($_GET['choixPerso']);

    switch ($choixJoueur1) {
        case 'guerrier':
            $joueur1 = new Guerrier();
            break;
        case 'voleur':
            $joueur1 = new Voleur();
            break;
        case 'magicien':
            $joueur1 = new Magicien();
            break;
        default:
            echo "Classe inconnue.";
            exit;
    }

    $classesRestantes = array_diff($classes, [$choixJoueur1]);
    $classesDisponibles = array_values($classesRestantes);
    $classeAleatoire = $classesDisponibles[array_rand($classesDisponibles)];

    switch ($classeAleatoire) {
        case 'guerrier':
            $joueur2 = new Guerrier();
            break;
        case 'voleur':
            $joueur2 = new Voleur();
            break;
        case 'magicien':
            $joueur2 = new Magicien();
            break;
    }

    echo "<h3>Début du combat :</h3>";

    $tour = 1;
    while ($joueur1->vie > 0 && $joueur2->vie > 0) {
        echo "<strong>Tour $tour :</strong><br>";

        $joueur1->attaquer($joueur2);
        $joueur2->afficherEtat();
        if ($joueur2->vie <= 0) {
            echo "<br>";
            echo "<strong>{$joueur1->nom} gagne !</strong><br>";
            break;
        }

        $joueur2->attaquer($joueur1);
        $joueur1->afficherEtat();
        if ($joueur1->vie <= 0) {
            echo "<br>";
            echo "<strong>{$joueur2->nom} gagne !</strong><br>";
            break;
        }

        $tour++;
        echo "<br>";
    }
}
?>

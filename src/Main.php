<?php 
namespace App;

use App\Views\CategorieView;
use App\Services\CategorieService;
use App\Repository\CategorieRepository;

class Main {
    private  CategorieView $categorieView ;
    private CategorieService $categorieService;

    public function __construct() {
        $categorieRepository = new CategorieRepository();
        $this->categorieService = new CategorieService($categorieRepository);
        $this->categorieView = new CategorieView();
    }

    public function menu() {
  do {
    echo "Welcome to the Application!\n";
      echo "1. Creer Categories\n";
      echo "2. Lister Categorie\n";
      echo "3. Creer Article \n";
      echo "4. Lister Article\n";
      echo "5. Quitter\n";
        $choix = readline("Veuillez choisir une option: ");
        switch ($choix) {
            case 1:
                $categorie = $this->categorieView->saisie();
                if($this->categorieService->rechercherCategorieParLibelle($categorie->getLibelle())!=null) {
                    echo "La catégorie avec ce libellé existe déjà.\n";
                    break;
                }
                $this->categorieService->creerCategorie($categorie);
                echo "Catégorie créée avec succès.\n";
                break;
            case 2:
                $categories = $this->categorieService->listerCategories();
                $this->categorieView->affiche($categories);
                break;
            case 3:
                // Logic for creating an article would go here
                echo "Création d'article non implémentée.\n";
                break;
            case 4:
                // Logic for listing articles would go here
                echo "Liste d'articles non implémentée.\n";
                break;
            case 5:
                echo "Au revoir!\n";
                break;
            default:
                echo "Choix invalide, veuillez réessayer.\n";
        }
  } while ($choix != 5);


    }
}


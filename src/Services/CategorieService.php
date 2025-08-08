<?php 
namespace   App\Services;

use App\Entity\Categorie;

use App\Repository\CategorieRepository;

class CategorieService {
   private CategorieRepository $categorieRepository;
   public function __construct(CategorieRepository $categorieRepository) {
       $this->categorieRepository = $categorieRepository;
   }

    public function creerCategorie(Categorie $categorie): void {
        $this->categorieRepository->insert($categorie);
    }
    public function listerCategories(): array {
        return $this->categorieRepository->selectAll();
    }
    public function rechercherCategorieParLibelle(string $libelle): ?Categorie {
        return $this->categorieRepository->selectByLibelle($libelle);
    }
}
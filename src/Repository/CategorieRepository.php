<?php 
namespace App\Repository;
use App\Entity\Categorie;
class CategorieRepository {
    private $categories = [];

    public function insert(Categorie $categorie) {
        $this->categories[$categorie->getId()] = $categorie;
    }

    public function selectAll(): array {
        return $this->categories;
    }

    public function selectByLibelle(string $libelle): ?Categorie {
        foreach ($this->categories as $categorie) {
            if ($categorie->getLibelle() === $libelle) {
                return $categorie;
            }
        }
        return null;
    }

    
}
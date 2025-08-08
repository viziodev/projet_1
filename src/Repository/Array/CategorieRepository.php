<?php 
namespace App\Repository\Array;
use App\Entity\Categorie;
class CategorieRepositoryArray implements \App\Repository\CategorieRepository {
    private $categories = [];

     private  CategorieRepositoryArray|null $intance = null;

    private function __construct() {
        // Private constructor to enforce singleton pattern
    }
    public static function getInstance(): CategorieRepositoryArray {
        if (self::$intance === null) {
            self::$intance = new self();
        }
        return self::$intance;
    }

    public function insert(Categorie $categorie):void {
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
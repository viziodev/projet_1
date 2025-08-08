<?php 
namespace App\Repository\Json;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;

class CategorieRepositoryJson  implements CategorieRepository {
    private $filePath;

    private function __construct(string $filePath) {
        $this->filePath = $filePath;
    }


    private  CategorieRepositoryJson|null $intance = null;

   
    public static function getInstance(string $filePath): CategorieRepositoryJson {
        if (self::$intance === null) {
            self::$intance = new self($filePath);
        }
        return self::$intance;
    }
    public function insert(Categorie $categorie): void {
        $categories = $this->selectAll();
        $categories[$categorie->getId()] = $categorie;
        file_put_contents($this->filePath, json_encode($categories));
    }

    public function selectAll(): array {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = file_get_contents($this->filePath);
        return json_decode($data, true) ?: [];
    }

    public function selectByLibelle(string $libelle): ?Categorie {
        foreach ($this->selectAll() as $categorie) {
            if ($categorie['libelle'] === $libelle) {
                return new Categorie($categorie['id'], $categorie['libelle']);
            }
        }
        return null;
    }   
}
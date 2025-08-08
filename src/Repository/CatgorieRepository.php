<?php 
namespace App\Repository;
use App\Entity\Categorie;
interface CategorieRepository {
    public function insert(Categorie $categorie): void;
    public function selectAll(): array;
    public function selectByLibelle(string $libelle): ?Categorie;
}
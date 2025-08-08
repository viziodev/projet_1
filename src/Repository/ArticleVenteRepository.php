<?php 
namespace App\Repository;

use App\Entity\ArticleVente;

interface ArticleVenteRepository {
    public function insert(ArticleVente $article): void;
    public function selectAll(): array;
    // Additional methods can be defined here as needed
}
  
<?php 
namespace App\Repository;

use App\Entity\ArticleVente;

class ArticleVenteRepository {
    private $articles = [];

    public function insert(ArticleVente $article) {
        $this->articles[$article->getId()] = $article;
    }

    public function selectAll(): array {
        return $this->articles;
    }

}
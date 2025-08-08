<?php 
namespace App\Repository\Array;

use App\Entity\ArticleVente;
use App\Repository\ArticleVenteRepository;

class ArticleVenteRepositoryArray implements ArticleVenteRepository {

   
    private $articles = [];

    public function insert(ArticleVente $article):void {
        $this->articles[$article->getId()] = $article;
    }

    public function selectAll(): array {
        return $this->articles;
    }

}
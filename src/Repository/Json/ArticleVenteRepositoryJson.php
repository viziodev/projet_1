<?php 
namespace App\Repository\Json;

use App\Entity\ArticleVente;
use App\Repository\ArticleVenteRepository;


class ArticleVenteRepositoryJson implements ArticleVenteRepository {
    private $filePath;
    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    public function insert(ArticleVente $article): void {
        $articles = $this->selectAll();
        $articles[$article->getId()] = $article;
        file_put_contents($this->filePath, json_encode($articles));
    }

    public function selectAll(): array {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = file_get_contents($this->filePath);
        return json_decode($data, true) ?: [];
    }
}


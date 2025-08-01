<?php 
namespace App\Entity;
class Categorie {
    private $id;
    private $libelle;
    private array $articles = [];

    public function __construct($id, $libelle) {
        $this->id = $id;
        $this->libelle = $libelle;
    }   
    public function getId() {
        return $this->id;
    }
    public function getLibelle() {
        return $this->libelle;

    }
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
    public function __toString() {
        return "ID: " . $this->id . ", Libelle: " . $this->libelle;
    }

    public function addArticle(ArticleVente $article) {
        $this->articles[] = $article;
    }
    public function getArticles(): array {
        return $this->articles;
    }
    public function removeArticle(ArticleVente $article) {
        $key = array_search($article, $this->articles, true);
        if ($key !== false) {
            unset($this->articles[$key]);
        }
    }
}
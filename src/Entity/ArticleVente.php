<?php 
namespace App\Entity;
class ArticleVente {
    private $id;
    private $titre;
    private $prix;
    private Categorie $categorie;

    public function __construct($id, $titre, $prix, Categorie $categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->prix = $prix;
        $this->categorie = $categorie;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getCategorie():Categorie {
        return $this->categorie;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setCategorie(Categorie $categorie) {
        $this->categorie = $categorie;
    }

    public function __toString() {
        return "ID: " . $this->id . ", Titre: " . $this->titre . ", Prix: " . $this->prix . ", Categorie: " . (string)$this->categorie;
    }
}
<?php 

namespace App\Views;
use App\Entity\Categorie;

 class CategorieView {
  
       public function saisie():Categorie {
           $id = readline("Entrez l'ID de la catégorie: ");
           $libelle = readline("Entrez le libellé de la catégorie: ");
           return new Categorie($id, $libelle);
       } 
       
         public function affiche(array $categories): void {
            if (empty($categories)) {
                echo "Aucune catégorie à afficher.\n";
                return;
             }
            foreach ($categories as $categorie) {
                  echo $categorie . "\n";
            }
         }

        public function saisieLibelle(): string {
                return readline("Entrez le libellé de la catégorie à rechercher: ");
        }
 }


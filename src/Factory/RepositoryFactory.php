<?php 
namespace App\Factory;

use App\Repository\Array\CategorieRepositoryArray;
use App\Repository\CategorieRepository;
use App\Repository\Json\CategorieRepositoryJson;

class RepositoryFactory {
    public static function createRepository(string $type,string $storage): object {
        switch ($type) {
            case 'article':
                return new \App\Repository\Array\ArticleVenteRepositoryArray();
            case 'categorie':
                return  self::createCategorieRepository($storage);
            default:
                throw new \InvalidArgumentException("Unknown repository type: $type");
        }
    }

    private static function createCategorieRepository(string $storage): CategorieRepository {
       switch ($storage) {
            case 'array':
                return CategorieRepositoryArray::getInstance();
            break;
            case 'json':
                return CategorieRepositoryJson::getInstance("path/to/your/json/file.json");
            default:
                throw new \InvalidArgumentException("Unknown storage type: $storage");
        }
    }
}

   

<?php
namespace App\Factory;
use App\Services\CategorieService;

class ServiceFactory {


   public static function createService(string $type): object {
        switch ($type) {
            case 'categorie':
                return self::createCategorieService();
            break;
            default:
                throw new \InvalidArgumentException("Service not found: $type");
        }
    }
    public static function createCategorieService(): CategorieService {
  
        return new CategorieService(
            RepositoryFactory::createRepository('categorie', 'array')
        );
    }

   
}
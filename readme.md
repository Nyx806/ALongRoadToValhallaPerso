# ALongRoadToValhalla

C'est un site vitrine permetant ded mettre en avant le trailer et l'univers du jeu A Long Road To Valhalla 

## environnement de développement 

### pré-requis

* PHP 8.3
* Composer
* Symfony CLI
* Docker
* docker-compose
* nodejs et npm

Vous pouvez vérifier les pré-requis ( sauf docker et docker-compose) avec la commande suivante (de la CLI Symfony) : 

```bash
symfony check:requirements
```

### lancer l'environnement de développement 

```bash
composer install
npm install
npm run build
docker-compose up -d
symfony serve -d
```

### lancer les tests unitaire
 
```bash
php .\bin\phpunit --testdox
```


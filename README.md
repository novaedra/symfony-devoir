# INSTALLATION

### Cloner le projet
```
git clone https://github.com/novaedra/symfony-devoir.git
```
Dans le .env mettre à jours ses informations concernant la base de donnéest.

### Installer les dépendances
```
composer install
```

### Lier sa base de donnée
```
php bin/console doctrine:database:create
```

### Migrer les entités vers la base de données
```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### Lancer le serveur
```
symfony server:start
```

### Lire la documentation des routes sur la route /

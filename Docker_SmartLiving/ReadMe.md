# Docker SmartLiving

Composer doit êtres démarrer

Dans ce dossier.

Lancer la commande: 

```
docker-compose up 
```



Il faut changé l'host dans le .env de symfony:

* 127.0.0.1 devient db



Dans un nouveau terminal.

On va regarder les contaiiner démarrer:

```
docker ps
```

On  prend le nom du container  de *docker_smartliving_php* :

```
docker exec -it docker_smartliving_php_1 sh
```

*Si erreur, relancer la base de données peu avoir pas fini sont lancement*

On fini par crée la migration / on migre /  les fixture / et on demarre php:

```sh
php bin/console make:migration --no-debug -n && php bin/console doctrine:migrations:migrate -n --allow-no-migration && php bin/console doctrine:fixtures:load -n && php-fpm
```

Bisou, bisou.
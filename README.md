# SnowTrick

[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](http://forthebadge.com)


## Pour commencer

Lire les Diagrammes UML dans le dossier Google Drive: (https://drive.google.com/drive/folders/1Yx9--w7n3FmcrqP2oAVYtcN8WKxwWVv0?usp=sharing), le résultat codacy y est également disponible.

### Pré-requis

- Composer (https://getcomposer.org/)

### Installation

- Cloner le repository git
- Exécuter la commande composer install afin de récupérer toutes les dépendances utilisées dans le projet

Ensuite vous pouvez montrer ce que vous obtenez au final...

## Démarrage

Dites comment faire pour lancer votre projet

```bash
cp .env.dist .env

symfony console doctrine:migrations:migrate -n

symfony console doctrine:fixtures:load -n 

symfony serve -d
```

## Fabriqué avec

* Bootstrap (https://getbootstrap.com/) - Framework CSS
* Composer (https://getcomposer.org/) - Gestionnaire de dépendances
* Twig (https://twig.symfony.com/) - Moteur de template
* Visual Studio Code (https://code.visualstudio.com/) - IDE





# Exercices Symfony

## Exercice Controller / Route

Avec la commande `make:controller`, créer un controleur ContactController avec 5 méthodes :

* list
* show
* create
* update
* delete

Avec l'annotation @Route créer 5 URLs (ATTENTION le name doit être unique dans toute l'app)

* list -> /contacts 
* show -> /contacts/123
* create -> /contacts/create
* update -> /contacts/123/update
* delete -> /contacts/123/delete


Dans le répertoire templates/contact créer 5 templates :

* list.html.twig
* show.html.twig
* create.html.twig
* update.html.twig
* delete.html.twig

Ajouter dans ces template un balise de titre exemple :

```
{% extends 'base.html.twig' %}

{% block title %}Liste des contacts{% endblock %}

{% block body %}
<h1>Liste des contacts</h1>
{% endblock %}
```

## Exercice Templates

### base.html.twig

Dans le fichier base.html.twig, créer un menu avec un lien vers la page d'index et un lien vers la liste des contacts
Si vous connaissez la bibliothèque Bootstrap inclure les fichiers CSS et JS comme sur :
https://getbootstrap.com/docs/4.5/getting-started/introduction/

### contact/list.html.twig

Créer un tableau avec la liste des contacts et des liens vers les page show, update et delete

Les champs d'un contact : id, firstName, lastName, email, phone

### contact/show.html.twig

Afficher simplement le détails du contact (firstName, lastName, email, phone)

### contact/delete.html.twig

Afficher un formulaire avec la phrase : "Etes vous sur de vouloir supprimer le contact {{firstName}} {{lastName}} ?"
et 2 boutons : Oui / Non

### contact/create.html.twig

Afficher un formulaire avec 4 champs  (firstName, lastName, email, phone)

### contact/update.html.twig

Afficher un formulaire prérempli avec d'ancienne valeurs dans 4 champs  (firstName, lastName, email, phone)

## Exercice Doctrine

### Créer un nouveau Controller Company

Créer 2 méthodes template compris avec comme URL :

/companies/ -> list
/companies/{companyId}/ -> show

### Créer une entity Company

Avec en propriété (id ajouté automatiquement) :
* id
* name type string 80
* city type string 80 nullable true (optionnel)

### Générer la table

Avec la commande doctrine:schema:update (--dump-sql pour vérifier et --force pour créer)

### En s'inspirant de ContactController

Requeter les entités avec le repository et afficher les sociétés dans Twig.

### Mettre des liens (dans le menu et list)


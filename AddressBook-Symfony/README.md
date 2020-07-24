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

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

## Exercice Association Mapping

### Créer une relation OneToOne Self-Referencing

Dans contact, créer une propriété `superior` (de type Contact ou self)

Ajouter une relation OneToOne Self-Referencing comme sur https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/association-mapping.html#one-to-one-self-referencing

Générer les getters/setters et les changements en base de données

Ajouter des liens via phpMyAdmin et dans le template `contact/show.html.twig` afficher le prénom et nom
de votre supérieur s'il existe.

### Créer une relation ManyToMany

Créer une nouvelle entité `Group` (des groupes de contacts, ex: Amis, Famille, Collègues)

avec 2 propriétés :
* name (type string 60)
* description (type text)

Ajouter dans phpMyAdmin des groupes et des liens entre contact et groupe (dans la table de liens)

Coté Contact ajouter une propriété `groups` de type `ManyToMany` et sur la page `contact/show.html.twig`
afficher les groupes dont fait parti le contact.


## Exercice Services/Service Container

Créer une classe CompanyManager dans src/Manager

Ajouter une propriété $companyRepository de type \App\Repository\CompanyRepository

Générer un constructeur qui reçoit le $companyRepository en arguments et qui l'affecte à la propriété (à générer depuis PHPStorm)

Ajouter 2 méthodes findAll et find inspirées de ContactManager

Dans CompanyController créer une propriété $companyManager de type \App\Manager\CompanyManager

Injecter la dépendance en générant le constructeur (comme dans CompanyManager)

Dans les méthodes list et show appeler les méthodes du manager.

 ## Exercice Repository et Twig Extension
 
 Dans `ContactController` créer une nouvelle méthode listByCompany accessible via
 la Route `/contacts/by-company/{companyId}/`
 
 Cette méthode du controller devra appeler une méthode de `ContactManager` `findByCompany(2)`
 le manager devra appeler une méthode du repository `findByCompany(2)` écrite en DQL
 
 La méthode `listByCompany` pourrait utiliser le templates `contact/list` pour afficher les résultats.
 
 Utiliser la commande `make:twig-extension` pour créer une nouvelle extension `CompanyExtension`
 
 Cette extension devra définir une fonction companyItems() qui remplacera les lignes 20 à 22 de `_menu.html.twig`
 
 Dans cette fonction appeler la méthode `findAll()` de CompanyManager (et donc injecter companyManager).
 Pour générer le lien vers la route, inspirez vous de `vendor/symfony/twig-bridge/Extension/RoutingExtension.php`
 
 ## Exercice Tests PHPUnit
 
 ### Test unitaire
 
 Créer une classe `tests\Entity\CompanyTest.php` avec la `commande make:unit-test`
 
 Y écrire 2 tests :
 
 * testInitialValues() vérifier que les valeurs initiales de toutes les propriétés soient NULL
 * testGetSetName() vérifier qu'en appelant setName, le retour de getName soit correct / et vérifier de setName retourne $this
 
 ### Test fonctionnels
 
 Créer une classe `tests\Controller\CompanyControllerTest` avec la `commande make:functional-test`
 
 Y écrire 2 tests :
 
 Le test de list et le test de show en utilisant un mock ou un spy avec Prophecy.
 